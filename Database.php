<?php
$user = $_POST["user"];
$password = $_POST["password"];

if ( empty($user) || empty($password) )
	header("Location: Blog-Login.html?error=1");


class Database
{	
	function __construct()
	{	
		$this->users = array();
		
		touch("Users.db");
		$data = file_get_contents("user.db");
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

$db->check($username, $password)
$username = $db->users[$user][2]l

?>
<html>
	<body>
		your user name is <?echo $user;?><br> 
		your password is <?echo $password?><br>
		your name is <?echo $username?>
	</body>
</html>
