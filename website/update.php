<?php
// ini_set('display_errors', 1);
// ini_set('display_startup_errors', 1);
// error_reporting(E_ALL);

// Headers
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');
header('Access-Control-Allow-Methods: PUT');
header('Access-Control-Allow-Headers: Access-Control-Allow-Headers,Content-Type,Access-Control-Allow-Methods, Authorization, X-Requested-With');

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

// Get raw jobed data
$data = json_decode(file_get_contents("php://input"));

// Set ID to update
$website->id = $data->id;
$website->title = $data->title;
$website->url = $data->url;
$website->description = $data->description;

// Update website
if ($website->update()) {
    echo json_encode(
        array(
            'message' => 'Website Updated',
            'id' => $website->id,
            'title' => $website->title,
            'url' => $website->url,
            'description' => $website->description,
        )
    );
} else {
    echo json_encode(
        array('message' => 'Website Not Updated')
    );
}
