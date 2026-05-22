<?php
require_once 'Db.php'; 

if (isset($_GET['success']) && $_GET['success'] == 1) {
    $message = "<p style='color: green;'>User added successfully.</p>";
} elseif (isset($_GET['deleted']) && $_GET['deleted'] == 1) {
    $message = "<p style='color: green;'>Record deleted successfully.</p>";
}

$sql = "SELECT 
    exam_records.id AS record_id,
    student_users.name AS student_name,
    guardian_users.name AS guardian_name,
    school_classes.name AS class_name,
    subjects.name AS subject_name,
    schools.name AS school_name,
    exam_records.score AS exam_score,
    teacher_users.name AS teacher_name
FROM exam_records
INNER JOIN users AS student_users 
    ON exam_records.student_id = student_users.id
LEFT JOIN student_profiles 
    ON student_users.id = student_profiles.user_id
LEFT JOIN users AS guardian_users 
    ON student_profiles.guardian_id = guardian_users.id
INNER JOIN subjects 
    ON exam_records.subject_id = subjects.id
INNER JOIN users AS teacher_users 
    ON exam_records.teacher_id = teacher_users.id
LEFT JOIN school_classes 
    ON student_profiles.class_id = school_classes.id
LEFT JOIN schools 
    ON school_classes.school_id = schools.id;";

$stmt = $conn->query($sql);
$records = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Management System</title>
</head>
<body>

    <h1>Management System Dashboard</h1>
    <p><?php echo $message ?? ''; ?></p>

    <a href="AddUser.php"><button style="padding: 10px; margin-bottom: 20px;">+ Add New User</button></a>

    <h2>Student Exam Records</h2>

    <?php if (count($records) > 0): ?>
        <table style="width: 100%;" border="1" cellpadding="5" cellspacing="0">
            <thead>
                <tr>
                    <th>Student Name</th>
                    <th>Guardian Name</th>
                    <th>Class</th>
                    <th>Subject</th>
                    <th>School</th>
                    <th>Score</th>
                    <th>Scored By (Teacher)</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach($records as $row): ?>
                    <tr>
                        <td><?php echo htmlspecialchars($row['student_name']); ?></td>
                        <td><?php echo htmlspecialchars($row['guardian_name']); ?></td>
                        <td><?php echo htmlspecialchars($row['class_name'] ?? 'Unassigned'); ?></td>
                        <td><?php echo htmlspecialchars($row['subject_name']); ?></td>
                        <td><?php echo htmlspecialchars($row['school_name'] ?? 'Unassigned'); ?></td>
                        <td><strong><?php echo htmlspecialchars($row['exam_score']); ?></strong></td>
                        <td><?php echo htmlspecialchars($row['teacher_name']); ?></td>
                        <td>
                            
                            <form action="DeleteRecord.php" method="POST" style="display:inline;" onsubmit="return confirm('Are you sure you want to delete this record?');">
                                <input type="hidden" name="record_id" value="<?php echo $row['record_id']; ?>">
                                <button type="submit" style="color: red;">Delete</button>
                            </form>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    <?php else: ?>
        <p>No exam records found in the database. Add some records to see them here.</p>
    <?php endif; ?>

</body>
</html>