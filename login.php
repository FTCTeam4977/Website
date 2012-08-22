<?php
session_start();
$_SESSION['isLoggedIn'] = true;
$_SESSION['username'] = "Benjamin";
$isLoggedIn = $_SESSION['isLoggedIn'];
$username = $_SESSION['username'];
if(!$isLoggedIn)
	header("Location: Home.php");
?>
<!DOCTYPE html>
<html>
<head>
	<title>Login</title>
	<meta charset="UTF-8">
</head>
<body>
	<header>
		<h2>Welcome <?echo $username;?>!</h2> 
	</header>

</body>
</html>