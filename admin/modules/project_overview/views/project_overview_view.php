<?php if (!defined('BASEPATH')) exit('No direct script access allowed'); 

$curr_meta = [
    'title' => 'Project Overview',
    'sub'   => 'Manage main website info, plots inventory, and amenities master.',
    'icon'  => 'fa-building'
];

if ($active_tab == 'company_info') {
    $curr_meta = ['title' => 'Company & Website Info', 'sub' => 'Manage main website branding name, contact info, and location.', 'icon' => 'fa-info-circle'];
} elseif ($active_tab == 'plots_properties') {
    $curr_meta = ['title' => 'Plots & Properties Management', 'sub' => 'Create, edit, and manage dynamic multi-plot projects.', 'icon' => 'fa-th-large'];
} elseif ($active_tab == 'amenities') {
    $curr_meta = ['title' => 'Amenities Master', 'sub' => 'Manage global master list of amenities available for plots.', 'icon' => 'fa-tree'];
}
?>

<style>
.po-wrapper { padding:20px; background:#F4F6F9; min-height:100vh; font-family:'Helvetica Neue',Helvetica,Arial,sans-serif; }
.po-header-card { background:linear-gradient(135deg, #0F382C 0%, #175241 100%); color:#fff; border-radius:12px; padding:24px; margin-bottom:24px; box-shadow:0 4px 15px rgba(15,56,44,0.15); }
.po-header-title { font-size:22px; font-weight:700; margin:0 0 4px 0; letter-spacing:0.3px; }
.po-header-sub { font-size:13px; opacity:0.85; margin:0; }
.po-panel { background:#fff; border-radius:12px; box-shadow:0 2px 12px rgba(0,0,0,0.04); margin-bottom:24px; border:1px solid #E2E8F0; overflow:hidden; }
.po-panel-heading { padding:16px 24px; background:#FAFAFA; border-bottom:1px solid #E2E8F0; font-size:15px; font-weight:700; color:#1E293B; display:flex; align-items:center; justify-content:space-between; }
.po-panel-body { padding:24px; }
.po-label { font-size:13px; font-weight:600; color:#475569; margin-bottom:6px; display:block; }
.po-input, .po-select, .po-textarea { width:100%; padding:10px 14px; border:1px solid #CBD5E1; border-radius:8px; font-size:13px; color:#1E293B; background:#fff; transition:all 0.2s; }
.po-input:focus, .po-select:focus, .po-textarea:focus { border-color:#0F382C; outline:none; box-shadow:0 0 0 3px rgba(15,56,44,0.1); }
.po-table { width:100%; border-collapse:collapse; margin-top:10px; }
.po-table th { background:#F1F5F9; color:#334155; font-size:12px; font-weight:700; text-transform:uppercase; padding:12px 14px; text-align:left; border-bottom:1px solid #E2E8F0; }
.po-table td { padding:12px 14px; border-bottom:1px solid #F1F5F9; font-size:13px; color:#334155; vertical-align:middle; }
.btn-po-save { background:#0F382C; color:#fff; font-weight:700; font-size:14px; padding:12px 28px; border-radius:8px; border:none; cursor:pointer; transition:all 0.2s; display:inline-flex; align-items:center; }
.btn-po-save:hover { background:#175241; box-shadow:0 4px 12px rgba(15,56,44,0.25); color:#fff; }
.btn-po-add { background:#D4AF37; color:#000; font-weight:700; font-size:12px; padding:8px 16px; border-radius:6px; border:none; cursor:pointer; display:inline-flex; align-items:center; gap:6px; }
.btn-po-add:hover { background:#b8972e; color:#000; }
.amenity-checkbox-grid { display:grid; grid-template-columns: repeat(auto-fill, minmax(220px, 1fr)); gap:12px; margin-top:10px; }
.amenity-checkbox-item { background:#F8FAFC; border:1px solid #E2E8F0; padding:10px 14px; border-radius:8px; display:flex; align-items:center; gap:8px; cursor:pointer; font-size:13px; font-weight:600; color:#334155; }
.amenity-checkbox-item input { cursor:pointer; width:16px; height:16px; accent-color:#0F382C; }
</style>

<div class="po-wrapper">
    <div class="row">
        <div class="col-md-12">

            <!-- HEADER BANNER -->
            <div class="po-header-card">
                <div class="row align-items-center">
                    <div class="col-sm-8">
                        <h2 class="po-header-title">
                            <i class="fa <?= $curr_meta['icon'] ?>" style="color:#D4AF37;margin-right:10px;"></i> <?= $curr_meta['title'] ?>
                        </h2>
                        <p class="po-header-sub"><?= $curr_meta['sub'] ?></p>
                    </div>
                    <div class="col-sm-4 text-right">
                        <span class="badge" style="background:#D4AF37;color:#000;font-size:12px;padding:8px 16px;border-radius:20px;font-weight:bold;">Admin Control Panel</span>
                    </div>
                </div>
            </div>

            <!-- RESULT ALERTS -->
            <div id="overview_result"></div>

            <?php if ($active_tab == 'company_info'): ?>
            <!-- COMPANY INFO FORM -->
            <form id="company_info_form" onsubmit="saveCompanyInfo(); return false;">
                <div class="po-panel">
                    <div class="po-panel-heading">
                        <span><i class="fa fa-building" style="color:#0F382C;margin-right:8px;"></i> Main Website Company Branding Info</span>
                    </div>
                    <div class="po-panel-body">
                        <div class="row">
                            <div class="col-md-6 form-group">
                                <span class="po-label">Website / Company Name</span>
                                <input type="text" class="po-input" name="company_name" value="<?= isset($company_info['company_name']) ? htmlspecialchars($company_info['company_name']) : 'The Gardenia Estate' ?>" required>
                            </div>
                            <div class="col-md-6 form-group">
                                <span class="po-label">Contact Phone</span>
                                <input type="text" class="po-input" name="phone" value="<?= isset($company_info['phone']) ? htmlspecialchars($company_info['phone']) : '' ?>" placeholder="e.g. +91 9876543210">
                            </div>
                        </div>

                        <div class="row" style="margin-top:15px;">
                            <div class="col-md-6 form-group">
                                <span class="po-label">Contact Email</span>
                                <input type="email" class="po-input" name="email" value="<?= isset($company_info['email']) ? htmlspecialchars($company_info['email']) : '' ?>" placeholder="e.g. info@gardeniaestate.com">
                            </div>
                            <div class="col-md-6 form-group">
                                <span class="po-label">Office Address / Location</span>
                                <input type="text" class="po-input" name="location" value="<?= isset($company_info['location']) ? htmlspecialchars($company_info['location']) : '' ?>" placeholder="e.g. Airport Road, Bagdogra, Siliguri, West Bengal - 734014">
                            </div>
                        </div>

                        <div class="form-group" style="margin-top:15px;">
                            <span class="po-label">Website Description</span>
                            <textarea class="po-textarea" name="description" rows="4" placeholder="Brief about the main website..."><?= isset($company_info['description']) ? htmlspecialchars($company_info['description']) : '' ?></textarea>
                        </div>

                        <div class="row" style="margin-top:15px;align-items:center;">
                            <div class="col-md-8 form-group">
                                <span class="po-label">Company / About Banner Image</span>
                                <input type="file" class="po-input" name="company_image" accept="image/*" onchange="previewCompanyImg(this);">
                                <input type="hidden" name="existing_company_image" value="<?= isset($company_info['image']) ? htmlspecialchars($company_info['image']) : '' ?>">
                                <small style="color:#64748b;display:block;margin-top:4px;">Upload image for Home Page About section (Right Column).</small>
                            </div>
                            <div class="col-md-4 form-group" style="text-align:center;">
                                <span class="po-label">Image Preview</span>
                                <?php 
                                $comp_img_url = !empty($company_info['image']) ? base_url($company_info['image']) : base_url('assets/images/slider/gardenia_hero.png');
                                ?>
                                <img id="comp_img_preview" src="<?= $comp_img_url ?>" style="max-height:100px;border-radius:10px;border:1px solid #cbd5e1;padding:3px;" alt="Company Image Preview" loading="lazy">
                            </div>
                        </div>
                    </div>
                </div>

                <div style="text-align:center;margin-top:20px;margin-bottom:40px;">
                    <button type="submit" class="btn-po-save" id="btn_save_company">
                        <i class="fa fa-save" style="margin-right:8px;"></i> SAVE COMPANY INFO
                    </button>
                </div>
            </form>
            <?php endif; ?>

            <?php if ($active_tab == 'amenities'): ?>
            <!-- AMENITIES MASTER FORM (NAME-ONLY, ICONS REMOVED) -->
            <form id="amenities_form" onsubmit="saveAmenitiesMaster(); return false;">
                <div class="po-panel">
                    <div class="po-panel-heading">
                        <span><i class="fa fa-tree" style="color:#0F382C;margin-right:8px;"></i> Master Amenities List</span>
                        <button type="button" class="btn-po-add" id="btnAddAmenity" onclick="addAmenityRow();">
                            <i class="fa fa-plus"></i> Add Amenity
                        </button>
                    </div>
                    <div class="po-panel-body">
                        <small style="color:#64748b;display:block;margin-bottom:15px;">Add global amenities here. These will be available as checkboxes when creating or editing any Plot Project!</small>
                        <table class="po-table" id="amenitiesTable">
                            <thead>
                                <tr>
                                    <th>Amenity Name</th>
                                    <th style="text-align:center;width:100px;">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php 
                                if (empty($amenities_master)) {
                                    $amenities_master = [
                                        ['id' => 1, 'name' => 'Tree-lined Gardens & Parks'],
                                        ['id' => 2, 'name' => '24/7 Gated Security & CCTV'],
                                        ['id' => 3, 'name' => 'Underground Power & Utilities']
                                    ];
                                }
                                foreach ($amenities_master as $am):
                                ?>
                                    <tr>
                                        <td>
                                            <input type="text" class="po-input" name="amenity_name[]" value="<?= htmlspecialchars($am['name']) ?>" placeholder="e.g. Swimming Pool" required>
                                        </td>
                                        <td style="text-align:center;">
                                            <button type="button" class="btn btn-sm btn-danger btn-delete-row" onclick="$(this).closest('tr').remove();" style="border-radius:6px;" title="Delete Amenity">
                                                <i class="fa fa-trash"></i>
                                            </button>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                </div>

                <div style="text-align:center;margin-top:20px;margin-bottom:40px;">
                    <button type="submit" class="btn-po-save" id="btn_save_amenities">
                        <i class="fa fa-save" style="margin-right:8px;"></i> SAVE AMENITIES MASTER
                    </button>
                </div>
            </form>
            <?php endif; ?>

            <?php if ($active_tab == 'plots_properties'): ?>
                <!-- PLOTS LISTING TABLE PANEL -->
                <div class="po-panel" id="plots_table_panel">
                    <div class="po-panel-heading">
                        <span><i class="fa fa-th-large" style="color:#0F382C;margin-right:8px;"></i> Dynamic Plots &amp; Properties List</span>
                        <button type="button" class="btn-po-add" onclick="openAddPlotForm()">
                            <i class="fa fa-plus"></i> Add New Plot
                        </button>
                    </div>
                    <div class="po-panel-body">
                        <table class="po-table">
                            <thead>
                                <tr>
                                    <th style="width:70px;">ID</th>
                                    <th style="width:100px;">Image</th>
                                    <th>Plot Name</th>
                                    <th>Project Type</th>
                                    <th>Land Area &amp; Plots</th>
                                    <th>Status</th>
                                    <th style="text-align:center;width:160px;">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php if (!empty($plots_master)): ?>
                                    <?php foreach ($plots_master as $p): ?>
                                        <tr>
                                            <td><strong>#<?= $p['id'] ?></strong></td>
                                            <td>
                                                <img src="<?= base_url($p['image']) ?>" alt="<?= htmlspecialchars($p['name']) ?> Thumbnail" style="width:60px;height:45px;border-radius:6px;object-fit:cover;border:1px solid #cbd5e1;" loading="lazy">
                                            </td>
                                            <td><strong><?= htmlspecialchars($p['name']) ?></strong></td>
                                            <td><span class="badge" style="background:#e0f2fe;color:#0369a1;padding:4px 10px;border-radius:12px;"><?= htmlspecialchars($p['project_type']) ?></span></td>
                                            <td><?= htmlspecialchars($p['land_area']) ?> (<?= htmlspecialchars($p['total_plots']) ?> Plots)</td>
                                            <td>
                                                <span class="badge" style="background:<?= (isset($p['status']) && $p['status'] == 'Active') ? '#d1e7dd' : '#f8d7da' ?>;color:<?= (isset($p['status']) && $p['status'] == 'Active') ? '#0f5132' : '#842029' ?>;padding:4px 10px;border-radius:12px;">
                                                    <?= htmlspecialchars($p['status']) ?>
                                                </span>
                                            </td>
                                            <td style="text-align:center;">
                                                <button type="button" class="btn btn-sm btn-primary" style="border-radius:6px;margin-right:4px;" onclick="editPlot(<?= $p['id'] ?>)">
                                                    <i class="fa fa-edit"></i> Edit
                                                </button>
                                                <button type="button" class="btn btn-sm btn-danger" style="border-radius:6px;" onclick="deletePlot(<?= $p['id'] ?>)">
                                                    <i class="fa fa-trash"></i>
                                                </button>
                                            </td>
                                        </tr>
                                    <?php endforeach; ?>
                                <?php else: ?>
                                    <tr>
                                        <td colspan="7" style="text-align:center;padding:30px;color:#64748b;">No plots created yet. Click "+ Add New Plot" to create one!</td>
                                    </tr>
                                <?php endif; ?>
                            </tbody>
                        </table>
                    </div>
                </div>

                <!-- FULL PLOT ADD / EDIT FORM PANEL (HIDDEN BY DEFAULT) -->
                <div class="po-panel" id="plot_form_panel" style="display:none;">
                    <form id="plot_form" onsubmit="savePlotForm(); return false;" enctype="multipart/form-data">
                        <input type="hidden" name="plot_id" id="form_plot_id" value="0">
                        <input type="hidden" name="existing_image" id="form_existing_image" value="assets/images/slider/gardenia_hero.png">

                        <div class="po-panel-heading">
                            <span id="form_heading_title"><i class="fa fa-edit" style="color:#0F382C;margin-right:8px;"></i> Add New Plot Project</span>
                            <button type="button" class="btn btn-sm btn-default" onclick="showPlotsList()" style="border-radius:6px;font-weight:600;">
                                <i class="fa fa-arrow-left"></i> Back to List
                            </button>
                        </div>
                        <div class="po-panel-body">
                            
                            <!-- 1. Basic Info -->
                            <div class="row">
                                <div class="col-md-6 form-group">
                                    <span class="po-label">Plot Name *</span>
                                    <input type="text" class="po-input" name="plot_name" id="form_plot_name" placeholder="e.g. Rajganj 12 Katha" required>
                                </div>
                                <div class="col-md-6 form-group">
                                    <span class="po-label">Address / Location *</span>
                                    <input type="text" class="po-input" name="address" id="form_address" placeholder="e.g. Rajganj college road, Siliguri" required>
                                </div>
                            </div>

                            <div class="form-group" style="margin-top:15px;">
                                <span class="po-label">Plot Details (About Text)</span>
                                <textarea class="po-textarea" name="plot_about" id="form_plot_about" rows="4" placeholder="Detailed description of this plot..."></textarea>
                            </div>

                            <!-- 2. Image Upload -->
                            <div class="row" style="margin-top:15px;align-items:center;">
                                <div class="col-md-7 form-group">
                                    <span class="po-label">Plot Image</span>
                                    <input type="file" class="po-input" name="plot_image" id="plot_image_input" accept="image/*" style="padding:6px 14px;">
                                </div>
                                <div class="col-md-5 text-center">
                                    <span class="po-label" style="text-align:center!important;">Preview</span>
                                    <img id="plot_img_preview" src="<?= base_url('assets/images/slider/gardenia_hero.png') ?>" alt="Plot Preview Image" style="max-height:100px;border-radius:8px;border:1px solid #cbd5e1;padding:4px;background:#fff;object-fit:cover;" loading="lazy">
                                </div>
                            </div>

                            <!-- 3. Land Specs -->
                            <div class="row" style="margin-top:15px;">
                                <div class="col-md-4 form-group">
                                    <span class="po-label">Total Land Area (n Acres)</span>
                                    <input type="text" class="po-input" name="total_land_area" id="form_total_land_area" placeholder="e.g. 10 Acres">
                                </div>
                                <div class="col-md-4 form-group">
                                    <span class="po-label">Total Plots (n)</span>
                                    <input type="text" class="po-input" name="total_plots" id="form_total_plots" placeholder="e.g. 120">
                                </div>
                                <div class="col-md-4 form-group">
                                    <span class="po-label">Plot Sizes (Multiple sizes)</span>
                                    <input type="text" class="po-input" name="plot_sizes" id="form_plot_sizes" placeholder="e.g. 1200, 1500, 2400 sq.ft.">
                                </div>
                            </div>

                            <div class="row" style="margin-top:15px;">
                                <div class="col-md-6 form-group">
                                    <span class="po-label">Project Type</span>
                                    <select class="po-select" name="project_type" id="form_project_type">
                                        <option value="Residential Plots">Residential Plots</option>
                                        <option value="Villa Plots">Villa Plots</option>
                                        <option value="Commercial Plots">Commercial Plots</option>
                                        <option value="Luxury Bungalow">Luxury Bungalow</option>
                                        <option value="Bungalow & Villa Plots">Bungalow & Villa Plots</option>
                                    </select>
                                </div>
                                <div class="col-md-6 form-group">
                                    <span class="po-label">Project Status</span>
                                    <select class="po-select" name="project_status" id="form_project_status">
                                        <option value="Ongoing">Ongoing</option>
                                        <option value="Pre-Launching">Pre-Launching</option>
                                        <option value="Completed">Completed</option>
                                        <option value="Upcoming">Upcoming</option>
                                    </select>
                                </div>
                            </div>

                            <!-- 4. Map & Nearby Places -->
                            <div class="form-group" style="margin-top:20px;">
                                <span class="po-label">Google Map Embed URL</span>
                                <input type="text" class="po-input" name="google_map_url" id="form_google_map_url" placeholder="https://maps.google.com/maps?q=...">
                            </div>

                            <div class="form-group" style="margin-top:20px;">
                                <div style="display:flex;align-items:center;justify-content:space-between;margin-bottom:10px;">
                                    <span class="po-label" style="margin:0!important;">Nearby Places &amp; Distances</span>
                                    <button type="button" class="btn-po-add" id="btnAddPlotPlace" onclick="addPlotPlaceRow();">
                                        <i class="fa fa-plus"></i> Add Place
                                    </button>
                                </div>

                                <table class="po-table" id="plotPlacesTable">
                                    <thead>
                                        <tr>
                                            <th>Place / Landmark Name</th>
                                            <th>Distance / Travel Time</th>
                                            <th style="text-align:center;width:100px;">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td><input type="text" class="po-input" name="place_name[]" placeholder="Place Name" value="Bagdogra International Airport"></td>
                                            <td><input type="text" class="po-input" name="place_distance[]" placeholder="e.g. 3 km" value="3 km"></td>
                                            <td style="text-align:center;"><button type="button" class="btn btn-sm btn-danger btn-delete-row" onclick="$(this).closest('tr').remove();" style="border-radius:6px;" title="Delete Place"><i class="fa fa-trash"></i></button></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>

                            <!-- 5. AMENITIES CHECKBOXES (FROM AMENITIES MASTER) -->
                            <div class="form-group" style="margin-top:20px;">
                                <span class="po-label">Select Amenities for this Plot Project (Checkboxes)</span>
                                <div class="amenity-checkbox-grid" id="amenity_checkbox_container">
                                    <?php 
                                    if (!empty($amenities_master)):
                                        foreach ($amenities_master as $am):
                                    ?>
                                            <label class="amenity-checkbox-item">
                                                <input type="checkbox" class="amenity-chk-item" name="amenity_ids[]" value="<?= $am['id'] ?>">
                                                <span><?= htmlspecialchars($am['name']) ?></span>
                                            </label>
                                    <?php 
                                        endforeach;
                                    else:
                                    ?>
                                        <p style="color:#64748b;font-size:12px;">No amenities found in Amenities Master. Add amenities in the Amenities tab first!</p>
                                    <?php endif; ?>
                                </div>
                            </div>

                            <!-- 6. Status -->
                            <div class="form-group" style="margin-top:20px;">
                                <span class="po-label">Status</span>
                                <label style="margin-right:15px;cursor:pointer;font-weight:normal;color:#10b981;">
                                    <input type="radio" name="status" value="Active" id="status_active" checked> ● Active
                                </label>
                                <label style="cursor:pointer;font-weight:normal;color:#64748b;">
                                    <input type="radio" name="status" value="Inactive" id="status_inactive"> Inactive
                                </label>
                            </div>

                            <div style="text-align:center;margin-top:30px;margin-bottom:20px;">
                                <button type="submit" class="btn-po-save" id="btn_save_plot">
                                    <i class="fa fa-save" style="margin-right:8px;"></i> SAVE PLOT PROJECT
                                </button>
                            </div>

                        </div>
                    </form>
                </div>
            <?php endif; ?>

        </div>
    </div>
</div>

<script>
var allPlotsData = <?= !empty($plots_master) ? json_encode($plots_master) : '[]' ?>;
var baseUrl = "<?= base_url() ?>";

// Client-Side Toggle Functions
function showPlotsList() {
    $("#plot_form_panel").hide();
    $("#plots_table_panel").fadeIn(200);
    $('html, body').animate({ scrollTop: 0 }, 200);
}

function openAddPlotForm() {
    $("#form_plot_id").val("0");
    $("#form_existing_image").val("assets/images/slider/gardenia_hero.png");
    $("#form_heading_title").html('<i class="fa fa-plus-circle" style="color:#0F382C;margin-right:8px;"></i> Add New Plot Project');
    
    // Clear inputs
    $("#form_plot_name").val("");
    $("#form_address").val("");
    $("#form_plot_about").val("");
    $("#form_total_land_area").val("");
    $("#form_total_plots").val("");
    $("#form_plot_sizes").val("");
    $("#form_project_type").val("Residential Plots");
    $("#form_project_status").val("Ongoing");
    $("#form_google_map_url").val("");
    $("#status_active").prop("checked", true);

    $("#plot_img_preview").attr("src", baseUrl + "assets/images/slider/gardenia_hero.png");
    $("#plot_image_input").val("");

    // Reset nearby places table
    $("#plotPlacesTable tbody").html('<tr><td><input type="text" class="po-input" name="place_name[]" placeholder="Place Name" value="Bagdogra International Airport"></td><td><input type="text" class="po-input" name="place_distance[]" placeholder="e.g. 3 km" value="3 km"></td><td style="text-align:center;"><button type="button" class="btn btn-sm btn-danger btn-delete-row" style="border-radius:6px;"><i class="fa fa-trash"></i></button></td></tr>');

    $("#plots_table_panel").hide();
    $("#plot_form_panel").fadeIn(200);
    $('html, body').animate({ scrollTop: $("#plot_form_panel").offset().top - 80 }, 200);
}

function previewCompanyImg(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();
        reader.onload = function(e) {
            $("#comp_img_preview").attr("src", e.target.result);
        }
        reader.readAsDataURL(input.files[0]);
    }
}

function editPlot(id) {
    var plot = null;
    for (var i = 0; i < allPlotsData.length; i++) {
        if (allPlotsData[i].id == id) {
            plot = allPlotsData[i];
            break;
        }
    }
    if (!plot) return;

    $("#form_plot_id").val(plot.id);
    $("#form_existing_image").val(plot.image || "assets/images/slider/gardenia_hero.png");
    $("#form_heading_title").html('<i class="fa fa-edit" style="color:#0F382C;margin-right:8px;"></i> Edit Plot Project: ' + plot.name);

    $("#form_plot_name").val(plot.name || "");
    $("#form_address").val(plot.address || "");
    $("#form_plot_about").val(plot.about || "");
    $("#form_total_land_area").val(plot.land_area || "");
    $("#form_total_plots").val(plot.total_plots || "");
    $("#form_plot_sizes").val(plot.plot_sizes || "");
    $("#form_project_type").val(plot.project_type || "Residential Plots");
    $("#form_project_status").val(plot.project_status || "Ongoing");
    $("#form_google_map_url").val(plot.google_map_url || "");

    if (plot.status === "Inactive") {
        $("#status_inactive").prop("checked", true);
    } else {
        $("#status_active").prop("checked", true);
    }

    var imgSrc = plot.image ? (baseUrl + plot.image) : (baseUrl + "assets/images/slider/gardenia_hero.png");
    $("#plot_img_preview").attr("src", imgSrc);
    $("#plot_image_input").val("");

    // Set amenity checkboxes
    $(".amenity-chk-item").prop("checked", false);
    if (plot.amenity_ids && Array.isArray(plot.amenity_ids)) {
        plot.amenity_ids.forEach(function(aid) {
            $(".amenity-chk-item[value='" + aid + "']").prop("checked", true);
        });
    }

    // Set nearby places table
    var tbody = "";
    if (plot.nearby_places && Array.isArray(plot.nearby_places) && plot.nearby_places.length > 0) {
        plot.nearby_places.forEach(function(pl) {
            tbody += '<tr>' +
                '<td><input type="text" class="po-input" name="place_name[]" value="' + (pl.name || '').replace(/"/g, '&quot;') + '" required></td>' +
                '<td><input type="text" class="po-input" name="place_distance[]" value="' + (pl.distance || '').replace(/"/g, '&quot;') + '"></td>' +
                '<td style="text-align:center;"><button type="button" class="btn btn-sm btn-danger btn-delete-row" onclick="$(this).closest(\'tr\').remove();" style="border-radius:6px;" title="Delete Place"><i class="fa fa-trash"></i></button></td>' +
                '</tr>';
        });
    } else {
        tbody = '<tr><td><input type="text" class="po-input" name="place_name[]" placeholder="Place Name"></td><td><input type="text" class="po-input" name="place_distance[]" placeholder="e.g. 15 km"></td><td style="text-align:center;"><button type="button" class="btn btn-sm btn-danger btn-delete-row" onclick="$(this).closest(\'tr\').remove();" style="border-radius:6px;" title="Delete Place"><i class="fa fa-trash"></i></button></td></tr>';
    }
    $("#plotPlacesTable tbody").html(tbody);

    $("#plots_table_panel").hide();
    $("#plot_form_panel").fadeIn(200);
    $('html, body').animate({ scrollTop: $("#plot_form_panel").offset().top - 80 }, 200);
}

// Save Company Info
function saveCompanyInfo() {
    $("#btn_save_company").html('<i class="fa fa-spinner fa-spin me-1"></i> Saving...');
    $("#btn_save_company").prop('disabled', true);

    var form = document.getElementById('company_info_form');
    var formData = new FormData(form);

    $.ajax({
        url: '<?= site_url("project_overview/save_company_info") ?>',
        type: 'POST',
        data: formData,
        processData: false,
        contentType: false,
        success: function(response) {
            $("#overview_result").html("<div class='alert alert-success' style='padding:15px;background:#d1e7dd;color:#0f5132;border:1px solid #badbcc;border-radius:8px;margin-bottom:20px;font-weight:bold;'><i class='fa fa-check-circle me-1'></i> " + response + "</div>");
            $("#btn_save_company").html('<i class="fa fa-save me-1"></i> SAVE COMPANY INFO');
            $("#btn_save_company").prop('disabled', false);
            $('html, body').animate({ scrollTop: $("#overview_result").offset().top - 80 }, 200);
        },
        error: function(xhr) {
            $("#overview_result").html("<div class='alert alert-danger' style='padding:15px;background:#f8d7da;color:#842029;border:1px solid #f5c2c7;border-radius:8px;margin-bottom:20px;font-weight:bold;'><i class='fa fa-exclamation-triangle me-1'></i> Error saving data. Please try again.</div>");
            $("#btn_save_company").html('<i class="fa fa-save me-1"></i> SAVE COMPANY INFO').prop('disabled', false);
        }
    });
}

// Save Amenities Master
function saveAmenitiesMaster() {
    $("#btn_save_amenities").html('<i class="fa fa-spinner fa-spin me-1"></i> Saving...');
    $("#btn_save_amenities").prop('disabled', true);

    var form = document.getElementById('amenities_form');
    var formData = new FormData(form);

    $.ajax({
        url: '<?= site_url("project_overview/save_amenities") ?>',
        type: 'POST',
        data: formData,
        processData: false,
        contentType: false,
        success: function(response) {
            $("#overview_result").html("<div class='alert alert-success' style='padding:15px;background:#d1e7dd;color:#0f5132;border:1px solid #badbcc;border-radius:8px;margin-bottom:20px;font-weight:bold;'><i class='fa fa-check-circle me-1'></i> " + response + "</div>");
            $("#btn_save_amenities").html('<i class="fa fa-save me-1"></i> SAVE AMENITIES MASTER');
            $("#btn_save_amenities").prop('disabled', false);
            $('html, body').animate({ scrollTop: $("#overview_result").offset().top - 80 }, 200);
        },
        error: function(xhr) {
            $("#overview_result").html("<div class='alert alert-danger' style='padding:15px;background:#f8d7da;color:#842029;border:1px solid #f5c2c7;border-radius:8px;margin-bottom:20px;font-weight:bold;'><i class='fa fa-exclamation-triangle me-1'></i> Error saving data. Please try again.</div>");
            $("#btn_save_amenities").html('<i class="fa fa-save me-1"></i> SAVE AMENITIES MASTER').prop('disabled', false);
        }
    });
}

// Save Plot Form
function savePlotForm() {
    $("#btn_save_plot").html('<i class="fa fa-spinner fa-spin me-1"></i> Saving...');
    $("#btn_save_plot").prop('disabled', true);

    var form = document.getElementById('plot_form');
    var formData = new FormData(form);

    $.ajax({
        url: '<?= site_url("project_overview/save_plot") ?>',
        type: 'POST',
        data: formData,
        processData: false,
        contentType: false,
        success: function(response) {
            $("#overview_result").html("<div class='alert alert-success' style='padding:15px;background:#d1e7dd;color:#0f5132;border:1px solid #badbcc;border-radius:8px;margin-bottom:20px;font-weight:bold;'><i class='fa fa-check-circle me-1'></i> " + response + "</div>");
            $("#btn_save_plot").html('<i class="fa fa-save me-1"></i> SAVE PLOT PROJECT');
            $("#btn_save_plot").prop('disabled', false);
            $('html, body').animate({ scrollTop: $("#overview_result").offset().top - 80 }, 200);
            setTimeout(function() {
                window.location.reload();
            }, 800);
        },
        error: function(xhr) {
            $("#overview_result").html("<div class='alert alert-danger' style='padding:15px;background:#f8d7da;color:#842029;border:1px solid #f5c2c7;border-radius:8px;margin-bottom:20px;font-weight:bold;'><i class='fa fa-exclamation-triangle me-1'></i> Error saving plot project. Please check permissions.</div>");
            $("#btn_save_plot").html('<i class="fa fa-save me-1"></i> SAVE PLOT PROJECT').prop('disabled', false);
        }
    });
}

// Delete Plot
function deletePlot(id) {
    if (confirm("Are you sure you want to delete this plot project?")) {
        $.ajax({
            url: '<?= site_url("project_overview/delete_plot") ?>/' + id,
            type: 'GET',
            success: function(response) {
                alert(response);
                window.location.reload();
            }
        });
    }
}

// Add Amenity Row Function
function addAmenityRow() {
    var row = '<tr>' +
        '<td><input type="text" class="po-input" name="amenity_name[]" placeholder="Amenity Name" required></td>' +
        '<td style="text-align:center;"><button type="button" class="btn btn-sm btn-danger btn-delete-row" onclick="$(this).closest(\'tr\').remove();" style="border-radius:6px;" title="Delete Amenity"><i class="fa fa-trash"></i></button></td>' +
        '</tr>';
    $("#amenitiesTable tbody").append(row);
}

// Add Plot Nearby Place Row Function
function addPlotPlaceRow() {
    var row = '<tr>' +
        '<td><input type="text" class="po-input" name="place_name[]" placeholder="Place Name" required></td>' +
        '<td><input type="text" class="po-input" name="place_distance[]" placeholder="e.g. 15 km"></td>' +
        '<td style="text-align:center;"><button type="button" class="btn btn-sm btn-danger btn-delete-row" onclick="$(this).closest(\'tr\').remove();" style="border-radius:6px;"><i class="fa fa-trash"></i></button></td>' +
        '</tr>';
    $("#plotPlacesTable tbody").append(row);
}

// Global Event Delegation for Delete Row
$(document).off("click", ".btn-delete-row").on("click", ".btn-delete-row", function() {
    $(this).closest("tr").remove();
});

// Instant Live Preview on Plot Image Selection
$(document).off("change", "#plot_image_input").on("change", "#plot_image_input", function(e) {
    if (e.target.files && e.target.files[0]) {
        var reader = new FileReader();
        reader.onload = function(evt) {
            $("#plot_img_preview").attr("src", evt.target.result);
        };
        reader.readAsDataURL(e.target.files[0]);
    }
});
</script>
