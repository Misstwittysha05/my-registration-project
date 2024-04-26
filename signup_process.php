<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    include 'db_con.php';

    // Retrieve form data
    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $email = $_POST['email'];
    $course = $_POST['course'];
    $username = $_POST['username'];
    $password = $_POST['password']; // Note: Password is not being hashed

    // SQL to insert data into the accounts table
    $sql = "INSERT INTO data (firstname, lastname, email,  course) 
            VALUES ('$firstname', '$lastname', '$email', '$course')";
    if ($conn->query($sql) === TRUE) {
        // Retrieve the last inserted id
        $last_id = $conn->insert_id;

        // SQL to insert data into the login table with the last inserted id
        $sql1 = "INSERT INTO login (id, username, password) 
                VALUES ('$last_id', '$username', '$password')";
        if ($conn->query($sql1) === TRUE) {
            // If both inserts are successful, redirect the user
            header("Location: index.php");
            exit();
        } else {
            echo "Error: " . $sql1 . "<br>" . $conn->error;
        }
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    // Close database connection
    $conn->close();
}
?>