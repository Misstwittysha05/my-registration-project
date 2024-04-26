<!-- register_course.php -->
<!DOCTYPE html>
<html>
<head>
    <title>Register Course</title>
</head>
<body>
    <h2>Register Course</h2>
    <form action="register_course.php" method="post">
        <label for="course_code">Course Code:</label><br>
        <input type="text" id="course_code" name="course_code"><br>
        <label for="course_desc">Course Description:</label><br>
        <textarea id="course_desc" name="course_desc"></textarea><br><br>
        <input type="submit" value="Register">
    </form>
</body>
</html>

<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $course_code = $_POST['course_code'];
    $course_desc = $_POST['course_desc'];

    // Database connection
    include("db_conn.php");

    // Insert course into the courses table
    $sql = "INSERT INTO courses (course_code, course_desc) 
            VALUES ('$course_code', '$course_desc')";
    if ($conn->query($sql) === TRUE) {
        echo "Course registration successful";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
}
?>
