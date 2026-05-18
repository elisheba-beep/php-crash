<?php

for($i = 0; $i < 7; $i++){
    echo $i;
}

$the_num = 7;

while($the_num < 14){
    echo $the_num . "<br>";
    $the_num++;

}
echo $the_num . "<br>";
do{
    echo 'this is the num' . $the_num . '<br>';
    $the_num++;
}while($the_num <= 25);

echo $the_num . "<br>";

$array = ['chocolate', 'vanilla', 'strawberry'];
foreach($array as $flavour){
    echo $flavour . "<br>";
}

foreach($array as $key => $flavour){
    echo "the flavour at index $key is $flavour <br>";
}