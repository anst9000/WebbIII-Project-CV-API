<?php
// ini_set('display_errors', 1);
// ini_set('display_startup_errors', 1);
// error_reporting(E_ALL);

// Headers
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');

// include database and object files
include __DIR__ . "/../config/database.php";
include __DIR__ . "/../models/job.php";

// include_once "../config/database.php";
// include_once "../models/job.php";

// instantiate database and job object
$database = new Database();
$db = $database->connect();

// initialize object
$job = new Job($db);

// query jobs
$stmt = $job->read();
$num = $stmt->rowCount();

// check if more than 0 record found
if ($num > 0) {
    // jobs array
    $jobs_arr = array();
    $jobs_arr["records"] = array();

    // retrieve our table contents, fetch() is faster than fetchAll()
    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        // extract row this will make $row['company'] to just $company only
        extract($row);

        $job_item = array(
            "id" => $id,
            "company" => $company,
            "title" => $title,
            "start_date" => $start_date,
            "end_date" => $end_date,
        );

        array_push($jobs_arr["records"], $job_item);
    }

    // set response code - 200 OK
    http_response_code(200);

    // show jobs data in json format
    echo json_encode($jobs_arr);
} else {
    // set response code - 404 Not found
    http_response_code(404);

    // tell the user no jobs found
    echo json_encode(
        array("message" => "No jobs found.")
    );
}
