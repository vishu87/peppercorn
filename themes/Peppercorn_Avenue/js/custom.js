jQuery(document).ready(function() {

    /* -------- Mobile Menu ---------*/
    jQuery("#menu-icon a").click(function(){
        jQuery("#menu-icon a img").toggle();
        jQuery(".header-menu ul").slideToggle();
    });


    /* Gallery Images */
	jQuery(".home-gallery .images").owlCarousel({
	    items : 1,
	    singleItem : true,
	    loop : true,
	    autoPlay : true
	});

    /*------------- Top Fixed Menu  ------------------*/

    jQuery(window).scroll(function() {
        if (jQuery(this).scrollTop() >= jQuery('footer').offset().top-200) {
            jQuery('.side-menu').css({
                "transform": "translate(-230px,0)"
             });
        }else {
            jQuery('.side-menu').css({
                "transform": "translate(0,0)"
            });
        }
    });

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

AOS.init({
  duration: 1200
});


jQuery(".check-form").validate();
jQuery( ".datepicker" ).datepicker({
    dateFormat: 'dd-mm-yy',
    changeMonth: true,
    changeYear: true
}); 

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