<?php
session_start();

if(isset($_SESSION['username'])){
    echo '<h1>Welcome to the dashboard, ' . $_SESSION['username'] . '</h1>';
    echo '<a href="logout.php">Logout</a>';
} else {
    echo '<h1>Welcome to the dashboard, guest. </h1>';
    echo '<a href="/php-crash/13_sessions.php">Login</a>';
}