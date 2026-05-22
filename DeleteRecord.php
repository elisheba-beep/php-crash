<?php
require_once 'Db.php';


if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['record_id'])) {
    $record_id = filter_input(INPUT_POST, 'record_id', FILTER_SANITIZE_NUMBER_INT);

  
    $stmt = $conn->prepare("DELETE FROM exam_records WHERE id = ?");
    $stmt->execute([$record_id]);

   
    header("Location: DisplayRecords.php?deleted=1");
    exit;
}