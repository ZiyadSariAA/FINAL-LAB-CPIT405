<?php

if ($_SERVER['REQUEST_METHOD'] != 'GET') {
    header('Allow: GET');
    http_response_code(405);

    echo json_encode('Method Not Allowed');
    return;
}


header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');
header('Access-Control-Allow-Methods: POST');



include_once '../db/Database.php';

include_once '../models/Thebookmarks.php'; 


$database = new Database();
$dbConnection = $database->connect();


$infoBookmark = new Thebookmarks($dbConnection);

if (!isset($_GET['id'])) {
    http_response_code(422);
    echo json_encode(
        array('message' => 'There is an error.')
    );
    return;
}

$infoBookmark->setId($_GET['id']);


if ($infoBookmark->readOne()) {
    $result = array(
        'id' => $infoBookmark->getId(),
        'theLINK' => $infoBookmark->gettheLINK(),          
        'theName' => $infoBookmark->gettheName(),          

        'timeThatCreated' => $infoBookmark->getTimeThatCreated() 
    );

    echo json_encode($result);
} else {
    http_response_code(404);
    echo json_encode(
        array('message' => 'Error: No  item  found')
    );
}