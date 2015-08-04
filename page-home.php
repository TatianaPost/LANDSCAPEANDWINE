<?php
/*
  * Template name: Home
  * */
get_header(); ?>
	<div class="home-slider-box">
		<?php wp_reset_query();
		$count = esc_attr(ale_get_meta('home-1-gallery-slider-count'));
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
		if ($query_gallery->have_posts() && ale_get_meta('displayhomeslider')!="off") : ?>
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
								<?php if(ale_get_meta('gallery-description')){
									echo '<h3>' . esc_attr(ale_get_meta('gallery-description')) . '</h3>';
								}?>
								<h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
								<div class="slider-ship"><img src="<?php echo get_template_directory_uri(); ?>/css/images/slider-ship.png" alt="" /></div>
							</div>
						</li>
					<?php endwhile; ?>
				</ul>
			</div>
		<?php else: ?>
			<div class="slider_replacement"></div>
		<?php endif; wp_reset_query();?>
	</div>
	<div class="cf"></div>

	<?php if(ale_get_meta('displayhomesearch')!="off"  ): ?>
		<div class="search-section purple-bg">
			<div class="wrapper">
				<div class="q-search-wrap">
					<form method="post" action="<?php echo home_url('/hot_deals'); ?>" class="cf">
						<?php $countrys = get_terms('hot_deals-category'); ?>
						<?php if($countrys){ ?>
							<select id="location" name="q_country" class="dropdown">
								<?php
								foreach($countrys as $country) { ?>
									<option value="<?php echo esc_attr($country->term_id); ?>"><?php echo esc_attr($country->name); ?></option>
								<?php } ?>
							</select>
						<?php } ?>

						<select id="type" name="type" class="dropdown">
							<option value="most_recent"><?php _e('Most recent','aletheme'); ?></option>
							<option value="hot_deals"><?php _e('Hot deals','aletheme'); ?></option>
							<option value="top_deals"><?php _e('Top deals','aletheme'); ?></option>
							<option value="interesting_actions"><?php _e('Interesting actions','aletheme'); ?></option>
						</select>

						<select id="coast" name="price_up" class="dropdown">
							<option>150</option>
							<option>300</option>
							<option>450</option>
							<option>600</option>
							<option>750</option>
							<option>900</option>
							<option>1150</option>
							<option>1300</option>
							<option>1500</option>
							<option>2000</option>
							<option>2350</option>
							<option>2600</option>
							<option>3000</option>
						</select>
						
						<div class="button right">
							<input type="submit" name="q_submit" value="<?php _e('Quick search', 'aletheme'); ?>">
						</div>
					</form>
				</div>
			</div>
		</div>
	<?php endif; ?>

	<?php if(ale_get_meta('displayhomehotdeals')!="off"): ?>
		<div class="home-hotdeals">
			<div class="wrapper tabs">
				<ul class="tab-nav cf">
					<li><a href="#tab-1"><?php _e('Hot deals','aletheme'); ?></a></li>
					<li><a href="#tab-2"><?php _e('Top deals','aletheme'); ?></a></li>
					<li><a href="#tab-3"><?php _e('Interesting actions','aletheme'); ?></a></li>
					<li><a href="#tab-4"><?php _e('Most recent','aletheme'); ?></a></li>
				</ul>

				<div id="tab-1" class="items cf">
					<?php
					wp_reset_query();
					$count = esc_attr(ale_get_meta('home-1-hot-deals-count'));
					$query_hot_deals = new WP_Query(
						array(
							'posts_per_page' => $count - 1,
							'post_type' => 'hot_deals',
							'ignore_sticky_posts' => 1,
							'post__not_in' => get_option('sticky_posts'),
							'meta_query' => array(
								array(
									'key' => 'ale_hd_type_offer',
									'value' => 'hot_deals'
								)
							),
						)
					);
					$hot_deals_count = 0;
					if ($query_hot_deals->have_posts()) : while ($query_hot_deals->have_posts()) : $query_hot_deals->the_post();
					$hot_deals_count++; ?>
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
						$attachments = get_posts( $args ); ?>
						<article class="left<?php if($hot_deals_count==1){echo ' big';}else{echo ' small';} if($hot_deals_count==1){ echo ' slider'; } ?>">
							<?php if($hot_deals_count==1){ ?>
								<?php if ( $attachments ) { ?>
									<ul class="slides">
										<?php foreach ( $attachments as $attachment ) { ?>
											<li>
												<?php echo wp_get_attachment_image( $attachment->ID, 'hot_deals-home-big' ); ?>
											</li>
										<?php } ?>
									</ul>
								<?php } else {
								if(get_the_post_thumbnail($post->ID,'hot_deals-home-big')){
										echo get_the_post_thumbnail($post->ID,'hot_deals-home-big');
									} else{
										echo '<img src="http://placehold.it/470x352/eeeeee/636363&amp;text=No+image" alt>';
									}
								}
							} else{
								if(get_the_post_thumbnail($post->ID,'hot_deals-home')){
									echo get_the_post_thumbnail($post->ID,'hot_deals-home');
								} else{
									echo '<img src="http://placehold.it/225x144/eeeeee/636363&amp;text=No+image" alt>';
								}
							} ?>

							<div class="text">
								<?php if($hot_deals_count==1){ ?>
									<a href="<?php the_permalink(); ?>" class="button-offer"><?php _e('special offer','aletheme'); ?></a>
								<?php } ?>
								<h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>

								<div class="string">
									<?php echo ale_trim_excerpt(12); ?>
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
					<?php endwhile; endif; wp_reset_query(); ?>
				</div>

				<div id="tab-2" class="items cf">
					<?php
					wp_reset_query();
					$count = esc_attr(ale_get_meta('home-1-hot-deals-count'));
					$query_hot_deals = new WP_Query(
						array(
							'posts_per_page' => $count,
							'post_type' => 'hot_deals',
							'ignore_sticky_posts' => 1,
							'post__not_in' => get_option('sticky_posts'),
							'meta_query' => array(
								array(
									'key' => 'ale_hd_type_offer',
									'value' => 'top_deals'
								)
							),
						)
					);
					if ($query_hot_deals->have_posts()) : while ($query_hot_deals->have_posts()) : $query_hot_deals->the_post(); ?>
						<article class="left">
							<?php if(get_the_post_thumbnail($post->ID,'hot_deals-home')){
								echo get_the_post_thumbnail($post->ID,'hot_deals-home');
							} else{
								echo '<img src="http://placehold.it/225x144/eeeeee/636363&amp;text=No+image" alt>';
							} ?>

							<div class="text">
								<h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>

								<div class="string">
									<?php echo ale_trim_excerpt(12); ?>
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
					<?php endwhile; endif; wp_reset_query(); ?>
				</div>

				<div id="tab-3" class="items cf">
					<?php
					wp_reset_query();
					$count = esc_attr(ale_get_meta('home-1-hot-deals-count'));
					$query_hot_deals = new WP_Query(
						array(
							'posts_per_page' => $count,
							'post_type' => 'hot_deals',
							'ignore_sticky_posts' => 1,
							'post__not_in' => get_option('sticky_posts'),
							'meta_query' => array(
								array(
									'key' => 'ale_hd_type_offer',
									'value' => 'interesting_actions'
								)
							),
						)
					);
					if ($query_hot_deals->have_posts()) : while ($query_hot_deals->have_posts()) : $query_hot_deals->the_post(); ?>
						<article class="left">
							<?php if(get_the_post_thumbnail($post->ID,'hot_deals-home')){
								echo get_the_post_thumbnail($post->ID,'hot_deals-home');
							} else{
								echo '<img src="http://placehold.it/225x144/eeeeee/636363&amp;text=No+image" alt>';
							} ?>

							<div class="text">
								<h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>

								<div class="string">
									<?php echo ale_trim_excerpt(12); ?>
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
					<?php endwhile; endif; wp_reset_query(); ?>
				</div>

				<div id="tab-4" class="items cf">
					<?php
					wp_reset_query();
					$count = esc_attr(ale_get_meta('home-1-hot-deals-count'));
					$query_hot_deals = new WP_Query(
						array(
							'posts_per_page' => $count,
							'post_type' => 'hot_deals',
							'ignore_sticky_posts' => 1,
							'post__not_in' => get_option('sticky_posts'),
							'meta_query' => array(
								array(
									'key' => 'ale_hd_type_offer',
									'value' => 'most_recent'
								)
							),
						)
					);
					if ($query_hot_deals->have_posts()) : while ($query_hot_deals->have_posts()) : $query_hot_deals->the_post(); ?>
						<article class="left">
							<?php if(get_the_post_thumbnail($post->ID,'hot_deals-home')){
								echo get_the_post_thumbnail($post->ID,'hot_deals-home');
							} else{
								echo '<img src="http://placehold.it/225x144/eeeeee/636363&amp;text=No+image" alt>';
							} ?>

							<div class="text">
								<h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>

								<div class="string">
									<?php echo ale_trim_excerpt(12); ?>
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
					<?php endwhile; endif; wp_reset_query(); ?>
				</div>
			</div>
		</div>
	<?php endif; ?>

	<?php if(ale_get_meta('displayhomevideo')!="off"): ?>
		<section class="home-video green-bg">
			<div class="wrapper cf">
				<div class="col-6">
					<div class="video-box">
						<?php if(ale_get_meta('home-1-video-image')){
							echo '<img src="' . esc_url(ale_get_meta('home-1-video-image')) . '" alt>';
						} else{
							echo '<img src="http://placehold.it/470x223/eeeeee/636363&amp;text=No+image" alt>';
						} ?>
						<div class="click-overlay">
							<i class="fa fa-play-circle-o"></i>
							<h4><?php echo esc_attr(ale_get_meta('home-1-video-title')); ?></h4>
							<p><?php echo esc_attr(ale_get_meta('home-1-video-desc')); ?></p>
						</div>
					</div>

					<div class="pop-up">
						<div class="content-wrapper">
							<div class="exit"><i class="fa fa-times"></i></div>
							<div class="item">
								<?php echo wp_oembed_get(esc_url(ale_get_meta('home-1-video-link')),array('width'=>'100%','height'=>'400px')); ?>
							</div>
						</div>
					</div>
				</div>

				<div class="col-6 text-box">
					<h3><?php echo esc_attr(ale_get_meta('home-1-video-text-desc')); ?></h3>
					<h2><?php echo esc_attr(ale_get_meta('home-1-video-text-title')); ?></h2>
					<hr>
					<div class="text story">
						<?php if (have_posts()) : while (have_posts()) : the_post();
							the_content();
						endwhile; endif; wp_reset_query();?>
					</div>
				</div>
			</div>
		</section>
	<?php endif; ?>

	<?php if(ale_get_meta('displayhomegallery')!="off"):
		wp_reset_query();
		$count = esc_attr(ale_get_meta('home-1-gallery-count'));
		$query_gallery = new WP_Query(
			array(
				'posts_per_page' => $count,
				'post_type' => 'gallery',
				'ignore_sticky_posts' => 1,
				'post__not_in' => get_option('sticky_posts'),
			)
		);
		$gallery_count = 0;
		if ($query_gallery->have_posts()) : ?>
			<section class="home-gallery">
				<h2><?php echo esc_attr(ale_get_meta('home-1-gallery-title')); ?></h2>
				<div class="slider">
					<ul class="slides">
						<?php while ($query_gallery->have_posts()) : $query_gallery->the_post(); $gallery_count++; ?>
							<li>
								<div class="text">
									<a href="<?php the_permalink(); ?>" class="image">
										<?php if($gallery_count % 4 == 0){
											if(get_the_post_thumbnail($post->ID,'gallery-home-slide1')){
												echo get_the_post_thumbnail($post->ID,'gallery-home-slide1');
											} else{
												echo '<img src="http://placehold.it/176x386/eeeeee/636363&amp;text=No+image" alt>';
											}
										} elseif($gallery_count % 2 == 0){
											if(get_the_post_thumbnail($post->ID,'gallery-home-slide2')){
												echo get_the_post_thumbnail($post->ID,'gallery-home-slide2');
											} else{
												echo '<img src="http://placehold.it/176x232/eeeeee/636363&amp;text=No+image" alt>';
											}
										} else{
											if(get_the_post_thumbnail($post->ID,'gallery-home-slide3')){
												echo get_the_post_thumbnail($post->ID,'gallery-home-slide3');
											} else{
												echo '<img src="http://placehold.it/176x180/eeeeee/636363&amp;text=No+image" alt>';
											}
										}?>
										<span class="overlay purple-bg"><i class="fa fa-plus"></i></span>
									</a>
									<h3><?php the_title(); ?></h3>
									<p><?php echo esc_attr(ale_get_meta('gal_country')); ?></p>
								</div>
							</li>
						<?php endwhile; ?>
					</ul>
				</div>
			</section>
		<?php endif; wp_reset_query();
	endif; ?>

	<?php if(ale_get_meta('displayhomerewies')!="off"):
		wp_reset_query();
		$count = esc_attr(ale_get_meta('home2slidercount'));
		$query_testimonials = new WP_Query(
			array(
				'posts_per_page' => $count,
				'post_type' => 'testimonial',
				'ignore_sticky_posts' => 1,
				'post__not_in' => get_option('sticky_posts')
			)
		);
		if ($query_testimonials->have_posts()) : ?>
			<section class="home-review purple-bg">
				<div class="bg-image" <?php if(ale_get_meta('home-1-rewies-image')){ ?>style="background-image: url('<?php echo esc_url(ale_get_meta('home-1-rewies-image')); ?>');" <?php } ?>></div>
				
				<div class="title">
					<h2 class="yellow-col"><?php echo esc_attr(ale_get_meta('home-1-rewies-title')); ?></h2>
				</div>

				<div class="slider">
					<ul class="slides">
						<?php while ($query_testimonials->have_posts()) : $query_testimonials->the_post(); ?>
							<li>
								<div class="item cf">
									<div class="col-4">
										<div class="image">
											<?php if(get_the_post_thumbnail($post->ID,'testimonial-home-thumba')){
												echo get_the_post_thumbnail($post->ID,'testimonial-home-thumba');
											} else{
												echo '<img src="http://placehold.it/220x217/eeeeee/636363&amp;text=No+image" alt>';
											} ?>
										</div>
										<div class="shadow"></div>
									</div>

									<div class="col-8 text">
										<div class="top">
											<h3><?php the_title(); ?></h3>

											<?php if(ale_get_meta('test_rating') != '') { ?>
												<span class="rating"><i class="fa fa-star yellow-col"></i><?php echo esc_attr(ale_get_meta('test_rating')); ?><em>/100</em></span>
											<?php } ?>

											<?php if(ale_get_meta('test_city') != '') { ?>
												<span class="location"><i class="fa fa-map-marker blue-col"></i><?php echo esc_attr(ale_get_meta('test_city')); ?></span>
											<?php } ?>
										</div>

										<div class="string">
											<p><?php echo esc_attr(ale_get_meta('test_desc')); ?></p>
										</div>
									</div>
								</div>
							</li>
						<?php endwhile; ?>
					</ul>
				</div>
			</section>
		<?php endif; wp_reset_query();
	endif; ?>

	<?php if(ale_get_meta('displayhomeblog')!="off"): ?>
		<section class="home-blog">
			<div class="wrapper cf">
				<h3><?php _e('Our blog','aletheme'); ?></h3>
				<?php
				wp_reset_query();
				$query_blog = new WP_Query(
					array(
						'posts_per_page' => 3,
						'post_type' => 'post',
						'ignore_sticky_posts' => 1,
						'post__not_in' => get_option('sticky_posts'),
					)
				);
				if ($query_blog->have_posts()) : while ($query_blog->have_posts()) : $query_blog->the_post(); ?>
					<div class="item col-3">
						<h3><a href="blog-inside.html" ><?php the_title(); ?></a></h3>
						<span><?php echo get_the_date('j M Y'); ?></span><span><i class="fa fa-comment"></i><?php comments_number('0','1','%')?></span>
					</div>
				<?php endwhile; endif; wp_reset_query(); ?>
				<div class="item twitter col-3">
					<div class="twit-l"><i class="fa fa-twitter"></i></div>
					<div class="tr"></div>
					<div class="twit-post">
						<?php if(class_exists('tp_widget_recent_tweets')) {
							twitt();
						} else {
							echo '<li>'."Install Recent Tweets Widget".'</li>';
						} ?>
					</div>
				</div>
			</div>
		</section>
	<?php endif; ?>
<?php get_footer();