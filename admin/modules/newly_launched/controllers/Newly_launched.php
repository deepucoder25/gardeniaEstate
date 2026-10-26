<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Newly_launched extends MX_Controller
{
    public function __construct()
    {
        parent::__construct();
        if (!$this->session->userdata('username')) {
            redirect('login');
        }
    }

    public function index($edit_id = 0)
    {
        $data['projects'] = get_newly_launched_projects(false);
        $data['edit_project'] = null;
        if (intval($edit_id) > 0) {
            $data['edit_project'] = get_newly_launched_project_by_id($edit_id);
        }
        $this->load->view('view', $data);
    }

    public function get_projects_json()
    {
        $projects = get_newly_launched_projects(false);
        $this->output->set_content_type('application/json')->set_output(json_encode($projects));
    }

    public function save_project()
    {
        $id = isset($_POST['id']) ? intval($_POST['id']) : 0;
        $image_path = isset($_POST['existing_image']) ? $_POST['existing_image'] : 'assets/images/slider/gardenia_hero.webp';

        // Image Upload
        if (isset($_FILES['project_image']) && $_FILES['project_image']['error'] == 0) {
            $upload_dir = FCPATH . 'assets/images/uploads/';
            if (!is_dir($upload_dir)) {
                @mkdir($upload_dir, 0777, true);
                @chmod($upload_dir, 0777);
            }
            $ext = pathinfo($_FILES['project_image']['name'], PATHINFO_EXTENSION);
            $new_filename = 'newlaunch_' . time() . '_' . rand(100, 999) . '.' . strtolower($ext);
            $target_file = $upload_dir . $new_filename;

            if (move_uploaded_file($_FILES['project_image']['tmp_name'], $target_file)) {
                @chmod($target_file, 0666);
                $image_path = 'assets/images/uploads/' . $new_filename;
            }
        }

        // Highlights - either array or multiline text
        $highlights = [];
        if (isset($_POST['highlights'])) {
            if (is_array($_POST['highlights'])) {
                $highlights = $_POST['highlights'];
            } else {
                $lines = preg_split('/[\r\n]+/', $_POST['highlights']);
                $highlights = array_values(array_filter(array_map('trim', $lines)));
            }
        }

        $project_data = [
            'id'           => $id,
            'name'         => isset($_POST['name']) ? trim($_POST['name']) : '',
            'tagline'      => isset($_POST['tagline']) ? trim($_POST['tagline']) : '',
            'badge'        => isset($_POST['badge']) && !empty(trim($_POST['badge'])) ? trim($_POST['badge']) : 'Newly Launched',
            'location'     => isset($_POST['location']) ? trim($_POST['location']) : '',
            'price'        => isset($_POST['price']) ? trim($_POST['price']) : '',
            'plot_sizes'   => isset($_POST['plot_sizes']) ? trim($_POST['plot_sizes']) : '',
            'description'  => isset($_POST['description']) ? trim($_POST['description']) : '',
            'highlights'   => $highlights,
            'image'        => $image_path,
            'brochure'     => isset($_POST['brochure']) ? trim($_POST['brochure']) : '',
            'enquiry_link' => isset($_POST['enquiry_link']) ? trim($_POST['enquiry_link']) : '',
            'launch_date'  => isset($_POST['launch_date']) ? trim($_POST['launch_date']) : '',
            'status'       => isset($_POST['status']) ? trim($_POST['status']) : 'Active',
            'sort_order'   => isset($_POST['sort_order']) ? intval($_POST['sort_order']) : 0,
        ];

        if (empty($project_data['name'])) {
            echo "Project name is required.";
            return;
        }

        if (save_newly_launched_project_db($project_data)) {
            echo "Project saved successfully!";
        } else {
            echo "Error saving project. Please try again.";
        }
    }

    public function delete_project($id = 0)
    {
        $id = intval($id);
        if ($id > 0) {
            delete_newly_launched_project_db($id);
            echo "Project deleted successfully!";
        } else {
            echo "Invalid project ID.";
        }
    }

    public function toggle_status($id = 0)
    {
        $id = intval($id);
        if ($id > 0) {
            $p = get_newly_launched_project_by_id($id);
            if ($p) {
                $new_status = (strtolower($p['status']) == 'active') ? 'Inactive' : 'Active';
                $p['status'] = $new_status;
                save_newly_launched_project_db($p);
                echo "Status updated to " . $new_status;
                return;
            }
        }
        echo "Unable to update status.";
    }
}
