<div id="sqft" style="display: none;">
<form id="sqftFormMeasurement" action="../controller/addMeasurementSheet.php" method="post" enctype="multipart/form-data">
  <input type="hidden" id="sqftPropertyId" name="propertyId" value="">                  
  <input type="hidden" id="sqftPropertyDetailsWorkId" name="propertyDetailsWorkId" value="">
  <input type="hidden" name="flag" value="sqft">  
                    
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
    <div class="col-md-3">
      <div class="form-group bmd-form-group is-filled">
        <label class="bmd-label-floating">Length(Feet)</label>
        <input type="text" name="length_feet" id="sqft_length_feet" class="form-control" value="0" onkeyup="sqftCalculation()">
      </div>
    </div>
    <div class="col-md-3">
      <div class="form-group bmd-form-group is-filled">
        <label class="bmd-label-floating">Length(Inches)</label>
        <input type="text" name="length_inch" id="sqft_length_inch" class="form-control" value="0" onkeyup="sqftCalculation()">
      </div>
    </div>
    <div class="col-md-3">
      <div class="form-group bmd-form-group is-filled">
        <label class="bmd-label-floating">Breadth(Feet)</label>
        <input type="text" name="breadth_feet" id="sqft_breadth_feet" class="form-control" value="1" onkeyup="sqftCalculation()">
      </div>
    </div>
    <div class="col-md-3">
      <div class="form-group bmd-form-group is-filled">
        <label class="bmd-label-floating">Breadth(Inches)</label>
        <input type="text" name="breadth_inch" id="sqft_breadth_inch" class="form-control" value="0" onkeyup="sqftCalculation()">
      </div>
    </div>
  </div>
  
  <div class="row">
    <div class="col-md-6">
      <div class="form-group bmd-form-group is-filled">
        <label class="bmd-label-floating">Ceiling Nomenclature</label>
        <input type="text" name="ceiling_nomenclature" id="ceiling_nomenclature" class="form-control" value="">
      </div>
    </div>
    <div class="col-md-3">
      <div class="form-group bmd-form-group is-filled">
        <label class="bmd-label-floating">Unit</label>
        <input type="text" name="unit" id="sqftUnit" class="form-control" value="">
      </div>
    </div>
    <div class="col-md-3">
      <div class="form-group bmd-form-group is-filled">
        <label class="bmd-label-floating">Quantity</label>
        <input type="text" name="quantity" id="sqft_quantity" class="form-control" value="" readonly>
      </div>
    </div>
  </div>

  <input type="submit" class="btn btn-warning pull-right btn-sm" value="Add Measurement !">
  <div class="clearfix"></div>
</form>
</div>