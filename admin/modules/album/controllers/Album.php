<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Album extends MX_Controller
{
    function __construct()
    {
         parent::__construct();
         if (!$this->session->userdata('username')) { redirect('login'); }
         $this->load->model('mdl_album');
         
         //privileges
//          $this->module="album";
//          $this->load->module('user_privileges');
     }
    function index()
    {
        $this->load->view('form');
    }
    function save_data()
    {
        $this->load->library('form_validation');
        $this->form_validation->set_rules("title","Album title","required|trim");
        $this->form_validation->set_rules("status","Status","trim");
        if ($this->form_validation->run()==TRUE)
        {
            $data['title']=$_POST['title'];
            $data['status']=isset($_POST['status']) && $_POST['status'] ? 1 : 0;

            if (!empty($_FILES['image']['name'])) {
                $data['image'] = $this->image_upload();
                if ($this->input->post('old_image')) {
                    $this->remove_image($this->input->post('old_image'));
                }
            }
            
            if (isset($_POST['id']) && $_POST['id'])//update
            {
                $where['album_id']=$_POST['id'];
                echo $this->mdl_album->update_data($where,$data);
            }
            else //add
            {
                echo $this->mdl_album->add_data($data);
            }
        }
        else 
            echo validation_errors();
    }
    function view_data()
    {
//         $function="view";
//         $this->user_privileges->check_privilege($this->module,$function);
        $where=null;
        if (isset($_GET['id']))
	         $where['album_id']=$_GET['id'];
        
        if (isset($_GET['data']))
	        $select=$_GET['data'];
	    else $select="*";
	    
        $return=$this->mdl_album->view_data($where,$select);
        $this->output->set_content_type('application/json')->set_output(json_encode($return->result_array()));
    }
    function delete_data()
    {
//         $where=null;
//         $function="delete";
//         $this->user_privileges->check_privilege($this->module,$function);
        if (isset($_GET['id']) && $_GET['id'])
        {
            $where['album_id']=$_GET['id'];
            echo $this->mdl_album->delete_data($where);
        }
    }

    function image_upload()
    {
        $folder="album";
        $config['upload_path'] = './assets/temp';
        $config['allowed_types'] = 'gif|jpg|png|jpeg|webp|jfif|WEBP|JFIF';
        $config['new_image'] = "./assets/uploads/$folder/";
        $config['min_width']=100;

        $rand_number = mt_rand(0, 85);
        $timestamp = time();
        $config['file_name'] =  $rand_number . $timestamp;
        $config['overwrite'] = false;
        $config['remove_spaces'] = true;

        $this->load->library('upload');
        $this->upload->initialize($config);
        if (! $this->upload->do_upload('image'))
        {
            echo $this->upload->display_errors();
            die();
        }
        else
        {
            $image = $this->upload->data();
            $config['source_image'] = './assets/temp/' . $image['file_name'];
            $config['maintain_ratio'] = TRUE;

            $this->load->library('image_lib', $config);
            $this->image_lib->initialize($config);

            if (! $this->image_lib->resize())
            {
                echo $this->image_lib->display_errors();die();
            }
            else
            {
                unlink($config['source_image']);
                return $image['file_name'];
            }
        }
    }

    function remove_image($title)
    {
        if ($title && substr($title, 0,4)!="http")
        {
            $path1="./assets/uploads/album/".$title;
            if (file_exists($path1)) unlink($path1);
        }
    }
}
?>
