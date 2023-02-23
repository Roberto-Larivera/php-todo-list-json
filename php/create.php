<?php
header('content-type: application/json');
$newTodoForm = json_encode($_POST['newTodo']);
echo ($newTodoForm);