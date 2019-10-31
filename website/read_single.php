<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// Headers
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');

// include database and object files
include __DIR__ . "/../config/database.php";
include __DIR__ . "/../models/website.php";

// include_once "../config/database.php";
// include_once "../models/website.php";

// Instantiate DB & connect
$database = new Database();
$db = $database->connect();

// Instantiate blog website object
$website = new Website($db);

// Get ID
$website->id = isset($_GET['id']) ? $_GET['id'] : die();

// Get raw websiteed data
// $data = json_decode(file_get_contents("php://input"));
// $website->id = $data->id;

// Get website
if ($website->read_single()) {
    // Create array
    $website_arr = array(
        'id' => $website->id,
        'title' => $website->title,
        'url' => $website->url,
        'description' => $website->description,
    );

    // Make JSON
    print_r(json_encode($website_arr));
} else {
    echo json_encode(
        array('message' => 'Website Not Found')
    );
}
