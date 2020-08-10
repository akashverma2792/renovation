<div id="sqftandrft" style="display: none;">
<form id="sqftandrftFormMeasurement" action="../controller/addMeasurementSheet.php" method="post" enctype="multipart/form-data">
  <input type="hidden" id="sqftandrftPropertyId" name="propertyId" value="">                  
  <input type="hidden" id="sqftandrftPropertyDetailsWorkId" name="propertyDetailsWorkId" value="">
  <input type="hidden" name="flag" value="sqftandrft">                  
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
      <div class="col-md-4">
        <div class="form-group bmd-form-group is-filled">
          <label class="bmd-label-floating">Wall Nomenclature</label>
          <input type="text" name="wall_nomenclature" id="wall_nomenclature" class="form-control" value="">
        </div>
      </div>
      <div class="col-md-4">
        <div class="form-group bmd-form-group is-filled">
          <label class="bmd-label-floating">Item Nomenclature</label>
          <input type="text" name="item_nomenclature" id="item_nomenclature" class="form-control" value="">
        </div>
      </div>
      <div class="col-md-4">
        <div class="form-group bmd-form-group is-filled">
          <label class="bmd-label-floating">Deduction Nomenclature</label>
          <input type="text" name="deduction_nomenclature" id="deduction_nomenclature" class="form-control" value="">
        </div>
      </div>
    </div>
    
    <div class="row">
      <div class="col-md-3">
        <div class="form-group bmd-form-group is-filled">
          <label class="bmd-label-floating">Length(Feet)</label>
          <input type="text" name="length_feet" id="sqftandrft_length_feet" class="form-control" value="0" onkeyup="sqftandrftCalculation()">
        </div>
      </div>
      <div class="col-md-3">
        <div class="form-group bmd-form-group is-filled">
          <label class="bmd-label-floating">Length(Inches)</label>
          <input type="text" name="length_inch" id="sqftandrft_length_inch" class="form-control" value="0" onkeyup="sqftandrftCalculation()">
        </div>
      </div>
      <div class="col-md-3">
        <div class="form-group bmd-form-group is-filled">
          <label class="bmd-label-floating">Breadth(Feet)</label>
          <input type="text" name="breadth_feet" id="sqftandrft_breadth_feet" class="form-control" value="1" onkeyup="sqftandrftCalculation()">
        </div>
      </div>
      <div class="col-md-3">
        <div class="form-group bmd-form-group is-filled">
          <label class="bmd-label-floating">Breadth(Inches)</label>
          <input type="text" name="breadth_inch" id="sqftandrft_breadth_inch" class="form-control" value="0" onkeyup="sqftandrftCalculation()">
        </div>
      </div>
    </div>
    
    <div class="row">
      <div class="col-md-3">
        <div class="form-group bmd-form-group is-filled">
          <label class="bmd-label-floating">Deduction Length(Feet)</label>
          <input type="text" name="deduction_length_feet" id="sqftandrft_deduction_length_feet" class="form-control" value="0" onkeyup="sqftandrftCalculation()">
        </div>
      </div>
      <div class="col-md-3">
        <div class="form-group bmd-form-group is-filled">
          <label class="bmd-label-floating">Deduction Length(Inches)</label>
          <input type="text" name="deduction_length_inch" id="sqftandrft_deduction_length_inch" class="form-control" value="0" onkeyup="sqftandrftCalculation()">
        </div>
      </div>
      <div class="col-md-3">
        <div class="form-group bmd-form-group is-filled">
          <label class="bmd-label-floating">Deduction Breadth(Feet)</label>
          <input type="text" name="deduction_breadth_feet" id="sqftandrft_deduction_breadth_feet" class="form-control" value="1" onkeyup="sqftandrftCalculation()">
        </div>
      </div>
      <div class="col-md-3">
        <div class="form-group bmd-form-group is-filled">
          <label class="bmd-label-floating">Deduction Breadth(Inches)</label>
          <input type="text" name="deduction_breadth_inch" id="sqftandrft_deduction_breadth_inch" class="form-control" value="0" onkeyup="sqftandrftCalculation()">
        </div>
      </div>
    </div>
    
    <div class="row">
      <div class="col-md-3">
        <div class="form-group bmd-form-group is-filled">
          <label class="bmd-label-floating">Quantity</label>
          <input type="text" name="quantity" id="sqftandrft_quantity" class="form-control" value="" readonly>
        </div>
      </div>
      <div class="col-md-3">
        <div class="form-group bmd-form-group is-filled">
          <label class="bmd-label-floating">Deduction Quantity</label>
          <input type="text" name="deduction_quantity" id="sqftandrft_deduction_quantity" class="form-control" value="" readonly>
        </div>
      </div>
      <div class="col-md-3">
        <div class="form-group bmd-form-group is-filled">
          <label class="bmd-label-floating">Unit</label>
          <input type="text" name="unit" id="sqftandrftUnit" class="form-control" value="">
        </div>
      </div>
      <div class="col-md-3">
        <div class="form-group bmd-form-group is-filled">
          <label class="bmd-label-floating">Area</label>
          <input type="text" name="area" id="sqftandrft_area" class="form-control" value="" readonly>
        </div>
      </div>
    </div>

    <input type="submit" class="btn btn-warning pull-right btn-sm" value="Add Measurement !">
    <div class="clearfix"></div>
</form>
</div>