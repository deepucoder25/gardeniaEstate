<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?= $this->session->userdata('name'); ?> <?= date("D d M Y") ?></title>
    <link rel="icon" type="image/webp" href="<?= base_url('assets/images/logo/favicon.webp') ?>">
    <link rel="shortcut icon" type="image/webp" href="<?= base_url('assets/images/logo/favicon.webp') ?>">
    <link href="<?= base_url("assets") ?>/admin/css/main.css" rel="stylesheet">
    <style type="text/css">
        @media print {

            aside,
            header,
            .col-lg-12,
            .myhead,
            hr {
                display: none !important;
            }

            #printarea {
                margin-top: -30px;
                margin-left: -230px;
            }

        }
    </style>
    
    <?php
    $theme_color = '';
    if (file_exists('./assets/theme_color.txt')) {
        $saved_color = file_get_contents('./assets/theme_color.txt');
        if (!empty($saved_color)) {
            $theme_color = htmlspecialchars(trim($saved_color));
        }
    }
    
    $text_color = '';
    if (file_exists('./assets/text_color.txt')) {
        $saved_text = file_get_contents('./assets/text_color.txt');
        if (!empty($saved_text)) {
            $text_color = htmlspecialchars(trim($saved_text));
        }
    }
    
    if (!empty($theme_color) || !empty($text_color)):
    ?>
    <style type="text/css">
        /* Dynamic Theme Color Override */
        <?php if (!empty($theme_color)): ?>
        .stat-card .card-icon {
            background: <?= $theme_color ?> !important;
        }
        .card-badge, .card-value, .view-link, .stat-card:hover .view-link {
            color: <?= $theme_color ?> !important;
        }
        .stat-card::before {
            background: <?= $theme_color ?> !important;
        }
        
        /* General admin panel theme overrides if necessary */
        .btn-primary { background-color: <?= $theme_color ?> !important; border-color: <?= $theme_color ?> !important; }
        .panel-heading, .bg-primary { background-color: <?= $theme_color ?> !important; color: white !important;}
        #hoe-left-panel .panel-list > li.active > a i, 
        #hoe-left-panel .panel-list li ul li a:hover {
            color: <?= $theme_color ?> !important;
        }
        <?php endif; ?>
        
        /* Dynamic Text Color Override */
        <?php if (!empty($text_color)): ?>
        body, p, span, div, td, th, label, .card-title, .header-subtitle, .menu-text, .panel-title, h1, h2, h3, h4, h5, h6 {
            color: <?= $text_color ?>;
        }
        /* Specific exceptions if they are not meant to be overwritten */
        .card-badge, .card-value, .view-link, .btn {
            /* Retain original theme colors for these */
        }
        <?php endif; ?>
    </style>
    <?php endif; ?>
</head>

<body ng-app="groveusCms" hoe-navigation-type="vertical" hoe-nav-placement="left" theme-layout="wide-layout"
    class="view-animate-container">
    <div id="hoeapp-wrapper" class="hoe-hide-lpanel" hoe-device-type="desktop" class="view-animate">
        <header id="hoe-header" hoe-lpanel-effect="default">
            <div class="hoe-left-header">
                <a href="#">
                    <img id="logo1a" src="<?= base_url() ?>assets/images/logo/logo.webp"
                        style="display:inline-block;height: 45px;">
                    <span></span>
                </a>
            </div>
            <span class="hoe-sidebar-toggle visible-xs"><a id="sidebtn" href=""></a></span>
            <div class="hoe-right-header" hoe-position-type="relative">
                <?php if ($this->session->userdata('username')): ?>
                    <span class="hoe-sidebar-toggle"><a id="sidebtn" href=""></a></span>

                    <ul class="right-navbar">

                        <li><button onClick="window.location.reload();" class="btn btn-default">
                                <i class="fa fa-refresh"></i></button></li>
                        <li class="dropdown hoe-rheader-submenu hoe-header-profile">
                            <a href="javascript:void(0)" class="dropdown-toggle" data-toggle="dropdown">
                                <span><span class="fa fa-user"></span>
                                    <i class=" fa fa-angle-down"></i></span>
                            </a>
                            <ul class="dropdown-menu ">
                                <li><a href="#logs"><i class="fa fa-list"></i>View Logs</a></li>
                                <li><a href="#change_password"><i class="fa fa-lock"></i>Change Password</a></li>
                                <li><a href="<?= site_url() ?>/login/logout"><i class="fa fa-power-off"></i>Logout</a></li>
                            </ul>
                        </li>

                    </ul>
                <?php endif ?>
            </div>
        </header>