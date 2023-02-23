<?php
// RICHIESTA DATABASE
$contentDatabase =  file_get_contents('../database/database.json');
$contentDecoded = json_decode($contentDatabase, true);
$responseBol = false;

if($contentDecoded != []){
    $responseBol = true;

    
}else{
    $messageError = 'Non-existent data - No Content';
    $codeError = 204 ;
}

if ($responseBol) {
    $response = [
        'success' => true,
        'message' => 'OK - Read todos',
        'code' => 200,
        'data' => $contentDecoded
    ];
} else {
    $response = [
        'success' => true,
        'message' => 'Error read todos'. ' - '.($messageError?? 'Data not found'),
        'code' => $codeError?? 404,
        'data' => $contentDecoded
    ];
}

$jsonMessage = json_encode($response);

header('content-type: application/json');

echo $jsonMessage;