<?php
    session_start();
    include("connect.php");
 
    if($_SERVER['REQUEST_METHOD'] == "POST")
    {
        $username = $_POST['username'];
        $pass = $_POST['password'];

        if(!empty($username) && !empty($pass) && !is_numeric($username)) 
        {
            $query = "SELECT username, password FROM stud_log WHERE username = ? AND password = ?";
            $mng = mysqli_prepare($con, $query);
            mysqli_stmt_bind_param($mng, "ss", $username, $pass);
            mysqli_stmt_execute($mng);
            $result = mysqli_stmt_get_result($mng);

            if($result && mysqli_num_rows($result) > 0) 
            {
                    $_SESSION['username'] = $username;
                    header("location: data.php");
                    exit();
                 
            } else
             {
                echo "<script>alert('Wrong username or password');</script>";
            }
        }
         else 
         {
            echo "<script>alert('No information found!');</script>";
        }
    }

?>



<html>
    <head>
        <title>
            STUDENT INFORMATION SYSTEM
        </title>
        
    </head>

    <body>
    <style>
        
        body 
        {
            background-image: url(student.jpg);
            background-repeat: no-repeat;
            background-position: center;
            background-size: cover;
        }

        
        </style>

        <div class="login"> 
        <form method="POST">
        <br><br><br><br>
        <table border = 0 style="background-color: rgb(236, 236, 166); height: 100px; width: 250px; position:absolute; right: 150px; border-radius: 20px;">
        
        <tr>
        <td align= "center"><h1 style="font-family: 'Georgia Pro Black'; font-size: 20px; color: rgb(62, 42, 80);"> <br> LOGIN NOW</h1></center></td>
        </tr>
        
        <tr>
        <br><br><br>
        <td align ="center"><input type="text" name="username" required placeholder=" Enter username" style="height:40px; width: 200px; font-size: 20px; font-family: 'Times New Roman'; border-radius: 10px; background-color: antiquewhite;"></td>
        </tr>

        <tr>
        <br><br><br>
        <td align ="center"><input type="password" name="password" required placeholder=" Enter password" style="height:40px; width: 200px; font-size: 20px; font-family: 'Times New Roman'; border-radius: 10px; background-color:antiquewhite; "></td>
        </tr>

        <tr>
        <td align = "center"><br><button type="login" name="submit" style="width: 130px; height: 30px; background-color:rgb(221, 80, 80); border-radius: 30px;"> <b><h2 style="font-family:'Cooper Black'; font-size: 10px; "> LOGIN <br> </h2></b></button></td>
        </tr>
        </table>

        <tr>
        <td align= "center"><br><br><br><br><br><br><br><br><br><br><h3 style="font-family: 'times new roman'; font-size: 12px; color: rgb(62, 42, 80); position:absolute; right: 200px;"> <br> Don't have an account? <a href="signup.php"> sign up </h3></center></td>
        </tr>
        </div>
        </form>  
        
    </body>
</html>