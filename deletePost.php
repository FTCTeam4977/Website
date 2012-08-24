<?php
include "LoginCheck.php";
$file = $_POST['file'];
unlink($file);
header("Location:Home.php");
?>