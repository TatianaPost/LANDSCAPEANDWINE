<?php
/**
 * Template Name: Template About 2
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

	<?php if(ale_get_meta('display_template_about_2_desc')!="off"): ?>
		<section class="template-home-3-desc purple-bg">
			<?php if(ale_get_meta('template_about_2_desc_image')){
				echo '<div class="bg-image" style="background-image: url(' . esc_url(ale_get_meta('template_about_2_desc_image')) . ');"></div>';
			} ?>
			<h2><?php echo esc_attr(ale_get_meta('template_about_2_desc_title_1')); ?></h2>
			<h3><?php echo esc_attr(ale_get_meta('template_about_2_desc_title_2')); ?></h3>
			<p><?php echo esc_attr(ale_get_meta('template_about_2_desc_text')); ?></p>
			<hr class="yellow-bg">
		</section>
	<?php endif; ?>

	<?php if(ale_get_meta('display_template_about_2_team')!="off"):
		wp_reset_query();
		$query_team = new WP_Query(
			array(
				'posts_per_page' => 3,
				'post_type' => 'team',
				'ignore_sticky_posts' => 1,
				'post__not_in' => get_option('sticky_posts')
			)
		);
		if ($query_team->have_posts()) : ?>
			<section class="template-about-2-team wrapper">
				<h2><?php echo esc_attr(ale_get_meta('template_about_2_team_title')); ?></h2>
				<div class="items cf">
					<?php while ($query_team->have_posts()) : $query_team->the_post(); ?>
						<article class="left">
							<?php if(get_the_post_thumbnail($post->ID,'team-about-2')){
								echo get_the_post_thumbnail($post->ID,'team-about-2');
							} else{
								echo '<img src="http://placehold.it/302x318/eeeeee/636363&amp;text=No+image" alt>';
							} ?>
							<span class="team-post"><?php echo esc_attr(ale_get_meta('team_post')); ?></span>
							<h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
							<div class="string">
								<?php echo ale_trim_excerpt(16); ?>
							</div>

							<div class="social">
								<?php if(ale_get_meta('team_social_twi')){ ?>
									<a href="<?php echo esc_url(ale_get_meta('team_social_twi')); ?>"><i class="fa fa-twitter blue-tweet-col"></i></a>
								<?php } ?>

								<?php if(ale_get_meta('team_social_fb')){ ?>
									<a href="<?php echo esc_url(ale_get_meta('team_social_fb')); ?>"><i class="fa fa-facebook blue-fb-col"></i></a>
								<?php } ?>

								<?php if(ale_get_meta('team_social_pin')){ ?>
									<a href="<?php echo esc_url(ale_get_meta('team_social_pin')); ?>"><i class="fa fa-pinterest red-col"></i></a>
								<?php } ?>
							</div>
						</article>
					<?php endwhile; ?>
				</div>
			</section>
		<?php endif; wp_reset_query();
	endif; ?>

	<?php if(ale_get_meta('display_template_about_2_info')!="off"): ?>
		<div class="template-home-3-info purple-bg">
			<?php if(ale_get_meta('template_about_2_info_bg')){
				echo '<div class="bg-image" style="background-image: url(' . esc_url(ale_get_meta('template_about_2_info_bg')) . ');"></div>';
			} ?>
			<div class="wrapper cf">
				<article class="left">
					<i class="fa fa-<?php echo esc_attr(ale_get_meta('template_about_2_info_icon_1')); ?>"></i>
					<h2><?php echo esc_attr(ale_get_meta('template_about_2_info_number_1')); ?></h2>
					<h3><?php echo esc_attr(ale_get_meta('template_about_2_info_title_1')); ?></h3>
					<p><?php echo esc_attr(ale_get_meta('template_about_2_info_desc_1')); ?></p>
				</article>

				<article class="left">
					<i class="fa fa-<?php echo esc_attr(ale_get_meta('template_about_2_info_icon_2')); ?>"></i>
					<h2><?php echo esc_attr(ale_get_meta('template_about_2_info_number_2')); ?></h2>
					<h3><?php echo esc_attr(ale_get_meta('template_about_2_info_title_2')); ?></h3>
					<p><?php echo esc_attr(ale_get_meta('template_about_2_info_desc_2')); ?></p>
				</article>

				<article class="left">
					<i class="fa fa-<?php echo esc_attr(ale_get_meta('template_about_2_info_icon_3')); ?>"></i>
					<h2><?php echo esc_attr(ale_get_meta('template_about_2_info_number_3')); ?></h2>
					<h3><?php echo esc_attr(ale_get_meta('template_about_2_info_title_3')); ?></h3>
					<p><?php echo esc_attr(ale_get_meta('template_about_2_info_desc_3')); ?></p>
				</article>
			</div>
		</div>
	<?php endif; ?>

	<?php if(ale_get_meta('display_template_about_2_testimonials')!="off"): ?>
		<section class="template-home-3-testimonials">
			<div class="wrapper cf">
				<i class="fa fa-quote-right absolute-icon"></i>
				<div class="col-7">
					<h2><i class="fa fa-quote-right"></i><?php echo esc_attr(ale_get_meta('template_about_2_testimonials_title')); ?></h2>
					<?php
					wp_reset_query();
					$query_testimonial = new WP_Query(
						array(
							'posts_per_page' => 1,
							'post_type' => 'testimonial',
							'ignore_sticky_posts' => 1,
							'post__not_in' => get_option('sticky_posts'),
							'paged' => $paged,
							'meta_query' => array(
								array(
									'key' => 'ale_test_home_3',
									'value' => 'on'
								)
							),
						)
					);
					if ($query_testimonial->have_posts()) : while ($query_testimonial->have_posts()) : $query_testimonial->the_post(); ?>
						<article>
							<div class="image">
								<?php if(get_the_post_thumbnail($post->ID,'testimonial-home-2-thumba')){
									echo get_the_post_thumbnail($post->ID,'testimonial-home-2-thumba');
								} else{
									echo '<img src="http://placehold.it/92x92/eeeeee/636363&amp;text=No+image" alt>';
								} ?>
							</div>

							<h3><?php echo esc_attr(ale_get_meta('test_desc')); ?></h3>
							<div class="string">
								<?php echo ale_trim_excerpt(24); ?>
							</div>
							<div class="details">
								<i class="fa fa-map-marker green-col"></i>
								<span><strong><?php echo ale_get_meta('test_city'); ?></strong>, </span>
								<span><?php the_title(); ?></span>
							</div>
						</article>
					<?php endwhile; endif; wp_reset_query();?>
				</div>
				<div class="col-5">
					<div class="big-image">
						<?php if(ale_get_meta('template_about_2_testimonials_image')){
							echo '<img src="' . esc_url(ale_get_meta('template_about_2_testimonials_image')) . '"alt>';
						} else{
							echo '<img src="http://placehold.it/352x352/eeeeee/636363&amp;text=No+image" alt>';
						}?>
					</div>
				</div>
			</div>
		</section>
	<?php endif; ?>
<?php get_footer(); ?>