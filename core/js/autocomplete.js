
function initAutocomplete() {
        // Create the autocomplete object, restricting the search to geographical
        // location types.
        autocomplete = new google.maps.places.Autocomplete(
            /** @type {!HTMLInputElement} */(document.getElementById('search')),
            {types: ['geocode']});

        // When the user selects an address from the dropdown, populate the address
        // fields in the form.
        autocomplete.addListener('place_changed', fillInAddress);
      }

    function fillInAddress() {

		var place = autocomplete.getPlace();
		var components = place.address_components;
		var street;
		var num = " ";
		var str_name = " ";
		var sub = " ";
		var city = " ";
		var province = " ";
		var zip = " ";
		
		for (var i = 0, component; component = components[i]; i++) {
			console.log(component);
			if (component.types[0] == 'street_number') {
				num = component['long_name'];
			}
			if (component.types[0] == 'route') {
				str_name = component['long_name'];
			}
			if (component.types[0] == 'sublocality_level_1') {
				sub = component['long_name'];
			}
			if (component.types[0] == 'locality') {
				city = component['long_name'];
			}
			if (component.types[0] == 'administrative_area_level_1') {
				province = component['long_name'];
			}
			if (component.types[0] == 'postal_code') {
				zip = component['long_name'];
			}
		}
		street = num + ' ' + str_name + ' ' + sub;
		document.getElementById('street').value = street;
		document.getElementById('city').value = city;
		document.getElementById('province').value = province;
		document.getElementById('zip').value = zip;
    }

      // Bias the autocomplete object to the user's geographical location,
      // as supplied by the browser's 'navigator.geolocation' object.
      function geolocate() {
        if (navigator.geolocation) {
          navigator.geolocation.getCurrentPosition(function(position) {
            var geolocation = {
              lat: position.coords.latitude,
              lng: position.coords.longitude
            };
            var circle = new google.maps.Circle({
              center: geolocation,
              radius: position.coords.accuracy
            });
            autocomplete.setBounds(circle.getBounds());
          });
        }
      }