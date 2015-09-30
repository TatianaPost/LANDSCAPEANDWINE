<?php
/**
 * Template Name: Template About 1
 */
get_header(); ?>
	<div class="header-image-box simple-page">
		<div class="slider_replacement"></div>
	</div>
	<div class="cf"></div>

	<section class="content">
		<div class="wrapper">
			<div class="tcw-wrap">
				<h1 class="content-title"><?php wp_title("", true); ?></h1>
				<div class="breadcrumb">
					<?php echo get_breadcrumbs(); ?>
				</div>
			</div>
		</div>
	</section>

	<?php if(ale_get_meta('display_template_about_1_about')!="off"):
		wp_reset_query();
		if (have_posts()) : ?>
			<article class="template-about-1-post wrapper cf">
				<?php while (have_posts()) : the_post(); ?>
					<div class="image col-4">
						<?php if(get_the_post_thumbnail($post->ID,'page-about-1-1')){
							echo get_the_post_thumbnail($post->ID,'page-about-1-1');
						} else{
							echo '<img src="http://placehold.it/307x397/eeeeee/636363&amp;text=No+image" alt>';
						} ?>
					</div>

					<div class="text col-8">
						<h2><?php echo esc_attr(ale_get_meta('about_1_title')); ?></h2>
						<h3><?php echo esc_attr(ale_get_meta('about_1_desc')); ?></h3>
						<div class="string story">
							<?php the_content(); ?>
						</div>

						<div class="images cf">
							<?php $args = array(
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
							if ( $attachments ) {
								foreach ( $attachments as $attachment ) { ?>
									<div class="item left">
										<?php echo wp_get_attachment_image( $attachment->ID, 'page-about-1-2' ); ?>
										<div class="overlay">
											<span class="purple-bg"></span>
											<i class="fa fa-search"></i>
										</div>
									</div>
								<?php }
							} ?>
						</div>

						<div class="pop-up">
							<div class="content-wrapper">
								<div class="exit"><i class="fa fa-times"></i></div>
								<div class="item slider">
									<ul class="slides">
										<?php $args = array(
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
										if ( $attachments ) {
											foreach ( $attachments as $attachment ) { ?>
												<li>
													<?php echo wp_get_attachment_image( $attachment->ID, 'page-full' ); ?>
												</li>
											<?php }
										} ?>
									</ul>
								</div>
							</div>
						</div>
					</div>
				<?php endwhile; ?>
			</article>
		<?php endif; wp_reset_query();
	endif; ?>

	<?php if(ale_get_meta('display_template_about_1_team')!="off"):
		wp_reset_query();
		$query_team = new WP_Query(
			array(
				'posts_per_page' => 4,
				'post_type' => 'team',
				'ignore_sticky_posts' => 1,
				'post__not_in' => get_option('sticky_posts')
			)
		);
		if ($query_team->have_posts()) : ?>
		<section class="template-about-1-team purple-bg">
			<?php if(ale_get_meta('about_1_team_bg')){ ?>
				<div class="bg-image" style="background-image: url(<?php echo esc_url(ale_get_meta('about_1_team_bg')); ?>);"></div>
			<?php }?>

			<div class="wrapper">
				<div class="top">
					<h2><?php echo esc_attr(ale_get_meta('about_1_team_title')); ?></h2>
					<p><?php echo esc_attr(ale_get_meta('about_1_team_desc')); ?></p>
				</div>
				
				<div class="items cf">
					<?php while ($query_team->have_posts()) : $query_team->the_post(); ?>
						<article class="left">
							<?php if(get_the_post_thumbnail($post->ID,'team-about-1')){
								echo get_the_post_thumbnail($post->ID,'team-about-1');
							} else{
								echo '<img src="http://placehold.it/222x276/eeeeee/636363&amp;text=No+image" alt>';
							} ?>
							<h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
							<span><?php echo esc_attr(ale_get_meta('team_post')); ?></span>
						</article>
					<?php endwhile; ?>
				</div>
			</div>
		</section>
		<?php endif; wp_reset_query();
	endif; ?>

	<?php if(ale_get_meta('display_template_about_1_partners')!="off"):
		if(ale_get_meta('about_1_partners_img_1') || ale_get_meta('about_1_partners_img_2')||
		ale_get_meta('about_1_partners_img_3') || ale_get_meta('about_1_partners_img_4') ||
		ale_get_meta('about_1_partners_img_5') || ale_get_meta('about_1_partners_img_6')): ?>
			<section class="template-about-1-partners wrapper">
				<div class="top">
					<h2><?php echo esc_attr(ale_get_meta('about_1_partners_title')); ?></h2>
					<p><?php echo esc_attr(ale_get_meta('about_1_partners_desc')); ?></p>
				</div>

				<div class="items">
					<?php if(ale_get_meta('about_1_partners_img_1')){ ?>
						<a href="<?php echo esc_url(ale_get_meta('about_1_partners_link_1')); ?>">
							<img src="<?php echo esc_url(ale_get_meta('about_1_partners_img_1')); ?>" alt>
						</a>
					<?php } ?>

					<?php if(ale_get_meta('about_1_partners_img_2')){ ?>
						<a href="<?php echo esc_url(ale_get_meta('about_1_partners_link_2')); ?>">
							<img src="<?php echo esc_url(ale_get_meta('about_1_partners_img_2')); ?>" alt>
						</a>
					<?php } ?>

					<?php if(ale_get_meta('about_1_partners_img_3')){ ?>
						<a href="<?php echo esc_url(ale_get_meta('about_1_partners_link_3')); ?>">
							<img src="<?php echo esc_url(ale_get_meta('about_1_partners_img_3')); ?>" alt>
						</a>
					<?php } ?>

					<?php if(ale_get_meta('about_1_partners_img_4')){ ?>
						<a href="<?php echo esc_url(ale_get_meta('about_1_partners_link_4')); ?>">
							<img src="<?php echo esc_url(ale_get_meta('about_1_partners_img_4')); ?>" alt>
						</a>
					<?php } ?>

					<?php if(ale_get_meta('about_1_partners_img_5')){ ?>
						<a href="<?php echo esc_url(ale_get_meta('about_1_partners_link_5')); ?>">
							<img src="<?php echo esc_url(ale_get_meta('about_1_partners_img_5')); ?>" alt>
						</a>
					<?php } ?>

					<?php if(ale_get_meta('about_1_partners_img_6')){ ?>
						<a href="<?php echo esc_url(ale_get_meta('about_1_partners_link_6')); ?>">
							<img src="<?php echo esc_url(ale_get_meta('about_1_partners_img_6')); ?>" alt>
						</a>
					<?php } ?>
				</div>
			</section>
		<?php endif;
	endif; ?>

	<?php if(ale_get_meta('display_template_about_1_info')!="off"): ?>
		<section class="template-about-1-info">
			<?php if(ale_get_meta('about_1_info_bg')){ ?>
				<div class="bg-image" style="background-image: url(<?php echo esc_url(ale_get_meta('about_1_info_bg')); ?>);"></div>
			<?php }?>
			
			<div class="wrapper">
				<div class="top">
					<h2><?php echo esc_attr(ale_get_meta('about_1_info_title')); ?></h2>
					<p><?php echo esc_attr(ale_get_meta('about_1_info_desc')); ?></p>
				</div>

				<div class="items cf">
					<article class="left">
						<i class="fa fa-<?php echo esc_attr(ale_get_meta('about_1_info_icon_1')); ?>"></i>
						<h3><?php echo esc_attr(ale_get_meta('about_1_info_title_1')); ?></h3>
						<p><?php echo esc_attr(ale_get_meta('about_1_info_text_1')); ?></p>
					</article>

					<article class="left">
						<i class="fa fa-<?php echo esc_attr(ale_get_meta('about_1_info_icon_2')); ?>"></i>
						<h3><?php echo esc_attr(ale_get_meta('about_1_info_title_2')); ?></h3>
						<p><?php echo esc_attr(ale_get_meta('about_1_info_text_2')); ?></p>
					</article>

					<article class="left">
						<i class="fa fa-<?php echo esc_attr(ale_get_meta('about_1_info_icon_3')); ?>"></i>
						<h3><?php echo esc_attr(ale_get_meta('about_1_info_title_3')); ?></h3>
						<p><?php echo esc_attr(ale_get_meta('about_1_info_text_3')); ?></p>
					</article>

					<article class="left">
						<i class="fa fa-<?php echo esc_attr(ale_get_meta('about_1_info_icon_4')); ?>"></i>
						<h3><?php echo esc_attr(ale_get_meta('about_1_info_title_4')); ?></h3>
						<p><?php echo esc_attr(ale_get_meta('about_1_info_text_4')); ?></p>
					</article>

					<article class="left">
						<i class="fa fa-<?php echo esc_attr(ale_get_meta('about_1_info_icon_5')); ?>"></i>
						<h3><?php echo esc_attr(ale_get_meta('about_1_info_title_5')); ?></h3>
						<p><?php echo esc_attr(ale_get_meta('about_1_info_text_5')); ?></p>
					</article>

					<article class="left">
						<i class="fa fa-<?php echo esc_attr(ale_get_meta('about_1_info_icon_6')); ?>"></i>
						<h3><?php echo esc_attr(ale_get_meta('about_1_info_title_6')); ?></h3>
						<p><?php echo esc_attr(ale_get_meta('about_1_info_text_6')); ?></p>
					</article>
				</div>
			</div>
		</section>
	<?php endif; ?>
<?php get_footer(); ?>