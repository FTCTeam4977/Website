
<html>
<head>
	<!-- Basic Page Needs
  ================================================== -->
	<meta charset="utf-8">
	<title>LAN Lords - FTC 4977</title>
	<meta name="google-site-verification" content="HmLyK5rteHP_iEO6ujBozCudy67jNfxgcbbydDGrip4" />
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
	<link href='http://fonts.googleapis.com/css?family=Niconne' rel='stylesheet' type='text/css'>
	<link rel="stylesheet" href="stylesheets/base.css">
	<link rel="stylesheet" href="stylesheets/skeleton.css">
	<link rel="stylesheet" href="stylesheets/layout.css">
	

	<!-- Favicons
	================================================== -->
	<link rel="shortcut icon" href="images/favicon.ico">
	<link rel="apple-touch-icon" href="images/apple-touch-icon.png">
	<link rel="apple-touch-icon" sizes="72x72" href="images/apple-touch-icon-72x72.png">
	<link rel="apple-touch-icon" sizes="114x114" href="images/apple-touch-icon-114x114.png">
	
	<!-- php
	================================================= -->
	<script type="text/javascript" >
	function validateForm()
	{
	var x=document.forms["myForm"]["user"].value;
	var y=document.forms["myForm"]["password"].value;
	if (x==null || x=="")
		{
		if(y==null || y =="")
			{
	  		alert("Username and Password must be filled out");
	  		return false;
			}
		else
			{
			alert("Username must be filled out");
  			return false;		
			}
		}
	if(y==null || y =="")
		{
		alert("Password must be filled out");
  		return false;
		}
	}
	</script>
	<?	
	if($_GET["error"] == 1)
	{
	?>
	<script type="text/javascript">
		alert("Error! Please enter a valid username and/or password");
	</script>
	<?
	}
	?>
</head>
<body>
<div class="cantainer">
	<div calss="sixteen columns">
		<center>
		<h2>Hello!</h2>
			 <h4>If you got to this page by mistake, click <a href="www.team4977.org">here</a></h4>
			<? echo $error; ?>
		<form name="myForm" action="Database.php" method="post" onSubmit="return validateForm()">
			Username: <input type= "text" name="user"><br>
			Password: <input type= "password" name="password">
			<input type="submit">
		</form>
		</center>
	</div>	
</div>	
</body>	
</html>