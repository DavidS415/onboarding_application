<?php
session_start();

if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
  header("location: loginsys/login.php");
  exit;
}

if(isset($_POST['search']))
{
    $valueToSearch = $_POST['valueToSearch'];
    // search in all table columns
    // using concat mysql function
    $query = "SELECT * FROM `new_obrfs` WHERE CONCAT(`tracker_placement_id`, `first_name`, `last_name`) LIKE '%".$valueToSearch."%'";
    $search_result = filterTable($query);
    
}
 else {
    $query = "SELECT * FROM `new_obrfs`";
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
    <title>View or edit an OBRF</title>
    <style>
      table, th, td{
        border:1px solid black;
        align: center;
      }
    </style>
    <script>

    </script>
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
      <form action="edit.php" method="post">
          <input type="text" name="valueToSearch" placeholder="Value To Search"><br><br>
          <input type="submit" name="search" value="Filter"><br><br>
      <p><strong>Search a candidates name or Placement ID to view more info. Click the Tracker ID to edit</strong></p>
      <table>
        <tr>
          <th>Tracker Placement ID:</th>
          <th>Start Date:</th>
          <th>First Name:</th>
          <th>Last Name:</th>
          <th>Email Address:</th>
          <th>Phone Number:</th>
          <th>Candidate Status:</th>
        </tr>

        <?php while($row = mysqli_fetch_array($search_result)):?>
        <tr>
          <td><a href="updateform.php?tracker_placement_id=<?=$row['tracker_placement_id']?>"><?php echo $row['tracker_placement_id'];?></a></td>
          <td><?php echo $row['sdate'];?></td>
          <td><?php echo $row['first_name'];?></td>
          <td><?php echo $row['last_name'];?></td>
          <td><?php echo $row['email_address'];?></td>
          <td><?php echo $row['cell_phone'];?></td>
          <td>
          <form action='changestatus.php' method='post'>
          <select name='current_status' action='onselect'> 
            <option value='OBRF Created'>OBRF Created</option>
            <option value='Background Started'>Background Started</option>
            <option value='Background Cleared'>Background Cleared</option>
            <option value='Paperwork in Progress'>Paperwork in Progress</option>
            <option value='Onboarding Complete'>Onboarding Complete</option>
          </select>
          <input type='submit'>
        </form>
        </td>
        </tr>
        <?php endwhile;?>
      </table>
      </form>
    </main>
  </body>
</html>