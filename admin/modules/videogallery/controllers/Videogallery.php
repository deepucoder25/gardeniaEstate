<?php if (! defined('BASEPATH')) exit('No direct script access allowed');
class Videogallery extends MX_Controller
{
    function __construct()
    {
        parent::__construct();
        if (!$this->session->userdata('username')) { redirect('login'); }
        $this->load->model('videogallery_mdl');
    }

    function index()
    {
        $this->load->view('index');
    }

    function video_upload()
    {
        $this->load->library('form_validation');
        $this->form_validation->set_rules('video_url', 'Video URL', 'required|trim');
        
        if ($this->form_validation->run() == TRUE) 
        {
            $data['title'] = "Video"; // Set a default title if required by DB schema just in case
            
            $url = trim($_POST['video_url']);
            if (preg_match('/youtube\.com\/watch\?.*v=([^&]+)/', $url, $matches)) {
                $url = 'https://www.youtube.com/embed/' . $matches[1];
            } elseif (preg_match('/youtu\.be\/([^?]+)/', $url, $matches)) {
                $url = 'https://www.youtube.com/embed/' . $matches[1];
            }
            $data['video_url'] = $url;
            
            if(isset($_POST['auto_id']) && $_POST['auto_id'] != '') {
                $where['auto_id'] = $_POST['auto_id'];
                echo $this->videogallery_mdl->update_data($where, $data);
            } else {
                $data['status'] = 1;
                echo $this->videogallery_mdl->add_data($data);
            }
        }
        else {
            echo validation_errors();
        }
    }
   
    function view_data()
    {
        if (isset($_GET['id']))
	         $where['auto_id']=$_GET['id'];
        else $where = null;
        
        if (isset($_GET['data']))
	        $select=$_GET['data'];
	    else $select="*";
	    
        $return = $this->videogallery_mdl->view_data($where, $select);
        $this->output->set_content_type('application/json')->set_output(json_encode($return->result_array()));
    }

    function delete_data()
    {
        if (isset($_GET['id']) && $_GET['id'])
        {
            $where['auto_id'] = $_GET['id'];
            echo $this->videogallery_mdl->delete_data($where);
        } else {
            echo "Not Deleted";
        }
    }

    function update_status()
    {
        if (isset($_GET['id']) && $_GET['id'] && isset($_GET['status']))
        {
            $where['auto_id'] = $_GET['id'];
            $data['status'] = $_GET['status'];
            echo $this->videogallery_mdl->update_data($where, $data);
        } else {
            echo "invalid Request";
        }
    }
}
