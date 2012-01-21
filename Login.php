<?php
$user = $_POST["user"];
$password = $_POST["password"];

if ( empty($user) || empty($password) )
	header("Location: Blog-Login.html?error=1");
?>

<html>
<body>

Your User name is <?php echo $user; ?>!<br />
Your password is <?php echo $password; ?>

</body>
</html>