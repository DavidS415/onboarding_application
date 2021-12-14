<?php
session_start();

if(!isset($_SESSION["role"]) || $_SESSION["role"] !== "admin"){
  echo"<script>
  alert('You are not signed in as an adminstrator, please check your credentials or ask your adminstrator for permission to view this page.');
  window.location = 'index.php';
  </script>";
  exit;
}

{
    $query = "SELECT * FROM `new_users`";
    $search_result = filterTable($query);
}

// function to connect and execute the query
function filterTable($query)
{
    $connect = mysqli_connect("localhost", "david", "Dknocks530", "oba");
    $filter_Result = mysqli_query($connect, $query);
    return $filter_Result;
}
?>

<!DOCTYPE html>
<html lang="en-US">
  <head>
    <link href="styles/styles.css" rel="stylesheet">
    <meta charset="utf-8">
    <title>Admin Page</title>
    <style>
      table, th, td{
        border:1px solid black;
        align: center;
      }
    </style>
  </head>
  <body>
    <header>
        <h1>Welcome to the Onboarding Application</h1>
    </header>
    <nav>
        <ul>
          <li><a href="index.php">Home</a></li>
          <li><a href="form.php">Submit a new OBRF</a></li>
          <li><a href="edit.php">View or edit an OBRF</a></li>
        </ul>
    </nav>
    <main>
      <table>
        <tr>
          <th>Request ID:</th>
          <th>Username:</th>
          <th>Date/Time Requested:</th>
        </tr>

        <?php while($row = mysqli_fetch_array($search_result)):?>
        <tr>
          <td><a href="loginsys/confirmregister.php?id=<?=$row['id']?>"><?php echo $row['id'];?></a></td>
          <td><?php echo $row['username'];?></td>
          <td><?php echo $row['created_at'];?></td>
        </tr>
        <?php endwhile;?>
      </table>
    </main>
  </body>
</html>