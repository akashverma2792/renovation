<?php 
	include("../model/model.php"); 
	$ob = new Model;
	
	if(isset($_POST) && $_POST['flag'] == "addQuickEngToProperty"){
		$admin_id = $_POST['admin_id'];
		$property_id = $_POST['property_id'];
		$quick_est_engg = $_POST['quick_est_engg'];
		$avail_date = $_POST['avail_date'];
		$timeslote = $_POST['timeslote'];
		$engineer_id_db = "";
		$inspection_date_db = "";
		$inspection_time_db = "";
		
		$where = "id = '".$property_id."'";

		$select = $ob->commonSelectWhere("property","id = '".$property_id."'","id DESC","1");
		foreach($select as $row){
			if($row['engineer_id'] != ""){ 
				$engineer_id_db = json_decode($row['engineer_id'], TRUE); 
				$engineer_id_db[$admin_id] = $quick_est_engg;
			}else{
				$engineer_id_db[$admin_id] = $quick_est_engg;
			}

			if($row['inspection_date'] != ""){ 
				$inspection_date_db = json_decode($row['inspection_date'], TRUE); 
				$inspection_date_db[$admin_id] = $avail_date;
			}else{
				$inspection_date_db[$admin_id] = $avail_date;
			}

			if($row['inspection_time'] != ""){ 
				$inspection_time_db = json_decode($row['inspection_time'], TRUE);
				$inspection_time_db[$admin_id] = $timeslote;
			}else{
				$inspection_time_db[$admin_id] = $timeslote;
			}

		}


		$data = "`engineer_id` = '".json_encode($engineer_id_db)."',`inspection_date` = '".json_encode($inspection_date_db)."',`inspection_time` = '".json_encode($inspection_time_db)."'";

		$record = $ob->commonUpdate("property",$data,$where);
		$_SESSION['message'] = "Success";
		
		header("location:../admin/quick-estimate-property.php");
	}else{
		header("location:../admin/quick-estimate-property.php");
	}
?>