<style>
	/* Modern Navigation Design */
	#hoe-left-panel {
		background: #ffffff;
		border-right: 1px solid #e6edf3;
		box-shadow: 4px 0 14px rgba(16, 36, 56, 0.08);
	}

	.profile-box {
		padding: 24px 20px;
		border-bottom: 1px solid #eef2f6;
		background: #ffffff;
		transition: all 0.3s ease;
	}

	.profile-box .media {
		display: flex;
		align-items: center;
		gap: 12px;
	}

	.profile-box a {
		text-decoration: none !important;
		width: 100%;
	}

	.profile-box .media-body {
		flex: 1;
	}

	.profile-box h5.media-heading {
		margin: 0 0 4px 0;
		font-size: 14px;
		font-weight: 600;
		color: #1f2d3d;
		letter-spacing: 0.2px;
	}

	.profile-box h5.media-heading b {
		color: #0f3d5e !important;
		font-weight: 700;
	}

	.profile-box small {
		color: #7c8b9a !important;
		font-size: 12px;
		font-weight: 500;
		text-transform: uppercase;
		letter-spacing: 0.5px;
	}

	.panel-list {
		list-style: none;
		padding: 12px 0;
		margin: 0;
	}

	.panel-list li {
		margin: 0;
		padding: 0;
	}

	.panel-list li a {
		display: flex;
		align-items: center;
		gap: 12px;
		padding: 12px 16px;
		margin: 4px 8px;
		color: #111827 !important;
		font-weight: 600;
		background: #ffffff;
		opacity: 1;
		text-decoration: none;
		font-size: 13px;
		font-weight: 500;
		border-radius: 6px;
		transition: all 0.2s cubic-bezier(0.4, 0, 0.2, 1);
		position: relative;
		border-left: 3px solid transparent;
	}

	.panel-list li a i {
		font-size: 16px;
		width: 20px;
		text-align: center;
		color: #111827 !important;
		transition: all 0.2s ease;
	}

	.panel-list li a span.menu-text {
		flex: 1;
		letter-spacing: 0.2px;
	}

	.panel-list li a span.menu-text u {
		text-decoration: none;
		border-bottom: 2px dotted #0f3d5e;
	}

	.panel-list li a:hover {
		background-color: #f1f5f9;
		color: #111827;
		border-left-color: #1f2d3d;
	}

	.panel-list li a:hover i {
		color: #1f2d3d;
		transform: translateX(2px);
	}

	#hoe-left-panel .panel-list > li.active > a {
		background: #f1f5f9;
		border-top: 1px solid rgba(31, 45, 61, 0.2);
		color: #111827;
	}

	#hoe-left-panel .panel-list > li.active > a i {
		color: #111827;
	}

	.panel-list li a span.selected {
		display: none;
	}

	.panel-list li ul li {
		padding: 0;
	}

	.panel-list li ul li a {
		padding-left: 44px;
		font-size: 12px;
		color: #5f6f7f;
	}

	.panel-list li ul li a:hover {
		background-color: #f1f5f9;
		color: #0f3d5e;
	}

	/* Smooth scrollbar */
	#hoe-left-panel::-webkit-scrollbar {
		width: 6px;
	}

	#hoe-left-panel::-webkit-scrollbar-track {
		background: transparent;
	}

	#hoe-left-panel::-webkit-scrollbar-thumb {
		background: #cfd8e3;
		border-radius: 3px;
		transition: background 0.2s;
	}

	#hoe-left-panel::-webkit-scrollbar-thumb:hover {
		background: #9fb0c3;
	}
