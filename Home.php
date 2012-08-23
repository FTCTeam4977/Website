<?php
include "LoginCheck.php";
?>
<!DOCTYPE html>
<html>
<head>
	<title>Home</title>
	<meta charset="UTF-8">
	<script>
	function checkAddPost(){
		x = document.forms['addPost']['title'].value;
		y = document.forms['addPost']['content'].value;
		if(x == "" || x == null){
			if(y == "" || y == null){
				alert("Please fill out:\ntitle\ncontent");
				return false;
			}
			else{
				alert("Please fill out:\ntitle");
				return false;
			}
		}
		if(y == "" || y == null){
			alert("Please fill out:\ncontent");
			return false;
		}
	}
	</script>
</head>
<body>
	
	<h2>Hello <?echo $user;?></h2>
	<a href="logout.php">Logout here</a>
	<a href="Blog.php">View Blog</a>
	<div id="newPost">
		<p>To added a post, enter the info here</p>
		<form name="addPost" method="post" action="newPost.php" onsubmit="return checkAddPost()">
		<input type="text" name="title" placeholder="Title">
		<input type="text" name="content" placeholder="Content">
		<input type="hidden" name="author" value="<?echo $user;?>">
		<input type="submit">
		</form>
	</div>
</body>
</html>