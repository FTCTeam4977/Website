<?php
include "LoginCheck.php";
$file = $_POST['file'];
echo $file;
unlink($file);
//header("Location:Home.php");
?>