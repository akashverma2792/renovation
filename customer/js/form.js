function checkAvailability(){
	var inspt_eng = document.getElementsByName('inspt_eng');;
	var date = document.getElementById("avail_date").value;

for(i = 0; i < inspt_eng.length; i++) { 
    if(inspt_eng[i].checked) {
      id = inspt_eng[i].value;
    }
}

	if(id != "" && date != ""){
		var xmlhttp = new XMLHttpRequest();
	    xmlhttp.onreadystatechange = function() {
	      if (this.readyState == 4 && this.status == 200) {
	      	document.getElementById("timeslote").innerHTML = this.responseText;
	      }
	    };
	    xmlhttp.open("GET", "../controller/ajax.php?type=checktimeslot&id=" + id +"&avldate=" + date, true);
	    xmlhttp.send();
	}

}

function showPreview(){
	var property_flore = document.getElementsByName('property_flore'); 
	var property_size = document.getElementsByName('property_size'); 
	var blueprint = document.getElementById('upload-file-info').innerHTML; 
	var avail_date = document.getElementById('avail_date').value; 
	var timeslote = document.getElementById('timeslote').value; 

    for(i = 0; i < property_flore.length; i++) { 
        if(property_flore[i].checked) {
        	var property_flore_new = property_flore[i].value;
        }
        
    }

    for(i = 0; i < property_size.length; i++) { 
        if(property_size[i].checked) {
        	var property_size_new = property_size[i].value;
        }
        
    }
	var content = "<tr><th>Blueprint File :</th><td> "+blueprint+" </td></tr><tr><th>Number Of Floores :</th><td> "+property_flore_new+" </td></tr><tr><th>Property Size  :</th><td> "+property_size_new+" </td></tr><tr><th>Inspection Date  :</th><td> "+avail_date+" </td></tr><tr><th>Inspection Time  :</th><td> "+timeslote+" </td></tr>";

	document.getElementById('setPropertyPreview').innerHTML = content;
}

function getPropertySpaces(id){
	if(id != ""){
		var xmlhttp = new XMLHttpRequest();
	    xmlhttp.onreadystatechange = function() {
	      if (this.readyState == 4 && this.status == 200) {
	      	document.getElementById("sowSetId").innerHTML = this.responseText;
	      }
	    };
	    xmlhttp.open("GET", "../controller/ajax.php?type=propertySpaces&id=" + id, true);
	    xmlhttp.send();
	}
}

function spacDetsils(name,id,prop_id,cust_id,floor_num="",floor_num_count=""){
	var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
      if (this.readyState == 4 && this.status == 200) {
      	document.getElementById("propertySpaceId").innerHTML = this.responseText;
      }
    };
    xmlhttp.open("GET", "../controller/ajax.php?type=spacDetsils&id="+id+"&name="+name+"&prop_id="+prop_id+"&cust_id="+cust_id+"&floor_num="+floor_num+"&floor_num_count="+floor_num_count, true);
    xmlhttp.send();
}

function showProjectDetails(id){
	var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
      if (this.readyState == 4 && this.status == 200) {
      	document.getElementById("setContentProjectDetsils").innerHTML = this.responseText;
      }
    };
    xmlhttp.open("GET", "../controller/ajax2.php?type=projectDetsils&id="+id, true);
    xmlhttp.send();
}

function addMoreWork(){
	var workCount = document.getElementById('workCount').value; 
	var workAdd = document.querySelector('div.workAdd');
	var active = document.querySelector(".workAdd");
	active.classList.remove("workAdd");

	var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
      if (this.readyState == 4 && this.status == 200) {
      	workAdd.insertAdjacentHTML('afterend',this.responseText);
      	document.getElementById('workCount').value = (parseInt(workCount) + 1);
      }
    };
    xmlhttp.open("GET", "../controller/ajax2.php?type=moreWorkAdd&workCount="+workCount, true);
    xmlhttp.send();
}

function deleteMe(id,removeid){
	var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
      if (this.readyState == 4 && this.status == 200) {
      	$('table tr#'+removeid).remove();
      }
    };
    xmlhttp.open("GET", "../controller/ajax2.php?type=deleteMe&id="+id, true);
    xmlhttp.send();
}

function removePropertySpaces(id){
	var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
      if (this.readyState == 4 && this.status == 200) {
      	document.getElementById("sowButton").click();
      	document.getElementById("propertySpaceId").innerHTML = "";
      }
    };
    xmlhttp.open("GET", "../controller/ajax2.php?type=removePropertySpaces&id="+id, true);
    xmlhttp.send();
}

