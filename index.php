<?php
// Initialize the session
session_start();
 
// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: loginsys/login.php");
    exit;
}
?>
<!DOCTYPE html>
<html lang="en-US">
  <head>
    <link href="styles/styles.css" rel="stylesheet">
    <meta charset="utf-8">
    <title>Welcome to the Onboarding Application</title>
    <style>
      h2 {
        text-align: center;
      }
    </style>
    <script>
      function sortTable() {
  var table, rows, switching, i, x, y, shouldSwitch;
  table = document.getElementById("CandidateTable");
  switching = true;
  /* Make a loop that will continue until
  no switching has been done: */
  while (switching) {
    // Start by saying: no switching is done:
    switching = false;
    rows = table.rows;
    /* Loop through all table rows (except the
    first, which contains table headers): */
    for (i = 1; i < (rows.length - 1); i++) {
      // Start by saying there should be no switching:
      shouldSwitch = false;
      /* Get the two elements you want to compare,
      one from current row and one from the next: */
      x = rows[i].getElementsByTagName("TD")[0];
      y = rows[i + 1].getElementsByTagName("TD")[0];
      // Check if the two rows should switch place:
      if (x.innerHTML.toLowerCase() > y.innerHTML.toLowerCase()) {
        // If so, mark as a switch and break the loop:
        shouldSwitch = true;
        break;
      }
    }
    if (shouldSwitch) {
      /* If a switch has been marked, make the switch
      and mark that a switch has been done: */
      rows[i].parentNode.insertBefore(rows[i + 1], rows[i]);
      switching = true;
    }
  }
}
    </script>
  </head>
  <body onload="sortTable()">
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
      <h2>Current candidates in onboarding</h2>
    <?php

    // MairaDB connection block/information

    $hostname = "localhost";
    $username = "david";
    $password = "Dknocks530";
    $db = "oba";

    // Connect to database or return an error message if connection fails
    
    $dbconnect=mysqli_connect($hostname,$username,$password,$db);

    if ($dbconnect->connect_error) {
      die("Database connection failed: " . $dbconnect->connect_error);
        }

    ?>
    <table border="1" align="center" id="CandidateTable">
    <tr>
      <td>Start Date:</td>
      <td>Candidate First Name:</td>
      <td>Candidate Last Name:</td>
      <td>Customer:</td>
      <td>Account Manager:</td>
      <td>Recruiter:</td>
      <td>Sourcer:</td>
      <td>CTO:</td>
      <td>Current Status:</td>
    </tr>
    <?php

// Query database for the table with data

$query = mysqli_query($dbconnect, "SELECT * FROM new_obrfs")
   or die (mysqli_error($dbconnect));

// Loop through the results and display each candidate in a table row

while ($row = mysqli_fetch_array($query)) {
  echo
   "<tr>
    <td>{$row['sdate']}</td>
    <td>{$row['first_name']}</td>
    <td>{$row['last_name']}</td>
    <td>{$row['customer']}</td>
    <td>{$row['placement_am']}</td>
    <td>{$row['placement_recruiter']}</td>
    <td>{$row['placement_sourcer']}</td>
    <td>{$row['placement_cto']}</td>
    <td>{$row['current_status']}</td>
   </tr>\n";

}

?>
    </main>
  </body>
</html>