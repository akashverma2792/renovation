<?php 
	include("../model/model.php"); 
	$ob = new Model;
	
	if(isset($_POST) && $_POST['flag'] == "addDesignEngineer"){
		$admin_id = $_POST['admin_id'];
		$name = $_POST['name'];
		$mobile = $_POST['mobile'];
		$email = $_POST['email'];
		$work_experience = $_POST['work_experience'];
		$working_since = $_POST['working_since'];
		$speciality_in = $_POST['speciality_in'];
		$queries_completed = $_POST['queries_completed'];
		$education = $_POST['education'];
		$language = $_POST['language'];
		$rating = $_POST['rating'];
		$password = $_POST['password'];
		$address = $_POST['address'];
		$address = str_replace("'","\'",$address);
		$profile_picture = basename(time().$_FILES["profile_picture"]["name"]);
		$date = date("Y-m-d");
		
		$target_dir = "../uploads/design-engineer/";
		$target_file = $target_dir . $profile_picture;
		$uploadOk = 1;
		$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
		
		if (move_uploaded_file($_FILES["profile_picture"]["tmp_name"], $target_file)) {
			$coloum = "`name`, `admin_id`, `mobile`, `email`, `address`, `work_experience`, `working_since`, `profile_picture`, `speciality_in`, `queries_completed`, `education`, `language`, `rating`, `date`, `status`,`password`";
			$data = "'".$name."','".$admin_id."','".$mobile."','".$email."','".$address."','".$work_experience."','".$working_since."','".$profile_picture."','".$speciality_in."','".$queries_completed."','".$education."','".$language."','".$rating."','".$date."','1','".$password."'";
			
			$record = $ob->commonInsert("design_engg",$coloum,$data);
			$_SESSION['message'] = "Success";
		} else {
			$_SESSION['message'] = "Fail";
		}

		if(isset($_POST['redirect']) && $_POST['redirect'] == "subAdmin"){
			header("location:../admin/design-engineer.php");
		}else{
			header("location:../design-engineer.php");
		}
	}else{
		if(isset($_POST['redirect']) && $_POST['redirect'] == "subAdmin"){
			header("location:../admin/design-engineer.php");
		}else{
			header("location:../design-engineer.php");
		}
	}
?>