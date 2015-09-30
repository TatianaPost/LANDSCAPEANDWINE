<?php

// Google maps API
wp_print_scripts( 'google-maps-api' );

wp_reset_query();
//Query array to get all tour
$ale_map_tour = array(
	'post_type' => 'tour',
	'post_status' => 'publish',
	'posts_per_page' => -1
);

$ale_map_query = new WP_Query( $ale_map_tour );

$ale_tour_string = "";

if ( $ale_map_query->have_posts() ) :
	while ( $ale_map_query->have_posts() ) :
		$ale_map_query->the_post();

		if(empty($ale_tour_string)){
			$ale_tour_string .= '{';
		}else{
			$ale_tour_string .= ', {';
		}

		// The Title
		$ale_tour_string .= ' title:"'.get_the_title().'", ';

		// Title Link
		$ale_tour_string .= ' url:"'.get_permalink().'", ';

		// Thumbnail image
		if(has_post_thumbnail()){
			$image_id = get_post_thumbnail_id();
			$image_attributes = wp_get_attachment_image_src( $image_id, 'thumbnail' );
			if(!empty($image_attributes[0])){
				$ale_tour_string .= ' thumb:"'.$image_attributes[0].'", ';
			}
		} else{
			$ale_tour_string .= ' thumb:"http://placehold.it/327x192/f2f2f2/414141&amp;text=No+image", ';
		}

		// The Location
		$cause_location = ale_get_meta('tour_address');
		if(!empty($cause_location)){
			$coordinates = ale_map_get_coordinates( $cause_location );
			$ale_tour_string .= ' lat:'.$coordinates['lat'].', ';
			$ale_tour_string .= ' lng:'.$coordinates['lng'].', ';
		}

		$ale_tour_string .= ' icon:"'.get_template_directory_uri().'/css/images/map-icon.png", ';

		$ale_tour_string .= '} ';
	endwhile;
	wp_reset_query();
	?>
	<script type="text/javascript">
		function initializetourMap() {

			var tour = [
				<?php echo  $ale_tour_string; ?>
			];
			var location_center = new google.maps.LatLng(tour[0].lat,tour[0].lng);
			var mapOptions = {
				zoom: 12,
				scrollwheel: false,
				styles: [{"featureType":"water","elementType":"geometry.fill","stylers":[{"color":"#d3d3d3"}]},{"featureType":"transit","stylers":[{"color":"#808080"},{"visibility":"off"}]},{"featureType":"road.highway","elementType":"geometry.stroke","stylers":[{"visibility":"on"},{"color":"#b3b3b3"}]},{"featureType":"road.highway","elementType":"geometry.fill","stylers":[{"color":"#ffffff"}]},{"featureType":"road.local","elementType":"geometry.fill","stylers":[{"visibility":"on"},{"color":"#ffffff"},{"weight":1.8}]},{"featureType":"road.local","elementType":"geometry.stroke","stylers":[{"color":"#d7d7d7"}]},{"featureType":"poi","elementType":"geometry.fill","stylers":[{"visibility":"on"},{"color":"#ebebeb"}]},{"featureType":"administrative","elementType":"geometry","stylers":[{"color":"#a7a7a7"}]},{"featureType":"road.arterial","elementType":"geometry.fill","stylers":[{"color":"#ffffff"}]},{"featureType":"road.arterial","elementType":"geometry.fill","stylers":[{"color":"#ffffff"}]},{"featureType":"landscape","elementType":"geometry.fill","stylers":[{"visibility":"on"},{"color":"#efefef"}]},{"featureType":"road","elementType":"labels.text.fill","stylers":[{"color":"#696969"}]},{"featureType":"administrative","elementType":"labels.text.fill","stylers":[{"visibility":"on"},{"color":"#737373"}]},{"featureType":"poi","elementType":"labels.icon","stylers":[{"visibility":"off"}]},{"featureType":"poi","elementType":"labels","stylers":[{"visibility":"off"}]},{"featureType":"road.arterial","elementType":"geometry.stroke","stylers":[{"color":"#d6d6d6"}]},{"featureType":"road","elementType":"labels.icon","stylers":[{"visibility":"off"}]},{},{"featureType":"poi","elementType":"geometry.fill","stylers":[{"color":"#dadada"}]}]
			}
			var map = new google.maps.Map(document.getElementById("tour-map"), mapOptions);
			var bounds = new google.maps.LatLngBounds();
			var markers = new Array();
			var info_windows = new Array();

			for (var i=0; i < tour.length; i++) {

				markers[i] = new google.maps.Marker({
					position: new google.maps.LatLng(tour[i].lat,tour[i].lng),
					map: map,
					icon: tour[i].icon,
					title: tour[i].title,
					animation: google.maps.Animation.DROP
				});

				bounds.extend(markers[i].getPosition());

				info_windows[i] = new google.maps.InfoWindow({
					content:    '<div class="map-info-window cf"><div class="image col-6">'+
						'<a class="thumb-link" href="'+tour[i].url+'"><img class="thumba" src="'+tour[i].thumb+'" alt="'+tour[i].title+'"/></a>'+
						'</div></div>'
				});

				attachInfoWindowToMarker(map, markers[i], info_windows[i]);
			}

			map.fitBounds(bounds);

			function attachInfoWindowToMarker( map, marker, infoWindow ){
				google.maps.event.addListener( marker, 'click', function(){
					infoWindow.open( map, marker );
				});
			}

		}

		google.maps.event.addDomListener(window, 'load', initializetourMap);
	</script>

	<div id="map-head">
		<div id="tour-map"></div>
	</div>
<?php endif; ?>