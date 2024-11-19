<?php
if (isset($_GET['deletesuccess'])) {
    $message = "Client deleted successfully!";
    $message_type = "success";
} elseif (isset($error_message)) {
    $message = $error_message;
    $message_type = "error";
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Delete Client</title>
    <link rel="stylesheet" href="delete.css"> 
</head>
<body>
    <?php if (isset($message)): ?>
        <div class="message <?php echo $message_type; ?>">
            <?php echo $message; ?>
        </div>
    <?php endif; ?>
    
    <h2>Client Deleted</h2>
    <a href="admin_dashboard.php">Back to Admin Dashboard</a>
</body>
</html>
