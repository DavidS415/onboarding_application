<?php

session_start();

if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: loginsys/login.php");
    exit;
}

$id=$_POST['id'];

require_once "../loginsys/config.php";

$sql = "INSERT INTO users
SELECT * FROM new_users WHERE id = '$id';
DELETE FROM new_users WHERE id = '$id';";

if ($mysqli->multi_query($sql) === TRUE) {
	echo "New user request approved";
    echo "<p>Click <a href='../index.php'>here</a> to return to home and view OBRFs</p>";
    echo "<p>Click <a href='../admin.php'>here</a> to return to the admin page</p>";
} else {
	echo "Error: ".$sql."<br>".$conn->error;
}

$mysqli->close();

?>