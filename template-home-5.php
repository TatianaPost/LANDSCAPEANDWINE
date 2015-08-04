<?php
/*
  * Template name: Template Home 5
  * */
get_header(); ?>
	<div class="header-image-box home-5">
		<div class="slider_replacement big"></div>
	</div>
	<div class="cf"></div>

	<?php if(ale_get_meta('display_template_home_5_hot_deals')!="off"):
		wp_reset_query();
		$query_hot_deals = new WP_Query(
			array(
				'posts_per_page' => 7,
				'post_type' => 'hot_deals',
				'ignore_sticky_posts' => 1,
				'post__not_in' => get_option('sticky_posts')
			)
		);
		$count_hot_deals = 0;
		if ($query_hot_deals->have_posts()) : ?>
			<div class="template-home-5-hot-deals grid-system">
			<?php while ($query_hot_deals->have_posts()) : $query_hot_deals->the_post(); $count_hot_deals++; ?>
				<article class="grid-item<?php if(($count_hot_deals == 3) || ($count_hot_deals == 5)){echo ' big';}
				if(($count_hot_deals == 2)){echo ' tall';}
				if(($count_hot_deals == 5)){echo ' small';} ?>">
					<?php
					if($count_hot_deals == 2){
						if(get_the_post_thumbnail($post->ID,'hot_deals-home-5-2')){
							echo get_the_post_thumbnail($post->ID,'hot_deals-home-5-2');
						} else{
							echo '<img src="http://placehold.it/384x670/eeeeee/636363&amp;text=No+image" alt>';
						}
					} elseif($count_hot_deals == 3){
						$args = array(
							'post_type' => 'attachment',
							'numberposts' => -1,
							'post_status' => null,
							'order'				=> 'ASC',
							'orderby'			=> 'menu_order ID',
							'meta_query'		=> array(
								array(
									'key'		=> '_ale_hide_from_gallery',
									'value'		=> 0,
									'type'		=> 'DECIMAL',
								),
							),
							'post_parent' => $post->ID
						);
						$attachments = get_posts( $args );
						if ( $attachments ) {
							echo '<div class="slider">';
								echo '<ul class="slides">';
									foreach ( $attachments as $attachment ) { ?>
										<li>
											<?php echo wp_get_attachment_image( $attachment->ID, 'hot_deals-home-5-4' ); ?>
										</li>
									<?php }
								echo '</ul>';
							echo '</div>';
						} else{
							if(get_the_post_thumbnail($post->ID,'hot_deals-home-5-4')){
								echo get_the_post_thumbnail($post->ID,'hot_deals-home-5-4');
							} else{
								echo '<img src="http://placehold.it/768x670/eeeeee/636363&amp;text=No+image" alt>';
							}
						}
					} elseif($count_hot_deals == 5){
						$args = array(
							'post_type' => 'attachment',
							'numberposts' => -1,
							'post_status' => null,
							'order'				=> 'ASC',
							'orderby'			=> 'menu_order ID',
							'meta_query'		=> array(
								array(
									'key'		=> '_ale_hide_from_gallery',
									'value'		=> 0,
									'type'		=> 'DECIMAL',
								),
							),
							'post_parent' => $post->ID
						);
						$attachments = get_posts( $args );
						if ( $attachments ) {
							echo '<div class="slider">';
								echo '<ul class="slides">';
									foreach ( $attachments as $attachment ) { ?>
										<li>
											<?php echo wp_get_attachment_image( $attachment->ID, 'hot_deals-home-5-3' ); ?>
										</li>
									<?php }
								echo '</ul>';
							echo '</div>';
						} else{
							if(get_the_post_thumbnail($post->ID,'hot_deals-home-5-3')){
								echo get_the_post_thumbnail($post->ID,'hot_deals-home-5-3');
							} else{
								echo '<img src="http://placehold.it/768x335/eeeeee/636363&amp;text=No+image" alt>';
							}
						}
					} else{
						if(get_the_post_thumbnail($post->ID,'hot_deals-home-5-1')){
							echo get_the_post_thumbnail($post->ID,'hot_deals-home-5-1');
						} else{
							echo '<img src="http://placehold.it/384x335/eeeeee/636363&amp;text=No+image" alt>';
						}
					} ?>
					<div class="text">
						<?php if($count_hot_deals == 3){ ?>
							<a href="<?php the_permalink(); ?>" class="button-offer"><?php _e('special offer','aletheme'); ?></a>
						<?php } ?>

						<h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>

						<div class="string grey-col">
							<?php if(($count_hot_deals == 2) || ($count_hot_deals == 3) || ($count_hot_deals == 7)){
								echo ale_trim_excerpt(20);
							} else{
								echo ale_trim_excerpt(6);
							} ?>
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
				</article>

				<?php if($count_hot_deals == 4){ ?>
					<div class="grid-item">
						<img src="http://placehold.it/384x335/eeeeee/636363&amp;text=No+image" alt>
						<div class="twitter-block">
							<i class="fa fa-twitter"></i>
							<span class="twit-next">
								<i class="fa fa-repeat"></i>
							</span>
						</div>
					</div>
				<?php } ?>
				
				<?php if($count_hot_deals == 4): ?>
					<div class="grid-item">
						<img src="http://placehold.it/384x670/eeeeee/636363&amp;text=No+image" alt>
						<form method="post" action="<?php echo home_url(); ?>/hot_deals" class="purple-bg">
							<div class="wrapper">
								<div class="top">
									<i class="fa fa-search yellow-col"></i>
									<h4><?php _e('Quick', 'aletheme'); ?></h4>
									<h5><?php _e('search', 'aletheme'); ?></h5>
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
												echo '<option value="' . esc_attr($room->name) .'">' . esc_attr($room->name) .'</option>';
											}
										?>
									</select>

									<select name="baths" class="dropdown">
										<option class="label"><?php _e('Baths', 'aletheme');?></option>
										<?php $baths = get_terms('baths-category');
											foreach ($baths  as $bath) {
												echo '<option value="' . esc_attr($bath->name) .'">' . esc_attr($bath->name) .'</option>';
											}
										?>
									</select>
								</div>

								<div class="price-range">
									<div class="rangeSlider">
										<div class="rangeSldier__amount">
											<div class="pricebox">
												<label for="amount" class="left"><?php _e('Price range:','aletheme'); ?></label>

												<div class="price-sum left">
													<span><?php echo esc_attr(ale_get_option('currency')); ?></span>
													<input type="text" name="price_down" value="175000" class="sliderRange__amount sliderRange__amount_first">
												</div>
												<span class="line left"> - </span>
												<div class="price-sum left">
													<span><?php echo esc_attr(ale_get_option('currency')); ?></span>
													<input type="text" name="price_up" value="500000" class="sliderRange__amount sliderRange__amount_last">
												</div>

												<div class="rangeSldier__scale"></div>
											</div>
										</div>
									</div>
								</div>

								<div class="button yellow-bg">
									<input type="submit" value="<?php _e('Quick search', 'aletheme'); ?>">
								</div>
							</div>
						</form>
					</div>
				<?php endif; ?>
			<?php endwhile; ?>
			</div>
		<?php endif; wp_reset_query();
	endif; ?>

	<?php if(ale_get_meta('display_template_home_5_tours')!="off"): ?>
		<section class="template-home-5-tours">
			<div class="lines-bg">
				<hr>
				<hr>
				<hr>
				<hr>
				<hr>
				<hr>
				<hr>
			</div>

			<div class="wrapper cf">
				<div class="col-5 image">
					<img src="<?php if(ale_get_meta('template_home_5_tours_image')){
						echo esc_url(ale_get_meta('template_home_5_tours_image'));
					} else{
						echo "http://placehold.it/421x507/eeeeee/636363&amp;text=No+image";
					} ?>" alt>
				</div>

				<div class="col-3 titles">
					<h2><?php echo esc_attr(ale_get_meta('template_home_5_tours_title_1')); ?></h2>
					<h3><?php echo esc_attr(ale_get_meta('template_home_5_tours_title_2')); ?></h3>
					<p><?php echo esc_attr(ale_get_meta('template_home_5_tours_desc')); ?></p>
				</div>

				<div class="col-4 slider">
					<?php
					wp_reset_query();
					$count = ale_get_meta('template_home_5_tours_count');
					$query_hot_deals = new WP_Query(
						array(
							'posts_per_page' => $count,
							'post_type' => 'hot_deals',
							'ignore_sticky_posts' => 1,
							'post__not_in' => get_option('sticky_posts'),
							'meta_query' => array(
								array(
									'key' => 'ale_hot_deals_slider',
									'value' => 'enable'
								)
							),
						)
					);
					if ($query_hot_deals->have_posts()) : ?>
						<ul class="slides">
							<?php while ($query_hot_deals->have_posts()) : $query_hot_deals->the_post(); ?>
								<li>
									<article>
										<?php if(get_the_post_thumbnail($post->ID,'hot_deals-home-1')){
											echo get_the_post_thumbnail($post->ID,'hot_deals-home-1');
										} else{
											echo '<img src="http://placehold.it/472x370/eeeeee/636363&amp;text=No+image" alt>';
										} ?>
										<div class="text">
											<h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>

											<div class="string grey-col">
												<?php echo ale_trim_excerpt(10); ?>
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
									</article>
								</li>
							<?php endwhile; ?>
						</ul>
					<?php endif; wp_reset_query();?>
				</div>
			</div>
		</section>
	<?php endif; ?>

	<?php if(ale_get_meta('display_template_home_5_info')!="off"): ?>
		<section class="template-home-5-info purple-bg">
			<?php if(ale_get_meta('template_home_5_info_image')){ ?>
				<div class="bg-image" style="background: url(<?php echo esc_url(ale_get_meta('template_home_5_info_image')); ?>);"></div>
			<?php } ?>

			<div class="wrapper">
				<h2><?php echo esc_attr(ale_get_meta('template_home_5_info_title_1')); ?></h2>
				<h3><?php echo esc_attr(ale_get_meta('template_home_5_info_title_2')); ?></h3>
				<i class="fa fa-play"></i>
				<p><?php echo esc_attr(ale_get_meta('template_home_5_info_desc')); ?></p>

				<div class="pop-up">
					<div class="content-wrapper">
						<div class="exit"><i class="fa fa-times"></i></div>
						<div class="item">
							<?php echo wp_oembed_get(esc_url(ale_get_meta('template_home_5_info_video')),array('width'=>'100%','height'=>'400px')); ?>
						</div>
					</div>
				</div>
			</div>
		</section>
	<?php endif; ?>

	<?php if(ale_get_meta('display_template_home_5_gallery')!="off"):
		wp_reset_query();
		$count = esc_attr(ale_get_meta('template_home_5_gallery_num'));
		$query_gallery = new WP_Query(
			array(
				'posts_per_page' => $count,
				'post_type' => 'gallery',
				'ignore_sticky_posts' => 1,
				'post__not_in' => get_option('sticky_posts')
			)
		);
		if ($query_gallery->have_posts()) : ?>
			<section class="template-nome-5-gallery">
				<div class="wrapper">
					<div class="top cf">
						<h2><?php echo esc_attr(ale_get_meta('template_home_5_gallery_title')); ?></h2>
						<p><?php echo esc_attr(ale_get_meta('template_home_5_gallery_desc')); ?></p>
					</div>

					<div class="items grid-system-marg">
						<div class="gutter"></div>
						<?php while ($query_gallery->have_posts()) : $query_gallery->the_post(); ?>
							<article class="grid-item">
								<div class="image">
									<?php if(get_the_post_thumbnail($post->ID,'gallery-home-5')){
										echo get_the_post_thumbnail($post->ID,'gallery-home-5');
									} else{
										echo '<img src="http://placehold.it/225x204/eeeeee/636363&amp;text=No+image" alt>';
									} ?>
									<a href="<?php the_permalink(); ?>">
										<span class="purple-bg"></span>
										<i class="fa fa-search"></i>
									</a>
								</div>

								<div class="text">
									<h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
									<div class="string">
										<?php echo ale_trim_excerpt(5); ?>
									</div>
								</div>
							</article>
						<?php endwhile; ?>
					</div>
				</div>
			</section>

		<?php endif; wp_reset_query();
	endif; ?>

	<?php if(ale_get_meta('display_template_home_5_testimonials')!="off"):
		wp_reset_query();
		$count = esc_attr(ale_get_meta('template_home_5_testimonials_num'));
		$query_testimonials = new WP_Query(
			array(
				'posts_per_page' => $count,
				'post_type' => 'testimonial',
				'ignore_sticky_posts' => 1,
				'post__not_in' => get_option('sticky_posts')
			)
		);
		if ($query_testimonials->have_posts()) : ?>
		<div class="template-nome-5-testimonials">
			<div class="slider">
				<ul class="slides">
					<?php while ($query_testimonials->have_posts()) : $query_testimonials->the_post(); ?>
						<?php $args = array(
							'post_type' => 'attachment',
							'numberposts' => -1,
							'post_status' => null,
							'order'				=> 'ASC',
							'orderby'			=> 'menu_order ID',
							'meta_query'		=> array(
								array(
									'key'		=> '_ale_hide_from_gallery',
									'value'		=> 0,
									'type'		=> 'DECIMAL',
								),
							),
							'post_parent' => $post->ID
						);
						$attachments_count = 0;
						$attachments = get_posts( $args ); ?>
						<li>
							<article class="wrapper cf">
								<div class="image col-4">
									<?php if ( $attachments ) {
										foreach ( $attachments as $attachment ) { $attachments_count++;
											if($attachments_count == 1){
												echo wp_get_attachment_image( $attachment->ID, 'testimonial-home-5-1' );
											}
										}
									} else{
										echo '<img src="http://placehold.it/307x397/eeeeee/636363&amp;text=No+image" alt>';
									} ?>
								</div>

								<div class="text col-8">
									<div class="top">
										<div class="author-image">
											<?php if(get_the_post_thumbnail($post->ID,'testimonial-home-2-thumba')){
												echo get_the_post_thumbnail($post->ID,'testimonial-home-2-thumba');
											} else{
												echo '<img src="http://placehold.it/97x97/eeeeee/636363&amp;text=No+image" alt>';
											} ?>
										</div>

										<div class="details">
											<h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
											<h3><i class="fa fa-map-marker blue-tweet-col"></i><?php echo esc_attr(ale_get_meta('test_city')); ?></h3>
										</div>
									</div>

									<div class="text-block">
										<h4><?php echo esc_attr(ale_get_meta('test_desc')); ?></h4>
										<div class="string">
											<?php echo ale_trim_excerpt(30); ?>
										</div>
									</div>

									<div class="images cf">
										<?php if ( $attachments ) {
											foreach ( $attachments as $attachment ) { $attachments_count++;
												if($attachments_count != 1){
													echo '<a href="' . get_the_permalink() .'" class="left"><span class="purple-bg"></span>';
													echo wp_get_attachment_image( $attachment->ID, 'testimonial-home-2-thumba' );
													echo '<i class="fa fa-search"></i></a>';
												}
											}
										} ?>
									</div>
								</div>
							</article>
						</li>
					<?php endwhile; ?>
				</ul>
			</div>
		</div>
		<?php endif; wp_reset_query();
	endif; ?>
	
<?php get_footer();