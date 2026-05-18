<?php

$colour = 'orange';

if($colour == "red"){
    echo 'the colour is red';
} elseif($colour == "blue"){
    echo 'the colour is blue';
} elseif($colour == "yellow"){
    echo 'the colour is yellow';
} else {
    echo 'the colour is not red, blue or yellow';
}

switch($colour){
    case 'red':
        echo 'the colour is red';
        break;
    case 'blue':
        echo 'the colour is blue';
        break;
    case 'yellow':
        echo 'the colour is yellow';
        break;
    default:
        echo 'the colour is not red, blue or yellow';
        break;
}


$time = date('H');

if($time < 12){
    echo 'good morning';
} elseif($time < 18){
    echo 'good afternoon';
} else {
    echo 'good evening';
}

?>