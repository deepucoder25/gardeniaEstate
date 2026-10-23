<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Settings extends MX_Controller{
    function __construct()
    {
        parent::__construct();
        if (!$this->session->userdata('username')) { redirect('login'); }
    }
	public function index()
	{
		$this->load->view('settings_view');
	}
    
    public function update()
    {
        $response = "";
        
        $config['upload_path']          = './assets/images/logo/';
        $config['allowed_types']        = 'gif|jpg|png|jpeg|ico';
        $config['overwrite']            = TRUE;

        // Make sure directory exists
        if (!is_dir($config['upload_path'])) {
            mkdir($config['upload_path'], 0777, TRUE);
        }

        $this->load->library('upload', $config);

        if (!empty($_FILES['site_logo']['name'])) {
            $config['file_name'] = 'logo.png';
            $this->upload->initialize($config);
            if ($this->upload->do_upload('site_logo')) {
                $response .= "Logo updated. ";
            } else {
                $response .= "Logo Error: " . $this->upload->display_errors('','') . ". ";
            }
        }
        
        if (!empty($_FILES['site_favicon']['name'])) {
            $config['file_name'] = 'favicon.png';
            $this->upload->initialize($config);
            if ($this->upload->do_upload('site_favicon')) {
                $response .= "Favicon updated. ";
            } else {
                $response .= "Favicon Error: " . $this->upload->display_errors('','') . ". ";
            }
        }
        
        if (isset($_POST['theme_color']) && !empty($_POST['theme_color'])) {
            $theme_color = $_POST['theme_color'];
            file_put_contents('./assets/theme_color.txt', $theme_color);
            $response .= "Theme color updated. ";
        }
        
        if (isset($_POST['text_color']) && !empty($_POST['text_color'])) {
            $text_color = $_POST['text_color'];
            file_put_contents('./assets/text_color.txt', $text_color);
            $response .= "Text color updated. ";
        }
        
        if (isset($_POST['breadcrumb_color']) && !empty($_POST['breadcrumb_color'])) {
            $breadcrumb_color = $_POST['breadcrumb_color'];
            file_put_contents('./assets/breadcrumb_color.txt', $breadcrumb_color);
            $response .= "Breadcrumb color updated. ";
        }
        
        if ($response == "") {
            echo "No changes made.";
        } else {
            echo $response;
        }
    }
    
    public function update_labels()
    {
        $labels = [];
        // Read existing labels so we don't overwrite unrelated keys if any
        if (file_exists('./assets/menu_labels.json')) {
            $labels = json_decode(file_get_contents('./assets/menu_labels.json'), true) ?: [];
        }

        $default_keys = [
            'label_dashboard', 'label_blog', 'label_bookings', 'label_contacts', 
            'label_reviews', 'label_gallery', 'label_videogallery', 
            'label_shipments', 'label_tracking', 'label_logs', 'label_settings',
            'dash_dashboard', 'dash_blog', 'dash_bookings', 'dash_contacts', 
            'dash_reviews', 'dash_gallery', 'dash_videogallery', 
            'dash_shipments', 'dash_tracking', 'dash_logs', 'dash_settings',
            'dash_desktop_col', 'dash_mobile_col',
            'book_label_date', 'book_label_client', 'book_label_contact',
            'book_label_freight', 'book_label_route', 'book_label_lead',
            'book_label_loss', 'book_label_action'
        ];
        
        foreach ($default_keys as $key) {
            if (isset($_POST[$key])) {
                $labels[$key] = $_POST[$key];
            }
            
            // Handle visibility toggles for sidebar and dashboard labels
            if (strpos($key, 'label_') === 0 || (strpos($key, 'dash_') === 0 && $key !== 'dash_desktop_col' && $key !== 'dash_mobile_col')) {
                $show_key = "show_" . $key;
                $labels[$show_key] = isset($_POST[$show_key]) ? "1" : "0";
            }
        }
        
        file_put_contents('./assets/menu_labels.json', json_encode($labels));
        echo "Menu settings updated successfully.";
    }
}
