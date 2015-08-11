<?php get_header(); ?>
	<div class="header-image-box simple-page">
		<div class="slider_replacement"></div>
	</div>
	<div class="cf"></div>
	<section class="content">
		<div class="container hotdeals-archive">
			<div class="tcw-wrap">
				<h1 class="content-title"><?php wp_title( '', true, 'right' ); ?></h1>
				<div class="breadcrumb">
					<?php echo get_breadcrumbs(); ?>
				</div>
			</div>
			<div class="items cf grid-system-marg">
			<div class="gutter"></div>
				<?php 
				$hot_deals_count = 0;
				if (have_posts()) : while (have_posts()) : the_post(); $hot_deals_count++;
					$args_slider = array(
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
					$attachments = get_posts( $args_slider ); ?>
					<article class="grid-item left<?php if($hot_deals_count==1){echo ' big';} if($hot_deals_count==1){ echo ' slider'; } ?>">
						<?php if($hot_deals_count==1){ ?>
							<?php if ( $attachments ) { ?>
								<ul class="slides">
									<?php foreach ( $attachments as $attachment ) { ?>
										<li>
											<?php echo wp_get_attachment_image( $attachment->ID, 'hot_deals-home-big' ); ?>
										</li>
									<?php } ?>
								</ul>
							<?php } else {
							if(get_the_post_thumbnail($post->ID,'hot_deals-home-big')){
									echo get_the_post_thumbnail($post->ID,'hot_deals-home-big');
								} else{
									echo '<img src="http://placehold.it/470x352/eeeeee/636363&amp;text=No+image" alt>';
								}
							}
						} else{
							if(get_the_post_thumbnail($post->ID,'hot_deals-home')){
								echo get_the_post_thumbnail($post->ID,'hot_deals-home');
							} else{
								echo '<img src="http://placehold.it/225x144/eeeeee/636363&amp;text=No+image" alt>';
							}
						} ?>

						<div class="text">
							<?php if($hot_deals_count==1){ ?>
								<a href="<?php the_permalink(); ?>" class="button-offer"><?php _e('special offer','aletheme'); ?></a>
							<?php } ?>
							<h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>

							<div class="string">
								<?php echo ale_trim_excerpt(12); ?>
							</div>

							<div class="details">
								<?php if(ale_get_meta('hd_price') != '') { ?>
									<span class="price"><?php echo esc_attr(ale_get_option('currency')) . esc_attr(ale_get_meta('hd_price')); ?></span>
								<?php } ?>

								<?php if(ale_get_meta('hd_transport') != '') { ?>
									<i class="fa fa-<?php echo esc_attr(ale_get_meta('hd_transport')); ?> transport"></i>
								<?php } ?>

								<?php if(ale_get_meta('hd_days') != '') { ?>
									<span class="date"><?php echo esc_attr(ale_get_meta('hd_days')); ?> <?php _e('days','aletheme'); ?></span>
								<?php } ?>
							</div>
						</div>
					</article>
				<?php endwhile; endif; wp_reset_query(); ?>
			</div>
			<?php ale_page_links(); ?>
		</div>
	</section>
<?php get_footer(); ?>