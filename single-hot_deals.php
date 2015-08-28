<?php
// send contact
if (isset($_POST['contact'])) {
	$error = ale_send_contact($_POST['contact']);
}
get_header(); ?>
	<div class="header-image-box simple-page">
		<div class="slider_replacement"></div>
	</div>
	<div class="cf"></div>

<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
	<section class="content">
		<div class="container">
			<div class="tcw-wrap ">
				<h1 class="content-title"><?php wp_title( '', true, 'right' ); ?></h1>
				<div class="breadcrumb">
					<?php echo get_breadcrumbs(); ?>
				</div>
			</div>

			<div class="single-hot_deals">
				<div class="tabs">
					<ul class="tab-nav cf">
						<li><a href="#tab-1"><?php _e('Descripción','aletheme'); ?></a></li>
						<li><a href="#tab-2"><?php _e('Vehículos disponibles','aletheme'); ?></a></li>
						<li><a href="#tab-3"><?php _e('Mapa','aletheme'); ?></a></li>
						<li><a href="#tab-4"><?php _e('Video','aletheme'); ?></a></li>
					</ul>

					<div id="tab-1" class="item cf">
						<div class="image">
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
							if ( $attachments ) { ?>
								<div class="slider">
									<ul class="slides">
										<?php foreach ( $attachments as $attachment ) { ?>
											<li>
												<?php echo wp_get_attachment_image( $attachment->ID, 'hot_deals-single' ); ?>
											</li>
										<?php } ?>
									</ul>
								</div>

								<div class="image-nav">
									<ul class="slides">
										<?php foreach ( $attachments as $attachment ) { ?>
											<li>
												<?php echo wp_get_attachment_image( $attachment->ID, 'hot_deals-single_small' ); ?>
											</li>
										<?php } ?>
									</ul>
								</div>
							<?php } else{
								if(get_the_post_thumbnail($post->ID,'hot_deals-single')){
									echo get_the_post_thumbnail($post->ID,'hot_deals-single');
								}else{
									echo '<img src="http://placehold.it/920x355/eeeeee/636363&amp;text=No+image" alt>';
								}
							} ?>
						</div>
						<h2><?php the_title(); ?></h2>

						<div class="string story">
							<?php the_content(); ?>
						</div>

						<div class="details">
							<?php if(ale_get_meta('hd_price') != '') { ?>
								<span class="price"><?php echo esc_attr(ale_get_option('currency')) . esc_attr(ale_get_meta('hd_price')); ?></span>
							<?php } ?>

							<?php if(ale_get_meta('hd_transport') != '') { ?>
								<i class="fa fa-<?php echo esc_attr(ale_get_meta('hd_transport')); ?> transport"></i>
							<?php } ?>

							<?php if(ale_get_meta('hd_days') != '') { ?>
								<span class="date"><?php echo esc_attr(ale_get_meta('hd_days')); ?> <?php _e('days','aletheme'); ?></span>
							<?php } ?>
						</div>
					</div>

					<div id="tab-2" class="item cf">
						<div class="string story">
							<?php echo ale_filtered_meta('hd_type_flight_details'); ?>
						</div>
					</div>

					<div id="tab-3" class="item cf">
						<div class="hot-deals-map">
						<?php echo do_shortcode('[ale_map address="'.esc_attr(ale_get_meta('hd_type_address')).'" width="100%" height="355px"]'); ?>
						</div>
					</div>

					<div id="tab-4" class="item cf">
						<?php comments_template(); ?>
					</div>
				</div>

				<div class="form purple-bg">
					<form method="post" action="<?php the_permalink();?>">
						<?php if (isset($_GET['success'])) : ?>
							<p class="success"><?php _e('Thank you for your message!', 'aletheme')?></p>
						<?php endif; ?>
						<div class="form-inner cf">
							<input type="email" name="contact[email]" placeholder="<?php _e('E-mail', 'aletheme'); ?>" required>
							<input type="text" name="contact[name]" placeholder="<?php _e('First name', 'aletheme'); ?>" required>
							<input type="text" name="contact[last-name]" placeholder="<?php _e('Last name', 'aletheme'); ?>" required>
							<input type="text" name="contact[country]" placeholder="<?php _e('Country', 'aletheme'); ?>" required>
							<input type="text" name="contact[address]" placeholder="<?php _e('Adrress', 'aletheme'); ?>" required>
							<input type="text" name="contact[phone]" placeholder="<?php _e('Phone number', 'aletheme'); ?>" required>
							<input type="text" name="contact[date]" placeholder="<?php _e('Arriving date', 'aletheme'); ?>">
							<select class="dropdown" name="contact[adults]">
								<option><?php _e('Adults 1', 'aletheme'); ?></option>
								<option><?php _e('Adults 2', 'aletheme'); ?></option>
								<option><?php _e('Adults 3', 'aletheme'); ?></option>
								<option><?php _e('Adults 4', 'aletheme'); ?></option>
								<option><?php _e('Adults 5', 'aletheme'); ?></option>
								<option><?php _e('Adults 6', 'aletheme'); ?></option>
							</select>
							<textarea name="contact[message]" placeholder="<?php _e('Message', 'aletheme'); ?>" required></textarea>
						</div>

						<div class="form-bottom green-bg cf">
							<label>
								<input type="checkbox" name="contact[accept]" value="on" required>
								<span><?php _e('Accept the Terms of Conditions', 'aletheme'); ?></span>
							</label>

							<div class="right">
								<div class="button reset">
									<input type="reset" value="<?php _e('Reset', 'aletheme'); ?>">
								</div>

								<div class="button">
									<input type="submit" value="<?php _e('Book now', 'aletheme'); ?>">
								</div>
							</div>
						</div>

						<input type="hidden" name="contact[title]" value="<?php the_title(); ?>">
						<?php wp_nonce_field() ?>
					</form>
				</div>
			</div>
		</div>
	</section>

<?php endwhile; endif;
get_footer(); ?>