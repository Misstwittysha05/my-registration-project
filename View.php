<?php
session_start();
include("db_con.php");

if(isset($_GET['id'])) 
{
    $stud_ID = $_GET['id'];

    $query_info = "SELECT * FROM data WHERE id = ?";
    $mng_info = mysqli_prepare($conn, $query_info);
    mysqli_stmt_bind_param($mng_info, "i", $stud_ID);
    mysqli_stmt_execute($mng_info);
    $result_info = mysqli_stmt_get_result($mng_info);

    if(mysqli_num_rows($result_info) > 0) 
    {
        $row_info = mysqli_fetch_assoc($result_info);
        $email = $row_info['email'];
        $course = $row_info['course'];
    } 
    else 
    {
        echo "Student not found.";
        exit();
    }
}
?>

<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title> STUDENT INFORMATION SYSTEM </title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

    <style>

        body 
        {
            background-image: url("vw.jpg");
            background-repeat: no-repeat;
            background-size: cover;
            background-color: #f0f0f0;
            font-family: Arial, sans-serif;
            margin-top: 100px;
        }

        .container 
        {
            height: 380px;
            width: 35%;
            margin: 0 auto;
            padding: 20px;
            border: 1px solid #ddd;
            border-radius: 8px;

        }
        
        h1 
        {
            text-align: center;
            font-family: 'Georgia Pro Black';
            font-size: 30px;
        }
        
        table 
        {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }
        
        th, td 
        {
            padding: 10px;
            border-bottom: 1px solid #ddd;
            font-size: 20px;
            color: black;
        }
        
        th 
        {
            font-family: 'Times new roman';
            font-size: 25px;
            color: black;
        }
        
        .tbl_contain 
        {
            width: 100%;
            display: flex;
            justify-content: center;
            margin-top: 60px; 
        }

        input[type="submit"] 
        {
            background-color: black;
            color: #fff;
            border: none;
            border-radius: 4px;
            padding: 10px 20px;
            cursor: pointer;
            position: absolute;
            margin-top: 180px;
            right: 650px;
        }
    </style>
</head>
<body>
    <div class="tbl_contain">
    <div class="container">
        <br>
        <h1> OTHER INFORMATION </h1>
        <table>

            <tr>
                <th>Email : </th>
                <td><?php echo  $email; ?></td>
            </tr>
            <tr>
                <th>Course : </th>
                <td><?php echo  $course; ?></td>
            </tr>

            <br><br><br>
        <p style="position: absolute; right: 590px; margin-top: 10px; font-size:20px;"><a href="edit.php?id=<?php echo $stud_ID; ?>"><i class='bi bi-pen' style="color: black;"></i></a></p>
        <p style="position: absolute; right: 550px; margin-top: 10px; font-size:20px;" ><a href="delete.php?id=<?php echo $stud_ID; ?>"><i class='bi bi-trash3' style="color: black;"></i></a></p>
        <a href="info.php"><input type="submit" value="BACK"></a>

    </div>
    </div>
</body>
</html>
