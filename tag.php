<?php get_header(); ?>
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

			<div class="page-content cf blog-archive">
				<div class="main-content left">
					<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
						<article class="item">
							<?php if(get_the_post_thumbnail($post->ID,'post-list-thumba')){
								echo get_the_post_thumbnail($post->ID,'post-list-thumba');
							} else{
								echo '<img src="http://placehold.it/675x261/eeeeee/636363&amp;text=No+image" alt>';
							} ?>
							<div class="text cf">
								<div class="post-title left">
									<h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
									<div class="details">
										<span class="date"><?php echo the_time('j M Y'); ?></span>
										<span class="comments"><i class="fa fa-comment"></i> <?php comments_number('0','1','%')?></span>
										<?php $category = get_the_category();
											foreach ($category as $cat) {
												echo '<span class="category">' . esc_attr($cat->cat_name) . '</span>';
											}
										?>
									</div>
								</div>

								<div class="string left">
									<?php echo ale_trim_excerpt(35); ?>
								</div>
							</div>
						</article>
					<?php endwhile; endif; wp_reset_query();?>

					<?php ale_page_links(); ?>
				</div>

				<?php get_sidebar(); ?>
			</div>

		</div>
	</section>

<?php get_footer(); ?>