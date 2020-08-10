<div id="rft" style="display: none;">
<form id="rftFormMeasurement" action="../controller/addMeasurementSheet.php" method="post" enctype="multipart/form-data">
  <input type="hidden" id="rftPropertyId" name="propertyId" value="">                  
  <input type="hidden" id="rftPropertyDetailsWorkId" name="propertyDetailsWorkId" value="">
  <input type="hidden" name="flag" value="rft">  
                    
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
        <input type="text" name="length_feet" id="rft_length_feet" class="form-control" value="0" onkeyup="rftCalculation()">
      </div>
    </div>
    <div class="col-md-3">
      <div class="form-group bmd-form-group is-filled">
        <label class="bmd-label-floating">Length(Inches)</label>
        <input type="text" name="length_inch" id="rft_length_inch" class="form-control" value="0" onkeyup="rftCalculation()">
      </div>
    </div>
    <div class="col-md-3">
      <div class="form-group bmd-form-group is-filled">
        <label class="bmd-label-floating">No Of Detail</label>
        <input type="text" name="no_of_detail" id="rft_no_of_detail" class="form-control" value="1" onkeyup="rftCalculation()">
      </div>
    </div>
    <div class="col-md-3">
      <div class="form-group bmd-form-group is-filled">
        <label class="bmd-label-floating">Unit</label>
        <input type="text" name="unit" id="rftUnit" class="form-control" value="">
      </div>
    </div>
  </div>
  
  <div class="row">
    <div class="col-md-5">
      <div class="form-group bmd-form-group is-filled">
        <label class="bmd-label-floating">Wall Nomenclature</label>
        <input type="text" name="wall_nomenclature" id="wall_nomenclature" class="form-control" value="">
      </div>
    </div>
    <div class="col-md-5">
      <div class="form-group bmd-form-group is-filled">
        <label class="bmd-label-floating">Item Nomenclature</label>
        <input type="text" name="item_nomenclature" id="item_nomenclature" class="form-control" value="">
      </div>
    </div>
    <div class="col-md-2">
      <div class="form-group bmd-form-group is-filled">
        <label class="bmd-label-floating">Quantity</label>
        <input type="text" name="quantity" id="rft_quantity" class="form-control" value="" readonly>
      </div>
    </div>
  </div>

  <input type="submit" class="btn btn-warning pull-right btn-sm" value="Add Measurement !">
  <div class="clearfix"></div>
</form>
</div>