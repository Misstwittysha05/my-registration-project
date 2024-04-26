<?php
    // Database connection    
    $conn = new mysqli('localhost', 'root', '', 'universitydb');
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

?>