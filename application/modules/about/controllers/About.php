<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
class About extends MX_Controller
{
    function index()
    {
        $data['title'] = "About Us | " . $this->comp['company3'];
        $data['description'] = "Learn more about " . $this->comp['company3'] . ", our <?= $experience ?> Years Legacy, infrastructure, expert team, mission, and vision in the packing and moving industry.";
        $data['module'] = "about";
        $data['view_file'] = "about";
        echo Modules::run('template/layout2', $data);
    }

    function choose()
    {
        $data['title'] = "Why Choose Us | " . $this->comp['company3'];
        $data['description'] = "Discover why customers trust " . $this->comp['company3'] . " for safe, reliable, and transparently priced shifting, vehicle transport, and corporate relocation services.";
        $data['module'] = "about";
        $data['view_file'] = "choose";
        echo Modules::run('template/layout2', $data);
    }

    function faqs()
    {
        $data['title'] = "Frequently Asked Questions (FAQs) | " . $this->comp['company3'];
        $data['description'] = "Get answers to common queries about packing and shifting charges, transit insurance, delivery timeline, tracking, and restricted items at " . $this->comp['company3'] . ".";
        $data['module'] = "about";
        $data['view_file'] = "faqs";
        echo Modules::run('template/layout2', $data);
    }

    function testimonials()
    {
        $this->load->database();

        $sample_testimonials = [
            [
                'name' => 'Rahul Sharma',
                'city' => 'Bengaluru',
                'plot' => 'Plot No. B-42',
                'stars' => 5,
                'desc' => 'Purchasing a 1500 sq.ft plot at Devanahalli through Gardenia Estate was the best investment decision for my family. The legal verification was seamless, and loan approval took less than 10 days. Exceptional service!',
                'initials' => 'RS',
                'bg' => 'bg-success'
            ],
            [
                'name' => 'Priya Mehta',
                'city' => 'Mumbai',
                'plot' => 'Plot No. A-18',
                'stars' => 5,
                'desc' => 'The infrastructure setup at The Gardenia Estate is top-notch. Wide asphalt roads, underground power cables, and lush green parks make it feel like a world-class township. Highly recommend Anil Kumar Rauniyar for honest guidance.',
                'initials' => 'PM',
                'bg' => 'bg-primary'
            ],
            [
                'name' => 'Amit Verma',
                'city' => 'Delhi',
                'plot' => 'Plot No. C-15',
                'stars' => 5,
                'desc' => 'Clear documentation and RERA registration gave us complete peace of mind. We visited the site on Saturday and booked our plot immediately. The location proximity to Airport & STRR is a huge plus!',
                'initials' => 'AV',
                'bg' => 'bg-dark'
            ],
            [
                'name' => 'Suresh Kumar',
                'city' => 'Hyderabad',
                'plot' => 'Plot No. D-08',
                'stars' => 5,
                'desc' => 'As an investor looking for high capital appreciation in North Bengaluru, Devanahalli STRR belt was the right pick. The team kept every promise regarding possession timelines and amenity construction.',
                'initials' => 'SK',
                'bg' => 'bg-warning text-dark'
            ],
            [
                'name' => 'Rajesh Patel',
                'city' => 'Ahmedabad',
                'plot' => 'Plot No. B-12',
                'stars' => 5,
                'desc' => 'Very transparent dealing and prompt customer support. From site visit to plot allotment, everything was managed smoothly without any hidden costs.',
                'initials' => 'RP',
                'bg' => 'bg-info text-white'
            ],
            [
                'name' => 'Ananya Sen',
                'city' => 'Kolkata',
                'plot' => 'Plot No. A-05',
                'stars' => 5,
                'desc' => 'Beautiful green surroundings and calm atmosphere. Perfect spot for building our dream villa. Bank loan assistance from HDFC was very quick.',
                'initials' => 'AS',
                'bg' => 'bg-danger'
            ],
            [
                'name' => 'Vikram Malhotra',
                'city' => 'Chandigarh',
                'plot' => 'Plot No. E-22',
                'stars' => 5,
                'desc' => 'Strategic position right on STRR 300ft ring road. Great connectivity to airport and upcoming IT parks. Excellent long-term plot investment.',
                'initials' => 'VM',
                'bg' => 'bg-secondary'
            ],
            [
                'name' => 'Sneha Gupta',
                'city' => 'Pune',
                'plot' => 'Plot No. C-30',
                'stars' => 5,
                'desc' => 'Smooth experience dealing with Anil Kumar Rauniyar. All RERA paperwork and Khata transfer support was provided promptly.',
                'initials' => 'SG',
                'bg' => 'bg-success'
            ],
            [
                'name' => 'Manoj Tiwari',
                'city' => 'Patna',
                'plot' => 'Plot No. B-09',
                'stars' => 5,
                'desc' => 'Visited the project site with my family and was thoroughly impressed by the wide roads and underground electrical cabling.',
                'initials' => 'MT',
                'bg' => 'bg-primary'
            ],
            [
                'name' => 'Kavita Reddy',
                'city' => 'Chennai',
                'plot' => 'Plot No. A-33',
                'stars' => 5,
                'desc' => 'High quality development work and genuine promises. We are very happy with our plot purchase experience at The Gardenia Estate.',
                'initials' => 'KR',
                'bg' => 'bg-warning text-dark'
            ],
            [
                'name' => 'Deepak Nair',
                'city' => 'Kochi',
                'plot' => 'Plot No. D-19',
                'stars' => 5,
                'desc' => 'The sales staff was polite and explained all plot layouts patiently. Smooth registration and immediate physical possession.',
                'initials' => 'DN',
                'bg' => 'bg-dark'
            ],
            [
                'name' => 'Ritu Saxena',
                'city' => 'Lucknow',
                'plot' => 'Plot No. C-04',
                'stars' => 5,
                'desc' => 'Clear titles and SBI loan approval made our purchase decision stress-free. Wonderful community project!',
                'initials' => 'RS',
                'bg' => 'bg-info text-white'
            ]
        ];

        $all_testimonials = $sample_testimonials;

        $per_page = 6;
        $total_items = count($all_testimonials);
        $page = $this->input->get('page') ? max(1, (int)$this->input->get('page')) : 1;
        $offset = ($page - 1) * $per_page;
        $paged_testimonials = array_slice($all_testimonials, $offset, $per_page);
        $total_pages = ceil($total_items / $per_page);

        $data['testimonials'] = $paged_testimonials;
        $data['current_page'] = $page;
        $data['total_pages'] = $total_pages;

        $data['title'] = "Customer Reviews & Testimonials | " . $this->comp['company3'];
        $data['description'] = "Read genuine client testimonials and feedback about " . $this->comp['company3'] . " residential plots and township.";
        $data['module'] = "about";
        $data['view_file'] = "testimonials";
        echo Modules::run('template/layout2', $data);
    }

    function reviews()
    {
        // Redirect to main reviews module
        redirect('reviews');
    }

    function privacy()
    {
        $data['title'] = "Privacy Policy | " . $this->comp['company3'];
        $data['description'] = "How " . $this->comp['company3'] . " handles and protects your personal data during your relocation.";
        $data['module'] = "about";
        $data['view_file'] = "privacy";
        echo Modules::run('template/layout2', $data);
    }

    function terms()
    {
        $data['title'] = "Terms & Conditions | " . $this->comp['company3'];
        $data['description'] = "The terms and conditions governing our relocation services at " . $this->comp['company3'] . ".";
        $data['module'] = "about";
        $data['view_file'] = "terms";
        echo Modules::run('template/layout2', $data);
    }

    function disclaimer()
    {
        $data['title'] = "Legal Disclaimer | " . $this->comp['company3'];
        $data['description'] = "Official RERA real estate legal disclaimer and website usage terms for " . $this->comp['company3'] . ".";
        $data['module'] = "about";
        $data['view_file'] = "disclaimer";
        echo Modules::run('template/layout2', $data);
    }
}

