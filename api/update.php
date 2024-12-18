<?php

if ($_SERVER['REQUEST_METHOD'] != 'PUT') {
    header('Allow: PUT');
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

if (!$data || !$data->id || !$data->theLINK || !$data->theName || !$data->Description)
 {http_response_code(422);
    echo json_encode(
        array('message' => ' Missing required parameters in the JSON body.')
    ); return;
}


$infoBookmark->setId($data->id);
$infoBookmark->settheLINK($data->theLINK);      
$infoBookmark->settheName($data->theName);      
$infoBookmark->setDescription($data->Description); 

if ($infoBookmark->update()) {
    echo json_encode(
        array('message' => 'A  updated')
    );
} else {
    echo json_encode(
        array('message' => 'Error')
    );
}