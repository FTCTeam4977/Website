<?php
$user = $_POST["user"];
$password = $_POST["password"];

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
if(!$db->check($user, $password))
{
	header("Location: Blog-Login.php?error=1");
}
$username = $db->users[$user][2];

?>
<html>
	<body>
		your user name is <?echo $user;?><br> 
		your password is <?echo $password;?><br>
		your name is <?echo $username;?><br>
	</body>
</html>
