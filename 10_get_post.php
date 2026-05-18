<?php
if(isset($_POST['submit'])){
echo $_POST['name'];
echo $_POST['age'];
}
?>


   
    <a href="<?php echo $_SERVER['PHP_SELF'];?>?name=Eli&age=23">Click here</a>
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