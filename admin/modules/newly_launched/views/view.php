<?php if (!defined('BASEPATH')) exit('No direct script access allowed'); ?>

<style>
.nl-wrapper { padding: 22px; background: #F4F6F9; min-height: 100vh; font-family: 'Helvetica Neue', Helvetica, Arial, sans-serif; }
.nl-header-card { background: linear-gradient(135deg, #0F382C 0%, #175241 100%); color: #fff; border-radius: 12px; padding: 24px; margin-bottom: 24px; box-shadow: 0 4px 15px rgba(15,56,44,0.15); }
.nl-header-title { font-size: 22px; font-weight: 700; margin: 0 0 4px 0; letter-spacing: 0.3px; color: #fff !important; }
.nl-header-sub { font-size: 13px; opacity: 0.85; margin: 0; color: #E2E8F0 !important; }

/* Panels */
.nl-panel { background: #fff; border-radius: 12px; box-shadow: 0 2px 12px rgba(0,0,0,0.04); margin-bottom: 24px; border: 1px solid #E2E8F0; overflow: hidden; }
.nl-panel-heading { padding: 16px 24px; background: #FAFAFA; border-bottom: 1px solid #E2E8F0; font-size: 15px; font-weight: 700; color: #1E293B; display: flex; align-items: center; justify-content: space-between; }
.nl-panel-body { padding: 24px; }

/* Form Elements */
.nl-label { font-size: 13px; font-weight: 700; color: #334155; margin-bottom: 6px; display: block; letter-spacing: 0.2px; }
.nl-input, .nl-select, .nl-textarea { width: 100%; padding: 10px 14px; border: 1px solid #CBD5E1; border-radius: 8px; font-size: 13px; color: #1E293B; background: #fff; transition: all 0.2s; }
.nl-input:focus, .nl-select:focus, .nl-textarea:focus { border-color: #0F382C; outline: none; box-shadow: 0 0 0 3px rgba(15,56,44,0.1); }
.nl-help-text { font-size: 11px; color: #64748B; margin-top: 4px; display: block; }

/* Buttons */
.btn-nl-save { background: #0F382C !important; color: #ffffff !important; font-weight: 700; font-size: 14px; padding: 11px 26px; border-radius: 8px; border: none; cursor: pointer; transition: all 0.2s; display: inline-flex; align-items: center; gap: 8px; }
.btn-nl-save:hover { background: #175241 !important; box-shadow: 0 4px 12px rgba(15,56,44,0.25); color: #ffffff !important; }
.btn-nl-save, .btn-nl-save *, .btn-nl-save span, .btn-nl-save i { color: #ffffff !important; }

.btn-nl-cancel { background: #E2E8F0 !important; color: #334155 !important; font-weight: 600; font-size: 14px; padding: 11px 20px; border-radius: 8px; border: none; cursor: pointer; text-decoration: none; display: inline-flex; align-items: center; gap: 6px; }
.btn-nl-cancel:hover { background: #CBD5E1 !important; color: #1E293B !important; }
.btn-nl-cancel, .btn-nl-cancel *, .btn-nl-cancel span, .btn-nl-cancel i { color: #334155 !important; }

.btn-nl-add { background: #D4AF37 !important; color: #000000 !important; font-weight: 700; font-size: 12px; padding: 8px 16px; border-radius: 6px; border: none; cursor: pointer; display: inline-flex; align-items: center; gap: 6px; }
.btn-nl-add:hover { background: #b8972e !important; color: #000000 !important; }
.btn-nl-add, .btn-nl-add *, .btn-nl-add span, .btn-nl-add i { color: #000000 !important; }

/* Status Badges */
.badge-active { background: #DCFCE7 !important; color: #166534 !important; font-weight: 700; padding: 4px 10px; border-radius: 20px; font-size: 11px; }
.badge-inactive { background: #FEE2E2 !important; color: #991B1B !important; font-weight: 700; padding: 4px 10px; border-radius: 20px; font-size: 11px; }
.badge-launch { background: #FEF3C7 !important; color: #92400E !important; font-weight: 700; padding: 3px 8px; border-radius: 6px; font-size: 11px; text-transform: uppercase; }

/* Table Styles */
.nl-table { width: 100%; border-collapse: collapse; }
.nl-table th { background: #F1F5F9; color: #334155; font-size: 12px; font-weight: 700; text-transform: uppercase; padding: 12px 14px; text-align: left; border-bottom: 1px solid #E2E8F0; }
.nl-table td { padding: 14px; border-bottom: 1px solid #F1F5F9; font-size: 13px; color: #334155; vertical-align: middle; }

/* Square Thumbnail Preview matching Website */
.table-square-img { width: 75px; height: 62px; object-fit: cover; border-radius: 7px; border: 1px solid #CBD5E1; display: block; background: #E2E8F0; }
</style>

<div class="nl-wrapper">
    <div class="row">
        <div class="col-md-12">

            <!-- HEADER BANNER -->
            <div class="nl-header-card">
                <div class="row align-items-center">
                    <div class="col-sm-8">
                        <h2 class="nl-header-title">
                            <i class="fa fa-rocket" style="color:#D4AF37;margin-right:10px;"></i> Newly Launched Projects
                        </h2>
                        <p class="nl-header-sub">Manage newly launched project cards displayed on the website home page.</p>
                    </div>
                    <div class="col-sm-4 text-right">
                        <button type="button" class="btn-nl-add" onclick="resetFormToNew()" style="background:#D4AF37 !important; color:#000000 !important;">
                            <i class="fa fa-plus-circle" style="color:#000000 !important;"></i> <span style="color:#000000 !important; font-weight:700;">Add New Project</span>
                        </button>
                    </div>
                </div>
            </div>

            <!-- RESULT ALERTS -->
            <div id="nl_result_msg"></div>

            <!-- ADD / EDIT FORM PANEL -->
            <div class="nl-panel" id="nl_form_panel">
                <div class="nl-panel-heading">
                    <span id="form_heading_title">
                        <i class="fa fa-pencil-square-o" style="color:#0F382C;margin-right:8px;"></i>
                        <?= !empty($edit_project) ? 'Edit Project: ' . htmlspecialchars($edit_project['name']) : 'Add New Project' ?>
                    </span>
                    <button type="button" class="btn btn-xs btn-default" onclick="resetFormToNew()">Reset Form</button>
                </div>
                <div class="nl-panel-body">
                    <form id="newly_launched_form" onsubmit="saveNewlyLaunchedProject(); return false;" enctype="multipart/form-data">
                        <input type="hidden" name="id" id="nl_id" value="0">
                        <input type="hidden" name="existing_image" id="nl_existing_image" value="assets/images/slider/gardenia_hero.webp">

                        <!-- Row 1: Project Name & Location -->
                        <div class="row">
                            <div class="col-md-6 form-group">
                                <label class="nl-label">Project Name / Title <span style="color:#E11D48;">*</span></label>
                                <input type="text" class="nl-input" name="name" id="nl_name" required placeholder="e.g. Gardenia Grandeur – Phase 2">
                                <span class="nl-help-text">Main bold project heading on the card</span>
                            </div>

                            <div class="col-md-6 form-group">
                                <label class="nl-label">Location / Address <span style="color:#E11D48;">*</span></label>
                                <input type="text" class="nl-input" name="location" id="nl_location" required placeholder="e.g. Near Bihta Airport & Outer Ring Road, Patna">
                                <span class="nl-help-text">Location line displayed under the project name</span>
                            </div>
                        </div>

                        <!-- Row 2: Price & Configurations/Sizes -->
                        <div class="row">
                            <div class="col-md-6 form-group">
                                <label class="nl-label">Price / Price Range <span style="color:#E11D48;">*</span></label>
                                <input type="text" class="nl-input" name="price" id="nl_price" required placeholder="e.g. ₹ 14.50 Lacs Onwards or 34L">
                                <span class="nl-help-text">Bold price shown on the card</span>
                            </div>

                            <div class="col-md-6 form-group">
                                <label class="nl-label">Sizes / Configurations <span style="color:#E11D48;">*</span></label>
                                <input type="text" class="nl-input" name="plot_sizes" id="nl_plot_sizes" required placeholder="e.g. 1000, 1500 & 2400 Sq.Ft. or 2000">
                                <span class="nl-help-text">Shown beside the price separated by a pipe (|)</span>
                            </div>
                        </div>

                        <!-- Row 3: Top Ribbon Tag & Green Highlight Line -->
                        <div class="row">
                            <div class="col-md-6 form-group">
                                <label class="nl-label">Top Ribbon Tag (Badge)</label>
                                <input type="text" class="nl-input" name="badge" id="nl_badge" value="NEWLY LAUNCHED" placeholder="e.g. NEWLY LAUNCHED or NEW ARRIVAL">
                                <span class="nl-help-text">Tag shown in cream ribbon at top-left corner of the card</span>
                            </div>

                            <div class="col-md-6 form-group">
                                <label class="nl-label">Green Highlight / Key Feature Line</label>
                                <input type="text" class="nl-input" name="highlights" id="nl_highlights" placeholder="e.g. Immediate Registry & Mutation or 14.2% price increase in last 1 year">
                                <span class="nl-help-text">Line shown in green with upward chart icon (📈)</span>
                            </div>
                        </div>

                        <!-- Row 4: Bottom Offer & Phone Number -->
                        <div class="row">
                            <div class="col-md-6 form-group">
                                <label class="nl-label">Bottom Offer Tagline</label>
                                <input type="text" class="nl-input" name="tagline" id="nl_tagline" value="Get preferred options @zero brokerage" placeholder="e.g. Get preferred options @zero brokerage">
                                <span class="nl-help-text">Offer line shown at bottom-left next to tag icon (🏷️)</span>
                            </div>

                            <div class="col-md-6 form-group">
                                <label class="nl-label">Direct Contact Phone Number</label>
                                <input type="text" class="nl-input" name="enquiry_link" id="nl_enquiry_link" placeholder="e.g. +91 91080 34519 (Leave blank for Controller.php default)">
                                <span class="nl-help-text">Directly displayed on the call button on the project card. If left blank, Controller.php phone (+91 91080 34519) will be shown.</span>
                            </div>
                        </div>

                        <!-- Row 5: Square Photo, Status & Sort Order -->
                        <div class="row">
                            <div class="col-md-6 form-group">
                                <label class="nl-label">Square Project Photo</label>
                                <div style="display:flex; align-items:center; gap:12px;">
                                    <input type="file" class="nl-input" name="project_image" id="nl_file_input" accept="image/*" onchange="previewNlImage(this)" style="flex:1;">
                                    <img src="<?= base_url('assets/images/slider/gardenia_hero.webp') ?>" id="nl_img_thumb" style="width:60px; height:50px; object-fit:cover; border-radius:6px; border:1px solid #CBD5E1; background:#E2E8F0;" alt="Current photo">
                                </div>
                                <span class="nl-help-text">Square photo for thumbnail box (with RERA badge on home page)</span>
                            </div>

                            <div class="col-md-3 form-group">
                                <label class="nl-label">Status</label>
                                <select class="nl-select" name="status" id="nl_status">
                                    <option value="Active" selected>Active (Live on Website Home)</option>
                                    <option value="Inactive">Inactive (Hidden from Home)</option>
                                </select>
                                <span class="nl-help-text">Display status on home page</span>
                            </div>

                            <div class="col-md-3 form-group">
                                <label class="nl-label">Sort Order</label>
                                <input type="number" class="nl-input" name="sort_order" id="nl_sort_order" value="0" placeholder="0">
                                <span class="nl-help-text">Display sequence (0, 1, 2...)</span>
                            </div>
                        </div>

                        <!-- SUBMIT BUTTONS -->
                        <div style="margin-top: 15px; padding-top: 15px; border-top: 1px solid #E2E8F0; display: flex; align-items: center; gap: 12px;">
                            <button type="submit" class="btn-nl-save" id="btn_save_nl" style="background:#0F382C !important; color:#ffffff !important;">
                                <i class="fa fa-save" style="color:#ffffff !important;"></i> <span id="btn_save_nl_text" style="color:#ffffff !important; font-weight:700;">Save Project</span>
                            </button>
                            <button type="button" class="btn-nl-cancel" onclick="resetFormToNew()" style="background:#E2E8F0 !important; color:#334155 !important;">
                                <i class="fa fa-refresh" style="color:#334155 !important;"></i> <span style="color:#334155 !important; font-weight:600;">Reset Form</span>
                            </button>
                        </div>

                    </form>
                </div>
            </div>

            <!-- PROJECTS LIST TABLE (DYNAMIC ANGULARJS DATA BINDING) -->
            <div class="nl-panel">
                <div class="nl-panel-heading">
                    <span>
                        <i class="fa fa-list" style="color:#0F382C;margin-right:8px;"></i>
                        All Listed Newly Launched Projects <span class="badge" style="background:#0F382C; color:#fff; font-size:11px;">{{projects.length}}</span>
                    </span>
                    <button type="button" class="btn btn-xs btn-default" ng-click="loadProjects()" style="border-radius:4px;">
                        <i class="fa fa-refresh" ng-class="{'fa-spin': loading}"></i> Refresh List
                    </button>
                </div>
                <div class="nl-panel-body" style="padding:0;">
                    
                    <!-- Loading Indicator -->
                    <div ng-if="loading" style="text-align:center; padding:30px; color:#64748B;">
                        <i class="fa fa-spinner fa-spin fa-2x" style="color:#0F382C;"></i>
                        <p style="margin-top:8px; font-size:13px;">Loading projects from database...</p>
                    </div>

                    <!-- Projects Table -->
                    <div class="table-responsive" ng-if="!loading && projects.length > 0">
                        <table class="nl-table">
                            <thead>
                                <tr>
                                    <th style="width:35px;">#</th>
                                    <th style="width:90px;">Photo</th>
                                    <th>Project Name &amp; Ribbon</th>
                                    <th>Location</th>
                                    <th>Price &amp; Sizes</th>
                                    <th>Green Highlight</th>
                                    <th>Footer Offer</th>
                                    <th>Status</th>
                                    <th style="width:140px; text-align:right;">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr ng-repeat="p in projects track by p.id" id="proj_row_{{p.id}}">
                                    <td style="color:#64748B; font-weight:700;">{{$index + 1}}</td>
                                    <td>
                                        <div style="position:relative; width:75px; height:62px;">
                                            <img ng-src="{{p.image ? (baseUrl + p.image) : (baseUrl + 'assets/images/slider/gardenia_hero.webp')}}" class="table-square-img" alt="Square photo">
                                            <span style="position:absolute; bottom:2px; left:2px; background:rgba(15,23,42,0.9); color:#38BDF8; font-size:8px; font-weight:800; padding:1px 4px; border-radius:3px;">RERA</span>
                                        </div>
                                    </td>
                                    <td>
                                        <div style="font-weight:700; font-size:14px; color:#0F382C;">
                                            {{p.name}}
                                        </div>
                                        <div style="margin-top:3px;">
                                            <span class="badge-launch">{{p.badge || 'NEWLY LAUNCHED'}}</span>
                                        </div>
                                    </td>
                                    <td>
                                        <div style="font-size:12.5px; color:#1E293B; max-width:200px; font-weight:500;">
                                            {{p.location}}
                                        </div>
                                    </td>
                                    <td>
                                        <div style="font-weight:800; color:#111827; font-size:13px;">
                                            {{p.price || 'On Request'}}
                                        </div>
                                        <div style="font-size:11.5px; color:#64748B; margin-top:2px;">
                                            {{p.plot_sizes}}
                                        </div>
                                    </td>
                                    <td>
                                        <div style="font-size:12px; color:#059669; font-weight:600; max-width:180px;">
                                            <i class="fa fa-line-chart"></i> {{ (p.highlights_list && p.highlights_list.length > 0) ? p.highlights_list[0] : (p.highlights || 'Immediate Registry') }}
                                        </div>
                                    </td>
                                    <td>
                                        <div style="font-size:11.5px; color:#475569; max-width:180px;">
                                            <i class="fa fa-tag" style="color:#0284C7;"></i> {{p.tagline || 'Get preferred options @zero brokerage'}}
                                        </div>
                                        <div style="font-size:11px; color:#0284C7; margin-top:3px; font-weight:600;">
                                            <i class="fa fa-phone"></i> {{p.enquiry_link || '+91 91080 34519 (Controller default)'}}
                                        </div>
                                    </td>
                                    <td>
                                        <button type="button" 
                                                ng-class="{'badge-active': (p.status.toLowerCase() == 'active'), 'badge-inactive': (p.status.toLowerCase() != 'active')}"
                                                style="border:none; cursor:pointer;" 
                                                title="Click to toggle status"
                                                ng-click="toggleStatus(p)">
                                            {{p.status || 'Active'}}
                                        </button>
                                    </td>
                                    <td style="text-align:right;">
                                        <button type="button" class="btn btn-xs btn-primary" title="Edit Project" ng-click="editProject(p)" style="background:#0284C7 !important; border-color:#0284C7 !important; border-radius:4px; padding:4px 8px; color:#ffffff !important; font-weight:700;">
                                            <i class="fa fa-pencil" style="color:#ffffff !important;"></i> Edit
                                        </button>
                                        <button type="button" class="btn btn-xs btn-danger" title="Delete Project" ng-click="deleteProject(p)" style="background:#DC2626 !important; border-color:#DC2626 !important; border-radius:4px; padding:4px 8px; margin-left:4px; color:#ffffff !important; font-weight:700;">
                                            <i class="fa fa-trash" style="color:#ffffff !important;"></i> Delete
                                        </button>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>

                    <!-- Empty State -->
                    <div ng-if="!loading && projects.length === 0" style="text-align:center; padding:50px 20px; color:#64748B;">
                        <i class="fa fa-rocket" style="font-size:36px; color:#CBD5E1; margin-bottom:12px; display:block;"></i>
                        <h4 style="margin:0 0 6px 0; color:#334155;">No Projects Listed</h4>
                        <p style="margin:0; font-size:13px;">Use the form above to add your first newly launched project.</p>
                    </div>

                </div>
            </div>

        </div>
    </div>
</div>

<script>
function previewNlImage(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();
        reader.onload = function(e) {
            document.getElementById('nl_img_thumb').src = e.target.result;
        };
        reader.readAsDataURL(input.files[0]);
    }
}

function resetFormToNew() {
    document.getElementById('nl_id').value = '0';
    document.getElementById('nl_existing_image').value = 'assets/images/slider/gardenia_hero.webp';
    document.getElementById('nl_name').value = '';
    document.getElementById('nl_location').value = '';
    document.getElementById('nl_price').value = '';
    document.getElementById('nl_plot_sizes').value = '';
    document.getElementById('nl_badge').value = 'NEWLY LAUNCHED';
    document.getElementById('nl_highlights').value = '';
    document.getElementById('nl_tagline').value = 'Get preferred options @zero brokerage';
    document.getElementById('nl_enquiry_link').value = '';
    document.getElementById('nl_status').value = 'Active';
    document.getElementById('nl_sort_order').value = '0';
    document.getElementById('nl_file_input').value = '';
    document.getElementById('nl_img_thumb').src = '<?= base_url('assets/images/slider/gardenia_hero.webp') ?>';
    document.getElementById('form_heading_title').innerHTML = '<i class="fa fa-pencil-square-o" style="color:#0F382C;margin-right:8px;"></i> Add New Project';
    document.getElementById('btn_save_nl_text').innerText = 'Save Project';

    $('html, body').animate({
        scrollTop: $("#nl_form_panel").offset().top - 80
    }, 300);
}

function editProjectData(p) {
    document.getElementById('nl_id').value = p.id || 0;
    document.getElementById('nl_existing_image').value = p.image || 'assets/images/slider/gardenia_hero.webp';
    document.getElementById('nl_name').value = p.name || '';
    document.getElementById('nl_location').value = p.location || '';
    document.getElementById('nl_price').value = p.price || '';
    document.getElementById('nl_plot_sizes').value = p.plot_sizes || '';
    document.getElementById('nl_badge').value = p.badge || 'NEWLY LAUNCHED';
    document.getElementById('nl_tagline').value = p.tagline || 'Get preferred options @zero brokerage';
    document.getElementById('nl_enquiry_link').value = p.enquiry_link || '';
    document.getElementById('nl_status').value = p.status || 'Active';
    document.getElementById('nl_sort_order').value = p.sort_order || 0;
    
    var hlText = '';
    if (p.highlights_list && Array.isArray(p.highlights_list) && p.highlights_list.length > 0) {
        hlText = p.highlights_list[0];
    } else if (p.highlights) {
        try {
            var parsed = JSON.parse(p.highlights);
            if (Array.isArray(parsed) && parsed.length > 0) hlText = parsed[0];
            else hlText = p.highlights;
        } catch(e) {
            hlText = p.highlights;
        }
    }
    document.getElementById('nl_highlights').value = hlText;
    
    var baseUrl = (window.location.origin + window.location.pathname).replace(/\/myadmin\.php.*$/i, '') + '/';
    var imgUrl = p.image ? (baseUrl + p.image.replace(/^\//, '')) : (baseUrl + 'assets/images/slider/gardenia_hero.webp');
    document.getElementById('nl_img_thumb').src = imgUrl;
    
    document.getElementById('form_heading_title').innerHTML = '<i class="fa fa-pencil" style="color:#D4AF37;margin-right:8px;"></i> Edit Project: ' + (p.name || '');
    document.getElementById('btn_save_nl_text').innerText = 'Update Project';

    $('html, body').animate({
        scrollTop: $("#nl_form_panel").offset().top - 80
    }, 300);
}

function saveNewlyLaunchedProject() {
    var btn = $("#btn_save_nl");
    var btnText = $("#btn_save_nl_text");
    var origText = btnText.text();
    
    btn.prop('disabled', true);
    btnText.text('Saving Project...');

    var form = document.getElementById('newly_launched_form');
    var formData = new FormData(form);

    $.ajax({
        url: '<?= site_url("newly_launched/save_project") ?>',
        type: 'POST',
        data: formData,
        processData: false,
        contentType: false,
        success: function(response) {
            btn.prop('disabled', false);
            btnText.text(origText);
            
            $("#nl_result_msg").html(
                '<div class="alert alert-success alert-dismissible" style="border-radius:8px; margin-bottom:20px;">' +
                '<button type="button" class="close" data-dismiss="alert">&times;</button>' +
                '<i class="fa fa-check-circle" style="margin-right:8px;"></i> ' + response +
                '</div>'
            );
            
            $('html, body').animate({
                scrollTop: $("#nl_result_msg").offset().top - 80
            }, 300);

            // Reset form for next entry
            resetFormToNew();

            // Real-time update of AngularJS list immediately
            if (typeof window.refreshAngularProjectsList === 'function') {
                window.refreshAngularProjectsList();
            }
        },
        error: function(xhr, status, error) {
            btn.prop('disabled', false);
            btnText.text(origText);
            $("#nl_result_msg").html(
                '<div class="alert alert-danger alert-dismissible" style="border-radius:8px; margin-bottom:20px;">' +
                '<button type="button" class="close" data-dismiss="alert">&times;</button>' +
                '<i class="fa fa-exclamation-triangle" style="margin-right:8px;"></i> Error saving project. Please check fields and try again.' +
                '</div>'
            );
        }
    });
}
</script>
