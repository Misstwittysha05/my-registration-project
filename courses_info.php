<?php
echo '<table border="1">';
echo '<thead>';
echo '<tr>';
echo '<th>Course ID</th>';
echo '<th>Course Code</th>';
echo '<th>Course Description</th>';
echo '</tr>';
echo '</thead>';
echo '<tbody>';
            
    // Database connection
    include("db_conn.php");

    // Pagination
    // $limit = 10;
    // $page = isset($_GET['page']) ? $_GET['page'] : 1;
    // $offset = ($page - 1) * $limit;

    // Fetch courses
    // $sql = "SELECT * FROM courses LIMIT $offset, $limit";

    $sql = "SELECT * FROM courses";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            echo "<tr>";
            echo "<td>" . $row['course_id'] . "</td>";
            echo "<td>" . $row['course_code'] . "</td>";
            echo "<td>" . $row['course_desc'] . "</td>";
            echo "</tr>";
        }
    } else {
        echo "<tr><td colspan='3'>No records found</td></tr>";
    }

    $conn->close();
            
echo '</tbody>';
echo '</table>';
?>
