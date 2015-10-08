<?php
/*
  * Template name: Template Blog 1
  * */
get_header(); ?>
	<div class="header-image-box simple-page">
		<div class="slider_replacement"></div>
	</div>
	<div class="cf"></div>

	<section class="content">
		<div class="wrapper">
			<div class="tcw-wrap ">
				<h1 class="content-title"><?php _e('Novedades','aletheme'); ?></h1>
				<div class="breadcrumb">
					<a href="<?php echo home_url(); ?>"><?php _e('Homepage','aletheme'); ?></a><span>&#8594;</span><span><?php _e('Novedades','aletheme'); ?></span>
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
								<a href="<?php the_permalink(); ?>" class="offer boton-reservar-taxonomy"><?php _e('Mas informacion', 'aletheme'); ?></a>
							</div>

							<div class="text cf">
								<div class="col-5">
									<h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
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
    
<div class="containercolumna"> 
	<a href="http://voyenbus.com.ar/wordpress/hot_deals-category/landscape-adventure/"><img class="breakpoint" src="http://voyenbus.com.ar/wordpress/wp-content/uploads/2015/09/icono-altamontana.png" width="200" height="200" /></a>
	<a href="http://voyenbus.com.ar/wordpress/hot_deals-category/toursprivados/"><img class="breakpoint" src="http://voyenbus.com.ar/wordpress/wp-content/uploads/2015/09/icono-winetour.png" width="200" height="200" /></a>
	<img class="breakpoint" src="http://voyenbus.com.ar/wordpress/wp-content/uploads/2015/09/icono-alojamiento.png" width="200" height="200" />
	<a href="http://voyenbus.com.ar/wordpress/vehiculos/"><img class="breakpoint" src="http://voyenbus.com.ar/wordpress/wp-content/uploads/2015/09/icono-vehiculos.png" width="200" height="200" /></a>
</div>

<?php get_footer(); ?>