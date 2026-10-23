<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
class Reviews extends MX_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('session');
        $this->load->helper('url');
    }

    public function testimonials()
    {
        $this->index();
    }

    function index()
    {
        $this->load->database();
        $this->load->library('pagination');
        
        $star_filter = $this->input->get('star');
        
        // Count total active reviews for pagination
        $this->db->where('status', 1);
        if ($star_filter) {
            $this->db->where('stars', $star_filter);
        }
        $total_rows = $this->db->count_all_results('reviews');
        
        // Pagination Config (6 items per page)
        $config['base_url'] = site_url('reviews');
        $config['total_rows'] = $total_rows;
        $config['per_page'] = 6;
        $config['page_query_string'] = TRUE;
        $config['reuse_query_string'] = TRUE;
        
        $config['full_tag_open'] = '<ul class="pagination justify-content-center gap-2 my-4">';
        $config['full_tag_close'] = '</ul>';
        $config['prev_link'] = '&laquo;';
        $config['prev_tag_open'] = '<li class="page-item">';
        $config['prev_tag_close'] = '</li>';
        $config['next_link'] = '&raquo;';
        $config['next_tag_open'] = '<li class="page-item">';
        $config['next_tag_close'] = '</li>';
        $config['cur_tag_open'] = '<li class="page-item active"><a href="javascript:void(0)" class="page-link rounded-circle bg-success border-success text-white d-flex align-items-center justify-content-center icon-box-40">';
        $config['cur_tag_close'] = '</a></li>';
        $config['num_tag_open'] = '<li class="page-item">';
        $config['num_tag_close'] = '</li>';
        $config['first_link'] = '&laquo;&laquo;';
        $config['first_tag_open'] = '<li class="page-item">';
        $config['first_tag_close'] = '</li>';
        $config['last_link'] = '&raquo;&raquo;';
        $config['last_tag_open'] = '<li class="page-item">';
        $config['last_tag_close'] = '</li>';
        $config['attributes'] = array('class' => 'page-link text-success bg-white border shadow-sm rounded-circle d-flex align-items-center justify-content-center', 'style' => 'width: 40px; height: 40px;');
        
        $this->pagination->initialize($config);
        
        $offset = $this->input->get('per_page') ? (int) $this->input->get('per_page') : 0;

        // Fetch data
        $this->db->order_by('r_id', 'desc');
        $this->db->where('status', 1);
        if ($star_filter) {
            $this->db->where('stars', $star_filter);
        }
        
        $query = $this->db->get('reviews', $config['per_page'], $offset);
        
        $data['reviews'] = $query;
        $data['pagination'] = $this->pagination->create_links();
        $data['title'] = "Customer Reviews & Ratings | " . $this->comp['company3'];
        $data['description'] = "Detailed feedback and ratings from our satisfied clients. Read real reviews about our freight forwarding services at " . $this->comp['company3'] . ".";
        $data['module'] = "reviews";
        $data['view_file'] = "reviews";
        echo Modules::run('template/layout2', $data);
    }

    function submit() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $this->load->database();
            
            $email = $this->input->post('email');
            
            // Check if email already exists
            $this->db->where('email', $email);
            $existing = $this->db->get('reviews');
            
            if ($existing->num_rows() > 0) {
                $this->session->set_flashdata('error', 'You have already submitted a review with this email address.');
                redirect('reviews');
                return;
            }
            
            $uploaded_images = [];
            if (isset($_FILES['review_images']) && !empty($_FILES['review_images']['name'][0])) {
                $upload_path = FCPATH . 'assets/images/reviews/';
                if (!is_dir($upload_path)) mkdir($upload_path, 0777, true);
                
                $files = $_FILES['review_images'];
                $count = count($files['name']);
                
                for($i=0; $i<$count; $i++) {
                    $tmp_name = $files['tmp_name'][$i];
                    $name = $files['name'][$i];
                    $error = $files['error'][$i];
                    $size = $files['size'][$i];
                    
                    if ($error === UPLOAD_ERR_OK) {
                        $finfo = finfo_open(FILEINFO_MIME_TYPE);
                        $mime = finfo_file($finfo, $tmp_name);
                        finfo_close($finfo);
                        
                        $allowed_mimes = ['image/jpeg', 'image/png', 'image/webp', 'image/jpg'];
                        if (in_array($mime, $allowed_mimes)) {
                            // Convert everything to jpg for simplicity and compression
                            $new_name = uniqid('rev_') . '.jpg';
                            $dest = $upload_path . $new_name;
                            
                            if ($size > 150000) {
                                // Compress and resize if over 150KB
                                $info = getimagesize($tmp_name);
                                if ($info) {
                                    $image = null;
                                    if ($mime == 'image/jpeg' || $mime == 'image/jpg') $image = @imagecreatefromjpeg($tmp_name);
                                    elseif ($mime == 'image/png') $image = @imagecreatefrompng($tmp_name);
                                    elseif ($mime == 'image/webp') $image = @imagecreatefromwebp($tmp_name);
                                    
                                    if ($image) {
                                        // Handle PNG transparency to white background
                                        if ($mime == 'image/png' || $mime == 'image/webp') {
                                            $bg = imagecreatetruecolor(imagesx($image), imagesy($image));
                                            imagefill($bg, 0, 0, imagecolorallocate($bg, 255, 255, 255));
                                            imagealphablending($bg, TRUE);
                                            imagecopy($bg, $image, 0, 0, 0, 0, imagesx($image), imagesy($image));
                                            imagedestroy($image);
                                            $image = $bg;
                                        }
                                        
                                        $width = imagesx($image);
                                        $height = imagesy($image);
                                        if ($width > 800) {
                                            $new_width = 800;
                                            $new_height = floor($height * (800 / $width));
                                            $tmp_img = imagecreatetruecolor($new_width, $new_height);
                                            imagecopyresampled($tmp_img, $image, 0, 0, 0, 0, $new_width, $new_height, $width, $height);
                                            $image = $tmp_img;
                                        }
                                        imagejpeg($image, $dest, 60);
                                        imagedestroy($image);
                                        $uploaded_images[] = 'assets/images/reviews/' . $new_name;
                                    }
                                }
                            } else {
                                // If it's small enough but not a jpeg, we still rename it to jpg but we should convert it
                                // Or we just keep the original extension if it's small. Let's keep original extension.
                                $ext = pathinfo($name, PATHINFO_EXTENSION);
                                $new_name = uniqid('rev_') . '.' . $ext;
                                $dest = $upload_path . $new_name;
                                move_uploaded_file($tmp_name, $dest);
                                $uploaded_images[] = 'assets/images/reviews/' . $new_name;
                            }
                        }
                    }
                }
            }
            
            $r_img_val = implode(',', $uploaded_images);
            
            $data = array(
                'name' => $this->input->post('name'),
                'email' => $this->input->post('email'),
                'r_title' => $this->input->post('city'), // We use r_title to store city
                'r_desc' => $this->input->post('review'),
                'stars' => (int) $this->input->post('rating'),
                'status' => 1, // Auto approve (direct show)
                'b_id' => 0,
                'r_img' => $r_img_val,
                'views' => 0,
                'posted_date' => date('Y-m-d H:i:s')
            );
            
            $this->db->insert('reviews', $data);
            
            $this->session->set_flashdata('success', 'Thank you! Your review has been submitted successfully.');
            redirect('reviews');
        }
    }
}