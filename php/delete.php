<?php
// RICHIESTA DATABASE
$contentDatabase =  file_get_contents('../database/database.json');
$contentDecode = json_decode($contentDatabase, true);
$responseBol = false;

$deleteTodoIndex = $_POST['deleteTodoIndex'] ?? null;
$deleteTodo = [
    'todo' => ($_POST['deleteTodo']['todo'] ?? null),
    'done' => filter_var(($_POST['deleteTodo']['done']), FILTER_VALIDATE_BOOLEAN),
];
if ($deleteTodoIndex !== null && $contentDecode[$deleteTodoIndex]['todo'] == $deleteTodo['todo']) {
    unset($contentDecode[$deleteTodoIndex]);
    $contentDecode = array_values($contentDecode);
    $todoDelete = $contentDecode[$deleteTodoIndex];
    $responseBol = true;
} else {

    foreach ($contentDecode as $index => $todo) {
        if ($todo['todo'] == $deleteTodo['todo']) {
            unset($contentDecode[$index]);
            $contentDecode = array_values($contentDecode);
            $todoDelete = $todo;
            $responseBol = true;

            break;
        } else {
        };
    }
}

if ($responseBol) {
    $response = [
        'success' => true,
        'message' => 'OK - Delete todo',
        'code' => 200,
        'data' => $todoDelete
    ];
} else {
    $response = [
        'success' => true,
        'message' => 'Error delete todo',
        'code' => 400
    ];
}


file_put_contents('../database/database.json', json_encode($contentDecode));
echo json_encode($response);
