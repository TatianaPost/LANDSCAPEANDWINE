<?php
/*
  * Template name: Template Blog 2
  * */
get_header(); ?>
	<div class="header-image-box simple-page">
		<div class="slider_replacement"></div>
	</div>
	<div class="cf"></div>

	<section class="content">
		<div class="wrapper">
			<div class="tcw-wrap ">
				<h1 class="content-title"><?php _e('NOVEDADES','aletheme'); ?></h1>
				<div class="breadcrumb">
					<a href="<?php echo home_url(); ?>"><?php _e('Homepage','aletheme'); ?></a><span>&#8594;</span><span><?php _e('Blog','aletheme'); ?></span>
				</div>
			</div>

			<div class="page-content template-blog-2 cf">
				<div class="main-content blog-items left">
					<?php
					wp_reset_query();
					if ( get_query_var('paged') ){
						$paged = get_query_var('paged');
					} elseif ( get_query_var('page') ){
						$paged = get_query_var('page');
					} else{
						$paged = 'paged';
					}
					$count = esc_attr(ale_get_meta('post_2_num'));
					$query_blog = new WP_Query(
						array(
							'posts_per_page' => $count,
							'post_type' => 'post',
							'ignore_sticky_posts' => 1,
							'post__not_in' => get_option('sticky_posts'),
							'paged' => $paged
						)
					);
					if ($query_blog->have_posts()) : while ($query_blog->have_posts()) : $query_blog->the_post(); ?>
						<article class="cf">
							<div class="image left">
								<?php if(get_the_post_thumbnail($post->ID,'post-blog-2')){
									echo get_the_post_thumbnail($post->ID,'post-blog-2');
								} else{
									echo '<img src="http://placehold.it/356x345/eeeeee/636363&amp;text=No+image" alt>';
								} ?>
							</div>

							<div class="text left">
								<h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
								<div class="string">
									<?php echo ale_trim_excerpt(34); ?>
								</div>

								<a href="<?php the_permalink(); ?>" class="read-more green-bg"><?php _e('Read more', 'aletheme'); ?></a>
							</div>
						</article>
					<?php endwhile; endif; wp_reset_query();?>

					<?php ale_custom_page_links($query_blog); ?>
				</div>

				<?php get_sidebar(); ?>
			</div>

		</div>
	</section>

<?php get_footer(); ?>