<?php

$input = file_get_contents('input.txt');
$lines = explode("\n", $input);

$directories = [
    '/' => [],
];
$currentDirectory = $directories['/'];
$currentPath = ['/'];

$exploringDirectory = false;
$currentDirectorySize = 0;

foreach ($lines as $line) {
    $line = trim($line);

    if (str_starts_with($line, '$ ')) {
        if (str_starts_with($line, '$ cd /')) {
            $currentDirectory = &$directories['/'];
            $currentPath = ['/'];
        } elseif (str_starts_with($line, '$ cd ..')) {
            $currentPath = array_slice($currentPath, 0, -1);
            $currentDirectory = &$directories;
            foreach ($currentPath as $path) {
                $currentDirectory = &$currentDirectory[$path];
            }
        } elseif (str_starts_with($line, '$ cd ')) {
            $currentPath[] = substr($line, 5);
            $currentDirectory = &$currentDirectory[substr($line, 5)];
        }
    } else {
        if (str_starts_with($line, 'dir ')) {
            $currentDirectory[substr($line, 4)] = [];
        } else {
            $lineInfo = explode(' ', $line);
            $currentDirectory[$lineInfo[1]] = $lineInfo[0];
        }
    }
}

function calculateDirectorySize($directory)
{
    $size = 0;

    foreach ($directory as $file) {
        if (is_array($file)) {
            $size += calculateDirectorySize($file);
        } else {
            $size += $file;
        }
    }

    return $size;
}

$totalCurrentSize = calculateDirectorySize($directories['/']);
$sizeNeeded = ((70000000 - $totalCurrentSize) - 30000000) * -1;
$smallestTodoIt = $totalCurrentSize;

function checkDirectories($directory)
{
    global $sizeNeeded, $smallestTodoIt;

    foreach ($directory as $file) {
        if (is_array($file)) {
            checkDirectories($file);
        }
    }

    $totalSize = calculateDirectorySize($directory);
    if ($totalSize >= $sizeNeeded && $totalSize < $smallestTodoIt) {
        $smallestTodoIt = $totalSize;
    }
}

checkDirectories($directories);

echo $smallestTodoIt;
