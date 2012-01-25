<!DOCTYPE html>
<!--[if lt IE 7 ]><html class="ie ie6" lang="en"> <![endif]-->
<!--[if IE 7 ]><html class="ie ie7" lang="en"> <![endif]-->
<!--[if IE 8 ]><html class="ie ie8" lang="en"> <![endif]-->
<!--[if (gte IE 9)|!(IE)]><!--><html lang="en"> <!--<![endif]-->
<head>
	<!-- Basic Page Needs
  ================================================== -->
	<meta charset="utf-8">
	<title>LAN Lords - FTC 4977</title>
	<meta name="description" content="">
	<meta name="author" content="">
	<!--[if lt IE 9]>
		<script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
	<![endif]-->

	<!-- Mobile Specific Metas
  ================================================== -->
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

	<!-- CSS
  ================================================== -->
	<link rel="stylesheet" href="stylesheets/base.css">
	<link rel="stylesheet" href="stylesheets/skeleton.css">
	<link rel="stylesheet" href="stylesheets/layout.css">

</head>
<body>
	 Error check: should return the title, the date, the content, and the author.<br>
	<?php
	date_default_timezone_set('US/Eastern');
	$title=$_POST['title'];
	$date= date("l, F j, Y h:i:s A");
	$content=$_POST['content'];
	$author=$_POST['Author'];
	echo $title , "<br>" , $date , "<br>",  $content, "<br>", $author ,"<br>";
	if($con = mysql_connect("blthomas.db.8663266.hostedresource.com","blthomas","Zoebug202"))
		echo "connected to sql server <br> ";
	
	if(mysql_select_db("blthomas", $con))
		echo "selected blog<br>";
	
	$addPost= "INSERT INTO post (Title, TheDate, Content, Author) VALUES ('$title', '$date', '$content', '$author')";
	
	if(mysql_query($addPost, $con))
		echo "added post<br>";
	
	mysql_close($con);
	?>
	
	to view click <a href="Blog.php"> here</a><br>
	note well be logged out. 
</body>
</html>