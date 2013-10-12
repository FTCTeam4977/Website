<?php
include_once("include.php");
?>
<!DOCTYPE html>
<html>
	<head>
		<title>LANLords - Home</title>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<link href="css/bootstrap.min.css" rel="stylesheet">
		<link href="css/main.css" rel="stylesheet">
	</head>
	<body>
		<div class="navbar navbar-inverse navbar-fixed-top">
			<div class="navbar-inner">
				<div class="container">
					<a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
					</a>
					<a class="brand" href="index.php">FTC Team 4977</a>
					<div class="nav-collapse collapse">
						<ul class="nav">
							<li class="active">
								<a href="#">Home</a>
							</li>
							<li class="">
								<a href="media.html">Media</a>
							</li>
							<li>
								<a href="events.php">Events</a>
							</li>
							<li class="">
								<a href="robots.html">Robots</a>
							</li>
							<li class="">
								<a href="about-us.html">About Us</a>
							</li>
						</ul>
					</div>
				</div>
			</div>
		</div>
		<div class="container">
			<div class="row">
				<div class="span7">
					<div id="mainCarousel" class="carousel slide" data-interval="5000">
						<div class="carousel-inner">
							<div class="item">
								<img src="resources/images/slide-01.png" alt="">
								<div class="carousel-caption">
									<h1>Robots!</h1>
									<p class="lead">The Black Box in action.</p>
								</div>
							</div>
							<div class="item active">
								<img src="resources/images/slide-02.png" alt="">
								<div class="carousel-caption">
									<h1>The LANLords</h1>
									<p class="lead">Gotta love those hats!</p>
								</div>
							</div>
							<div class="item">
								<img src="resources/images/GitHubBanner.png" alt="">
								<div class="carousel-caption">
									<h1>Codes!</h1>
									<p class="lead">Check out all of our coding projects at <a href="http://github.com/FTCTeam4977">GitHub</a>.</p>
								</div>
							</div>
						</div>
						<a class="left carousel-control" href="#mainCarousel" data-slide="prev">&lsaquo;</a>
						<a class="right carousel-control" href="#mainCarousel" data-slide="next">&rsaquo;</a>
					</div>
				</div>
				<div class="span5">
					<div class="row-fluid">
						<h2>About Us</h2>
						<p class="lead">We are a Lancaster, PA based FTC team with members from Penn Manor and Hempfield.</p>
						<p><a class="btn" href="about-us.html">See who we are &raquo;</a></p>
					</div>
					<div class="row-fluid">
						<h2>Events</h2>
						<?php
						$events = Event::getUpcoming(4);
						if(count($events) < 1){ ?>
							<p>No upcoming events listed.</p>
						<?php	
						}
						else{ ?>
							<ul>
								<?php
								foreach($events as $event){ ?>
								<li><?php echo $event->getValue(EVENT_DATA_TITLE)?> - <b><?php echo $event->getDate()?></b></li>
								<?php } ?>
							</ul>
						<?php }?>
						<p>Here you can find more information about events we will be attending. </p>
						<p><a class="btn" href="events.php">View Events &raquo;</a></p>
					</div>
				</div>
			</div>
			<div class="row-fluid">
				<div class="span4" id="Media">
					<h2>Media</h2>
					<p>Here's all of our media from different competitions, events, and demonstrations that we've been to. Check out our photos from our most recent experiences at the world competition in St. Louis!</p>
					<p><a class="btn" href="media.html">View media &raquo;</a></p>
				</div>
				<div class="span4" id="Robots">
					<h2>Robots</h2>
					<p>Read about our past robots, the competitions that they played in, and their performances.</p>
					<p><a class="btn" href="robots.html">View robots &raquo;</a></p>
				</div>
				<div class="span4" id="Social">
					<h2>Social</h2>
					<p>You can find us on <a href="https://www.facebook.com/pages/LANLords-FTC-Team-4977/214602341946076">Facebook</a>, <a href="http://www.youtube.com/user/FTC4977">YouTube</a>, and <a href="http://github.com/FTCTeam4977">Github</a>.</p>
				</div>
				
			</div>
		</div>
	<div class="navbar navbar-inverse navbar-fixed-bottom">
		<div class="navbar-inner">
			<div class="container">
				<p class="muted navbar-text">&copy; LAN Lords 2013</p>
			</div>
		</div>
	</div>
		<script src="http://code.jquery.com/jquery.js"></script>
		<script src="js/bootstrap.min.js"></script>
	</body>
</html>
