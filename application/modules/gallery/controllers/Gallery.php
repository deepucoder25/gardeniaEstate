<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Gallery extends MX_Controller {
    
    public function __construct() {
        parent::__construct();
        $this->load->database();
    }

    function photo_gallery()
    {
        $data['title'] = "Photo Gallery | " . $this->comp['company3'];
        $data['description'] = "Explore visual renders, aerial views, master plan layouts, and clubhouse designs of The Gardenia Estate STRR Devanahalli.";
        
        $this->db->where('status', 1);
        $this->db->order_by('auto_id', 'DESC');
        $data['photos'] = $this->db->get('gallery')->result();
        
        $data['module'] = "gallery";
        $data['view_file'] = "photo-gallery";
        echo Modules::run('template/layout2', $data);
    }

    function video_gallery()
    {
        $data['title'] = "Video Gallery | " . $this->comp['company3'];
        $data['description'] = "Watch our step-by-step cargo handling processes, transport safety standards, and global freight forwarding operations in action at " . $this->comp['company3'] . ".";
        
        $this->db->where('status', 1);
        $this->db->order_by('auto_id', 'DESC');
        $data['videos'] = $this->db->get('video_gallery')->result();
        
        $data['module'] = "gallery";
        $data['view_file'] = "video-gallery";
        echo Modules::run('template/layout2', $data);
    }
}