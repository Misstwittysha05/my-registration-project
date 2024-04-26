<?php
     session_start();
     include("connect.php");

        if(isset($_SESSION['username']))
         {
             $username = $_SESSION['username'];
             $query = "SELECT * FROM login";

             $mng = mysqli_prepare($con, $query);
             mysqli_stmt_execute($mng);
             $result = mysqli_stmt_get_result($mng);

              if(mysqli_num_rows($result) > 0)
              {
                   
              } 
              else 
              {
                  echo "<br><center><tr><p style='font-size: 20px; color: white; font-family: times new roman'; colspan='4'>No student information found.</p></tr></center>";
              }
         }
          else
           {
              header("Location: info.php");
              exit();
           }
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
            <li><a href="info.php" class="active"><i class="fas fa-user"></i> Profile</a></li>
            
            <li><a href="index.php"><i class="fas fa-sign-out-alt"></i> Log Out</a></li>
        </ul>
    </div>
<?PHP
        echo"<p>WELCOME ". $_SESSION['username'] . ", GOOD DAY!</p>";

    ?>
</body>
</html>
