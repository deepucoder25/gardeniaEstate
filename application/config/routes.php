<?php
defined('BASEPATH') OR exit('No direct script access allowed');
$route['default_controller'] = 'home';
$route['404_override'] = 'home/error';
$route['search'] = 'home/search';

// Admin Project Overview AJAX Routes
$route['project_overview/save_plot'] = 'project_overview/save_plot';
$route['project_overview/save_company_info'] = 'project_overview/save_company_info';
$route['project_overview/save_amenities'] = 'project_overview/save_amenities';
$route['project_overview/delete_plot/(:num)'] = 'project_overview/delete_plot/$1';

// The Gardenia Estate Core Pages Routes
$route['about-project'] = 'about/index';
$route['about-us'] = 'about/index';
$route['project-overview'] = 'home/index';
$route['plot/(:any)'] = 'home/overview/$1';
$route['plot/(:num)'] = 'home/overview/$1';
$route['plots-pricing'] = 'home/plots_page';
$route['plots-inventory'] = 'home/plots_page';
$route['plots'] = 'home/plots_page';
$route['properties'] = 'home/plots_page';
$route['amenities'] = 'home/amenities';
$route['location'] = 'home/location';
$route['gallery'] = 'gallery/photo_gallery';
$route['photo-gallery'] = 'gallery/photo_gallery';
$route['video-gallery'] = 'gallery/video_gallery';
$route['contact-us'] = 'contacts/index';
$route['reviews'] = 'reviews/index';
$route['testimonials'] = 'about/testimonials';
$route['faqs'] = 'home/faq_page';
$route['faq'] = 'home/faq_page';
$route['privacy-policy'] = 'about/privacy';
$route['terms-and-conditions'] = 'about/terms';
$route['legal-disclaimer'] = 'about/disclaimer';
$route['disclaimer'] = 'about/disclaimer';
$route['blogs/(:num)'] = 'blog/index/$1';
$route['blogs/(:any)'] = 'blog/read/$1';
$route['blog/read/(:any)'] = 'blog/read/$1';
$route['blog/(:any)'] = 'blog/read/$1';
$route['blogs'] = 'blog/index';
$route['blog'] = 'blog/index';


$route["(:any).htm"] = "home/error";
$route['translate_uri_dashes'] = FALSE;