<?php
session_start();
include "Database.php";

$username = $_POST["user"];
$password = $_POST["passwd"];

$db = new Database();
if(!$db->check($username, $password))
	header("Location: login.php");
else{
	$_SESSION['isLoggedIn'] = true;
	$_SESSION['user'] = $db->users[$username][2];
	header("Location:Home.php");
}
?>