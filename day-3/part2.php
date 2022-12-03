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

$groups = array_chunk($rucksacks, 3);
foreach ($groups as $group) {
    $rucksack1 = str_split($group[0]);
    $rucksack2 = str_split($group[1]);
    $rucksack3 = str_split($group[2]);

    foreach ($rucksack1 as $item) {
        $foundResults = false;

        foreach ($rucksack2 as $item2) {
            if ($item === $item2) {
                foreach ($rucksack3 as $item3) {
                    if ($item === $item3) {
                        $total += getPriority($item);
                        $foundResults = true;
                        break;
                    }
                }
                break;
            }
        }

        if ($foundResults) {
            break;
        }
    }
}

echo $total;
