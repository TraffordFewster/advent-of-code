<?php

$input = file_get_contents('input.txt');
$lines = explode("\n", $input);

$array = array_map(fn ($line) => str_split($line), $lines);

function checkLeft($array, $i, $j, $level)
{
    for ($k = $i - 1; $k >= 0; $k--) {
        if ($array[$k][$j] >= $level) {
            return false;
        }
    }

    return true;
}

function checkRight($array, $i, $j, $level)
{
    for ($k = $i + 1; $k < count($array); $k++) {
        if ($array[$k][$j] >= $level) {
            return false;
        }
    }

    return true;
}

function checkUp($array, $i, $j, $level)
{
    for ($k = $j - 1; $k >= 0; $k--) {
        if ($array[$i][$k] >= $level) {
            return false;
        }
    }

    return true;
}

function checkDown($array, $i, $j, $level)
{
    for ($k = $j + 1; $k < count($array[$i]); $k++) {
        if ($array[$i][$k] >= $level) {
            return false;
        }
    }

    return true;
}

$width = count($array);
$height = count($array[0]);
$visibleTrees = 0;

for ($i = 1; $i < count($array) - 1; $i++) {
    for ($j = 1; $j < count($array[$i]) - 1; $j++) {
        $treeLevel = $array[$i][$j];

        if (checkLeft($array, $i, $j, $treeLevel) || checkRight($array, $i, $j, $treeLevel) || checkUp($array, $i, $j, $treeLevel) || checkDown($array, $i, $j, $treeLevel)) {
            $visibleTrees++;
        }
    }
}

$visibleTrees += $width * 2;
$visibleTrees += ($height * 2) - 4;

echo $visibleTrees;
