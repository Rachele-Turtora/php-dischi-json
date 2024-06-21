<?php

/*$records = [
    [
        "title" => "New Jersey",
        "author" => "Bon Jovi",
        "year" => 1988
    ],
    [
        "title" => "Live at Wembley 86",
        "author" => "Queen",
        "year" => 1992
    ],
    [
        "title" => "Ten's Summoner's Tales",
        "author" => "Sting",
        "year" => 1993
    ],
    [
        "title" => "Steve Gadd band",
        "author" => "Steve Gadd band",
        "year" => 2018
    ],
    [
        "title" => "Brave new World",
        "author" => "Eric Clapton",
        "year" => 2000
    ],
    [
        "title" => "One more car, one more rider",
        "author" => "Sting",
        "year" => 2002
    ]
];*/

$data = file_get_contents(__DIR__ . '/records.json'); //è una stringa

$records = json_decode($data, true);

$result = $records;

// read
if (isset($_GET['id'])) {
    $id_index = array_search($_GET['id'], array_column($records, 'id'));

    if ($id_index !== false) {
        $result = $records[$id_index];
    }
}

header('Content-Type: application.json'); //dice al client che sta ricevendo un json

//echo json_encode($records);
echo json_encode($result);
