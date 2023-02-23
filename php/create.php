<?php
// RICHIESTA DATABASE
$contentDatabase =  file_get_contents('../database/database.json');
$contentDecoded = json_decode($contentDatabase, true);
$responseBol = false;
$newTodoForm = [
    'todo' => $_POST['newTodo']['textTodo'] ?? null,
    'done' => filter_var($_POST['newTodo']['doneTodo'] ?? null, FILTER_VALIDATE_BOOLEAN),
];

if ($newTodoForm['todo'] !== null && $newTodoForm['done'] !== null) {
    if($newTodoForm['todo'] != '' && ($newTodoForm['done'] == true || $newTodoForm['done'] == false) ){
        $contentDecoded[] = $newTodoForm;
        $contentEncode = json_encode($contentDecoded);
        file_put_contents('../database/database.json', $contentEncode);
        $responseBol = true;
    }

}

if ($responseBol) {
    $response = [
        'success' => true,
        'message' => 'OK - Create',
        'code' => 200,
        'data' => $newTodoForm
    ];
} else {
    $response = [
        'success' => true,
        'message' => 'Error create todo',
        'code' => 400
    ];
}


header('content-type: application/json');
echo json_encode($response);
