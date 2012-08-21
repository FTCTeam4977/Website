<?php
$dir = "blog-files/";
$fileHandler = fopen($dir.$NewFile,"w");
$fileContent = "This is the title".chr(29)."By Benjamin Thomas".chr(29)."This is a post that I made";
fwrite($fileHandler,$fileContent);
fclose($fileHandler);
echo "done";
?>