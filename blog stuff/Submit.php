<?php
include "LoginCheck.php";
$dir = "blog-files/";
$NewFile = date("F j, Y, g:i a").".txt";
$fileHandler = fopen($dir.$NewFile,"w");
$fileContent = "This is the title".chr(29)."By Benjamin Thomas".chr(29)."This is another post that I made";
fwrite($fileHandler,$fileContent);
fclose($fileHandler);
?>