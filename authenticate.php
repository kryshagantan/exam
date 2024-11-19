<?php
// Include the database connection file
include('database/connection.php');

// Start a session to manage user data
session_start();

// Check if the form is submitted using the login button
if (isset($_POST['login'])) {
    // Sanitize the username input to prevent SQL injection
    $username = $conn->real_escape_string($_POST['username']);
    // Get the password (Note: not yet encrypted)
    $password = $_POST['password'];

    // SQL Query to select username from the database
    $sql_username = "SELECT * FROM users WHERE username = '$username'";

    // Execute the query
    $result = $conn->query($sql_username);

    // Check if the query returned any results
    if ($result->num_rows > 0) {
        // Fetch all associated records based on username
        $row = $result->fetch_assoc();
        
        // Verify the provided password against the stored hash password
        if (password_verify($password, $row['password'])) {
            // Password is correct, set session variables
            $_SESSION['username'] = $username;
            $_SESSION['role'] = $row['role'];
            
            // Regenerate session ID for security after login
            session_regenerate_id(true);
            
            // Redirect the user to the appropriate dashboard
            if ($row['role'] == 'admin') {
                header("Location: admin_dashboard.php");
                exit();
            } else if ($row['role'] == 'client') {
                header("Location: client_dashboard.php");
                exit();
            }
        } else {
            // Incorrect password
            header("Location: index.php?error=incorrect_password");
            exit();
        }
    } else {
        // Username not found
        header("Location: index.php?error=username_not_found");
        exit();
    }
} else {
    // If form is not submitted, redirect to login page
    header("Location: index.php");
    exit();
}
?>
