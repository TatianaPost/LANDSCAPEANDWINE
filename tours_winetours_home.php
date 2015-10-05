<?php
/*
  * Template name: Template Blog 4
  * */
get_header(); ?>
	<div class="header-image-box simple-page">
		<div class="slider_replacement"></div>
	</div>
	<div class="cf"></div>

	<section class="content">
		<div class="wrapper">
			<div class="tcw-wrap ">
				<h1 class="content-title"><?php _e('Blog','aletheme'); ?></h1>
				<div class="breadcrumb">
					<a href="<?php echo home_url(); ?>"><?php _e('Homepage','aletheme'); ?></a><span>&#8594;</span><span><?php _e('Wine Tours','aletheme'); ?></span>
				</div>
			</div>

			<div class="page-content template-blog-1 cf">
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
					$count = esc_attr(ale_get_meta('post_num'));
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
						<article>
							<div class="image">
								<?php if(get_the_post_thumbnail($post->ID,'post-blog-1')){
									echo get_the_post_thumbnail($post->ID,'post-blog-1');
								} else{
									echo '<img src="http://placehold.it/675x338/eeeeee/636363&amp;text=No+image" alt>';
								} ?>
								<a href="<?php the_permalink(); ?>" class="green-bg"><?php _e('Traveling', 'aletheme'); ?></a>
							</div>

							<div class="text cf">
								<div class="col-5">
									<h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
									<div class="details">
										<span class="date"><?php the_time('j D Y'); ?></span>
										<span><i class="fa fa-comment"></i> <?php $comments_count = wp_count_comments($post->ID); echo esc_attr($comments_count->total_comments); ?></span>
									</div>
								</div>

								<div class="col-7 string">
									<?php echo ale_trim_excerpt(40); ?>
								</div>
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