<?php
    session_start();
    //  if(!isset($_SESSION['username']) || $_SESSION['role'] == 'client')
    //  {
    //     header("Location: index.php");
    //  }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CLIENT DASHBOARD</title>
    <style>
        /* Girly CSS */
        body {
            font-family: 'Comic Sans MS', cursive, sans-serif;
            background-color: #ffebf1; /* Soft pink background */
            color: #333;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .container {
            background-color: #fff;
            padding: 30px;
            border-radius: 15px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
            text-align: center;
            width: 80%;
            max-width: 600px;
        }

        h2 {
            color: #ff69b4; /* Hot pink */
            font-size: 2em;
            margin-bottom: 20px;
        }

        p {
            color: #ff1493; /* Deep pink */
            font-size: 1.2em;
            margin-bottom: 20px;
        }

        a {
            color: #ff69b4; /* Hot pink */
            text-decoration: none;
            font-size: 1.2em;
            padding: 10px 20px;
            background-color: #ffb6c1; /* Light pink */
            border-radius: 10px;
            transition: background-color 0.3s ease, color 0.3s ease;
        }

        a:hover {
            background-color: #ff1493; /* Deep pink */
            color: white;
        }

        .logout {
            display: inline-block;
            margin-top: 20px;
        }

    </style>
</head>
<body>
    <div class="container">
        <h2>Welcome Admin</h2>
        <p>Hello, <?php echo $_SESSION['username']; ?>!</p>
        <a href="logout.php" class="logout">Logout</a>
    </div>
</body>
</html>
