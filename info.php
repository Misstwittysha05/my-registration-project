<?php
session_start();
include ("db_con.php");

// Check if the user is logged in
if (!isset($_SESSION['user_id'])) {
    // Redirect to the login page if not logged in
    header("Location: index.php");
    exit();
}


// Retrieve student data from the database
$sql = "SELECT * FROM data";
$result = $conn->query($sql);

// Close database connection
$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Dashboard</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

    <style>
        /* Sidebar styles */
        .sidebar {
            height: 100%;
            width: 250px;
            position: fixed;
            top: 0;
            left: 0;
            background-color: #333;
            padding-top: 20px;
        }

        .sidebar-menu {
            list-style: none;
            padding: 0;
        }

        .sidebar-menu li {
            margin-bottom: 10px;
        }

        .sidebar-menu li a {
            display: block;
            color: #fff;
            text-decoration: none;
            padding: 10px;
            border-left: 4px solid transparent;
        }

        .sidebar-menu li a:hover {
            background-color: #444;
        }

        .sidebar-menu li a.active {
            border-left-color: #ff6600; /* Change color as needed */
            background-color: #444;
        }

        /* Main content styles */
        .content {
            margin-left: 250px; /* Adjust based on sidebar width */
            padding: 20px;
        }

        /* Table styles */
        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }

        table th, td {
            text-align: center;
            padding: 8px;
            border: 1px solid #ddd;
        }

        th {
            background-color: #f2f2f2;
            font-weight: bold;
            text-align: left;
        }

        .action-icons {
            display: flex;
            justify-content: center;
        }

        .action-icons a {
            margin: 0 5px;
        }

    </style>
</head>
<body>
<div class="sidebar">
    <ul class="sidebar-menu">
        <li><a href="dashboard.php"><i class="fas fa-user"></i> DASHBOARD </a></li>
        <li><a href="info.php" class="active"><i class="fas fa-graduation-cap"></i> Students Info</a></li>
        <li><a href="index.php"><i class="fas fa-sign-out-alt"></i> Log Out</a></li>
    </ul>
</div>

    <div class="content">
        <h2>Students Information</h2>
        <table>

    
            <tr>
                <th>ID</th>
                <th>First Name</th>
                <th>Last Name</th>
                <th>Action</th>
                <!-- Add more columns as needed -->
            </tr>

             <?php
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    echo "<tr>";
                    echo "<td>" . $row['id'] . "</td>";
                    echo "<td>" . $row['firstname'] . "</td>";
                    echo "<td>" . $row['lastname'] . "</td>";

                    echo "<td class='action-icons'>";
                    echo "<a href='edit.php?id=" . $row['id'] . "' title='Edit Profile'>EDIT</i></a>";
                    echo "<a href='view.php?id=" . $row['id'] . "' title='View Details'>VIEW</i></a>";
                    echo "<a href='delete.php?id=" . $row['id'] . "' title='View Details'> DELETE</i></a>";
                    echo "</td>";
                    echo "</tr>";
                }
            } else {
                echo "<tr><td colspan='6'>No users found</td></tr>";
            }
            ?>
        </table>
    </div>
</body>
</html>
