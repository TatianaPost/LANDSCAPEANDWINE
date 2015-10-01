<?php
/*
  * Template name: Vehiculos
  * */
get_header(); ?>
	<div class="header-image-box simple-page">
		<div class="slider_replacement"></div>
	</div>
	<div class="cf"></div>

	<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
	<section class="content">
		<div class="wrapper">
			<div class="tcw-wrap ">
				<h1 class="content-title"><?php _e('VEHICULOS','aletheme'); ?></h1>
				<div class="breadcrumb">
					<?php echo get_breadcrumbs(); ?>
				</div>
			</div>
					<div class="story">
						<?php the_content(); ?>
						<?php wp_link_pages(); ?>
					</div>
				</div>
			</div>
		</div>
	</section>
    
    <div class="containercolumna"> 
		<a href="http://voyenbus.com.ar/wordpress/hot_deals-category/landscape-adventure/"><img class="breakpoint" src="http://voyenbus.com.ar/wordpress/wp-content/uploads/2015/09/icono-altamontana.png" width="200" height="200" /></a>
		<a href="http://voyenbus.com.ar/wordpress/hot_deals-category/tours-privados/"><img class="breakpoint" src="http://voyenbus.com.ar/wordpress/wp-content/uploads/2015/09/icono-winetour.png" width="200" height="200" /></a>
		<img class="breakpoint" src="http://voyenbus.com.ar/wordpress/wp-content/uploads/2015/09/icono-alojamiento.png" width="200" height="200" />
		<img class="breakpoint" src="http://voyenbus.com.ar/wordpress/wp-content/uploads/2015/09/icono-vehiculos.png" width="200" height="200" />
	</div>

	<?php endwhile; endif;



get_footer(); ?>