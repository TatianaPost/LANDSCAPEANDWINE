    <!-- Footer -->
    <!-- NDH BACKGROUND FOOTER -->
    <div class="bottom background-img">
    </div>
	<!-- NDH BACKGROUND FOOTER -->
    <div class="bottom green-bg">
        <div class="container">
            <div class="bottom-nav">
                <?php
                if ( has_nav_menu( 'footer_menu' ) ) {
                    wp_nav_menu(array(
                        'theme_location'=> 'footer_menu',
                        'menu'			=> 'Footer Menu',
                        'menu_class'	=> 'cf',
                        'depth'         => 1,
                        'walker'		=> new Aletheme_Nav_Walker(),
                        'container'		=> '',
                    ));
                } ?>
            </div>
            <!-- Social -->
            <div class="social">
                <?php if(ale_get_option('gog')){ echo '<a href="'.esc_url(ale_get_option('gog')).'" class="gp" rel="external"><i class="fa fa-google-plus"></i></a>'; } ?>
                <?php if(ale_get_option('twi')){ echo '<a href="'.esc_url(ale_get_option('twi')).'" class="tw" rel="external"><i class="fa fa-twitter"></i></a>'; } ?>
                <?php if(ale_get_option('fb')){ echo '<a href="'.esc_url(ale_get_option('fb')).'" class="fb" rel="external"><i class="fa fa-facebook"></i></a>'; } ?>
                <?php if(ale_get_option('pint')){ echo '<a href="'.esc_url(ale_get_option('pint')).'" class="ps" rel="external"><i class="fa fa-pinterest"></i></a>'; } ?>
            </div>
        </div>
    </div>
    
    <footer>
        <div class="container">
            <div class="column-f">
                <?php if(ale_get_option('site-footer-logo')){ ?>
                    <a href="<?php echo home_url(); ?>/"><img src="<?php echo esc_url(ale_get_option('site-footer-logo')); ?>" alt="" /></a>
                <?php } else { ?>
                    <a href="<?php echo home_url(); ?>/" class="footer-logo"><?php echo bloginfo('name'); ?></a>
                <?php } ?>
                <br /><br />
                <p><?php echo esc_attr(ale_get_option('site-footer-desc')); ?></p>
                <!-- Copy -->
                <?php if (ale_get_option('copyrights')) : ?>
                    <p>&copy; <?php echo esc_attr(ale_get_option('copyrights')); ?></p>
                <?php else: ?>
                    <p>&copy; <?php the_date('Y');?> <?php _e('All rights reserved', 'aletheme'); ?></p>
                <?php endif; ?>
            </div>
            <div class="column-s">
               <div class="c-form-w left">
					<h3><?php _e('Contact form','aletheme'); ?></h3>
					<form method="post" action="<?php the_permalink();?>">
						<?php if (isset($_GET['success'])) : ?>
							<p class="success"><?php _e('Thank you for your message!', 'aletheme')?></p>
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
				</div>
            </div>
            <?php /*?>
            <div class="column-t">
                <?php if ( has_nav_menu( 'footer_right_menu' ) ) { ?>
                    <h3><?php _e('Users information','aletheme'); ?></h3>
                <?php wp_nav_menu(array(
                        'theme_location'=> 'footer_right_menu',
                        'menu'			=> 'Footer Right Menu',
                        'menu_class'	=> '',
                        'walker'		=> new Aletheme_Nav_Walker(),
                        'container'		=> '',
                        'depth'         => 1,
                    ));
                } ?>
            </div>
            <?php */?>
            
            <div class="column-l">
                <h3><?php _e('Contacto','aletheme'); ?></h3>
                <ul>
                    <?php if(ale_get_option('con_adr') != '') { ?>
                        <li><i class="fa fa-globe"></i><?php echo esc_attr(ale_get_option('con_adr')); ?></li>
                    <?php } ?>
                    <?php if(ale_get_option('con_phone') != '') { ?>
                        <li><i class="fa fa-phone"></i><strong><?php echo esc_attr(ale_get_option('con_phone')); ?></strong></li>
                    <?php } ?>
                    <?php if(ale_get_option('con_email') != '') { ?>
                        <li><i class="fa fa-envelope-o"></i><?php echo esc_attr(ale_get_option('con_email')); ?></li>
                    <?php } ?>
                </ul>
            </div>
			
        </div>
    </footer>
    <!-- Scripts -->
    <?php wp_footer(); ?>
</div>
</body>
</html>