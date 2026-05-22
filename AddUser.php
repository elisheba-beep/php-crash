<?php
require_once 'Db.php'; 

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['submit'])) {
    $userType = filter_input(INPUT_POST, 'user_type', FILTER_SANITIZE_SPECIAL_CHARS);
    $userName = filter_input(INPUT_POST, 'user_name', FILTER_SANITIZE_SPECIAL_CHARS);
    $userEmail = filter_input(INPUT_POST, 'user_email', FILTER_SANITIZE_EMAIL);
    $userPhone = filter_input(INPUT_POST, 'user_phone', FILTER_SANITIZE_SPECIAL_CHARS);
   
    
    $check = $conn->prepare("SELECT id FROM users WHERE email = ?");
    $check->execute([$userEmail]);
    
    if ($check->fetchColumn()) {
        $message = "<p style='color: red;'>Error: A user with this email already exists!</p>";
    } else {
        $insertSql = "INSERT INTO users (role, name, email, phone_number) VALUES (?, ?, ?, ?)";
        $stmt = $conn->prepare($insertSql);
        
        if ($stmt->execute([$userType, $userName, $userEmail, $userPhone])) {
            
            header("Location: DisplayRecords.php?success=1");
            exit;
        } else {
            $message = "<p style='color: red;'>Failed to add user.</p>";
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head><title>Add User</title></head>
<body style="font-family: Arial, sans-serif; padding: 20px;">
    <h2>Add New User</h2>
    <?= $message ?? '' ?>
    <form action="<?= htmlspecialchars($_SERVER['PHP_SELF']) ?>" method="POST" style="margin-bottom: 30px; padding: 15px; border: 1px solid #ccc; width: 300px;">
        <label>Name:</label><br>
        <input type="text" name="user_name" required><br><br>
        <label>Email:</label><br>
        <input type="email" name="user_email" required><br><br>
        <label>Phone Number:</label><br>
        <input type="text" name="user_phone" required><br><br>
        <label>User Type:</label><br>
        <select name="user_type" required>
            <option value="student">Student</option>
            <option value="teacher">Teacher</option>
        </select><br><br>
        <button type="submit" name="submit">Save User</button>
        <a href="DisplayRecords.php" style="margin-left: 10px;">Cancel</a>
    </form>
</body>
</html>