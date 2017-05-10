<?php
//menus
if(function_exists('register_nav_menus')){
	register_nav_menus(
		array(
			'primary-menu' => 'Primary Menu'
			// 'footer-menu' => 'Footer Menu'
			)
	);
}

//featured images
add_theme_support( 'post-thumbnails' );

if(!get_option("medium_crop")) add_option("medium_crop", "1");
else update_option("medium_crop", "1");

add_image_size( 'gallery-thumb', 800, 500, true );
// add_image_size( 'medium-thumb', 260, 120, true );
// add_image_size( 'blog-thumb', 370, 234, true );


function theme_css_scripts() {
	
 	/* Theme CSS Files */
	wp_enqueue_style( 'bootstrap', get_template_directory_uri() . '/css/bootstrap.min.css', array(), '1.0.0', false );
	wp_enqueue_style( 'font-awesome', '//maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css', array(), '1.0.0', false );
	
	wp_enqueue_style( 'style', get_stylesheet_uri() );
	
	wp_enqueue_style( 'owl-1', get_template_directory_uri() . '/css/owl.carousel.css', array(), '1.0.0', false );
	wp_enqueue_style( 'owl-2', get_template_directory_uri() . '/css/owl.theme.css', array(), '1.0.0', false );
	
	wp_enqueue_style( 'aos_css', get_template_directory_uri().'/css/aos.css',array(),'1.0.1',false );

	wp_enqueue_style('datepicker-css','//code.jquery.com/ui/1.10.3/themes/smoothness/jquery-ui.css', array(), '1.0.0', false);

	wp_enqueue_style( 'main_css', get_template_directory_uri().'/main.css',array(),'1.0.2',false );
	wp_enqueue_style( 'responsive_css', get_template_directory_uri().'/responsive.css',array(),'1.0.2',false );


	/* Theme JS Files */
	wp_enqueue_script('jquery');

	wp_enqueue_script( 'owl-carousal', get_template_directory_uri() . '/js/owl.carousel.min.js', array(), '1.0.0', true );


	wp_enqueue_script( 'googlemap_key','//maps.googleapis.com/maps/api/js?key=AIzaSyAudcbrsHUg2-2iCmxlYrTbZzZBC-7iP7U', array(), '1.0.0', false );

	wp_enqueue_script( 'datepicker-ui-js','//code.jquery.com/ui/1.10.3/jquery-ui.js', array(), '1.0.0', true );
	
	wp_enqueue_script( 'aos_js', get_template_directory_uri() . '/js/aos.js', array(), '1.0.0', true );
	
	wp_enqueue_script( 'validate', get_template_directory_uri() . '/js/jquery.validate.js', array(), '1.0.0', true );
	wp_enqueue_script( 'custom', get_template_directory_uri() . '/js/custom.js', array(), '1.0.1', true );
}

add_action( 'wp_enqueue_scripts', 'theme_css_scripts' );

add_action('wp_ajax_nopriv_captcha', 'captcha_callback');
add_action('wp_ajax_captcha', 'captcha_callback');


/* Captcha Working */
function captcha_callback() {

	$captcha_instance = new ReallySimpleCaptcha();
	$word = $captcha_instance->generate_random_word();
	$prefix = mt_rand();
	$img = $captcha_instance->generate_image( $prefix, $word );

	$data["success"] = true;
	$data["img_url"] = home_url().'/wp-content/plugins/really-simple-captcha/tmp/'.$img;
	$data["prefix"] = $prefix;
	echo json_encode($data);
	die();

}

class Peppercorn{

    public static function image($src, $width = 0, $height = 0, $alt = null, $attrs = []){
        if(SHUBHAM){
            $img_base = 'http://localhost/Avyay_Technologies/Wordpress_Custom/Peppercorn_Avenue_Wordpress/wp-content/themes/Peppercorn_Avenue/img';
        } else {
        	if(VASHI){
        		$img_base = '/peppercorn/wp-content/themes/Peppercorn_Avenue/img';	
        	} else {
        		$img_base = '/wp-content/themes/Peppercorn_Avenue/img';
        	}
            
        }

        $src = $img_base . '/' . $src;
        $src2 = preg_replace('/\.(png|jpg)$/', '@2x.$1', $src);
        return '<img src="'.esc_attr($src).'" srcset="'.esc_attr($src).' 1x, '.esc_attr($src2).' 2x">';
    }
}

include('inc/theme_options.php');


?>