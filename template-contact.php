<?php 
/**
 * Template Name: Template Contact
 */
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
	<!-- Content -->
	<section class="content">
		<div class="wrapper template-contact">
			<div class="tcw-wrap">
				<h1 class="content-title"><?php wp_title("", true); ?></h1>
				<div class="breadcrumb">
					<?php echo get_breadcrumbs(); ?>
				</div>
			</div>

			<div class="c-wrap">
				<div class="c-content left">
                
					<h3><?php _e('Contact form','aletheme'); ?></h3>
					<form method="post" action="<?php the_permalink();?>">
						<?php if (isset($_GET['success'])) : ?>
							<p class="success"><?php _e('Gracias por su mensaje!', 'aletheme')?></p>
						<?php endif; ?>
						<?php if (isset($error) && isset($error['msg'])) : ?>
							<p class="error"><?php echo esc_attr($error['msg']);?></p>
						<?php endif; ?>
						<input name="contact[name]" type="text" placeholder="<?php _e('Name','aletheme'); ?>" value="<?php echo isset($_POST['contact']['name']) ? $_POST['contact']['name'] : ''?>" required >
						<input name="contact[email]" type="email" placeholder="<?php _e('E-mail','aletheme'); ?>" value="<?php echo isset($_POST['contact']['email']) ? $_POST['contact']['email'] : ''?>" required >
						<textarea name="contact[message]" rows="5" placeholder="<?php _e('Message','aletheme'); ?>" required><?php echo isset($_POST['contact']['message']) ? $_POST['contact']['message'] : ''?></textarea>
						<div class="button">
							<input type="submit" value="<?php _e('Send','aletheme'); ?>">
						</div>
						<?php wp_nonce_field() ?>
					</form>
                
					<?php the_content(); ?>

					<?php if(ale_get_option('con_phone') != '') { ?>
					<div class="c-contact">
						<span class="c-icon"><i class="fa fa-phone purple-col"></i></span>
						<p><?php _e('Phone','aletheme'); ?>:
							<span><strong><?php echo esc_attr(ale_get_option('con_phone')); ?></strong></span>
						</p>
					</div>
					<?php } ?>

					<?php if(ale_get_option('con_adr') != '') {
						$str = esc_attr(ale_get_option('con_adr'));
						$pos = strpos($str," ");
						$str1 = substr($str,0,$pos);
						$str2 = substr($str,$pos); ?>
					<div class="c-contact">
						<span class="c-icon"><i class="fa fa-globe purple-col"></i></span>
						<p><?php _e('Address','aletheme'); ?>:
							<span><strong><?php echo esc_attr($str1); ?></strong><?php echo esc_attr($str2); ?></span>
						</p>
					</div>
					<?php } ?>

					<?php if(ale_get_option('con_email') != '') { ?>
					<div class="c-contact">
						<span class="c-icon"><i class="fa fa-envelope-o purple-col"></i></span>
						<p><?php _e('E-mail','aletheme'); ?>:
							<span><?php echo esc_attr(ale_get_option('con_email')); ?></span>
						</p>
					</div>
					<?php } ?>
				</div>

				<div class="c-form-w left purple-bg">
                
<?php the_content(); ?>

					<?php if(ale_get_option('con_phone') != '') { ?>
					<div class="c-contact">
						<span class="c-icon"><i class="fa fa-phone purple-col"></i></span>
						<p><?php _e('Phone','aletheme'); ?>:
							<span><strong><?php echo esc_attr(ale_get_option('con_phone')); ?></strong></span>
						</p>
					</div>
					<?php } ?>

					<?php if(ale_get_option('con_adr') != '') {
						$str = esc_attr(ale_get_option('con_adr'));
						$pos = strpos($str," ");
						$str1 = substr($str,0,$pos);
						$str2 = substr($str,$pos); ?>
					<div class="c-contact">
						<span class="c-icon"><i class="fa fa-globe purple-col"></i></span>
						<p><?php _e('Address','aletheme'); ?>:
							<span><strong><?php echo esc_attr($str1); ?></strong><?php echo esc_attr($str2); ?></span>
						</p>
					</div>
					<?php } ?>

					<?php if(ale_get_option('con_email') != '') { ?>
					<div class="c-contact">
						<span class="c-icon"><i class="fa fa-envelope-o purple-col"></i></span>
						<p><?php _e('E-mail','aletheme'); ?>:
							<span><?php echo esc_attr(ale_get_option('con_email')); ?></span>
						</p>
					</div>
					<?php } ?>
                

				</div>
			</div>

			<div class="c-map">
				<div id="map_canvas">
					<?php echo do_shortcode('[ale_map address="'.esc_attr(ale_get_option('con_adr')).'" width="100%" height="305px"]'); ?>
				</div>
			</div>
		</div>
	</section>
	<?php endwhile; endif;
get_footer(); ?>