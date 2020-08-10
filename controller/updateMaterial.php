<?php 
	include("../model/model.php"); 
	$ob = new Model;
	
	if(isset($_POST) && $_POST['flag'] == "updateMaterial"){
		$id = $_POST['id'];
		$vendor_id = $_POST['vendor_id'];
		$name = $_POST['name'];
		$company_name = $_POST['company_name'];
		$measur_unit = $_POST['measur_unit'];
		$measur_qty = $_POST['measur_qty'];
		$cost_per_unit = $_POST['cost_per_unit'];
		$description = $_POST['description'];
		$description = str_replace("'","\'",$description);
		$product_image = basename(time().$_FILES["product_image"]["name"]);
		$date = date("Y-m-d");
		$where = "id = '".$id."' AND vendor_id = '".$vendor_id."'";
		
		if(isset($_FILES["product_image"]["name"]) && $_FILES["product_image"]["name"] != ""){
			$product_image = basename(time().$_FILES["product_image"]["name"]);
		
			$target_dir = "../uploads/material/";
			$target_file = $target_dir . $product_image;
			$uploadOk = 1;
			$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
			
			if (move_uploaded_file($_FILES["product_image"]["tmp_name"], $target_file)) {
				
				$data = "`name` = '".$name."',`product_image` = '".$product_image."',`company_name` = '".$company_name."',`description` = '".$description."',`measur_unit` = '".$measur_unit."',`cost_per_unit` = '".$cost_per_unit."',`measur_qty` = '".$measur_qty."'";
				
				$record = $ob->commonUpdate("material",$data,$where);
				$_SESSION['message'] = "Success";
			} else {
				$_SESSION['message'] = "Fail";
			}
		}else{
			$data = "`name` = '".$name."',`company_name` = '".$company_name."',`description` = '".$description."',`measur_unit` = '".$measur_unit."',`cost_per_unit` = '".$cost_per_unit."',`measur_qty` = '".$measur_qty."'";
				
			$record = $ob->commonUpdate("material",$data,$where);
			$_SESSION['message'] = "Success";
		}
		header("location:../vendors/material-section.php");
	}else{
		header("location:../vendors/material-section.php");
	}
?>