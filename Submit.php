<?php
$dir = "blog-files/";
$NewFile = date("F j, Y, g:i a").".txt";
$fileHandler = fopen($dir.$NewFile,"w");
echo $fileHandler;
$fileContent = "This is the title".chr(29)."By Benjamin Thomas".chr(29)."This is a post that I made";
echo "\n".$fileContent;
fwrite($fileHandler,$fileContent);
echo "writen";
fclose($fileHandler);
echo "done";
?>