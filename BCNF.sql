-- Original table (not in BCNF)
CREATE TABLE StudentCoursesWithInstructor (
    StudentID INT,
    Course VARCHAR(100),
    Instructor VARCHAR(100)
);

-- Normalized BCNF tables

-- Table tracking which students are in which courses
CREATE TABLE StudentCourses (
    StudentID INT,
    Course VARCHAR(100),
    PRIMARY KEY (StudentID, Course)
);

-- Table mapping each course to an instructor
CREATE TABLE CourseInstructors (
    Course VARCHAR(100) PRIMARY KEY,
    Instructor VARCHAR(100)
);

-- Sample data for BCNF decomposition
INSERT INTO StudentCourses (StudentID, Course) VALUES
(1, 'Math'),
(2, 'Math'),
(3, 'History'),
(4, 'History');

INSERT INTO CourseInstructors (Course, Instructor) VALUES
('Math', 'Dr. Smith'),
('History', 'Dr. Jones');