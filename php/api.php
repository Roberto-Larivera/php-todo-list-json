<?php

$contentDatabase =  file_get_contents('../database/database.json');
$contentDecoded = json_decode($contentDatabase, true);

$response = [
    'success' => true,
    'message' => 'ok',
    'code' => 200,
    'data' => $contentDecoded
];

$jsonMessage = json_encode($response);

header('content-type: application/json');

echo $jsonMessage;