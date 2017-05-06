<?php // Template Name : Menu Page
get_header('inner'); 
$args = array( 'child_of' => 16, 'order' => 'DESC' ); 
$categories = get_categories( $args ); 
?>

<div class="container">
	<!-- <h1 class="sec-title menu-title" data-aos-once="true" data-aos="zoom-in-up">today's menu</h1> -->
	<div class="menu-page">
		<?php 
			foreach ( $categories as $category ) {
			?>
			<div id="<?php echo $category->cat_ID;?>">
				<h1 data-aos-once="true" data-aos="zoom-in-up">— <?php echo $category->name; ?> —</h1>
				<?php
					$menu_items = new WP_Query(array(
						"post_type" => "menu_category",
						"post_per_page" => -1,
						"order" => "ASC",
						"category_name" => $category->slug
					));
					if($menu_items->have_posts()):while($menu_items->have_posts()):$menu_items->the_post();
				?> 			
					<div class="menu-sec" data-aos-once="true" data-aos="zoom-in-up" data-aos-once="true">
						<div class="title"><?php the_title(); ?></div>
						<div class="menu-items">

							<div>
								<?php if(get_field('menu_items')): ?>
									<?php 
										
										$menus = get_field('menu_items');

										foreach ($menus as $menu_item) { ?>
											<div>
												<b><?php echo $menu_item["item_name"];?></b>
												<?php //echo $menu_item["item_description"];?>
												- &#8358; <?php echo $menu_item["item_price"];?>
											</div>
										<?php } ?>
								<?php endif;?>
							</div>
						</div>
					</div>
				<?php endwhile;endif;?>
			<?php //$count++;?>
			</div>
	 	<?php } ?> 
	</div>
</div>
<div class="side-menu" data-aos-once="true" data-aos="slide-right">
	<ul class="list-items categories"> 
		<?php  
			$args = array( 'child_of' => 16, 'order' => 'DESC' ); 
			$categories = get_categories( $args ); 
			foreach ( $categories as $category ) { 
				echo '<li><a href="#'.$category->cat_ID.'" class="side-tab active" data-target="'.$category->cat_ID.'" rel="bookmark">' . $category->name . '</a>  
				</li>';
		 	} 
	 	?> 
	</ul>
</div>


<?php get_footer(); ?>
