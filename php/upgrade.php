<?php
// RICHIESTA DATABASE
$contentDatabase =  file_get_contents('../database/database.json');
$contentDecoded = json_decode($contentDatabase, true);
$responseBol = false;


$upgradeTodoIndex = $_POST['upgradeTodoIndex'] ?? null;
$upgradeTodo = [
    'todo' => ($_POST['upgradeTodo']['todo'] ?? null),
    'done' => filter_var(($_POST['upgradeTodo']['done'] ?? null), FILTER_VALIDATE_BOOLEAN),
];

if ($upgradeTodoIndex !== null && $contentDecoded[$upgradeTodoIndex]['todo'] == $upgradeTodo['todo']) {

    $contentDecoded[$upgradeTodoIndex]['done'] = !$contentDecoded[$upgradeTodoIndex]['done'];
    $todoUpgrade = $contentDecoded[$upgradeTodoIndex]['todo'];
    $responseBol = true;
} else {

    foreach ($contentDecoded as $index => $todo) {
        if ($todo['todo'] == $upgradeTodo['todo']) {
            $todoUpgrade = $todo['todo'];
            $todo['done'] = !$todo['done'];
            //$contentDecoded[$index]['done'] = !$contentDecoded[$index]['done'];
            $responseBol = true;

            break;
        };
    }
}


if ($responseBol) {
    $response = [
        'success' => true,
        'message' => 'Upgrade todo OK',
        'code' => 200,
        'data' => $todoUpgrade
    ];
} else {
    $response = [
        'success' => true,
        'message' => 'Error upgrade todo',
        'code' => 400
    ];
}


file_put_contents('../database/database.json', json_encode($contentDecoded));
header('content-type: application/json');
echo json_encode($response);
