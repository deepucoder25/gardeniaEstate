<?php if (!defined('BASEPATH')) exit('No direct script access allowed'); ?>
<?php
class Home extends MX_Controller
{
    function error()
    {
        $this->oldurl_to_newurl();
        $data['title'] = "Page Not Found | " . $this->comp['company3'];
        $data['description'] = "The requested page was not found at " . $this->comp['company3'] . ".";
        $data['module'] = "home";
        $data['view_file'] = "error";
        echo Modules::run('template/layout2', $data);
    }

    function index()
    {
        $data['title'] = $this->comp['company3'] . " | Luxury Plots in Bagdogra, Siliguri";
        $data['description'] = "Explore premium residential and commercial plots, world-class amenities, and strategic connectivity.";
        $data['module'] = "home";
        $data['view_file'] = "home";
        echo Modules::run('template/layout1', $data);
    }

    function overview($id = '')
    {
        if (empty($id) && isset($_GET['id'])) {
            $id = $_GET['id'];
        }
        if (empty($id)) {
            redirect(site_url('#plotsPricingSection'));
            return;
        }

        // Canonical Slug Redirect if numeric ID (e.g., plot/2 -> plot/gardenia-commercial-boulevard)
        $plots = get_plots_master();
        if (is_array($plots)) {
                foreach ($plots as $p) {
                    $p_id = isset($p['id']) ? (string)$p['id'] : '';
                    if ((string)$id === $p_id && !empty($p['name'])) {
                        $slug = strtolower(trim(preg_replace('/[^a-z0-9\s-]/i', '', $p['name'])));
                        $slug = trim(preg_replace('/[\s-]+/', '-', $slug), '-');
                        if (!empty($slug)) {
                            redirect(site_url('plot/' . $slug));
                            return;
                        }
                    }
                }
            }

        $data['selected_plot_id'] = $id;
        $data['title'] = "Plot Details | " . $this->comp['company3'];
        $data['description'] = "Explore complete plot specifications, land area, location, map, and amenities.";
        $data['module'] = "home";
        $data['view_file'] = "overview";
        echo Modules::run('template/layout2', $data);
    }

    function plots()
    {
        redirect('plots');
    }

    function pricing()
    {
        redirect('plots');
    }

    function amenities()
    {
        $data['title'] = "World Class Amenities | " . $this->comp['company3'];
        $data['description'] = "Discover world-class amenities including Clubhouse, Swimming Pool, Fitness Center, and Green Parks.";
        $data['module'] = "home";
        $data['view_file'] = "amenities";
        $data['show_breadcrumbs'] = true;
        echo Modules::run('template/layout2', $data);
    }

    function location()
    {
        redirect(site_url());
    }

    function faqs()
    {
        redirect('faqs');
    }

    public function oldurl_to_newurl() {}
}

