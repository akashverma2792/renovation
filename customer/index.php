<?php include 'header.php';?>

<?php include 'login-check.php';?>

<style type="text/css">
	.image-list{
		height: 45px;
	    width: 45px;
	    border-radius: 10px;
	}

	.eng-pic{
		width: 85px !important;
    	border-radius: 0px 25px 0px 25px;
	}

	.table-wrap {
	  height: 170px;
	  overflow-y: auto;
	}

	.table-wrap2{
		height: 250px;
    	overflow-y: auto;
	}

	.btn-style-new{
		background-color: #ff9800;
	    font-size: 15px;
	}

	.bs-example{
    	margin: 20px;
    }
</style>

<body>
<div class="wrapper">
<form action="../controller/addQuickEstimateProperty.php" id="wizard" method="post" enctype="multipart/form-data">
	<input type="hidden" name="flag" value="property_query">
	<input type="hidden" name="customer_id" value="<?php echo $_SESSION['customerSession']['id']; ?>">

<h4></h4>
<section>
<h3>Property Floores Details</h3>

<div class="form-group">

<label for="email">Do You Already Own The Property ?</label></br>
	<div class="btn-group" data-toggle="buttons">

		<label class="btn btn-cyan btn-rounded form-check-label waves-effect waves-light active">
			<input class="form-check-input" type="radio" name="property_own" value="yes" checked autocomplete="off"> Yes
			<i class="far fa-gem ml-2"></i>
		</label>

		<label class="btn btn-cyan btn-rounded form-check-label waves-effect waves-light">
			<input class="form-check-input" type="radio" name="property_own" value="no" autocomplete="off"> No
			<i class="fas fa-user ml-2"></i>
		</label>

    </div></br>

<label for="email">Select Property Blueprint :</label>	
	<div class="form-group">
		<div style="position:relative;">
			<a class='btn btn-primary' href='javascript:;'>
				Choose File...
				<input type="file" name="blueprint" style='position:absolute;z-index:2;top:0;left:0;filter: alpha(opacity=0);-ms-filter:"progid:DXImageTransform.Microsoft.Alpha(Opacity=0)";opacity:0;background-color:transparent;color:transparent;' size="40"  onchange='$("#upload-file-info").html($(this).val());'>
			</a>
			&nbsp;
			<span class='label label-info' id="upload-file-info"></span>
		</div>
    </div>
	
<p style="text-align: center;">OR</p>

<label for="email">How Many Floores Do You Have :</label>
	<div class="btn-group" data-toggle="buttons">

		<label class="btn btn-cyan btn-rounded form-check-label waves-effect waves-light active">
			<input class="form-check-input" type="radio" name="property_flore" value="1 Floor" checked autocomplete="off" onchange="getPropertyFloors(1)"> One Floor
			<i class="far fa-gem ml-2"></i>
		</label>

		<label class="btn btn-cyan btn-rounded form-check-label waves-effect waves-light">
			<input class="form-check-input" type="radio" name="property_flore" value="2 Floores" autocomplete="off" onchange="getPropertyFloors(2)"> Two Floores
			<i class="fas fa-user ml-2"></i>
		</label>
		  
		<label class="btn btn-cyan btn-rounded form-check-label waves-effect waves-light">
			<input class="form-check-input" type="radio" name="property_flore" value="3 Floores" autocomplete="off" onchange="getPropertyFloors(3)"> Three Floores
			<i class="fas fa-user ml-2"></i>
		</label>
		  
		<label class="btn btn-cyan btn-rounded form-check-label waves-effect waves-light">
			<input class="form-check-input" type="radio" name="property_flore" value="4 Floores" autocomplete="off" onchange="getPropertyFloors(4)"> Four Floores
			<i class="fas fa-user ml-2"></i>
		</label>

		<label class="btn btn-cyan btn-rounded form-check-label waves-effect waves-light">
			<input class="form-check-input" type="radio" name="property_flore" value="5 Floores" autocomplete="off" onchange="getPropertyFloors(5)"> Five Floores
			<i class="fas fa-code ml-2"></i>
		</label>
		  
		<!-- <label class="btn btn-cyan btn-rounded form-check-label waves-effect waves-light">
			<input class="form-check-input" type="radio" name="property_flore" value="More Floores" autocomplete="off"> More Floores
			<i class="fas fa-code ml-2"></i>
		</label> -->

    </div>

