                <?php
                $labels = get_menu_labels();
                function get_label($labels, $key, $default) {
                    return (isset($labels[$key]) && !empty($labels[$key])) ? htmlspecialchars($labels[$key]) : $default;
                }
                function is_visible($labels, $key) {
                    $show_key = "show_" . $key;
                    return (!isset($labels[$show_key]) || $labels[$show_key] == "1");
                }
                
                // Get layout settings
                $desktop_col = isset($labels['dash_desktop_col']) ? $labels['dash_desktop_col'] : 'col-lg-3 col-md-4';
                $mobile_col = isset($labels['dash_mobile_col']) ? $labels['dash_mobile_col'] : 'col-xs-12 col-sm-6';
                ?>
                <div class="inner-content">
                    <div class="dashboard-header">
                        <div class="header-content">
                            <h1>Dashboard</h1>
                            <p class="header-subtitle">Welcome to your control center</p>
                        </div>
                    </div>

                    <div class="dashboard-container">
                        <div class="row">
                            
                            <!-- Dashboard Card -->
                            <?php if(is_visible($labels, 'dash_dashboard')): ?>
                            <div class="<?= $desktop_col ?> <?= $mobile_col ?>" style="margin-bottom: 20px;">
                                <div class="stat-card card-1" ui-sref="home">
                                    <div class="card-header">
                                        <div class="card-icon">
                                            <i class="fa fa-dashboard"></i>
                                        </div>
                                        <div class="card-meta">
                                            <span class="card-badge">OVERVIEW</span>
                                        </div>
                                    </div>
                                    <div class="card-body">
                                        <h3 class="card-title"><?= get_label($labels, 'dash_dashboard', 'Dashboard') ?></h3>
                                        <div class="card-value">-</div>
                                        <p class="card-description">Control center</p>
                                    </div>
                                    <div class="card-footer">
                                        <span class="view-link">View Details <i class="fa fa-arrow-right"></i></span>
                                    </div>
                                </div>
                            </div>
                            <?php endif; ?>

                            <!-- Blog Card -->
                            <?php if(is_visible($labels, 'dash_blog')): ?>
                            <div class="<?= $desktop_col ?> <?= $mobile_col ?>" style="margin-bottom: 20px;">
                                <div class="stat-card card-4" ui-sref="blog">
                                    <div class="card-header">
                                        <div class="card-icon">
                                            <i class="fa fa-pencil"></i>
                                        </div>
                                        <div class="card-meta">
                                            <span class="card-badge">CONTENT</span>
                                        </div>
                                    </div>
                                    <div class="card-body">
                                        <h3 class="card-title"><?= get_label($labels, 'dash_blog', 'Blog Posts') ?></h3>
                                        <div class="card-value">{{blog || 0}}</div>
                                        <p class="card-description">Published articles</p>
                                    </div>
                                    <div class="card-footer">
                                        <span class="view-link">View Details <i class="fa fa-arrow-right"></i></span>
                                    </div>
                                </div>
                            </div>
                            <?php endif; ?>
                            
                            <!-- Bookings Card -->
                            <?php if(is_visible($labels, 'dash_bookings')): ?>
                            <div class="<?= $desktop_col ?> <?= $mobile_col ?>" style="margin-bottom: 20px;">
                                <div class="stat-card card-1" ui-sref="booking">
                                    <div class="card-header">
                                        <div class="card-icon">
                                            <i class="fa fa-calendar-check-o"></i>
                                        </div>
                                        <div class="card-meta">
                                            <span class="card-badge">THIS MONTH</span>
                                        </div>
                                    </div>
                                    <div class="card-body">
                                        <h3 class="card-title"><?= get_label($labels, 'dash_bookings', 'Bookings') ?></h3>
                                        <div class="card-value">{{bookings || 0}}</div>
                                        <p class="card-description">Active bookings</p>
                                    </div>
                                    <div class="card-footer">
                                        <span class="view-link">View Details <i class="fa fa-arrow-right"></i></span>
                                    </div>
                                </div>
                            </div>
                            <?php endif; ?>

                            <!-- Contacts Card -->
                            <?php if(is_visible($labels, 'dash_contacts')): ?>
                            <div class="<?= $desktop_col ?> <?= $mobile_col ?>" style="margin-bottom: 20px;">
                                <div class="stat-card card-3" ui-sref="contact">
                                    <div class="card-header">
                                        <div class="card-icon">
                                            <i class="fa fa-envelope"></i>
                                        </div>
                                        <div class="card-meta">
                                            <span class="card-badge">INQUIRIES</span>
                                        </div>
                                    </div>
                                    <div class="card-body">
                                        <h3 class="card-title"><?= get_label($labels, 'dash_contacts', 'Contacts') ?></h3>
                                        <div class="card-value">{{contact || 0}}</div>
                                        <p class="card-description">Customer messages</p>
                                    </div>
                                    <div class="card-footer">
                                        <span class="view-link">View Details <i class="fa fa-arrow-right"></i></span>
                                    </div>
                                </div>
                            </div>
                            <?php endif; ?>

                            <!-- Reviews Card -->
                            <?php if(is_visible($labels, 'dash_reviews')): ?>
                            <div class="<?= $desktop_col ?> <?= $mobile_col ?>" style="margin-bottom: 20px;">
                                <div class="stat-card card-5" ui-sref="reviews">
                                    <div class="card-header">
                                        <div class="card-icon">
                                            <i class="fa fa-star"></i>
                                        </div>
                                        <div class="card-meta">
                                            <span class="card-badge">FEEDBACK</span>
                                        </div>
                                    </div>
                                    <div class="card-body">
                                        <h3 class="card-title"><?= get_label($labels, 'dash_reviews', 'Reviews') ?></h3>
                                        <div class="card-value">{{reviews || 0}}</div>
                                        <p class="card-description">Customer ratings</p>
                                    </div>
                                    <div class="card-footer">
                                        <span class="view-link">View Details <i class="fa fa-arrow-right"></i></span>
                                    </div>
                                </div>
                            </div>
                            <?php endif; ?>
                            
                            <!-- Gallery Card -->
                            <?php if(is_visible($labels, 'dash_gallery')): ?>
                            <div class="<?= $desktop_col ?> <?= $mobile_col ?>" style="margin-bottom: 20px;">
                                <div class="stat-card card-2" ui-sref="gallery">
                                    <div class="card-header">
                                        <div class="card-icon">
                                            <i class="fa fa-image"></i>
                                        </div>
                                        <div class="card-meta">
                                            <span class="card-badge">MEDIA</span>
                                        </div>
                                    </div>
                                    <div class="card-body">
                                        <h3 class="card-title"><?= get_label($labels, 'dash_gallery', 'Photo Gallery') ?></h3>
                                        <div class="card-value">{{gallery || 0}}</div>
                                        <p class="card-description">Uploaded photos</p>
                                    </div>
                                    <div class="card-footer">
                                        <span class="view-link">View Details <i class="fa fa-arrow-right"></i></span>
                                    </div>
                                </div>
                            </div>
                            <?php endif; ?>
                            
                            <!-- Video Gallery Card -->
                            <?php if(is_visible($labels, 'dash_videogallery')): ?>
                            <div class="<?= $desktop_col ?> <?= $mobile_col ?>" style="margin-bottom: 20px;">
                                <div class="stat-card card-6" ui-sref="videogallery">
                                    <div class="card-header">
                                        <div class="card-icon">
                                            <i class="fa fa-video-camera"></i>
                                        </div>
                                        <div class="card-meta">
                                            <span class="card-badge">MEDIA</span>
                                        </div>
                                    </div>
                                    <div class="card-body">
                                        <h3 class="card-title"><?= get_label($labels, 'dash_videogallery', 'Video Gallery') ?></h3>
                                        <div class="card-value">{{videogallery || 0}}</div>
                                        <p class="card-description">Uploaded videos</p>
                                    </div>
                                    <div class="card-footer">
                                        <span class="view-link">View Details <i class="fa fa-arrow-right"></i></span>
                                    </div>
                                </div>
                            </div>
                            <?php endif; ?>

                            <!-- Plots & Properties Card -->
                            <?php if(is_visible($labels, 'dash_plots')): ?>
                            <div class="<?= $desktop_col ?> <?= $mobile_col ?>" style="margin-bottom: 20px;">
                                <div class="stat-card card-4" ui-sref="plots_properties">
                                    <div class="card-header">
                                        <div class="card-icon">
                                            <i class="fa fa-th-large"></i>
                                        </div>
                                        <div class="card-meta">
                                            <span class="card-badge">REAL ESTATE</span>
                                        </div>
                                    </div>
                                    <div class="card-body">
                                        <h3 class="card-title"><?= get_label($labels, 'dash_plots', 'Plots / Properties') ?></h3>
                                        <div class="card-value">{{plots || 3}}</div>
                                        <p class="card-description">Residential plots</p>
                                    </div>
                                    <div class="card-footer">
                                        <span class="view-link">Manage Plots <i class="fa fa-arrow-right"></i></span>
                                    </div>
                                </div>
                            </div>
                            <?php endif; ?>

                            <!-- Amenities Card -->
                            <?php if(is_visible($labels, 'dash_amenities')): ?>
                            <div class="<?= $desktop_col ?> <?= $mobile_col ?>" style="margin-bottom: 20px;">
                                <div class="stat-card card-3" ui-sref="amenities">
                                    <div class="card-header">
                                        <div class="card-icon">
                                            <i class="fa fa-tree"></i>
                                        </div>
                                        <div class="card-meta">
                                            <span class="card-badge">FEATURES</span>
                                        </div>
                                    </div>
                                    <div class="card-body">
                                        <h3 class="card-title"><?= get_label($labels, 'dash_amenities', 'Amenities Master') ?></h3>
                                        <div class="card-value">{{amenities || 8}}</div>
                                        <p class="card-description">Estate facilities</p>
                                    </div>
                                    <div class="card-footer">
                                        <span class="view-link">Manage Amenities <i class="fa fa-arrow-right"></i></span>
                                    </div>
                                </div>
                            </div>
                            <?php endif; ?>

                            <!-- Company Info Card -->
                            <?php if(is_visible($labels, 'dash_company_info')): ?>
                            <div class="<?= $desktop_col ?> <?= $mobile_col ?>" style="margin-bottom: 20px;">
                                <div class="stat-card card-2" ui-sref="company_info">
                                    <div class="card-header">
                                        <div class="card-icon">
                                            <i class="fa fa-info-circle"></i>
                                        </div>
                                        <div class="card-meta">
                                            <span class="card-badge">BRANDING</span>
                                        </div>
                                    </div>
                                    <div class="card-body">
                                        <h3 class="card-title"><?= get_label($labels, 'dash_company_info', 'Company Info') ?></h3>
                                        <div class="card-value"><i class="fa fa-check text-success"></i></div>
                                        <p class="card-description">Contact & Location</p>
                                    </div>
                                    <div class="card-footer">
                                        <span class="view-link">Edit Info <i class="fa fa-arrow-right"></i></span>
                                    </div>
                                </div>
                            </div>
                            <?php endif; ?>

                            <!-- Logs Card -->
                            <?php if(is_visible($labels, 'dash_logs')): ?>
                            <div class="<?= $desktop_col ?> <?= $mobile_col ?>" style="margin-bottom: 20px;">
                                <div class="stat-card card-6" ui-sref="logs">
                                    <div class="card-header">
                                        <div class="card-icon">
                                            <i class="fa fa-history"></i>
                                        </div>
                                        <div class="card-meta">
                                            <span class="card-badge">ACTIVITY</span>
                                        </div>
                                    </div>
                                    <div class="card-body">
                                        <h3 class="card-title"><?= get_label($labels, 'dash_logs', 'System Logs') ?></h3>
                                        <div class="card-value">{{log || 0}}</div>
                                        <p class="card-description">Activity records</p>
                                    </div>
                                    <div class="card-footer">
                                        <span class="view-link">View Details <i class="fa fa-arrow-right"></i></span>
                                    </div>
                                </div>
                            </div>
                            <?php endif; ?>
                            
                            <!-- Settings Card -->
                            <?php if(is_visible($labels, 'dash_settings')): ?>
                            <div class="<?= $desktop_col ?> <?= $mobile_col ?>" style="margin-bottom: 20px;">
                                <div class="stat-card card-5" ui-sref="settings">
                                    <div class="card-header">
                                        <div class="card-icon">
                                            <i class="fa fa-cog"></i>
                                        </div>
                                        <div class="card-meta">
                                            <span class="card-badge">CONFIG</span>
                                        </div>
                                    </div>
                                    <div class="card-body">
                                        <h3 class="card-title"><?= get_label($labels, 'dash_settings', 'Settings') ?></h3>
                                        <div class="card-value">-</div>
                                        <p class="card-description">System configuration</p>
                                    </div>
                                    <div class="card-footer">
                                        <span class="view-link">View Details <i class="fa fa-arrow-right"></i></span>
                                    </div>
                                </div>
                            </div>
                            <?php endif; ?>
                            
                        </div>
                    </div>
                </div>

