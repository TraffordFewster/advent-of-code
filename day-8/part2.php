<?php

$input = file_get_contents('input.txt');
$lines = explode("\n", $input);

$array = array_map(fn ($line) => str_split($line), $lines);

function getScoreLeft($array, $i, $j, $level)
{
    $score = 0;
    for ($k = $i - 1; $k >= 0; $k--) {
        $score++;

        if ($array[$k][$j] >= $level) {
            break;
        }
    }

    return $score;
}

function getScoreRight($array, $i, $j, $level)
{
    $score = 0;
    for ($k = $i + 1; $k < count($array); $k++) {
        $score++;

        if ($array[$k][$j] >= $level) {
            break;
        }
    }

    return $score;
}

function getScoreUp($array, $i, $j, $level)
{
    $score = 0;
    for ($k = $j - 1; $k >= 0; $k--) {
        $score++;

        if ($array[$i][$k] >= $level) {
            break;
        }
    }

    return $score;
}

function getScoreDown($array, $i, $j, $level)
{
    $score = 0;
    for ($k = $j + 1; $k < count($array[$i]); $k++) {
        $score++;

        if ($array[$i][$k] >= $level) {
            break;
        }
    }

    return $score;
}

$currentHighestScore = 0;

for ($i = 1; $i < count($array) - 1; $i++) {
    for ($j = 1; $j < count($array[$i]) - 1; $j++) {
        $treeLevel = $array[$i][$j];
        $score = getScoreLeft($array, $i, $j, $treeLevel) * getScoreRight($array, $i, $j, $treeLevel) * getScoreUp($array, $i, $j, $treeLevel) * getScoreDown($array, $i, $j, $treeLevel);

        if ($score > $currentHighestScore) {
            $currentHighestScore = $score;
        }
    }
}

echo $currentHighestScore;
