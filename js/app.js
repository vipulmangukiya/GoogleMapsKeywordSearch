var URL = 'http://localhost/maps/';
 var latitude = "",
   	longitude ="",
   	latLong="",
   	map="",
   	infowindow="";

$(document).ready(function(){
	 if (navigator.geolocation) {
        navigator.geolocation.getCurrentPosition(getLocation);
    } else { 
        alert("Browser Doesn't Support Location");
    }    
   
    function getLocation(position) { // the Current Location
    	 	 latitude = position.coords.latitude;
   		 	 longitude = position.coords.longitude;	 	
			watch(latitude,longitude);
    }
  function watch(latitude,longitude) {
			 latLong = new google.maps.LatLng(latitude,longitude);
			var mapOptions = {
						center: latLong,
						zoom: 15,
						mapTypeId: google.maps.MapTypeId.ROADMAP
				};
			 map = new google.maps.Map(document.getElementById("map"),mapOptions);
			var marker = new google.maps.Marker({
				position: latLong,
				map: map,
				title: 'Current'
			});
		}
//- Send Current Location to Server
	function sendLocationDB(latitude,longitude) {
		var user_id = 1;
		$.ajax({
			type:'POST',
			url:'inc/sendLocation.php',
			dataType:'json',
			data:{
				latitude:latitude,
				longitude:longitude,
				user_id:user_id
			},
			success: function(data) {
				console.log(data);
			},
			error: function(textStatus ,error, jqXHR) {
				console.log(error);
			}
		});
	}
	$("#btn_send").on("click", function(){
		sendLocationDB(latitude,longitude);
	});

//-----Search Nearby Location------------------------------------

	$("#btn_search").on("click", function(){
		var keyword = $("#seearch_txt").val();

			var request = {  /// search keyword request valus like rang of area, and name of search like atm,bank
		    location: latLong,
		    radius: 5500,
		    types: [keyword]
		  };

		  infowindow = new google.maps.InfoWindow();  // creating infomation window for search marker
		  var service = new google.maps.places.PlacesService(map);
		  service.nearbySearch(request, callback);

		  function callback(results, status) {
			  if (status == google.maps.places.PlacesServiceStatus.OK) {
			    for (var i = 0; i < results.length; i++) {
			      createMarker(results[i]);
			    }
			  }
			}
			function createMarker(place) { // create search Result Marker and set there name
			  var placeLoc = place.geometry.location;
			  var marker = new google.maps.Marker({
			    map: map,
			    position: place.geometry.location
			  });

			  google.maps.event.addListener(marker, 'click', function() {
			    infowindow.setContent(place.name);
			    infowindow.open(map, this);
			  });
			}
			google.maps.event.addDomListener(window, 'load',navigator.geolocation.getCurrentPosition(getLocation)); /// refresh map when new search 
	});
});

