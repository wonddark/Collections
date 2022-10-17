<?php

$path = $argv[1]; // Path argument
chdir($path);

$pattern = $argv[2]; // Pattern argument
$filesP = glob($pattern);

$chaps = array();
$iterator = 0;
foreach ($filesP as $file) {
    $name = explode(".", $file);
    $numb = (int)$name[0];
    $iterator++;
    $chaps[$iterator] = $numb;
//    $paddedName = str_pad($numb, 4, 0, STR_PAD_LEFT);
//    if (rename($file, $paddedName . ".mp4")) echo "$file renamed to " . str_pad($numb, 4, 0, STR_PAD_LEFT) . " \n";
}
$reference = array_fill(1, $chaps[$iterator], 0);
for ($i = 1; $i <= $chaps[$iterator]; $i++) {
    $reference[$i] = $i;
}
$diff = array_diff($reference, $chaps);

foreach ($diff as $missing) echo "Missing $missing";