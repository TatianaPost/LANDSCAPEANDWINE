<?php get_header(); ?>
	<div class="header-image-box simple-page">
		<div class="slider_replacement"></div>
	</div>
	<div class="cf"></div>

	<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
	<section class="content">
		<div class="wrapper">
			<div class="tcw-wrap ">
				<h1 class="content-title"><?php _e('Author','aletheme'); ?></h1>
				<div class="breadcrumb">
					<?php echo get_breadcrumbs(); ?>
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
							<span class="overlay"><span class="purple-bg"></span><i class="fa fa-plus"></i></span>

							<div class="pop-up">
								<div class="content-wrapper">
									<div class="exit"><i class="fa fa-times"></i></div>
									<div class="item slider">
										<ul class="slides">
											<?php foreach ( $attachments as $attachment ) { ?>
												<li data-thumb="<?php echo esc_url($attachment->guid); ?>">
													<?php echo wp_get_attachment_image( $attachment->ID, 'gallery-big' ); ?>
												</li>
											<?php } ?>
										</ul>
									</div>
								</div>
							</div>
						<?php } ?>
					</div>

					<div class="top">
						<h2><?php the_title(); ?></h2>
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

					<div class="story">
						<?php the_content(); ?>
					</div>

					<?php comments_template(); ?>
				</div>
				
				<?php get_sidebar(); ?>
			</div>
		</div>
	</section>

	<?php endwhile; endif;
get_footer(); ?>