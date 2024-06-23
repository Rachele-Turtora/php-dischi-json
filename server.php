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

require_once __DIR__ . '/functions.php';

$json_file = __DIR__ . '/records.json';

$data = file_get_contents($json_file); //è una stringa

$records = json_decode($data, true);

$result = $records;

if ($result) {
    $result = array_map('GetInfoForHomepage', $result);
}

// read
if (isset($_GET['action']) && $_GET['action'] === "read") {
    if (isset($_GET['id'])) {
        $id_index = array_search($_GET['id'], array_column($records, 'id'));

        if ($id_index !== false) {
            $result = $records[$id_index];
        }
    }
}

//create
if (isset($_POST['action']) && $_POST['action'] === "create") {

    $new_record = [
        "img" => "Non pervenuta",
        "title" => $_POST['title'],
        "author" => $_POST['author'],
        "year" => $_POST['year'],
        "id" => rand(20, 30)
    ];

    if ($records && count($records)) {
        $result = [...$records, $new_record];
    } else {
        $result = [$new_record];
    }

    //salvo new_record nel file json
    file_put_contents($json_file, json_encode($result));
    $result = array_map('getInfoForHomepage', $result);
}

// delete
if (isset($_GET['action']) && $_GET['action'] === "delete") {
    if (isset($_GET['id'])) {
        $id_index = array_search($_GET['id'], array_column($records, 'id'));

        if ($id_index !== false) {
            unset($records[$id_index]);
            $result = array_values($records);
        }
    }

    //salvo new_record nel file json
    file_put_contents($json_file, json_encode($result));
    $result = array_map('getInfoForHomepage', $result);
}

header('Content-Type: application.json'); //dice al client che sta ricevendo un json

echo json_encode($result);
