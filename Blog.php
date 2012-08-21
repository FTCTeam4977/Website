<!DOCTYPE html>
<html>
<head>
	<title>The blog</title>
</head>
<body>
<?php
$dir = scandir("blog-files/");
$dir = array_reverse($dir);
foreach($dir as $file){
	if($file != "." && $file != ".."){
		$data = file_get_contents("blog-files/".$file);
		$var = explode(chr(29),$data);
		echo "<div class='title'><h2>".$var[0]."</h2></div><div class='author'><p>".$var[1]."</p></div><div class='date'><i>".substr($file, 0, -4)."</i></div><div class='content'><p>".$var[2]."</p></div>";
	}
}
?>
<body>
</html>