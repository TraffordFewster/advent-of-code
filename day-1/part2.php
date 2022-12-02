<?php

$input = file_get_contents('input.txt');

$elfs = preg_split("#\n\s*\n#Uis", $input);

$mostCalories = 0;
$mostCalories2nd = 0;
$mostCalories3rd = 0;

foreach ($elfs as $elf) {
    $totalCalories = array_sum(preg_split("#\s#Uis", $elf));

    if ($totalCalories > $mostCalories) {
        $mostCalories3rd = $mostCalories2nd;
        $mostCalories2nd = $mostCalories;
        $mostCalories = $totalCalories;
    } elseif ($totalCalories > $mostCalories2nd) {
        $mostCalories3rd = $mostCalories2nd;
        $mostCalories2nd = $totalCalories;
    } elseif ($totalCalories > $mostCalories3rd) {
        $mostCalories3rd = $totalCalories;
    }
}

echo $mostCalories + $mostCalories2nd + $mostCalories3rd;
