<!doctype html>
<!--[if lt IE 7]> <html class="no-js lt-ie9 lt-ie8 lt-ie7" <?php language_attributes(); ?>> <![endif]-->
<!--[if IE 7]>    <html class="no-js lt-ie9 lt-ie8" <?php language_attributes(); ?>> <![endif]-->
<!--[if IE 8]>    <html class="no-js lt-ie9" <?php language_attributes(); ?>> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" <?php language_attributes(); ?>> <!--<![endif]-->
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>" />
	<title><?php wp_title('|', true, 'right'); bloginfo('name'); ?></title>
	<?php wp_head(); ?>
</head>
<body <?php body_class(); ?> >

<?php if(ale_get_option('preloader')==1){ ale_part('preloader'); } ?>

<div <?php if(ale_get_option('preloader')==1){ ?>class="body"<?php } ?> >
	<header class="wrapper">
		<div class="line-top cf">
			<div class="weather-box col-4">
				<div class="city-wrap">
					<a href="javascript:void(0)" class="w-select"><?php _e('Country','aletheme'); ?> <i class="fa fa-angle-down"></i></a>
					<ul class="city-drop">
						<?php wp_list_categories('taxonomy=hot_deals-category&title_li='); ?>
					</ul>
				</div>
			</div>


			<?php if(ale_get_option('sitelogo')){ ?>
				<div class="logo col-4">
						<a href="<?php echo home_url(); ?>/"><img src="<?php echo esc_url(ale_get_option('sitelogo')); ?>" alt="" /></a>
				</div>
			<?php } else { ?>
				<div class="logo text-logo col-4">
					<a href="<?php echo home_url(); ?>/"><?php echo bloginfo('name'); ?></a>
				</div>
			<?php } ?>


			<div class="contact-box col-4">
				<?php if(ale_get_option('con_phone') != '') { ?>
					<span class="phone"><i class="fa fa-mobile"></i><?php echo esc_attr(ale_get_option('con_phone')); ?></span>
				<?php } ?>
				<?php if(ale_get_option('con_email') != '') { ?>
					<span class="email"><i class="fa fa-envelope"></i><?php echo esc_attr(ale_get_option('con_email')); ?></span>
				<?php } ?>
			</div>
		</div>

		<div class="line-bottom cf">
			<div class="menu-icon close"><i class="fa fa-bars"></i></div>
			<nav>
				<?php if(has_nav_menu('header_menu')) {
					wp_nav_menu(array(
						'theme_location'=> 'header_menu',
						'menu'			=> 'Header Menu',
						'menu_class'	=> 'nav-menu',
						'walker'		=> new Aletheme_Nav_Walker(),
						'container'		=> '',
					));
				} ?>
			</nav>
			
			<div class="search-box">
				<form role="search" method="get" id="searchform" action="<?php echo site_url()?>" class="purple-bg">
					<input type="search" class="search-inp" value="<?php echo get_search_query(); ?>" name="s" placeholder="<?php _e('Keywords','aletheme'); ?>" />
					<button type="submit" class="btn-search" id="searchsubmit"><i class="fa fa-search"></i></button>
				</form>
			</div>
		</div>
	</header>

	<?php if(ale_get_option('display_color_selector')!="Disable"): ?>
		<?php ale_part('selector'); ?>
	<?php endif; ?>