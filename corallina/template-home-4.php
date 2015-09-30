<?php
/*
  * Template name: Template Home 4
  * */
get_header(); ?>
	<div class="header-image-box simple-page">
		<div class="slider_replacement"></div>
	</div>
	<div class="cf"></div>
	<div class="template-home-4-slider">
		<?php wp_reset_query();
		$count = esc_attr(ale_get_meta('template_home_4_slider_count'));
		$query_gallery = new WP_Query(
			array(
				'posts_per_page' => $count,
				'post_type' => 'gallery',
				'ignore_sticky_posts' => 1,
				'post__not_in' => get_option('sticky_posts'),
				'meta_query' => array(
					array(
						'key' => 'ale_gallery-slider',
						'value' => 'on'
					)
				),
			)
		);
		if ($query_gallery->have_posts() && ale_get_meta('display_template_home_4_slider')!="off") : ?>
			<div class="slider">
				<ul class="slides">
					<?php while ($query_gallery->have_posts()) : $query_gallery->the_post(); ?>
						<li>
							<?php if(get_the_post_thumbnail($post->ID,'gallery-home')){
								echo get_the_post_thumbnail($post->ID,'gallery-home');
							} else{
								echo '<img src="http://placehold.it/1920x630/eeeeee/636363&amp;text=No+image" alt>';
							} ?>

							<div class="text">
								<h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
								<?php if(ale_get_meta('gallery-description')){
									echo '<h3>' . esc_attr(ale_get_meta('gallery-description')) . '</h3>';
								}?>
							</div>
						</li>
					<?php endwhile; ?>
				</ul>
			</div>
		<?php else: ?>
			<div class="slider_replacement"></div>
		<?php endif; wp_reset_query();?>
	</div>

	<?php if(ale_get_meta('display_template_home_4_hot_deals')!="off"): ?>
		<div class="template-home-4-hot-deals cf">
			<?php
			wp_reset_query();
			$query_hot_deals = new WP_Query(
				array(
					'posts_per_page' => 6,
					'post_type' => 'hot_deals',
					'ignore_sticky_posts' => 1,
					'post__not_in' => get_option('sticky_posts')
				)
			);
			if ($query_hot_deals->have_posts()) : while ($query_hot_deals->have_posts()) : $query_hot_deals->the_post(); ?>
				<article class="left">
					<div class="inner-box">
						<?php if(get_the_post_thumbnail($post->ID,'hot_deals-home-3')){
							echo get_the_post_thumbnail($post->ID,'hot_deals-home-3');
						} else{
							echo '<img src="http://placehold.it/640x410/eeeeee/636363&amp;text=No+image" alt>';
						} ?>

						<div class="text">
							<a href="<?php the_permalink(); ?>" class="special-offer green-bg"><?php _e('Special offer', 'aletheme'); ?></a>
							<h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>

							<div class="string">
								<?php echo ale_trim_excerpt(6); ?>
							</div>

							<div class="details">
								<?php if(ale_get_meta('hd_price') != '') { ?>
									<span class="price"><?php echo esc_attr(ale_get_option('currency')) . esc_attr(ale_get_meta('hd_price')); ?></span>
								<?php } ?>

								<?php if(ale_get_meta('hd_transport') != '') { ?>
									<i class="fa fa-<?php echo esc_attr(ale_get_meta('hd_transport')); ?> transport"></i>
								<?php } ?>

								<?php if(ale_get_meta('hd_days') != '') { ?>
									<span class="date"><?php echo esc_attr(ale_get_meta('hd_days')); ?> <?php _e('days','aletheme'); ?></span>
								<?php } ?>
							</div>
						</div>
					</div>
				</article>
			<?php endwhile; endif; wp_reset_query();?>
		</div>
	<?php endif; ?>

	<?php if(ale_get_meta('display_template_home_4_info')!="off"): ?>
		<section class="template-home-4-info purple-bg">
			<div class="bg-image"></div>
			<div class="wrapper cf">
				<div class="col-8">
					<h2><?php echo esc_attr(ale_get_meta('template_home_4_info_title_1')); ?></h2>
					<h3><?php echo esc_attr(ale_get_meta('template_home_4_info_title_2')); ?></h3>
					<hr class="hr">
					<div class="string story">
						<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
							<?php the_content(); ?>
						<?php endwhile; endif; wp_reset_query();?>
					</div>
				</div>

				<div class="col-4">
					<form method="post" action="<?php echo home_url('/hot_deals'); ?>">
						<i class="fa fa-search"></i>
						<h4><?php echo esc_attr(ale_get_meta('template_home_4_info_search_title_1')); ?></h4>
						<h5><?php echo esc_attr(ale_get_meta('template_home_4_info_search_title_2')); ?></h5>
						<div class="price-range">
							<div class="rangeSlider">
								<div class="rangeSldier__amount">
									<div class="pricebox">
										<div class="price-sum left">
											<span><?php echo esc_attr(ale_get_option('currency')); ?></span>
											<input type="text" name="price_down" value="175000" class="sliderRange__amount sliderRange__amount_first">
										</div>
										<label for="amount" class="left"><?php _e('Price range:','aletheme'); ?></label>
										<div class="price-sum left">
											<span><?php echo esc_attr(ale_get_option('currency')); ?></span>
											<input type="text" name="price_up" value="500000" class="sliderRange__amount sliderRange__amount_last">
										</div>

										<div class="rangeSldier__scale"></div>
									</div>
								</div>
							</div>
						</div>

						<div class="date">
							<div class="input">
								<input type="text" name="in-date" class="datepicker" placeholder="<?php _e('Check in date', 'aletheme'); ?>">
								<i class="fa fa-calendar"></i>
							</div>

							<div class="input">
								<input type="text" name="out-date" class="datepicker" placeholder="<?php _e('Check out date', 'aletheme'); ?>">
								<i class="fa fa-calendar"></i>
							</div>
						</div>

						<div class="type-rooms">
							<select name="type" class="dropdown">
								<option class="label"><?php _e('Type', 'aletheme');?></option>
								<option value="bus"><?php _e('Bus', 'aletheme');?></option>
								<option value="plane"><?php _e('Plane', 'aletheme');?></option>
								<option value="ship"><?php _e('Ship', 'aletheme');?></option>
							</select>
						</div>

						<div class="rooms-baths cf">
							<select name="rooms" class="dropdown">
								<option class="label"><?php _e('Rooms', 'aletheme');?></option>
								<?php $rooms = get_terms('rooms-category');
									foreach ($rooms  as $room) {
										echo '<option value="' . esc_attr($room->term_id) .'">' . esc_attr($room->name) .'</option>';
									}
								?>
							</select>

							<select name="baths" class="dropdown">
								<option class="label"><?php _e('Baths', 'aletheme');?></option>
								<?php $baths = get_terms('baths-category');
									foreach ($baths  as $bath) {
										echo '<option value="' . esc_attr($bath->term_id) .'">' . esc_attr($bath->name) .'</option>';
									}
								?>
							</select>
						</div>

						<div class="button yellow-bg">
							<input type="submit" value="<?php _e('Quick search', 'aletheme'); ?>">
						</div>
					</form>
				</div>
			</div>
		</section>
	<?php endif; ?>

	<?php if((ale_get_meta('display_template_home_4_weather')!="off") && shortcode_exists('beautiful-yahoo-weather')): ?>
		<div class="template-home-4-weather cf wrapper">
			<?php do_shortcode('[beautiful-yahoo-weather]'); ?>

		</div>
	<?php endif; ?>

	<?php if(ale_get_meta('display_template_home_4_single_tour')!="off"): ?>
		<?php
		wp_reset_query();
		$query_tour = new WP_Query(
			array(
				'posts_per_page' => 1,
				'post_type' => 'tour',
				'ignore_sticky_posts' => 1,
				'post__not_in' => get_option('sticky_posts'),
				'meta_query' => array(
					array(
						'key' => 'ale_tour_home_4',
						'value' => 'on'
					)
				),
			)
		);
		if ($query_tour->have_posts()) : ?>
			<section class="template-home-4-single-tour purple-bg">
				<?php if(ale_get_meta('template_home_4_single_tour_image')): ?>
					<div class="bg-image" style="background-image: url(<?php echo esc_url(ale_get_meta('template_home_4_single_tour_image')); ?>);"></div>
				<?php endif; ?>

				<div class="wrapper">
					<?php while ($query_tour->have_posts()) : $query_tour->the_post(); ?>
						<div class="article cf">
							<div class="image left">
								<?php if(get_the_post_thumbnail($post->ID,'tour-home4')){
									echo get_the_post_thumbnail($post->ID,'tour-home4');
								} else{
									echo '<img src="http://placehold.it/347x369/eeeeee/636363&amp;text=No+image" alt>';
								} ?>
							</div>

							<div class="text left">
								<span class="type"><?php echo esc_attr(ale_get_meta('tour_type')); ?></span>
								<h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
								<div class="string">
									<?php echo ale_trim_excerpt(22); ?>
								</div>
								<a href="<?php the_permalink(); ?>" class="more"><?php _e('More details', 'aletheme'); ?></a>
							</div>

							<div class="text-bg">
								<?php _e('Inspiration', 'aletheme'); ?>
							</div>
						</div>
						<div class="shadow"></div>
					<?php endwhile; ?>
				</div>
			</section>
		<?php endif; wp_reset_query();?>
	<?php endif; ?>

	<?php if(ale_get_meta('display_template_home_4_tour')!="off"): ?>
		<?php
		wp_reset_query();
		$count = esc_attr(ale_get_meta('template_home_4_tour_count'));
		$query_tour = new WP_Query(
			array(
				'posts_per_page' => $count,
				'post_type' => 'tour',
				'ignore_sticky_posts' => 1,
				'post__not_in' => get_option('sticky_posts')
			)
		);
		if ($query_tour->have_posts()) : ?>
			<div class="template-home-4-tour">
				<div class="slider">
					<ul class="slides">
						<?php while ($query_tour->have_posts()) : $query_tour->the_post(); ?>
							<li>
								<article>
									<div class="text left">
										<span class="type"><?php echo esc_attr(ale_get_meta('tour_type')); ?></span>
										<h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
										<div class="string">
											<?php echo ale_trim_excerpt(26); ?>
										</div>
									</div>

									<div class="image right">
										<?php if(get_the_post_thumbnail($post->ID,'tour-home-3')){
											echo get_the_post_thumbnail($post->ID,'tour-home-3');
										} else{
											echo '<img src="http://placehold.it/318x318/eeeeee/636363&amp;text=No+image" alt>';
										} ?>
										<?php if(ale_get_meta('tour_icon')){ ?>
											<i class="fa fa-<?php echo esc_attr(ale_get_meta('tour_icon')); ?> green-bg"></i>
										<?php } ?>
									</div>
								</article>
							</li>
						<?php endwhile; ?>
					</ul>
				</div>
			</div>
		<?php endif; wp_reset_query();?>
	<?php endif; ?>

	<?php if((ale_get_meta('display_template_home_4_subscribe')!="off") && function_exists( 'mc4wp_form' )): ?>
		<div class="template-home-4-suscribe">
			<div id="mc4wp-form-1" class="form mc4wp-form">
				<form method="post" action="">
					<div class="subscribe-form cf">
						<label class="left"><span><?php _e('Subscribe', 'aletheme'); ?></span><?php _e('to our newsletter', 'aletheme'); ?></label>
						<input type="email" id="mc4wp_email" name="EMAIL" placeholder="<?php _e('Your e-mail', 'aletheme'); ?>" required="" class="left">
						<div class="submit left purple-bg">
							<input type="submit" value="<?php _e('Subscribe', 'aletheme'); ?>">
						</div>
					</div>

					<textarea name="_mc4wp_required_but_not_really" style="display: none !important;"></textarea>
					<input type="hidden" name="_mc4wp_form_submit" value="1">
					<input type="hidden" name="_mc4wp_form_instance" value="1">
					<input type="hidden" name="_mc4wp_form_nonce" value="50d9e128be">
				</form>
			</div>
		</div>
	<?php endif; ?>
<?php get_footer();