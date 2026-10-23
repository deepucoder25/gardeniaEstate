<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

// 1. Contact Owner Quick Form
$this->load->view('about_widget');

// 2. Plots & Pricing Cards Grid
$this->load->view('pricing');

// 3. Dynamic Cities Where We Have Plots (From Admin Plot Locations)
$this->load->view('cities_widget');

// 4. Countdown Timer & Site Visit CTA
$this->load->view('countdown_widget');

// 5. Why Choose The Gardenia Estate
$this->load->view('why_choose_widget');

// 6. Location / Connectivity Map & Landmarks
$this->load->view('location');

// 7. Project Gallery Preview
$this->load->view('gallery_widget');

// 8. Frequently Asked Questions
$this->load->view('faqs');
