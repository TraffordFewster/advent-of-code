<?php

$input = file_get_contents('input.txt');
$games = explode("\n", $input);

$points = 0;

$myWinCons = [
    'A' => 'Y',
    'B' => 'Z',
    'C' => 'X',
];

$myDrawCons = [
    'A' => 'X',
    'B' => 'Y',
    'C' => 'Z',
];

$playPoints = [
    'X' => 1,
    'Y' => 2,
    'Z' => 3,
];

foreach ($games as $game) {
    $players = explode(' ', $game);

    if ($myWinCons[$players[0]] === $players[1]) {
        $points += 6;
    } elseif ($myDrawCons[$players[0]] === $players[1]) {
        $points += 3;
    };

    $points += $playPoints[$players[1]];
}

echo $points;
