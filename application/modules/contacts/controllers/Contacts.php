<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Contacts extends MX_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->database();
        $this->load->library('session');
    }

    function index()
    {
        $data['title'] = "Contact Us | " . $this->comp['company3'];
        $data['description'] = "Get in touch with " . $this->comp['company3'] . " for plot enquiries, site visit booking, and pricing details.";
        $data['module'] = "contacts";
        $data['view_file'] = "contacts";
        echo Modules::run('template/layout2', $data);
    }

    function quote_send()
    {
        $this->load->model('contacts_mdl');
        
        $email = $this->input->post('email');
        $name  = $this->input->post('name');
        $phone = $this->input->post('phone');

        if (!empty($email)) {
            $this->contacts_mdl->newsletter();
        }

        if (!empty($name) || !empty($phone) || !empty($email)) {
            $this->contacts_mdl->bookings();
            $this->contacts_mdl->contact();
        }

        if ($this->input->is_ajax_request()) {
            echo "1";
            return;
        }

        $this->session->set_flashdata('success_msg', 'Thank you! Your inquiry has been submitted successfully.');
        $referrer = $this->input->server('HTTP_REFERER');
        if (!empty($referrer)) {
            redirect($referrer);
        } else {
            redirect(site_url());
        }
    }

    function booking()
    {
        $this->load->library('form_validation');
        $this->form_validation->set_rules('name', 'Name', 'required|trim');
        $this->form_validation->set_rules('phone', 'Mobile', 'required|trim');
        $this->form_validation->set_rules('mfrom', 'Plot Project', 'trim');
        $this->form_validation->set_rules('message', 'Message', 'trim');

        if ($this->form_validation->run() == true) {
            $this->load->model('contacts_mdl');
            $check = $this->contacts_mdl->bookings();
            if ($check == true) {
                echo "1";
            }
        } else {
            echo "<div class='alert alert-danger mb-0 mt-3'>" . validation_errors() . "</div>";
        }
    }

    function contact()
    {
        $this->load->library('form_validation');
        $this->form_validation->set_rules('name', 'Name', 'required|trim');
        $this->form_validation->set_rules('phone', 'Mobile', 'required|trim|numeric|exact_length[10]');
        $this->form_validation->set_rules('message', 'Message', 'trim');

        if ($this->form_validation->run() == true) {
            $this->load->model('contacts_mdl');
            $check = $this->contacts_mdl->contact();
            $this->contacts_mdl->bookings();
            if (!empty($_POST['email'])) {
                $this->contacts_mdl->newsletter();
            }
            if ($check == true) {
                echo "1";
            }
        } else {
            echo "<div class='alert alert-danger mb-0 mt-3'>" . validation_errors() . "</div>";
        }
    }
}