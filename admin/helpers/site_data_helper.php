<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

function get_site_db() {
    static $sqlite = null;
    if ($sqlite === null) {
        $dbPath = FCPATH . 'application/database.php';
        $sqlite = new SQLite3($dbPath);
        $sqlite->busyTimeout(5000);
    }
    return $sqlite;
}

// Menu Labels
function get_menu_labels() {
    $db = get_site_db();
    $labels = [];
    $res = $db->query("SELECT setting_key, setting_value FROM menu_labels");
    if ($res) {
        while ($row = $res->fetchArray(SQLITE3_ASSOC)) {
            $labels[$row['setting_key']] = $row['setting_value'];
        }
    }
    return $labels;
}

function save_menu_label($key, $value) {
    $db = get_site_db();
    $stmt = $db->prepare("INSERT OR REPLACE INTO menu_labels (setting_key, setting_value) VALUES (:k, :v)");
    $stmt->bindValue(':k', $key, SQLITE3_TEXT);
    $stmt->bindValue(':v', $value, SQLITE3_TEXT);
    return $stmt->execute();
}

function save_all_menu_labels($labels) {
    $db = get_site_db();
    $stmt = $db->prepare("INSERT OR REPLACE INTO menu_labels (setting_key, setting_value) VALUES (:k, :v)");
    foreach ($labels as $k => $v) {
        $stmt->bindValue(':k', $k, SQLITE3_TEXT);
        $stmt->bindValue(':v', $v, SQLITE3_TEXT);
        $stmt->execute();
    }
    return true;
}

// Company Info
function get_company_info() {
    $db = get_site_db();
    $row = $db->querySingle("SELECT * FROM company_info WHERE id = 1", true);
    return is_array($row) ? $row : [];
}

