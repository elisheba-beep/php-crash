<?php
$regular_array = [1,2,3,4,5];
$associative_array = [
   [ 'name' => 'Sheba',
    'age' => 24,
    'rating' => 4.5,
    'has_kids' => false],
     [ 'name' => 'Eli',
    'age' => 23,
    'rating' => 4.8,
    'has_kids' => true],
];

echo $associative_array[0]['name']; //Sheba
echo $associative_array[1]['age']; //23

echo json_encode($associative_array);
?>