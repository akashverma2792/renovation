<?php 
	include("../model/model.php"); 
	$ob = new Model;
	
	if(isset($_POST) && $_POST['flag'] == "updateDesignEngineer"){
		$id = $_POST['id'];
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
		$where = "id = '".$id."'";
		
		if(isset($_FILES["profile_picture"]["name"]) && $_FILES["profile_picture"]["name"] != ""){
			$profile_picture = basename(time().$_FILES["profile_picture"]["name"]);
		
			$target_dir = "../uploads/design-engineer/";
			$target_file = $target_dir . $profile_picture;
			$uploadOk = 1;
			$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
			
			if (move_uploaded_file($_FILES["profile_picture"]["tmp_name"], $target_file)) {
				
				$data = "`name` = '".$name."',`mobile` = '".$mobile."',`email` = '".$email."',`address` = '".$address."',`work_experience` = '".$work_experience."',`working_since` = '".$working_since."',`profile_picture` = '".$profile_picture."',`speciality_in` = '".$speciality_in."',`queries_completed` = '".$queries_completed."',`education` = '".$education."',`language` = '".$language."',`rating` = '".$rating."',`password` = '".$password."',`admin_id` = '".$admin_id."'";
				
				$record = $ob->commonUpdate("design_engg",$data,$where);
				$_SESSION['message'] = "Success";
			} else {
				$_SESSION['message'] = "Fail";
			}
		}else{
			$data = "`name` = '".$name."',`mobile` = '".$mobile."',`email` = '".$email."',`address` = '".$address."',`work_experience` = '".$work_experience."',`working_since` = '".$working_since."',`speciality_in` = '".$speciality_in."',`queries_completed` = '".$queries_completed."',`education` = '".$education."',`language` = '".$language."',`rating` = '".$rating."',`password` = '".$password."',`admin_id` = '".$admin_id."'";
				
			$record = $ob->commonUpdate("design_engg",$data,$where);
			$_SESSION['message'] = "Success";
		}
		
		if(isset($_POST['redirect']) && $_POST['redirect'] == "design"){
			header("location:../design-engineer/profile.php");
		}elseif(isset($_POST['redirect']) && $_POST['redirect'] == "subAdmin"){
			header("location:../admin/design-engineer.php");
		}else{
			header("location:../design-engineer.php");
		}
	}else{
		if(isset($_POST['redirect']) && $_POST['redirect'] == "design"){
			header("location:../design-engineer/profile.php");
		}elseif(isset($_POST['redirect']) && $_POST['redirect'] == "subAdmin"){
			header("location:../admin/design-engineer.php");
		}else{
			header("location:../design-engineer.php");
		}
	}
?>