<?php
	if($_POST["dir"]){
		$dirs = scandir($_POST["dir"]);
		echo realpath($_POST["dir"]).chr(29);
		foreach($dirs as $file){
			if($file != ".." && $file != ".")
				echo chr(28).$file;
		}
		
	}
	else{
		echo "!ERROR! dir was equal to ".$_POST["dir"].";";
	}
?>