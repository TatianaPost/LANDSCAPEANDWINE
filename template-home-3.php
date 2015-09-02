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

	<?php if(ale_get_meta('display_template_home_3_tours')!="off"): ?>
		<?php
		wp_reset_query();
		$count = esc_attr(ale_get_meta('template_home_3_tours_count'));
		$query = new WP_Query(
			array(
				'posts_per_page' => $count,
				'post_type' => 'tour',
				'ignore_sticky_posts' => 1,
				'post__not_in' => get_option('sticky_posts')
			)
		);
		if ($query->have_posts()) : ?>
		<div class="template-home-3-tours">
			<div class="shadow"></div>

			<?php if(ale_get_meta('template_home_3_tours_bg')): ?>
				<div class="bg-image" style="background-image: url(<?php echo esc_url(ale_get_meta('template_home_3_tours_bg')); ?>);"></div>
			<?php endif; ?>

			<div class="wrapper cf slider">
				<ul class="slides">
					<?php while ($query->have_posts()) : $query->the_post(); ?>
						<li>
							<article class="cf">
								<div class="text left">
									<h2><?php the_title(); ?></h2>
									<h3><?php echo esc_attr(ale_get_meta('tour_desc')); ?></h3>
									<div class="string">
										<?php echo ale_trim_excerpt(20); ?>
									</div>
								</div>

								<div class="image left">
									<?php if(get_the_post_thumbnail($post->ID,'tour-home-3')){
										echo get_the_post_thumbnail($post->ID,'tour-home-3');
									} else{
										echo '<img src="http://placehold.it/318x318/eeeeee/636363&amp;text=No+image" alt>';
									} ?>
								</div>
							</article>
						</li>
					<?php endwhile; ?>
				</ul>
			</div>
		</div>
		<?php endif; wp_reset_query();?>
	<?php endif; ?>

	<?php if(ale_get_meta('display_template_home_3_info')!="off"): ?>
		<div class="template-home-3-info purple-bg">
			<?php if(ale_get_meta('template_home_3_info_bg')){
				echo '<div class="bg-image" style="background-image: url(' . esc_url(ale_get_meta('template_home_3_info_bg')) . ');"></div>';
			} ?>
			<div class="wrapper cf">
				<article class="left">
					<i class="fa fa-<?php echo esc_attr(ale_get_meta('template_home_3_info_icon_1')); ?>"></i>
					<h2><?php echo esc_attr(ale_get_meta('template_home_3_info_number_1')); ?></h2>
					<h3><?php echo esc_attr(ale_get_meta('template_home_3_info_title_1')); ?></h3>
					<p><?php echo esc_attr(ale_get_meta('template_home_3_info_desc_1')); ?></p>
				</article>

				<article class="left">
					<i class="fa fa-<?php echo esc_attr(ale_get_meta('template_home_3_info_icon_2')); ?>"></i>
					<h2><?php echo esc_attr(ale_get_meta('template_home_3_info_number_2')); ?></h2>
					<h3><?php echo esc_attr(ale_get_meta('template_home_3_info_title_2')); ?></h3>
					<p><?php echo esc_attr(ale_get_meta('template_home_3_info_desc_2')); ?></p>
				</article>

				<article class="left">
					<i class="fa fa-<?php echo esc_attr(ale_get_meta('template_home_3_info_icon_3')); ?>"></i>
					<h2><?php echo esc_attr(ale_get_meta('template_home_3_info_number_3')); ?></h2>
					<h3><?php echo esc_attr(ale_get_meta('template_home_3_info_title_3')); ?></h3>
					<p><?php echo esc_attr(ale_get_meta('template_home_3_info_desc_3')); ?></p>
				</article>
			</div>
		</div>
	<?php endif; ?>

	<?php if(ale_get_meta('display_template_home_3_testimonials')!="off"): ?>
		<section class="template-home-3-testimonials">
			<div class="wrapper cf">
				<i class="fa fa-quote-right absolute-icon"></i>
				<div class="col-7">
					<h2><i class="fa fa-quote-right"></i><?php echo esc_attr(ale_get_meta('template_home_3_testimonials_title')); ?></h2>
					<?php
					wp_reset_query();
					$query_testimonial = new WP_Query(
						array(
							'posts_per_page' => 1,
							'post_type' => 'testimonial',
							'ignore_sticky_posts' => 1,
							'post__not_in' => get_option('sticky_posts'),
							'paged' => $paged,
							'meta_query' => array(
								array(
									'key' => 'ale_test_home_3',
									'value' => 'on'
								)
							),
						)
					);
					if ($query_testimonial->have_posts()) : while ($query_testimonial->have_posts()) : $query_testimonial->the_post(); ?>
						<article>
							<div class="image">
								<?php if(get_the_post_thumbnail($post->ID,'testimonial-home-2-thumba')){
									echo get_the_post_thumbnail($post->ID,'testimonial-home-2-thumba');
								} else{
									echo '<img src="http://placehold.it/92x92/eeeeee/636363&amp;text=No+image" alt>';
								} ?>
							</div>

							<h3><?php echo esc_attr(ale_get_meta('test_desc')); ?></h3>
							<div class="string">
								<?php echo ale_trim_excerpt(24); ?>
							</div>
							<div class="details">
								<i class="fa fa-map-marker green-col"></i>
								<span><strong><?php echo esc_attr(ale_get_meta('test_city')); ?></strong>, </span>
								<span><?php the_title(); ?></span>
							</div>
						</article>
					<?php endwhile; endif; wp_reset_query();?>
				</div>
				<div class="col-5">
					<div class="big-image">
						<?php if(ale_get_meta('template_home_3_testimonials_image')){
							echo '<img src="' . esc_url(ale_get_meta('template_home_3_testimonials_image')) . '"alt>';
						} else{
							echo '<img src="http://placehold.it/352x352/eeeeee/636363&amp;text=No+image" alt>';
						}?>
					</div>
				</div>
			</div>
		</section>
	<?php endif; ?>

	<?php if(ale_get_meta('display_template_home_3_desc')!="off"): ?>
		<section class="template-home-3-desc purple-bg">
			<?php if(ale_get_meta('template_home_3_desc_image')){
				echo '<div class="bg-image" style="background-image: url(' . esc_url(ale_get_meta('template_home_3_desc_image')) . ');"></div>';
			} ?>
			<h2><?php echo esc_attr(ale_get_meta('template_home_3_desc_title_1')); ?></h2>
			<h3><?php echo esc_attr(ale_get_meta('template_home_3_desc_title_2')); ?></h3>
			<p><?php echo esc_attr(ale_get_meta('template_home_3_desc_text')); ?></p>
			<hr class="yellow-bg">
		</section>
	<?php endif; ?>

	<?php if(ale_get_meta('display_template_home_3_blog')!="off"): ?>
		<div class="template-home-3-blog wrapper">
			<?php
			wp_reset_query();
			$count = esc_attr(ale_get_meta('template_home_3_blog_count'));
			$query_blog = new WP_Query(
				array(
					'posts_per_page' => $count,
					'post_type' => 'post',
					'ignore_sticky_posts' => 1,
					'post__not_in' => get_option('sticky_posts')
				)
			);
			if ($query_blog->have_posts()) : ?>
				<div class="slider">
					<ul class="slides">
						<?php while ($query_blog->have_posts()) : $query_blog->the_post(); ?>
							<li>
								<article>
									<div class="image">
										<?php if(get_the_post_thumbnail($post->ID,'post-home-3')){
											echo get_the_post_thumbnail($post->ID,'post-home-3');
										} else{
											echo '<img src="http://placehold.it/960x434/eeeeee/636363&amp;text=No+image" alt>';
										} ?>
										<a href="<?php the_permalink(); ?>" class="traveling green-bg"><?php _e('Traveling', 'aletheme'); ?></a>
									</div>

									<div class="text cf">
										<div class="title left">
											<h3><?php the_title(); ?></h3>

											<div class="details">
												<span class="date"><?php the_time(); ?></span>
												<span class="comments">
													<i class="fa fa-comment"></i>
													<?php $comments_count = wp_count_comments($post->ID); echo esc_attr($comments_count->total_comments); ?>
												</span>
											</div>
										</div>

										<div class="string left">
											<?php echo ale_trim_excerpt(60); ?>
										</div>
									</div>
								</article>
							</li>
						<?php endwhile; ?>
					</ul>
				</div>
			<?php endif; wp_reset_query();?>
			<div class="bottom-slider-nav">
				<h2><?php echo esc_attr(ale_get_meta('template_home_3_blog_title')); ?></h2>
			</div>
			<div class="shadow"></div>
		</div>
	<?php endif; ?>
<?php get_footer();