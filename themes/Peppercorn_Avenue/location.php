<?php // Template Name: Location Page
get_header('inner');?>
        
<div class="container">
	<h1 class="sec-title menu-title" data-aos="zoom-in-up" data-aos-once="true">Our Location</h1>
	<div class="location-page" data-aos="slide-up" data-aos-once="true">
		<div class="map" id="google_map"></div>
	</div>
</div>

<script type="text/javascript">
	// When the window has finished loading create our google map below
	google.maps.event.addDomListener(window, 'load', init);

	function init() {
	    // Basic options for a simple Google Map
	    // For more options see: https://developers.google.com/maps/documentation/javascript/reference#MapOptions
	    var mapOptions = {
	        // How zoomed in you want the map to start at (always required)
	        zoom: 18,

	        // The latitude and longitude to center the map (always required)
	        center: new google.maps.LatLng(6.435689, 3.456539), // New York

	        // How you would like to style the map. 
	        // This is where you would paste any style found on Snazzy Maps.
	        styles: [
	            {
	                "featureType": "all",
	                "elementType": "all",
	                "stylers": [
	                    {
	                        "invert_lightness": true
	                    },
	                    {
	                        "saturation": -80
	                    },
	                    {
	                        "lightness": 30
	                    },
	                    {
	                        "gamma": 0.5
	                    },
	                    {
	                        "hue": "#3d433a"
	                    }
	                ]
	            }
	        ]
	    };

	    // Get the HTML DOM element that will contain your map 
	    // We are using a div with id="map" seen below in the <body>
	    var mapElement = document.getElementById('google_map');

	    // // Create the Google Map using our element and options defined above
	    var map = new google.maps.Map(mapElement, mapOptions);

	    // // Let's also add a marker while we're at it
	    var marker = new google.maps.Marker({
	        position: new google.maps.LatLng(6.435689, 3.456539),
	        map: map,
	        title: 'Peppercorn Avenue'
	    });

	    var contentString = '<div id="content">'+
            '<h3 id="firstHeading" class="firstHeading">Peppercorn Avenue</h3>'+
            '<div id="bodyContent">'+
            '<p>6a Off Admirality Way<br>Otunba Adedoyin Ogungbe St<br>Lekki Phase 1<br>Lagos, Nigeria</p>'+
            '</div>'+
            '</div>';

	    var infowindow = new google.maps.InfoWindow({
          content: contentString
        });

        marker.addListener('click', function() {
          infowindow.open(map, marker);
        });
	}
</script>

<?php get_footer();?>