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
                                            <a href="<?php the_permalink(); ?>" class="offer boton-slide-reservar"><?php _e('RESERVAR','aletheme'); ?></a>                                            
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

	<?php if(ale_get_meta('display_template_home_3_filter')!="off"): ?>
		<div class="template-home-3-filter wrapper">
			<form method="post" action="<?php echo home_url('/hot_deals'); ?>" class="cf">
				<div class="date left">
					<div class="input">
						<input type="text" name="in-date" class="datepicker" placeholder="<?php _e('Check in date', 'aletheme'); ?>">
						<i class="fa fa-calendar"></i>
					</div>

					<div class="input">
						<input type="text" name="out-date" class="datepicker" placeholder="<?php _e('Check out date', 'aletheme'); ?>">
						<i class="fa fa-calendar"></i>
					</div>
				</div>

				<div class="type-rooms left">
					<select name="type" class="dropdown">
						<option class="label"><?php _e('Type', 'aletheme');?></option>
						<option value="bus"><?php _e('Bus', 'aletheme');?></option>
						<option value="plane"><?php _e('Plane', 'aletheme');?></option>
						<option value="ship"><?php _e('Ship', 'aletheme');?></option>
					</select>

					<select name="rooms" class="dropdown">
						<option class="label"><?php _e('Rooms', 'aletheme');?></option>
						<?php $rooms = get_terms('rooms-category');
							foreach ($rooms  as $room) {
								echo '<option value="' . esc_attr($room->term_id) .'">' . esc_attr($room->name) .'</option>';
							}
						?>
					</select>
				</div>

				<div class="price-bath-rate left">
					<div class="price-range">
						<div class="rangeSlider">
							<div class="rangeSldier__amount">
								<label for="amount"><?php _e('Price range:','aletheme'); ?></label>
								<div class="pricebox">
									<div class="price-sum left">
										<span><?php echo esc_attr(ale_get_option('currency')); ?></span>
										<input type="text" name="price_down" value="175000" class="sliderRange__amount sliderRange__amount_first">
									</div>

									<div class="rangeSldier__scale left"></div>

									<div class="price-sum left">
										<span><?php echo esc_attr(ale_get_option('currency')); ?></span>
										<input type="text" name="price_up" value="500000" class="sliderRange__amount sliderRange__amount_last">
									</div>
								</div>
							</div>
						</div>
					</div>

					<select name="baths" class="dropdown">
						<option class="label"><?php _e('Baths', 'aletheme');?></option>
						<?php $baths = get_terms('baths-category');
							foreach ($baths  as $bath) {
								echo '<option value="' . esc_attr($bath->term_id) .'">' . esc_attr($bath->name) .'</option>';
							}
						?>
					</select>

					<div class="rating left">
						<span><?php _e('Ratting', 'aletheme'); ?>:</span>
						<i class="fa fa-star star5 grey-col-icon" data-rate="5"></i>
						<i class="fa fa-star star4 grey-col-icon" data-rate="4"></i>
						<i class="fa fa-star star3 grey-col-icon" data-rate="3"></i>
						<i class="fa fa-star star2 grey-col-icon" data-rate="2"></i>
						<i class="fa fa-star star1 grey-col-icon" data-rate="1"></i>
						<input type="text" name="rating" hidden>
					</div>
				</div>

				<div class="button yellow-bg left">
					<input type="submit" value="<?php _e('Quick search', 'aletheme'); ?>">
				</div>
			</form>
		</div>
	<?php endif; ?>




    
<div class="containercolumna"> 
	<a href="http://voyenbus.com.ar/wordpress/hot_deals-category/landscape-adventure/"><img class="breakpoint" src="http://voyenbus.com.ar/wordpress/wp-content/uploads/2015/09/icono-altamontana.png" width="200" height="200" /></a>
	<a href="http://voyenbus.com.ar/wordpress/hot_deals-category/tours-privados/"><img class="breakpoint" src="http://voyenbus.com.ar/wordpress/wp-content/uploads/2015/09/icono-winetour.png" width="200" height="200" /></a>
	<img class="breakpoint" src="http://voyenbus.com.ar/wordpress/wp-content/uploads/2015/09/icono-alojamiento.png" width="200" height="200" />
	<img class="breakpoint" src="http://voyenbus.com.ar/wordpress/wp-content/uploads/2015/09/icono-vehiculos.png" width="200" height="200" />
</div>
	
<?php get_footer();