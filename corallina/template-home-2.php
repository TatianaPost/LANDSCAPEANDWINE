<?php
/*
  * Template name: Template Home 2
  * */
get_header(); ?>
	<div class="header-image-box home-2">
		<?php if(ale_get_meta('template_home_2_image_image')): ?>
			<div class="bg-image" style="background-image: url(<?php echo esc_url(ale_get_meta('template_home_2_image_image')); ?>);"></div>
		<?php else: ?>
			<div class="slider_replacement"></div>
		<?php endif; ?>

		<section class="search-home-2">
			<h2><?php echo esc_attr(ale_get_meta('template_home_2_search_title')); ?></h2>
			<h3><?php echo esc_attr(ale_get_meta('template_home_2_search_desc')); ?></h3>
			<form action="<?php echo site_url()?>" role="search" method="get" class="cf">
				<input type="search" value="<?php echo get_search_query(); ?>" name="s" placeholder="<?php _e('Where you want to go?', 'aletheme'); ?>">
				<div class="form-button purple-bg">
					<input type="submit" value="<?php _e('Search', 'aletheme'); ?>">
				</div>
			</form>
		</section>
	</div>
	<div class="cf"></div>

	<div class="wrapper cf">
		<?php if(ale_get_meta('display_template_home_2_custom_box')!="off"): ?>
			<?php
			wp_reset_query();
			$count = esc_attr(ale_get_meta('template_home_2_blog_count'));
			$query_blog = new WP_Query(
				array(
					'posts_per_page' => $count,
					'post_type' => 'post',
					'ignore_sticky_posts' => 1,
					'post__not_in' => get_option('sticky_posts')
				)
			);
			if ($query_blog->have_posts()) : ?>
				<section class="template-home-2-blog left">
					<h2><?php echo esc_attr(ale_get_meta('template_home_2_blog_title')); ?></h2>
					<div class="blog-posts">
						<?php while ($query_blog->have_posts()) : $query_blog->the_post(); ?>
							<article>
								<h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
								<div class="details">
									<span class="date"><?php the_time('j D Y'); ?></span>
									<span><i class="fa fa-comment"></i> <?php $comments_count = wp_count_comments($post->ID); echo esc_attr($comments_count->total_comments); ?></span>
								</div>
							</article>
						<?php endwhile; ?>
					</div>

					<div class="twitter">
						<div class="twitter-block blue-tweet-bg"></div>

						<?php if(ale_get_option('twiname')): ?>
							<div class="button-box">
								<a href="https://twitter.com/<?php echo esc_attr(ale_get_option('twiname')); ?>" class="twitter-follow-button" data-show-count="false" data-size="large"><?php _e('Follow','aletheme'); ?> @<?php echo esc_attr(ale_get_option('twiname')); ?></a>
								<script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?'http':'https';if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+'://platform.twitter.com/widgets.js';fjs.parentNode.insertBefore(js,fjs);}}(document, 'script', 'twitter-wjs');</script>
							</div>
						<?php endif; ?>
					</div>
				</section>
			<?php endif; wp_reset_query();?>
			
			<?php
			wp_reset_query();
			$count = esc_attr(ale_get_meta('template_home_2_hot_deals_count'));
			$query_hot_deals = new WP_Query(
				array(
					'posts_per_page' => $count,
					'post_type' => 'hot_deals',
					'ignore_sticky_posts' => 1,
					'post__not_in' => get_option('sticky_posts')
				)
			);
			$hot_deals_count = 0;
			if ($query_hot_deals->have_posts()) : ?>
				<div class="template-home-2-hot_deals left cf">
					<?php while ($query_hot_deals->have_posts()) : $query_hot_deals->the_post(); $hot_deals_count++; ?>
						<article class="left <?php if($hot_deals_count !== 1){echo 'half';} ?>">
							<?php if($hot_deals_count == 1){ ?>
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
								$attachments = get_posts( $args );
								if ( $attachments ) { ?>
									<div class="slider">
										<ul class="slides">
											<?php foreach ( $attachments as $attachment ) { ?>
												<li>
													<?php echo wp_get_attachment_image( $attachment->ID, 'hot_deals-home-2-1' ); ?>
												</li>
											<?php } ?>
										</ul>
									</div>
								<?php } else{
									if(get_the_post_thumbnail($post->ID,'hot_deals-home-2-1')){
										echo get_the_post_thumbnail($post->ID,'hot_deals-home-2-1');
									} else{
										echo '<img src="http://placehold.it/510x510/eeeeee/636363&amp;text=No+image" alt>';
									}
								}
							} else{
								if(get_the_post_thumbnail($post->ID,'hot_deals-home-2-2')){
									echo get_the_post_thumbnail($post->ID,'hot_deals-home-2-2');
								} else{
									echo '<img src="http://placehold.it/255x335/eeeeee/636363&amp;text=No+image" alt>';
								}
							} ?>
							<div class="text">
								<?php if($hot_deals_count == 1){ ?>
									<a href="<?php the_permalink(); ?>" class="offer green-bg"><?php _e('special offer','aletheme'); ?></a>
								<?php } ?>
								<h2 <?php if($hot_deals_count !== 1){echo 'class="small"';} ?>><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>

								<?php if($hot_deals_count == 1){ ?>
									<div class="string small">
										<?php echo ale_trim_excerpt(20); ?>
									</div>
								<?php } else{ ?>
									<div class="string">
										<?php echo ale_trim_excerpt(5); ?>
									</div>
								<?php } ?>

								<div class="details">
									<?php if(ale_get_meta('hd_price') != '') { ?>
										<span class="price <?php if($hot_deals_count !== 1){ echo 'small';} ?>"><?php echo esc_attr(ale_get_option('currency')) . esc_attr(ale_get_meta('hd_price')); ?></span>
									<?php } ?>

									<?php if(ale_get_meta('hd_transport') != '') { ?>
										<span>
											<i class="fa fa-<?php echo esc_attr(ale_get_meta('hd_transport')); ?>"></i>
										</span>
									<?php } ?>

									<?php if(ale_get_meta('hd_days') != '') { ?>
										<span class="date"><?php echo esc_attr(ale_get_meta('hd_days')); ?> <?php _e('days','aletheme'); ?></span>
									<?php } ?>
								</div>
							</div>
						</article>
					<?php endwhile; ?>
				</div>
			<?php endif; wp_reset_query();?>

			<?php
			wp_reset_query();
			$count = esc_attr(ale_get_meta('template_home_2_rewiews_count'));
			$query_testimonials = new WP_Query(
				array(
					'posts_per_page' => $count,
					'post_type' => 'testimonial',
					'ignore_sticky_posts' => 1,
					'post__not_in' => get_option('sticky_posts')
				)
			);
			if ($query_testimonials->have_posts()) : ?>
				<section class="template-home-2-rewiews left">
					<h2><?php echo esc_attr(ale_get_meta('template_home_2_rewiews_title')); ?></h2>
					<div class="testimonials-posts slider">
						<ul class="slides">
							<?php while ($query_testimonials->have_posts()) : $query_testimonials->the_post(); ?>
								<li>
									<article>
										<div class="image">
											<?php if(get_the_post_thumbnail($post->ID,'testimonial-home-2-thumba')){
												echo get_the_post_thumbnail($post->ID,'testimonial-home-2-thumba');
											} else{
												echo '<img src="http://placehold.it/92x92/eeeeee/636363&amp;text=No+image" alt>';
											} ?>
										</div>

										<h3><?php the_title(); ?></h3>
										<div class="string">
											<?php echo ale_trim_excerpt(20); ?>
										</div>
									</article>
								</li>
							<?php endwhile; ?>
						</ul>
					</div>
				</section>
			<?php endif; wp_reset_query();?>

			<div class="template-home-2-faq left">
				<h2><?php echo esc_attr(ale_get_meta('template_home_2_faq_title')); ?></h2>
				<div class="accordion">
					<?php if(ale_get_meta('template_home_2_faq_title1')): ?>
						<h3><?php echo esc_attr(ale_get_meta('template_home_2_faq_title1'));?></h3>
						<div class="text">
							<p><?php echo esc_attr(ale_get_meta('template_home_2_faq_text1'));?></p>
						</div>
					<?php endif; ?>

					<?php if(ale_get_meta('template_home_2_faq_title2')): ?>
						<h3><?php echo esc_attr(ale_get_meta('template_home_2_faq_title2'));?></h3>
						<div class="text">
							<p><?php echo esc_attr(ale_get_meta('template_home_2_faq_text2'));?></p>
						</div>
					<?php endif; ?>

					<?php if(ale_get_meta('template_home_2_faq_title3')): ?>
						<h3><?php echo esc_attr(ale_get_meta('template_home_2_faq_title3'));?></h3>
						<div class="text">
							<p><?php echo esc_attr(ale_get_meta('template_home_2_faq_text3'));?></p>
						</div>
					<?php endif; ?>

					<?php if(ale_get_meta('template_home_2_faq_title4')): ?>
						<h3><?php echo esc_attr(ale_get_meta('template_home_2_faq_title4'));?></h3>
						<div class="text">
							<p><?php echo esc_attr(ale_get_meta('template_home_2_faq_text4'));?></p>
						</div>
					<?php endif; ?>
				</div>
			</div>
		<?php endif; ?>

		<?php if(ale_get_meta('display_template_home_2_info')!="off"): ?>
			<div class="template-home-2-info cf">
				<div class="item left cf">
					<i class="fa fa-<?php echo esc_attr(ale_get_meta('template_home_2_info_icon_1'));?> green-col"></i>
					<p><?php echo esc_attr(ale_get_meta('template_home_2_info_text_1')); ?></p>
				</div>

				<div class="item left cf">
					<i class="fa fa-<?php echo esc_attr(ale_get_meta('template_home_2_info_icon_2'));?> green-col"></i>
					<p><?php echo esc_attr(ale_get_meta('template_home_2_info_text_2')); ?></p>
				</div>

				<div class="item left cf">
					<i class="fa fa-<?php echo esc_attr(ale_get_meta('template_home_2_info_icon_3'));?> green-col"></i>
					<p><?php echo esc_attr(ale_get_meta('template_home_2_info_text_3')); ?></p>
				</div>
			</div>
		<?php endif; ?>
	</div>

	<?php if(ale_get_meta('display_template_home_2_gallery')!="off"): ?>
		<section class="template-home-2-gallery">
			<div class="bg-image">
				<?php if(ale_get_meta('template_home_2_gallery_image')){
					echo '<img src="'.esc_url(ale_get_meta('template_home_2_gallery_image')).'" alt>';
				} else{
					echo '<img src="'.esc_url(ale_get_meta('template_home_2_gallery_image')).'" alt>';
				}?>
			</div>

			<div class="wrapper cf">
				<div class="title left">
					<h3><?php echo esc_attr(ale_get_meta('template_home_2_gallery_title_1')); ?></h3>
					<h2><?php echo esc_attr(ale_get_meta('template_home_2_gallery_title_2')); ?></h2>
				</div>

				<div class="video-icon left">
					<i class="fa fa-play"></i>
				</div>

				<div class="pop-up">
					<div class="content-wrapper">
						<div class="exit"><i class="fa fa-times"></i></div>
						<div class="item">
							<?php echo wp_oembed_get(esc_url(ale_get_meta('template_home_2_gallery_video')),array('width'=>'100%','height'=>'400px')); ?>
						</div>
					</div>
				</div>

				<div class="text left">
					<p><?php echo esc_attr(ale_get_meta('template_home_2_gallery_text')); ?></p>
				</div>
			</div>

			<?php
			wp_reset_query();
			$count = esc_attr(ale_get_meta('template_home_2_gallery_count'));
			$query_gallery = new WP_Query(
				array(
					'posts_per_page' => $count,
					'post_type' => 'gallery',
					'ignore_sticky_posts' => 1,
					'post__not_in' => get_option('sticky_posts')
				)
			);
			$gallery_count = 0;
			if ($query_gallery->have_posts()) : ?>
				<div class="gallery-items">
					<?php while ($query_gallery->have_posts()) : $query_gallery->the_post(); $gallery_count++; ?>
						<a href="<?php the_permalink(); ?>" class="<?php
							if($gallery_count > 9){
								$gallery_count = rand(1,9);
							}
							echo 'marg-left-' . $gallery_count . ' z-index-' . rand(1,5) . ' marg-top-' .rand(1,3);
						?>">
							<?php if($gallery_count % 3 == 1){
								if(get_the_post_thumbnail($post->ID,'gallery-home-slide1')){
									echo get_the_post_thumbnail($post->ID,'gallery-home-slide1');
								} else{
									echo '<img src="http://placehold.it/176x286/eeeeee/636363&amp;text=No+image" alt>';
								}
							} elseif ($gallery_count % 2 == 1) {
								if(get_the_post_thumbnail($post->ID,'gallery-home22')){
									echo get_the_post_thumbnail($post->ID,'gallery-home22');
								} else{
									echo '<img src="http://placehold.it/412x295/eeeeee/636363&amp;text=No+image" alt>';
								}
							} else{
								if(get_the_post_thumbnail($post->ID,'gallery-home21')){
									echo get_the_post_thumbnail($post->ID,'gallery-home21');
								} else{
									echo '<img src="http://placehold.it/295x295/eeeeee/636363&amp;text=No+image" alt>';
								}
							} ?>
						</a>
					<?php endwhile; ?>
				</div>
			<?php endif; wp_reset_query();?>
		</section>
	<?php endif; ?>

	<?php if(ale_get_meta('display_template_home_2_partners')!="off"): ?>
		<section class="template-home-2-partners">
			<div class="wrapper top">
				<?php if (ale_get_meta('template_home_2_partners_title_image')) {
					echo '<img src="'.esc_url(ale_get_meta('template_home_2_partners_title_image')).'" alt>';
				} else {
					echo '<h2>'.esc_attr(ale_get_meta('template_home_2_partners_title')).'</h2>';
				}?>
				<p><?php echo esc_attr(ale_get_meta('template_home_2_partners_text')); ?></p>
			</div>

			<div class="items">
				<div class="wrapper">
					<?php if (ale_get_meta('template_home_2_partners_image_1')){
						echo '<a href="' . esc_url(ale_get_meta('template_home_2_partners_link_1')) . '"><img src="' . esc_url(ale_get_meta('template_home_2_partners_image_1')) . '" alt></a>';
					} ?>

					<?php if (ale_get_meta('template_home_2_partners_image_2')){
						echo '<a href="' . esc_url(ale_get_meta('template_home_2_partners_link_2')) . '"><img src="' . esc_url(ale_get_meta('template_home_2_partners_image_2')) . '" alt></a>';
					} ?>

					<?php if (ale_get_meta('template_home_2_partners_image_3')){
						echo '<a href="' . esc_url(ale_get_meta('template_home_2_partners_link_3')) . '"><img src="' . esc_url(ale_get_meta('template_home_2_partners_image_3')) . '" alt></a>';
					} ?>

					<?php if (ale_get_meta('template_home_2_partners_image_4')){
						echo '<a href="' . esc_url(ale_get_meta('template_home_2_partners_link_4')) . '"><img src="' . esc_url(ale_get_meta('template_home_2_partners_image_4')) . '" alt></a>';
					} ?>

					<?php if (ale_get_meta('template_home_2_partners_image_5')){
						echo '<a href="' . esc_url(ale_get_meta('template_home_2_partners_link_5')) . '"><img src="' . esc_url(ale_get_meta('template_home_2_partners_image_5')) . '" alt></a>';
					} ?>

					<?php if (ale_get_meta('template_home_2_partners_image_6')){
						echo '<a href="' . esc_url(ale_get_meta('template_home_2_partners_link_6')) . '"><img src="' . esc_url(ale_get_meta('template_home_2_partners_image_6')) . '" alt></a>';
					} ?>
				</div>
			</div>
		</section>
	<?php endif; ?>
<?php get_footer();