<?php if (! defined('BASEPATH')) exit('No direct script access allowed');
class Gallery extends MX_Controller
{
    function __construct()
    {
        parent::__construct();
        if (!$this->session->userdata('username')) { redirect('login'); }
        $this->load->model('gallery_mdl');
    }

    function index()
    {
        $this->load->view('index');
    }

    function image_upload()
    {
        $this->load->library('form_validation');
        $this->form_validation->set_rules('title', 'Title', 'trim');
        
        if (empty($_FILES['image']['name']) && empty($_POST['auto_id'])) {
            $this->form_validation->set_rules('image', 'Image', 'required');
        }
        if ($this->form_validation->run() == TRUE) 
        {
            $data = array();
            $data['title'] = isset($_POST['title']) ? $_POST['title'] : '';
            $data['album_id'] = 0;
            $data['album_name'] = 'General';
            
            if (!empty($_FILES['image']['name'])) {
                if (!is_dir('./assets/temp')) {
                    mkdir('./assets/temp', 0777, TRUE);
                }
                if (!is_dir('./assets/uploads/gallery/thumb/')) {
                    mkdir('./assets/uploads/gallery/thumb/', 0777, TRUE);
                }
                $config['upload_path'] = './assets/temp';
                $config['allowed_types'] = 'gif|jpg|png|jpeg|webp|jfif|WEBP|JFIF';
                $config['new_image'] = './assets/uploads/gallery/';
                $config['min_width']=200;
             
                $rand_number = mt_rand(0, 85);
                $timestamp = time();
                $config['file_name'] =  $rand_number . $timestamp;
                
                $config['overwrite'] = false;
                $config['remove_spaces'] = true;
                
                $this->load->library('upload', $config);
                if (! $this->upload->do_upload('image')) 
                {
                    echo $this->upload->display_errors();
                    die();
                } 
                else 
                {   
                    $image = $this->upload->data();
                    $temp_file = './assets/temp/' . $image['file_name'];
                    $dest_main = './assets/uploads/gallery/' . $image['file_name'];
                    $dest_thumb = './assets/uploads/gallery/thumb/' . $image['file_name'];

                    try {
                        $config['source_image'] = $temp_file;
                        $config['maintain_ratio'] = TRUE;
                        $this->load->library('image_lib', $config);
                        $this->image_lib->initialize($config);
                        $this->image_lib->resize();
                        $this->image_lib->clear();

                        $config['source_image'] = $temp_file;
                        $config['new_image'] = './assets/uploads/gallery/thumb/';
                        $config['maintain_ratio'] = TRUE;
                        $config['overwrite'] = FALSE;
                        $this->image_lib->initialize($config);
                        $this->image_lib->resize();
                        $this->image_lib->clear();
                    } catch (Throwable $e) {}

                    if (!file_exists($dest_main) && file_exists($temp_file)) {
                        @copy($temp_file, $dest_main);
                    }
                    if (!file_exists($dest_thumb) && file_exists($temp_file)) {
                        @copy($temp_file, $dest_thumb);
                    }
                    if (file_exists($temp_file)) {
                        @unlink($temp_file);
                    }
                    $data['image'] = $image['file_name'];
                }
            }
            
            if (!empty($_POST['auto_id'])) {
                $where['auto_id'] = $_POST['auto_id'];
                echo $this->gallery_mdl->update_data($where, $data);
            } else {
                $data['status'] = 1;
                echo $this->gallery_mdl->add_data($data);
            }
        }
        else echo validation_errors();
        // Upload code end
    }
   
    function view_data()
    {
        if (isset($_GET['id']))
	         $where['auto_id']=$_GET['id'];
        else $where = null;
        
        if (isset($_GET['data']))
	        $select=$_GET['data'];
	    else $select="*";
	    
        $return=$this->gallery_mdl->view_data($where,$select);
        $this->output->set_content_type('application/json')->set_output(json_encode($return->result_array()));
    }
    function delete_data()
    {
        if (isset($_GET['id']) && $_GET['id'])
        {
            
            $this->db->where('auto_id', $_GET['id']);
            foreach ($this->db->get("gallery")->result() as $row)
            {
                $image_delete_path1="./assets/uploads/gallery/$row->image";
                $image_delete_path2="./assets/uploads/gallery/thumb/$row->image";
            }
            if(file_exists($image_delete_path1)) unlink($image_delete_path1);
            if(file_exists($image_delete_path2)) unlink($image_delete_path2);
            $where['auto_id']=$_GET['id'];
            echo $this->gallery_mdl->delete_data($where);
        }else echo "Not Deleted";
    }
    function update_status()
    {
        if (isset($_GET['id']) && $_GET['id'] && isset($_GET['status']))
        {
            $where['auto_id'] = $_GET['id'];
            $data['status'] = $_GET['status'];
            echo $this->gallery_mdl->update_data($where,$data);
        }else echo "invalid Request";
    }
    function update_album_names($where,$name)
    {
        $data['album_name']=$name;
        return $this->gallery_mdl->update_data($where,$data);
    }
}
