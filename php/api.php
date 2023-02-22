<?php

$message = 'Ciao la tua Api viene chiamata correttamente';

$message = [
    [
        "first_name"=> "Mario",
        "last_name"=> "Rossi",
        "email"=> "mario.rossi@api.com"
    ],
    [
        "first_name"=> "Giuseppe",
        "last_name"=> "Verdi",
        "email"=> "giuseppe.verdi@api.com"
    ],
    [
        "first_name"=> "Lidia",
        "last_name"=> "Bianchi",
        "email"=> "lidia.bianchi@api.com"
    ],
    [
        "first_name"=> "Francesca",
        "last_name"=> "Gialli",
        "email"=> "francesca.gialli@api.com"
    ],
    [
        "first_name"=> "Enzo",
        "last_name"=> "Blu",
        "email"=> "enzo.blu@api.com"
    ]
    ];

$jsonMessage = json_encode($message);

header('content-type: application/json');

echo $jsonMessage;