<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Timer extends MX_Controller 
{   
    function __construct(){
        parent::__construct();
        if (!$this->session->userdata('username')) { redirect('login'); }
    }
    
    public function index()
    {
        $this->load->view('timer_view');
    }
    
    public function save_timer()
    {
        if (isset($_POST['timer_target_date'])) {
            $timer_data = [
                'target_date' => $_POST['timer_target_date'],
                'heading' => isset($_POST['timer_heading']) && !empty($_POST['timer_heading']) ? $_POST['timer_heading'] : 'Schedule a Site-Visit to The Gardenia Estate STRR Devanahalli',
                'tagline' => isset($_POST['timer_tagline']) && !empty($_POST['timer_tagline']) ? $_POST['timer_tagline'] : 'Hurry Up! Enquire Now',
                'subheading' => isset($_POST['timer_subheading']) && !empty($_POST['timer_subheading']) ? $_POST['timer_subheading'] : 'Pre Launch Prices Applicable On 1st Few Units.'
            ];
            $json_str = json_encode($timer_data, JSON_PRETTY_PRINT);
            if (@file_put_contents('./assets/timer_settings.json', $json_str) !== false) {
                echo "Countdown timer settings updated successfully.";
            } else {
                echo "Error: Unable to write to ./assets/timer_settings.json. Please check file permissions.";
            }
        } else {
            echo "No settings submitted.";
        }
    }
}
