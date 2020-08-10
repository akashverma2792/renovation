<?php 
	include("../model/model.php"); 
	$ob = new Model;
	
	if(isset($_POST) && $_POST['flag'] == "property_query" && $_POST['savenow'] == "Submit Now !"){
		$customer_id = $_POST['customer_id'];
		$property_own = $_POST['property_own'];
		$property_flore = $_POST['property_flore'];
		$floor_num = $_POST['floor_num'];
		$avail_date = $_POST['avail_date'];
		$location = $_POST['location'];
		$city = $_POST['city'];
		$pincode = $_POST['pincode'];
		$location = str_replace("'","\'",$location);
		$expect_time = $_POST['expect_time'];
		$blueprint = basename(time().$_FILES["blueprint"]["name"]);
		$date = date("Y-m-d");

		for($i=1;$i<=count($floor_num);$i++){
			$spac[$i] = $_POST['property_size_'.$i];
		}

		if(isset($_FILES["blueprint"]["name"]) && $_FILES["blueprint"]["name"] != ""){

			$target_dir = "../uploads/property_blueprint/";
			$target_file = $target_dir . $blueprint;
			$uploadOk = 1;
			$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

			if (move_uploaded_file($_FILES["blueprint"]["tmp_name"], $target_file)) {
				$coloum = "`property_id`, `customer_id`, `city`, `property_size`, `number_of_flores`, `property_blueprint`, `project_phase`, `inspection_date`, `pincode`, `list_of_space`, `property_own`, `location`, `expect_time`, `date`, `status`";

				$data = "'".time()."','".$customer_id."','".$city."','".json_encode($spac)."','".$property_flore."','".$blueprint."','1','".$avail_date."','".$pincode."','".json_encode($spac)."','".$property_own."','".$location."','".$expect_time."','".$date."','1'";
			
				$prop_id = $ob->commonInsert("property",$coloum,$data);

				for($i=1;$i<=count($spac);$i++){
					for($j=1;$j<=explode(" ", $spac[$i])[0];$j++){
						$coloumSecond = "`customer_id`, `property_id`, `floor_num`, `property_name`, `date`, `status`";
						$dataSecond = "'".$customer_id."','".$prop_id."','".$i."','Room ".$j."','".$date."','1'";
						$ob->commonInsert("property_details",$coloumSecond,$dataSecond);
					}
					$coloumSecond = "`customer_id`, `property_id`, `floor_num`, `property_name`, `date`, `status`";
					$dataSecond = "'".$customer_id."','".$prop_id."','".$i."','Hall','".$date."','1'";
					$ob->commonInsert("property_details",$coloumSecond,$dataSecond);

					$coloumSecond = "`customer_id`, `property_id`, `floor_num`, `property_name`, `date`, `status`";
					$dataSecond = "'".$customer_id."','".$prop_id."','".$i."','Kitchen','".$date."','1'";
					$ob->commonInsert("property_details",$coloumSecond,$dataSecond);

					$coloumSecond = "`customer_id`, `property_id`, `floor_num`, `property_name`, `date`, `status`";
					$dataSecond = "'".$customer_id."','".$prop_id."','".$i."','Bathroom','".$date."','1'";
					$ob->commonInsert("property_details",$coloumSecond,$dataSecond);
				}

				$_SESSION['message'] = "Success";
			} else {
				$_SESSION['message'] = "Fail";
			}

		}else{
			$coloum = "`property_id`, `customer_id`, `city`, `property_size`, `number_of_flores`, `project_phase`, `inspection_date`, `pincode`, `list_of_space`, `property_own`, `location`, `expect_time`, `date`, `status`";

				$data = "'".time()."','".$customer_id."','".$city."','".json_encode($spac)."','".$property_flore."','1','".$avail_date."','".$pincode."','".json_encode($spac)."','".$property_own."','".$location."','".$expect_time."','".$date."','1'";
			
				$prop_id = $ob->commonInsert("property",$coloum,$data);

				for($i=1;$i<=count($spac);$i++){
					for($j=1;$j<=explode(" ", $spac[$i])[0];$j++){
						$coloumSecond = "`customer_id`, `property_id`, `floor_num`, `property_name`, `date`, `status`";
						$dataSecond = "'".$customer_id."','".$prop_id."','".$i."','Room ".$j."','".$date."','1'";
						$ob->commonInsert("property_details",$coloumSecond,$dataSecond);
					}
					$coloumSecond = "`customer_id`, `property_id`, `floor_num`, `property_name`, `date`, `status`";
					$dataSecond = "'".$customer_id."','".$prop_id."','".$i."','Hall','".$date."','1'";
					$ob->commonInsert("property_details",$coloumSecond,$dataSecond);

					$coloumSecond = "`customer_id`, `property_id`, `floor_num`, `property_name`, `date`, `status`";
					$dataSecond = "'".$customer_id."','".$prop_id."','".$i."','Kitchen','".$date."','1'";
					$ob->commonInsert("property_details",$coloumSecond,$dataSecond);

					$coloumSecond = "`customer_id`, `property_id`, `floor_num`, `property_name`, `date`, `status`";
					$dataSecond = "'".$customer_id."','".$prop_id."','".$i."','Bathroom','".$date."','1'";
					$ob->commonInsert("property_details",$coloumSecond,$dataSecond);
				}
				
				$_SESSION['message'] = "Success";
		}
		
		header("location:../customer/dashboard.php");
	}else{
		header("location:../customer/dashboard.php");
	}


	/*if(isset($_POST) && $_POST['flag'] == "property_query" && $_POST['savelatter'] == "Save For Later !"){
		$customer_id = $_POST['customer_id'];
		$property_own = $_POST['property_own'];
		$property_flore = $_POST['property_flore'];
		$property_size = $_POST['property_size'];
		$property = $_POST['property'];
		$inspt_eng = $_POST['inspt_eng'];
		$avail_date = $_POST['avail_date'];
		$timeslote = $_POST['timeslote'];
		$location = $_POST['location'];
		$location = str_replace("'","\'",$location);
		$expect_time = $_POST['expect_time'];
		$blueprint = basename(time().$_FILES["blueprint"]["name"]);
		$date = date("Y-m-d");

		if(isset($_FILES["blueprint"]["name"]) && $_FILES["blueprint"]["name"] != ""){

			$target_dir = "../uploads/property_blueprint/";
			$target_file = $target_dir . $blueprint;
			$uploadOk = 1;
			$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

			if (move_uploaded_file($_FILES["blueprint"]["tmp_name"], $target_file)) {
				$coloum = "`property_id`, `customer_id`, `engineer_id`, `property_size`, `number_of_flores`, `property_blueprint`, `project_phase`, `inspection_date`, `inspection_time`, `list_of_space`, `property_own`, `location`, `expect_time`, `date`, `status`";

				$data = "'".time()."','".$customer_id."','".$inspt_eng."','".$property_size."','".$property_flore."','".$blueprint."','1','".$avail_date."','".$timeslote."','".json_encode($property)."','".$property_own."','".$location."','".$expect_time."','".$date."','1'";
			
				$prop_id = $ob->commonInsert("property_save",$coloum,$data);

				$_SESSION['message'] = "Success";
			} else {
				$_SESSION['message'] = "Fail";
			}

		}else{
			$coloum = "`property_id`, `customer_id`, `engineer_id`, `property_size`, `number_of_flores`, `project_phase`, `inspection_date`, `inspection_time`, `list_of_space`, `property_own`, `location`, `expect_time`, `date`, `status`";

				$data = "'".time()."','".$customer_id."','".$inspt_eng."','".$property_size."','".$property_flore."','1','".$avail_date."','".$timeslote."','".json_encode($property)."','".$property_own."','".$location."','".$expect_time."','".$date."','1'";
			
				$prop_id = $ob->commonInsert("property_save",$coloum,$data);
				
				$_SESSION['message'] = "Success";
		}
		
		header("location:../customer/dashboard.php");
	}else{
		header("location:../customer/index.php");
	}*/
?>