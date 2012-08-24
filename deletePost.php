<?php
include "LoginCheck.php";
$file = $_POST['file'];
unlink("blog-files/".$file);
header("Location:Home.php");
?>