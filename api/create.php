<?php

if ($_SERVER['REQUEST_METHOD'] != 'POST') {
    header('Allow: POST');
    http_response_code(405);
    echo json_encode('Method Not Allowed');
    return;
}

header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');
header('Access-Control-Allow-Methods: GET, POST, PUT, DELETE, OPTIONS');
header('Access-Control-Allow-Headers: Content-Type, Authorization');

if ($_SERVER['REQUEST_METHOD'] == 'OPTIONS') {
    header('HTTP/1.1 200 OK');
    exit;
}




include_once '../db/Database.php';
include_once '../models/Thebookmarks.php';


$database = new Database();
$dbConnection = $database->connect();

$infoBookmark = new Thebookmarks($dbConnection);

$data = json_decode(file_get_contents("php://input"), true);



if (!$data || !isset($data['theLINK']) || !isset($data['theName']) || !isset($data['Description'])) {
    http_response_code(422);
    echo json_encode(
        array('message' => 'The Error:the is a missing  parameters  in the JSON body.')
    ); return;}



$infoBookmark->settheLINK($data['theLINK']);           
$infoBookmark->settheName($data['theName']);           
$infoBookmark->setDescription($data['Description']);   

if (isset($data['timeThatCreated'])) {
    $infoBookmark->setTimeThatCreated($data['timeThatCreated']);
}

if ($infoBookmark->create()) {
    http_response_code(201);
    echo json_encode(
        array('message' => '  created successfully.')
    );
} else {
    echo json_encode(
        array('message' => 'could not be created.') );
}
?>
