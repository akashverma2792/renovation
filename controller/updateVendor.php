<?php 
	include("../model/model.php"); 
	$ob = new Model;
	
	if(isset($_POST) && $_POST['flag'] == "updateVendor"){
		$id = $_POST['id'];
		$admin_id = $_POST['admin_id'];
		$name = $_POST['name'];
		$mobile = $_POST['mobile'];
		$email = $_POST['email'];
		$location = $_POST['location'];
		$shop_est_time = $_POST['shop_est_time'];
		$payment_term = $_POST['payment_term'];
		$gst_no = $_POST['gst_no'];
		$cin_no = $_POST['cin_no'];
		$password = $_POST['password'];
		$address = $_POST['address'];
		$address = str_replace("'","\'",$address);
		$where = "id = '".$id."'";
		
		if(isset($_FILES["profile_picture"]["name"]) && $_FILES["profile_picture"]["name"] != ""){
			$profile_picture = basename(time().$_FILES["profile_picture"]["name"]);
		
			$target_dir = "../uploads/vendors/";
			$target_file = $target_dir . $profile_picture;
			$uploadOk = 1;
			$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
			
			if (move_uploaded_file($_FILES["profile_picture"]["tmp_name"], $target_file)) {
				
				$data = "`name` = '".$name."',`mobile` = '".$mobile."',`email` = '".$email."',`address` = '".$address."',`location` = '".$location."',`shop_est_time` = '".$shop_est_time."',`profile_picture` = '".$profile_picture."',`payment_term` = '".$payment_term."',`gst_no` = '".$gst_no."',`cin_no` = '".$cin_no."',`password` = '".$password."',`admin_id` = '".$admin_id."'";
				
				$record = $ob->commonUpdate("vendors",$data,$where);
				$_SESSION['message'] = "Success";
			} else {
				$_SESSION['message'] = "Fail";
			}
		}else{
			$data = "`name` = '".$name."',`mobile` = '".$mobile."',`email` = '".$email."',`address` = '".$address."',`location` = '".$location."',`shop_est_time` = '".$shop_est_time."',`payment_term` = '".$payment_term."',`gst_no` = '".$gst_no."',`cin_no` = '".$cin_no."',`password` = '".$password."',`admin_id` = '".$admin_id."'";
				
			$record = $ob->commonUpdate("vendors",$data,$where);
			$_SESSION['message'] = "Success";
		}
		
		if(isset($_POST['redirect']) && $_POST['redirect'] == "vendor"){
			header("location:../vendors/profile.php");
		}else{
			header("location:../vendors.php");
		}
	}else{
		if(isset($_POST['redirect']) && $_POST['redirect'] == "design"){
			header("location:../vendors/profile.php");
		}else{
			header("location:../vendors.php");
		}
	}
?>