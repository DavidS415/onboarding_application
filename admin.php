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
    require_once "loginsys/config.php";
    $filter_Result = mysqli_query($mysqli, $query);
    return $filter_Result;
}
?>

<!DOCTYPE html>
<html lang="en-US">
  <head>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link href="styles/styles.css" rel="stylesheet">
    <meta charset="utf-8">
    <title>Admin Page</title>
    <style>
      table, th, td{
        border:1px solid black;
        align: center;
      }
      table.menu {
        width: auto;
        margin-right: 25px;
        margin-left: 10px;
      }
    </style>
  </head>
  <body>
    <div id="logout">
      <a href="loginsys/logout.php">Sign Out</a>
    </div>
    <div id="admin">
      <a href="admin.php">Admin Page</a>
    </div>
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
      <table class="menu">
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