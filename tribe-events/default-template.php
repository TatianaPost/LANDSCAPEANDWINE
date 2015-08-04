<?php
/**
 * Default Events Template
 * This file is the basic wrapper template for all the views if 'Default Events Template'
 * is selected in Events -> Settings -> Template -> Events Template.
 *
 * Override this template in your own theme by creating a file at [your-theme]/tribe-events/default-template.php
 *
 * @package TribeEventsCalendar
 *
 */

if ( ! defined( 'ABSPATH' ) ) {
	die( '-1' );
}

get_header(); ?>
	<div class="header-image-box simple-page">
		<div class="slider_replacement"></div>
	</div>
	<div class="cf"></div>

	<section class="content">
		<div class="container">
			<div class="tcw-wrap ">
				<h1 class="content-title"><?php wp_title("", true); ?></h1>
				<div class="breadcrumb">
					<?php echo get_breadcrumbs(); ?>
				</div>
			</div>

			<div class="page-content cf">
				<div class="main-content left">
					<div class="story">
						<div id="tribe-events-pg-template">
							<?php tribe_events_before_html(); ?>
							<?php tribe_get_view(); ?>
							<?php tribe_events_after_html(); ?>
						</div> <!-- #tribe-events-pg-template -->
					</div>
				</div>

				<?php get_sidebar(); ?>
			</div>
		</div>
	</section>

<?php get_footer(); ?>