<?php
class Database
{	
	function __construct()
	{
		$this->lockDB();
		$this->users = array();
		touch("users.db");
		$data = file_get_contents("users.db");
		$lines = explode("\n", $data);	
		foreach ( $lines as $line )
		{
			if ( !empty($line) )
			{
				$user = explode(",", $line);
				$this->users[$user[0]] = $user; 
			}
		}
	}

	function __destruct()
	{
		$this->unlockDB();
	}

	function check($username, $password)
	{
		if ( !array_key_exists($username, $this->users) )
			return false;
		return md5($password)==$this->users[$username][1];
	}

	function changePassword($user, $newpass)
	{
		if ( !array_key_exists($user, $this->users) )
			return;

		$this->users[$user][1] = md5($newpass);
		$this->save();
	}

	function addUser($user, $password, $real)
	{
		if ( array_key_exists($user, $this->users) )
			return;

		$this->users[$user] = array($user, md5($password), $real);
		$this->save();
	}
	
	function save()
	{
		$output = "";
		foreach ( $this->users as $user )
		{
			$output .= implode(",", $user)."\n";
		}
		file_put_contents("users.db", $output);
	}

	function lockDB()
	{
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
	}

	function unlockDB()
	{
		unlink("db.lock");
	}

}

?>