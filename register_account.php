<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            color: #333;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            min-height: 100vh;
            margin: 0;
        }

        .container {
            background-color: #fff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.2);
            width: 400px;
            text-align: center;
        }

        h2 {
            color: #2196F3;
            margin-bottom: 15px;
        }

        form {
            display: flex;
            flex-direction: column;
            gap: 15px;
        }

        input[type="text"],
        input[type="password"] {
            padding: 10px;
            border: 1px solid #ddd;
            border-radius: 5px;
            font-size: 16px;
        }

        input[type="submit"] {
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            background-color: #2196F3;
            color: #fff;
            font-size: 16px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        input[type="submit"]:hover {
            background-color: #1976D2;
        }

        .error {
            color: red;
            font-size: 14px;
        }

        .success {
            color: green;
            font-size: 14px;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Registration</h2>

<?php
//Call connection string
include('database/connection.php');

if(isset($_POST['register']))
{
   //Prepare all the variables 
   $firstname = $_POST['firstname'];
   $lastname = $_POST['lastname'];
   //Sanitized username
   $username = $conn->real_escape_string($_POST['username']);
   $password = password_hash($_POST['password'], PASSWORD_BCRYPT);
   $role = "client";

   //Check if username is already exist
   $check_sql = "SELECT username FROM users WHERE username='$username'";
   //Execute SQL
   $result = $conn->query($check_sql);
   
   if($result->num_rows > 0)
   {
        header("Location: register.php?message=Username is already exist, please choose another one");
   }
   else
   {
        //Username is available proceed to registration
        $sql = "INSERT INTO users (`ID`, `firstname`, `lastname`, `username`, `password`, `role`)
        VALUES (null, '$firstname', '$lastname', '$username', '$password', '$role')";

        if($conn->query($sql) === TRUE)
        {
            header('Location: index.php');
        }
        else{
            echo "Error ".$sql."<br>".$conn->error;
        }
   }
}

?>