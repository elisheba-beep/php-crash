<?php
$file = 'extras/users.txt';
if(file_exists($file)){
    $handle = fopen($file, 'r');
    $contents = fread($handle, filesize($file));
    fclose($handle);
    echo $contents;
}else{
$handle = fopen($file, 'w');
$contents = 'Savage' . PHP_EOL . 'TJ' . PHP_EOL . 'Tommy';
fwrite($handle, $contents);
fclose($handle);
}