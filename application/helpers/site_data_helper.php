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
