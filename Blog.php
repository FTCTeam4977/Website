<?php
/*
$dir = scandir("blog-files/");
$dir = array_reverse($dir);
foreach($dir as $file){
	if($file != "." && $file != ".."){
		$data = file_get_contents("blog-files/".$file);
		$var = explode(";;;",$data);
		echo "<div class='title'><h2>".$var[0]."</h2></div><div class='author'><p>".$var[1]."</p></div><div class='date'>".substr($file, 0, -4gg)."</div><div class='content'><p>".$var[2]."</p></div>";
	}
}
*/
$dir = scandir("blog-files/");
foreach($dir as $file){
	echo $file;
}
?>