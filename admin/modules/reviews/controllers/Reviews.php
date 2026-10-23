<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Reviews extends MX_Controller
{
    //wGtRkO8VoEyUjS
    private $type;
    function __construct()
    {
        parent::__construct();
        if (!$this->session->userdata('username')) { redirect('login'); }
        $this->load->model('mdl_reviews');
    }
    function index()
    {
        $this->load->view('data');
    }
    function save()
    {
        if($_GET['id']){
            $where['r_id']=$_GET['id'];
            $data['status']=$_GET['status'];
            echo $this->mdl_reviews->update_data($where,$data);
        }
        else 
            echo "invalid Request";
        
    }
    function update_data()
    {
        if (!$this->input->post('r_id')) {
            echo "invalid Request";
            return;
        }
        $where['r_id'] = $this->input->post('r_id');
        $data = array();
        if ($this->input->post('name') !== null) $data['name'] = $this->input->post('name');
        if ($this->input->post('email') !== null) $data['email'] = $this->input->post('email');
        if ($this->input->post('stars') !== null) $data['stars'] = $this->input->post('stars');
        if ($this->input->post('r_desc') !== null) $data['r_desc'] = $this->input->post('r_desc');
        if ($this->input->post('r_title') !== null) $data['r_title'] = $this->input->post('r_title');
        if ($this->input->post('r_type') !== null) $data['r_type'] = $this->input->post('r_type');
        if ($this->input->post('admin_reply') !== null) $data['admin_reply'] = $this->input->post('admin_reply');
        if ($this->input->post('status') !== null) $data['status'] = $this->input->post('status');

        if (empty($data)) {
            echo "invalid Request";
            return;
        }
        echo $this->mdl_reviews->update_data($where, $data);
    }
    function delete_data()
    {
        if (isset($_GET['id']) && $_GET['id'])
        {
            $this->db->where('r_id', $_GET['id']);
            foreach ($this->db->get("reviews")->result() as $row)
            {
                if (!empty($row->r_img)) {
                    $image_delete_path1="./assets/uploads/reviewimg/$row->r_img";
                    $image_delete_path2="./assets/uploads/reviewimg/thumb/$row->r_img";
                    if (file_exists($image_delete_path1)) unlink($image_delete_path1);
                    if (file_exists($image_delete_path2)) unlink($image_delete_path2);
                }
            }
            $where['r_id']=$_GET['id'];
            echo $this->mdl_reviews->delete_data($where);
        }else echo "Not Deleted";
    }
    function view_data()
    {
        $where=null;
        if (isset($_GET['id']))
	         $where['r_id']=$_GET['id'];
        
        if (isset($_GET['data']))
	        $select=$_GET['data'];
	    else $select="r_id,name as unm,email, r_img as img,stars as rt,r_desc as cmt,posted_date as pd,r_title as t,r_type as ty,admin_reply as ar,timestamp as tm,status as st";
	    
        $return=$this->mdl_reviews->view_data($where,$select);
        $this->output->set_content_type('application/json')->set_output(json_encode($return->result_array()));
    }
}
