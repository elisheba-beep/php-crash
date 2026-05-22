<?php
function differentResponses (mixed $parameter){
    if(is_array($parameter)){
         sort($parameter);
         return $parameter;
    }elseif(is_int($parameter)){
        if($parameter % 2 == 0){
            return $parameter / 2;

        }else{
            return $parameter * 3;
        }
    }
    elseif(is_string($parameter)){
        return strlen($parameter);
    }
    else{
        return $parameter . ' is of type ' . gettype($parameter);
    }
}

$array = [7,9,3,1,2,0];
print_r(differentResponses($array));
print_r(differentResponses(['hello', 'you', 'are', 'welcome']));
print_r(differentResponses([]));
print_r(differentResponses(['']));
echo differentResponses(123);
echo differentResponses(10);
echo differentResponses('whats up');
echo differentResponses(true);

//a function that merges multiple arrays..
//a function to run through each element of an array (mixture of characters..int, strings)...filter by thetype and return two different arrays
//a function that adds elements of an array to return one string
//php oop


function mergeArrays(array ...$arrays){
$merged = array_merge(...$arrays);
return $merged;
}


$arr1 = [1,2,3];
$arr2 = ['a', 'b', 'c'];
$arr3 = [5,6,78,98];
print_r(mergeArrays($arr1, $arr2, $arr3));

function filterByType(array $array){
    $numbers = array_values(array_filter($array, fn($number)=> is_int($number)));
    $strings = array_values(array_filter($array, fn($string)=> is_string($string)));
    return [$numbers, $strings];
}

print_r(filterByType([1, 'hello', 2, 'world', 3]));

function addElements(array ...$array){
    $merged = array_merge(...$array);
    $new_arr = array_reduce($merged, fn($prev, $curr)=> $prev . $curr);
    return $new_arr;
}

print_r(addElements(['hello', ' ', 'world', '!'], ['welcome', ' ', 'to', ' ', 'php']));


//create a parent class called User. Students and parents and school admin, teachers, should inherit the user model. 
// each having their different properties and methods
// a different class called subjects, exam records and results.
// students can offer multiple subjects, can be in many classes
// a class called school as well.
// a parent can have multiple children in a school or different schools
// a teacher can teach multiple students and teach in different schools
// a teacher can see all the schools, subjects and students related to them
// a student can only be in one class at a time
// a student can see subjects theyve offred, results
// the teacher can score student
// relatuionships between the different classes should be implemented as well.