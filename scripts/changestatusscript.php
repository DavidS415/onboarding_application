<?php

session_start();

if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: loginsys/login.php");
    exit;
}

$current_status=$_POST['current_status'];

require_once "../loginsys/config.php";

$sql = "update new_obrfs set current_status='$current_status'";

if ($mysqli->query($sql) === TRUE) {
	echo "Status updated";
    echo "<p>Click <a href='../index.php'>here</a> to return to home and view OBRFs</p>";
    echo "<p>Click <a href='../form.php'>here</a> to submit a new OBRF</p>";
} else {
	echo "Error: ".$sql."<br>".$conn->error;
}

$mysqli->close();

?>