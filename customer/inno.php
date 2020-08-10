<div id="inno" style="display: none;">
<form id="innoFormMeasurement" action="../controller/addMeasurementSheet.php" method="post" enctype="multipart/form-data">
  <input type="hidden" id="innoPropertyId" name="propertyId" value="">                  
  <input type="hidden" id="innoPropertyDetailsWorkId" name="propertyDetailsWorkId" value="">
  <input type="hidden" name="flag" value="inno"> 
                    
  <div class="row">
	<div class="col-md-3">
	  <label class="bmd-label-floating">Existing Drawing</label>
	  <input type="file" name="existing_drawing" id="existing_drawing" class="form-control">
	</div>
	<div class="col-md-3">
	  <label class="bmd-label-floating">Concept Picture</label>
	  <input type="file" name="concept_picture" id="concept_picture" class="form-control">
	</div>
	<div class="col-md-3">
	  <label class="bmd-label-floating">Proposed Drawing</label>
	  <input type="file" name="proposed_drawing" id="proposed_drawing" class="form-control">
	</div>
	<div class="col-md-3">
	  <label class="bmd-label-floating">Other Picture</label>
	  <input type="file" name="other_picture" id="other_picture" class="form-control">
	</div>
  </div></br>
  
  <div class="row">
	<div class="col-md-6">
	  <div class="form-group bmd-form-group is-filled">
		<label class="bmd-label-floating">Item Nomenclature</label>
		<input type="text" name="item_nomenclature" id="item_nomenclature" class="form-control" value="">
	  </div>
	</div>
	<div class="col-md-2">
	  <div class="form-group bmd-form-group is-filled">
		<label class="bmd-label-floating">in_numbers</label>
		<input type="text" name="in_numbers" id="inno_in_numbers" class="form-control" value="0" onkeyup="innoCalculation()">
	  </div>
	</div>
	<div class="col-md-2">
	  <div class="form-group bmd-form-group is-filled">
		<label class="bmd-label-floating">Unit</label>
		<input type="text" name="unit" id="innoUnit" class="form-control" value="">
	  </div>
	</div>
	<div class="col-md-2">
	  <div class="form-group bmd-form-group is-filled">
		<label class="bmd-label-floating">Quantity</label>
		<input type="text" name="quantity" id="inno_quantity" class="form-control" value="" readonly>
	  </div>
	</div>
  </div>

  <input type="submit" class="btn btn-warning pull-right btn-sm" value="Add Measurement !">
  <div class="clearfix"></div>
</form>
</div>