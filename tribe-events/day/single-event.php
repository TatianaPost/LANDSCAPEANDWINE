<?php
/**
 * Day View Single Event
 * This file contains one event in the day view
 *
 * Override this template in your own theme by creating a file at [your-theme]/tribe-events/day/single-event.php
 *
 * @package TribeEventsCalendar
 *
 */

if ( ! defined( 'ABSPATH' ) ) {
	die( '-1' );
} ?>

<?php

$venue_details = array();

if ( $venue_name = tribe_get_meta( 'tribe_event_venue_name' ) ) {
	$venue_details[] = $venue_name;
}

if ( $venue_address = tribe_get_meta( 'tribe_event_venue_address' ) ) {
	$venue_details[] = $venue_address;
}
// Venue microformats
$has_venue = ( $venue_details ) ? ' vcard' : '';
$has_venue_address = ( $venue_address ) ? ' location' : '';
?>
	<article class="grid-item left loop-single-event">

		<div class="featured-image-conteiner">
			<?php echo tribe_event_featured_image( null, 'medium' ) ?>
			<div class="tribe-events-event-meta vcard">
				<div class="author <?php echo esc_attr($has_venue_address); ?>">

					<?php if ( $venue_details ) : ?>
						<!-- Venue Display Info -->
						<div class="tribe-events-venue-details">
							<i class="fa fa-map-marker"></i>
							<?php echo implode( ', ', $venue_details ); ?>
						</div> <!-- .tribe-events-venue-details -->
					<?php endif; ?>

				</div>
			</div><!-- .tribe-events-event-meta -->
		</div>


		<div class="text cf">

			<?php do_action( 'tribe_events_before_the_event_title' ) ?>
			<h3><a href="<?php echo tribe_get_event_link() ?>"><?php the_title(); ?></a></h3>
			<?php do_action( 'tribe_events_after_the_event_title' ) ?>

			<div class="date"><?php echo tribe_events_event_schedule_details() ?></div>


			<div class="string">
				<?php the_excerpt() ?>
			</div>

			<?php do_action( 'tribe_events_before_the_meta' ) ?>

			<?php do_action( 'tribe_events_after_the_meta' ) ?>

			<div class="details cf">
				<?php if ( tribe_get_cost() ) : ?>
					<span class="price"><?php echo tribe_get_cost( null, true ); ?></span>
				<?php endif; ?>



			</div>
		</div>
	</article>
	<!-- .tribe-events-list-event-description -->
<?php do_action( 'tribe_events_after_the_content' ) ?>