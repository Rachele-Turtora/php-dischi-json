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
