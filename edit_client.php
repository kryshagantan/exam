<?php
  //Start Session
  session_start();
  if(!isset($_SESSION['username']) || $_SESSION['role'] != 'admin')
  {
   //  header("Location: index.php");
   header("Locate:index.php");
  // exit();
  }
  //include connection string
  include('database/connection.php');

  //Check if  client ID is provided in URL
  if(isset($_GET['ID']))
  {
    $client_ID = $_GET['ID'];
    //Fetch the current client data
    $sql = "SELECT * FROM users WHERE ID = '$client_ID'";
    $result = $conn->query($sql);
    //Check if the client is exists
    if($result->num_rows > 0)
    {
        $row = $result->fetch_assoc();
        $firstname = $row['firstname'];
        $lastname = $row['lastname'];
        $role = $row['role'];
    }
  }
  else
  {
    //No Client ID redirect to admin dashboard
    header("Locate:admin_dashboard.php");
  }

  //UPDATE FUCNTION
  if(isset($_POST['update']))
  {
    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $role = $_POST['role'];
    //Update the user data in the database using SQl
    $update_sql = "UPDATE users SET
    firstname  =  '$firstname',
    lastname  =  '$lastname',
    role  =  '$role'
    WHERE ID = '$client_ID'";
    if($conn->query($update_sql) === TRUE)
    {
        header("Location: admin_dashboard.php?ClientUpdateSuccess");
    }

    else
    {
        echo "Error Updating Client: ".$conn->error;
    }

  }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="edit.css">
    <title>Edit Page</title>
</head>
<body>
    <h2>Edit Client Infomation</h2>
    <form action="" method="post">
        Firstname
        <input type="text" name="firstname" id="" required value="<?php echo $firstname; ?>"> <br>
        lastname
        <input type="text" name="lastname" id="" required value="<?php echo $lastname; ?>"> <br>
        Role <br>
        <select name="role" id="">
            <option value="admin" <?php if($role == 'admin') echo 'selected';?>>Admin</option> 
            <option value="client" <?php if($role == 'client') echo 'selected';?>>Client</option> 
        </select>
        <br>
        <input type="submit" value = "Update Record" name = "update"> <br> <br>
        <br>
        <a href="admin_dashboard.php">Back to Admin Page</a>

    </form>
</body>
</html>