<?php
// RICHIESTA DATABASE
$contentDatabase =  file_get_contents('../database/database.json');
$contentDecode = json_decode($contentDatabase, true);
$contentDecode = $contentDecode ?? null;
$responseBol = false;

$deleteTodoIndex = $_POST['deleteTodoIndex'] ?? null;
$deleteTodo = [
    'todo' => ($_POST['deleteTodo']['todo'] ?? null),
    'done' => filter_var(($_POST['deleteTodo']['done']?? null), FILTER_VALIDATE_BOOLEAN),
];
if($contentDecode !== null && $contentDecode != []){
    if ($deleteTodoIndex !== null && $contentDecode[$deleteTodoIndex]['todo'] == $deleteTodo['todo']) {
        $todoDelete = $contentDecode[$deleteTodoIndex];
        unset($contentDecode[$deleteTodoIndex]);
        $contentDecode = array_values($contentDecode);
        $responseBol = true;
    } else {
    
        foreach ($contentDecode as $index => $todo) {
            if ($todo['todo'] == $deleteTodo['todo']) {
                unset($todo);
                $contentDecode = array_values($contentDecode);
                $todoDelete = $todo;
                $responseBol = true;
    
                break;
            } else {
            };
        }
    }

}else{
    $messageError = 'Non-existent data';
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
        'message' => 'Error delete todo'. ' - '.($messageError?? 'Data not found'),
        'code' => 400
    ];
}


file_put_contents('../database/database.json', json_encode($contentDecode));
header('content-type: application/json');
echo json_encode($response);
