 <?php
require_once 'ManagementSystem.php';

require_once 'Db.php';




$school = new School("University of Lagos", "Lagos State");

$stmt = $conn->prepare("SELECT id FROM schools WHERE name = ? AND location = ?");
$stmt->execute([$school->name, $school->location]);
$existingSchoolId = $stmt->fetchColumn(); 

if ($existingSchoolId) {
    $schoolId = $existingSchoolId; 
    echo "School already exists. School ID: $schoolId\n";
} else {
    $stmt = $conn->prepare("INSERT INTO schools (name, location) VALUES (?, ?)");
    $stmt->execute([$school->name, $school->location]);
    $schoolId = $conn->lastInsertId();
    echo "Created new School. ID: $schoolId\n";
}



$year3 = new SchoolClass("Year 3", $school);

$stmt = $conn->prepare("SELECT id FROM school_classes WHERE name = ? AND school_id = ?");
$stmt->execute([$year3->name, $schoolId]);
$existingClass = $stmt->fetchColumn();

if ($existingClass) {
    $classId = $existingClass;
    echo "Class already exists in this school. Class ID: $classId\n";
} else {
    $stmt = $conn->prepare("INSERT INTO school_classes (name, school_id) VALUES (?, ?)");
    $stmt->execute([$year3->name, $schoolId]);
    $classId = $conn->lastInsertId();
    echo "Created new Class. ID: $classId\n";
}



$mechatronics = new Subjects("Mechatronics", "MCT301", $school);

$stmt = $conn->prepare("SELECT id FROM subjects WHERE subject_code = ? AND school_id = ?");
$stmt->execute([$mechatronics->subjectCode, $schoolId]);
$existingSubj = $stmt->fetchColumn();

if ($existingSubj) {
    $subjectId = $existingSubj;
    echo "Subject already exists in this school. Subject ID: $subjectId\n";
} else {
    $stmt = $conn->prepare("INSERT INTO subjects (name, subject_code, school_id) VALUES (?, ?, ?)");
    $stmt->execute([$mechatronics->name, $mechatronics->subjectCode, $schoolId]);
    $subjectId = $conn->lastInsertId();
    echo "Created new Subject. ID: $subjectId\n";
}



$drComfort = new Teacher("Dr Comfort", "comfort@unilag.com", "08025550101");
$pearl = new Student("Pearl Lewis", "pearl@student.com", "08025550202", $year3);

$stmt = $conn->prepare("INSERT INTO users (role, name, email, phone_number) VALUES (?, ?, ?, ?)");
$stmt->execute(['teacher', $drComfort->name, $drComfort->email, $drComfort->phoneNumber]);
$teacherId = $conn->lastInsertId();

$stmt->execute(['student', $pearl->name, $pearl->email, $pearl->phoneNumber]);
$studentId = $conn->lastInsertId();
echo "Registered Users.\n";




$stmt = $conn->prepare("INSERT INTO student_profiles (user_id, school_id, class_id) VALUES (?, ?, ?)");
$stmt->execute([$studentId, $schoolId, $classId]);
echo "Student enrolled in school and class.\n";





$drComfort->scoreStudent($pearl, $mechatronics, 78);
$record = $pearl->results->records[0];

$stmt = $conn->prepare("INSERT INTO exam_records (student_id, subject_id, score, teacher_id) VALUES (?, ?, ?, ?)");
$stmt->execute([$studentId, $subjectId, $record->score, $teacherId]);
echo "Teacher scored the student. Saved to database.\n";