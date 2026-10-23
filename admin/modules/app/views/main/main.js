var app=angular.module('groveusCms',['ui.bootstrap','ui.router','summernote','angularUtils.directives.dirPagination']);
app.config(function($stateProvider, $urlRouterProvider)
{
    $urlRouterProvider.otherwise('/home');
    $stateProvider
    	.state('home', {
	        url: '/home',
	        templateUrl: 'dashboard/admin',
	        controller: 'ctrl_dashboard'
    	})
    	.state('contact', {
	        url: '/contact',
	        templateUrl: 'contact',
	        controller: 'ctrl_contact'
		})
		.state('newsletter', {
	        url: '/newsletter',
	        templateUrl: 'newsletter',
	        controller: 'ctrl_newsletter'
		})
		.state('city', {
	        url: '/city',
	        templateUrl: 'city',
	        controller: 'ctrl_city'
		})
		.state('booking', {
	        url: '/booking',
	        templateUrl: 'contact/booking',
	        controller: 'ctrl_booking'
    	})
    	.state('reviews', {
	        url: '/reviews',
	        templateUrl: 'reviews',
	        controller: 'ctrl_reviews'
    	})
    	.state('offers', {
	        url: '/offers',
	        templateUrl: 'offers',
	        controller: 'ctrl_offers'
    	})
    	.state('informations', {
	        url: '/informations',
	        templateUrl: 'informations',
	        controller: 'ctrl_informations'
		})
		.state('organisation', {
	        url: '/organisation',
	        templateUrl: 'organisation',
	        controller: 'ctrl_organisation'
		})
		.state('slider', {
	        url: '/slider',
	        templateUrl: 'slider',
	        controller: 'ctrl_slider'
    	})
    	.state('sub_menu', {
	        url: '/sub_menu',
	        templateUrl: 'sub_menu',
	        controller: 'ctrl_sub_menu'
    	})
    	.state('users', {
	        url: '/users',
	        templateUrl: 'users',
	        controller: 'ctrl_users'
    	})
    	.state('gallery', {
	        url: '/gallery',
	        templateUrl: 'gallery',
	        controller: 'ctrl_gallery'
    	})
    	.state('videogallery', {
	        url: '/videogallery',
	        templateUrl: 'videogallery',
	        controller: 'ctrl_videogallery'
    	})
    	.state('blog', {
	        url: '/blog',
	        templateUrl: 'blog',
	        controller: 'ctrl_blog'
		})
		.state('team', {
	        url: '/team',
	        templateUrl: 'team',
	        controller: 'ctrl_team'
    	})
    	.state('page', {
	        url: '/page',
	        templateUrl: 'page',
	        controller: 'ctrl_page'
    	})
	   	.state('admin_profile', {
	        url: '/admin_profile',
	        templateUrl: 'admin_profile',
	        controller: 'ctrl_admin'
    	})
	    .state('change_logo', {
	        url: '/change_logo',
	        templateUrl: 'change_logo',
	        controller: 'ctrl_change_logo'
	     })
	    .state('change_password', {
	        url: '/change_password',
	        templateUrl: 'login/change_password',
	        controller: 'ctrl_login'
	    })
	    .state('logs', {
	        url: '/logs',
	        templateUrl: 'logs',
	        controller: 'ctrl_logs'
	    })
	    .state('settings', {
	        url: '/settings',
	        templateUrl: 'settings',
	        controller: 'ctrl_settings'
	    })
	    .state('timer', {
	        url: '/timer',
	        templateUrl: 'timer',
	        controller: 'ctrl_timer'
	    })
	    .state('project_overview', {
	        url: '/project_overview',
	        templateUrl: 'project_overview',
	        controller: 'ctrl_project_overview'
	    })
	    .state('company_info', {
	        url: '/company_info',
	        templateUrl: 'project_overview/company_info',
	        controller: 'ctrl_project_overview'
	    })
	    .state('plots_properties', {
	        url: '/plots_properties',
	        templateUrl: 'project_overview/plots_properties',
	        controller: 'ctrl_project_overview'
	    })
	    .state('master_plan', {
	        url: '/master_plan',
	        templateUrl: 'project_overview/master_plan',
	        controller: 'ctrl_project_overview'
	    })
	    .state('amenities', {
	        url: '/amenities',
	        templateUrl: 'project_overview/amenities',
	        controller: 'ctrl_project_overview'
	    })
	    .state('location_map', {
	        url: '/location_map',
	        templateUrl: 'project_overview/location_map',
	        controller: 'ctrl_project_overview'
	    });
});
