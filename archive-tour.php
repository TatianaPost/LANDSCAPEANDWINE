<?php get_header(); ?>
	<div class="header-image-box simple-page">
		<div class="slider_replacement"></div>
	</div>
	<div class="cf"></div>

	<section class="content">
		<div class="wrapper tour-archive">
			<div class="tcw-wrap">
				<h1 class="content-title"><?php wp_title("", true); ?></h1>
				<div class="breadcrumb">
					<?php echo get_breadcrumbs(); ?>
				</div>
			</div>

			<div class="items">
				<?php
				wp_reset_query();
				if ( get_query_var('paged') ){
					$paged = get_query_var('paged');
				} elseif ( get_query_var('page') ){
					$paged = get_query_var('page');
				} else{
					$paged = 'paged';
				}
				$count = esc_attr(ale_get_option('tour_number'));
				$query_tour = new WP_Query(
					array(
						'posts_per_page' => $count,
						'post_type' => 'tour',
						'ignore_sticky_posts' => 1,
						'post__not_in' => get_option('sticky_posts'),
						'paged' => $paged
					)
				);
				$tour_count = 0;
				if ($query_tour->have_posts()) : while ($query_tour->have_posts()) : $query_tour->the_post(); $tour_count++; ?>
					<article>
						<div class="image">
							<?php if(get_the_post_thumbnail($post->ID,'tour-list-thumba')){
								echo get_the_post_thumbnail($post->ID,'tour-list-thumba');
							}else{
								echo '<img src="http://placehold.it/959x470/eeeeee/636363&amp;text=No+image" alt>';
							} ?>
							<div class="text <?php if($tour_count % 2 == 0){echo 'right-text';} ?>">
								<h2><a href="<?php the_permalink(); ?>" ><?php the_title(); ?></a></h2>
								<div class="string">
									<?php echo ale_trim_excerpt(40); ?>
								</div>
							</div>
						</div>

						<?php $query_testimonial = new WP_Query(
							array(
								'posts_per_page' => -1,
								'post_type' => 'testimonial',
								'ignore_sticky_posts' => 1,
								'post__not_in' => get_option('sticky_posts'),
								'paged' => $paged,
								'meta_query' => array(
									array(
										'key' => 'ale_test_in_tour',
										'value' => get_the_ID()
									)
								),
							)
						);
						if ($query_testimonial->have_posts()) : ?>
							<div class="tour-review purple-bg">
								<div class="slider">
									<ul class="slides">
										<?php while ($query_testimonial->have_posts()) : $query_testimonial->the_post(); ?>
											<li>
												<article class="tour-item cf">
													<div class="tour-image left">
														<?php if(get_the_post_thumbnail($post->ID,'testimonial-item-thumba')){
															echo get_the_post_thumbnail($post->ID,'testimonial-item-thumba');
														} else{
															echo '<img src="http://placehold.it/116x114/eeeeee/636363&amp;text=No+image" alt>';
														} ?>
													</div>

													<div class="tour-text left">
														<div class="tour-head">
															<h3><a href="<?php the_permalink(); ?>" class="yellow-col"><?php the_title(); ?></a></h3>
															<?php if(ale_get_meta('test_rating') != '') { ?>
																<span class="rating"><i class="fa fa-star yellow-col"></i><?php echo esc_attr(ale_get_meta('test_rating')); ?><em>/100</em></span>
															<?php } ?>
														</div>

														<div class="tour-string">
															<?php echo ale_trim_excerpt(20); ?>
														</div>
													</div>
												</article>
											</li>
										<?php endwhile; ?>
									</ul>
								</div>
							</div>
						<?php endif; ?>
					</article>
				<?php endwhile; endif; wp_reset_query(); ?>
			</div>

			<?php ale_custom_page_links($query_tour); ?>
		</div>
	</section>

<?php get_footer(); ?>