<?php 
	include("../model/model.php"); 
	$ob = new Model;
	
	if(isset($_POST) && $_POST['flag'] == "addAdmin"){
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
		$date = date("Y-m-d");
		$workingpin = $_POST['workingpin'];
		$workingpin = implode(",", $workingpin);
		
		$target_dir = "../uploads/admin/";
		$target_file = $target_dir . $profile_picture;
		$uploadOk = 1;
		$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
		
		if (move_uploaded_file($_FILES["profile_picture"]["tmp_name"], $target_file)) {
			$coloum = "`name`, `mobile`, `email`, `address`, `country`, `city`, `profile_picture`, `postal`, `description`, `date`, `status`,`password`,`workingpin`";
			$data = "'".$name."','".$mobile."','".$email."','".$address."','".$country."','".$city."','".$profile_picture."','".$postal."','".$description."','".$date."','1','".$password."','".$workingpin."'";
			
			$record = $ob->commonInsert("sub_admin",$coloum,$data);
			$_SESSION['message'] = "Success";
		} else {
			$_SESSION['message'] = "Fail";
		}
		
		header("location:../admin.php");
	}else{
		header("location:../admin.php");
	}
?>