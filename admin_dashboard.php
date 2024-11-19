<?php
     session_start();
     if(!isset($_SESSION['username']) || $_SESSION['role'] != 'admin')
     {
      //  header("Location: index.php");
     }
     //include connection string
     include('database/connection.php');
     //Create Variable for Search Query
     $search_query = '';
     //Check if search query is submitted
     if(isset($_GET['search']))
     {
        $search_query = $conn->real_escape_string($_GET['search']);
     }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <link rel="stylesheet" href="admin.css">
    <title>ADMIN DASHBOARD</title>
</head>
<body class="bg-gray-100 text-gray-800">
<div class="container mx-auto p-4">
<div class="bg-white shadow-md rounded-lg p-6">
    <h2>Welcome Admin</h2>

    
    <?php
        echo $_SESSION['username'];
    ?>
    <br>
    <a href="logout.php">logout</a>
    <br> <br>
    <!-- Search Form -->
     <form action="" method="get">
        <input type="text" name="search" id="" placeholder="Search by username" value="<?php echo $search_query;?>">
        <input type="submit" value="Search">
    </form>
    <br> 
    
    <table border="1" style="width: 20px;">
        <tr>
            <td>#</td>
            <td>Username</td>
            <td>Firstname</td>
            <td>Lastname</td>
            <td>Role</td>
            <td>Action</td>
        </tr> 
        <?php
        // Modify SQ Query based on the search input
        if(!empty($search_query))
        {
            $sql = "SELECT * FROM users WHERE role='client' AND username LIKE '%$search_query%'";
        }
        else
        {
            $sql = "SELECT * FROM users WHERE role='client'";
        }
        //Execute SQL command
        $result = $conn->query($sql);
        //Check if any client exist
        if($result->num_rows > 0)
        {
            //Loop to display each client record
            $count=1;
            while($row = $result->fetch_assoc())
            {
                echo "<tr>";
                echo "<td>$count</td>";
                echo "<td>".$row['username']."</td>";
                echo "<td>".$row['firstname']."</td>";
                echo "<td>".$row['lastname']."</td>";
                echo "<td>".$row['role']."</td>";
                echo "<td>";
                echo "<a href='edit_client.php?ID=".$row['ID']."'>Edit</a> |";
                echo "<a href='delete_client.php?ID=".$row['ID']."' on;lick='return confirm(\"Are you sure you want to delete this client?\");'>Delete</a> ";
                echo "</td>";
                echo "</tr>";
                $count++;       
            }
        }
        else
        {
            echo"<tr><td coldspan=6> NO Record Found!</td></tr>";
        }
        ?>
    </table>
</body>
</html>