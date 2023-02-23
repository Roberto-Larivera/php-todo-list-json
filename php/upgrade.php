<?php
// RICHIESTA DATABASE
$contentDatabase =  file_get_contents('../database/database.json');
$contentDecoded = json_decode($contentDatabase, true);


$upgradeTodo = [
    'todo' => $_POST['upgradeTodo']['todo'],
    'done' => filter_var($_POST['upgradeTodo']['done'], FILTER_VALIDATE_BOOLEAN),
];

$contentDecoded[] = $upgradeTodo;

file_put_contents('../database/database.json', json_encode($contentDecoded) );
echo json_encode($upgradeTodo) ;