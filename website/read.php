<?php
// ini_set('display_errors', 1);
// ini_set('display_startup_errors', 1);
// error_reporting(E_ALL);

// Headers
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');

// include database and object files
include __DIR__ . "/../config/database.php";
include __DIR__ . "/../models/website.php";

// include_once "../config/database.php";
// include_once "../models/website.php";

// instantiate database and website object
$database = new Database();
$db = $database->connect();

// initialize object
$website = new Website($db);

// query websites
$stmt = $website->read();
$num = $stmt->rowCount();

// check if more than 0 record found
if ($num > 0) {
    // websites array
    $websites_arr = array();
    $websites_arr["records"] = array();

    // retrieve our table contents, fetch() is faster than fetchAll()
    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        // extract row this will make $row['title'] to just $title only
        extract($row);

        $website_item = array(
            "id" => $id,
            "title" => $title,
            "url" => $url,
            "description" => $description,
        );

        array_push($websites_arr["records"], $website_item);
    }

    // set response code - 200 OK
    http_response_code(200);

    // show websites data in json format
    echo json_encode($websites_arr);
} else {
    // set response code - 404 Not found
    http_response_code(404);

    // tell the user no websites found
    echo json_encode(
        array("message" => "No websites found.")
    );
}
