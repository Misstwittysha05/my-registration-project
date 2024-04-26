<?php

include("db_con.php");
if(isset($_GET['id']))
 {
   

    $stud_id = $_GET['id'];

    $query_info = "SELECT firstname,lastname,email,course FROM data WHERE id = ?";
    $mng_info = mysqli_prepare($conn, $query_info);
    mysqli_stmt_bind_param($mng_info, "i", $stud_id);
    mysqli_stmt_execute($mng_info);
    $result_info = mysqli_stmt_get_result($mng_info);
    
    if(mysqli_num_rows($result_info) == 1)
    {
        $row_info = mysqli_fetch_assoc($result_info);
        $firstname = $row_info['firstname'];
        $lastname = $row_info['lastname'];
        $email = $row_info['email'];
        $course = $row_info['course'];
    } 
    else 
    {
        header("Location: info.php?id=".$stud_id);
        exit();
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Edit Student Information</title>
    

<style>            
        body 
        {
            background-image: url("edit.jpg");
            font-family: Arial, sans-serif;
            width: 800px;  
        }

        .container 
        {
            width: 30%;
            height: 450px;
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            padding: 30px;
            border: 1px solid #ddd;
            border-radius: 8px;
 
        }

        h1 
        {
            text-align: center;
            font-family: Georgia Pro Black;
            font-size: 25px;
        }

        form 
        {
            margin-top: 20px;
        }

        label 
        {
            display: inline-block;
            width: 100px; 
            margin-bottom: 5px;
            font-family: 'times new roman';
            font-size: 22px;
        }

        input[type="text"], input[type="email"] 
        {
            width: calc(95% - 110px); 
            padding: 8px;
            margin-bottom: 5px;
            border: 1px solid #ddd;
            border-radius: 4px;
            vertical-align: middle; 
            font-family: 'calibri';
            font-size: 18px;
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
            right: 40px;
        }

        input[type="submit"]:hover 
        {
            background-color: skyblue;
        }

        .tbl_contain 
        {
            width: 100%;
            display: flex;
            justify-content: center; 
            margin-top: 60px; 
        }
        
</style>
</head>

<body>
<div class="tbl_contain">
    <div class="container">
        <h1>Edit Student Information</h1>
        <br>
        <form action="edit2.php" method="POST">
    <input type="hidden" name="id" value="<?php echo $stud_id; ?>">  <!-- Include the student ID as a hidden field -->
    <label for="firstname"> Firstname:</label>
    <input type="text" id="firstname" name="firstname" value="<?php echo $firstname; ?>" required><br><br>
    <label for="lastname">Lastname:</label>
    <input type="text" id="lastname" name="lastname" value="<?php echo $lastname; ?>" required><br><br>
    <label for="email">Email:</label>
    <input type="email" id="email" name="email" value="<?php echo $email; ?>" required><br><br>
    <label for="course">Course:</label>
    <input type="text" id="course" name="course" value="<?php echo $course; ?>" required><br><br>
    <input type="submit" value="Update">
</form>

    </div>
</div>
</body>
</html>
