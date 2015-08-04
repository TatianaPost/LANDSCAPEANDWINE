<?php get_header(); ?>

	<div class="header-image-box simple-page">
		<div class="slider_replacement"></div>
	</div>
	<div class="cf"></div>

	<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
	<section class="content">
		<div class="container">
			<div class="tcw-wrap ">
				<h1 class="content-title"><?php wp_title("", true); ?></h1>
				<div class="breadcrumb">
					<?php echo get_breadcrumbs(); ?>
				</div>
			</div>

			<div class="page-content cf">
				<div class="main-content left">
					<div class="story">
						<?php the_content(); ?>
					</div>
				</div>
				
				<?php get_sidebar(); ?>
			</div>
		</div>
	</section>

	<?php endwhile; endif;
get_footer(); ?>