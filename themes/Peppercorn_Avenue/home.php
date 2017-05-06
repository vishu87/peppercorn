<?php /* Template Name: Home Page */
get_header(); ?>

<div class="container">
	<div class="home-title" data-aos="zoom-in-up" data-aos-once="true">
		<h2>Lekki's First Indian &amp; Thai Fine Dine Restaurant</h2>
	</div>
</div>
<div class="container-fluid">
	<div class="home-address separator-div">
		<div class="container">
			<div class="row">
				<div class="col-md-4">
					<div class="left" data-aos="zoom-in-down" data-aos-once="true">
						<p>
							Peppercorn Avenue<br>
							6A, Otunba Adedoyin Ogunge Street,<br>
							Off. Admiralty Way, Phase I, Lekki, Lagos - 105102 
						</p>
					</div>
				</div>
				<div class="col-md-4">
					<div class="mid">
						<?php echo Peppercorn::image('green-arrow.png'); ?>
					</div>
				</div>
				<div class="col-md-4">
					<div class="right" data-aos="zoom-in-down" data-aos-once="true">
						<p>
							Open Everyday From<br>
							11:00 A.M – 11:00 P.M
						</p>
					</div>
				</div>
			</div>
		</div>
		<div class="line"></div>
	</div>
	<div class="home-about">
		<div class="container">
			<div class="row">
				<div class="col-md-6"> 
					<div class="left" data-aos="slide-up" data-aos-once="true">
						<h1 class="sec-title">Peppercorn Avenue</h1>
						<p>
							<?php echo the_field("first_content");?>
						</p>
					</div>
				</div>
				<div class="col-md-6">
					<div class="right" data-aos="slide-left" data-aos-once="true">
						<?php echo Peppercorn::image('home-about.png'); ?>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="separator-div">
		<div class="mid">
			<?php echo Peppercorn::image('green-arrow.png'); ?>
		</div>	
		<div class="line"></div>
	</div>
	<div class="home-regional-treasure">
		<div class="row mar-0">
			<div class="col-md-3 padd-0" data-aos="slide-left" data-aos-once="true">
				<div class="left">
					<?php echo Peppercorn::image('regional-treasure.png'); ?>
				</div>
			</div>
			<div class="col-md-6">
				<div class="mid" data-aos="slide-up" data-aos-once="true">
					<h1 class="sec-title">Regional Treasure</h1>
					<p><?php the_field("second_content");?></p>
					<?php echo Peppercorn::image('regional-treasure-mid.png'); ?>
				</div>
			</div>
			<div class="col-md-3 padd-0" data-aos="slide-right" data-aos-once="true">
				<div class="right">
					<?php echo Peppercorn::image('regional-treasure.png'); ?>
				</div>
			</div>
		</div>
		<div class="line"></div>
	</div>
	<div class="separator-div">
		<div class="mid">
			<?php echo Peppercorn::image('green-arrow.png'); ?>
		</div>	
		<div class="line"></div>
	</div>
	<div class="container">
		<div class="home-gallery">
			<h1 class="sec-title" data-aos="slide-up" data-aos-once="true">Gallery</h1>
			<div class="images">
				<?php if(get_field('gallery_images')): ?>
				<?php 
					
					$gallery_imgs = get_field('gallery_images');

					foreach ($gallery_imgs as $gallery_img) { ?>
						<img src="<?php echo $gallery_img["gallery_image"]["sizes"]["gallery-thumb"];?>">
					<?php } ?>
			<?php endif;?>
			</div>
		</div>
	</div>
	<div class="separator-div">
		<div class="mid">
			<?php echo Peppercorn::image('green-arrow.png'); ?>
		</div>	
		<div class="line"></div>
	</div>
</div>


<?php get_footer(); ?>
