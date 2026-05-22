<?php

//create a parent class called User. Students and parents and school admin, teachers, should inherit the user model. 
// each having their different properties and methods
// a different class called subjects, exam records and results.
// students can offer multiple subjects, can be in many classes
// a class called school as well.
// a parent can have multiple children in a school or different schools
// a teacher can teach multiple students and teach in different schools
// a teacher can see all the schools, subjects and students related to them
// a student can only be in one class at a time
// a student can see subjects theyve offred, results
// the teacher can score student
// relatuionships between the different classes should be implemented as well.


class User{
    public string $name;
    public string $email;
    public int $phoneNumber;

   public function __construct(string $name, string $email, int $phoneNumber){
        $this->name = $name;
        $this->email = $email;
        $this->phoneNumber = $phoneNumber;
    }

    public function getProfile(){
        return "Name: $this->name, Email: $this->email";

}

}

//shouldn't a student have a school?
class Student extends User{
    public ?SchoolClass $currentClass = null;
    public ?School $school = null;
    public  $subjects = [];
    public Results $results;


    public function __construct(string $name, string $email, int $phoneNumber, ?SchoolClass $currentClass = null){
        parent::__construct($name, $email, $phoneNumber);
        if ($currentClass) {
            $this->currentClass = $currentClass;
            $currentClass->addStudent($this);
        }
        $this->results = new Results($this);
    }

    public function setSchool(School $school){
        $this->school = $school;
        $school->addStudent($this);
    }

    public function addSubject(Subjects $subject){
        if(!in_array($subject, $this->subjects, true)){
            $this->subjects[] = $subject;
            $subject->addStudent($this);
        }
    }

    public function getSubjects(){
        return $this->subjects;
    }

    public function getResults(){
        return $this->results;
    }
}


class Guardian extends User{
    public $children = [];
    public function addChild(Student $child){
        if(!in_array($child, $this->children, true)){
            $this->children[] = $child;
        }
    }
}


class SchoolAdmin extends User{
    public School $school;
    public $teachers = [];
    public $students = [];
    public $guardians = [];
    public function __construct(string $name, string $email, int $phoneNumber, School $school){
        parent::__construct($name, $email, $phoneNumber);
        $this->school = $school;
    }
    public function addTeacher(Teacher $teacher){
        if(!in_array($teacher, $this->teachers, true)){
            $this->teachers[] = $teacher;
        }
    }
    public function addStudent(Student $student){
        if(!in_array($student, $this->students, true)){
            $this->students[] = $student;
        }
    }
    public function addGuardian(Guardian $guardian){
        if(!in_array($guardian, $this->guardians, true)){
            $this->guardians[] = $guardian;
        }
    }
}
class Teacher extends User{
    public $schools = [];
    public $subjects = [];
    public $students = [];
    public function addSchool(School $school){
        if(!in_array($school, $this->schools, true)){
            $this->schools[] = $school;
            $school->addTeacher($this);
        }
    }
    public function addSubject(Subjects $subject){
        if(!in_array($subject, $this->subjects, true)){
            $this->subjects[] = $subject;
        }
    }
    public function addStudent(Student $student){
        if(!in_array($student, $this->students, true)){
            $this->students[] = $student;
        }
    }

    public function scoreStudent(Student $student, Subjects $subject, int $score){
        $record = new ExamRecords($student, $subject, $score, $this);
        $student->results->addRecord($record);
        return $record;
    }

}

//what if a subject is taught by different teachers across different classes
class Subjects{
    public string $name;
    public string $subjectCode;
    public School $school;
    public $teachers = [];
    public $students = [];
    public function __construct(string $name, string $subjectCode, School $school){
        $this->name = $name;
        $this->subjectCode = $subjectCode;
        $this->school = $school;
    }

    public function addTeacher(Teacher $teacher){
        if(!in_array($teacher, $this->teachers, true)){
            $this->teachers[] = $teacher;
            $teacher->addSubject($this);
        }
    }

    public function addStudent(Student $student){
        if(!in_array($student, $this->students, true)){
            $this->students[] = $student;
        }
    }
}
class ExamRecords{
    public Student $student;
    public Subjects $subject;
    public int $score;
    public Teacher $scoredBy;
    public function __construct(Student $student, Subjects $subject, int $score, Teacher $scoredBy){
        $this->student = $student;
        $this->subject = $subject;
        $this->score = $score;
        $this->scoredBy = $scoredBy;
    }
}
class Results{
    public Student $student;
    public $records = [];
    public function __construct(Student $student){
        $this->student = $student;
    }
    public function addRecord(ExamRecords $record){
        $this->records[] = $record;
    }
}
class School{
    public string $name;
    public string $location;
    public $students = [];
    public $teachers = [];
    public $classes = [];
    public function __construct(string $name, string $location){
        $this->name = $name;
        $this->location = $location;
    }
    public function addStudent(Student $student){
        if(!in_array($student, $this->students, true)){
            $this->students[] = $student;
        }
    }
    public function addTeacher(Teacher $teacher){
        if(!in_array($teacher, $this->teachers, true)){
            $this->teachers[] = $teacher;
            $teacher->addSchool($this);
        }
    }
    public function addClass(SchoolClass $schoolClass){
        if(!in_array($schoolClass, $this->classes, true)){
            $this->classes[] = $schoolClass;
        }
    }
}

class SchoolClass{
    public string $name;
    public School $school;
    public $students = [];

    public function __construct(string $name, School $school){
        $this->name = $name;
        $this->school = $school;
        $school->addClass($this);
    }

    public function addStudent(Student $student){
        if(!in_array($student, $this->students, true)){
            $this->students[] = $student;
            $student->currentClass = $this;
        }
    }
}