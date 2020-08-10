<?php 
	include("../model/model.php"); 
	$ob = new Model;
	
	if(isset($_POST) && $_POST['flag'] == "addVendor"){
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
		$profile_picture = basename(time().$_FILES["profile_picture"]["name"]);
		$date = date("Y-m-d");
		
		$target_dir = "../uploads/vendors/";
		$target_file = $target_dir . $profile_picture;
		$uploadOk = 1;
		$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
		
		if (move_uploaded_file($_FILES["profile_picture"]["tmp_name"], $target_file)) {
			$coloum = "`name`, `admin_id`, `mobile`, `email`, `address`, `location`, `shop_est_time`, `profile_picture`, `payment_term`, `gst_no`, `cin_no`, `date`, `status`, `password`";
			$data = "'".$name."','".$admin_id."','".$mobile."','".$email."','".$address."','".$location."','".$shop_est_time."','".$profile_picture."','".$payment_term."','".$gst_no."','".$cin_no."','".$date."','1','".$password."'";
			
			$record = $ob->commonInsert("vendors",$coloum,$data);
			$_SESSION['message'] = "Success";
		} else {
			$_SESSION['message'] = "Fail";
		}
		
		header("location:../vendors.php");
	}else{
		header("location:../vendors.php");
	}
?>