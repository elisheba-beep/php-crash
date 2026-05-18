<?php
if(isset($_POST['submit'])){
$name = filter_input(INPUT_POST, 'name', FILTER_SANITIZE_SPECIAL_CHARS);
$age = filter_input(INPUT_POST, 'age', FILTER_SANITIZE_NUMBER_INT);
echo $name;
echo $age;
}
?>


   
<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
    <div>
<label for="name">Name</label>
        <input type="text" name="name" placeholder="name">
    </div>
    <div>
        <label for="age">Age</label>
        <input type="number" name="age" placeholder="age">
    </div>
    <button type="submit" value="submit" name="submit">Submit</button>
</form>