jQuery(document).ready(function() {

	jQuery(".home-gallery .images").owlCarousel({
	    items : 1,
	    singleItem : true,
	    loop : true,
	    autoPlay : true
	});

    /* Menu Page Sidebar */
	jQuery('.side-tab').click(function(){
        // event.preventDefault();
        var target = '#' + jQuery(this).attr("data-target");
        // alert(target);
        jQuery('html, body').animate({
            scrollTop: jQuery(target).offset().top
        }, 1000);
    });
    jQuery(document).on("scroll", onScroll);
});

/* Menu Page Scroll Effect */
function onScroll(event){
    var scrollPos = jQuery(document).scrollTop();
    jQuery('.side-tab').each(function () {
        var currLink = jQuery(this);
        var refElement = jQuery(currLink.attr("href"));
        if (refElement.position().top <= scrollPos && refElement.position().top + refElement.height() > scrollPos) {
            jQuery('a.side-tab').removeClass("active");
            currLink.addClass("active");
        }
        else{
            currLink.removeClass("active");
        }
    });

}

/* Location Google Map */

// When the window has finished loading create our google map below
google.maps.event.addDomListener(window, 'load', init);

function init() {
    // Basic options for a simple Google Map
    // For more options see: https://developers.google.com/maps/documentation/javascript/reference#MapOptions
    var mapOptions = {
        // How zoomed in you want the map to start at (always required)
        zoom: 15,

        // The latitude and longitude to center the map (always required)
        center: new google.maps.LatLng(-33.2456227, 151.479481), // New York

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
    // var mapElement = document.getElementById('google_map');

    // // Create the Google Map using our element and options defined above
    // var map = new google.maps.Map(mapElement, mapOptions);

    // // Let's also add a marker while we're at it
    // var marker = new google.maps.Marker({
    //     position: new google.maps.LatLng(-33.2456227, 151.479481),
    //     map: map,
    //     title: 'Snazzy!'
    // });
}

AOS.init({
  duration: 1200
});


jQuery(".check-form").validate();
jQuery( ".datepicker" ).datepicker({
    dateFormat: 'dd-mm-yy',
    changeMonth: true,
    changeYear: true
}); 

//   var old_title = document.title;
//   	jQuery("#title-menu").click(function(){
//   		document.title = 'Loading...';
//   	});

/* Reload Captcha */
jQuery(document).on('click','.reload-captcha', function(e){
    e.preventDefault();
    var url = base_url + "wp-admin/admin-ajax.php";
    var captcha = jQuery(".captcha-image");
    var prefix = jQuery("#prefix");
    jQuery(".reload-captcha").find('.fa-refresh').addClass('fa-spin');
    var data = {
        'action': 'captcha'
    };

    jQuery.post(url, data, function(data ){
        data = JSON.parse(data);
        if(data.success){
          captcha.html('<img src="'+data.img_url+'" >');
          prefix.val(data.prefix);
        } else {
          alert('error getting new captcha');
        }
        jQuery(".reload-captcha").find('.fa-refresh').removeClass('fa-spin');
    });
});
