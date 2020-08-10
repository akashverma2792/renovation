<?php ob_start(); session_start();
	if(isset($_SESSION) && !empty($_SESSION['subAdminLoginSess']) && $_SESSION['subAdminLoginSess']['email'] != ""){
		if(isset($_GET['id']) && $_GET['id'] != ""){
			
			$id = $_GET['id'];
			$red = $_GET['red'];
			$db = $_GET['db'];
			
			include("../model/model.php"); 
			$ob = new Model;
			$record = $ob->commonDelete($db,"id = '".$id."'");
			header("location:$red.php");
			
		}else{
			header("location:logout.php");
		}
	}else{
		header("location:logout.php");
	}
?>