function save_company_info_db($data) {
    $db = get_site_db();
    $stmt = $db->prepare("INSERT OR REPLACE INTO company_info (id, company_name, phone, email, description, location, image) 
        VALUES (1, :company_name, :phone, :email, :description, :location, :image)");
    $stmt->bindValue(':company_name', isset($data['company_name']) ? $data['company_name'] : '', SQLITE3_TEXT);
    $stmt->bindValue(':phone', isset($data['phone']) ? $data['phone'] : '', SQLITE3_TEXT);
    $stmt->bindValue(':email', isset($data['email']) ? $data['email'] : '', SQLITE3_TEXT);
    $stmt->bindValue(':description', isset($data['description']) ? $data['description'] : '', SQLITE3_TEXT);
    $stmt->bindValue(':location', isset($data['location']) ? $data['location'] : '', SQLITE3_TEXT);
    $stmt->bindValue(':image', isset($data['image']) ? $data['image'] : '', SQLITE3_TEXT);
    return $stmt->execute();
}

// Amenities Master
function get_amenities_master() {
    $db = get_site_db();
    $amenities = [];
    $res = $db->query("SELECT id, name, icon, status FROM amenities ORDER BY id ASC");
    if ($res) {
        while ($row = $res->fetchArray(SQLITE3_ASSOC)) {
            $amenities[] = [
                'id'   => intval($row['id']),
                'name' => $row['name']
            ];
        }
    }
    return $amenities;
}

function save_amenities_master_db($amenities) {
    $db = get_site_db();
    $db->exec("DELETE FROM amenities");
    $stmt = $db->prepare("INSERT INTO amenities (id, name, status) VALUES (:id, :name, 1)");
    foreach ($amenities as $a) {
        $stmt->bindValue(':id', $a['id'], SQLITE3_INTEGER);
        $stmt->bindValue(':name', $a['name'], SQLITE3_TEXT);
        $stmt->execute();
    }
    return true;
}

// Plots Master
function get_plots_master() {
    $db = get_site_db();
    $plots = [];
    $res = $db->query("SELECT * FROM plots ORDER BY id ASC");
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
    return $plots;
}

function save_plot_db($plot_data) {
    $db = get_site_db();
    $id = isset($plot_data['id']) ? intval($plot_data['id']) : 0;
    if ($id <= 0) {
        $max_id = $db->querySingle("SELECT COALESCE(MAX(id), 0) FROM plots");
        $id = $max_id + 1;
        $plot_data['id'] = $id;
    }
    $stmt = $db->prepare("INSERT OR REPLACE INTO plots (id, name, about, image, land_area, total_plots, plot_sizes, project_type, project_status, address, google_map_url, nearby_places, amenity_ids, status) 
        VALUES (:id, :name, :about, :image, :land_area, :total_plots, :plot_sizes, :project_type, :project_status, :address, :google_map_url, :nearby_places, :amenity_ids, :status)");
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
}

function delete_plot_db($id) {
    $db = get_site_db();
    $stmt = $db->prepare("DELETE FROM plots WHERE id = :id");
    $stmt->bindValue(':id', intval($id), SQLITE3_INTEGER);
    return $stmt->execute();
}

// Project Overview
function get_project_overview() {
    $db = get_site_db();
    $row = $db->querySingle("SELECT * FROM project_overview WHERE id = 1", true);
    if (is_array($row)) {
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
    return [];
}

// Newly Launched Projects Functions
function get_newly_launched_projects($active_only = false) {
    $db = get_site_db();
    $projects = [];
    $query = "SELECT * FROM newly_launched_projects";
    if ($active_only) {
        $query .= " WHERE LOWER(status) = 'active'";
    }
    $query .= " ORDER BY sort_order ASC, id DESC";
    $res = $db->query($query);
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
    return $projects;
}

function get_newly_launched_project_by_id($id) {
    $db = get_site_db();
    $stmt = $db->prepare("SELECT * FROM newly_launched_projects WHERE id = :id LIMIT 1");
    $stmt->bindValue(':id', intval($id), SQLITE3_INTEGER);
    $res = $stmt->execute();
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
    return null;
}

function save_newly_launched_project_db($data) {
    $db = get_site_db();
    $id = isset($data['id']) ? intval($data['id']) : 0;
    
    // Ensure table exists just in case
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
        $stmt->bindValue(':id', $id, SQLITE3_INTEGER);
    } else {
        $stmt = $db->prepare("INSERT INTO newly_launched_projects 
            (name, tagline, badge, location, price, plot_sizes, description, highlights, image, brochure, enquiry_link, launch_date, status, sort_order) 
            VALUES 
            (:name, :tagline, :badge, :location, :price, :plot_sizes, :description, :highlights, :image, :brochure, :enquiry_link, :launch_date, :status, :sort_order)");
    }

    $stmt->bindValue(':name', isset($data['name']) ? trim($data['name']) : '', SQLITE3_TEXT);
    $stmt->bindValue(':tagline', isset($data['tagline']) ? trim($data['tagline']) : '', SQLITE3_TEXT);
    $stmt->bindValue(':badge', isset($data['badge']) ? trim($data['badge']) : 'Newly Launched', SQLITE3_TEXT);
    $stmt->bindValue(':location', isset($data['location']) ? trim($data['location']) : '', SQLITE3_TEXT);
    $stmt->bindValue(':price', isset($data['price']) ? trim($data['price']) : '', SQLITE3_TEXT);
    $stmt->bindValue(':plot_sizes', isset($data['plot_sizes']) ? trim($data['plot_sizes']) : '', SQLITE3_TEXT);
    $stmt->bindValue(':description', isset($data['description']) ? trim($data['description']) : '', SQLITE3_TEXT);
    
    // Normalize highlights to JSON array
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
}

function delete_newly_launched_project_db($id) {
    $db = get_site_db();
    $stmt = $db->prepare("DELETE FROM newly_launched_projects WHERE id = :id");
    $stmt->bindValue(':id', intval($id), SQLITE3_INTEGER);
    return $stmt->execute();
}

