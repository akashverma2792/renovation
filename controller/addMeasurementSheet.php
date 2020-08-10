<?php 
	include("../model/model.php"); 
	$ob = new Model;
	
	if(isset($_POST) && $_POST['flag'] == "sqftandrft"){
		$propertyId = $_POST['propertyId'];
		$propertyDetailsWorkId = $_POST['propertyDetailsWorkId'];
		$length_feet = $_POST['length_feet'];
		$length_inch = $_POST['length_inch'];
		$breadth_feet = $_POST['breadth_feet'];
		$breadth_inch = $_POST['breadth_inch'];
		$deduction_length_feet = $_POST['deduction_length_feet'];
		$deduction_length_inch = $_POST['deduction_length_inch'];
		$deduction_breadth_feet = $_POST['deduction_breadth_feet'];
		$deduction_breadth_inch = $_POST['deduction_breadth_inch'];
		$quantity = $_POST['quantity'];
		$deduction_quantity = $_POST['deduction_quantity'];
		$unit = $_POST['unit'];
		$area = $_POST['area'];

		$wall_nomenclature = $_POST['wall_nomenclature'];
		$wall_nomenclature = str_replace("'","\'",$wall_nomenclature);
		$item_nomenclature = $_POST['item_nomenclature'];
		$item_nomenclature = str_replace("'","\'",$item_nomenclature);
		$deduction_nomenclature = $_POST['deduction_nomenclature'];
		$deduction_nomenclature = str_replace("'","\'",$deduction_nomenclature);

		$date = date("Y-m-d");
		$random = rand(100000,999999);

		if(isset($_FILES["existing_drawing"]["name"]) && $_FILES["existing_drawing"]["name"] != ""){
			$existing_drawing = $_FILES["existing_drawing"]["name"];
			$tmp_1 = $_FILES['existing_drawing']['tmp_name'];
			$target_dir_1 = "../uploads/measurementSheet/existing-drawing/";
			$target_file_1 = $target_dir_1 . $random . $existing_drawing;
			if (move_uploaded_file($tmp_1, $target_file_1)) {
				$existing_drawing = $random . $existing_drawing;
			} else {
				$existing_drawing = "";
			}
		}else{
			$existing_drawing = "";
		}

		if(isset($_FILES["concept_picture"]["name"]) && $_FILES["concept_picture"]["name"] != ""){
			$concept_picture = $_FILES["concept_picture"]["name"];
			$tmp_2 = $_FILES['concept_picture']['tmp_name'];
			$target_dir_2 = "../uploads/measurementSheet/concept-picture/";
			$target_file_2 = $target_dir_2 . $random . $concept_picture;
			if (move_uploaded_file($tmp_2, $target_file_2)) {
				$concept_picture = $random . $concept_picture;
			} else {
				$concept_picture = "";
			}
		}else{
			$concept_picture = "";
		}

		if(isset($_FILES["proposed_drawing"]["name"]) && $_FILES["proposed_drawing"]["name"] != ""){
			$proposed_drawing = $_FILES["proposed_drawing"]["name"];
			$tmp_3 = $_FILES['proposed_drawing']['tmp_name'];
			$target_dir_3 = "../uploads/measurementSheet/proposed-drawing/";
			$target_file_3 = $target_dir_3 . $random . $proposed_drawing;
			if (move_uploaded_file($tmp_3, $target_file_3)) {
				$proposed_drawing = $random . $proposed_drawing;
			} else {
				$proposed_drawing = "";
			}
		}else{
			$proposed_drawing = "";
		}

		if(isset($_FILES["other_picture"]["name"]) && $_FILES["other_picture"]["name"] != ""){
			$other_picture = $_FILES["other_picture"]["name"];
			$tmp_4 = $_FILES['other_picture']['tmp_name'];
			$target_dir_4 = "../uploads/measurementSheet/other-picture/";
			$target_file_4 = $target_dir_4 . $random . $other_picture;
			if (move_uploaded_file($tmp_4, $target_file_4)) {
				$other_picture = $random . $other_picture;
			} else {
				$other_picture = "";
			}
		}else{
			$other_picture = "";
		}

		$coloum = "`property_id`, `property_details_work_id`, `existing_drawing`, `concept_picture`, `proposed_drawing`, `other_picture`, `wall_nomenclature`, `item_nomenclature`, `length_feet`, `length_inches`, `breadth_feet`, `breadth_inches`, `quantity`, `deduction_nomenclature`, `deduction_length_feet`, `deduction_length_inches`, `deduction_breadth_feet`, `deduction_breadth_inches`, `deduction_quantity`, `unit`, `area`, `date`, `status`";

		$data = "'".$propertyId."','".$propertyDetailsWorkId."','".$existing_drawing."','".$concept_picture."','".$proposed_drawing."','".$other_picture."','".$wall_nomenclature."','".$item_nomenclature."','".$length_feet."','".$length_inch."','".$breadth_feet."','".$breadth_inch."','".$quantity."','".$deduction_nomenclature."','".$deduction_length_feet."','".$deduction_length_inch."','".$deduction_breadth_feet."','".$deduction_breadth_inch."','".$deduction_quantity."','".$unit."','".$area."','".$date."','1'";
		
		$record = $ob->commonInsert("measurement_sheet",$coloum,$data);
	}


	if(isset($_POST) && $_POST['flag'] == "sqft"){
		$propertyId = $_POST['propertyId'];
		$propertyDetailsWorkId = $_POST['propertyDetailsWorkId'];
		$length_feet = $_POST['length_feet'];
		$length_inch = $_POST['length_inch'];
		$breadth_feet = $_POST['breadth_feet'];
		$breadth_inch = $_POST['breadth_inch'];
		$quantity = $_POST['quantity'];
		$unit = $_POST['unit'];

		$ceiling_nomenclature = $_POST['ceiling_nomenclature'];
		$ceiling_nomenclature = str_replace("'","\'",$ceiling_nomenclature);

		$date = date("Y-m-d");
		$random = rand(100000,999999);

		if(isset($_FILES["existing_drawing"]["name"]) && $_FILES["existing_drawing"]["name"] != ""){
			$existing_drawing = $_FILES["existing_drawing"]["name"];
			$tmp_1 = $_FILES['existing_drawing']['tmp_name'];
			$target_dir_1 = "../uploads/measurementSheet/existing-drawing/";
			$target_file_1 = $target_dir_1 . $random . $existing_drawing;
			if (move_uploaded_file($tmp_1, $target_file_1)) {
				$existing_drawing = $random . $existing_drawing;
			} else {
				$existing_drawing = "";
			}
		}else{
			$existing_drawing = "";
		}

		if(isset($_FILES["concept_picture"]["name"]) && $_FILES["concept_picture"]["name"] != ""){
			$concept_picture = $_FILES["concept_picture"]["name"];
			$tmp_2 = $_FILES['concept_picture']['tmp_name'];
			$target_dir_2 = "../uploads/measurementSheet/concept-picture/";
			$target_file_2 = $target_dir_2 . $random . $concept_picture;
			if (move_uploaded_file($tmp_2, $target_file_2)) {
				$concept_picture = $random . $concept_picture;
			} else {
				$concept_picture = "";
			}
		}else{
			$concept_picture = "";
		}

		if(isset($_FILES["proposed_drawing"]["name"]) && $_FILES["proposed_drawing"]["name"] != ""){
			$proposed_drawing = $_FILES["proposed_drawing"]["name"];
			$tmp_3 = $_FILES['proposed_drawing']['tmp_name'];
			$target_dir_3 = "../uploads/measurementSheet/proposed-drawing/";
			$target_file_3 = $target_dir_3 . $random . $proposed_drawing;
			if (move_uploaded_file($tmp_3, $target_file_3)) {
				$proposed_drawing = $random . $proposed_drawing;
			} else {
				$proposed_drawing = "";
			}
		}else{
			$proposed_drawing = "";
		}

		if(isset($_FILES["other_picture"]["name"]) && $_FILES["other_picture"]["name"] != ""){
			$other_picture = $_FILES["other_picture"]["name"];
			$tmp_4 = $_FILES['other_picture']['tmp_name'];
			$target_dir_4 = "../uploads/measurementSheet/other-picture/";
			$target_file_4 = $target_dir_4 . $random . $other_picture;
			if (move_uploaded_file($tmp_4, $target_file_4)) {
				$other_picture = $random . $other_picture;
			} else {
				$other_picture = "";
			}
		}else{
			$other_picture = "";
		}

		$coloum = "`property_id`, `property_details_work_id`, `existing_drawing`, `concept_picture`, `proposed_drawing`, `other_picture`, `ceiling_nomenclature`, `length_feet`, `length_inches`, `breadth_feet`, `breadth_inches`, `quantity`, `unit`, `date`, `status`";

		$data = "'".$propertyId."','".$propertyDetailsWorkId."','".$existing_drawing."','".$concept_picture."','".$proposed_drawing."','".$other_picture."','".$ceiling_nomenclature."','".$length_feet."','".$length_inch."','".$breadth_feet."','".$breadth_inch."','".$quantity."','".$unit."','".$date."','1'";
		
		$record = $ob->commonInsert("measurement_sheet",$coloum,$data);
	}


	if(isset($_POST) && $_POST['flag'] == "rft"){
		$propertyId = $_POST['propertyId'];
		$propertyDetailsWorkId = $_POST['propertyDetailsWorkId'];
		$length_feet = $_POST['length_feet'];
		$length_inch = $_POST['length_inch'];
		$quantity = $_POST['quantity'];
		$unit = $_POST['unit'];
		$no_of_detail = $_POST['no_of_detail'];

		$wall_nomenclature = $_POST['wall_nomenclature'];
		$wall_nomenclature = str_replace("'","\'",$wall_nomenclature);
		$item_nomenclature = $_POST['item_nomenclature'];
		$item_nomenclature = str_replace("'","\'",$item_nomenclature);

		$date = date("Y-m-d");
		$random = rand(100000,999999);

		if(isset($_FILES["existing_drawing"]["name"]) && $_FILES["existing_drawing"]["name"] != ""){
			$existing_drawing = $_FILES["existing_drawing"]["name"];
			$tmp_1 = $_FILES['existing_drawing']['tmp_name'];
			$target_dir_1 = "../uploads/measurementSheet/existing-drawing/";
			$target_file_1 = $target_dir_1 . $random . $existing_drawing;
			if (move_uploaded_file($tmp_1, $target_file_1)) {
				$existing_drawing = $random . $existing_drawing;
			} else {
				$existing_drawing = "";
			}
		}else{
			$existing_drawing = "";
		}

		if(isset($_FILES["concept_picture"]["name"]) && $_FILES["concept_picture"]["name"] != ""){
			$concept_picture = $_FILES["concept_picture"]["name"];
			$tmp_2 = $_FILES['concept_picture']['tmp_name'];
			$target_dir_2 = "../uploads/measurementSheet/concept-picture/";
			$target_file_2 = $target_dir_2 . $random . $concept_picture;
			if (move_uploaded_file($tmp_2, $target_file_2)) {
				$concept_picture = $random . $concept_picture;
			} else {
				$concept_picture = "";
			}
		}else{
			$concept_picture = "";
		}

		if(isset($_FILES["proposed_drawing"]["name"]) && $_FILES["proposed_drawing"]["name"] != ""){
			$proposed_drawing = $_FILES["proposed_drawing"]["name"];
			$tmp_3 = $_FILES['proposed_drawing']['tmp_name'];
			$target_dir_3 = "../uploads/measurementSheet/proposed-drawing/";
			$target_file_3 = $target_dir_3 . $random . $proposed_drawing;
			if (move_uploaded_file($tmp_3, $target_file_3)) {
				$proposed_drawing = $random . $proposed_drawing;
			} else {
				$proposed_drawing = "";
			}
		}else{
			$proposed_drawing = "";
		}

		if(isset($_FILES["other_picture"]["name"]) && $_FILES["other_picture"]["name"] != ""){
			$other_picture = $_FILES["other_picture"]["name"];
			$tmp_4 = $_FILES['other_picture']['tmp_name'];
			$target_dir_4 = "../uploads/measurementSheet/other-picture/";
			$target_file_4 = $target_dir_4 . $random . $other_picture;
			if (move_uploaded_file($tmp_4, $target_file_4)) {
				$other_picture = $random . $other_picture;
			} else {
				$other_picture = "";
			}
		}else{
			$other_picture = "";
		}

		$coloum = "`property_id`, `property_details_work_id`, `existing_drawing`, `concept_picture`, `proposed_drawing`, `other_picture`, `wall_nomenclature`, `item_nomenclature`, `length_feet`, `length_inches`, `quantity`, `unit`, `no_of_detail`, `date`, `status`";

		$data = "'".$propertyId."','".$propertyDetailsWorkId."','".$existing_drawing."','".$concept_picture."','".$proposed_drawing."','".$other_picture."','".$wall_nomenclature."','".$item_nomenclature."','".$length_feet."','".$length_inch."','".$quantity."','".$unit."','".$no_of_detail."','".$date."','1'";
		
		$record = $ob->commonInsert("measurement_sheet",$coloum,$data);
	}


	if(isset($_POST) && $_POST['flag'] == "inno"){
		$propertyId = $_POST['propertyId'];
		$propertyDetailsWorkId = $_POST['propertyDetailsWorkId'];
		$quantity = $_POST['quantity'];
		$unit = $_POST['unit'];
		$in_numbers = $_POST['in_numbers'];

		$item_nomenclature = $_POST['item_nomenclature'];
		$item_nomenclature = str_replace("'","\'",$item_nomenclature);

		$date = date("Y-m-d");
		$random = rand(100000,999999);

		if(isset($_FILES["existing_drawing"]["name"]) && $_FILES["existing_drawing"]["name"] != ""){
			$existing_drawing = $_FILES["existing_drawing"]["name"];
			$tmp_1 = $_FILES['existing_drawing']['tmp_name'];
			$target_dir_1 = "../uploads/measurementSheet/existing-drawing/";
			$target_file_1 = $target_dir_1 . $random . $existing_drawing;
			if (move_uploaded_file($tmp_1, $target_file_1)) {
				$existing_drawing = $random . $existing_drawing;
			} else {
				$existing_drawing = "";
			}
		}else{
			$existing_drawing = "";
		}

		if(isset($_FILES["concept_picture"]["name"]) && $_FILES["concept_picture"]["name"] != ""){
			$concept_picture = $_FILES["concept_picture"]["name"];
			$tmp_2 = $_FILES['concept_picture']['tmp_name'];
			$target_dir_2 = "../uploads/measurementSheet/concept-picture/";
			$target_file_2 = $target_dir_2 . $random . $concept_picture;
			if (move_uploaded_file($tmp_2, $target_file_2)) {
				$concept_picture = $random . $concept_picture;
			} else {
				$concept_picture = "";
			}
		}else{
			$concept_picture = "";
		}

		if(isset($_FILES["proposed_drawing"]["name"]) && $_FILES["proposed_drawing"]["name"] != ""){
			$proposed_drawing = $_FILES["proposed_drawing"]["name"];
			$tmp_3 = $_FILES['proposed_drawing']['tmp_name'];
			$target_dir_3 = "../uploads/measurementSheet/proposed-drawing/";
			$target_file_3 = $target_dir_3 . $random . $proposed_drawing;
			if (move_uploaded_file($tmp_3, $target_file_3)) {
				$proposed_drawing = $random . $proposed_drawing;
			} else {
				$proposed_drawing = "";
			}
		}else{
			$proposed_drawing = "";
		}

		if(isset($_FILES["other_picture"]["name"]) && $_FILES["other_picture"]["name"] != ""){
			$other_picture = $_FILES["other_picture"]["name"];
			$tmp_4 = $_FILES['other_picture']['tmp_name'];
			$target_dir_4 = "../uploads/measurementSheet/other-picture/";
			$target_file_4 = $target_dir_4 . $random . $other_picture;
			if (move_uploaded_file($tmp_4, $target_file_4)) {
				$other_picture = $random . $other_picture;
			} else {
				$other_picture = "";
			}
		}else{
			$other_picture = "";
		}

		$coloum = "`property_id`, `property_details_work_id`, `existing_drawing`, `concept_picture`, `proposed_drawing`, `other_picture`, `item_nomenclature`, `quantity`, `unit`, `in_numbers`, `date`, `status`";

		$data = "'".$propertyId."','".$propertyDetailsWorkId."','".$existing_drawing."','".$concept_picture."','".$proposed_drawing."','".$other_picture."','".$item_nomenclature."','".$quantity."','".$unit."','".$in_numbers."','".$date."','1'";
		
		$record = $ob->commonInsert("measurement_sheet",$coloum,$data);
	}

?>