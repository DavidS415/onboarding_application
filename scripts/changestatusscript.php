<?php

session_start();

if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: loginsys/login.php");
    exit;
}

$current_status=$_POST['current_status'];
$current_tracker_id=$_POST['current_tracker_id'];

require_once "../loginsys/config.php";

$sql = "update new_obrfs set current_status='$current_status' WHERE tracker_placement_id = '$current_tracker_id'";

if ($mysqli->query($sql) === TRUE) {
    header("location: ../edit.php");
} else {
	echo "Error: ".$sql."<br>".$conn->error;
}

$mysqli->close();

?>