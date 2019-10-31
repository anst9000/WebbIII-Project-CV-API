<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// Headers
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');

// include database and object files
include __DIR__ . "/../config/database.php";
include __DIR__ . "/../models/job.php";

// include_once "../config/database.php";
// include_once "../models/job.php";

// Instantiate DB & connect
$database = new Database();
$db = $database->connect();

// Instantiate blog job object
$job = new Job($db);

// Get ID
$job->id = isset($_GET['id']) ? $_GET['id'] : die();

// Get raw educationed data
// $data = json_decode(file_get_contents("php://input"));
// $job->id = $data->id;

// Get job
if ($job->read_single()) {
    // Create array
    $job_arr = array(
        'id' => $job->id,
        'company' => $job->company,
        'title' => $job->title,
        'start_date' => $job->start_date,
        'end_date' => $job->end_date,
    );

    // Make JSON
    print_r(json_encode($job_arr));
} else {
    echo json_encode(
        array('message' => 'Job Not Found')
    );
}
