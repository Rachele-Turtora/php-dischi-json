<?php

function getInfoForHomepage($card)
{
    return [
        "cardImg" => $card['img'],
        "cardTitle" => $card['title'],
        "cardAuthor" => $card['author'],
        "cardId" => $card['id']
    ];
}

function generateId($records)
{
    $ids = array_column($records, 'cardId');
    $newId = 1;

    while (in_array($newId, $ids)) {
        $newId = rand(1, 100);
    }

    return $newId;
}
