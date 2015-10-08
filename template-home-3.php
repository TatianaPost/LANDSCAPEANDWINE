<?php
/*
  * Template name: Template Home 3
  * */
get_header(); ?>
<div class="header-image-box home-3">
		<div class="slider_replacement"></div>
	</div>
	<div class="cf"></div>

	<?php if(ale_get_meta('display_template_home_3_hot_deals')!="off"): ?>
		<?php
		wp_reset_query();
		$count = esc_attr(ale_get_meta('template_home_3_hot_deals_count'));
		$query_hot_deals = new WP_Query(
			array(
				'posts_per_page' => $count,
				'post_type' => 'hot_deals',
				'ignore_sticky_posts' => 1,
				'post__not_in' => get_option('sticky_posts'),
				'paged' => $paged,
				'meta_query' => array(
					array(
						'key' => 'ale_hot_deals_slider',
						'value' => 'enable'
					)
				),
			)
		);
		if ($query_hot_deals->have_posts()) : ?>
			<div class="template-home-3-hot-deals">
				<div class="slider">
					<ul class="slides">
						<?php while ($query_hot_deals->have_posts()) : $query_hot_deals->the_post(); ?>
							<li>
								<article>
									<?php if(get_the_post_thumbnail($post->ID,'hot_deals-home-3')){
										echo get_the_post_thumbnail($post->ID,'hot_deals-home-3');
									} else{
										echo '<img src="http://placehold.it/640x410/eeeeee/636363&amp;text=No+image" alt>';
									} ?>
									<div class="text">
										<div class="left-part">
											<h2><a href="<?php the_permalink(); ?>"><?php echo esc_attr(ale_get_meta('hd_txttitulo')); ?></a></h2>
                                            <h3><?php if(ale_get_meta('hd_txtsubtitulo') != '') { ?>
												<span class="price"><?php echo esc_attr(ale_get_meta('hd_txtsubtitulo')); ?></span>
											<?php } ?></h3>
											<div class="string">
												<?php echo esc_attr(ale_get_meta('hd_txtcomplemento')); ?>
											</div>
										</div>

										<div class="details">
											<?php if(ale_get_meta('hd_price') != '') { ?>
												<span class="price"><?php echo esc_attr(ale_get_option('currency')) . esc_attr(ale_get_meta('hd_price')); ?></span>
											<?php } ?>
											<?php if(ale_get_meta('hd_days') != '') { ?>
												<div class="date"><?php echo esc_attr(ale_get_meta('hd_days')); ?></div>
											<?php } ?>
                                            <a href="<?php the_permalink(); ?>" class="offer boton-slide-reservar"><?php _e('+ INFORMACION','aletheme'); ?></a>                                            
										</div>
									</div>
								</article>
							</li>
						<?php endwhile; ?>
					</ul>
				</div>
			</div>
		<?php endif; wp_reset_query();?>
	<?php endif; ?>

	<?php if(ale_get_meta('display_template_home_3_desc')!="off"): ?>
		<section class="template-home-3-desc ">

						<div class="string story">
							<?php the_content(); ?>

		</div>
		</section>
	<?php endif; ?>




    
<div class="containercolumna"> 
	<a href="http://voyenbus.com.ar/wordpress/hot_deals-category/landscape-adventure/"><img class="breakpoint" src="http://voyenbus.com.ar/wordpress/wp-content/uploads/2015/09/icono-altamontana.png" width="200" height="200" /></a>
	<a href="http://voyenbus.com.ar/wordpress/hot_deals-category/toursprivados/"><img class="breakpoint" src="http://voyenbus.com.ar/wordpress/wp-content/uploads/2015/09/icono-winetour.png" width="200" height="200" /></a>
	<img class="breakpoint" src="http://voyenbus.com.ar/wordpress/wp-content/uploads/2015/09/icono-alojamiento.png" width="200" height="200" />
	<a href="http://voyenbus.com.ar/wordpress/vehiculos/"><img class="breakpoint" src="http://voyenbus.com.ar/wordpress/wp-content/uploads/2015/09/icono-vehiculos.png" width="200" height="200" /></a>
</div>
	
<?php get_footer();