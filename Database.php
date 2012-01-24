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
<!DOCTYPE html>
<!--[if lt IE 7 ]><html class="ie ie6" lang="en"> <![endif]-->
<!--[if IE 7 ]><html class="ie ie7" lang="en"> <![endif]-->
<!--[if IE 8 ]><html class="ie ie8" lang="en"> <![endif]-->
<!--[if (gte IE 9)|!(IE)]><!--><html lang="en"> <!--<![endif]-->
<head>
	<!-- Basic Page Needs
  ================================================== -->
	<meta charset="utf-8">
	<title>Edit Blog <?echo $username?></title>
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
	<link rel="stylesheet" href="stylesheets/custom.css">

	<!-- Favicons
	================================================== -->
	<link rel="shortcut icon" href="images/favicon.ico">
	<link rel="apple-touch-icon" href="images/apple-touch-icon.png">
	<link rel="apple-touch-icon" sizes="72x72" href="images/apple-touch-icon-72x72.png">
	<link rel="apple-touch-icon" sizes="114x114" href="images/apple-touch-icon-114x114.png">
<STYLE>
<!--
A{text-decoration:none}

-->
</STYLE>
</head>
<body>



	<!-- Primary Page Layout
	================================================== -->

	<!-- Delete everything in this .container and get started on your own site! -->

	<div class="container">
		<div id= "Banner" class="Banner columns">
			<h1 class="remove-bottom" style="margin-top: 40px"><img  width= 20% src="NewLogo1.png"/><img width= 25% align="right" src="first.gif"> </h1>
			<br>
			<ul class="tabs">
				<li><a href="index.html">Home</a></li>
				<li><a href="Media.html">Media</a></li>
				<li><a href="Biographies.html">Biographies</a></li>
				<li><a href="Tutorials.html">Tutorials</a></li>
				<li><a class="active" href="Blog.html">Blog</a></li>
			</ul>
		</div>
		<div class="sixteen columns">
		<div id="bumpDown">
			<center>
				<form action="test.php" method="post">
				<h1>Welcome Back <?echo $username ?>!</h1>
				<p>To post something to the blog, first add the title.</p>
				<TEXTAREA Name="title"></TEXTAREA>
				<p>Then add your content here.</p>
				<TEXTAREA Name="content"></TEXTAREA>
				<p>Finally, choose the Author.</p>
				<select Name="Author">
				  <option>Andrew Lobos</option>
				  <option>Collin Enders</option>
				  <option>Ben Thomas</option>
				  <option>Anonymous</option>
				</select>
				<input type="submit">
				</form>	
			</center>
		<!-- container -->
		<hr>
			

	
		<center>
			
		<p><pre>     	  More information about <a href="http://usfirst.org"target="_blank">FIRST</a> at <a href="http://usfirst.org"target="_blank">usfirst.org</a>		</pre>

<a href="http://youtube.com/user/FTC4977"target="_blank">
<img src="Youtube.png" alt="Youtube" align="right" width="64" height="64" />
</a>

<a href="http://www.facebook.com/pages/FTC-Team-4977/214602341946076"target="_blank">
<img src="facebook icon.png" alt="Facebook" align="right" width="64" height="64" />
</a>

		</p>
	</center>
	

	<br><br><br>
		</div>
		</div>
	</div>	
		

	<!-- JS
	================================================== -->
	<script src="http://code.jquery.com/jquery-1.6.4.min.js"></script>
	<script src="javascripts/tabs.js"></script>

<!-- End Document
================================================== -->
</body>
</html>

