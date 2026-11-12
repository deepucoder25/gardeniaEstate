<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

function get_site_db() {
    static $sqlite = null;
    if ($sqlite === null) {
        if (!class_exists('SQLite3')) {
            $sqlite = false;
            return false;
        }
        $dbPath = FCPATH . 'application/database.php';
        if (!file_exists($dbPath)) {
            $sqlite = false;
            return false;
        }
        try {
            $sqlite = new SQLite3($dbPath);
            $sqlite->busyTimeout(5000);
        } catch (Throwable $e) {
            $sqlite = false;
        }
    }
    return $sqlite;
}

// -----------------------------------------------------------------------------
// Default Fallbacks (Used if database is malformed, empty, or inaccessible)
// -----------------------------------------------------------------------------

function get_default_menu_labels() {
    return [
        'label_dashboard' => 'Dashboard',
        'label_blog' => 'Blog',
        'label_bookings' => 'Booking',
        'label_contacts' => 'Contacts',
        'label_reviews' => 'Reviews',
        'label_gallery' => 'Photo Gallery',
        'label_videogallery' => 'Video Gallery',
        'label_shipments' => 'Shipments',
        'label_tracking' => 'Tracking',
        'label_logs' => 'Logs',
        'label_settings' => 'Settings',
        'show_label_dashboard' => '1',
        'show_label_blog' => '1',
        'show_label_bookings' => '1',
        'show_label_contacts' => '1',
        'show_label_reviews' => '1',
        'show_label_gallery' => '1',
        'show_label_videogallery' => '1',
        'show_label_shipments' => '1',
        'show_label_tracking' => '1',
        'show_label_logs' => '1',
        'show_label_settings' => '1',
        'dash_bookings' => 'Bookings',
        'dash_contacts' => 'Contacts',
        'dash_blog' => 'Blog Posts',
        'dash_reviews' => 'Reviews',
        'dash_logs' => 'System Logs',
        'dash_dashboard' => 'Dashboard',
        'show_dash_dashboard' => '0',
        'show_dash_blog' => '1',
        'show_dash_bookings' => '1',
        'show_dash_contacts' => '1',
        'show_dash_reviews' => '0',
        'dash_gallery' => 'Photo Gallery',
        'show_dash_gallery' => '0',
        'dash_videogallery' => 'Video Gallery',
        'show_dash_videogallery' => '0',
        'dash_shipments' => 'Shipments',
        'show_dash_shipments' => '1',
        'dash_tracking' => 'Tracking',
        'show_dash_tracking' => '1',
        'show_dash_logs' => '0',
        'dash_settings' => 'Settings',
        'show_dash_settings' => '0',
        'dash_desktop_col' => 'col-lg-2 col-md-3',
        'dash_mobile_col' => 'col-xs-12 col-sm-12',
        'book_label_date' => 'Booking Date',
        'book_label_client' => 'Client Name',
        'book_label_contact' => 'Contact No.',
        'book_label_freight' => 'Service',
        'book_label_route' => 'Route (Origin → Dest)',
        'book_label_lead' => 'Lead Status',
        'book_label_loss' => 'Loss Reason',
        'book_label_action' => 'Action',
        'label_plots' => 'Plots / Properties',
        'show_label_plots' => '1',
        'label_amenities' => 'Amenities Master',
        'show_label_amenities' => '1',
        'label_company_info' => 'Company Info',
        'show_label_company_info' => '1',
        'show_dash_plots' => '1',
        'dash_amenities' => 'Amenities Master',
        'show_dash_amenities' => '0',
        'dash_company_info' => 'Company Info',
        'show_dash_company_info' => '0',
        'dash_plots' => 'Plots / Properties'
    ];
}

function get_default_company_info() {
    return [
        'id'           => 1,
        'company_name' => 'The Gardenia Estate',
        'phone'        => '+91 98765 43210',
        'email'        => 'info@thegardeniaestate.in',
        'description'  => 'A premier 50+ Acre luxury township offering residential plots and luxury bungalows for sale along Airport Road & Asian Highway 2, Bagdogra, Siliguri featuring 40% open green space, 30+ world-class amenities, and immediate RERA-approved registration.',
        'location'     => 'Airport Road, Bagdogra, Siliguri, West Bengal – 734014',
        'image'        => 'assets/images/reviews/bagdogra_plots_bungalows.webp'
    ];
}

