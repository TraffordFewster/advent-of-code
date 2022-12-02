<?php

$input = file_get_contents('input.txt');

$elfs = preg_split("#\n\s*\n#Uis", $input);

$mostCalories = 0;

foreach ($elfs as $elf) {
    $totalCalories = array_sum(preg_split("#\s#Uis", $elf));

    if ($totalCalories > $mostCalories) {
        $mostCalories = $totalCalories;
    }
}

echo $mostCalories;
