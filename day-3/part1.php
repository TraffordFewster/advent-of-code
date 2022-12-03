<?php

$input = file_get_contents('input.txt');
$rucksacks = explode("\n", $input);

$total = 0;

function getPriority($item)
{
    if (ctype_upper($item)) {
        return ord($item) - 38;
    } else {
        return ord($item) - 96;
    }
}

foreach ($rucksacks as $rucksack) {
    // $rucksack = $rucksacks[0];
    $rucksack = str_split($rucksack);
    $len = count($rucksack);

    $compartment1 = array_slice($rucksack, 0, $len / 2);
    $compartment2 = array_slice($rucksack, $len / 2);

    foreach ($compartment1 as $item) {
        $foundResults = false;

        foreach ($compartment2 as $item2) {
            if ($item === $item2) {
                $total += getPriority($item);
                $foundResults = true;
                break;
            }
        }

        if ($foundResults) {
            break;
        }
    }
}



echo $total;