</div>
</section>

<h4></h4>
<section>
<h3>Property Space Details</h3>

<div class="form-group" id="setPropertyFloors">

	<label for="email" style="padding-right: 30px;">1 Floor :</label>
	<div class="btn-group" data-toggle="buttons">
		<input type="hidden" name="floor_num[]" value="1">
		<label class="btn btn-cyan btn-rounded form-check-label waves-effect waves-light active" style="border-radius: 20px 0px 0px 20px;">
			<input class="form-check-input" type="radio" name="property_size_1" value="1 BHK" checked autocomplete="off"> One BHK
			<i class="far fa-gem ml-2"></i>
		</label>

		<label class="btn btn-cyan btn-rounded form-check-label waves-effect waves-light">
			<input class="form-check-input" type="radio" name="property_size_1" value="2 BHK" autocomplete="off"> Two BHK
			<i class="fas fa-user ml-2"></i>
		</label>
		  
		<label class="btn btn-cyan btn-rounded form-check-label waves-effect waves-light">
			<input class="form-check-input" type="radio" name="property_size_1" value="4 BHK" autocomplete="off"> Four BHK
			<i class="fas fa-user ml-2"></i>
		</label>

		<label class="btn btn-cyan btn-rounded form-check-label waves-effect waves-light">
			<input class="form-check-input" type="radio" name="property_size_1" value="5 BHK" autocomplete="off"> Five BHK
			<i class="fas fa-code ml-2"></i>
		</label>
    </div>

</div>

<!-- <div class="form-group table-wrap">

<table cellspacing="0" class="table-cart shop_table shop_table_responsive cart woocommerce-cart-form__contents table">
	<thead>
		<th>&nbsp;</th>
		<th style="text-align: left;">Property Type</th>
		<th>Quantity</th>
		<th>&nbsp;</th>
	</thead>

	<tbody>
		<tr>
			<td class="product-thumb"> <a href="#" class="item-thumb"> <img src="images/images-1.jpg" alt="" class="image-list"> </a> </td>
			<td class="product-detail" data-title="Product Detail"> <div> <a href="#">Room</a> </div> </td>
			<td class="product-quantity" data-title="Quantity">
				<div class="quantity" id="setRooms">
					<span class="plus">+</span>
					<input type="number" class="input-text qty text" min="0" max="" name="property[room]" value="1" title="Qty" size="4" pattern="[0-9]*" />
					<span class="minus">-</span>
				</div>
			</td>
			<td class="product-remove"> <a href="#"> <i class="zmdi zmdi-close-circle-o"></i> </a> </td>
		</tr>

		<tr>
			<td class="product-thumb"> <a href="#" class="item-thumb"> <img src="images/images-2.png" alt="" class="image-list"> </a> </td>
			<td class="product-detail" data-title="Product Detail"> <div> <a href="#">Hall</a> </div> </td>
			<td class="product-quantity" data-title="Quantity">
			<div class="quantity">
			<span class="plus">+</span>
			<input type="number" class="input-text qty text" min="0" max="" name="property[hall]" value="1" title="Qty" size="4" pattern="[0-9]*" />
			<span class="minus">-</span>
			</div></td>
			<td class="product-remove"> <a href="#"> <i class="zmdi zmdi-close-circle-o"></i> </a> </td>
		</tr>

		<tr>
			<td class="product-thumb"> <a href="#" class="item-thumb"> <img src="images/images-3.jpg" alt="" class="image-list"> </a> </td>
			<td class="product-detail" data-title="Product Detail"> <div> <a href="#">Kitchen</a> </div> </td>
			<td class="product-quantity" data-title="Quantity">
			<div class="quantity">
			<span class="plus">+</span>
			<input type="number" class="input-text qty text" min="0" max="" name="property[kitchen]" value="1" title="Qty" size="4" pattern="[0-9]*" />
			<span class="minus">-</span>
			</div></td>
			<td class="product-remove"> <a href="#"> <i class="zmdi zmdi-close-circle-o"></i> </a> </td>
		</tr>

		<tr>
			<td class="product-thumb"> <a href="#" class="item-thumb"> <img src="images/images-4.jpg" alt="" class="image-list"> </a> </td>
			<td class="product-detail" data-title="Product Detail"> <div> <a href="#">Bathroom</a> </div> </td>
			<td class="product-quantity" data-title="Quantity">
			<div class="quantity">
			<span class="plus">+</span>
			<input type="number" class="input-text qty text" min="0" max="" name="property[bathroom]" value="1" title="Qty" size="4" pattern="[0-9]*" />
			<span class="minus">-</span>
			</div></td>
			<td class="product-remove"> <a href="#"> <i class="zmdi zmdi-close-circle-o"></i> </a> </td>
		</tr>
	</tbody>
