    			/*var customIcons = {
      				 GP: {
       					 icon: 'images/orange_MarkerG.png'
      					},
      				OrthoSurg: {
        						icon: 'images/brown_MarkerO.png'
      							},
     				 AandECons: {
      							 icon: 'images/blue_MarkerA.png'   
      							},
     				 ENT: {
       						 icon: 'images/green_MarkerE.png'
     					 },
    					  GenSurg: {
        							  icon: 'images/blue_MarkerG.png'
     							 },
      					AnaesPain: {
        							  icon: 'images/paleblue_MarkerA.png'
     								 }
   						 };*/
    function load() {
      var map = new google.maps.Map(document.getElementById("map"), {
        center: new google.maps.LatLng(54.13378, -7.412939),
        zoom: 5,
        mapTypeId: 'roadmap'
      });
      var infoWindow = new google.maps.InfoWindow;
	  
      // Change this depending on the name of your PHP file
      downloadUrl("includes/xml_database_booking.php", function(data) {
        var xml = data.responseXML;
        var markers = xml.documentElement.getElementsByTagName("marker");
        for (var i = 0; i < markers.length; i++) {
          var name = markers[i].getAttribute("name"); 
          var address1 = markers[i].getAttribute("address1");
		  var address2 = markers[i].getAttribute("address2");
		  var address3 = markers[i].getAttribute("address3");
          var city = markers[i].getAttribute("city");
		  var county = markers[i].getAttribute("county");
		  var postcode = markers[i].getAttribute("postcode");
		  var description = markers[i].getAttribute("description");
		  var disabled = markers[i].getAttribute("disabled");
          var point = new google.maps.LatLng(
              parseFloat(markers[i].getAttribute("latitude")),
              parseFloat(markers[i].getAttribute("longitude")));
		  var html = "<strong>" + "<form id='submit-area' action='#'>" + name + "</strong>" + "<br/><br/>" + address1 + "<br/>" + address2 + "<br/>" + address3 + "<br/>" + city + "<br/>" + postcode + "<b><br/><br/>Disabled Access: " + disabled + "</b>" + "<br/><input type='button' id='submitarea' value='Submit'/></button>" + "</form>";
          var marker = new google.maps.Marker({
            map: map,
            position: point,
          });
          bindInfoWindow(marker, map, infoWindow, html);
        }
		console.log(markers);
      });
    }

    function bindInfoWindow(marker, map, infoWindow, html) {
      google.maps.event.addListener(marker, 'click', function() {
        infoWindow.setContent(html);
        infoWindow.open(map, marker);
      });
    }
	function resizeMap(center) {
			google.maps.event.addDomListener(window, 'resize', initialize)(function() {
			var center= map.getCenter();
			google.maps.event.trigger(map, "resize");
			map.setCenter(center);
																					});
	}
									

    function downloadUrl(url, callback) {
      var request = window.ActiveXObject ?
          new ActiveXObject('Microsoft.XMLHTTP') :
          new XMLHttpRequest;

      request.onreadystatechange = function() {
        if (request.readyState == 4) {
          request.onreadystatechange = doNothing;
          callback(request, request.status);
        }
      };

      request.open('GET', url, true);
      request.send(null);
    }

    function doNothing() {}
    //]]>*/