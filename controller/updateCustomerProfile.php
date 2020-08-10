<?php 
	include("../model/model.php"); 
	$ob = new Model;
	
	if(isset($_POST) && $_POST['flag'] == "updateCustomerProfile"){
		$id = $_POST['id'];
		$name = $_POST['name'];
		$mobile = $_POST['mobile'];
		$email = $_POST['email'];
		$password = $_POST['password'];
		$address = $_POST['address'];
		$address = str_replace("'","\'",$address);
		$where = "id = '".$id."'";

		$check = $ob->commonSelectWhere("`client`","`id` != '".$id."' AND (`mobile` = '".$mobile."' OR `email` = '".$email."')","id DESC","1");
		if($check->rowCount() > 0){
			foreach($check as $chrow){
				$chmobile = $chrow['mobile'];
				$chemail = $chrow['email'];
			}
			if($chmobile == $mobile){
				$_SESSION['checkData'] = "Entered mobile number is already registered with us.";
			}else{
				$_SESSION['checkData'] = "Entered email is already registered with us.";
			}
		}else{
			if(isset($_FILES["profile_picture"]["name"]) && $_FILES["profile_picture"]["name"] != ""){
				$profile_picture = basename(time().$_FILES["profile_picture"]["name"]);
			
				$target_dir = "../uploads/customer/";
				$target_file = $target_dir . $profile_picture;
				$uploadOk = 1;
				$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
				
				if (move_uploaded_file($_FILES["profile_picture"]["tmp_name"], $target_file)) {
					
					$data = "`name` = '".$name."',`mobile` = '".$mobile."',`email` = '".$email."',`address` = '".$address."',`profile_picture` = '".$profile_picture."',`password` = '".$password."'";
					
					$record = $ob->commonUpdate("client",$data,$where);
					$_SESSION['message'] = "Success";
				} else {
					$_SESSION['message'] = "Fail";
				}
			}else{
				$data = "`name` = '".$name."',`mobile` = '".$mobile."',`email` = '".$email."',`address` = '".$address."',`password` = '".$password."'";
					
				$record = $ob->commonUpdate("client",$data,$where);
				$_SESSION['message'] = "Success";
			}
		}
		
		if(isset($_POST['redirect']) && $_POST['redirect'] == "customer"){
			header("location:../customer/profile.php");
		}else{
			header("location:../index.php");
		}
	}else{
		if(isset($_POST['redirect']) && $_POST['redirect'] == "customer"){
			header("location:../customer/profile.php");
		}else{
			header("location:../index.php");
		}
	}
?>