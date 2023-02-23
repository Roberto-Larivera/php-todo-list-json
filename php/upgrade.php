<?php
// RICHIESTA DATABASE
$contentDatabase =  file_get_contents('../database/database.json');
$contentDecoded = json_decode($contentDatabase, true);


$upgradeTodo = [
    'todo' => $_POST['upgradeTodo']['todo'],
    'done' => filter_var($_POST['upgradeTodo']['done'], FILTER_VALIDATE_BOOLEAN),
];

foreach($contentDecoded as $index => $todo){
    if ($todo['todo'] == $upgradeTodo['todo']){
        //$todo['done'] = !$todo['done'];
        $contentDecoded[$index]['done'] = !$contentDecoded[$index]['done'];
        $todoUpgrade = $todo['todo'];
    };
}

file_put_contents('../database/database.json', json_encode($contentDecoded) );

$response = [
    'success' => true,
    'message' => 'Upgrade todo OK',
    'code' => 200,
    'data' => $todoUpgrade
];

echo json_encode($response) ;