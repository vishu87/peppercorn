<?php get_header(); the_post(); ?>

<div class="sep2"></div>
<div class="container">
	<div class="page-title">
		<h2><?php the_title();?></h2>
	</div>
	<div class="sep1"></div>
	<div class="page-content">
		<p><?php the_content();?></p>
	</div>
</div>	
<div class="sep4"></div>

<?php get_footer();?>