<?php

$input = file_get_contents('input.txt');

function checkStringForRepeatingCharacters($string)
{
    $string = str_split($string);
    $string = array_count_values($string);
    $string = array_filter($string, function ($value) {
        return $value > 1;
    });

    return count($string) > 0;
}

for ($i = 3; $i < strlen($input); $i++) {
    if (!checkStringForRepeatingCharacters(substr($input, $i - 3, 4))) {
        echo $i + 1;
        break;
    }
}
