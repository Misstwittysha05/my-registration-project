<?php             
    // Database connection
    include("db_conn.php");

    // Get total number of students
    $sql = "SELECT COUNT(*) AS total_students FROM students";
    $result = $conn->query($sql);
    $row = $result->fetch_assoc();
    $total_students = $row['total_students'];

    // Get number of male students
    $sql = "SELECT COUNT(*) AS male_students FROM students WHERE gender = 1";
    $result = $conn->query($sql);
    $row = $result->fetch_assoc();
    $male_students = $row['male_students'];

    // Get number of female students
    $sql = "SELECT COUNT(*) AS female_students FROM students WHERE gender = 0";
    $result = $conn->query($sql);
    $row = $result->fetch_assoc();
    $female_students = $row['female_students'];

    // Get total number of courses
    $sql = "SELECT COUNT(*) AS total_courses FROM courses";
    $result = $conn->query($sql);
    $row = $result->fetch_assoc();
    $total_courses = $row['total_courses'];

    echo '<p>';
    echo $total_courses   .' - List of Courses | ';
    echo $total_students  .' - No. of Students | ';
    echo $male_students   .' - Male | ';
    echo $female_students .' - Female';
    echo '</p>';

    echo '<table border="1">';
    echo '<thead>';
    echo '<tr>';
    echo '<th>Student ID</th>';
    echo '<th>Last Name</th>';
    echo '<th>First Name</th>';
    echo '<th>Middle Initial</th>';
    echo '<th>Email</th>';
    echo '<th>Contact No</th>';
    echo '<th>Address</th>';
    echo '<th>Gender</th>';
    echo '</tr>';
    echo '</thead>';
    echo '<tbody>';    

    // Pagination
    $limit = 10;
    $page = isset($_GET['page']) ? $_GET['page'] : 1;
    $offset = ($page - 1) * $limit;

    // Fetch students with gender
    $sql = "SELECT * FROM students LIMIT $offset, $limit";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            echo "<tr>";
            echo "<td>" . $row['stud_id'] . "</td>";
            echo "<td>" . $row['last_name'] . "</td>";
            echo "<td>" . $row['first_name'] . "</td>";
            echo "<td>" . $row['middle_initial'] . "</td>";
            echo "<td>" . $row['email'] . "</td>";
            echo "<td>" . $row['contact_no'] . "</td>";
            echo "<td>" . $row['address'] . "</td>";
            echo "<td>" . ($row['gender'] == 1 ? 'Male' : 'Female') . "</td>";
            echo "</tr>";
        }
    } else {
        echo "<tr><td colspan='8'>No records found</td></tr>";
    }

    $conn->close();

    echo '</tbody>';
    echo '</table>';
?>

<?php
    // Pagination links
    include("db_conn.php");
    $sql = "SELECT COUNT(*) AS total FROM students";
    $result = $conn->query($sql);
    $row = $result->fetch_assoc();
    $total_pages = ceil($row['total'] / $limit);
    echo "Pages: ";
    for ($i = 1; $i <= $total_pages; $i++) {
        echo "<a href='dashboard.php?page=$i'>$i</a> ";
    }
    echo "<br><br>";
    $conn->close();
?>