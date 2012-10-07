<?php
include "LoginCheck.php";
include "Database.php";

if(!$_POST["NewPasswd"])
	die();
	
$db = new Database();
$db->changePassword($_SESSION['user'], $_POST["NewPasswd"]);
	
?>