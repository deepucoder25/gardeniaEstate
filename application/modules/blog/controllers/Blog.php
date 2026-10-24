<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Blog extends MX_Controller {

    function __construct(){
        parent::__construct();
    }

    private function slugify($text) {
        $text = strtolower($text);
        $text = preg_replace('~[^a-z0-9\s-]~', '', $text);
        $text = preg_replace('~[\s-]+~', '-', $text);
        return trim($text, '-');
    }

    private function loadBlogs() {
        $this->load->database();
        $blogs = [];

        if ($this->db->table_exists('blog')) {
            $this->db->order_by('b_id', 'desc');
            $query = $this->db->get('blog');
            if ($query && $query->num_rows() > 0) {
                foreach ($query->result_array() as $row) {
                    $blogs[] = [
                        'id' => $row['b_id'],
                        'b_id' => $row['b_id'],
                        'title' => $row['title'],
                        'slug' => !empty($row['slug']) ? $row['slug'] : $this->slugify($row['title']),
                        'description' => $row['description'],
                        'content' => $row['description'],
                        'author' => !empty($row['author']) ? $row['author'] : 'The Gardenia Estate',
                        'created_at' => !empty($row['date']) ? $row['date'] : date('Y-m-d H:i:s'),
                        'image' => !empty($row['image']) ? $row['image'] : ''
                    ];
                }
            }
        }

        return $blogs;
    }

    function index($offset = 0) {
        $this->view($offset);
    }

    function view($offset = 0){
        $this->load->library('pagination');
        $this->load->helper('text'); 

        $all_blogs = $this->loadBlogs();
        $total_rows = count($all_blogs);
        $per_page = 3; // 3 Cards per page as requested

        // Handle offset passed as parameter or from uri segment
        if (empty($offset)) {
            $offset = (int) $this->uri->segment(2);
        } else {
            $offset = (int) $offset;
        }

        $config['base_url'] = site_url('blogs');
        $config['total_rows'] = $total_rows;
        $config['per_page'] = $per_page;
        $config['uri_segment'] = 2;

        $config['full_tag_open'] = '<nav aria-label="Blog Pagination"><ul class="pagination justify-content-center gap-2 my-4">';
        $config['full_tag_close'] = '</ul></nav>';
        $config['prev_link'] = '<i class="bi bi-chevron-left"></i>';
        $config['prev_tag_open'] = '<li class="page-item">';
        $config['prev_tag_close'] = '</li>';
        $config['next_link'] = '<i class="bi bi-chevron-right"></i>';
        $config['next_tag_open'] = '<li class="page-item">';
        $config['next_tag_close'] = '</li>';
        $config['cur_tag_open'] = '<li class="page-item active"><a href="javascript:void(0)" class="page-link rounded-circle bg-success border-success text-white fw-bold shadow-sm d-flex align-items-center justify-content-center icon-box-42">';
        $config['cur_tag_close'] = '</a></li>';
        $config['num_tag_open'] = '<li class="page-item">';
        $config['num_tag_close'] = '</li>';
        $config['attributes'] = array('class' => 'page-link text-success bg-white border shadow-sm rounded-circle d-flex align-items-center justify-content-center fw-bold custom-page-link', 'style' => 'width: 42px; height: 42px;');

        $this->pagination->initialize($config);

        $data['blogs'] = array_slice($all_blogs, $offset, $per_page);
        $data['total'] = $total_rows;
        $data['recent_posts'] = array_slice($all_blogs, 0, 5);

        $data['title'] = "Real Estate Insights & News Blog | " . $this->comp['company3'];
        $data['description'] = "Read latest market trends, plot investment guides, and township updates from " . $this->comp['company3'] . ".";
        $data['module'] = "blog";
        $data['view_file'] = "blog"; 

        echo Modules::run('template/layout2', $data);
    }

    function read($slug = '') {
        $this->load->helper('text');

        $all_blogs = $this->loadBlogs();
        $selected_blog = null;
        
        $search_slug = str_replace('_', '-', $slug);

        foreach ($all_blogs as $b) {
            $custom_slug = $b['slug'] ?? '';
            $auto_slug = $this->slugify($b['title']);
            
            if (
                (!empty($custom_slug) && strtolower($custom_slug) == strtolower($search_slug)) || 
                (strtolower($auto_slug) == strtolower($search_slug)) ||
                (isset($b['id']) && $b['id'] == $search_slug) ||
                (isset($b['b_id']) && $b['b_id'] == $search_slug)
            ) {
                $selected_blog = (object) $b;
                break;
            }
        }

        if ($selected_blog) {
            $data['query'] = [$selected_blog];
            $data['recent_posts'] = array_slice($all_blogs, 0, 5);
            
            $data['title'] = ucfirst($selected_blog->title) . " | " . $this->comp['company3'];
            $data['description'] = word_limiter(strip_tags($selected_blog->description), 200);
            
            $image_file = $selected_blog->image;
            $data['img'] = ($image_file && file_exists(FCPATH . 'uploads/blogs/' . $image_file)) ? base_url('uploads/blogs/'.$image_file) : base_url('assets/images/slider/gardenia_hero.webp');
            
            $data['module'] = "blog";
            $data['view_file'] = "view"; 

            echo Modules::run('template/layout2', $data);
        } else {
            redirect('blogs');
        }
    }
}