function get_default_amenities_master() {
    return [
        ['id' => 1, 'name' => 'Tree-lined Gardens & Parks'],
        ['id' => 2, 'name' => '24/7 Gated Security & CCTV'],
        ['id' => 3, 'name' => 'Underground Power & Utilities'],
        ['id' => 4, 'name' => 'Wide Asphalt Internal Roads'],
        ['id' => 5, 'name' => 'Clubhouse & Swimming Pool'],
        ['id' => 6, 'name' => 'Rainwater Harvesting System'],
        ['id' => 7, 'name' => 'Avenue Plantation & Reflexology Track'],
        ['id' => 8, 'name' => 'RERA Approved Clear Title Plots']
    ];
}

function get_default_plots() {
    return [
        [
            'id'             => 1,
            'name'           => 'Gardenia Phase 1 Villa Plots',
            'about'          => 'Exclusive RERA-approved luxury villa plots in Bagdogra, Siliguri with 40ft wide internal roads, underground electrical cabling, and 40% open green spaces.',
            'image'          => 'assets/images/reviews/plot_gardenia_phase1.webp',
            'land_area'      => '20 Acres',
            'total_plots'    => '180 Plots',
            'plot_sizes'     => '1200 Sq.Ft (30x40), 1500 Sq.Ft (30x50), 2400 Sq.Ft (40x60)',
            'project_type'   => 'Residential Plots',
            'project_status' => 'Ongoing',
            'address'        => 'Airport Road, Bagdogra, Siliguri, West Bengal 734014',
            'google_map_url' => 'https://maps.google.com/maps?q=Bagdogra,+Siliguri,+West+Bengal&t=&z=13&ie=UTF8&iwloc=&output=embed',
            'nearby_places'  => [
                ['name' => 'Bagdogra International Airport', 'distance' => '3 km'],
                ['name' => 'Asian Highway 2 (AH2) Junction', 'distance' => '1.5 km'],
                ['name' => 'North Bengal University (NBU)', 'distance' => '7 km']
            ],
            'amenity_ids'    => [1, 2, 3, 4, 5, 6, 7, 8],
            'status'         => 'Active'
        ],
        [
            'id'             => 2,
            'name'           => 'Gardenia Commercial Boulevard',
            'about'          => 'Prime high-yield commercial plot spaces positioned directly along the Asian Highway 2 corridor in Bagdogra. High visibility and rapid capital appreciation.',
            'image'          => 'assets/images/reviews/plot_gardenia_boulevard.webp',
            'land_area'      => '12 Acres',
            'total_plots'    => '45 Commercial Plots',
            'plot_sizes'     => '2400 Sq.Ft (40x60), 4000 Sq.Ft (50x80)',
            'project_type'   => 'Commercial Plots',
            'project_status' => 'Pre-Launching',
            'address'        => 'Main Asian Highway 2 Corridor, Bagdogra, Siliguri, West Bengal',
            'google_map_url' => 'https://maps.google.com/maps?q=Bagdogra,+Siliguri,+West+Bengal&t=&z=13&ie=UTF8&iwloc=&output=embed',
            'nearby_places'  => [
                ['name' => 'Bagdogra International Airport', 'distance' => '4 km'],
                ['name' => 'Siliguri City Center / Matigara', 'distance' => '9 km']
            ],
            'amenity_ids'    => [2, 3, 4, 6, 8],
            'status'         => 'Active'
        ],
        [
            'id'             => 3,
            'name'           => 'Gardenia Luxury Bungalows (Phase 2)',
            'about'          => 'Ultra-luxury standalone bungalows for sale nestled amidst scenic green tea gardens, private lawn, modern architecture, clubhouse, and 24/7 security.',
            'image'          => 'assets/images/reviews/plot_gardenia_sanctuary.webp',
            'land_area'      => '18 Acres',
            'total_plots'    => '65 Luxury Bungalows',
            'plot_sizes'     => '3 BHK & 4 BHK Bungalows (Built on 1500 to 2400 Sq.Ft plots)',
            'project_type'   => 'Luxury Bungalow',
            'project_status' => 'Upcoming',
            'address'        => 'Near North Bengal University, Bagdogra, Siliguri, West Bengal',
            'google_map_url' => 'https://maps.google.com/maps?q=Bagdogra,+Siliguri,+West+Bengal&t=&z=13&ie=UTF8&iwloc=&output=embed',
            'nearby_places'  => [
                ['name' => 'North Bengal Medical College (NBMCH)', 'distance' => '5 km'],
                ['name' => 'New Jalpaiguri (NJP) Railway Station', 'distance' => '16 km']
            ],
            'amenity_ids'    => [1, 2, 3, 4, 5, 6, 7, 8],
            'status'         => 'Active'
        ]
    ];
}

