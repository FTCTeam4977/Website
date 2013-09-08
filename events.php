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
					<a type="button" class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
					</a>
					<a class="brand" href="../index.html">FTC Team 4977</a>
					<div class="nav-collapse collapse">
						<ul class="nav">
							<li>
								<a href="index.html">Home</a>
							</li>
							<li class="">
								<a href="media.html">Media</a>
							</li>
							<li class="active">
								<a href="#">Events</a>
							</li>
							<li class="">
								<a href="robots.html">Robots</a>
							</li>
							<li class="">
								<a href="about-us.php">About Us</a>
							</li>
						</ul>
					</div>
				</div>
			</div>
		</div>
		<div class="container">
			<?php
			$events = Event::getAll();
			foreach($events as $event){?>
				<div class="media">
					<div class="media-body">
						<h2 class="media-heading">
							<?php echo $event->getValue(EVENT_DATA_TITLE)?>
							<span class="label <?php
							 switch($event->getValue(EVENT_DATA_STATUS)){
								 case EVENT_STATUS_NEW:
								 $class = "label-info";
								 break;
								 case EVENT_STATUS_CURRENT:
								 $class = "label-success";
								 break;
								 default:
								 $class = "";
								 break;
							 }
							 echo $class;
							 ?>"><?php echo $event->getStatus(EVENT_DATA_TITLE)?></span>
						</h2>
						<address>
							<b><?php echo $event->getDate()?></b><br>
							Starts: <i><?php echo $event->getValue(EVENT_DATA_START)?></i>
							Ends: <i><?php echo $event->getValue(EVENT_DATA_END)?></i><br>
							Location: <i><?php echo $event->getValue(EVENT_DATA_LOCATION)?></i>
						</address>
						<p class="lead"><?php echo $event->getValue(EVENT_DATA_INFO)?></p>
					</div>
				</div>
			<?php } ?>
			
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

