<?php if (!defined('BASEPATH')) exit('No direct script access allowed'); ?>

<!-- Breadcrumbs Section -->
<?php $this->load->view('about/dynamic_breadcrumbs', [
    'bc_h1' => 'Why Choose Us',
    'bc_desc' => "Why Choose " . (isset($company3) ? $company3 : 'The Gardenia Estate'),
    'breadcrumbs' => [
        ['name' => 'Why Choose Us']
    ]
]);
?>

<!-- Why Choose Us Content Section -->
<?php $this->load->view('home/why_choose_widget'); ?>