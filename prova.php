<?php
// RICHIESTA DATABASE
$contentDatabase =  file_get_contents('./database/database.json');
$contentDecoded = json_decode($contentDatabase, true);
var_dump($contentDecoded);

$upgradeTodo = [
    'todo' => 'PHP',
    'done' => filter_var('true', FILTER_VALIDATE_BOOLEAN),
];
echo 'qui giu <br>';
foreach($contentDecoded as $index => $todo){
    if ($todo['todo'] == $upgradeTodo['todo']){
        echo 'trovato';
        echo $todo['todo'];
        echo $todo['done'];
        //$todo['done'] = !$todo['done'];
        $contentDecoded[$index]['done'] = !$contentDecoded[$index]['done'];
        echo $todo['done'];


    };
}
echo '<br> qui su';



echo '<ul>';
foreach($contentDecoded as $todo){

    echo '<li>';
    echo '- '.$todo['todo'];
    echo '- '.$todo['done'];
    echo ' </li>';
}
echo '</ul>';