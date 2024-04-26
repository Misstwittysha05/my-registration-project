<?php
session_start();
include("db_con.php");

if(isset($_GET['id'])) {
    $id = $_GET['id'];

    // Prepare the delete statement
    $sql = "DELETE FROM data WHERE id = ?";
    

    if($stmt = $conn->prepare($sql)) {
        // Bind the parameter to the statement
        $stmt->bind_param("i", $id);

        // Execute the statement
        if($stmt->execute()) {
            // Redirect to the dashboard after successful deletion
            header("Location: info.php");
            exit();
        } else {
            echo "Error executing the delete statement: " . $stmt->error;
        }

        // Close the statement
        $stmt->close();
    } else {
        echo "Error preparing the delete statement: " . $conn->error;
    }

    $sql1 = "DELETE FROM login WHERE id = ?";
    if($stmt1 = $conn->prepare($sql1)) {
        // Bind the parameter to the statement
        $stmt1->bind_param("i", $id);

        // Execute the statement
        if($stmt1->execute()) {
            // Redirect to the dashboard after successful deletion
            header("Location: info.php");
            exit();
        } else {
            echo "Error executing the delete statement: " . $stmt1->error;
        }

        // Close the statement
        $stmt1->close();
    } else {
        echo "Error preparing the delete statement: " . $conn->error;
    }

} else {
    echo "ID parameter not set.";
}

// Close database connection
$conn->close();
?>
