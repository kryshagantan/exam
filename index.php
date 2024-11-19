<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="index.css">
    <title>LOGIN PAGE</title>
</head>
<body>
    <div class="container">
        <h2>LOGIN</h2>
        <span>
            <?php
            if (isset($_GET['incorrect'])) {
                echo "Incorrect Username or Password!";
            }
            ?>
        </span>
        <form action="authenticate.php" method="post">
            <input type="text" name="username" placeholder="Enter username" required>
            <br><br>
            <input type="password" name="password" placeholder="Enter password" required>
            <br><br>
            <input type="submit" value="Login" name="login">
        </form>
        <p>Don't have an account? <a href="register.php">Register</a></p>
    </div>
</body>
</html>