function getPropertyFloors(val){
	var data = "";
	for(var i=1; i<=val; i++){
		data += '<label for="email" style="padding-right: 30px;">'+i+' Floor :</label> <div class="btn-group" data-toggle="buttons"> <input type="hidden" name="floor_num[]" value="'+i+'"> <label class="btn btn-cyan btn-rounded form-check-label waves-effect waves-light active" style="border-radius: 20px 0px 0px 20px;"> <input class="form-check-input" type="radio" name="property_size_'+i+'" value="1 BHK" checked autocomplete="off"> One BHK <i class="far fa-gem ml-2"></i> </label> <label class="btn btn-cyan btn-rounded form-check-label waves-effect waves-light"> <input class="form-check-input" type="radio" name="property_size_'+i+'" value="2 BHK" autocomplete="off"> Two BHK <i class="fas fa-user ml-2"></i> </label> <label class="btn btn-cyan btn-rounded form-check-label waves-effect waves-light"> <input class="form-check-input" type="radio" name="property_size_'+i+'" value="4 BHK" autocomplete="off"> Four BHK <i class="fas fa-user ml-2"></i> </label> <label class="btn btn-cyan btn-rounded form-check-label waves-effect waves-light"> <input class="form-check-input" type="radio" name="property_size_'+i+'" value="5 BHK" autocomplete="off"> Five BHK <i class="fas fa-code ml-2"></i> </label> </div></br></br>';
	}

	document.getElementById("setPropertyFloors").innerHTML = data;
}

function getCategory(id,setid1,setid2){
    var addHed = '<option value="">Select Head Category</option>';
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
      if (this.readyState == 4 && this.status == 200) {
        document.getElementById(setid1).innerHTML = addHed+this.responseText;
        document.getElementById(setid2).innerHTML = '<option value="">Select Head Category First</option>';
      }
    };
    xmlhttp.open("GET", "../controller/ajax.php?id=" + id +"&type=headsub", true);
    xmlhttp.send();
  }

function getSubCategory(id,setid1){
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
      if (this.readyState == 4 && this.status == 200) {
        document.getElementById(setid1).innerHTML = this.responseText;
      }
    };
    xmlhttp.open("GET", "../controller/ajax.php?id=" + id +"&type=headsubcategory", true);
    xmlhttp.send();
}

function updateCurrentSpace(){
    var name = document.getElementById("name").value;
    var spac_id = document.getElementById("spac_id").value;
    var description = document.getElementById("description").value;
    var customer_id = document.getElementById("customer_id").value;
    var property_id = document.getElementById("property_id").value;
    var workCount = document.getElementById("workCount").value;
    var floor_num = document.getElementById("floor_num").value;

    var head_id = new Array();
    var head_cat_id = new Array();
    var head_subcat_id = new Array();

    if(name != "" && workCount != ""){

      for(var i=1;i<=parseInt(workCount);i++){
        head_id[i] = document.getElementById("head_id_"+i).value;
        head_cat_id[i] = document.getElementById("setCategory_"+i).value;
        head_subcat_id[i] = document.getElementById("setSubCategory_"+i).value;
      }

      var xmlhttp = new XMLHttpRequest();
      xmlhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
          md.showNotification('bottom','center','Success ! Processes Done. Please choose anothore space','warning');
          document.getElementById("sowButton").click();

          $(document).ready(function() {
            setTimeout(function() {
              if(spac_id != ""){
                var clcid = "tab_"+spac_id;
              }else{
                var clcid = "1234";
              }

              $("#"+clcid).trigger('click');
            }, 1000);
          });
        }
      };
      xmlhttp.open("GET", "../controller/ajax.php?name="+name+"&type=updatePropertySpace&spac_id="+spac_id+"&head_id="+head_id+"&head_cat_id="+head_cat_id+"&head_subcat_id="+head_subcat_id+"&description="+description+"&customer_id="+customer_id+"&property_id="+property_id+"&workCount="+workCount+"&floor_num="+floor_num, true);
      xmlhttp.send();

    }else{
      md.showNotification('bottom','center','Error ! Please Fill Form.','danger');
    }

}

function getMeasurementSheet(id){
  document.getElementById("sowSetId").innerHTML = "";
  document.getElementById("propertySpaceId").innerHTML = "";
  if(id != ""){
    var xmlhttp = new XMLHttpRequest();
      xmlhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
          document.getElementById("sowSetId").innerHTML = this.responseText;
        }
      };
      xmlhttp.open("GET", "../controller/ajax2.php?type=measurementSheet&id=" + id, true);
      xmlhttp.send();
  }
}

