<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Homepage</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <h1> <span>Login Form</span> in</h1>
        <form action="login_process.php" method="POST">
            <div class="form-group">
                <label for="username">Username: </label><br>
                <input type="text" id="username" name="username" required> <br>
            </div>

            <div class="form-group">
                <label for="password">Password: </label><br>
                <input type="password" id="password" name="password" required>
            </div>

            <!-- Login Button -->
            <button type="submit" class="login-button">Log In</button>
        </form>
        <!-- Sign-up Link -->
        <div class="signup-link">
            Don't have an account? <a href="signup.php">Sign up</a>
        </div>
    </div>
</body>
</html>