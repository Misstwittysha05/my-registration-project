<!-- register_student.php -->
<!DOCTYPE html>
<html>
<head>
    <title>Register Student</title>
</head>
<body>
    <h2>Register Student</h2>
    <form action="register_student.php" method="post">
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
        <label for="email">Email:</label><br>
        <input type="email" id="email" name="email"><br>
        <label for="contact_no">Contact No:</label><br>
        <input type="text" id="contact_no" name="contact_no"><br>
        <label for="address">Address:</label><br>
        <textarea id="address" name="address"></textarea><br><br>
        <input type="submit" value="Register">
    </form>
</body>
</html>


<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $last_name = $_POST['last_name'];
    $first_name = $_POST['first_name'];
    $middle_initial = $_POST['middle_initial'];
    $gender = $_POST['gender'];
    $email = $_POST['email'];
    $contact_no = $_POST['contact_no'];
    $address = $_POST['address'];

    // Database connection
    $conn = new mysqli('localhost', 'root', '', 'universitydb');
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Insert student into the students table
    $sql = "INSERT INTO students (last_name, first_name, middle_initial, gender, email, contact_no, address) 
            VALUES ('$last_name', '$first_name', '$middle_initial', '$gender', '$email', '$contact_no', '$address')";
    if ($conn->query($sql) === TRUE) {
        echo "Student registration successful";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
}
?>
