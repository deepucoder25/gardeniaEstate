<?php if (!defined('BASEPATH')) exit('No direct script access allowed'); 

class Project_overview extends MX_Controller
{
    public function index($tab = 'company_info', $plot_id = 0)
    {
        $data['company_info']     = get_company_info();
        $data['amenities_master'] = get_amenities_master();
        $data['plots_master']     = get_plots_master();
        $data['active_tab']       = $tab;
        $data['editing_plot_id']  = intval($plot_id);

        $this->load->view('project_overview_view', $data);
    }

    public function company_info() { $this->index('company_info'); }
    public function plots_properties($plot_id = 0) { $this->index('plots_properties', $plot_id); }
    public function master_plan() { $this->index('plots_properties'); }
    public function amenities() { $this->index('amenities'); }
    public function location_map() { $this->index('plots_properties'); }

    // Save Global Company Info
    public function save_company_info()
    {
        $image_path = isset($_POST['existing_company_image']) ? $_POST['existing_company_image'] : '';
        if (isset($_FILES['company_image']) && $_FILES['company_image']['error'] == 0) {
            $upload_dir = FCPATH . 'assets/images/uploads/';
            if (!is_dir($upload_dir)) {
                @mkdir($upload_dir, 0777, true);
                @chmod($upload_dir, 0777);
            }
            $ext = pathinfo($_FILES['company_image']['name'], PATHINFO_EXTENSION);
            $new_filename = 'company_' . time() . '_' . rand(100,999) . '.' . strtolower($ext);
            $target_file = $upload_dir . $new_filename;

            if (move_uploaded_file($_FILES['company_image']['tmp_name'], $target_file)) {
                @chmod($target_file, 0666);
                $image_path = 'assets/images/uploads/' . $new_filename;
            }
        }

        $data = [
            'company_name' => isset($_POST['company_name']) ? trim($_POST['company_name']) : '',
            'phone'        => isset($_POST['phone']) ? trim($_POST['phone']) : '',
            'email'        => isset($_POST['email']) ? trim($_POST['email']) : '',
            'description'  => isset($_POST['description']) ? trim($_POST['description']) : '',
            'location'     => isset($_POST['location']) ? trim($_POST['location']) : '',
            'image'        => $image_path
        ];

        if (save_company_info_db($data)) {
            echo "Company Info saved successfully!";
        } else {
            echo "Error saving Company Info settings.";
        }
    }

    // Save Amenities Master
    public function save_amenities()
    {
        $amenities = [];
        if (isset($_POST['amenity_name']) && is_array($_POST['amenity_name'])) {
            $id_counter = 1;
            foreach ($_POST['amenity_name'] as $idx => $aname) {
                if (!empty(trim($aname))) {
                    $amenities[] = [
                        'id'   => $id_counter++,
                        'name' => trim($aname)
                    ];
                }
            }
        }

        if (save_amenities_master_db($amenities)) {
            echo "Amenities Master saved successfully!";
        } else {
            echo "Error saving Amenities Master.";
        }
    }

    // Save Plot / Property (Add or Edit)
    public function save_plot()
    {
        $plot_id = isset($_POST['plot_id']) ? intval($_POST['plot_id']) : 0;

        // Image Upload Handling
        $image_path = isset($_POST['existing_image']) ? $_POST['existing_image'] : 'assets/images/slider/gardenia_hero.webp';
        if (isset($_FILES['plot_image']) && $_FILES['plot_image']['error'] == 0) {
            $upload_dir = FCPATH . 'assets/images/uploads/';
            if (!is_dir($upload_dir)) {
                @mkdir($upload_dir, 0777, true);
                @chmod($upload_dir, 0777);
            }
            $ext = pathinfo($_FILES['plot_image']['name'], PATHINFO_EXTENSION);
            $new_filename = 'plot_' . time() . '_' . rand(100,999) . '.' . strtolower($ext);
            $target_file = $upload_dir . $new_filename;

            if (move_uploaded_file($_FILES['plot_image']['tmp_name'], $target_file)) {
                @chmod($target_file, 0666);
                $image_path = 'assets/images/uploads/' . $new_filename;
            }
        }

        // Process Nearby Places
        $nearby_places = [];
        if (isset($_POST['place_name']) && is_array($_POST['place_name'])) {
            foreach ($_POST['place_name'] as $idx => $pname) {
                if (!empty(trim($pname))) {
                    $dist = isset($_POST['place_distance'][$idx]) ? trim($_POST['place_distance'][$idx]) : '';
                    $nearby_places[] = [
                        'name'     => trim($pname),
                        'distance' => $dist
                    ];
                }
            }
        }

        // Process Selected Amenity Checkboxes
        $amenity_ids = [];
        if (isset($_POST['amenity_ids']) && is_array($_POST['amenity_ids'])) {
            foreach ($_POST['amenity_ids'] as $aid) {
                $amenity_ids[] = intval($aid);
            }
        }

        $plot_data = [
            'id'             => $plot_id,
            'name'           => isset($_POST['plot_name']) ? trim($_POST['plot_name']) : 'New Plot Project',
            'about'          => isset($_POST['plot_about']) ? trim($_POST['plot_about']) : '',
            'image'          => $image_path,
            'land_area'      => isset($_POST['total_land_area']) ? trim($_POST['total_land_area']) : '',
            'total_plots'    => isset($_POST['total_plots']) ? trim($_POST['total_plots']) : '',
            'plot_sizes'     => isset($_POST['plot_sizes']) ? trim($_POST['plot_sizes']) : '',
            'project_type'   => isset($_POST['project_type']) ? trim($_POST['project_type']) : 'Residential Plots',
            'project_status' => isset($_POST['project_status']) ? trim($_POST['project_status']) : 'Ongoing',
            'address'        => isset($_POST['address']) ? trim($_POST['address']) : '',
            'google_map_url' => isset($_POST['google_map_url']) ? trim($_POST['google_map_url']) : '',
            'nearby_places'  => $nearby_places,
            'status'         => isset($_POST['status']) ? trim($_POST['status']) : 'Active',
            'amenity_ids'    => $amenity_ids
        ];

        if (save_plot_db($plot_data)) {
            echo "Plot Project saved successfully!";
        } else {
            echo "Error saving Plot Project.";
        }
    }

    // Delete Plot
    public function delete_plot($id = 0)
    {
        $id = intval($id);
        if ($id > 0) {
            delete_plot_db($id);
        }
        echo "Plot deleted successfully!";
    }
}
