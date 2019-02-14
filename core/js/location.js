//window.onload = displayLocation;
var geocoder;
var count = 1;
function getMyLocation(){ 
	if(navigator.geolocation){
		navigator.geolocation.getCurrentPosition(showPosition);
		
	}else{
		console.log('failure');
	}
}

function showPosition(position){
	//get Latitude and longitude
	var lat = position.coords.latitude;
    var lng = position.coords.longitude;
	
    displayLocation(lat, lng);

    var log_data = JSON.parse(document.getElementById('log_data').innerHTML);
  	codeAddress(log_data, lat, lng);
}



  function codeAddress(log_data, lat, lng) {
  	Array.prototype.forEach.call(log_data, function(data){
  		var address = data.street + ', ' + data.city + ', ' + data.state;
	    var count = 1;
	    geocoder.geocode( { 'address': address}, function(results, status) {
	      if (status == 'OK') {
	       	var des_lat = results[0].geometry.location.lat();
	       	var des_lng = results[0].geometry.location.lng();

	        var origin = new google.maps.LatLng(lat, lng);
			
			var destination = new google.maps.LatLng(des_lat, des_lng);

			var service = new google.maps.DistanceMatrixService();
			service.getDistanceMatrix(
			  {
			    origins: [origin],
			    destinations: [destination],
			    travelMode: 'DRIVING',
			    unitSystem: google.maps.UnitSystem.metric,
			    avoidHighways: false,
			    avoidTolls: false,
			  }, callback);


	      } else {
	        alert('Geocode was not successful for the following reason: ' + status);
	      }
    	});
    	
    });

  }


  function callback(response, status) {
  	 if (status == 'OK') {
  	 	 var distance = response.rows[0].elements[0].distance;
         $('#distance_' + count).html(distance.text);
         count ++;
  	}
  }

//Get and display location of technician
function displayLocation(lat, lng){
          geocoder = new google.maps.Geocoder();
          var latlng = new google.maps.LatLng(lat, lng);
          geocoder.geocode({
              'latLng': latlng
          }, function(results, status) {
              if (status == google.maps.GeocoderStatus.OK) {
                  if (results[0]) {
                      var add = results[0].formatted_address;
                      $('#location').html(add);
                  } else {
                  	$('#location').html("Could not find your location");
                  }
              } else {
                  $('#location').html("Geocoder failed due to: " + status);
              }
          });
}



