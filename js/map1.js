// create map object
var map;
// create geocoder object
var geocoder;
// current region
// check the official documentation to change region
// http://code.google.com/apis/maps/documentation/v3/services.html#CountryCodes
// requires a ccTLD (county code top-level domain)
// for a list of ccTLD's visit: http://en.wikipedia.org/wiki/CcTLD
var region = 'uk';
// array of all markers on Map
var markers = new Array();

// on dom ready
$(document).ready(function initialise(){

	// display map by default
	// if the map_canvas id exists
	if($('#map_canvas').length) {
		// set default lat/lng
		var lat = 53.4807125;
		var lng = -2.2343765;

		// create new geocoder object
		geocoder = new google.maps.Geocoder();
		// create new lat/long object
		var latlng = new google.maps.LatLng(lat,lng);

		// set map options
		var myOptions = {
			zoom: 6,
			center: latlng,
			mapTypeId: google.maps.MapTypeId.ROADMAP
		};
		// display map
		map = new google.maps.Map(document.getElementById("map_canvas"), myOptions);
		// show the map div
		$('#map_canvas').show();
	}
	function loadScript() {
		 var script = document.createElement("script");
  		script.type = "text/javascript";
  		script.src = "http://maps.googleapis.com/maps/api/js?key=&sensor=false&callback=initialize";
  		document.body.appendChild(script);
	}
	// if the store locator form is on the page
	if($('#request_search').length) {
		// take over submit action
		$('#request_search').submit(function(){
			// get address
			var address = $('#v_address1').val();
			var distance = $('#distance').val();

			// do lookup if address not empty
			if(address != '') {
				address_lookup(address, distance, region);
			} else {
				$('#ajax_msg').html("<ul class='flash_bad'><li>Please enter a full address or a Postcode</li></ul>");
			}
			
		return false;
		});
	}

	// display map on Add page
	
	if($('#add #map_canvas').length) {
		// set default lat/lng
		var lat = 54.622978;
		var lng = -2.592773;

		// get pre-populated value and focus map
		var display_marker = false;
		if($('#v_latitude').length) {
			val = $('#v_latitude').val()*1;
			if(val != '' && !isNaN(val)) {
				lat = val;
				display_marker = true;
			}
		}
		if($('#v_longitude').length) {
			val = $('#v_longitude').val()*1;
			if(val != '' && !isNaN(val)) {
				lng = val;
			}
		}

		// create new geocoder object
		geocoder = new google.maps.Geocoder();

		// create new lat/long object
		var latlng = new google.maps.LatLng(lat,lng);
		// set map options
		var myOptions = {
			zoom: 8,
			center: latlng,
			mapTypeId: google.maps.MapTypeId.ROADMAP
		};
		// display map
		map = new google.maps.Map(document.getElementById("map_canvas"), myOptions);

		if(display_marker) {
			// create a map marker
			var marker = new google.maps.Marker({
				map: map,
				position: latlng
			});
		}
	}



   if ($("#v_postcode2").val().length > 0) {
     
			// get the entered address
			var address = $("#v_postcode2").val();
			get_address(address,region);
			
   }
                                        
});




/*
	// if store add form is on the page
	if($('#add #v_postcode').length) {
		
		// add an onBlur event
		 $('#add #v_postcode').focus(function(){
		// $("#add input[name='v_postcode']").focus(function(){									 
											 
											 
			// get the entered address
			var address = $(this).val();
			// if address is not empty
			if(address != '') {
				// do the address lookup
				get_address(address,region);
			}
		});
	}

 
 */






/**
 * Get a single address
 * @param string address
 * @param string region
 */
function get_address(address, region) {
	// set default region
	if(region==null || region == '') {
		region = 'uk';
	}

	// address not empty
	if(address != '') {
		$('#ajax_msg').html('<p>Loading...</p>');
		// lookup the address
		geocoder.geocode( {'address':address,'region':region}, function(results, status) {
			// if the address was found
			if(status == google.maps.GeocoderStatus.OK) {
				$('#ajax_msg').html('<p>Map Coordinates Retrieved Successfully</p>');
				// insert lat/long into form
				$('#v_latitude').val( results[0].geometry.location.lat() );
				$('#v_longitude').val( results[0].geometry.location.lng() );

				// set zoom option
				map.setZoom(10);
				// center the map on the new location
				map.setCenter(results[0].geometry.location);

				// create a map marker
				var marker = new google.maps.Marker({
					map: map,
					position: results[0].geometry.location
				});
			} else {
				// display error
				$('#ajax_msg').html('<p>Geocoder failed to retrieve address: '+status+'</p>');
			}
		});
	}
}


