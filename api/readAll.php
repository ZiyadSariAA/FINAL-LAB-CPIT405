<?php

include_once '../models/Thebookmarks.php';
include_once '../db/Database.php';

if ($_SERVER['REQUEST_METHOD'] != 'GET') {
    header('Allow: GET');
    http_response_code(405);
    echo json_encode('Method Not Allowed');
    return;
}


header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');
header('Access-Control-Allow-Methods: GET, POST, PUT, DELETE, OPTIONS');
header('Access-Control-Allow-Headers: Content-Type, Authorization');


$database = new Database();
$dbConnection = $database->connect();

$infoBookmark = new Thebookmarks($dbConnection);

$result = $infoBookmark->readAll();


if (!empty($result)) {
    echo json_encode($result);}
    
 else {
    echo json_encode(
        array('message' => 'No  items') );
}