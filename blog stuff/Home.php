<?php
include "LoginCheck.php";
?>
<!DOCTYPE html>
<html>
<head>
	<title>Home - <?echo $user;?></title>
	<meta charset="UTF-8">
	<script src="jquery.js"></script>
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
	
	$(document).ready(function(){
		$("#changePasswd").hide();
		$("#ChangeLink").click(function(){
			$("#changePasswd").slideToggle();
		});
	});
	</script>
</head>
<body>
	
	<h2>Hello <?echo $user." level:".$_SESSION['level'];?></h2>
	<a href="Logout.php">Logout here</a>
	<a href="Blog.php">View Blog</a>
	<a id="changeLink" href="">change password</a>
	<div id="changePasswd">
		<form id="changePasswdForm">
			<input type="text" placeholder="old password">
			<input type="text" placeholder="new password">
			<input type="text" placeholder="new password">
		</form>
	</div>
	<div id="newPost">
		<p>To added a post, enter the info here</p>
		<form name="addPost" method="post" action="newPost.php" onsubmit="return checkAddPost()">
		<input type="text" name="title" placeholder="Title">
		<input type="text" name="content" placeholder="Content">
		<input type="hidden" name="author" value="<?echo $user;?>">
		<input type="submit">
		</form>
		<table>
			<tr>
				<td>Date</td><td>Author</td><td>Title</td><td>Content</td><td>delete</td>
			<tr>
				<?
				$dir = scandir("blog-files/");
				$dir = array_reverse($dir);
				foreach($dir as $file){
					if($file != ".." && $file != "."){
						$data = file_get_contents("blog-files/".$file);
						$var = explode(chr(29),$data);
						echo "<tr><td>".substr($file, 0, -4)."</td><td>".$var[1]."</td><td>".$var[0]."</td><td>".$var[2]."</td><td><form method='post' name='delete' action='deletePost.php'><input name='file' type='hidden' value='".$file."'><input type='submit' name='delete_".substr($file, 0, -4)."'></form></td></tr>";
					}
				}
				?>
			</tr>
		</table>
	</div>
</body>
</html>