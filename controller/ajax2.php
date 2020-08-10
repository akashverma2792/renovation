<?php  
	include("../model/model.php"); 
	$ob = new Model;

	if(isset($_GET['id']) && $_GET['id'] != "" && $_GET['type'] == "projectDetsils"){
		$id = $_GET['id'];

		$record = $ob->commonSelectWhere("property","id = '".$id."'","id DESC","");

		foreach ($record as $row) {
?>

	<div class="row">
	    <div class="col-md-6">
	      <p> Property Id : <?php echo $row['property_id']; ?> </p>
	    </div>
	    <div class="col-md-6">
	      <p> Number Of Floors : <?php echo $row['number_of_flores']; ?> </p>
	    </div>
	</div>

	<div class="row">
	    <div class="col-md-6">
	      <p> Location : <?php echo $row['location']; ?> </p>
	    </div>
	    <div class="col-md-6">
	      <p> Pin Code : <?php echo $row['city']; ?> </p>
	    </div>
	</div>

	<div class="row">
	    <div class="col-md-6">
	      <p> Pin Code : <?php echo $row['pincode']; ?> </p>
	    </div>
	    <div class="col-md-6">
	      <p> Project Phase : <?php if($row['project_phase'] == "1"){ echo "Quick Estimate Phase"; }elseif($row['project_phase'] == "2"){ echo "BuildMy Phase"; }elseif($row['project_phase'] == "3"){ echo "Executation Phase"; }else{ echo "Complete"; } ?> </p>
	    </div>
	</div>

	<div class="row">
	    <div class="col-md-6">
	      <p> Property Own : <?php echo $row['property_own']; ?> </p>
	    </div>
	    <div class="col-md-6">
	      <p> Expected Time : <?php echo $row['expect_time']; ?> </p>
	    </div>
	</div>

	<div class="row">
        <div class="col-md-12">
          <div class="card-body table-responsive">
            <table class="table table-hover">
              <thead class="text-warning">
                <tr>
                  <th>Admin</th>
                  <th>Inspect Engg.</th>
                  <th>Inspect Date</th>
                  <th>Inspect Time</th>
                </tr>
              </thead>
              <tbody>
              <?php 
                $admin_ids = $row['sub_admin'];
                $admin_ids = str_replace("-", "", $admin_ids);
                
                if($admin_ids != ""){
                $record4 = $ob->commonSelectWhere("sub_admin","status = '1' AND `id` IN (".$admin_ids.")","name ASC","");
                foreach($record4 as $row4){
              ?>
                <tr>
                  <td><?php if($row4['name'] != ""){ echo $row4['name']; }else{ echo "Not Not"; } ?></td>
                  <td>
                    <?php 
                      $record5 = $ob->commonSelectWhere("quick_est_engg","status = '1' AND `id` = '".json_decode($row['engineer_id'], TRUE)[$row4['id']]."'","name ASC","");
                      $ename = "Not Not";
                      foreach($record5 as $row5){ $ename = $row5['name']; } echo $ename;
                    ?>
                  </td>
                  <td><?php if(json_decode($row['inspection_date'], TRUE)[$row4['id']] != ""){ echo json_decode($row['inspection_date'], TRUE)[$row4['id']]; }else{ echo "Not Not"; } ?></td>
                  <td><?php if(json_decode($row['inspection_time'], TRUE)[$row4['id']] != ""){ echo json_decode($row['inspection_time'], TRUE)[$row4['id']]; }else{ echo "Not Not"; } ?></td>
                </tr>
              <?php  } }else{  ?>
              	<tr>
              		<td>Not Not</td>
              		<td>Not Not</td>
              		<td>Not Not</td>
              		<td>Not Not</td>
              	</tr>
              <?php  }   ?>
              </tbody>
            </table>
          </div>
        </div>
                    
    </div>

    <div class="row">
		<div class="card-body table-responsive">
			<table class="table">
				<thead class="text-warning">
					<tr>
			            <th>Floor Number</th>
			            <th></th>
			        </tr>
				</thead>
				<tbody>
					<?php 
						$pro_spac = json_decode($row['property_size'], TRUE); 
						for($j=1;$j<=count($pro_spac);$j++){

						$tableData = $ob->commonSelectWhere("property_details","`property_id` = '".$id."' AND `floor_num` = '".$j."'","`property_name` ASC");
					?>
					<tr>
	              		<td><?php echo "Floor ".$j; ?></td>
	              		<td>
	              			<table class="table">
	              				<thead class="text-warning">
	              					<tr>
							            <th>#</th>
							            <th>Space Name</th>
							            <th>Description</th>
							            <th></th>
							        </tr>
	              				</thead>
	              				<tbody>
	              					<?php 
								    	$i=0;
								    	foreach ($tableData as $row2) { 
								    	$i++;
								    ?>
								    <tr>
								    	<td><?php echo $i; ?></td>
							            <td><?php echo $row2['property_name']; ?></td>
							            <td><?php echo $row2['description']; ?></td>
							            <td>
							            	<table class="table">
							            		<thead class="text-warning">
							            			<tr>
											            <th>Head</th>
											            <th>Head Category</th>
											            <th>Head Sub Category</th>
											        </tr>
							            		</thead>
							            		<tbody>
							            			<?php 
										        		$propertyheadsrecord = $ob->commonSelectJoinFour("property_details_work.*,heads.name as headname,heads_category.name as catname,heads_sub_category.name as headsubname","property_details_work","heads","heads_category","heads_sub_category","property_details_work.head_id = heads.id","property_details_work.head_cat_id = heads_category.id","property_details_work.head_subcat_id = heads_sub_category.id where `property_details_work`.`property_details_id` = '".$row2['id']."'");
										        		foreach($propertyheadsrecord as $row6){
										        	?>
										        	<tr>
								            			<td><?php echo $row6['headname']; ?></td>
								            			<td><?php echo $row6['catname']; ?></td>
								            			<td><?php echo $row6['headsubname']; ?></td>
								            		</tr>
								            		<?php  }  ?>
							            		</tbody>
							            	</table>
							            </td>
								    </tr>
									<?php } ?>
	              				</tbody>
	              			</table>
	              		</td>
	              	</tr>
	              	<?php  }   ?>
				</tbody>
			</table>
		</div>
	</div>

<?php  }   ?>

<?php  }  ?>

