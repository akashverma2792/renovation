<?php 
	include("../model/model.php"); 
	$ob = new Model;

	if(isset($_GET['id']) && $_GET['id'] != "" && $_GET['type'] == "headsub"){

		$id = $_GET['id'];

		$record = $ob->commonSelectWhere("heads_category","`head_id` = '".$id."'","`name` ASC");
		foreach($record as $row){
			echo '<option value="'.$row['id'].'">'.$row['name'].'</option>';
		}

	}elseif(isset($_GET['name']) && $_GET['type'] == "updatePropertySpace"){

		$name = $_GET['name'];
		$name = str_replace("'","\'",$name);
		$spac_id = $_GET['spac_id'];
		$head_id = explode(",",ltrim($_GET['head_id'],","));
		$head_cat_id = explode(",",ltrim($_GET['head_cat_id'],","));
		$head_subcat_id = explode(",",ltrim($_GET['head_subcat_id'],","));
		$description = $_GET['description'];
		$description = str_replace("'","\'",$description);
		$customer_id = $_GET['customer_id'];
		$property_id = $_GET['property_id'];
		$workCount = $_GET['workCount'];
		$floor_num = $_GET['floor_num'];
		$date = date("Y-m-d");

		if($customer_id == ""){
			$where = "id = '".$spac_id."'";
			$data = "`property_name` = '".$name."',`description` = '".$description."',`floor_num` = '".$floor_num."'";
			$record = $ob->commonUpdate("property_details",$data,$where);
		}else{
			$coloum = "`customer_id`, `property_id`, `property_name`, `description`,`date`, `status`,`floor_num`";
			$data = "'".$customer_id."','".$property_id."','".$name."','".$description."','".$date."','1','".$floor_num."'";
			$spac_id = $ob->commonInsert("property_details",$coloum,$data);
		}

		for($i=0;$i<$workCount;$i++){
			$coloum = "`property_id`, `property_details_id`, `head_id`, `head_cat_id`, `head_subcat_id`";
			$data = "'".$property_id."','".$spac_id."','".$head_id[$i]."','".$head_cat_id[$i]."','".$head_subcat_id[$i]."'";
			$ob->commonInsert("property_details_work",$coloum,$data);
		}
		echo "Success";

	}elseif(isset($_GET['id']) && $_GET['id'] != "" && $_GET['type'] == "headsubcategory"){

		$id = $_GET['id'];

		$record = $ob->commonSelectWhere("heads_sub_category","`head_cat_id` = '".$id."'","`name` ASC");
		foreach($record as $row){
			echo '<option value="'.$row['id'].'">'.$row['name'].'</option>';
		}

	}elseif(isset($_GET['id']) && $_GET['id'] != "" && isset($_GET['avldate']) && $_GET['avldate'] != "" && $_GET['type'] == "checktimeslot"){

		$id = $_GET['id'];
		$date = $_GET['avldate'];
		
		$record = $ob->commonSelectWhere("property","`engineer_id` = '".$id."' AND `project_phase` = '1' AND `inspection_date` = '".$date."'","`inspection_date` ASC");
		$count = $record->rowCount();

		$tmslt = $ob->commonSelectWhere("quick_est_engg","`id` = '".$id."'","`id` DESC");
		foreach ($tmslt as $tmsltrow) {
			$engtimeslot = json_decode($tmsltrow['timeslots']);
		}

		if($count){
			foreach($record as $row){
				if (false !== $key = array_search($row['inspection_time'], $engtimeslot)) {
					unset($engtimeslot[$key]);
				}
				$engtimeslot = array_values($engtimeslot); 
			}
			for($k=0; $k < count($engtimeslot); $k++){
				echo "<option value='".$engtimeslot[$k]."'>".$engtimeslot[$k]."</option>";
			}
		}else{
			for($k=0; $k < count($engtimeslot); $k++){
				echo "<option value='".$engtimeslot[$k]."'>".$engtimeslot[$k]."</option>";
			}
		}

	}elseif(isset($_GET['id']) && $_GET['id'] != "" && $_GET['type'] == "propertySpaces"){
		$records = $ob->commonSelectWhere("property","`id` = '".$_GET['id']."'","`id` DESC");
		foreach($records as $rows){
			$property_size = json_decode($rows['property_size'], TRUE); 
		}
		$property_size_count = count($property_size);
?>
		<h4 class="card-title" style="text-align: center;font-weight: 400;margin-top: 15px;">S O W</h4>
        
    <?php 
    	for($j=1;$j<=$property_size_count;$j++){

    	$record = $ob->commonSelectWhere("property_details","`property_id` = '".$_GET['id']."' AND `floor_num` = '".$j."'","`property_name` ASC");
    ?>
        
        <div class="card-body" style="text-align: center;">

        	<h4 class="card-title" style="text-align: center;font-weight: 400;margin-top: 15px;"><?php echo "Floor ".$j; ?></h4>

			<div class="row">
			<?php  foreach($record as $row){  $uniq_id = "tab_".$row['id']; ?>
                <div class="col-md-4">
                   <button class="btn btn-warning" id="<?php echo $uniq_id; ?>" onclick="spacDetsils('<?php echo $row['property_name']; ?>',<?php echo $row['id']; ?>,<?php echo $row['property_id']; ?>,'',<?php echo $j; ?>,<?php echo $property_size_count; ?>)"><?php echo $row['property_name']; ?></button>
                   <i class="material-icons" style="font-size: 20px;color: #af4040;font-weight: 600;cursor: pointer;" onclick="removePropertySpaces(<?php echo $row['id']; ?>)">highlight_off</i>
                </div>
            <?php  }  ?>
            </div>

        </div>
    <?php  }   ?>
	    <div class="card-body" style="text-align: center;">
	    	<div class="row">
            	<div class="col-md-4">
                   <button class="btn btn-success" id="1234" onclick="spacDetsils('New Space','',<?php echo $_GET['id']; ?>,<?php echo $_SESSION['customerSession']['id']; ?>,'',<?php echo $property_size_count; ?>)">Add New Space</button>
                </div>
            </div>
	    </div>
    	

<?php
	}elseif(isset($_GET) && isset($_GET['name']) && $_GET['name'] != "" && $_GET['type'] == "spacDetsils"){

		$propertyrecord = $ob->commonSelectWhere("property_details","`id` = '".$_GET['id']."'","`id` DESC");
		$description = "";
		foreach ($propertyrecord as $rowprop) {
			$description = $rowprop['description'];
		}

		$record = $ob->commonSelect("heads","name ASC");

		$propertyheadsrecord = $ob->commonSelectJoinFour("property_details_work.*,heads.name as headname,heads_category.name as catname,heads_sub_category.name as headsubname","property_details_work","heads","heads_category","heads_sub_category","property_details_work.head_id = heads.id","property_details_work.head_cat_id = heads_category.id","property_details_work.head_subcat_id = heads_sub_category.id where `property_details_work`.`property_details_id` = '".$_GET['id']."' AND `property_details_work`.`property_id` = '".$_GET['prop_id']."'");

?>

	<h4 class="card-title" style="text-align: center;font-weight: 400;margin-top: 15px;text-transform: uppercase;"><?php echo $_GET['name']; ?></h4>
          <div class="card-body" style="text-align: center;">
            <div class="row">
            	<div class="col-md-4">
            		<select name="floor_num" id="floor_num" class="form-control">
            		<?php for($k=1;$k<=$_GET['floor_num_count'];$k++){ ?>
                    	<option value="<?php echo $k;?>" <?php if($k == $_GET['floor_num']){ echo "selected"; } ?> ><?php echo "Floor ".$k;?></option>
                    <?php  }  ?>
                    </select>
            	</div>
                <div class="col-md-4">
                  <div class="form-group">
                    <input type="text" name="name" id="name" class="form-control" placeholder="Enter Name" value="<?php echo $_GET['name']; ?>">
                    <input type="hidden" name="spac_id" id="spac_id" value="<?php echo $_GET['id']; ?>">
                    <input type="hidden" name="customer_id" id="customer_id" value="<?php echo $_GET['cust_id']; ?>">
                    <input type="hidden" name="property_id" id="property_id" value="<?php echo $_GET['prop_id']; ?>">
                  </div>
                </div>

                <div class="col-md-4">
                	<div class="form-group" style="float: right;">
                    	<button class="btn btn-warning" onclick="addMoreWork()">Add More Work</button>
                  </div>
                </div>
            </div>
        <?php if($propertyheadsrecord->rowCount()){ ?>
            <div class="row">
            	<div class="col-md-12">
            		<div class="card-body table-responsive">
						<table class="table table-hover">
							<tbody>
							<?php foreach($propertyheadsrecord as $row3){ ?>
								<tr id="headRow_<?php echo $row3['id']; ?>">
									<td><?php echo $row3['headname']; ?></td>
									<td><?php echo $row3['catname']; ?></td>
									<td><?php echo $row3['headsubname']; ?></td>
									<td><i class="material-icons" style="cursor: pointer;" onclick="deleteMe(<?php echo $row3['id']; ?>,'headRow_<?php echo $row3['id']; ?>')">delete</i></td>
								</tr>
							<?php  }   ?>
							</tbody>
						</table>
					</div>
            	</div>
            </div>
        <?php  }  ?>

            <div class="row workAdd">
                <div class="col-md-4">
                  <div class="form-group">
                    <select name="head_id" id="head_id_1" class="form-control" onchange="getCategory(this.value,'setCategory_1','setSubCategory_1')">
                    	<option value="">Select Head</option>
                    <?php foreach($record as $row){ ?>
                      <option value="<?php echo $row['id']; ?>"><?php echo $row['name']; ?></option>
                  	<?php  }   ?>
                    </select>
                  </div>
                </div>
                <div class="col-md-4">
                  <div class="form-group">
                  <select name="head_cat_id" id="setCategory_1" class="form-control" onchange="getSubCategory(this.value,'setSubCategory_1')">
                    <option value="">Select Head First</option>
                  </select>
                  </div>
                </div>
                <div class="col-md-4">
                  <div class="form-group">
                    <select name="head_subcat_id" id="setSubCategory_1" class="form-control">
	                    <option value="">Select Head First</option>
                    </select>
                  </div>
                </div>
              </div>
          
              <div class="row" style="text-align: center;">
                <div class="col-md-12">
                  <div class="form-group">
                  	<input type="hidden" name="workCount" id="workCount" value="1">
                    <textarea class="form-control" name="description" id="description" placeholder="Enter Description"><?php echo $description; ?></textarea>
                  </div>
                </div>
              </div>
          
              <div class="row" style="text-align: center;">
                <div class="col-md-4"></div>
                <div class="col-md-4"></div>
                <div class="col-md-4">
                  <button class="btn btn-warning" onclick="updateCurrentSpace()">Submit Now !</button>
                </div>
              </div>
            </div>

<?php
	}else{
		echo "Invalide Request";
	}
?>