</style>
<div id="hoeapp-container" hoe-lpanel-effect="default">
	<aside id="hoe-left-panel" hoe-position-type="absolute"
		style="height: 50px; overflow: scroll">
		<div class="profile-box">
			<div class="media">
				<a href="#/home" title="Go to dashboard">
					<div class="media-body">
						<h5 class="media-heading">
							Welcome! <b><?=$this->session->userdata('name');?></b>
						</h5>
						<small>Administrator</small>
					</div>
				</a>
			</div>
		</div>
		<?php
		$menu_labels = [];
		if (file_exists('./assets/menu_labels.json')) {
		    $menu_labels = json_decode(file_get_contents('./assets/menu_labels.json'), true);
		}
		
		function get_label($labels, $key, $default) {
		    return (isset($labels[$key]) && !empty($labels[$key])) ? htmlspecialchars($labels[$key]) : $default;
		}
        
        function is_visible($labels, $key) {
            $show_key = "show_" . $key;
            return (!isset($labels[$show_key]) || $labels[$show_key] === "1");
        }
		?>
		<ul class="nav panel-list">
            <?php if(is_visible($menu_labels, 'label_dashboard')): ?>
			<li><a accesskey="h" href="#/home" title="Dashboard (Alt+H)"><i class="fa fa-dashboard"></i>
				<span class="menu-text"><?= get_label($menu_labels, 'label_dashboard', 'Dashboard') ?></span></a>
			</li>
            <?php endif; ?>

			<li><a accesskey="i" href="#/company_info" title="Company Info"><i class="fa fa-info-circle"></i>
				<span class="menu-text">Company Info</span></a>
			</li>
			<li><a accesskey="p" href="#/plots_properties" title="Plots / Properties"><i class="fa fa-th-large"></i>
				<span class="menu-text">Plots/Properties</span></a>
			</li>
			<li><a accesskey="a" href="#/amenities" title="Amenities"><i class="fa fa-tree"></i>
				<span class="menu-text">Amenities</span></a>
			</li>
            
            <?php if(is_visible($menu_labels, 'label_blog')): ?>
			<li><a accesskey="b" href="#/blog" title="Blog Management (Alt+B)"><i class="fa fa-newspaper-o"></i>
				<span class="menu-text"><?= get_label($menu_labels, 'label_blog', 'Blog') ?></span></a>
			</li>
            <?php endif; ?>
            
            <?php if(is_visible($menu_labels, 'label_bookings')): ?>
			<li><a accesskey="k" href="#/booking" title="Booking Management (Alt+K)"><i class="fa fa-calendar"></i>
				<span class="menu-text"><?= get_label($menu_labels, 'label_bookings', 'Bookings') ?></span></a>
			</li>
            <?php endif; ?>
            
            <?php if(is_visible($menu_labels, 'label_contacts')): ?>
			<li><a accesskey="c" href="#/contact" title="Contact Messages (Alt+C)"><i class="fa fa-envelope"></i>
				<span class="menu-text"><?= get_label($menu_labels, 'label_contacts', 'Contacts') ?></span></a>
			</li>
            <?php endif; ?>

            <?php if(is_visible($menu_labels, 'label_reviews')): ?>
			<li><a accesskey="r" href="#/reviews" title="Reviews & Ratings (Alt+R)"><i class="fa fa-star"></i>
				<span class="menu-text"><?= get_label($menu_labels, 'label_reviews', 'Reviews') ?></span></a>
			</li>
            <?php endif; ?>

            <?php if(is_visible($menu_labels, 'label_gallery')): ?>
			<li><a accesskey="g" href="#/gallery" title="Photo Gallery (Alt+G)"><i class="fa fa-image"></i>
				<span class="menu-text"><?= get_label($menu_labels, 'label_gallery', 'Photo Gallery') ?></span></a>
			</li>
            <?php endif; ?>
            
            <?php if(is_visible($menu_labels, 'label_videogallery')): ?>
			<li><a accesskey="v" href="#/videogallery" title="Video Gallery (Alt+V)"><i class="fa fa-video-camera"></i>
				<span class="menu-text"><?= get_label($menu_labels, 'label_videogallery', 'Video Gallery') ?></span></a>
			</li>
            <?php endif; ?>
            
            <?php if(is_visible($menu_labels, 'label_logs')): ?>
			<li><a accesskey="x" href="#/logs" title="System Logs (Alt+X)"><i class="fa fa-list-alt"></i>
				<span class="menu-text"><?= get_label($menu_labels, 'label_logs', 'Logs') ?></span></a>
			</li>
            <?php endif; ?>
            
            <?php if(is_visible($menu_labels, 'label_settings')): ?>
			<li><a accesskey="c" href="#/settings" title="Admin Settings (Alt+C)"><i class="fa fa-cog"></i>
				<span class="menu-text"><?= get_label($menu_labels, 'label_settings', 'Settings') ?></span></a>
			</li>
            <?php endif; ?>

			<li><a accesskey="m" href="#/timer" title="Countdown Timer (Alt+M)"><i class="fa fa-clock-o"></i>
				<span class="menu-text">Countdown Timer</span></a>
			</li>
		</ul>
	</aside>
	<section id="main-content">
