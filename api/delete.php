<?php

if ($_SERVER['REQUEST_METHOD'] != 'DELETE') {
    header('Allow: DELETE');
    http_response_code(405);
    echo json_encode('Method Not Allowed');
    return;
}



header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');
header('Access-Control-Allow-Methods: GET, POST, PUT, DELETE, OPTIONS');
header('Access-Control-Allow-Headers: Content-Type, Authorization');





include_once '../db/Database.php';
include_once '../models/Thebookmarks.php';

$database = new Database();


$dbConnection = $database->connect();
$infoBookmark = new Thebookmarks($dbConnection);

$data = json_decode(file_get_contents("php://input"));
if (!$data || !$data->id) {
    http_response_code(422);
    echo json_encode(
        array('message' => 'Error')
    );
    return;
}

$infoBookmark->setId($data->id);

 
if ($infoBookmark->delete()) {
    echo json_encode(
        array('message' => ' item was deleted')
    );
} else {
    echo json_encode(
        array('message' => 'The Error item  not deleted.')
    );
}