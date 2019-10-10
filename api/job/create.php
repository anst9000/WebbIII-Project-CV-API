<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// Headers
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');
header('Access-Control-Allow-Methods: POST');
header('Access-Control-Allow-Headers: Access-Control-Allow-Headers,Content-Type,Access-Control-Allow-Methods, Authorization, X-Requested-With');

// include database and object files
include __DIR__ . "/../../config/database.php";
include __DIR__ . "/../../models/job.php";

// include_once "../../config/database.php";
// include_once "../../models/job.php";

// Instantiate DB & connect
$database = new Database();
$db = $database->connect();

// Instantiate blog title object
$job = new Job($db);

// // Get raw titleed data
$data = json_decode(file_get_contents("php://input"));

$job->company = $data->company;
$job->title = $data->title;
$job->start_date = $data->start_date;
$job->end_date = $data->end_date;

// Create title
if ($job->create()) {
    echo json_encode(
        array(
            'message' => 'Job Created',
            'company' => $job->company,
            'title' => $job->title,
            'start_date' => $job->start_date,
            'end_date' => $job->end_date,
        )
    );
} else {
    echo json_encode(
        array('message' => 'Job Not Created')
    );
}