</table>
</div> -->

</section>

<h4></h4>
<section>
<h3>Inspection Engineer Details</h3>
	<?php include("autocompletelocation.php"); ?>
</section>

<h4></h4>
<section>

<label for="email">Select Available Date :</label>	
	<div class="form-group">
		<div class="form-holder">
		<i class="zmdi zmdi-calendar"></i>
			<input class="form-control" id="avail_date" name="avail_date" placeholder="YYYY-MM-DD" type="text" />
		</div>
    </div>

<label for="email">When Do You Expect To Renovate The Property ?</label>
	<div class="form-group">
		<div class="form-holder">
			<i class="zmdi zmdi-home"></i>
			<select class="form-control" name="expect_time">
				<option value="Within a Month">Within a Month</option>
				<option value="Within 3 Months">Within 3 Months</option>
				<option value="Within 6 Months">Within 6 Months</option>
				<option value="Within a year">Within a year</option>
			</select>
		</div>
	</div>

	<div class="form-group">
		<div class="form-holder" style="float: right;">
			<!-- <input type="submit" class="btn btn-warning btn-style-new" name="savelatter" value="Save For Later !"> -->
			<input type="submit" class="btn btn-warning btn-style-new" name="savenow" value="Submit Now !">
		</div>
	</div>
	
</section>

<script>
    $(document).ready(function(){
      var date_input=$('input[name="avail_date"]'); //our date input has the name "date"
      var container=$('.bootstrap-iso form').length>0 ? $('.bootstrap-iso form').parent() : "body";
	  var date = new Date();
		  date.setDate(date.getDate()+3);
      var options={
        format: 'yyyy-mm-dd',
        container: container,
        todayHighlight: true,
        autoclose: true,
		startDate: date,
      };
      date_input.datepicker(options);

	    $('#wizard').submit(function(e) {
			var autocomplete = $('#autocomplete').val();
			var locality = document.getElementsByName('locality');
			var postal_code = document.getElementsByName('postal_code');

			if (autocomplete.length < 1) {
				e.preventDefault();
			    alert("Please enter work location.");
			}else if (locality < 1) {
				e.preventDefault();
			    alert("Please Enter Your City.");
			}else if (postal_code < 1) {
				e.preventDefault();
			    alert("Please Enter Your Pin Code.");
			}
		});
<?php if(isset($_SESSION['customerSession']['askfordashboard']) && $_SESSION['customerSession']['askfordashboard'] == "yes"){ ?>
		$(window).on('load',function(){
	        $('#myModal').modal('show');
	    });
<?php  }   ?>
    });
</script>

</form>
</div>

<!-- Modal HTML start-->
    <div id="myModal" class="modal fade" data-keyboard="false" data-backdrop="static">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title">Renovation Experts</h4>
                </div>
                <div class="modal-body">
                    <h2>Welcome from Renovation Experts.</h2>
                    <p>If you have 15 minuts for filling quick estimate form. Please click on Quick Estimate Now or you can go stright to your dashboard by clicking on Quick Estimate Later.</p>

                    <p style="text-align: center;">
                    	<a href="index.php?ses=rmv"><button class="btn btn-warning">Quick Estimate Now</button></a>
                    	<a href="dashboard.php"><button class="btn btn-warning">Quick Estimate Later</button></a>
                    </p>
                    
                </div>
                <div class="modal-footer">
                    
                </div>
            </div>
        </div>
    </div>
	
<!---Model End--->

<script src="js/form.js"></script>

<!-- <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCdTKTiAm0KNLq7NX6yKrV45Z2PwXNrD4I&libraries=places&callback=initAutocomplete"
        async defer></script> -->

<?php include 'footer.php';?>