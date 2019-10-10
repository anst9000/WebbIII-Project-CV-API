<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// Headers
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');

// include database and object files
include __DIR__ . "/../../config/database.php";
include __DIR__ . "/../../models/education.php";

// include_once "../../config/database.php";
// include_once "../../models/education.php";

// Instantiate DB & connect
$database = new Database();
$db = $database->connect();

// Instantiate blog education object
$education = new Education($db);

// Get ID
$education->id = isset($_GET['id']) ? $_GET['id'] : die();

// Get raw educationed data
// $data = json_decode(file_get_contents("php://input"));
// $education->id = $data->id;

// Get education
if ($education->read_single()) {
    // Create array
    $education_arr = array(
        'id' => $education->id,
        'school' => $education->school,
        'course' => $education->course,
        'start_date' => $education->start_date,
        'end_date' => $education->end_date,
    );

    // Make JSON
    print_r(json_encode($education_arr));
} else {
    echo json_encode(
        array('message' => 'Education Not Found')
    );
}