<?php 
	if(isset($_GET) && $_GET['type'] == "moreWorkAdd"){ 
		$record = $ob->commonSelect("heads","name ASC");
		$workCount = $_GET['workCount'];
		$random = $workCount+1;
?>

	<div class="row workAdd">
        <div class="col-md-4">
          <div class="form-group">
            <select name="head_id" id="head_id_<?php echo $random; ?>" class="form-control" onchange="getCategory(this.value,'setCategory_<?php echo $random; ?>','setSubCategory_<?php echo $random; ?>')">
            	<option value="">Select Head</option>
            <?php foreach($record as $row){ ?>
              <option value="<?php echo $row['id']; ?>"><?php echo $row['name']; ?></option>
          	<?php  }   ?>
            </select>
          </div>
        </div>
        <div class="col-md-4">
          <div class="form-group">
          <select name="head_cat_id" id="setCategory_<?php echo $random; ?>" class="form-control" onchange="getSubCategory(this.value,'setSubCategory_<?php echo $random; ?>')">
            <option value="">Select Head First</option>
          </select>
          </div>
        </div>
        <div class="col-md-4">
          <div class="form-group">
            <select name="head_subcat_id" id="setSubCategory_<?php echo $random; ?>" class="form-control">
                <option value="">Select Head First</option>
            </select>
          </div>
        </div>
      </div>

<?php  }  ?>

<?php 
	if(isset($_GET) && $_GET['type'] == "deleteMe"){
		$id = $_GET['id'];
		$ob->commonDelete("property_details_work","id = '".$id."'");
		echo "Success";
	}

?>

<?php 
	if(isset($_GET) && $_GET['type'] == "removePropertySpaces"){
		$id = $_GET['id'];
		$ob->commonDelete("property_details","id = '".$id."'");
		echo "Success";
	}

?>

