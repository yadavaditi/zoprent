<!DOCTYPE html >
  <head>
    <meta http-equiv="content-type" content="text/html; charset=utf-8"/>
    <meta name="viewport" content="initial-scale=1.0, user-scalable=no" />
    <title>Zoprent Vendor Locator on Google Maps</title>
	<link rel="shortcut icon" href="../assets/small.png" type="image/x-icon" />
      <link href="https://fonts.googleapis.com/css?family=Roboto:400,300,100,500,700,900" rel="stylesheet" type="text/css">
      <link href="../assets/css/icons/icomoon/styles.css" rel="stylesheet" type="text/css">
      <link href="../assets/css/bootstrap.css" rel="stylesheet" type="text/css">
      <link href="../assets/css/core.css" rel="stylesheet" type="text/css">
      <link href="../assets/css/components.css" rel="stylesheet" type="text/css">
      <link href="../assets/css/colors.css" rel="stylesheet" type="text/css">
      <link rel="stylesheet" href="http://netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.min.css">
      <!-- /global stylesheets -->
      <!-- Core JS files -->
      <script type="text/javascript" src="../assets/js/plugins/loaders/pace.min.js"></script>
      <script type="text/javascript" src="../assets/js/core/libraries/jquery.min.js"></script>
      <script type="text/javascript" src="../assets/js/core/libraries/bootstrap.min.js"></script>
      <script type="text/javascript" src="../assets/js/plugins/loaders/blockui.min.js"></script>
      <!-- /core JS files -->
      <!-- Theme JS files -->
      <script type="text/javascript" src="../assets/js/plugins/forms/styling/uniform.min.js"></script>
      <script type="text/javascript" src="../assets/js/core/app.js"></script>
      <script type="text/javascript" src="../assets/js/pages/form_inputs.js"></script>
      <!-- /theme JS files -->
      <!-- Theme JS files -->
      <script type="text/javascript" src="../assets/js/plugins/tables/datatables/datatables.min.js"></script>
      <script type="text/javascript" src="../assets/js/pages/datatables_advanced.js"></script>
  <style>
    /* Always set the map height explicitly to define the size of the div
     * element that contains the map. */
    #map {
      height: 100%;
    }
    /* Optional: Makes the sample page fill the window. */
    html, body {
      height: 100%;
      margin: 0;
      padding: 0;
    }
 </style>
  </head>
  <body style="margin:10px; padding:10px;" onload="initMap()">
    <div>
         <label for="raddressInput"><b>Search Address/Zipcode:</b></label>
         <input type="text" id="addressInput" size="30"/>
        <label for="radiusSelect">Radius:</label>
        <select id="radiusSelect" label="Radius">
          
          <option value="20" selected>20 kms</option>
		  <option value="10">10 kms</option>
		  <option value="5">5 kms</option>
		  <option value="2">2 kms</option>
		  
        </select>

        <input type="button" id="searchButton" value="Search"/>
    </div><div><select id="locationSelect" style="width: 10%; visibility: hidden"></select></div>
    
    <div id="map" style="margin: 20px 30px 400px 30px; border: 3px solid #01a9c4;">
	</div>
    <script>
      var map;
      var markers = [];
      var infoWindow;
      var locationSelect;
	 

        function initMap() {
		  var bangalore = {lat: 12.9716, lng: 77.5946};
          map = new google.maps.Map(document.getElementById('map'), {
            center: bangalore,
            zoom: 11,
            mapTypeId: 'roadmap',
            mapTypeControlOptions: {style: google.maps.MapTypeControlStyle.DROPDOWN_MENU}
          });
          infoWindow = new google.maps.InfoWindow();

          searchButton = document.getElementById("searchButton").onclick = searchLocations;

          locationSelect = document.getElementById("locationSelect");
          locationSelect.onchange = function() {
            var markerNum = locationSelect.options[locationSelect.selectedIndex].value;
            if (markerNum != "none"){
              google.maps.event.trigger(markers[markerNum], 'click');
            }
          };
        }

       function searchLocations() {
         var address = document.getElementById("addressInput").value;
         var geocoder = new google.maps.Geocoder();
		 
		 var input = address;
		 
         geocoder.geocode({address: address}, function(results, status) {
           if (status == google.maps.GeocoderStatus.OK) {
            searchLocationsNear(results[0].geometry.location);
           } else {
             alert(address + ' not found');
           }
         });
       }

       function clearLocations() {
         infoWindow.close();
         for (var i = 0; i < markers.length; i++) {
           markers[i].setMap(null);
         }
         markers.length = 0;

         locationSelect.innerHTML = "";
         var option = document.createElement("option");
         option.value = "none";
         option.innerHTML = "See all results:";
         locationSelect.appendChild(option);
       }

       function searchLocationsNear(center) {
         clearLocations();

         var radius = document.getElementById('radiusSelect').value;
         var searchUrl = 'storelocator.php?lat=' + center.lat() + '&lng=' + center.lng() + '&radius=' + radius;
         downloadUrl(searchUrl, function(data) {
           var xml = parseXml(data);
           var markerNodes = xml.documentElement.getElementsByTagName("marker");
		   
           var bounds = new google.maps.LatLngBounds();
			
           for (var i = 0; i <= markerNodes.length; i++) {
			if(i<markerNodes.length){
				 var id = markerNodes[i].getAttribute("id");
				 var name = markerNodes[i].getAttribute("name");
				 var address = markerNodes[i].getAttribute("address");
				 var distance = parseFloat(markerNodes[i].getAttribute("distance"));
				 var latlng = new google.maps.LatLng(
					  parseFloat(markerNodes[i].getAttribute("lat")),
					  parseFloat(markerNodes[i].getAttribute("lng"))
					  );

				 createOption(name, distance, i);
				 createMarker(latlng, name, address);
				 bounds.extend(latlng);
			}
			else{
					var id = markerNodes.length;
					var markercolor="green";
					var name = document.getElementById("addressInput").value;
					var address = document.getElementById("addressInput").value;
					var distance = document.getElementById('radiusSelect').value;
					var latlng = new google.maps.LatLng(
						  parseFloat(center.lat()),
						  parseFloat(center.lng())
						  );
					 createMarker(latlng, name, address,markercolor);
					 bounds.extend(latlng);
				}
           }
           map.fitBounds(bounds);
           locationSelect.style.visibility = "visible";
           locationSelect.onchange = function() {
             var markerNum = locationSelect.options[locationSelect.selectedIndex].value;
             google.maps.event.trigger(markers[markerNum], 'click');
           };
         });
       }
       
       function createMarker() {
			var image = 'https://developers.google.com/maps/documentation/javascript/examples/full/images/beachflag.png';
			if(arguments.length==3){
				var html = "<b>" + arguments[1] + "</b> <br/>" + arguments[2];
				var marker = new google.maps.Marker({
				map: map,
				position: arguments[0]
				});
				google.maps.event.addListener(marker, 'mouseover', function() {
					infoWindow.setContent(html);
					infoWindow.open(map, marker);
					infoWindows.setContent(image);
			  });
			  markers.push(marker);
			}
			else{
				var html = "<b>" + arguments[1] + "</b> <br/>" + arguments[2];
				var marker = new google.maps.Marker({
				map: map,
				icon: 'http://maps.google.com/mapfiles/ms/icons/green-dot.png',
				//icon: image
				position: arguments[0]
				});
				google.maps.event.addListener(marker, 'mouseover', function() {
					infoWindow.setContent(html);
					infoWindow.open(map, marker);
					infoWindows.setContent(image);
			  });
			  markers.push(marker);
			}
		}

       function createOption(name, distance, num) {
          var option = document.createElement("option");
          option.value = num;
          option.innerHTML = name;
          locationSelect.appendChild(option);
       }

       function downloadUrl(url, callback) {
          var request = window.ActiveXObject ?
              new ActiveXObject('Microsoft.XMLHTTP') :
              new XMLHttpRequest;

          request.onreadystatechange = function() {
            if (request.readyState == 4) {
              request.onreadystatechange = doNothing;
              callback(request.responseText, request.status);
            }
          };

          request.open('GET', url, true);
          request.send(null);
       }

       function parseXml(str) {
          if (window.ActiveXObject) {
            var doc = new ActiveXObject('Microsoft.XMLDOM');
            doc.loadXML(str);
            return doc;
          } else if (window.DOMParser) {
            return (new DOMParser).parseFromString(str, 'text/xml');
          }
       }

       function doNothing() {}
  </script>
    
     <script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDul5oh--XB63fUkDNp0-2lyP3cDf2ibfk&callback=initMap"></script>
  </body>
</html>