<?php
// RICHIESTA DATABASE
$contentDatabase =  file_get_contents('../database/database.json');
$contentDecode = json_decode($contentDatabase, true);


$upgradeTodo = [
    'todo' => $_POST['deleteTodo']['todo'],
    'done' => filter_var($_POST['deleteTodo']['done'], FILTER_VALIDATE_BOOLEAN),
];

foreach($contentDecode as $index => $todo){
    if ($todo['todo'] == $upgradeTodo['todo']){
        unset($contentDecode[$index]);
        $contentDecode = array_values($contentDecode);
        $todoDelete = $todo;
        break;
    };
}

file_put_contents('../database/database.json', json_encode($contentDecode) );

$response = [
    'success' => true,
    'message' => 'Delete todo OK',
    'code' => 200,
    'data' => $todoDelete
];

echo json_encode($response) ;