<?php 
	include("../model/model.php"); 
	$ob = new Model;
	
	if(isset($_POST) && $_POST['flag'] == "updateAdmin"){
		$id = $_POST['id'];
		$name = $_POST['name'];
		$mobile = $_POST['mobile'];
		$email = $_POST['email'];
		$country = $_POST['country'];
		$city = $_POST['city'];
		$postal = $_POST['postal'];
		$description = $_POST['description'];
		$description = str_replace("'","\'",$description);
		$password = $_POST['password'];
		$address = $_POST['address'];
		$address = str_replace("'","\'",$address);
		$profile_picture = basename(time().$_FILES["profile_picture"]["name"]);
		$where = "id = '".$id."'";
		$workingpin = $_POST['workingpin'];
		$workingpin = implode(",", $workingpin);
		
		if(isset($_FILES["profile_picture"]["name"]) && $_FILES["profile_picture"]["name"] != ""){
			$profile_picture = basename(time().$_FILES["profile_picture"]["name"]);
		
			$target_dir = "../uploads/admin/";
			$target_file = $target_dir . $profile_picture;
			$uploadOk = 1;
			$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
			
			if (move_uploaded_file($_FILES["profile_picture"]["tmp_name"], $target_file)) {
				
				$data = "`name` = '".$name."',`mobile` = '".$mobile."',`email` = '".$email."',`address` = '".$address."',`country` = '".$country."',`city` = '".$city."',`profile_picture` = '".$profile_picture."',`postal` = '".$postal."',`description` = '".$description."',`password` = '".$password."',`workingpin` = '".$workingpin."'";
				
				$record = $ob->commonUpdate("sub_admin",$data,$where);
				$_SESSION['message'] = "Success";
			} else {
				$_SESSION['message'] = "Fail";
			}
		}else{
			$data = "`name` = '".$name."',`mobile` = '".$mobile."',`email` = '".$email."',`address` = '".$address."',`country` = '".$country."',`city` = '".$city."',`postal` = '".$postal."',`description` = '".$description."',`password` = '".$password."',`workingpin` = '".$workingpin."'";
				
			$record = $ob->commonUpdate("sub_admin",$data,$where);
			$_SESSION['message'] = "Success";
		}
		
		if(isset($_POST['redirect']) && $_POST['redirect'] == "subadmin"){
			header("location:../admin/profile.php");
		}else{
			header("location:../admin.php");
		}
	}else{
		if(isset($_POST['redirect']) && $_POST['redirect'] == "subadmin"){
			header("location:../admin/profile.php");
		}else{
			header("location:../admin.php");
		}
	}
?>