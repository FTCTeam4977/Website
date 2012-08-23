<?php
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
{
	//header("Location: login.php");
	echo $db->users[$username][2];
}
else{
	$_SESSION['isLoggedIn'] = true;
	$_SESSION['user'] = $db->users[$username][2];
	header("Location:Home.php");
}
?>