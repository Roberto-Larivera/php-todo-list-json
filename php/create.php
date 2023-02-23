<?php
$contentDatabase =  file_get_contents('../database/database.json');
$contentDecoded = json_decode($contentDatabase, true);

$newTodoForm = [
    'todo' => $_POST['newTodo']['textTodo'],
    'done' => filter_var($_POST['newTodo']['doneTodo'], FILTER_VALIDATE_BOOLEAN),
];

$contentDecoded[] = $newTodoForm;

$contentEncode = json_encode($contentDecoded);

file_put_contents('../database/database.json', $contentEncode);

$response = [
    'success' => true,
    'message' => 'Create OK',
    'code' => 200,
    'data' => $newTodoForm
];

header('content-type: application/json');
echo json_encode($response);