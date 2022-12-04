<?php

$input = file_get_contents('input.txt');
$assignments = explode("\n", $input);

$overlapping = 0;

foreach ($assignments as $assignment) {
    $assignment = explode(',', $assignment);
    $elf1 = explode('-', $assignment[0]);
    $elf2 = explode('-', $assignment[1]);

    if (
        ($elf1[0] >= $elf2[0] && $elf1[1] <= $elf2[1]) ||
        ($elf1[0] <= $elf2[0] && $elf1[1] >= $elf2[1]) ||
        ($elf1[0] >= $elf2[0] && $elf1[0] <= $elf2[1]) ||
        ($elf1[1] >= $elf2[0] && $elf1[1] <= $elf2[1])
    ) {
        $overlapping++;
    }
}

echo $overlapping;
