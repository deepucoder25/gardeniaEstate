<style>
    .settings-panel {
        background: #fff;
        border-radius: 8px;
        box-shadow: 0 2px 10px rgba(0,0,0,0.05);
        border: 1px solid #eef2f5;
        margin-bottom: 24px;
    }
    .settings-panel .panel-heading {
        background: #f8fafc;
        border-bottom: 1px solid #eef2f5;
        padding: 16px 20px;
        border-top-left-radius: 8px;
        border-top-right-radius: 8px;
    }
    .settings-panel .panel-title {
        margin: 0;
        font-size: 15px;
        font-weight: 600;
        color: #1f2d3d;
    }
    .settings-panel .panel-body {
        padding: 24px;
    }
    .settings-form-group {
        margin-bottom: 20px;
    }
    .settings-label {
        font-size: 12px;
        font-weight: 600;
        color: #5f6f7f;
        margin-bottom: 8px;
        display: block;
        text-transform: uppercase;
        letter-spacing: 0.5px;
    }
    .settings-input {
        box-shadow: none;
        border-radius: 4px;
        border: 1px solid #cfd8e3;
        transition: all 0.2s;
        height: 36px;
    }
    .settings-input:focus {
        border-color: #0f3d5e;
        box-shadow: 0 0 0 2px rgba(15, 61, 94, 0.1);
    }
    .settings-help {
        font-size: 11px;
        color: #8c9fb1;
        margin-top: 6px;
    }
    .btn-save {
        padding: 8px 24px;
        font-weight: 600;
        letter-spacing: 0.5px;
        border-radius: 4px;
    }
</style>

