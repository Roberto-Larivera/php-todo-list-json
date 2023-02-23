<?php
// RICHIESTA DATABASE
$contentDatabase =  file_get_contents('../database/database.json');
$contentDecoded = json_decode($contentDatabase, true);

$upgradeTodoIndex = $_POST['upgradeTodoIndex'];
$upgradeTodo = [
    'todo' => $_POST['upgradeTodo']['todo'],
    'done' => filter_var($_POST['upgradeTodo']['done'], FILTER_VALIDATE_BOOLEAN),
];

if($contentDecoded[$upgradeTodoIndex]['todo'] == $upgradeTodo['todo']){

    $contentDecoded[$upgradeTodoIndex]['done'] = !$contentDecoded[$upgradeTodoIndex]['done'];
    $todoUpgrade = $todo['todo'];

}else{

    foreach($contentDecoded as $index => $todo){
        if ($todo['todo'] == $upgradeTodo['todo']){
            //$todo['done'] = !$todo['done'];
            $contentDecoded[$index]['done'] = !$contentDecoded[$index]['done'];
            $todoUpgrade = $todo['todo'];
            break;
        };
    }
}


file_put_contents('../database/database.json', json_encode($contentDecoded) );

$response = [
    'success' => true,
    'message' => 'Upgrade todo OK',
    'code' => 200,
    'data' => $todoUpgrade
];

echo json_encode($response) ;