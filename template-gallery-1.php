<?php
/*
  * Template name: Template Gallery 1
  * */
get_header(); ?>
	<div class="header-image-box simple-page">
		<div class="slider_replacement"></div>
	</div>
	<div class="cf"></div>

	<section class="content">
		<div class="wrapper">
			<div class="tcw-wrap ">
				<h1 class="content-title"><?php _e('Gallery','aletheme'); ?></h1>
				<div class="breadcrumb">
					<a href="<?php echo home_url(); ?>"><?php _e('Homepage','aletheme'); ?></a><span>&#8594;</span><span><?php _e('Gallery','aletheme'); ?></span>
				</div>
			</div>

			<div class="page-content template-gallery-1">
				<div class="gallery-items grid-system-marg">
					<div class="gutter"></div>
					<?php
					wp_reset_query();
					if ( get_query_var('paged') ){
						$paged = get_query_var('paged');
					} elseif ( get_query_var('page') ){
						$paged = get_query_var('page');
					} else{
						$paged = 'paged';
					}
					$count = esc_attr(ale_get_meta('gallery_1_num'));
					$query_gallery = new WP_Query(
						array(
							'posts_per_page' => $count,
							'post_type' => 'gallery',
							'ignore_sticky_posts' => 1,
							'post__not_in' => get_option('sticky_posts'),
							'paged' => $paged
						)
					);
					if ($query_gallery->have_posts()) : while ($query_gallery->have_posts()) : $query_gallery->the_post(); ?>
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

							<div class="text left">
								<h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
								<div class="string">
									<?php echo ale_trim_excerpt(4); ?>
								</div>
							</div>
						</article>
					<?php endwhile; endif; wp_reset_query();?>
				</div>

				<?php ale_custom_page_links($query_gallery); ?>
			</div>
		</div>
	</section>

<?php get_footer(); ?>