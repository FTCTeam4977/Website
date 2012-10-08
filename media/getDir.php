<?php
	if($_POST["dir"]){
		$dirs = scandir($_POST["dir"]);
		echo realpath($_POST["dir"]).chr(29);
		foreach($dirs as $file){
			if($file != ".." && $file != "."){
				$name = explode("." , $file);
				if($name[1] == "")
					echo "<a onclick=\"GetDirContent('".$file."')\">".$file."</a> ";
				else if($name[1] == "png" || $name[1] == "jpg" || $name[1] == "gif")
 				 	echo "<a onclick=\"".$file."\">".$file."</a> ";
			}
		}
		
	}
	else{
		echo "!ERROR! dir was equal to ".$_POST["dir"].";";
	}
?>