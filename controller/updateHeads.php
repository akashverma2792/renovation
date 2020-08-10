<?php 
	include("../model/model.php"); 
	$ob = new Model;
	
	if(isset($_POST) && $_POST['flag'] == "updateHeads"){
		$id = $_POST['id'];
		$admin_ids = $_POST['admin_ids'];
		$name = $_POST['name'];
		$description = $_POST['description'];
		$description = str_replace("'","\'",$description);
		$head_picture = basename(time().$_FILES["head_picture"]["name"]);
		$date = date("Y-m-d");
		$admin_ids = implode("-,-",$admin_ids);
		$admin_ids = "-".$admin_ids."-";
		$where = "id = '".$id."'";

		if(isset($_FILES["head_picture"]["name"]) && $_FILES["head_picture"]["name"] != ""){

			$target_dir = "../uploads/heads/";
			$target_file = $target_dir . $head_picture;
			$uploadOk = 1;
			$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

			if (move_uploaded_file($_FILES["head_picture"]["tmp_name"], $target_file)) {
				$data = "`name` = '".$name."',`description` = '".$description."',`head_picture` = '".$head_picture."',`admin_ids` = '".$admin_ids."'";
				
				$record = $ob->commonUpdate("heads",$data,$where);
				$_SESSION['message'] = "Success";
			} else {
				$_SESSION['message'] = "Fail";
			}

		}else{
			$data = "`name` = '".$name."',`description` = '".$description."',`admin_ids` = '".$admin_ids."'";
			
			$record = $ob->commonUpdate("heads",$data,$where);
			$_SESSION['message'] = "Success";
		}
		
		
		
		header("location:../head.php");
	}else{
		header("location:../head.php");
	}
?>