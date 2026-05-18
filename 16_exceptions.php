<?php
function divide($num1, $num2){
    if($num2 === 0){
        throw new Exception('Cannot divide by zero');
    }
    return $num1 / $num2;
}


try {
echo divide(10, 2) . "<br>"; 

    echo divide(10, 0) . "<br>"; 
} catch (Exception $e) {
    echo 'Error: ' . $e->getMessage() . "<br>";
}finally{
    echo 'elegantly handled errors' . '<br>';
}

echo 'hi again';
?>