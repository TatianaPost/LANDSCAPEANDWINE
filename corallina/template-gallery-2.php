<?php
/*
  * Template name: Template Gallery 2
  * */
get_header(); ?>
	<div class="header-image-box simple-page">
		<div class="slider_replacement"></div>
	</div>
	<div class="cf"></div>

	<section class="content">
		<div class="wrapper">
			<div class="tcw-wrap ">
				<h1 class="content-title"><?php wp_title("", true); ?></h1>
				<div class="breadcrumb">
					<?php echo get_breadcrumbs(); ?>
				</div>
			</div>

			<div class="page-content template-gallery-2">
				<div class="gallery-items grid-system">
					<?php
					wp_reset_query();
					if ( get_query_var('paged') ){
						$paged = get_query_var('paged');
					} elseif ( get_query_var('page') ){
						$paged = get_query_var('page');
					} else{
						$paged = 'paged';
					}
					$count = esc_attr(ale_get_meta('gallery_2_num'));
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
						<article class="grid-item<?php if(($gallery_count == 3) || ($gallery_count == 6)){echo ' big';} ?>">
							<?php if(($gallery_count == 3) || ($gallery_count == 6)){
								if(get_the_post_thumbnail($post->ID,'gallery-2-2')){
									echo get_the_post_thumbnail($post->ID,'gallery-2-2');
								} else{
									echo '<img src="http://placehold.it/446x669/eeeeee/636363&amp;text=No+image" alt>';
								}
							} else{
								if(get_the_post_thumbnail($post->ID,'gallery-2-1')){
									echo get_the_post_thumbnail($post->ID,'gallery-2-1');
								} else{
									echo '<img src="http://placehold.it/254x335/eeeeee/636363&amp;text=No+image" alt>';
								}
							}?>

							<div class="text">
								<h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
								<div class="string">
									<?php if(($gallery_count == 3) || ($gallery_count == 6)){
										echo ale_trim_excerpt(20);
									} else{
										echo ale_trim_excerpt(4);
									} ?>
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