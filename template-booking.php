<?php
/**
 * Template Name: Template Booking
 */
get_header();
    if (have_posts()) : while (have_posts()) : the_post(); ?>

        <section class="content">
            <div class="container">
                <div class="tcw-wrap">
                    <div class="content-title"><?php _e('Booking','aletheme'); ?></div>
                    <div class="breadcrumb">
                        <a href="<?php echo home_url(); ?>"><?php _e('Homepage','aletheme'); ?></a><span>&#8594;</span><span><?php _e('Booking','aletheme'); ?></span>
                    </div>
                </div>
                <div class="fbw">
                    <form class="booking-form" method="post" action="<?php the_permalink();?>">
                        <div class="form-body">
                            <?php if(isset($_REQUEST['bk_booking'])) { ?>
                                <p class="booking-succes"><?php _e('Your message has been sent successfully!','aletheme'); ?></p>
                            <?php } ?>
                            <input type="email" name="bk_email" placeholder="<?php _e('E-mail','aletheme'); ?> *" required="required" value="<?php echo isset($_POST['bk_email']) ? $_POST['bk_email'] : ''?>">
                            <input type="text" name="bk_first_name" placeholder="<?php _e('First name','aletheme'); ?> *" required="required" value="<?php echo isset($_POST['bk_first_name']) ? $_POST['bk_first_name'] : ''?>">
                            <input type="text" name="bk_sure_name" placeholder="<?php _e('Sure name','aletheme'); ?> *" required="required" value="<?php echo isset($_POST['bk_sure_name']) ? $_POST['bk_sure_name'] : ''?>">
                            <input type="text" name="bk_country" placeholder="<?php _e('Country','aletheme'); ?> *" required="required" value="<?php echo isset($_POST['bk_country']) ? $_POST['bk_country'] : ''?>">
                            <input type="text" name="bk_address" placeholder="<?php _e('Address','aletheme'); ?> *" required="required" value="<?php echo isset($_POST['bk_address']) ? $_POST['bk_address'] : ''?>">
                            <input type="text" name="bk_phone" placeholder="<?php _e('Phone number','aletheme'); ?> *" required="required" value="<?php echo isset($_POST['bk_phone']) ? $_POST['bk_phone'] : ''?>">
                            <input type="text" name="bk_date" placeholder="<?php _e('Arriving date','aletheme'); ?> *" required="required" value="<?php echo isset($_POST['bk_date']) ? $_POST['bk_date'] : ''?>">
                            <input type="text" name="bk_adults" placeholder="<?php _e('Adults 1','aletheme'); ?> *" required="required" value="<?php echo isset($_POST['bk_adults']) ? $_POST['bk_adults'] : ''?>">
                            <textarea name="bk_message" placeholder="<?php _e('Message','aletheme'); ?> *" rows="5" required="required"><?php echo isset($_POST['bk_message']) ? $_POST['bk_message'] : ''?></textarea>
                        </div>
                        <div class="form-footer">
                            <div class="form-l">
                                <input type="checkbox" name="bk_accept" id="accept" value="accept" required="required">
                                <label for="accept"><?php _e('Accept the Terms of Conditions','aletheme'); ?> *</label>
                            </div>
                            <div class="form-r">
                                <button class="btn btn-reset" type="reset"><?php _e('Reset','aletheme'); ?></button>
                                <button class="btn btn-book" type="submit" name="bk_booking"><?php _e('Book now','aletheme'); ?></button>
                            </div>
                        </div>
                        <?php wp_nonce_field() ?>
                    </form>
                </div>
            </div>
        </section>

    <?php endwhile; endif;
get_footer(); ?>