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
					<a href="javascript:history.go(-1)"><img src="http://voyenbus.com.ar/wordpress/wp-content/uploads/2015/05/volver.png" width="24" height="24" /></a><a href="javascript:history.go(-1)">Volver</a>
				</div>
			</div>

			<div class="single-hot_deals">
				<div class="tabs">
					<ul class="tab-nav cf">
						<li><a href="#tab-1"><?php _e('Descripción','aletheme'); ?></a></li>
						<li><a href="#tab-2"><?php _e('Vehículos disponibles','aletheme'); ?></a></li>
						<li><a href="#tab-3"><?php _e('Mapa','aletheme'); ?></a></li>
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


						<div class="string story">
							<?php the_content(); ?>
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
				</div>
				<div class="titulosdescripcion">Realice su reserva</div>
				<div class="form purple-bg">
					<form method="post" action="<?php the_permalink();?>">
						<?php if (isset($_GET['success'])) : ?>
							<p class="success"><?php _e('RESERVACIÓN REALIZADA!!! &nbsp;Nos contactaremos a la brevedad con usted. Muchas Gracias.', 'aletheme')?></p>
						<?php endif; ?>
						<div class="form-inner cf">
							<input type="email" name="contact[email]" placeholder="<?php _e('E-mail', 'aletheme'); ?>" required>
							<input type="text" name="contact[name]" placeholder="<?php _e('Nombre', 'aletheme'); ?>" required>
							<input type="text" name="contact[last-name]" placeholder="<?php _e('Apellido', 'aletheme'); ?>" required>
							<input type="text" name="contact[country]" placeholder="<?php _e('Pais', 'aletheme'); ?>" required>
							<input type="text" name="contact[address]" placeholder="<?php _e('Ciudad', 'aletheme'); ?>" required>
							<input type="text" name="contact[phone]" placeholder="<?php _e('Teléfono', 'aletheme'); ?>" required>
							<input type="text" name="contact[date]" placeholder="<?php _e('Fecha de arrivo', 'aletheme'); ?>">
							<select class="dropdown" name="contact[adults]">
								<option><?php _e('Adulto 1', 'aletheme'); ?></option>
								<option><?php _e('Adulto 2', 'aletheme'); ?></option>
								<option><?php _e('Adulto 3', 'aletheme'); ?></option>
								<option><?php _e('Adulto 4', 'aletheme'); ?></option>
								<option><?php _e('Adulto 5', 'aletheme'); ?></option>
								<option><?php _e('Adulto 6', 'aletheme'); ?></option>
							</select>
							<textarea name="contact[message]" placeholder="<?php _e('Mensaje', 'aletheme'); ?>" required></textarea>
						</div>

						<div class="form-bottom green-bg cf">


							<div class="right">
								<div class="button reset">
									<input type="reset" value="<?php _e('CANCELAR', 'aletheme'); ?>">
								</div>

								<div class="button">
									<input type="submit" value="<?php _e('RESERVAR', 'aletheme'); ?>">
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
    
<div class="containercolumna"> 
	<a href="http://voyenbus.com.ar/wordpress/hot_deals-category/landscape-adventure/"><img class="breakpoint" src="http://voyenbus.com.ar/wordpress/wp-content/uploads/2015/09/icono-altamontana.png" width="200" height="200" /></a>
	<a href="http://voyenbus.com.ar/wordpress/hot_deals-category/tours-privados/"><img class="breakpoint" src="http://voyenbus.com.ar/wordpress/wp-content/uploads/2015/09/icono-winetour.png" width="200" height="200" /></a>
	<img class="breakpoint" src="http://voyenbus.com.ar/wordpress/wp-content/uploads/2015/09/icono-alojamiento.png" width="200" height="200" />
	<img class="breakpoint" src="http://voyenbus.com.ar/wordpress/wp-content/uploads/2015/09/icono-vehiculos.png" width="200" height="200" />
</div>

<?php endwhile; endif;
get_footer(); ?>