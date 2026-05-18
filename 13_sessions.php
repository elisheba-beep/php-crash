<?php
    session_start();

if(isset($_POST['submit'])){
$username = filter_input(INPUT_POST, 'username', FILTER_SANITIZE_SPECIAL_CHARS);
$password = $_POST['password'];

if($username === 'sheba' && $password === 'password'){
    $_SESSION['username'] = $username;
    header('Location: /php-crash/extras/dashboard.php');
} else {
    echo 'invalid credentials';
}}
?>


   
<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
    <div>
<label for="username">username</label>
        <input type="text" name="username" placeholder="username">
    </div>
    <div>
        <label for="password">password</label>
        <input type="password" name="password" placeholder="password">
    </div>
    
    <button type="submit" value="submit" name="submit">Submit</button>
</form>