<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// Headers
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');
header('Access-Control-Allow-Methods: PUT');
header('Access-Control-Allow-Headers: Access-Control-Allow-Headers,Content-Type,Access-Control-Allow-Methods, Authorization, X-Requested-With');

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

// Get raw educationed data
$data = json_decode(file_get_contents("php://input"));

// Set ID to update
$education->id = $data->id;
$education->school = $data->school;
$education->course = $data->course;
$education->start_date = $data->start_date;
$education->end_date = $data->end_date;

// Update education
if ($education->update()) {
    echo json_encode(
        array(
            'message' => 'Education Updated',
            'id' => $education->id,
            'school' => $education->school,
            'course' => $education->course,
            'start_date' => $education->start_date,
            'end_date' => $education->end_date,
        )
    );
} else {
    echo json_encode(
        array('message' => 'Education Not Updated')
    );
}
