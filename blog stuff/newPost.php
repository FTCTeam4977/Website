<?
include "LoginCheck.php";
if($_POST["title"] == "" || $_POST["title"] == null)
	die();
if($_POST["content"] == "" || $_POST["content"] == null)
	die();
$NewFile = date("n j, Y, g:i a").".txt";
$dir = "./blog-files/";
$fileHandler = fopen($dir.$NewFile,"w");
// echo "title:".$_POST["title"]."<br />author:".$_SESSION["user"]."<br />content:".$_POST["content"]."<br />";
$fileContent = $_POST["title"].chr(29)."By ".$_SESSION["user"].chr(29).$_POST["content"]; 
fwrite($fileHandler,$fileContent);
fclose($fileHandler);
header("location: Home.php");
?>