<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Contacts_mdl extends CI_Model
{
    function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    public function bookings()
    {
        $name  = $this->input->post('name');
        $email = $this->input->post('email');
        $phone = $this->input->post('phone');
        $mfrom = $this->input->post('mfrom'); // Preferred Plot Size / Variant
        if (empty($mfrom)) {
            $mfrom = $this->input->post('freight');
        }
        $msg   = $this->input->post('message'); // Visit Request / Query Notes
        if (empty($msg)) {
            $msg = $this->input->post('comment');
        }

        // Default fallbacks for required non-empty fields in DB
        if (empty($name)) {
            $name = !empty($email) ? strtok($email, '@') : 'Website Lead';
        }
        if (empty($phone)) {
            $phone = '0000000000';
        }

        // Insert booking lead directly into SQLite database (bookings table)
        $data = array(
            "name"   => $name,
            "email"  => $email,
            "phone"  => $phone,
            "mfrom"  => $mfrom,
            "msg"    => $msg,
            "status" => "not_converted"
        );

        $this->db->insert('bookings', $data);
        return true;
    }

    public function contact()
    {
        $name  = $this->input->post('name');
        $email = $this->input->post('email');
        $phone = $this->input->post('phone');
        $qry   = $this->input->post('message');
        if (empty($qry)) {
            $qry = $this->input->post('comment');
        }

        if (empty($name)) {
            $name = !empty($email) ? strtok($email, '@') : 'Visitor';
        }
        if (empty($email)) {
            $email = 'noemail@estate.com';
        }
        if (empty($phone)) {
            $phone = '0000000000';
        }
        if (empty($qry)) {
            $qry = 'General Enquiry';
        }

        $data = array(
            "name"    => $name,
            "email"   => $email,
            "phone"   => $phone,
            "message" => $qry
        );

        $this->db->insert('contacts', $data);
        $this->send_enquiry_email($name, $email, $phone, $qry, 'General Enquiry');
        return true;
    }

    private static $email_sent = false;

    private function send_enquiry_email($name, $email, $phone, $message, $type = 'Enquiry')
    {
        if (self::$email_sent) {
            return;
        }
        self::$email_sent = true;

        $admin_email = "ruchikumari24@navigurukul.org";
        $sender_email = (!empty($email) && $email !== 'noemail@estate.com') ? $email : 'no-reply@gardeniaestate.com';

        // SMTP Configuration
        $config = array(
            'protocol'   => 'smtp',
            'smtp_host'  => 'smtp.gmail.com',
            'smtp_port'  => 587,
            'smtp_user'  => 'ruchikumari24@navigurukul.org',
            'smtp_pass'  => 'YOUR_APP_PASSWORD', // Gmail App Password
            'smtp_crypto'=> 'tls',
            'mailtype'   => 'html',
            'charset'    => 'utf-8',
            'newline'    => "\r\n"
        );

        $this->load->library('email');
        $this->email->initialize($config);
        $this->email->clear();

        $this->email->to($admin_email);
        $this->email->from($sender_email, $name);
        $this->email->subject("New Gardenia Estate $type from $name");

        $email_content = "
            <h2>New $type Received</h2>
            <p><strong>Name:</strong> " . htmlspecialchars($name) . "</p>
            <p><strong>Email:</strong> " . htmlspecialchars($email) . "</p>
            <p><strong>Phone:</strong> " . htmlspecialchars($phone) . "</p>
            <p><strong>Details / Message:</strong> " . nl2br(htmlspecialchars($message)) . "</p>
        ";

        $this->email->message($email_content);
        @$this->email->send();
    }

    public function newsletter()
    {
        $email = $this->input->post('email');
        if (!empty($email)) {
            $data = array(
                "email" => $email
            );
            $this->db->insert('newsletter', $data);
        }
        return true;
    }
}
