<!-- dashboard.php -->
<!DOCTYPE html>
<html>
<head>
    <title>Dashboard</title>
</head>
<body>
    <h2>Welcome to the Dashboard</h2>
    <?php
    session_start();
    if (isset($_SESSION['username'])) {
        echo "Hello, " . $_SESSION['username'] . " | <a href='logout.php'>Logout</a><br>";        

        if ($_SESSION['role'] == 'admin' || $_SESSION['role'] == 'professor') {
            echo "<p><a href='register_student.php'>Register Student</a> | ";
            echo "<a href='register_course.php'>Register Course</a></p>";
            include("student_info.php");            
        } else {
            echo "<p>You do not have permission to register students or courses.</p>";
        }

        include("courses_info.php");
    } 
    else {
        header("Location: index.php");
        exit();
    }
    ?>
    <br><br>    
</body>
</html>
