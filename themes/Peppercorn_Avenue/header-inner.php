<!DOCTYPE html>
<html lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html" charset="utf-8"/>
	<title><?php bloginfo('name'); ?><?php wp_title('|');?> </title>
	<?php wp_head(); ?>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="google-site-verification" content="yxW_CyVTwRPH_3FWLzePUdIV-Q-Wu6lCzzB_LfF9PMo" />
	<link rel="icon" type="image/png" href="">
</head>
<body>
<header>
	<div class="container">
		<nav class="header-menu" data-aos="fade-down" data-aos-once="true">
			<?php 
				$primary_menu = wp_nav_menu(array(
					'theme_location'=>'primary-menu','echo'=>false));
			?>
			<?php echo preg_replace('/\n/', '', $primary_menu) ?>
		</nav>
	</div>
</header>
<main>