<?php 
	if(isset($_GET['id']) && $_GET['id'] != "" && $_GET['type'] == "measurementSheet"){ 
		$id = $_GET['id'];

		$property = $ob->commonSelectWhere("property","id = '".$id."'","id DESC","");
		foreach ($property as $row) { $floors = json_decode($row['property_size'], TRUE); }
?>

	<h4 class="card-title" style="text-align: center;font-weight: 400;margin-top: 15px;">Measurment Sheet</h4>
	<div class="card-body" style="text-align: center;">
		<div class="row">
	        <div class="col-md-12">
	          	<div class="card-body table-responsive">
	            	<table class="table table-hover">
	              		<tbody>
	              		<?php for($i=1;$i<=count($floors);$i++){ ?>
	              			<tr class="text-warning">
			                  	<td style="font-weight: 600;font-size: 15px;">Floor <?php echo $i; ?></td>
			                  	<td></td>
			                  	<td></td>
			                  	<td></td>
			                  	<td></td>
			                  	<td></td>
			                  	<td></td>
			                  	<td></td>
			                  	<td></td>
			                </tr>
			                <?php
			                	$property_details = $ob->commonSelectWhere("property_details","`property_id` = '".$id."' AND `floor_num` = '".$i."'","`property_name` ASC");
			                	foreach($property_details as $row2){
			                ?>
			                <tr>
			                	<td></td>
			                  	<td style="font-weight: 600;"><?php echo $row2['property_name']; ?></td>
			                  	<td style="font-weight: 600;"><?php echo $row2['description']; ?></td>
			                  	<td></td>
			                  	<td></td>
			                  	<td></td>
			                  	<td></td>
			                  	<td></td>
			                  	<td></td>
			                </tr>
			                <?php 
			                	$property_details_work = $ob->commonSelectJoinFour("property_details_work.*,heads.name as headname,heads_category.name as catname,heads_sub_category.name as headsubname,`heads_sub_category`.`measur_unit`","property_details_work","heads","heads_category","heads_sub_category","property_details_work.head_id = heads.id","property_details_work.head_cat_id = heads_category.id","property_details_work.head_subcat_id = heads_sub_category.id where `property_details_work`.`property_details_id` = '".$row2['id']."'");
								foreach($property_details_work as $row3){
									$measur_unit = $row3['measur_unit'];
			                ?>
			                <tr>
			                	<td></td>
			                	<td></td>
			                  	<td style="font-weight: 400;"><?php echo $row3['headname']; ?></td>
		            			<td style="font-weight: 400;"><?php echo $row3['catname']; ?></td>
		            			<td style="font-weight: 400;"><?php echo $row3['headsubname']; ?></td>
		            			<td style="font-weight: 400;"><?php echo $row3['measur_unit']; ?></td>
		            			<td></td>
		            			<td></td>
		            			<td>
		            				<button class="btn btn-warning btn-sm" data-toggle="modal" data-target="#measurementSheetModel" onclick="getMeasurementSheetForm(<?php echo $row3['property_id']; ?>,<?php echo $row3['id']; ?>,'<?php echo $measur_unit; ?>')"> Add Details <div class="ripple-container"></div></button>
		            			</td>
			                </tr>

			                <tr class="text-warning" style="font-weight: 400;">
			                	<td></td>
			                  	<td></td>
			                  	<td></td>
			                  	<td>Existing Drawing</td>
			                  	<td>Concept Picture</td>
			                  	<td>Proposed Drawing</td>
			                  	<td>Other Picture</td>
			                  	<td>Qty / Area</td>
			                  	<td>Action</td>
			                </tr>
		                	<?php 
		                		$measurmentSheet = $ob->commonSelectWhere("measurement_sheet","`property_id` = '".$id."' AND `property_details_work_id` = '".$row3['id']."'","`id` DESC");
		                		$ttl_qty = "0";
			                	foreach($measurmentSheet as $row4){
		                	?>
			                <tr id="rmv-<?php echo $row4['id']; ?>">
			                	<td></td>
			                  	<td></td>
			                  	<td></td>
			                  	<td><a href="../uploads/measurementSheet/existing-drawing/<?php echo $row4['existing_drawing']; ?>" target="_blank"><button class="btn btn-warning btn-sm" style="padding: 7px;">Existing Drawing</button></a></td>
			                  	<td><a href="../uploads/measurementSheet/concept-picture/<?php echo $row4['concept_picture']; ?>" target="_blank"><button class="btn btn-warning btn-sm" style="padding: 7px;">Concept Picture</button></a></td>
			                  	<td><a href="../uploads/measurementSheet/proposed-drawing/<?php echo $row4['proposed_drawing']; ?>" target="_blank"><button class="btn btn-warning btn-sm" style="padding: 7px;">Proposed Drawing</button></a></td>
			                  	<td><a href="../uploads/measurementSheet/other-picture/<?php echo $row4['other_picture']; ?>" target="_blank"><button class="btn btn-warning btn-sm" style="padding: 7px;">Other Picture</button></a></td>
			                  	<td>
			                  		<?php if($row4['unit'] == "sqftandrft"){ echo $row4['area']; $ttl_qty += $row4['area']; }elseif($row4['unit'] == "Sqft"){ echo $row4['quantity']; $ttl_qty += $row4['quantity']; }elseif($row4['unit'] == "Rtf"){ echo $row4['quantity']; $ttl_qty += $row4['quantity']; }else{
										echo $row4['in_numbers']; $ttl_qty += $row4['in_numbers']; } ?></td>
			                  	<td><button class="btn btn-danger btn-sm" onclick="deleteMeMsrSheet(<?php echo $row4['id']; ?>)"><i class="material-icons">delete_outline</i></button></td>
			                </tr>
			                <?php  }  ?>
			                <tr style="font-weight: 600;">
			                	<td></td>
			                  	<td></td>
			                  	<td></td>
			                  	<td></td>
			                  	<td></td>
			                  	<td></td>
			                  	<td>Total : </td>
			                  	<td><?php echo $ttl_qty; ?></td>
			                  	<td></td>
			                </tr>
			                <?php  }  ?>
			            	<?php  }  ?>
			            <?php  }  ?>
	              		</tbody>
	              	</table>
	            </div>
	        </div>
	    </div>
	</div>

<?php  }  ?>

<?php 
	if(isset($_GET) && $_GET['type'] == "deleteMeMsrSheet"){
		$id = $_GET['id'];
		$ob->commonDelete("measurement_sheet","id = '".$id."'");
		echo "Success";
	}

?>