function get_default_project_overview() {
    return [
        'id'                     => 1,
        'project_name'           => 'The Gardenia Estate',
        'short_description'      => 'Luxury Residential Plots & Bungalows For Sale in Bagdogra, Siliguri.',
        'full_description'       => 'Bagdogra, a rapidly evolving prime hub in Siliguri, North Bengal, has emerged as a premier destination for real estate investments, particularly in luxury residential plots and exclusive bungalows. Its strategic location near the international airport, robust infrastructure development, and seamless connectivity make it an attractive choice for investors and homebuyers seeking plots and luxury bungalows for sale.',
        'location'               => 'Airport Road, Bagdogra, Siliguri, West Bengal - 734014',
        'total_land_area'        => '50+ Acres',
        'total_plots'            => '500+ Premium Plots & Bungalows',
        'plot_sizes'             => '1200 Sq.Ft (30x40), 1500 Sq.Ft (30x50), 2400 Sq.Ft (40x60)',
        'project_type'           => 'Residential Plots & Luxury Bungalows',
        'project_status'         => 'Pre-Launching',
        'master_plan_image'      => 'assets/images/uploads/master_plan_1788329113.png',
        'master_plan_description'=> '40% Open spaces with tree-lined avenues, reflexology parks, underground cabling & 24/7 security.',
        'amenities'              => [
            ['name' => 'Tree-lined Gardens & Parks', 'icon' => 'bi-tree-fill'],
            ['name' => '24/7 Gated Security & CCTV', 'icon' => 'bi-shield-check'],
            ['name' => 'Underground Power & Utilities', 'icon' => 'bi-lightning-charge-fill'],
            ['name' => 'Wide Asphalt Internal Roads', 'icon' => 'bi-signpost-2-fill']
        ],
        'google_map_url'         => 'https://maps.google.com/maps?q=Bagdogra,+Siliguri,+West+Bengal&t=&z=13&ie=UTF8&iwloc=&output=embed',
        'nearby_places'          => [
            ['name' => 'Bagdogra International Airport (IXB)', 'distance' => '3 km (5 mins)'],
            ['name' => 'Asian Highway 2 (AH2) / NH 27', 'distance' => '1.5 km (3 mins)'],
            ['name' => 'North Bengal University (NBU)', 'distance' => '7 km (10 mins)'],
            ['name' => 'North Bengal Medical College (NBMCH)', 'distance' => '8 km (12 mins)']
        ],
        'status'                 => 'Active',
        'properties'             => [
            ['number' => 'Plot #101', 'size' => '1200 Sq.Ft (30x40)', 'facing' => 'East', 'price' => '₹45 Lakhs', 'status' => 'Available'],
            ['number' => 'Plot #102', 'size' => '1500 Sq.Ft (30x50)', 'facing' => 'North-East', 'price' => '₹56 Lakhs', 'status' => 'Booked'],
            ['number' => 'Plot #103', 'size' => '2400 Sq.Ft (40x60)', 'facing' => 'West', 'price' => '₹89 Lakhs', 'status' => 'Available'],
            ['number' => 'Plot #104', 'size' => '1200 Sq.Ft (30x40)', 'facing' => 'East', 'price' => '₹45 Lakhs', 'status' => 'Available']
        ]
    ];
}

