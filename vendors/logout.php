<?php 
	session_start();
	session_destroy();
	header("location:../team-login.php");
	exit();
?>