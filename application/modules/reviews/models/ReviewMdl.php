<?php
defined('BASEPATH') or exit('No direct script access allowed');

class ReviewMdl extends CI_Model
{
    private function saveToJson($filename, $data) {
        $path = FCPATH . 'admin_data/' . $filename;
        $current_data = [];
        if (file_exists($path)) {
            $current_data = json_decode(file_get_contents($path), true) ?: [];
        }
        $data['id'] = time();
        $data['status'] = 'show';
        $data['created_at'] = date('Y-m-d H:i:s');
        $current_data[] = $data;
        file_put_contents($path, json_encode($current_data, JSON_PRETTY_PRINT));
    }

    //ADD REVIEWS
    public function insert_reviews($data)
    {
        $this->saveToJson('reviews.json', $data);
        return true;
        // return $this->db->insert('reviews', $data);
    }
    
}