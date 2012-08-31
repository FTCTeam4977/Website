<?php
session_start();
$username = $_POST["user"];
$password = $_POST["passwd"];
class Database
{	
	function __construct()
	{	
		$this->users = array();
		touch("users.db");
		$data = file_get_contents("users.db");
		$lines = explode("\n", $data);	
		foreach ( $lines as $line )
		{
			$user = explode(",", $line);
			$this->users[$user[0]] = $user; 
		}
	}

	function check($username, $password)
	{
		if ( !array_key_exists($username, $this->users) )
			return false;
		return $password==$this->users[$username][1];
	}
}

$db = new Database();
if(!$db->check($username, $password))
	header("Location: login.php");
else{
	$_SESSION['isLoggedIn'] = true;
	$_SESSION['user'] = $db->users[$username][2];
	$_SESSION['level'] = users[$username][3];
	header("Location:Home.php");
}
?>