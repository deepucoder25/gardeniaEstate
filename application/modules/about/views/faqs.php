<?php if (!defined('BASEPATH')) exit('No direct script access allowed'); ?>

<!-- FAQs Content Section (2 Per Row on Desktop col-md-6, 1 Per Row on Mobile col-12) -->
<?php 
$show_breadcrumbs = true;
$this->load->view('home/faq_page', ['show_breadcrumbs' => true]); 
?>