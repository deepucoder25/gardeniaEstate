<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Dashboard extends MX_Controller
{
    //wGtRkO8VoEyUjS
    function __construct()
    {
        parent::__construct();
        if (!$this->session->userdata('username')) { redirect('login'); }
    }
    function index()
    {
//         $this->load->view('view');
    }
    function admin()
    {
        $this->load->view('view');
    }
    function fetch_cards_data()
    {
        $data=array(
            "bookings"=>$this->db->get('bookings')->num_rows(),
            "contact"=>$this->db->get('contacts')->num_rows(),
            "blog"=>$this->db->get('blog')->num_rows(),
            "reviews"=>$this->db->get('reviews')->num_rows(),
    		"logs"=>$this->db->get('logs')->num_rows(),
            "plots"=>$this->db->get('plots')->num_rows(),
            "amenities"=>$this->db->get('amenities')->num_rows(),
            "newly_launched"=>$this->db->get('newly_launched_projects')->num_rows(),
        );
        $this->output->set_content_type('application/json')->set_output(json_encode($data));
    }


}
