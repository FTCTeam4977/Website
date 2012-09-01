<?php
include "LoginCheck.php";
$starttime = time();
while(file_exists("db.lock"))
{
	echo "the file exists\n";
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
	echo $data[2];
	if($data[2] == $user){
		echo "The user is ".$data[2].", and the password is ".$data[1];
	}
}

?>