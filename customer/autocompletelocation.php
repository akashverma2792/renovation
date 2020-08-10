<label for="email">Where Do You Want This Work Done ?</label>
<div class="form-group">
  <div class="form-holder">
  <i class="zmdi zmdi-home"></i>
    <div id="locationField">
        <input id="autocomplete" class="form-control" placeholder="Enter your address" onFocus="geolocate()" name="location" type="text"/>
    </div>
  </div>
</div>

<input type="hidden" class="field" id="route" />
<input type="hidden" class="field" id="street_number" disabled="true"/>
<input type="hidden" class="field" id="administrative_area_level_1" disabled="true"/>
<input type="hidden" class="field" id="country" disabled="true"/>

<label for="email">Your city ?</label>
<div class="form-group">
  <div class="form-holder">
    <i class="zmdi zmdi-home"></i>
    <input class="form-control" name="city" id="locality" placeholder="Enter your city"/>
  </div>
</div>

<label for="email">Your Pin Code ?</label>
<div class="form-group">
  <div class="form-holder">
    <i class="zmdi zmdi-home"></i>
    <input class="form-control" name="pincode" id="postal_code" placeholder="Enter your pin code" />
  </div>
</div>

<script>

var placeSearch, autocomplete;

var componentForm = {
  street_number: 'short_name',
  route: 'long_name',
  locality: 'long_name',
  administrative_area_level_1: 'short_name',
  country: 'long_name',
  postal_code: 'short_name'
};

function initAutocomplete() {
  autocomplete = new google.maps.places.Autocomplete(
      document.getElementById('autocomplete'), {types: ['geocode']});
  autocomplete.setFields(['address_component']);
  autocomplete.addListener('place_changed', fillInAddress);
}

function fillInAddress() {
  var place = autocomplete.getPlace();

  for (var component in componentForm) {
    document.getElementById(component).value = '';
    document.getElementById(component).disabled = false;
  }

  for (var i = 0; i < place.address_components.length; i++) {
    var addressType = place.address_components[i].types[0];
    if (componentForm[addressType]) {
      var val = place.address_components[i][componentForm[addressType]];
      document.getElementById(addressType).value = val;
    }
  }
}

function geolocate() {
  if (navigator.geolocation) {
    navigator.geolocation.getCurrentPosition(function(position) {
      var geolocation = {
        lat: position.coords.latitude,
        lng: position.coords.longitude
      };
      var circle = new google.maps.Circle(
          {center: geolocation, radius: position.coords.accuracy});
      autocomplete.setBounds(circle.getBounds());
    });
  }
}
    </script>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCdTKTiAm0KNLq7NX6yKrV45Z2PwXNrD4I&libraries=places&callback=initAutocomplete"
        async defer></script>
  </body>
</html>