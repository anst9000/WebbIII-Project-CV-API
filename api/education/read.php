<?php
// ini_set('display_errors', 1);
// ini_set('display_startup_errors', 1);
// error_reporting(E_ALL);

// Headers
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');

// include database and object files
include __DIR__ . "/../../config/database.php";
include __DIR__ . "/../../models/education.php";

// include_once "../../config/database.php";
// include_once "../../models/education.php";

// instantiate database and education object
$database = new Database();
$db = $database->connect();

// initialize object
$education = new Education($db);

// query educations
$stmt = $education->read();
$num = $stmt->rowCount();

// check if more than 0 record found
if ($num > 0) {
    // educations array
    $educations_arr = array();
    $educations_arr["records"] = array();

    // retrieve our table contents, fetch() is faster than fetchAll()
    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        // extract row this will make $row['school'] to just $school only
        extract($row);

        $education_item = array(
            "id" => $id,
            "school" => $school,
            "course" => $course,
            "start_date" => $start_date,
            "end_date" => $end_date,
        );

        array_push($educations_arr["records"], $education_item);
    }

    // set response code - 200 OK
    http_response_code(200);

    // show educations data in json format
    echo json_encode($educations_arr);
} else {
    // set response code - 404 Not found
    http_response_code(404);

    // tell the user no educations found
    echo json_encode(
        array("message" => "No educations found.")
    );
}
