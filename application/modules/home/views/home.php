<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

// 1. Contact Owner Quick Form
$this->load->view('about_widget');

// 2. Plots & Pricing Cards Grid
$this->load->view('pricing');

// 3. Why Choose The Gardenia Estate
$this->load->view('why_choose_widget');

// 5. Project Gallery Preview
$this->load->view('gallery_widget');

// 7. Frequently Asked Questions
$this->load->view('faqs');
