<?php
/*
  * Template name: Template Home 1
  * */
get_header(); ?>
	<div class="home-1-fix">
	<div class="header-image-box header-image-box-home1 home-1" <?php if(ale_get_meta('display_template_home_1_slider')=="off"){echo 'style="min-height: 300px;height: auto"';}?>>
		<?php if(ale_get_meta('template_home_1_image_image')): ?>
			<div class="bg-image" style="background-image: url(<?php echo esc_url(ale_get_meta('template_home_1_image_image')); ?>);"></div>
		<?php else: ?>
			<div class="slider_replacement big"></div>
		<?php endif; ?>
	</div>

	<?php if(ale_get_meta('display_template_home_1_slider')!="off"): ?>
		<?php
		wp_reset_query();
		$count = esc_attr(ale_get_meta('template_home_1_slider_count'));
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
			<div class="template-home-1-hot-deals">
				<div class="slider">
					<ul class="slides">
						<?php while ($query_hot_deals->have_posts()) : $query_hot_deals->the_post(); ?>
							<li>
								<article class="cf">
									<div class="col-5">
										<?php if(get_the_post_thumbnail($post->ID,'hot_deals-home-1')){
											echo get_the_post_thumbnail($post->ID,'hot_deals-home-1');
										} else{
											echo '<img src="http://placehold.it/472x370/eeeeee/636363&amp;text=No+image" alt>';
										} ?>
									</div>

									<div class="col-7">
										<a href="<?php the_permalink(); ?>" class="button-offer"><?php _e('special offer','aletheme'); ?></a>
										<h2><?php the_title(); ?></h2>

										<div class="string grey-col">
											<?php echo ale_trim_excerpt(20); ?>
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
				</div>
			</div>
		<?php endif; wp_reset_query();?>
	<?php endif; ?>

	<?php if(ale_get_meta('display_template_home_1_description')!="off"): ?>
		<section class="template-home-1-description purple-bg cf <?php if(ale_get_meta('display_template_home_1_slider')=="off"){echo 'no-margin';} ?>">
			<div class="bg-image" style="background-image: url('<?php echo get_template_directory_uri(); ?>/css/images/map-bg.png');"></div>
			<h3><?php echo esc_attr(ale_get_meta('template_home_1_description_title_1')); ?></h3>
			<h2><?php echo esc_attr(ale_get_meta('template_home_1_description_title_2')); ?></h2>
			<p><?php echo esc_attr(ale_get_meta('template_home_1_description_text')); ?></p>
			<hr class="yellow-bg">
		</section>
	<?php endif; ?>
	</div>
