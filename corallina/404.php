<?php get_header(); ?>
	<div class="header-image-box simple-page">
		<div class="slider_replacement"></div>
	</div>
	<div class="cf"></div>
	<!-- Content -->
	<section class="content">
		<div class="wrapper">
			<div class="tcw-wrap">
				<h1 class="content-title"><?php _e('Error 404','aletheme'); ?></h1>
				<div class="breadcrumb">
					<?php echo get_breadcrumbs(); ?>
				</div>
			</div>
			<h1 class="errorh1"><?php _e('Error, Page not found','aletheme'); ?></h1>
			<p class="error_text"><?php _e('Sorry, but the page you\'re looking for has not found. Try checking the URL for errors, then hit the refresh<br /> button on your browser.','aletheme'); ?></p>
			<a href="<?php echo home_url();?>" class="gohomebut"><?php _e('Return to the homepage','aletheme'); ?></a>
		</div>
	</section>
<?php get_footer(); ?>