<?php

function ale_booking_filter($data){

	$args = array(
		'posts_per_page' => 12,
		'post_type' => 'hot_deals',
		'tax_query' => array(
			'relation' => 'AND',
		),
		'meta_query' => array(
			'relation' => 'AND',
		),

	);
	if(isset($data['q_country']) && $data['q_country']!='' ){
		array_push($args['tax_query'],array(
			'taxonomy' => 'hot_deals-category',
			'terms' => array( $data['q_country'] )
		));
	}
	if(isset($data['rooms']) && $data['rooms']!='' ){
		array_push($args['tax_query'],array(
			'taxonomy' => 'rooms-category',
			'terms' => array( $data['rooms'] )
		));
	}
	if(isset($data['baths']) && $data['baths']!='' ){
		array_push($args['tax_query'],array(
			'taxonomy' => 'baths-category',
			'terms' => array( $data['baths'] )
		));
	}
	if(isset($data['in-date']) && $data['in-date']!='' ){
		array_push($args['meta_query'],array(
				'key' => 'ale_hd_check_in_date',
				'value' => $data['in-date'],
				'compare' => '='
		));
	}
	if(isset($data['out-date']) && $data['out-date']!='' ){
		array_push($args['meta_query'],array(
				'key' => 'ale_hd_check_out_date',
				'value' => $data['out-date'],
				'compare' => '='
		));
	}
	if(isset($data['type']) && $data['type']!='' ){
		array_push($args['meta_query'],array(
				'key' => 'ale_hd_transport',
				'value' => $data['type'],
				'compare' => '='
		));
	}
	if((isset($data['price_down']) && $data['price_down']!='') && (isset($data['price_up']) && $data['price_up']!='') ){
		array_push($args['meta_query'],array(
			'key' => 'ale_hd_price',
			'value' => array( $data['price_down'], $data['price_up'] ),
			'type' => 'numeric',
			'compare' => 'BETWEEN'
		));
	} elseif(isset($data['price_up']) && $data['price_up']!=''){
		array_push($args['meta_query'],array(
			'key' => 'ale_hd_price',
			'value' => $data['price_up'],
			'type' => 'numeric',
			'compare' => '<='
		));
	}
	if(isset($data['rating']) && $data['rating']!='' ){
		array_push($args['meta_query'],array(
				'key' => 'ale_hd_rating',
				'value' => $data['rating'],
				'compare' => '='
		));
	}
	
	echo '<div class="items cf grid-system-marg">';
	echo '<div class="gutter"></div>';
	if(!empty($_POST)){
		wp_reset_query();
		global $post;
		$query_hot_deals = new WP_Query( $args );
		$count = ale_get_option('hot_deals_number');
		$hot_deals_count = 0;
		if ($query_hot_deals->have_posts()) : while ($query_hot_deals->have_posts()) : $query_hot_deals->the_post();
		$hot_deals_count++; ?>
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
			$attachments = get_posts( $args ); ?>
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
							<span class="price"><?php echo ale_get_option('currency') . ale_get_meta('hd_price'); ?></span>
						<?php } ?>

						<?php if(ale_get_meta('hd_transport') != '') { ?>
							<i class="fa fa-<?php echo ale_get_meta('hd_transport'); ?> transport"></i>
						<?php } ?>

						<?php if(ale_get_meta('hd_days') != '') { ?>
							<span class="date"><?php echo ale_get_meta('hd_days'); ?> <?php _e('days','aletheme'); ?></span>
						<?php } ?>
					</div>
				</div>
			</article>
		<?php endwhile;
		else : ale_part('notfound');
		endif; wp_reset_query();
	} else{
		wp_reset_query();
		global $post;
		if ( get_query_var('paged') ){
			$paged = get_query_var('paged');
		} elseif ( get_query_var('page') ){
			$paged = get_query_var('page');
		} else{
			$paged = 'paged';
		}
		$count = ale_get_option('hot_deals_number');
		$query_hot_deals = new WP_Query(
			array(
				'posts_per_page' => $count,
				'post_type' => 'hot_deals',
				'ignore_sticky_posts' => 1,
				'post__not_in' => get_option('sticky_posts'),
				'paged' => $paged,
			)
		);
		$hot_deals_count = 0;
		if ($query_hot_deals->have_posts()) : while ($query_hot_deals->have_posts()) : $query_hot_deals->the_post(); $hot_deals_count++;
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
							<span class="price"><?php echo ale_get_option('currency') . ale_get_meta('hd_price'); ?></span>
						<?php } ?>

						<?php if(ale_get_meta('hd_transport') != '') { ?>
							<i class="fa fa-<?php echo ale_get_meta('hd_transport'); ?> transport"></i>
						<?php } ?>

						<?php if(ale_get_meta('hd_days') != '') { ?>
							<span class="date"><?php echo ale_get_meta('hd_days'); ?> <?php _e('days','aletheme'); ?></span>
						<?php } ?>
					</div>
				</div>
			</article>
		<?php endwhile;
		else : ale_part('notfound');
		endif; wp_reset_query();
	}
	echo '</div>';
	ale_custom_page_links($query_hot_deals);
}
?>