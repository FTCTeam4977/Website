<?php
session_start();
$isLoggedIn = $_SESSION['isLoggedIn'];
$username = $_SESSION['username'];
if($isLoggedIn)
	header("Location: Home.php");
?>
<!DOCTYPE html>
<html>
<head>
	<title>Login</title>
	<meta charset="UTF-8">
	<script>
		function checkLogin(){
			x = document.forms['login']['user'].value;
			y = document.forms['login']['passwd'].value;
			if(x == "" || x == null){
				if(y == "" || y == null){
					alert("Please fill out:\nusername\npassword");
					return false;
				}
				else{
					alert("Please fill out:\nusername");
					return false;
				}
			}
			if(y == "" || y == null){
				alert("Please fill out:\npassword");
				return false;
			}
		}
	</script>
</head>
<body>
	<header>
		
	</header>
	<section>
		<div id="loginArea">
			<form name="login" method="post" action="validate.php" onsubmit="return checkLogin()">
				<input name="user" placeholder="username" type="text">
				<input name="passwd" placeholder="password" type="password">
				<input type="submit">
			</form>
		</div>
	</section>
</body>
</html>