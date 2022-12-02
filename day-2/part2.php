<?php

$input = file_get_contents('input.txt');
$games = explode("\n", $input);

$points = 0;

$winCons = [
    'A' => 'B',
    'B' => 'C',
    'C' => 'A',
];

$lossCons = [
    'A' => 'C',
    'B' => 'A',
    'C' => 'B',
];

$playPoints = [
    'A' => 1,
    'B' => 2,
    'C' => 3,
];

foreach ($games as $game) {
    $players = explode(' ', $game);

    if ($players[1] === 'X') {
        $points += $playPoints[$lossCons[$players[0]]];
    } elseif ($players[1] === 'Y') {
        $points += $playPoints[$players[0]] + 3;
    } elseif ($players[1] === 'Z') {
        $points += $playPoints[$winCons[$players[0]]] + 6;
    }
}

echo $points;
