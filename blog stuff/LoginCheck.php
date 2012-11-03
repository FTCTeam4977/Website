<?php
session_start();
if(!$_SESSION['isLoggedIn']){
	header("location: login.php");
	die();
}
else{
	$user = $_SESSION['user'];
}

?>