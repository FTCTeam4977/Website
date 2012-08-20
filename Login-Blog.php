<?php
$string = "Title".chr(29)."Author".chr(29)."Date".chr(29)."Content";
$data = explode(chr(29),$string);
foreach($data as $info){
	echo "test\n".$info;
}

?>