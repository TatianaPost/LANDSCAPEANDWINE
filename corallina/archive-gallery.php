<?php get_header(); ?>
	<div class="header-image-box simple-page">
		<div class="slider_replacement"></div>
	</div>
	<div class="cf"></div>

	<section class="content">
		<div class="wrapper gallery-archive">
			<div class="tcw-wrap">
				<h1 class="content-title"><?php wp_title("", true); ?></h1>
				<div class="breadcrumb">
					<?php echo get_breadcrumbs(); ?>
				</div>
			</div>

			<div class="grid-system-marg">
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
					$count = esc_attr(ale_get_option('gallery_number'));
					$query_gallery = new WP_Query(
						array(
							'posts_per_page' => $count,
							'post_type' => 'gallery',
							'ignore_sticky_posts' => 1,
							'post__not_in' => get_option('sticky_posts'),
							'paged' => $paged
						)
					);
					$gallery_count = 0;
					if ($query_gallery->have_posts()) : while ($query_gallery->have_posts()) : $query_gallery->the_post(); $gallery_count++; ?>
					<article class="grid-item">
						<?php if($gallery_count % 3 == 0){
							if(get_the_post_thumbnail($post->ID,'gallery-arhive-2')){
								echo get_the_post_thumbnail($post->ID,'gallery-arhive-2');
							} else{
								echo '<img src="http://placehold.it/176x232/eeeeee/636363&amp;text=No+image" alt>';
							}
						} elseif($gallery_count % 2 == 0){
							if(get_the_post_thumbnail($post->ID,'gallery-arhive-3')){
								echo get_the_post_thumbnail($post->ID,'gallery-arhive-3');
							} else{
								echo '<img src="http://placehold.it/176x179/eeeeee/636363&amp;text=No+image" alt>';
							}
						} else{
							if(get_the_post_thumbnail($post->ID,'gallery-arhive-1')){
								echo get_the_post_thumbnail($post->ID,'gallery-arhive-1');
							} else{
								echo '<img src="http://placehold.it/176x250/eeeeee/636363&amp;text=No+image" alt>';
							}
						} ?>
						<div class="purple-bg"></div>
						<div class="text">
							<h2><?php the_title(); ?></h2>
							<span><?php echo esc_attr(ale_get_meta('gal_country')); ?></span>
						</div>
						<a href="<?php the_permalink(); ?>"></a>
					</article>
				<?php endwhile; endif; wp_reset_query(); ?>
			</div>
			<?php ale_custom_page_links($query_gallery); ?>
		</div>
	</section>

<?php get_footer(); ?>