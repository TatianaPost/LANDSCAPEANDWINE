<div class="color-selector">
    <div class="show-colors green-bg"></div>
    <div class="colors-content">
        <h2><?php _e('Style selector', 'aletheme'); ?></h2>
        <hr>

        <h3><?php _e('Choose background pattern', 'aletheme'); ?>:</h3>
        <div class="background-choose clearfix">
            <div class="backgrounds">
                <div class="background background1" data-background="<?php echo get_template_directory_uri(); ?>/css/images/colorpicker/background/1.png"></div>
            </div>

            <div class="backgrounds">
                <div class="background background2" data-background="<?php echo get_template_directory_uri(); ?>/css/images/colorpicker/background/2.png"></div>
            </div>

            <div class="backgrounds">
                <div class="background background3" data-background="<?php echo get_template_directory_uri(); ?>/css/images/colorpicker/background/3.png"></div>
            </div>

            <div class="backgrounds">
                <div class="background background4" data-background="<?php echo get_template_directory_uri(); ?>/css/images/colorpicker/background/4.png"></div>
            </div>

            <div class="backgrounds">
                <div class="background background5" data-background="<?php echo get_template_directory_uri(); ?>/css/images/colorpicker/background/5.png"></div>
            </div>

            <div class="backgrounds">
                <div class="background background6" data-background="<?php echo get_template_directory_uri(); ?>/css/images/colorpicker/background/6.png"></div>
            </div>

            <div class="backgrounds">
                <div class="background background7" data-background="<?php echo get_template_directory_uri(); ?>/css/images/colorpicker/background/7.png"></div>
            </div>

            <div class="backgrounds">
                <div class="background background8" data-background="<?php echo get_template_directory_uri(); ?>/css/images/colorpicker/background/8.png"></div>
            </div>
        </div>
        <hr>

        <h3><?php _e('Choose color sheme', 'aletheme'); ?>:</h3>
    </div>

    <div class="colors-choose clearfix">
        <div class="colors">
            <div class="color color1"><?php _e('Main color', 'aletheme'); ?></div>
            <div class="colorSelector" id="colorpickerHolder1"></div>
        </div>

        <div class="colors">
            <div class="color color2"><?php _e('Secondary color', 'aletheme'); ?></div>
            <div class="colorSelector" id="colorpickerHolder2"></div>
        </div>

        <div class="colors">
            <div class="color color3"><?php _e('Tertiary color', 'aletheme'); ?></div>
            <div class="colorSelector" id="colorpickerHolder3"></div>
        </div>
    </div>
</div>