<div class="cf"></div>
	<?php if(ale_get_meta('display_template_home_1_description')!="off"): ?>
		<div class="template-home-1-info"<?php if(ale_get_meta('template_home_1_info_bg')){
			echo ' style="background-image: url('.esc_url(ale_get_meta('template_home_1_info_bg')).');"';
		} ?>>
			<div class="wrapper cf">
				<article>
					<i class="fa fa-<?php echo esc_attr(ale_get_meta('template_home_1_info_icon_1')); ?> green-col"></i>
					<h2><?php echo esc_attr(ale_get_meta('template_home_1_info_title_1')); ?></h2>
					<p><?php echo esc_attr(ale_get_meta('template_home_1_info_text_1')); ?></p>
				</article>

				<article>
					<i class="fa fa-<?php echo esc_attr(ale_get_meta('template_home_1_info_icon_2')); ?> green-col"></i>
					<h2><?php echo esc_attr(ale_get_meta('template_home_1_info_title_2')); ?></h2>
					<p><?php echo esc_attr(ale_get_meta('template_home_1_info_text_2')); ?></p>
				</article>

				<article>
					<i class="fa fa-<?php echo esc_attr(ale_get_meta('template_home_1_info_icon_3')); ?> green-col"></i>
					<h2><?php echo esc_attr(ale_get_meta('template_home_1_info_title_3')); ?></h2>
					<p><?php echo esc_attr(ale_get_meta('template_home_1_info_text_3')); ?></p>
				</article>
			</div>
		</div>
	<?php endif; ?>

	<?php if(ale_get_meta('display_template_home_1_team')!="off"): ?>
		<?php
		wp_reset_query();
		$count = esc_attr(ale_get_meta('template_home_1_team_count'));
		$query_team = new WP_Query(
			array(
				'posts_per_page' => $count,
				'post_type' => 'team',
				'ignore_sticky_posts' => 1,
				'post__not_in' => get_option('sticky_posts'),
				'meta_query' => array(
					array(
						'key' => 'ale_team_show_on_home',
						'value' => 'on'
					)
				)
			)
		);
		if ($query_team->have_posts()) : ?>
			<div class="template-home-1-team">
				<h2>
					<span><?php echo esc_attr(ale_get_meta('template_home_1_team_title_1')); ?></span>
					<?php echo esc_attr(ale_get_meta('template_home_1_team_title_2')); ?>
				</h2>

				<div class="slider">
					<ul class="slides">
						<?php while ($query_team->have_posts()) : $query_team->the_post(); ?>
							<li>
								<article class="wrapper cf">
									<div class="image left">
										<?php if(get_the_post_thumbnail($post->ID,'team-mini')){
											echo get_the_post_thumbnail($post->ID,'team-mini');
										} else{
											echo '<img src="http://placehold.it/248x248/eeeeee/636363&amp;text=No+image" alt>';
										} ?>
									</div>

									<div class="text left">
										<div class="top cf">
											<span><?php echo esc_attr(ale_get_meta('team_post')); ?></span>
											<h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>

											<div class="social">
												<a href="<?php echo esc_url(ale_get_meta('team_social_twi')); ?>"><i class="fa fa-twitter blue-tweet-col"></i></a>
												<a href="<?php echo esc_url(ale_get_meta('team_social_fb')); ?>"><i class="fa fa-facebook blue-fb-col"></i></a>
												<a href="<?php echo esc_url(ale_get_meta('team_social_pin')); ?>"><i class="fa fa-pinterest red-col"></i></a>
											</div>
										</div>

										<p class="description"><?php echo esc_attr(ale_get_meta('team_desc')); ?></p>
										<div class="string">
											<?php echo ale_trim_excerpt(30); ?>
										</div>
									</div>
								</article>
							</li>
						<?php endwhile; ?>
					</ul>
				</div>
			</div>
		<?php endif; wp_reset_query(); ?>
	<?php endif; ?>

	<?php if(ale_get_meta('display_template_home_1_title')!="off"): ?>
		<section class="template-home-1-title cf">
			<h2>
				<span><?php echo esc_attr(ale_get_meta('template_home_1_title_title_1')); ?></span>
				<?php echo esc_attr(ale_get_meta('template_home_1_title_title_2')); ?>
			</h2>

			<div class="image left" style="background-image: url(<?php if(ale_get_meta('template_home_1_title_image_1')){
				echo esc_url(ale_get_meta('template_home_1_title_image_1'));
			} else{
				echo 'http://placehold.it/960x898/8b9dc1/8b9dc1&amp;text=No+image';
			} ?>);">
			</div>

			<div class="image absolute">
				<img src="<?php if(ale_get_meta('template_home_1_title_image_2')){
					echo esc_url(ale_get_meta('template_home_1_title_image_2'));
				} else{
					echo 'http://placehold.it/1253x898/c9cbb3/c9cbb3&amp;text=No+image';
				} ?>" alt>
			</div>

			<div class="image right" style="background-image: url(<?php if(ale_get_meta('template_home_1_title_image_3')){
				echo esc_url(ale_get_meta('template_home_1_title_image_3'));
			} else{
				echo 'http://placehold.it/960x898/abb7c4/abb7c4&amp;text=No+image';
			} ?>);">
			</div>
		</section>
	<?php endif; ?>

	<?php if(ale_get_meta('display_template_home_1_tour')!="off"): ?>
		<section class="template-home-1-tour">
			<div class="top">
				<div class="inner-block">
					<h2><?php echo esc_attr(ale_get_meta('template_home_1_tour_title')); ?></h2>
					<p><?php echo esc_attr(ale_get_meta('template_home_1_tour_text')); ?></p>
				</div>
			</div>
			<?php ale_part('tour-map'); ?>
		</section>
	<?php endif; ?>
<?php get_footer();