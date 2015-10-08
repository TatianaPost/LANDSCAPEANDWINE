<?php get_header(); ?>
	<div class="header-image-box simple-page">
		<div class="slider_replacement"></div>
	</div>
	<div class="cf"></div>

	<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
	<section class="content">
		<div class="wrapper">
			<div class="tcw-wrap ">
				<h1 class="content-title"><?php _e('Novedades','aletheme'); ?></h1>
				<div class="breadcrumb">
					<a href="javascript:history.go(-1)"><img src="http://voyenbus.com.ar/wordpress/wp-content/uploads/2015/05/volver.png" width="24" height="24" /></a><a href="javascript:history.go(-1)">Volver</a>
				</div>
			</div>

			<div class="page-content cf">
				<div class="main-content left single-page">
					<div class="image">
						<?php if(get_the_post_thumbnail($post->ID,'post-list-thumba')){
							echo get_the_post_thumbnail($post->ID,'post-list-thumba');
						} else{
							echo '<img src="http://placehold.it/675x261/eeeeee/636363&amp;text=No+image" alt>';
						}
						$args = array(
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

							
						<?php } ?>
					</div>

					<div class="top">
						<h2><?php the_title(); ?></h2>
					</div>

					<div class="story">
						<?php the_content(); ?>
						<?php wp_link_pages(); ?>
					</div>

				</div>
				
				<?php get_sidebar(); ?>
			</div>
		</div>
	</section>

	<?php endwhile; endif;
get_footer(); ?>