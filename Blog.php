<?php
$dir = scandir("blog-files/");
foreach($dir as $file){
	if($file != "." && $file != ".."){
		$data = file_get_contents("blog-files/".$file);
		$var = explode(";;;",$data);
		echo "<div class='title'><h2>".$var[0]."</h2></div><div class='author'>".$var[1]."</div>";
	}
}	

?>