<?php 
	include("../model/model.php"); 
	$ob = new Model;
	
	if(isset($_POST) && $_POST['flag'] == "addHeadsSubCategory"){
		$admin_ids = $_POST['admin_ids'];
		$head_id = $_POST['head_id'];
		$head_cat_id = $_POST['head_cat_id'];
		$name = $_POST['name'];
		$measur_unit = $_POST['measur_unit'];
		$description = $_POST['description'];
		$description = str_replace("'","\'",$description);
		$head_picture = basename(time().$_FILES["head_picture"]["name"]);
		$date = date("Y-m-d");
		$admin_ids = implode("-,-",$admin_ids);
		$admin_ids = "-".$admin_ids."-";

		if(isset($_FILES["head_picture"]["name"]) && $_FILES["head_picture"]["name"] != ""){

			$target_dir = "../uploads/heads-sub-cat/";
			$target_file = $target_dir . $head_picture;
			$uploadOk = 1;
			$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

			if (move_uploaded_file($_FILES["head_picture"]["tmp_name"], $target_file)) {
				$coloum = "`head_id`,`head_cat_id`,`name`, `description`, `head_picture`, `date`, `status`, `admin_ids`,`measur_unit`";
				$data = "'".$head_id."','".$head_cat_id."','".$name."','".$description."','".$head_picture."','".$date."','1','".$admin_ids."','".$measur_unit."'";
			
				$record = $ob->commonInsert("heads_sub_category",$coloum,$data);
				$_SESSION['message'] = "Success";
			} else {
				$_SESSION['message'] = "Fail";
			}

		}else{
			$coloum = "`head_id`,`head_cat_id`,`name`, `description`, `date`, `status`, `admin_ids`,`measur_unit`";
			$data = "'".$head_id."','".$head_cat_id."','".$name."','".$description."','".$date."','1','".$admin_ids."','".$measur_unit."'";
			
			$record = $ob->commonInsert("heads_sub_category",$coloum,$data);
			$_SESSION['message'] = "Success";
		}
		
		
		
		header("location:../heads-sub-category.php");
	}else{
		header("location:../heads-sub-category.php");
	}
?>