function get_default_newly_launched_projects() {
    return [
        [
            'id'             => 1,
            'name'           => 'Gardenia Grandeur - Phase 2',
            'tagline'        => 'Premium Villa Plots & Smart Living Community',
            'badge'          => 'Newly Launched',
            'location'       => 'Near Bihta Airport & Outer Ring Road, Patna',
            'price'          => '₹ 14.50 Lacs Onwards',
            'plot_sizes'     => '1000, 1500 & 2400 Sq.Ft.',
            'description'    => 'An ultra-modern gated plotted township designed with wide roads, lush greenery, and rapid connectivity to commercial hubs and airport.',
            'highlights'     => json_encode([
                'Immediate Registry & Mutation',
                '30 & 40 Ft. Wide Black-Top Roads',
                '24x7 Gated Security & Street Lights',
                'Landscaped Green Parks & Underground Drainage'
            ]),
            'image'          => 'assets/images/slider/gardenia_hero.webp',
            'brochure'       => null,
            'enquiry_link'   => null,
            'launch_date'    => null,
            'status'         => 'Active',
            'sort_order'     => 1,
            'created_at'     => '2026-10-26 04:43:35',
            'highlights_list'=> [
                'Immediate Registry & Mutation',
                '30 & 40 Ft. Wide Black-Top Roads',
                '24x7 Gated Security & Street Lights',
                'Landscaped Green Parks & Underground Drainage'
            ]
        ]
    ];
}

// Menu Labels
function get_menu_labels() {
    $db = get_site_db();
    $labels = [];
    if ($db) {
        try {
            $res = @$db->query("SELECT setting_key, setting_value FROM menu_labels");
            if ($res) {
                while ($row = $res->fetchArray(SQLITE3_ASSOC)) {
                    $labels[$row['setting_key']] = $row['setting_value'];
                }
            }
        } catch (Throwable $e) {}
    }
    return !empty($labels) ? $labels : get_default_menu_labels();
}

function save_menu_label($key, $value) {
    $db = get_site_db();
    if (!$db) return false;
    try {
        $stmt = $db->prepare("INSERT OR REPLACE INTO menu_labels (setting_key, setting_value) VALUES (:k, :v)");
        if (!$stmt) return false;
        $stmt->bindValue(':k', $key, SQLITE3_TEXT);
        $stmt->bindValue(':v', $value, SQLITE3_TEXT);
        return $stmt->execute();
    } catch (Throwable $e) {
        return false;
    }
}

function save_all_menu_labels($labels) {
    $db = get_site_db();
    if (!$db) return false;
    try {
        $stmt = $db->prepare("INSERT OR REPLACE INTO menu_labels (setting_key, setting_value) VALUES (:k, :v)");
        if (!$stmt) return false;
        foreach ($labels as $k => $v) {
            $stmt->bindValue(':k', $k, SQLITE3_TEXT);
            $stmt->bindValue(':v', $v, SQLITE3_TEXT);
            $stmt->execute();
        }
        return true;
    } catch (Throwable $e) {
        return false;
    }
}

// Company Info
function get_company_info() {
    $db = get_site_db();
    $row = null;
    if ($db) {
        try {
            $row = @$db->querySingle("SELECT * FROM company_info WHERE id = 1", true);
        } catch (Throwable $e) {}
    }
    return (is_array($row) && !empty($row)) ? $row : get_default_company_info();
}

