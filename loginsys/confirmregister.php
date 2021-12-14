<?php
session_start();

if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: loginsys/login.php");
    exit;
}

$_SESSION['id'] = $_GET['id'];
$id = $_GET['id'];

require_once "config.php";

$sql = "select * from new_users where id='$id'";

$result = $mysqli->query($sql);

if ($result->num_rows > 0){

$row = $result->fetch_assoc();

$username=$row['username'];
$created_at=$row['created_at'];

echo

"<html>
<head>
    <title>Update an OBRF</title>
    <link href='../styles/styles.css' rel='stylesheet'>
    <link rel='stylesheet' href='https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css'>
    <style>
        body{ font: 14px sans-serif; }
        .wrapper{ width: 360px; padding: 20px; }
    </style>
</head>
<body>
<header>
        <h1>Welcome to the Onboarding Application</h1>
    </header>

    <nav>
        <ul>
          <li><a href='../index.php'>Home</a></li>
          <li><a href='../form.php'>Submit a new OBRF</a></li>
          <li><a href='../edit.php'>View or edit an OBRF</a></li>
        </ul>
    </nav>

<p>Would you like to confirm user $username request to access submitted at $created_at?</p>
<form action='../scripts/confirmregisterscript.php' method='post'>
<input type='hidden' name='id' value='$id'>
<button type='submit'>Yes</button>
<a href='../admin.php' class='button'>No</a>

</body>
</html>";


} else {
	echo "Not Found";
}
$mysqli->close();

?>