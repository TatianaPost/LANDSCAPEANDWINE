<?php
/**
 * Template Name: Template About
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
					<?php get_breadcrumbs(); ?>
				</div>
			</div>
		</div>
	</section>

	<?php if(ale_get_meta('display_template_about_video')!="off"): ?>
		<section class="home-video green-bg">
			<div class="wrapper cf">
				<div class="col-6">
					<div class="video-box">
						<?php if(ale_get_meta('about-video-image')){
							echo '<img src="' . esc_url(ale_get_meta('about-video-image')) . '">';
						} else{
							echo '<img src="http://placehold.it/470x223/eeeeee/636363&amp;text=No+image" alt>';
						} ?>
						<div class="click-overlay">
							<i class="fa fa-play-circle-o"></i>
							<h4><?php echo esc_attr(ale_get_meta('about-video-title')); ?></h4>
							<p><?php echo esc_attr(ale_get_meta('about-video-desc')); ?></p>
						</div>
					</div>

					<div class="pop-up">
						<div class="content-wrapper">
							<div class="exit"><i class="fa fa-times"></i></div>
							<div class="item">
								<?php echo wp_oembed_get(esc_url(ale_get_meta('about-video-link')),array('width'=>'100%','height'=>'400px')); ?>
							</div>
						</div>
					</div>
				</div>

				<div class="col-6 text-box">
					<h3><?php echo esc_attr(ale_get_meta('about-video-text-desc')); ?></h3>
					<h2><?php echo esc_attr(ale_get_meta('about-video-text-title')); ?></h2>
					<hr>
					<div class="text story">
						<?php if (have_posts()) : while (have_posts()) : the_post();
							the_content();
						endwhile; endif; wp_reset_query();?>
					</div>
				</div>
			</div>
		</section>
	<?php endif; ?>

	<?php if(ale_get_meta('display_template_about_partners')!="off"):
		if(ale_get_meta('about_partners_img_1') || ale_get_meta('about_partners_img_2')||
		ale_get_meta('about_partners_img_3') || ale_get_meta('about_partners_img_4') ||
		ale_get_meta('about_partners_img_5') || ale_get_meta('about_partners_img_6')): ?>
			<section class="template-about-partners wrapper">
				<div class="top">
					<h2><?php echo esc_attr(ale_get_meta('about_partners_title')); ?></h2>
					<p><?php echo esc_attr(ale_get_meta('about_partners_desc')); ?></p>
				</div>

				<div class="items">
					<?php if(ale_get_meta('about_partners_img_1')){ ?>
						<a href="<?php echo esc_url(ale_get_meta('about_partners_link_1')); ?>">
							<img src="<?php echo esc_url(ale_get_meta('about_partners_img_1')); ?>" alt>
						</a>
					<?php } ?>

					<?php if(ale_get_meta('about_partners_img_2')){ ?>
						<a href="<?php echo esc_url(ale_get_meta('about_partners_link_2')); ?>">
							<img src="<?php echo esc_url(ale_get_meta('about_partners_img_2')); ?>" alt>
						</a>
					<?php } ?>

					<?php if(ale_get_meta('about_partners_img_3')){ ?>
						<a href="<?php echo esc_url(ale_get_meta('about_partners_link_3')); ?>">
							<img src="<?php echo esc_url(ale_get_meta('about_partners_img_3')); ?>" alt>
						</a>
					<?php } ?>

					<?php if(ale_get_meta('about_partners_img_4')){ ?>
						<a href="<?php echo esc_url(ale_get_meta('about_partners_link_4')); ?>">
							<img src="<?php echo esc_url(ale_get_meta('about_partners_img_4')); ?>" alt>
						</a>
					<?php } ?>

					<?php if(ale_get_meta('about_partners_img_5')){ ?>
						<a href="<?php echo esc_url(ale_get_meta('about_partners_link_5')); ?>">
							<img src="<?php echo esc_url(ale_get_meta('about_partners_img_5')); ?>" alt>
						</a>
					<?php } ?>

					<?php if(ale_get_meta('about_partners_img_6')){ ?>
						<a href="<?php echo esc_url(ale_get_meta('about_partners_link_6')); ?>">
							<img src="<?php echo esc_url(ale_get_meta('about_partners_img_6')); ?>" alt>
						</a>
					<?php } ?>
				</div>
			</section>
		<?php endif;
	endif; ?>

	<?php if(ale_get_meta('display_template_about_accordion')!="off"): ?>
		<section class="about-accordion">
			<div class="wrapper">
				<h2><?php echo esc_attr(ale_get_meta('about_title')); ?></h2>

				<div class="cf">
					<div class="col-6 text story">
						<?php echo esc_attr(ale_get_meta('about_left_text')); ?>
					</div>

					<div class="col-6 accordion-box">
						<?php if(get_the_post_thumbnail($post->ID,'page-about-thumba')){
							echo get_the_post_thumbnail($post->ID,'page-about-thumba');
						}else{
							echo '<img src="http://placehold.it/470x151/eeeeee/636363&amp;text=No+image" alt>';
						} ?>

						<div class="accordion">
							<?php if(ale_get_meta('about_ac_tit1') != '') { ?>
								<h3><?php echo esc_attr(ale_get_meta('about_ac_tit1')); ?></h3>
								<p><?php echo esc_attr(ale_get_meta('about_ac_desc1')); ?></p>
							<?php } ?>

							<?php if(ale_get_meta('about_ac_tit2') != '') { ?>
								<h3><?php echo esc_attr(ale_get_meta('about_ac_tit2')); ?></h3>
								<p><?php echo esc_attr(ale_get_meta('about_ac_desc2')); ?></p>
							<?php } ?>

							<?php if(ale_get_meta('about_ac_tit3') != '') { ?>
								<h3><?php echo esc_attr(ale_get_meta('about_ac_tit3')); ?></h3>
								<p><?php echo esc_attr(ale_get_meta('about_ac_desc3')); ?></p>
							<?php } ?>

							<?php if(ale_get_meta('about_ac_tit4') != '') { ?>
								<h3><?php echo esc_attr(ale_get_meta('about_ac_tit4')); ?></h3>
								<p><?php echo esc_attr(ale_get_meta('about_ac_desc4')); ?></p>
							<?php } ?>
						</div>
					</div>
				</div>
			</div>
		</section>
	<?php endif; ?>

	<?php if(ale_get_meta('display_template_about_1_info')!="off"): ?>
		<section class="template-about-info">
			<?php if(ale_get_meta('about_info_bg')){ ?>
				<div class="bg-image" style="background-image: url(<?php echo esc_url(ale_get_meta('about_info_bg')); ?>);"></div>
			<?php }?>
			
			<div class="wrapper">
				<div class="items cf">
					<article class="left">
						<i class="fa fa-<?php echo esc_attr(ale_get_meta('about_info_icon_1')); ?>"></i>
						<h3><?php echo esc_attr(ale_get_meta('about_info_title_1')); ?></h3>
						<p><?php echo esc_attr(ale_get_meta('about_info_text_1')); ?></p>
					</article>

					<article class="left">
						<i class="fa fa-<?php echo esc_attr(ale_get_meta('about_info_icon_2')); ?>"></i>
						<h3><?php echo esc_attr(ale_get_meta('about_info_title_2')); ?></h3>
						<p><?php echo esc_attr(ale_get_meta('about_info_text_2')); ?></p>
					</article>

					<article class="left">
						<i class="fa fa-<?php echo esc_attr(ale_get_meta('about_info_icon_3')); ?>"></i>
						<h3><?php echo esc_attr(ale_get_meta('about_info_title_3')); ?></h3>
						<p><?php echo esc_attr(ale_get_meta('about_info_text_3')); ?></p>
					</article>

					<article class="left">
						<i class="fa fa-<?php echo esc_attr(ale_get_meta('about_info_icon_4')); ?>"></i>
						<h3><?php echo esc_attr(ale_get_meta('about_info_title_4')); ?></h3>
						<p><?php echo esc_attr(ale_get_meta('about_info_text_4')); ?></p>
					</article>

					<article class="left">
						<i class="fa fa-<?php echo esc_attr(ale_get_meta('about_info_icon_5')); ?>"></i>
						<h3><?php echo esc_attr(ale_get_meta('about_info_title_5')); ?></h3>
						<p><?php echo esc_attr(ale_get_meta('about_info_text_5')); ?></p>
					</article>

					<article class="left">
						<i class="fa fa-<?php echo esc_attr(ale_get_meta('about_info_icon_6')); ?>"></i>
						<h3><?php echo esc_attr(ale_get_meta('about_info_title_6')); ?></h3>
						<p><?php echo esc_attr(ale_get_meta('about_info_text_6')); ?></p>
					</article>
				</div>
			</div>
		</section>
	<?php endif; ?>

<?php get_footer(); ?>