function getMeasurementSheetForm(propertyId,propertyDetailsWorkId,unit){
  if(unit == "Sqft & Rtf"){
    document.getElementById("sqftandrft").style.display = "block";
    document.getElementById("sqft").style.display = "none";
    document.getElementById("rft").style.display = "none";
    document.getElementById("inno").style.display = "none";

    document.getElementById("sqftandrftPropertyId").value = propertyId;
    document.getElementById("sqftandrftPropertyDetailsWorkId").value = propertyDetailsWorkId;
    document.getElementById("sqftandrftUnit").value = unit;
  }

  if(unit == "Sqft"){
    document.getElementById("sqftandrft").style.display = "none";
    document.getElementById("sqft").style.display = "block";
    document.getElementById("rft").style.display = "none";
    document.getElementById("inno").style.display = "none";

    document.getElementById("sqftPropertyId").value = propertyId;
    document.getElementById("sqftPropertyDetailsWorkId").value = propertyDetailsWorkId;
    document.getElementById("sqftUnit").value = unit;
  }

  if(unit == "Rtf"){
    document.getElementById("sqftandrft").style.display = "none";
    document.getElementById("sqft").style.display = "none";
    document.getElementById("rft").style.display = "block";
    document.getElementById("inno").style.display = "none";

    document.getElementById("rftPropertyId").value = propertyId;
    document.getElementById("rftPropertyDetailsWorkId").value = propertyDetailsWorkId;
    document.getElementById("rftUnit").value = unit;
  }

  if(unit == "In No"){
    document.getElementById("sqftandrft").style.display = "none";
    document.getElementById("sqft").style.display = "none";
    document.getElementById("rft").style.display = "none";
    document.getElementById("inno").style.display = "block";

    document.getElementById("innoPropertyId").value = propertyId;
    document.getElementById("innoPropertyDetailsWorkId").value = propertyDetailsWorkId;
    document.getElementById("innoUnit").value = unit;
  }

}


function sqftandrftCalculation(){
  var length_feet = document.getElementById("sqftandrft_length_feet").value;
  var length_inch = document.getElementById("sqftandrft_length_inch").value;
  var breadth_feet = document.getElementById("sqftandrft_breadth_feet").value;
  var breadth_inch = document.getElementById("sqftandrft_breadth_inch").value;

  var length = parseInt(length_feet)+"."+parseInt(length_inch);
  var breadth = parseInt(breadth_feet)+"."+parseInt(breadth_inch);

  var deduction_length_feet = document.getElementById("sqftandrft_deduction_length_feet").value;
  var deduction_length_inch = document.getElementById("sqftandrft_deduction_length_inch").value;
  var deduction_breadth_feet = document.getElementById("sqftandrft_deduction_breadth_feet").value;
  var deduction_breadth_inch = document.getElementById("sqftandrft_deduction_breadth_inch").value;

  var deduction_length = parseInt(deduction_length_feet)+"."+parseInt(deduction_length_inch);
  var deduction_breadth = parseInt(deduction_breadth_feet)+"."+parseInt(deduction_breadth_inch);

  var quantity = length * breadth;
  var deduction_quantity = deduction_length * deduction_breadth;

  document.getElementById("sqftandrft_quantity").value = quantity.toFixed(2);
  document.getElementById("sqftandrft_deduction_quantity").value = deduction_quantity.toFixed(2);
  document.getElementById("sqftandrft_area").value = (quantity - deduction_quantity).toFixed(2);

}

function sqftCalculation(){
  var length_feet = document.getElementById("sqft_length_feet").value;
  var length_inch = document.getElementById("sqft_length_inch").value;
  var breadth_feet = document.getElementById("sqft_breadth_feet").value;
  var breadth_inch = document.getElementById("sqft_breadth_inch").value;

  var length = parseInt(length_feet)+"."+parseInt(length_inch);
  var breadth = parseInt(breadth_feet)+"."+parseInt(breadth_inch);

  var quantity = length * breadth;
  document.getElementById("sqft_quantity").value = quantity.toFixed(2);
}

function rftCalculation(){
  var length_feet = document.getElementById("rft_length_feet").value;
  var length_inch = document.getElementById("rft_length_inch").value;
  var no_of_detail = document.getElementById("rft_no_of_detail").value;

  var length = parseInt(length_feet)+"."+parseInt(length_inch);

  var quantity = length * parseInt(no_of_detail);
  document.getElementById("rft_quantity").value = quantity.toFixed(2);
}

function innoCalculation(){
  var in_numbers = document.getElementById("inno_in_numbers").value;
  document.getElementById("inno_quantity").value = in_numbers;
}

function deleteMeMsrSheet(id){
  var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
      if (this.readyState == 4 && this.status == 200) {
        // $('table tr#rmv-'+id).remove();
        document.getElementById("measurementSheetButton").click();
      }
    };
    xmlhttp.open("GET", "../controller/ajax2.php?type=deleteMeMsrSheet&id="+id, true);
    xmlhttp.send();
}