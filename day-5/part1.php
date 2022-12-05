<?php

// [N] [G]                     [Q]    
// [H] [B]         [B] [R]     [H]    
// [S] [N]     [Q] [M] [T]     [Z]    
// [J] [T]     [R] [V] [H]     [R] [S]
// [F] [Q]     [W] [T] [V] [J] [V] [M]
// [W] [P] [V] [S] [F] [B] [Q] [J] [H]
// [T] [R] [Q] [B] [D] [D] [B] [N] [N]
// [D] [H] [L] [N] [N] [M] [D] [D] [B]
//  1   2   3   4   5   6   7   8   9 

$col1 = array_reverse(['N', 'H', 'S', 'J', 'F', 'W', 'T', 'D']);
$col2 = array_reverse(['G', 'B', 'N', 'T', 'Q', 'P', 'R', 'H']);
$col3 = array_reverse(['V', 'Q', 'L']);
$col4 = array_reverse(['Q', 'R', 'W', 'S', 'B', 'N']);
$col5 = array_reverse(['B', 'M', 'V', 'T', 'F', 'D', 'N']);
$col6 = array_reverse(['R', 'T', 'H', 'V', 'B', 'D', 'M']);
$col7 = array_reverse(['J', 'Q', 'B', 'D']);
$col8 = array_reverse(['Q', 'H', 'Z', 'R', 'V', 'J', 'N', 'D']);
$col9 = array_reverse(['S', 'M', 'H', 'N', 'B']);

$cols = [$col1, $col2, $col3, $col4, $col5, $col6, $col7, $col8, $col9];

$input = file_get_contents('input.txt');
$jobs = explode("\n", $input);

foreach ($jobs as $job) {
    $job = explode(' ', $job);
    $amount = $job[1];
    $from = $job[3] - 1;
    $to = $job[5] - 1;

    for ($i = 0; $i < $amount; $i++) {
        $pickedUp = array_pop($cols[$from]);
        array_push($cols[$to], $pickedUp);
    }
}

foreach ($cols as $col) {
    echo array_pop($col);
}
