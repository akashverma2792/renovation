<?php 
	include("../model/model.php"); 
	$ob = new Model;
	
	if(isset($_POST) && $_POST['flag'] == "addAdminToProperty"){
		$property_id = $_POST['property_id'];
		$admin_ids = $_POST['admin_ids'];
		$admin_ids = implode("-,-",$admin_ids);
		$admin_ids = "-".$admin_ids."-";
		$where = "id = '".$property_id."'";

		$data = "`sub_admin` = '".$admin_ids."'";
		$record = $ob->commonUpdate("property",$data,$where);
		$_SESSION['message'] = "Success";
		
		header("location:../property.php");
	}else{
		header("location:../property.php");
	}
?>