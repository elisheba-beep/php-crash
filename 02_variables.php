<?php
$name = 'Sheba'; //string
$age = 24; //int
$rating = 4.5;; //float
$has_kids = false; //bool
$array = [2,4,6]; //array
define('TITLE', 'engineer'); //const
echo "${name} is ${age} years old, likes the numbers $array[0], $array[1] and $array[2], and rates the restaurant ${rating} stars. She is an " . TITLE . ".";
?>