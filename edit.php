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
    <title>View or edit an OBRF</title>
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
      p.menu-title{
        width: auto;
        margin-right: 25px;
        margin-left: 20px;
      }
      form.menu-search {
        width: auto;
        margin-right: 25px;
        margin-left: 10px;
      }
    </style>
    <script>

    </script>
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
      <form action="edit.php" method="post" class="menu-search">
          <input type="text" name="valueToSearch" placeholder="Value To Search">
          <input type="submit" name="search" value="Filter"><br><br>
      </form>
      <p class="menu-title"><strong>Search a candidates name or Placement ID to view more info. Click the Tracker ID to edit</strong></p>
      <table class="menu">
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
          <form action='scripts/changestatusscript.php' method='post'>
          <select name='current_status'> 
            <option value=<?php $row['current_status'];?>>Current: <?php echo $row['current_status'];?></option>
            <option value='OBRF Created'>OBRF Created</option>
            <option value='Background Started'>Background Started</option>
            <option value='Background Cleared'>Background Cleared</option>
            <option value='Paperwork in Progress'>Paperwork in Progress</option>
            <option value='Onboarding Complete'>Onboarding Complete</option>
          </select>
          <input type='hidden' name='current_tracker_id' value='<?=$row['tracker_placement_id']?>'>
          <button type='submit'class='btn btn-primary'>Update</button>
        </form>
        </td>
        </tr>
        <?php endwhile;?>
      </table>
      
    </main>
  </body>
</html>