<style>
/* ===== PREMIUM PROFESSIONAL DASHBOARD ===== */

.inner-content {
    padding: 0;
}

/* Header Section */
.dashboard-header {
    background: #ffffff;
    padding: 22px 24px;
    margin-bottom: 20px;
    border-radius: 14px;
    border: 1px solid #e6edf3;
    box-shadow: 0 6px 18px rgba(16, 36, 56, 0.08);
    position: relative;
}

.header-content {
    position: relative;
    z-index: 2;
}

.dashboard-header h1 {
    margin: 0;
    font-size: 24px;
    font-weight: 700;
    color: #1f2d3d;
    letter-spacing: 0.2px;
}

.header-subtitle {
    margin: 8px 0 0 0;
    font-size: 13px;
    color: #6b7d8f;
    font-weight: 500;
}

/* Container */
.dashboard-container {
    padding: 0 18px 18px 18px;
}

/* Stat Cards */
.stat-card {
    background: linear-gradient(135deg, #ffffff 0%, #f5f9fc 100%);
    border-radius: 12px;
    border: 1px solid #e8f0f8;
    box-shadow: 0 2px 12px rgba(0, 0, 0, 0.06);
    transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
    cursor: pointer;
    display: flex;
    flex-direction: column;
    padding: 16px;
    position: relative;
    overflow: hidden;
}

/* Card Background Pattern */
.stat-card::after {
    content: '';
    position: absolute;
    top: -50%;
    right: -20%;
    width: 300px;
    height: 300px;
    background: radial-gradient(circle, rgba(24, 90, 125, 0.08) 0%, transparent 70%);
    border-radius: 50%;
    pointer-events: none;
    z-index: 0;
}

.stat-card::before {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    height: 4px;
    background: linear-gradient(90deg, #185a7d 0%, #3c7ea6 100%);
    transform: scaleX(0);
    transform-origin: left;
    transition: transform 0.3s ease;
    z-index: 10;
}

.stat-card > * {
    position: relative;
    z-index: 2;
}

.stat-card:hover {
    transform: translateY(-8px);
    box-shadow: 0 12px 26px rgba(24, 90, 125, 0.12);
    border-color: #e3f2fd;
    background: linear-gradient(135deg, #ffffff 0%, #f1f7fb 100%);
}


.stat-card:hover::after {
    background: radial-gradient(circle, rgba(0, 153, 255, 0.15) 0%, transparent 70%);
}

.stat-card:hover::before {
    transform: scaleX(1);
}

/* Card Colors */
.stat-card.card-1 .card-icon { background: linear-gradient(135deg, #00bfff 0%, #0099ff 100%); }
.stat-card.card-2 .card-icon { background: linear-gradient(135deg, #00d4ff 0%, #00a8dd 100%); }
.stat-card.card-3 .card-icon { background: linear-gradient(135deg, #1e88e5 0%, #0077cc 100%); }
.stat-card.card-4 .card-icon { background: linear-gradient(135deg, #0099ff 0%, #0066cc 100%); }
.stat-card.card-5 .card-icon { background: linear-gradient(135deg, #00bfff 0%, #0088cc 100%); }
.stat-card.card-6 .card-icon { background: linear-gradient(135deg, #1e88e5 0%, #0077cc 100%); }

/* Card Header */
.card-header {
    display: flex;
    align-items: flex-start;
    justify-content: space-between;
    margin-bottom: 20px;
}

.card-icon {
    display: flex;
    align-items: center;
    justify-content: center;
    width: 56px;
    height: 56px;
    border-radius: 12px;
    font-size: 28px;
    color: white;
    transition: all 0.3s ease;
}

.stat-card:hover .card-icon {
    transform: scale(1.08) rotate(5deg);
}

.card-badge {
    display: inline-block;
    background: #f0f7ff;
    color: #0099ff;
    font-size: 10px;
    font-weight: 700;
    padding: 4px 12px;
    border-radius: 20px;
    letter-spacing: 0.5px;
    text-transform: uppercase;
}

/* Card Body */
.card-body {
    flex: 1;
    margin-bottom: 16px;
}

.card-title {
    margin: 0 0 12px 0;
    font-size: 14px;
    font-weight: 600;
    color: #5f6368;
    text-transform: uppercase;
    letter-spacing: 0.5px;
}

.card-value {
    font-size: 42px;
    font-weight: 800;
    color: #0099ff;
    line-height: 1;
    margin: 8px 0;
    letter-spacing: -1px;
}

.card-description {
    margin: 12px 0 0 0;
    font-size: 12px;
    color: #80868b;
    font-weight: 500;
}

/* Card Footer */
.card-footer {
    padding-top: 16px;
    border-top: 1px solid #f5f5f5;
}

.view-link {
    display: inline-flex;
    align-items: center;
    gap: 6px;
    color: #0099ff;
    font-size: 12px;
    font-weight: 600;
    text-decoration: none;
    transition: all 0.2s ease;
}

.stat-card:hover .view-link {
    gap: 10px;
    color: #0077cc;
}

.view-link i {
    font-size: 10px;
    transition: transform 0.2s ease;
}

.stat-card:hover .view-link i {
    transform: translateX(2px);
}

/* Responsive */
@media (max-width: 1200px) {
    .stats-grid {
        grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
        gap: 20px;
    }
}

@media (max-width: 768px) {
    .dashboard-header {
        padding: 30px 20px;
        margin-bottom: 20px;
    }
    
    .dashboard-header h1 {
        font-size: 28px;
    }
    
    .dashboard-container {
        padding: 0 20px 20px 20px;
    }
    
    .stats-grid {
        grid-template-columns: 1fr;
        gap: 16px;
    }
    
    .stat-card {
        padding: 20px;
    }
    
    .card-value {
        font-size: 36px;
    }
}
</style>