/**
 * Lookup an address
 * @param string address
 * @param int distance
 * @param string region
 */
function address_lookup(address,distance,region) {
	// set default region
	if(region==null || region == '') {
		region = 'uk';
	}

	// address not empty
	if(address != '') {
		// show ajax loading image
		$('#map_canvas').html("<img src='./imgs/ajax-loader.gif' alt='Ajax Loading Image' />").show();
		$('#ajax_msg').hide();
		// create new geocoder object
		geocoder = new google.maps.Geocoder();
		// lookup the address
		geocoder.geocode( {'address':address,'region':region}, function(results, status) {
			// if the address was found
			if(status == google.maps.GeocoderStatus.OK) {
				// get lat/lng
				var lat = results[0].geometry.location.lat();
				var lng = results[0].geometry.location.lng();
				var location = results[0].geometry.location;

				// set map options
				var myOptions = {
					zoom: 11,
					center: location,
					mapTypeId: google.maps.MapTypeId.ROADMAP
				};
				// display map
				map = new google.maps.Map(document.getElementById("map_canvas"), myOptions);

				// create a map marker
				var marker = new google.maps.Marker({
					map: map,
					position: results[0].geometry.location,
					title:'Your entered address'
				});

				// clear all markers
				jQuery.each(markers,function(k,v){
					v.setMap(null);
				});

				// do ajax request to find nearby stores
				$.ajax({
					type:"POST",
					url:$('#store_locator').attr('action'),
					data:"ajax=1&action=get_nearby_stores&distance="+distance+"&lat="+lat+"&lng="+lng,
					success:function(msg) {
						// parse the JSON result
						var results = JSON.parse(msg);

						// if request successful
						if( results.success ) {
							// loop through stores and display marker
							jQuery.each( results.stores,function(k,v){
								var marker = new google.maps.Marker({
									map: map,
									position: new google.maps.LatLng(v.lat,v.lng),
									title: v.name+' : '+v.address
								});

								// add to markers
								markers.push(marker);

								// build content string
								var content_string = build_content_string(v);

								// create new info window
								var infowindow = new google.maps.InfoWindow({
									maxWidth: "400",
									content: content_string
								});

								// attach popup to click event
								google.maps.event.addListener(marker, 'click', function() {
									infowindow.open(map,marker);
								});

							} );
							$('#ajax_msg').html("<p class='flash_good'>"+results.stores.length+" stores have been found</p>").fadeIn();
						} else {
							// display error message
							$('#ajax_msg').html("<p class='flash_bad'>"+results.msg+"</p>").fadeIn();
						}
					}
				});
			}
		});
	}
}


/**
 * Builds the HTML for the popup marker window
 * @param object v
 * @return string
 */
function build_content_string(v) {
	// build content string
	var content_string = "<div class='maps_popup'>";

	// include image
	if(v.img != '') {
		content_string += "<img class='img' src='"+v.img+"' alt='Store Image' />";
	}

	// include title & address
	content_string += "<h1>"+v.name+"</h1><h2>"+v.address+"</h2>";

	// include additional info
	if(v.telephone != '') {
		content_string += "<p class='tel'>Telephone: "+v.telephone+"</p>";
	}
	if(v.email != '') {
		content_string += "<p class='email'>Email: <a href='mailto:"+v.email+"'>"+v.email+"</a></p>";
	}
	if(v.website != '') {
		content_string += "<p class='web'>Website: <a href='"+v.website+"'>"+v.website+"</a></p>";
	}
	if(v.description != '') {
		content_string += "<p class='desc'>"+v.description+"</p>";
	}
	content_string += "</div>";

return content_string;
}

