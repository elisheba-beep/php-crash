<?php

function functionOne(){
    echo 'this is function one';
}

functionOne();

$globalVar = 6;


function functionTwo(){
    global $globalVar;
    echo 'this is function two and the global var is ' . $globalVar;
}

functionTwo();

$thirdFunc = function($name){
    echo "this is a function stored in a variable and the name is $name";
};

$thirdFunc('sheba');

$fourthFunc = fn($name) => "this is a function stored in a variable and the name is $name";

echo $fourthFunc('sheba');


?>