<!-- register.php -->
<!DOCTYPE html>
<html>
<head>
    <title>User Registration</title>
</head>
<body>
    <h2>User Registration</h2>
    <form action="register_user.php" method="post">
        <label for="username">Username:</label><br>
        <input type="text" id="username" name="username"><br>
        <label for="password">Password:</label><br>
        <input type="password" id="password" name="password"><br>
        <label for="last_name">Last Name:</label><br>
        <input type="text" id="last_name" name="last_name"><br>
        <label for="first_name">First Name:</label><br>
        <input type="text" id="first_name" name="first_name"><br>
        <label for="middle_initial">Middle Initial:</label><br>
        <input type="text" id="middle_initial" name="middle_initial" maxlength="1"><br>
        <label for="gender">Gender:</label><br>
        <select id="gender" name="gender">
            <option value="1">Male</option>
            <option value="0">Female</option>
        </select><br>
        <label for="role">Role:</label><br>
        <select id="role" name="role">
            <option value="admin">Admin</option>
            <option value="professor">Professor</option>
            <option value="student">Student</option>
        </select><br><br>
        <input type="submit" value="Register">
    </form>
</body>
</html>



<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $last_name = $_POST['last_name'];
    $first_name = $_POST['first_name'];
    $middle_initial = $_POST['middle_initial'];
    $gender = $_POST['gender'];
    $role = $_POST['role'];

    // Database connection
    include("db_conn.php");

    // Insert user into the users table
    $sql = "INSERT INTO users (username, password, last_name, first_name, middle_initial, gender, role) 
            VALUES ('$username', '$password', '$last_name', '$first_name', '$middle_initial', '$gender', '$role')";
    if ($conn->query($sql) === TRUE) {
        echo "User registration successful";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
}
?>
