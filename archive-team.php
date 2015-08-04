<?php get_header(); ?>
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

	<?php wp_reset_query();
	$query_team = new WP_Query(
		array(
			'posts_per_page' => 1,
			'post_type' => 'team',
			'ignore_sticky_posts' => 1,
			'post__not_in' => get_option('sticky_posts'),
			'meta_query' => array(
				array(
					'key' => 'ale_team_show_on_archive',
					'value' => 'on'
				)
			),
		)
	);
	if ($query_team->have_posts()) : ?>
		<div class="team-archive-top-post">
			<?php if(ale_get_option('team_bg_image')){ ?>
				<div class="bg-image" style="background: url(<?php echo esc_url(ale_get_option('team_bg_image')); ?>);"></div>
			<?php } ?>

			<?php while ($query_team->have_posts()) : $query_team->the_post(); ?>
				<article class="wrapper cf">
					<div class="image left">
						<?php if(get_the_post_thumbnail($post->ID,'team-arhive')){
							echo get_the_post_thumbnail($post->ID,'team-arhive');
						} else{
							echo '<img src="http://placehold.it/335x397/eeeeee/636363&amp;text=No+image" alt>';
						} ?>
					</div>

					<div class="text left">
						<h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
						<span class="team-post"><?php echo esc_attr(ale_get_meta('team_post')); ?></span>
						<h3><?php echo esc_attr(ale_get_meta('team_desc')); ?></h3>
						<div class="string">
							<?php echo ale_trim_excerpt(50); ?>
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
					</div>
				</article>
			<?php endwhile; ?>
		</div>
	<?php endif; wp_reset_query(); ?>

	<?php wp_reset_query();
	if ( get_query_var('paged') ){
		$paged = get_query_var('paged');
	} elseif ( get_query_var('page') ){
		$paged = get_query_var('page');
	} else{
		$paged = 'paged';
	}
	$count = esc_attr(ale_get_option('team_number'));
	$query_team = new WP_Query(
		array(
			'posts_per_page' => $count,
			'post_type' => 'team',
			'ignore_sticky_posts' => 1,
			'post__not_in' => get_option('sticky_posts'),
			'paged' => $paged,
		)
	);
	if ($query_team->have_posts()) : ?>
		<section class="team-archive-posts wrapper">
			<h2><?php echo esc_attr(ale_get_option('team_title')); ?></h2>
			<div class="items grid-system-marg">
				<div class="gutter"></div>
				<?php while ($query_team->have_posts()) : $query_team->the_post(); ?>
					<article class="grid-item">
						<?php if(get_the_post_thumbnail($post->ID,'team-about-2')){
							echo get_the_post_thumbnail($post->ID,'team-about-2');
						} else{
							echo '<img src="http://placehold.it/302x318/eeeeee/636363&amp;text=No+image" alt>';
						} ?>
						<div class="text">
							<h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
							<span class="team-post"><?php echo esc_attr(ale_get_meta('team_post')); ?></span>
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
						</div>
					</article>
				<?php endwhile; ?>
			</div>
			<?php ale_custom_page_links($query_team); ?>
		</section>
	<?php endif; wp_reset_query(); ?>

<?php get_footer(); ?>