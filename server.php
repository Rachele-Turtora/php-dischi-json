<?php

$dischi = [
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
];

header('Content-Type: application.json');

echo json_encode($dischi);