function save_company_info_db($data) {
    $db = get_site_db();
    if (!$db) return false;
    try {
        $stmt = $db->prepare("INSERT OR REPLACE INTO company_info (id, company_name, phone, email, description, location, image) 
            VALUES (1, :company_name, :phone, :email, :description, :location, :image)");
        if (!$stmt) return false;
        $stmt->bindValue(':company_name', isset($data['company_name']) ? $data['company_name'] : '', SQLITE3_TEXT);
        $stmt->bindValue(':phone', isset($data['phone']) ? $data['phone'] : '', SQLITE3_TEXT);
        $stmt->bindValue(':email', isset($data['email']) ? $data['email'] : '', SQLITE3_TEXT);
        $stmt->bindValue(':description', isset($data['description']) ? $data['description'] : '', SQLITE3_TEXT);
        $stmt->bindValue(':location', isset($data['location']) ? $data['location'] : '', SQLITE3_TEXT);
        $stmt->bindValue(':image', isset($data['image']) ? $data['image'] : '', SQLITE3_TEXT);
        return $stmt->execute();
    } catch (Throwable $e) {
        return false;
    }
}

// Amenities Master
function get_amenities_master() {
    $db = get_site_db();
    $amenities = [];
    if ($db) {
        try {
            $res = @$db->query("SELECT id, name, icon, status FROM amenities ORDER BY id ASC");
            if ($res) {
                while ($row = $res->fetchArray(SQLITE3_ASSOC)) {
                    $amenities[] = [
                        'id'   => intval($row['id']),
                        'name' => $row['name']
                    ];
                }
            }
        } catch (Throwable $e) {}
    }
    return !empty($amenities) ? $amenities : get_default_amenities_master();
}

function save_amenities_master_db($amenities) {
    $db = get_site_db();
    if (!$db) return false;
    try {
        $db->exec("DELETE FROM amenities");
        $stmt = $db->prepare("INSERT INTO amenities (id, name, status) VALUES (:id, :name, 1)");
        if (!$stmt) return false;
        foreach ($amenities as $a) {
            $stmt->bindValue(':id', $a['id'], SQLITE3_INTEGER);
            $stmt->bindValue(':name', $a['name'], SQLITE3_TEXT);
            $stmt->execute();
        }
        return true;
    } catch (Throwable $e) {
        return false;
    }
}

// Plots Master
function get_plots_master() {
    $db = get_site_db();
    $plots = [];
    if ($db) {
        try {
            $res = @$db->query("SELECT * FROM plots ORDER BY id ASC");
            if ($res) {
                while ($row = $res->fetchArray(SQLITE3_ASSOC)) {
                    $plots[] = [
                        'id'             => intval($row['id']),
                        'name'           => $row['name'],
                        'about'          => $row['about'],
                        'image'          => $row['image'],
                        'land_area'      => $row['land_area'],
                        'total_plots'    => $row['total_plots'],
                        'plot_sizes'     => $row['plot_sizes'],
                        'project_type'   => $row['project_type'],
                        'project_status' => $row['project_status'],
                        'address'        => $row['address'],
                        'google_map_url' => $row['google_map_url'],
                        'nearby_places'  => !empty($row['nearby_places']) ? json_decode($row['nearby_places'], true) : [],
                        'amenity_ids'    => !empty($row['amenity_ids']) ? json_decode($row['amenity_ids'], true) : [],
                        'status'         => $row['status']
                    ];
                }
            }
        } catch (Throwable $e) {}
    }
    return !empty($plots) ? $plots : get_default_plots();
}

function save_plot_db($plot_data) {
    $db = get_site_db();
    if (!$db) return false;
    try {
        $id = isset($plot_data['id']) ? intval($plot_data['id']) : 0;
        if ($id <= 0) {
            $max_id = $db->querySingle("SELECT COALESCE(MAX(id), 0) FROM plots");
            $id = $max_id + 1;
            $plot_data['id'] = $id;
        }
        $stmt = $db->prepare("INSERT OR REPLACE INTO plots (id, name, about, image, land_area, total_plots, plot_sizes, project_type, project_status, address, google_map_url, nearby_places, amenity_ids, status) 
            VALUES (:id, :name, :about, :image, :land_area, :total_plots, :plot_sizes, :project_type, :project_status, :address, :google_map_url, :nearby_places, :amenity_ids, :status)");
        if (!$stmt) return false;
        $stmt->bindValue(':id', $plot_data['id'], SQLITE3_INTEGER);
        $stmt->bindValue(':name', $plot_data['name'], SQLITE3_TEXT);
        $stmt->bindValue(':about', isset($plot_data['about']) ? $plot_data['about'] : '', SQLITE3_TEXT);
        $stmt->bindValue(':image', isset($plot_data['image']) ? $plot_data['image'] : '', SQLITE3_TEXT);
        $stmt->bindValue(':land_area', isset($plot_data['land_area']) ? $plot_data['land_area'] : '', SQLITE3_TEXT);
        $stmt->bindValue(':total_plots', isset($plot_data['total_plots']) ? $plot_data['total_plots'] : '', SQLITE3_TEXT);
        $stmt->bindValue(':plot_sizes', isset($plot_data['plot_sizes']) ? $plot_data['plot_sizes'] : '', SQLITE3_TEXT);
        $stmt->bindValue(':project_type', isset($plot_data['project_type']) ? $plot_data['project_type'] : '', SQLITE3_TEXT);
        $stmt->bindValue(':project_status', isset($plot_data['project_status']) ? $plot_data['project_status'] : '', SQLITE3_TEXT);
        $stmt->bindValue(':address', isset($plot_data['address']) ? $plot_data['address'] : '', SQLITE3_TEXT);
        $stmt->bindValue(':google_map_url', isset($plot_data['google_map_url']) ? $plot_data['google_map_url'] : '', SQLITE3_TEXT);
        $stmt->bindValue(':nearby_places', isset($plot_data['nearby_places']) ? (is_string($plot_data['nearby_places']) ? $plot_data['nearby_places'] : json_encode($plot_data['nearby_places'])) : '[]', SQLITE3_TEXT);
        $stmt->bindValue(':amenity_ids', isset($plot_data['amenity_ids']) ? (is_string($plot_data['amenity_ids']) ? $plot_data['amenity_ids'] : json_encode($plot_data['amenity_ids'])) : '[]', SQLITE3_TEXT);
        $stmt->bindValue(':status', isset($plot_data['status']) ? $plot_data['status'] : 'Active', SQLITE3_TEXT);
        return $stmt->execute();
    } catch (Throwable $e) {
        return false;
    }
}

function delete_plot_db($id) {
    $db = get_site_db();
    if (!$db) return false;
    try {
        $stmt = $db->prepare("DELETE FROM plots WHERE id = :id");
        if (!$stmt) return false;
        $stmt->bindValue(':id', intval($id), SQLITE3_INTEGER);
        return $stmt->execute();
    } catch (Throwable $e) {
        return false;
    }
}

// Project Overview
function get_project_overview() {
    $db = get_site_db();
    $row = null;
    if ($db) {
        try {
            $row = @$db->querySingle("SELECT * FROM project_overview WHERE id = 1", true);
        } catch (Throwable $e) {}
    }
    if (is_array($row) && !empty($row)) {
        if (!empty($row['amenities']) && is_string($row['amenities'])) {
            $row['amenities'] = json_decode($row['amenities'], true);
        }
        if (!empty($row['nearby_places']) && is_string($row['nearby_places'])) {
            $row['nearby_places'] = json_decode($row['nearby_places'], true);
        }
        if (!empty($row['properties']) && is_string($row['properties'])) {
            $row['properties'] = json_decode($row['properties'], true);
        }
        return $row;
    }
    return get_default_project_overview();
}

// Newly Launched Projects Functions
function get_newly_launched_projects($active_only = false) {
    $db = get_site_db();
    $projects = [];
    if ($db) {
        try {
            $query = "SELECT * FROM newly_launched_projects";
            if ($active_only) {
                $query .= " WHERE LOWER(status) = 'active'";
            }
            $query .= " ORDER BY sort_order ASC, id DESC";
            $res = @$db->query($query);
            if ($res) {
                while ($row = $res->fetchArray(SQLITE3_ASSOC)) {
                    $highlights = [];
                    if (!empty($row['highlights'])) {
                        $decoded = json_decode($row['highlights'], true);
                        $highlights = is_array($decoded) ? $decoded : array_filter(array_map('trim', explode("\n", $row['highlights'])));
                    }
                    $row['highlights_list'] = $highlights;
                    $projects[] = $row;
                }
            }
        } catch (Throwable $e) {}
    }
    if (!empty($projects)) {
        return $projects;
    }
    $defaults = get_default_newly_launched_projects();
    if ($active_only) {
        $defaults = array_values(array_filter($defaults, function($p) {
            return strtolower($p['status'] ?? 'active') === 'active';
        }));
    }
    return $defaults;
}

function get_newly_launched_project_by_id($id) {
    $db = get_site_db();
    if ($db) {
        try {
            $stmt = $db->prepare("SELECT * FROM newly_launched_projects WHERE id = :id LIMIT 1");
            if ($stmt) {
                $stmt->bindValue(':id', intval($id), SQLITE3_INTEGER);
                $res = @$stmt->execute();
                if ($res) {
                    $row = $res->fetchArray(SQLITE3_ASSOC);
                    if ($row) {
                        $highlights = [];
                        if (!empty($row['highlights'])) {
                            $decoded = json_decode($row['highlights'], true);
                            $highlights = is_array($decoded) ? $decoded : array_filter(array_map('trim', explode("\n", $row['highlights'])));
                        }
                        $row['highlights_list'] = $highlights;
                        return $row;
                    }
                }
            }
        } catch (Throwable $e) {}
    }
    $defaults = get_default_newly_launched_projects();
    foreach ($defaults as $p) {
        if ($p['id'] == $id) return $p;
    }
    return null;
}

function save_newly_launched_project_db($data) {
    $db = get_site_db();
    if (!$db) return false;
    try {
        $id = isset($data['id']) ? intval($data['id']) : 0;
        
        $db->exec("CREATE TABLE IF NOT EXISTS newly_launched_projects (
            id INTEGER PRIMARY KEY AUTOINCREMENT,
            name TEXT NOT NULL,
            tagline TEXT,
            badge TEXT DEFAULT 'Newly Launched',
            location TEXT,
            price TEXT,
            plot_sizes TEXT,
            description TEXT,
            highlights TEXT,
            image TEXT,
            brochure TEXT,
            enquiry_link TEXT,
            launch_date TEXT,
            status TEXT DEFAULT 'Active',
            sort_order INTEGER DEFAULT 0,
            created_at DATETIME DEFAULT CURRENT_TIMESTAMP
        )");

        if ($id > 0) {
            $stmt = $db->prepare("UPDATE newly_launched_projects SET 
                name = :name,
                tagline = :tagline,
                badge = :badge,
                location = :location,
                price = :price,
                plot_sizes = :plot_sizes,
                description = :description,
                highlights = :highlights,
                image = :image,
                brochure = :brochure,
                enquiry_link = :enquiry_link,
                launch_date = :launch_date,
                status = :status,
                sort_order = :sort_order
                WHERE id = :id");
            if (!$stmt) return false;
            $stmt->bindValue(':id', $id, SQLITE3_INTEGER);
        } else {
            $stmt = $db->prepare("INSERT INTO newly_launched_projects 
                (name, tagline, badge, location, price, plot_sizes, description, highlights, image, brochure, enquiry_link, launch_date, status, sort_order) 
                VALUES 
                (:name, :tagline, :badge, :location, :price, :plot_sizes, :description, :highlights, :image, :brochure, :enquiry_link, :launch_date, :status, :sort_order)");
            if (!$stmt) return false;
        }

        $stmt->bindValue(':name', isset($data['name']) ? trim($data['name']) : '', SQLITE3_TEXT);
        $stmt->bindValue(':tagline', isset($data['tagline']) ? trim($data['tagline']) : '', SQLITE3_TEXT);
        $stmt->bindValue(':badge', isset($data['badge']) ? trim($data['badge']) : 'Newly Launched', SQLITE3_TEXT);
        $stmt->bindValue(':location', isset($data['location']) ? trim($data['location']) : '', SQLITE3_TEXT);
        $stmt->bindValue(':price', isset($data['price']) ? trim($data['price']) : '', SQLITE3_TEXT);
        $stmt->bindValue(':plot_sizes', isset($data['plot_sizes']) ? trim($data['plot_sizes']) : '', SQLITE3_TEXT);
        $stmt->bindValue(':description', isset($data['description']) ? trim($data['description']) : '', SQLITE3_TEXT);
        
        $highlights = [];
        if (isset($data['highlights'])) {
            if (is_array($data['highlights'])) {
                $highlights = array_values(array_filter(array_map('trim', $data['highlights'])));
            } else if (is_string($data['highlights'])) {
                $lines = preg_split('/[\r\n]+/', $data['highlights']);
                $highlights = array_values(array_filter(array_map('trim', $lines)));
            }
        }
        $stmt->bindValue(':highlights', json_encode($highlights), SQLITE3_TEXT);
        $stmt->bindValue(':image', isset($data['image']) ? trim($data['image']) : '', SQLITE3_TEXT);
        $stmt->bindValue(':brochure', isset($data['brochure']) ? trim($data['brochure']) : '', SQLITE3_TEXT);
        $stmt->bindValue(':enquiry_link', isset($data['enquiry_link']) ? trim($data['enquiry_link']) : '', SQLITE3_TEXT);
        $stmt->bindValue(':launch_date', isset($data['launch_date']) ? trim($data['launch_date']) : '', SQLITE3_TEXT);
        $stmt->bindValue(':status', isset($data['status']) ? trim($data['status']) : 'Active', SQLITE3_TEXT);
        $stmt->bindValue(':sort_order', isset($data['sort_order']) ? intval($data['sort_order']) : 0, SQLITE3_INTEGER);

        return $stmt->execute();
    } catch (Throwable $e) {
        return false;
    }
}

function delete_newly_launched_project_db($id) {
    $db = get_site_db();
    if (!$db) return false;
    try {
        $stmt = $db->prepare("DELETE FROM newly_launched_projects WHERE id = :id");
        if (!$stmt) return false;
        $stmt->bindValue(':id', intval($id), SQLITE3_INTEGER);
        return $stmt->execute();
    } catch (Throwable $e) {
        return false;
    }
}
