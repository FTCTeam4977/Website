<?php
include "LoginCheck.php";
if(!$_POST["NewPasswd"])
die();
$newPassword = $_POST["NewPasswd"];
$starttime = time();
while(file_exists("db.lock"))
{
	$timepassed = time()-$starttime;
	if ( $timepassed>5)
	{
		unlink("db.lock");
		break;
	}
}
touch("db.lock");
$dbFile = file_get_contents("users.db");
$rows = explode("\n",$dbFile);
foreach($rows as $row){
	$data = explode(",",$row);
	if($data[2] == $user){
		$data[1] = $newPassword;
	}
}
unlink("db.lock");
?>