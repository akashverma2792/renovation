<?php 
	include("../model/model.php"); 
	$ob = new Model;
	
	if(isset($_POST) && $_POST['flag'] == "addMaterial"){
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
		
		$target_dir = "../uploads/material/";
		$target_file = $target_dir . $product_image;
		$uploadOk = 1;
		$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
		
		if (move_uploaded_file($_FILES["product_image"]["tmp_name"], $target_file)) {
			$coloum = "`vendor_id`, `name`, `product_image`, `company_name`, `description`, `measur_unit`, `measur_qty`, `cost_per_unit`, `date`, `status`";
			$data = "'".$vendor_id."','".$name."','".$product_image."','".$company_name."','".$description."','".$measur_unit."','".$measur_qty."','".$cost_per_unit."','".$date."','1'";
			
			$record = $ob->commonInsert("material",$coloum,$data);
			$_SESSION['message'] = "Success";
		} else {
			$_SESSION['message'] = "Fail";
		}
		
		header("location:../vendors/material-section.php");
	}else{
		header("location:../vendors/material-section.php");
	}
?>