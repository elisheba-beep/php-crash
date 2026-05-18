<?php
setcookie('name', 'sheba', time() + 86400);
if(isset($_COOKIE['name'])){
    echo 'the name is ' . $_COOKIE['name'];
} else {
    echo 'cookie not set';
}

setcookie('name', 'sheba', time() - 86400);
?>