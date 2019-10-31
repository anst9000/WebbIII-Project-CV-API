<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// Headers
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');
header('Access-Control-Allow-Methods: DELETE');
header('Access-Control-Allow-Headers: Access-Control-Allow-Headers,Content-Type,Access-Control-Allow-Methods, Authorization, X-Requested-With');

// include database and object files
include __DIR__ . "/../config/database.php";
include __DIR__ . "/../models/education.php";

// include_once "../config/database.php";
// include_once "../models/education.php";

// Instantiate DB & connect
$database = new Database();
$db = $database->connect();

// Instantiate blog education object
$education = new Education($db);

// Get raw educationed data
$data = json_decode(file_get_contents("php://input"));
$education->id = $data->id;

// $education->id = $_POST['id'];

// Delete education
if ($education->delete()) {
    echo json_encode(
        array(
            'message' => 'Education Deleted',
            'value' => $education->id,
        )
    );
} else {
    echo json_encode(
        array('message' => 'Education Not Deleted')
    );
}
