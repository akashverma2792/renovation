<?php 
	include("../model/model.php"); 
	$ob = new Model;
	
	if(isset($_POST) && $_POST['flag'] == "adminProfileUpdate"){
		$id = $_POST['id'];
		$mobile = $_POST['mobile'];
		$email = $_POST['email'];
		$fname = $_POST['fname'];
		$lname = $_POST['lname'];
		$address = $_POST['address'];
		$city = $_POST['city'];
		$country = $_POST['country'];
		$postal = $_POST['postal'];
		$aboutme = $_POST['aboutme'];
		$aboutme = str_replace("'","\'",$aboutme);
		
		$data = "fname = '".$fname."',lname = '".$lname."',mobile = '".$mobile."',email = '".$email."',address = '".$address."',city = '".$city."',country = '".$country."',postal = '".$postal."',aboutme = '".$aboutme."'";
		
		$record = $ob->commonUpdate("admin",$data,"id = '".$id."'");
		$_SESSION['message'] = "Success";
		header("location:../profile.php");
	}else{
		header("location:../profile.php");
	}
?>