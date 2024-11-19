<?php
     $host = "localhost";
     $user = "root";
     $pass = "";
     $dbname = "sha_db";
     //Connection string to ocnnect database
     $conn = new mysqli ($host, $user, $pass, $dbname);
     if($conn->connect_error)
     {
        die("Connection failed:".$conn->connect_error);
     }
?>