<div class="col-sm-12">
    <div class="settings-panel">
        <div class="panel-heading">
            <h3 class="panel-title"><i class="fa fa-cogs" style="margin-right:8px;color:#8c9fb1;"></i> System Settings</h3>
        </div>
        <div class="panel-body">
            <form name="settings_form" id="settings_form">
                <div class="row">
                    <div class="col-lg-3 col-md-6 col-sm-6">
                        <div class="settings-form-group">
                            <label class="settings-label">Site Logo</label>
                            <input type="file" id="site_logo" name="site_logo" class="form-control settings-input" accept="image/*" style="padding: 6px;">
                            <div class="settings-help">Main logo for the admin panel.</div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 col-sm-6">
                        <div class="settings-form-group">
                            <label class="settings-label">Favicon</label>
                            <input type="file" id="site_favicon" name="site_favicon" class="form-control settings-input" accept="image/x-icon,image/png" style="padding: 6px;">
                            <div class="settings-help">Browser tab icon (32x32 px).</div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 col-sm-6">
                        <div class="settings-form-group">
                            <label class="settings-label">Theme Color</label>
                            <?php 
                            $th_color = "#cfd8e3";
                            if(file_exists('./assets/theme_color.txt')) { 
                                $th_color = file_get_contents('./assets/theme_color.txt'); 
                            } 
                            ?>
                            <input type="color" id="theme_color" name="theme_color" class="form-control settings-input" value="<?= $th_color ?>" style="padding: 2px 4px; cursor: pointer;">
                            <div class="settings-help">Primary color for the admin UI.</div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 col-sm-6">
                        <div class="settings-form-group">
                            <label class="settings-label">Text Color</label>
                            <?php 
                            $tx_color = "#5f6368";
                            if(file_exists('./assets/text_color.txt')) { 
                                $tx_color = file_get_contents('./assets/text_color.txt'); 
                            } 
                            ?>
                            <input type="color" id="text_color" name="text_color" class="form-control settings-input" value="<?= $tx_color ?>" style="padding: 2px 4px; cursor: pointer;">
                            <div class="settings-help">General text color.</div>
                        </div>

                        <div class="settings-form-group">
                            <label class="settings-label">Breadcrumb Highlight Color</label>
                            <?php 
                            $bc_color = "#ffb300"; // Default Orange/Yellow
                            if(file_exists('./assets/breadcrumb_color.txt')) { 
                                $bc_color = file_get_contents('./assets/breadcrumb_color.txt'); 
                            }
                            ?>
                            <input type="color" id="breadcrumb_color" name="breadcrumb_color" class="form-control settings-input" value="<?= $bc_color ?>" style="padding: 2px 4px; cursor: pointer;">
                            <div class="settings-help">Color for the highlighted text (e.g. 'Us' in 'About Us') in frontend breadcrumbs.</div>
                        </div>
                    </div>
                </div>
                <div class="row mt-3">
                    <div class="col-sm-12">
                        <button type="button" class="btn btn-primary btn-save" id="btnsubmit" ng-click="update_settings()">
                            <i class="fa fa-save"></i> Save Settings
                        </button>
                    </div>
                </div>
                <div class="row" style="margin-top:15px;">
                    <div class="col-sm-12">
                        <div id="result"></div>
                    </div>
                </div>
            </form>
        </div>
    </div>
    
    <div class="settings-panel">
        <div class="panel-heading">
            <h3 class="panel-title"><i class="fa fa-th-large" style="margin-right:8px;color:#8c9fb1;"></i> Dashboard Menu Labels & Sidebar Visibility</h3>
        </div>
        <div class="panel-body">
            <form name="menu_form" id="menu_form">
                <?php
                $labels = [];
                if (file_exists('./assets/menu_labels.json')) {
                    $labels = json_decode(file_get_contents('./assets/menu_labels.json'), true);
                }
                
                $dashboard_menus = [
                    'dash_dashboard' => 'Dashboard',
                    'dash_blog' => 'Blog Posts',
                    'dash_bookings' => 'Bookings',
                    'dash_contacts' => 'Contacts',
                    'dash_reviews' => 'Reviews',
                    'dash_gallery' => 'Photo Gallery',
                    'dash_videogallery' => 'Video Gallery',
                    'dash_logs' => 'System Logs',
                    'dash_settings' => 'Settings'
                ];
                
                $default_menus = [
                    'label_dashboard' => 'Dashboard',
                    'label_blog' => 'Blog',
                    'label_bookings' => 'Bookings',
                    'label_contacts' => 'Contacts',
                    'label_reviews' => 'Reviews',
                    'label_gallery' => 'Photo Gallery',
                    'label_videogallery' => 'Video Gallery',
                    'label_logs' => 'Logs',
                    'label_settings' => 'Settings'
                ];
                ?>
                
                <h4 style="font-size: 14px; font-weight: bold; margin-bottom: 20px; color: #0f3d5e; border-bottom: 1px solid #eef2f5; padding-bottom: 10px;">Dashboard Grid Layout</h4>
                <div class="row mb-4">
                    <div class="col-lg-6 col-md-6">
                        <div class="settings-form-group" style="background: #f8fafc; padding: 15px; border-radius: 6px; border: 1px solid #eef2f5;">
                            <label class="settings-label">Desktop View (Large Screens)</label>
                            <?php $desktop_col = isset($labels['dash_desktop_col']) ? $labels['dash_desktop_col'] : 'col-lg-3 col-md-4'; ?>
                            <select name="dash_desktop_col" class="form-control settings-input">
                                <option value="col-lg-12 col-md-12" <?= $desktop_col == 'col-lg-12 col-md-12' ? 'selected' : '' ?>>1 Box per row (Full width)</option>
                                <option value="col-lg-6 col-md-6" <?= $desktop_col == 'col-lg-6 col-md-6' ? 'selected' : '' ?>>2 Boxes per row (Half width)</option>
                                <option value="col-lg-4 col-md-4" <?= $desktop_col == 'col-lg-4 col-md-4' ? 'selected' : '' ?>>3 Boxes per row (1/3 width)</option>
                                <option value="col-lg-3 col-md-4" <?= $desktop_col == 'col-lg-3 col-md-4' ? 'selected' : '' ?>>4 Boxes per row (1/4 width)</option>
                                <option value="col-lg-2 col-md-3" <?= $desktop_col == 'col-lg-2 col-md-3' ? 'selected' : '' ?>>6 Boxes per row (1/6 width)</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6">
                        <div class="settings-form-group" style="background: #f8fafc; padding: 15px; border-radius: 6px; border: 1px solid #eef2f5;">
                            <label class="settings-label">Mobile View (Small Screens)</label>
                            <?php $mobile_col = isset($labels['dash_mobile_col']) ? $labels['dash_mobile_col'] : 'col-xs-12 col-sm-6'; ?>
                            <select name="dash_mobile_col" class="form-control settings-input">
                                <option value="col-xs-12 col-sm-12" <?= $mobile_col == 'col-xs-12 col-sm-12' ? 'selected' : '' ?>>1 Box per row (Full width)</option>
                                <option value="col-xs-6 col-sm-6" <?= $mobile_col == 'col-xs-6 col-sm-6' ? 'selected' : '' ?>>2 Boxes per row (Half width)</option>
                            </select>
                        </div>
                    </div>
                </div>

                <h4 style="font-size: 14px; font-weight: bold; margin-bottom: 20px; color: #0f3d5e; border-bottom: 1px solid #eef2f5; padding-bottom: 10px;">Dashboard Card Labels & Visibility</h4>
                <div class="row">
                    <?php foreach ($dashboard_menus as $key => $default_name):
                        $val = isset($labels[$key]) && !empty($labels[$key]) ? htmlspecialchars($labels[$key]) : $default_name;
                        $show_key = "show_" . $key;
                        $is_checked = (!isset($labels[$show_key]) || $labels[$show_key] == "1") ? "checked" : "";
                    ?>
                    <div class="col-lg-3 col-md-4 col-sm-6">
                        <div class="settings-form-group" style="background: #f8fafc; padding: 10px; border-radius: 6px; border: 1px solid #eef2f5;">
                            <label class="settings-label">
                                <input type="checkbox" name="<?= $show_key ?>" value="1" <?= $is_checked ?> style="vertical-align: middle; margin: 0 4px 2px 0;">
                                <?= $default_name ?>
                            </label>
                            <input type="text" id="<?= $key ?>" name="<?= $key ?>" class="form-control settings-input input-sm" value="<?= $val ?>">
                        </div>
                    </div>
                    <?php endforeach; ?>
                </div>

                <h4 style="font-size: 14px; font-weight: bold; margin-bottom: 20px; color: #0f3d5e; border-bottom: 1px solid #eef2f5; padding-bottom: 10px;">Sidebar Menu Labels</h4>
                <div class="row">
                    <?php foreach ($default_menus as $key => $default_name):
                        $val = isset($labels[$key]) && !empty($labels[$key]) ? htmlspecialchars($labels[$key]) : $default_name;
                        $show_key = "show_" . $key;
                        $is_checked = (!isset($labels[$show_key]) || $labels[$show_key] == "1") ? "checked" : "";
                    ?>
                    <div class="col-lg-3 col-md-4 col-sm-6">
                        <div class="settings-form-group" style="background: #fcfdfe; padding: 10px; border-radius: 6px; border: 1px solid #eef2f5;">
                            <label class="settings-label">
                                <input type="checkbox" name="<?= $show_key ?>" value="1" <?= $is_checked ?> style="vertical-align: middle; margin: 0 4px 2px 0;">
                                <?= $default_name ?>
                            </label>
                            <input type="text" id="<?= $key ?>" name="<?= $key ?>" class="form-control settings-input input-sm" value="<?= $val ?>">
                        </div>
                    </div>
                    <?php endforeach; ?>
                </div>
                
                <?php
                $booking_labels = [
                    'book_label_date' => 'Booking Date',
                    'book_label_client' => 'Client Name',
                    'book_label_contact' => 'Contact No.',
                    'book_label_freight' => 'Freight Service',
                    'book_label_route' => 'Route (Origin → Dest)',
                    'book_label_lead' => 'Lead Status',
                    'book_label_loss' => 'Loss Reason',
                    'book_label_action' => 'Action'
                ];
                ?>
                <h4 style="font-size: 14px; font-weight: bold; margin-bottom: 20px; color: #0f3d5e; border-bottom: 1px solid #eef2f5; padding-bottom: 10px; margin-top: 15px;">Booking Table Labels</h4>
                <div class="row">
                    <?php foreach ($booking_labels as $key => $default_name):
                        $val = isset($labels[$key]) && !empty($labels[$key]) ? htmlspecialchars($labels[$key]) : $default_name;
                    ?>
                    <div class="col-lg-3 col-md-4 col-sm-6">
                        <div class="settings-form-group" style="background: #f8fafc; padding: 10px; border-radius: 6px; border: 1px solid #eef2f5;">
                            <label class="settings-label"><?= $default_name ?></label>
                            <input type="text" id="<?= $key ?>" name="<?= $key ?>" class="form-control settings-input input-sm" value="<?= $val ?>">
                        </div>
                    </div>
                    <?php endforeach; ?>
                </div>

                <div class="text-right mt-4" style="margin-top: 20px;">
                    <button type="button" class="btn btn-primary" id="btnsubmit_labels" ng-click="update_labels()" style="padding: 10px 24px; font-weight: 600; border-radius: 6px; box-shadow: 0 4px 10px rgba(0, 153, 255, 0.2);">
                        <i class="fa fa-save" style="margin-right: 6px;"></i> Save All Labels
                    </button>
                </div>
                <div class="row" style="margin-top:15px;">
                    <div class="col-sm-12">
                        <div id="result_labels"></div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
