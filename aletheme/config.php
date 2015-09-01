<?php
/**
 * Get current theme options
 * 
 * @return array
 */
function aletheme_get_options() {
	$comments_style = array(
		'wp'  => 'Alethemes Comments',
		'fb'  => 'Facebook Comments',
		'dq'  => 'DISQUS',
		'lf'  => 'Livefyre',
		'off' => 'Disable All Comments',
	);

	$analytics = array(
		'classic'  => 'Classic Analytics',
		'universal'  => 'Universal Analytics',
	);

	$headerfont = array_merge(ale_get_safe_webfonts(), ale_get_google_webfonts());

	$background_defaults = array(
		'color' => '',
		'image' => '',
		'repeat' => 'repeat',
		'position' => 'top center',
		'attachment'=>'scroll'
	);

	
	$imagepath =  ALETHEME_URL . '/assets/images/';
	
	$options = array();
		
	$options[] = array("name" => "Theme",
						"type" => "heading");

	$options[] = array( "name" => "Site Logo",
						"desc" => "Upload or put the site logo link (Default logo size: 204-52px)",
						"id" => "ale_sitelogo",
						"std" => "",
						"type" => "upload");

	$options[] = array( "name" => "Site Footer Logo",
						"desc" => "Upload or put the site footer logo link (Default logo size: 149-65px)",
						"id" => "ale_site-footer-logo",
						"std" => "",
						"type" => "upload");

	$options[] = array( "name" => "Site Footer Description",
						"desc" => "Please enter a short description of the site.",
						"id"   => "ale_site-footer-desc",
						"std"  => "",
						"type" => "textarea");

	$options[] = array( 'name' => "Manage Background",
						'desc' => "Select the background color, or upload a custom background image. Default background is the #f5f5f5 color",
						'id' => 'ale_background',
						'std' => $background_defaults,
						'type' => 'background');

    $options[] = array( 'name' => 'Show color selector?',
                        'desc' => 'Select the Enable to show color selector',
                        'id'   => 'ale_display_color_selector',
                        'std'  => 'Enable',
                        'type'    => 'select',
                        'options' => array(
                            'Enable' => 'Enable',
                            'Disable' => 'Disable',
                        ), );
	
	$options[] = array( 'name' => "Manage Main Color",
						'desc' => "Select the color. Default background is the #60ad4c color",
						'id' => 'ale_maincolor',
						'std' => '#60ad4c',
						'type' => 'color');
	
	$options[] = array( 'name' => "Manage Secondary Color",
						'desc' => "Select the color. Default background is the #604283 color",
						'id' => 'ale_secondarycolor',
						'std' => '#604283',
						'type' => 'color');
	
	$options[] = array( 'name' => "Manage Tertiary Color",
						'desc' => "Select the color. Default background is the #ffde1b color",
						'id' => 'ale_tertiarycolor',
						'std' => '#ffde1b',
						'type' => 'color');

	$options[] = array( "name" => "Background Size Cover",
						"desc" => "Check if you want to select cover background size",
						"id" => "ale_backcover",
						"std" => "1",
						"type" => "checkbox");

	$options[] = array( "name" => "Uplaod a favicon icon",
						"desc" => "Upload or put the link of your favicon icon",
						"id" => "ale_favicon",
						"std" => "",
						"type" => "upload");

	$options[] = array( "name" => "Comments Style",
						"desc" => "Choose your comments style. If you want to use DISQUS comments please install and activate this plugin from <a href=\"" . admin_url('plugin-install.php?tab=search&type=term&s=Disqus+Comment+System&plugin-search-input=Search+Plugins') . "\">Wordpress Repository</a>.  If you want to use Livefyre Realtime Comments comments please install and activate this plugin from <a href=\"" . admin_url('plugin-install.php?tab=search&type=term&s=Livefyre+Realtime+Comments&plugin-search-input=Search+Plugins') . "\">Wordpress Repository</a>.",
						"id" => "ale_comments_style",
						"std" => "wp",
						"type" => "select",
						"options" => $comments_style);

	$options[] = array( "name" => "AJAX Comments",
						"desc" => "Use AJAX on comments posting (works only with Alethemes Comments selected).",
						"id" => "ale_ajax_comments",
						"std" => "1",
						"type" => "checkbox");

	$options[] = array( "name" => "Social Sharing",
						"desc" => "Enable social sharing for posts.",
						"id" => "ale_social_sharing",
						"std" => "1",
						"type" => "checkbox");

	$options[] = array( "name" => "Copyrights",
						"desc" => "Your copyright message.",
						"id" => "ale_copyrights",
						"std" => "",
						"type" => "text");

	$options[] = array( "name" => "Typography",
						"type" => "heading");

	$options[] = array( "name" => "Select the body Font from Google Library",
						"desc" => "The default Font is - Arial",
						"id" => "ale_headerfont",
						"std" => "Arial",
						"type" => "select",
						"options" => $headerfont);

	$options[] = array( "name" => "Select the Headers Font (Extended) from Google Library",
						"desc" => "The default Font (extended) is - ",
						"id" => "ale_headerfontex",
						"std" => "",
						"type" => "text",
						);

	$options[] = array( "name" => "Select the Headers Font from Google Library",
						"desc" => "The default Font is - Open Sans",
						"id" => "ale_mainfont",
						"std" => "Open+Sans",
						"type" => "select",
						"options" => $headerfont);

	$options[] = array( "name" => "Select the Headers Font (Extended) from Google Library",
						"desc" => "The default Font (extended) is - 400,600,700,800&amp;subset=cyrillic-ext,latin",
						"id" => "ale_mainfontex",
						"std" => "400,600,700,800&amp;subset=cyrillic-ext,latin",
						"type" => "text",
						);

	$options[] = array( "name" => "Select the Third Font from Google Library",
						"desc" => "The default Font is - Open Sans Condensed",
						"id" => "ale_thirdfont",
						"std" => "Open+Sans+Condensed",
						"type" => "select",
						"options" => $headerfont);

	$options[] = array( "name" => "Select the Third Font (Extended) from Google Library",
						"desc" => "The default Font (extended) is - 300,700",
						"id" => "ale_thirdfontex",
						"std" => "300,700",
						"type" => "text",
						);

	$options[] = array( "name" => "Select the Fourth Font from Google Library",
						"desc" => "The default Font is - PT Serif",
						"id" => "ale_fourthfont",
						"std" => "PT+Serif",
						"type" => "select",
						"options" => $headerfont);

	$options[] = array( "name" => "Select the Fourth Font (Extended) from Google Library",
						"desc" => "The default Font (extended) is - 400,700,400italic,700italic",
						"id" => "ale_fourthfontex",
						"std" => "400,700,400italic,700italic",
						"type" => "text",
						);

	$options[] = array( 'name' => "H1 Style",
						'desc' => "Change the h1 style",
						'id' => 'ale_h1sty',
						'std' => array('size' => '22px','face' => 'Arial','style' => 'normal','color' => '#111111'),
						'type' => 'typography');

	$options[] = array( 'name' => "H2 Style",
						'desc' => "Change the h2 style",
						'id' => 'ale_h2sty',
						'std' => array('size' => '20px','face' => 'Arial','style' => 'normal','color' => '#111111'),
						'type' => 'typography');

	$options[] = array( 'name' => "H3 Style",
						'desc' => "Change the h3 style",
						'id' => 'ale_h3sty',
						'std' => array('size' => '18px','face' => 'Arial','style' => 'normal','color' => '#111111'),
						'type' => 'typography');

	$options[] = array( 'name' => "H4 Style",
						'desc' => "Change the h4 style",
						'id' => 'ale_h4sty',
						'std' => array('size' => '16px','face' => 'Arial','style' => 'normal','color' => '#111111'),
						'type' => 'typography');

	$options[] = array( 'name' => "H5 Style",
						'desc' => "Change the h5 style",
						'id' => 'ale_h5sty',
						'std' => array('size' => '14px','face' => 'Arial','style' => 'normal','color' => '#111111'),
						'type' => 'typography');

	$options[] = array( 'name' => "H6 Style",
						'desc' => "Change the h6 style",
						'id' => 'ale_h6sty',
						'std' => array('size' => '12px','face' => 'Arial','style' => 'normal','color' => '#111111'),
						'type' => 'typography');

	$options[] = array( 'name' => "Body Style",
						'desc' => "Change the body font style",
						'id' => 'ale_bodystyle',
						'std' => array('size' => '12px','face' => 'Arial','style' => 'normal','color' => '#111111'),
						'type' => 'typography');

	$options[] = array( "name" => "Social",
						"type" => "heading");

	$options[] = array( "name" => "Twitter",
						"desc" => "Your twitter profile URL.",
						"id" => "ale_twi",
						"std" => "",
						"type" => "text");
	$options[] = array( "name" => "Facebook",
						"desc" => "Your facebook profile URL.",
						"id" => "ale_fb",
						"std" => "",
						"type" => "text");
	$options[] = array( "name" => "Google+",
						"desc" => "Your google+ profile URL.",
						"id" => "ale_gog",
						"std" => "",
						"type" => "text");
	$options[] = array( "name" => "Pinterest",
						"desc" => "Your pinteres profile URL.",
						"id" => "ale_pint",
						"std" => "",
						"type" => "text");
	$options[] = array( "name" => "Twitter",
						"desc" => "Insert the login name",
						"id" => "ale_twiname",
						"std" => "",
						"type" => "text");
	$options[] = array( "name" => "Email",
						"desc" => "Your email",
						"id" => "ale_emailcont",
						"std" => "",
						"type" => "text");
	$options[] = array( "name" => "Show RSS",
						"desc" => "Check if you want to show the RSS icon on your site",
						"id" => "ale_rssicon",
						"std" => "1",
						"type" => "checkbox");

	
	$options[] = array( "name" => "Facebook Application ID",
						"desc" => "If you have Application ID you can connect the blog to your Facebook Profile and monitor statistics there.",
						"id" => "ale_fb_id",
						"std" => "",
						"type" => "text");
	
	$options[] = array( "name" => "Enable Open Graph",
						"desc" => "The <a href=\"http://www.ogp.me/\">Open Graph</a> protocol enables any web page to become a rich object in a social graph.",
						"id" => "ale_og_enabled",
						"std" => "",
						"type" => "checkbox");


	
	$options[] = array( "name" => "Advanced Settings",
						"type" => "heading");

	$options[] = array( "name" => "Google Analytics Type",
						"desc" => "Select the google analytics code type. Universal or Classic (The difference between versions you will find in google)",
						"id" => "ale_analyticstype",
						"std" => "classic",
						"type" => "select",
						"options" => $analytics);
	
	$options[] = array( "name" => "Google Analytics",
						"desc" => "Please insert your Google Analytics code here. Example: <strong>UA-22231623-1</strong>",
						"id" => "ale_ga",
						"std" => "",
						"type" => "text");
	
	$options[] = array( "name" => "Footer Code",
						"desc" => "If you have anything else to add in the footer - please add it here.",
						"id" => "ale_footer_info",
						"std" => "",
						"type" => "textarea");

	$options[] = array( "name" => "Custom CSS Styles",
						"desc" => "You can add here your styles. ex. .boxclass { padding:10px; }",
						"id" => "ale_customcsscode",
						"std" => "",
						"type" => "textarea");

	$options[] = array( "name" => "Enable Preloader",
						"desc" => "Check this option to enable the animated pre loader",
						"id" => "ale_preloader",
						"std" => "",
						"type" => "checkbox");

	$options[] = array( "name" => "Contact Options",
						"type" => "heading");

	$options[] = array( "name" => "Contact phone number",
						"desc" => "Insert please phone number",
						"id" => "ale_con_phone",
						"std" => "800234-67-89",
						"type" => "text");

	$options[] = array( "name" => "Contact email",
						"desc" => "Insert please email",
						"id" => "ale_con_email",
						"std" => "info@website.com",
						"type" => "text");

	$options[] = array( "name" => "Contact address",
						"desc" => "Insert please address",
						"id" => "ale_con_adr",
						"std" => "Spain, Madrid, 4753 Fourth St",
						"type" => "text");

	$options[] = array( "name" => "Twitter widget settings",
						"type" => "heading");

	$options[] = array( 'name' => 'Twitter Login',
						'desc' => 'Insert the login',
						'id'   => 'ale_tweetlogin',
						'std'  => '',
						'type' => 'text');

	$options[] = array( 'name' => 'Consumer Key',
						'desc' => 'Insert the consumer key. Get here(sign with your account) - https://dev.twitter.com/apps/',
						'id'   => 'ale_consumerkey',
						'std'  => '',
						'type' => 'text');

	$options[] = array( 'name' => 'Consumer Secret',
						'desc' => 'Insert the consumer secret. Get here(sign with your account) - https://dev.twitter.com/apps/',
						'id'   => 'ale_consumersecret',
						'std'  => '',
						'type' => 'text');

	$options[] = array( 'name' => 'Access Token',
						'desc' => 'Insert the access token. Get here(sign with your account) - https://dev.twitter.com/apps/',
						'id'   => 'ale_accesstoken',
						'std'  => '',
						'type' => 'text');

	$options[] = array( 'name' => 'Access Token Secret',
						'desc' => 'Insert the access token secret. Get here(sign with your account) - https://dev.twitter.com/apps/',
						'id'   => 'ale_accesstokensecret',
						'std'  => '',
						'type' => 'text');

	$options[] = array( 'name' => 'Cache time',
						'desc' => 'Insert the number (in hours)',
						'id'   => 'ale_cachetime',
						'std'  => '3',
						'type' => 'text');

	$options[] = array( 'name' => 'Tweets count',
						'desc' => 'Insert the count',
						'id'   => 'ale_tweetstoshow',
						'std'  => '1',
						'type' => 'text');

	$options[] = array( "name" => "Currency",
						"type" => "heading");

	$options[] = array( 'name' => 'Currency',
						'desc' => 'Insert the currency',
						'id'   => 'ale_currency',
						'std'  => '$',
						'type' => 'text');

	$options[] = array( "name" => "Archives",
						"type" => "heading");

	$options[] = array( "name" => "Team",
						"type" => "title");

	$options[] = array( 'name' => 'Background image',
						'desc' => 'Upload an image. Size:1920x604px',
						'id'   => 'ale_team_bg_image',
						'std'  => '',
						'type' => 'upload');

	$options[] = array( 'name' => 'Title',
						'desc' => 'Insert the title',
						'id'   => 'ale_team_title',
						'std'  => 'Our team',
						'type' => 'text');

	$options[] = array( 'name' => 'Number of posts',
						'desc' => 'Insert the number of posts',
						'id'   => 'ale_team_number',
						'std'  => '6',
						'type' => 'text');

	$options[] = array( "name" => "Gallery",
						"type" => "title");

	$options[] = array( 'name' => 'Number of posts',
						'desc' => 'Insert the number of posts',
						'id'   => 'ale_gallery_number',
						'std'  => '15',
						'type' => 'text');

	$options[] = array( "name" => "Hot Deals",
						"type" => "title");

	$options[] = array( 'name' => 'Number of posts',
						'desc' => 'Insert the number of posts',
						'id'   => 'ale_hot_deals_number',
						'std'  => '15',
						'type' => 'text');

	$options[] = array( "name" => "Tour",
						"type" => "title");

	$options[] = array( 'name' => 'Number of posts',
						'desc' => 'Insert the number of posts',
						'id'   => 'ale_tour_number',
						'std'  => '3',
						'type' => 'text');

	return $options;
}

/**
 * Add custom scripts to Options Page
 */
function aletheme_options_custom_scripts() {
 ?>

<script type="text/javascript">
jQuery(document).ready(function() {
	jQuery('#ale_commentongallery').click(function() {
		jQuery('#section-ale_gallerycomments_style').fadeToggle(400);
	});
	if (jQuery('#ale_commentongallery:checked').val() !== undefined) {
		jQuery('#section-ale_gallerycomments_style').show();
	}
});
</script>

<?php
}

/**
 * Add Metaboxes
 * @param array $meta_boxes
 * @return array 
 */
function aletheme_metaboxes($meta_boxes) {
	
	$meta_boxes = array();

	$prefix = "ale_";

	$font_awesome = array(
		array('name'=>'smile-o','value'=>'smile-o'),
		array('name'=>'adjust','value'=>'adjust'),
		array('name'=>'adn','value'=>'adn'),
		array('name'=>'align-center','value'=>'align-center'),
		array('name'=>'align-justify','value'=>'align-justify'),
		array('name'=>'align-left','value'=>'align-left'),
		array('name'=>'align-right','value'=>'align-right'),
		array('name'=>'ambulance','value'=>'ambulance'),
		array('name'=>'anchor','value'=>'anchor'),
		array('name'=>'android','value'=>'android'),
		array('name'=>'angellist','value'=>'angellist'),
		array('name'=>'angle-double-down','value'=>'angle-double-down'),
		array('name'=>'angle-double-left','value'=>'angle-double-left'),
		array('name'=>'angle-double-right','value'=>'angle-double-right'),
		array('name'=>'angle-double-up','value'=>'angle-double-up'),
		array('name'=>'angle-down','value'=>'angle-down'),
		array('name'=>'angle-left','value'=>'angle-left'),
		array('name'=>'angle-right','value'=>'angle-right'),
		array('name'=>'angle-up','value'=>'angle-up'),
		array('name'=>'apple','value'=>'apple'),
		array('name'=>'archive','value'=>'archive'),
		array('name'=>'area-chart','value'=>'area-chart'),
		array('name'=>'arrow-circle-down','value'=>'arrow-circle-down'),
		array('name'=>'arrow-circle-left','value'=>'arrow-circle-left'),
		array('name'=>'arrow-circle-o-down','value'=>'arrow-circle-o-down'),
		array('name'=>'arrow-circle-o-left','value'=>'arrow-circle-o-left'),
		array('name'=>'arrow-circle-o-right','value'=>'arrow-circle-o-right'),
		array('name'=>'arrow-circle-o-up','value'=>'arrow-circle-o-up'),
		array('name'=>'arrow-circle-right','value'=>'arrow-circle-right'),
		array('name'=>'arrow-circle-up','value'=>'arrow-circle-up'),
		array('name'=>'arrow-down','value'=>'arrow-down'),
		array('name'=>'arrow-left','value'=>'arrow-left'),
		array('name'=>'arrow-right','value'=>'arrow-right'),
		array('name'=>'arrow-up','value'=>'arrow-up'),
		array('name'=>'arrows','value'=>'arrows'),
		array('name'=>'arrows-alt','value'=>'arrows-alt'),
		array('name'=>'arrows-h','value'=>'arrows-h'),
		array('name'=>'arrows-v','value'=>'arrows-v'),
		array('name'=>'asterisk','value'=>'asterisk'),
		array('name'=>'at','value'=>'at'),
		array('name'=>'automobile','value'=>'automobile'),
		array('name'=>'backward','value'=>'backward'),
		array('name'=>'ban','value'=>'ban'),
		array('name'=>'bank','value'=>'bank'),
		array('name'=>'bar-chart','value'=>'bar-chart'),
		array('name'=>'bar-chart-o','value'=>'bar-chart-o'),
		array('name'=>'barcode','value'=>'barcode'),
		array('name'=>'bars','value'=>'bars'),
		array('name'=>'bed','bed'),
		array('name'=>'beer','value'=>'beer'),
		array('name'=>'behance','value'=>'behance'),
		array('name'=>'behance-square','value'=>'behance-square'),
		array('name'=>'bell','value'=>'bell'),
		array('name'=>'bell-o','value'=>'bell-o'),
		array('name'=>'bell-slash','value'=>'bell-slash'),
		array('name'=>'bell-slash-o','value'=>'bell-slash-o'),
		array('name'=>'bicycle','value'=>'bicycle'),
		array('name'=>'binoculars','value'=>'binoculars'),
		array('name'=>'birthday-cake','value'=>'birthday-cake'),
		array('name'=>'bitbucket','value'=>'bitbucket'),
		array('name'=>'bitbucket-square','value'=>'bitbucket-square'),
		array('name'=>'bitcoin','value'=>'bitcoin'),
		array('name'=>'bold','value'=>'bold'),
		array('name'=>'bolt','value'=>'bolt'),
		array('name'=>'bomb','value'=>'bomb'),
		array('name'=>'book','value'=>'book'),
		array('name'=>'bookmark','value'=>'bookmark'),
		array('name'=>'bookmark-o','value'=>'bookmark-o'),
		array('name'=>'briefcase','value'=>'briefcase'),
		array('name'=>'btc','value'=>'btc'),
		array('name'=>'bug','value'=>'bug'),
		array('name'=>'building','value'=>'building'),
		array('name'=>'building-o','value'=>'building-o'),
		array('name'=>'bullhorn','value'=>'bullhorn'),
		array('name'=>'bullseye','value'=>'bullseye'),
		array('name'=>'bus','value'=>'bus'),
		array('name'=>'buysellads','value'=>'buysellads'),
		array('name'=>'cab','value'=>'cab'),
		array('name'=>'calculator','value'=>'calculator'),
		array('name'=>'calendar','value'=>'calendar'),
		array('name'=>'calendar-o','value'=>'calendar-o'),
		array('name'=>'camera','value'=>'camera'),
		array('name'=>'camera-retro','value'=>'camera-retro'),
		array('name'=>'car','value'=>'car'),
		array('name'=>'caret-down','value'=>'caret-down'),
		array('name'=>'caret-left','value'=>'caret-left'),
		array('name'=>'caret-right','value'=>'caret-right'),
		array('name'=>'caret-square-o-down','value'=>'caret-square-o-down'),
		array('name'=>'caret-square-o-left','value'=>'caret-square-o-left'),
		array('name'=>'caret-square-o-right','value'=>'caret-square-o-right'),
		array('name'=>'caret-square-o-up','value'=>'caret-square-o-up'),
		array('name'=>'caret-up','value'=>'caret-up'),
		array('name'=>'cart-arrow-down','value'=>'cart-arrow-down'),
		array('name'=>'cart-plus','value'=>'cart-plus'),
		array('name'=>'cc','value'=>'cc'),
		array('name'=>'cc-amex','value'=>'cc-amex'),
		array('name'=>'cc-discover','value'=>'cc-discover'),
		array('name'=>'cc-mastercard','value'=>'cc-mastercard'),
		array('name'=>'cc-paypal','value'=>'cc-paypal'),
		array('name'=>'cc-stripe','value'=>'cc-stripe'),
		array('name'=>'cc-visa','value'=>'cc-visa'),
		array('name'=>'certificate','value'=>'certificate'),
		array('name'=>'chain','value'=>'chain'),
		array('name'=>'chain-broken','value'=>'chain-broken'),
		array('name'=>'check','value'=>'check'),
		array('name'=>'check-circle','value'=>'check-circle'),
		array('name'=>'check-circle-o','value'=>'check-circle-o'),
		array('name'=>'check-square','value'=>'check-square'),
		array('name'=>'check-square-o','value'=>'check-square-o'),
		array('name'=>'chevron-circle-down','value'=>'chevron-circle-down'),
		array('name'=>'chevron-circle-left','value'=>'chevron-circle-left'),
		array('name'=>'chevron-circle-right','value'=>'chevron-circle-right'),
		array('name'=>'chevron-circle-up','value'=>'chevron-circle-up'),
		array('name'=>'chevron-down','value'=>'chevron-down'),
		array('name'=>'chevron-left','value'=>'chevron-left'),
		array('name'=>'chevron-right','value'=>'chevron-right'),
		array('name'=>'chevron-up','value'=>'chevron-up'),
		array('name'=>'child','value'=>'child'),
		array('name'=>'circle','value'=>'circle'),
		array('name'=>'circle-o','value'=>'circle-o'),
		array('name'=>'circle-o-notch','value'=>'circle-o-notch'),
		array('name'=>'circle-thin','value'=>'circle-thin'),
		array('name'=>'clipboard','value'=>'clipboard'),
		array('name'=>'clock-o','value'=>'clock-o'),
		array('name'=>'close','value'=>'chcloseeck'),
		array('name'=>'cloud','value'=>'cloud'),
		array('name'=>'cloud-download','value'=>'cloud-download'),
		array('name'=>'cloud-upload','value'=>'cloud-upload'),
		array('name'=>'cny','value'=>'cny'),
		array('name'=>'code','value'=>'code'),
		array('name'=>'code-fork','value'=>'code-fork'),
		array('name'=>'codepen','value'=>'codepen'),
		array('name'=>'coffee','value'=>'coffee'),
		array('name'=>'cog','value'=>'cog'),
		array('name'=>'cogs','value'=>'cogs'),
		array('name'=>'columns','value'=>'columns'),
		array('name'=>'comment','value'=>'comment'),
		array('name'=>'comment-o','value'=>'comment-o'),
		array('name'=>'comments','value'=>'comments'),
		array('name'=>'comments-o','value'=>'comments-o'),
		array('name'=>'compass','value'=>'compass'),
		array('name'=>'compress','value'=>'compress'),
		array('name'=>'connectdevelop','value'=>'connectdevelop'),
		array('name'=>'copy','value'=>'copy'),
		array('name'=>'copyright','value'=>'copyright'),
		array('name'=>'credit-card','value'=>'credit-card'),
		array('name'=>'crop','value'=>'crop'),
		array('name'=>'crosshairs','value'=>'crosshairs'),
		array('name'=>'css3','value'=>'css3'),
		array('name'=>'cube','value'=>'cube'),
		array('name'=>'cubes','value'=>'cubes'),
		array('name'=>'cut','value'=>'cut'),
		array('name'=>'cutlery','value'=>'cutlery'),
		array('name'=>'dashboard','value'=>'dashboard'),
		array('name'=>'dashcube','value'=>'dashcube'),
		array('name'=>'database','value'=>'database'),
		array('name'=>'dedent','value'=>'dedent'),
		array('name'=>'delicious','value'=>'delicious'),
		array('name'=>'desktop','value'=>'desktop'),
		array('name'=>'deviantart','value'=>'deviantart'),
		array('name'=>'diamond','value'=>''),
		array('name'=>'digg','value'=>'digg'),
		array('name'=>'dollar','value'=>'dollar'),
		array('name'=>'dot-circle-o','value'=>'dot-circle-o'),
		array('name'=>'download','value'=>'download'),
		array('name'=>'dribbble','value'=>'dribbble'),
		array('name'=>'dropbox','value'=>'dropbox'),
		array('name'=>'drupal','value'=>'drupal'),
		array('name'=>'edit','value'=>'edit'),
		array('name'=>'eject','value'=>'eject'),
		array('name'=>'ellipsis-h','value'=>'ellipsis-h'),
		array('name'=>'ellipsis-v','value'=>'ellipsis-v'),
		array('name'=>'empire','value'=>'empire'),
		array('name'=>'envelope','value'=>'envelope'),
		array('name'=>'envelope-o','value'=>'envelope-o'),
		array('name'=>'envelope-square','value'=>'envelope-square'),
		array('name'=>'eraser','value'=>'eraser'),
		array('name'=>'eur','value'=>'eur'),
		array('name'=>'euro','value'=>'euro'),
		array('name'=>'exchange','value'=>'exchange'),
		array('name'=>'exclamation','value'=>'exclamation'),
		array('name'=>'exclamation-circle','value'=>'exclamation-circle'),
		array('name'=>'exclamation-triangle','value'=>'exclamation-triangle'),
		array('name'=>'expand','value'=>'expand'),
		array('name'=>'external-link','value'=>'external-link'),
		array('name'=>'external-link-square','value'=>'external-link-square'),
		array('name'=>'eye','value'=>'eye'),
		array('name'=>'eye-slash','value'=>'eye-slash'),
		array('name'=>'eyedropper','value'=>'eyedropper'),
		array('name'=>'facebook','value'=>'facebook'),
		array('name'=>'facebook-f','value'=>'facebook-f'),
		array('name'=>'facebook-official','value'=>'facebook-official'),
		array('name'=>'facebook-square','value'=>'facebook-square'),
		array('name'=>'fast-backward','value'=>'fast-backward'),
		array('name'=>'fast-forward','value'=>'fast-forward'),
		array('name'=>'fax','value'=>'fax'),
		array('name'=>'female','value'=>'female'),
		array('name'=>'fighter-jet','value'=>'fighter-jet'),
		array('name'=>'file','value'=>'file'),
		array('name'=>'file-archive-o','value'=>'file-archive-o'),
		array('name'=>'file-audio-o','value'=>'file-audio-o'),
		array('name'=>'file-code-o','value'=>'file-code-o'),
		array('name'=>'file-excel-o','value'=>'file-excel-o'),
		array('name'=>'file-image-o','value'=>'file-image-o'),
		array('name'=>'file-movie-o','value'=>'file-movie-o'),
		array('name'=>'file-o','value'=>'file-o'),
		array('name'=>'file-pdf-o','value'=>'file-pdf-o'),
		array('name'=>'file-photo-o','value'=>'file-photo-o'),
		array('name'=>'file-picture-o','value'=>'file-picture-o'),
		array('name'=>'file-powerpoint-o','value'=>'file-powerpoint-o'),
		array('name'=>'file-sound-o','value'=>'file-sound-o'),
		array('name'=>'file-text','value'=>'ile-text'),
		array('name'=>'file-text-o','value'=>'file-text-o'),
		array('name'=>'file-video-o','value'=>'file-video-o'),
		array('name'=>'file-word-o','value'=>'file-word-o'),
		array('name'=>'file-zip-o','value'=>'file-zip-o'),
		array('name'=>'files-o','value'=>'files-o'),
		array('name'=>'film','value'=>'film'),
		array('name'=>'filter','value'=>'filter'),
		array('name'=>'fire','value'=>'fire'),
		array('name'=>'fire-extinguisher','value'=>'fire-extinguisher'),
		array('name'=>'flag','value'=>'flag'),
		array('name'=>'flag-checkered','value'=>'flag-checkered'),
		array('name'=>'flag-o','value'=>'flag-o'),
		array('name'=>'flash','value'=>'flash'),
		array('name'=>'flask','value'=>'flask'),
		array('name'=>'flickr','value'=>'flickr'),
		array('name'=>'floppy-o','value'=>'floppy-o'),
		array('name'=>'folder','value'=>'folder'),
		array('name'=>'folder-o','value'=>'folder-o'),
		array('name'=>'folder-open','value'=>'folder-open'),
		array('name'=>'folder-open-o','value'=>'folder-open-o'),
		array('name'=>'font','value'=>'font'),
		array('name'=>'forumbee','value'=>'forumbee'),
		array('name'=>'forward','value'=>'forward'),
		array('name'=>'foursquare','value'=>'foursquare'),
		array('name'=>'frown-o','value'=>'frown-o'),
		array('name'=>'futbol-o','value'=>'futbol-o'),
		array('name'=>'gamepad','value'=>'gamepad'),
		array('name'=>'gavel','value'=>'gavel'),
		array('name'=>'gbp','value'=>'gbp'),
		array('name'=>'ge','value'=>'ge'),
		array('name'=>'gear','value'=>'gear'),
		array('name'=>'gears','value'=>'gears'),
		array('name'=>'genderless','value'=>'genderless'),
		array('name'=>'gift','value'=>'gift'),
		array('name'=>'git','value'=>'git'),
		array('name'=>'git-square','value'=>'git-square'),
		array('name'=>'github','value'=>'github'),
		array('name'=>'github-alt','value'=>'github-alt'),
		array('name'=>'github-square','value'=>'github-square'),
		array('name'=>'gittip','value'=>'gittip'),
		array('name'=>'glass','value'=>'glass'),
		array('name'=>'globe','value'=>'globe'),
		array('name'=>'google','value'=>'google'),
		array('name'=>'google-plus','value'=>'google-plus'),
		array('name'=>'google-plus-square','value'=>'google-plus-square'),
		array('name'=>'google-wallet','value'=>'google-wallet'),
		array('name'=>'graduation-cap','value'=>'graduation-cap'),
		array('name'=>'gratipay','value'=>'gratipay'),
		array('name'=>'group','value'=>'group'),
		array('name'=>'h-square','value'=>'h-square'),
		array('name'=>'hacker-news','value'=>'hacker-news'),
		array('name'=>'hand-o-down','value'=>'hand-o-down'),
		array('name'=>'hand-o-left','value'=>'and-o-left'),
		array('name'=>'hand-o-right','value'=>'hand-o-right'),
		array('name'=>'hand-o-up','value'=>'hand-o-up'),
		array('name'=>'hdd-o','value'=>'hdd-o'),
		array('name'=>'header','value'=>'header'),
		array('name'=>'headphones','value'=>'headphones'),
		array('name'=>'heart','value'=>'heart'),
		array('name'=>'heart-o','value'=>'heart-o'),
		array('name'=>'heartbeat','value'=>'heartbeat'),
		array('name'=>'history','value'=>'history'),
		array('name'=>'home','value'=>'home'),
		array('name'=>'hospital-o','value'=>'hospital-o'),
		array('name'=>'hotel','value'=>'hotel'),
		array('name'=>'html5','value'=>'html5'),
		array('name'=>'ils','value'=>'ils'),
		array('name'=>'image','value'=>'image'),
		array('name'=>'inbox','value'=>'inbox'),
		array('name'=>'indent','value'=>'indent'),
		array('name'=>'info','value'=>'info'),
		array('name'=>'info-circle','value'=>'info-circle'),
		array('name'=>'inr','value'=>'inr'),
		array('name'=>'instagram','value'=>'instagram'),
		array('name'=>'institution','value'=>'institution'),
		array('name'=>'ioxhost','value'=>'ioxhost'),
		array('name'=>'italic','value'=>''),
		array('name'=>'joomla','value'=>'joomla'),
		array('name'=>'jpy','value'=>'jpy'),
		array('name'=>'jsfiddle','value'=>'jsfiddle'),
		array('name'=>'keyboard-o','value'=>'keyboard-o'),
		array('name'=>'krw','value'=>'krw'),
		array('name'=>'language','value'=>'language'),
		array('name'=>'laptop','value'=>'laptop'),
		array('name'=>'lastfm','value'=>'lastfm'),
		array('name'=>'lastfm-square','value'=>'astfm-square'),
		array('name'=>'leaf','value'=>'leaf'),
		array('name'=>'leanpub','value'=>'leanpub'),
		array('name'=>'legal','value'=>'legal'),
		array('name'=>'lemon-o','value'=>'lemon-o'),
		array('name'=>'level-down','value'=>'level-down'),
		array('name'=>'level-up','value'=>'level-up'),
		array('name'=>'life-bouy','value'=>'life-bouy'),
		array('name'=>'life-buoy','value'=>'life-buoy'),
		array('name'=>'life-ring','value'=>'life-ring'),
		array('name'=>'life-saver','value'=>'life-saver'),
		array('name'=>'lightbulb-o','value'=>'lightbulb-o'),
		array('name'=>'line-chart','value'=>'line-chart'),
		array('name'=>'link','value'=>'link'),
		array('name'=>'linkedin','value'=>'linkedin'),
		array('name'=>'linkedin-square','value'=>'linkedin-square'),
		array('name'=>'linux','value'=>'linux'),
		array('name'=>'list','value'=>'list'),
		array('name'=>'list-alt','value'=>'list-alt'),
		array('name'=>'list-ol','value'=>'list-ol'),
		array('name'=>'list-ul','value'=>'list-ul'),
		array('name'=>'location-arrow','value'=>'location-arrow'),
		array('name'=>'lock','value'=>'lock'),
		array('name'=>'long-arrow-down','value'=>'long-arrow-down'),
		array('name'=>'long-arrow-left','value'=>'long-arrow-left'),
		array('name'=>'long-arrow-right','value'=>'long-arrow-right'),
		array('name'=>'long-arrow-up','value'=>'long-arrow-up'),
		array('name'=>'magic','value'=>'magic'),
		array('name'=>'magnet','value'=>'magnet'),
		array('name'=>'mail-forward','value'=>'mail-forward'),
		array('name'=>'mail-reply','value'=>'mail-reply'),
		array('name'=>'mail-reply-all','value'=>'mail-reply-all'),
		array('name'=>'male','value'=>'male'),
		array('name'=>'map-marker','value'=>'map-marker'),
		array('name'=>'mars','value'=>'mars'),
		array('name'=>'mars-double','value'=>'mars-double'),
		array('name'=>'mars-stroke','value'=>'mars-stroke'),
		array('name'=>'mars-stroke-h','value'=>'mars-stroke-h'),
		array('name'=>'mars-stroke-v','value'=>'mars-stroke-v'),
		array('name'=>'maxcdn','value'=>'maxcdn'),
		array('name'=>'meanpath','value'=>'meanpath'),
		array('name'=>'medium','medium'),
		array('name'=>'medkit','value'=>'medkit'),
		array('name'=>'meh-o','value'=>'meh-o'),
		array('name'=>'mercury','value'=>'mercury'),
		array('name'=>'microphone','value'=>'microphone'),
		array('name'=>'microphone-slash','value'=>'microphone-slash'),
		array('name'=>'minus','value'=>'minus'),
		array('name'=>'minus-circle','value'=>'minus-circle'),
		array('name'=>'minus-square','value'=>'minus-square'),
		array('name'=>'minus-square-o','value'=>'minus-square-o'),
		array('name'=>'mobile','value'=>'mobile'),
		array('name'=>'mobile-phone','value'=>'mobile-phone'),
		array('name'=>'money','value'=>'money'),
		array('name'=>'moon-o','value'=>'moon-o'),
		array('name'=>'mortar-board','value'=>'mortar-board'),
		array('name'=>'motorcycle','value'=>'motorcycle'),
		array('name'=>'music','value'=>'music'),
		array('name'=>'name','value'=>'name'),
		array('name'=>'navicon','value'=>'navicon'),
		array('name'=>'neuter','value'=>'neuter'),
		array('name'=>'newspaper-o','value'=>'newspaper-o'),
		array('name'=>'openid','value'=>'openid'),
		array('name'=>'outdent','value'=>'outdent'),
		array('name'=>'pagelines','value'=>'pagelines'),
		array('name'=>'paint-brush','value'=>'paint-brush'),
		array('name'=>'paper-plane','value'=>'paper-plane'),
		array('name'=>'paper-plane-o','value'=>'paper-plane-o'),
		array('name'=>'paperclip','value'=>'paperclip'),
		array('name'=>'paragraph','value'=>'aragraph'),
		array('name'=>'paste','value'=>'paste'),
		array('name'=>'pause','value'=>'pause'),
		array('name'=>'paw','value'=>'paw'),
		array('name'=>'paypal','value'=>'paypal'),
		array('name'=>'pencil','value'=>'pencil'),
		array('name'=>'pencil-square','value'=>'pencil-square'),
		array('name'=>'pencil-square-o','value'=>'pencil-square-o'),
		array('name'=>'phone','value'=>'phone'),
		array('name'=>'phone-square','value'=>'phone-square'),
		array('name'=>'photo','value'=>'photo'),
		array('name'=>'picture-o','value'=>'picture-o'),
		array('name'=>'pie-chart','value'=>'pie-chart'),
		array('name'=>'pied-piper','value'=>'pied-piper'),
		array('name'=>'pied-piper-alt','value'=>'pied-piper-alt'),
		array('name'=>'pinterest','value'=>'pinterest'),
		array('name'=>'pinterest-p','value'=>'pinterest-p'),
		array('name'=>'pinterest-square','value'=>'pinterest-square'),
		array('name'=>'plane','value'=>'plane'),
		array('name'=>'play','value'=>'play'),
		array('name'=>'play-circle','value'=>'play-circle'),
		array('name'=>'play-circle-o','value'=>'play-circle-o'),
		array('name'=>'plug','value'=>'plug'),
		array('name'=>'plus','value'=>'plus'),
		array('name'=>'plus-circle','value'=>'plus-circle'),
		array('name'=>'plus-square','value'=>'plus-square'),
		array('name'=>'plus-square-o','value'=>'plus-square-o'),
		array('name'=>'power-off','value'=>'power-off'),
		array('name'=>'print','value'=>'print'),
		array('name'=>'puzzle-piece','value'=>'puzzle-piece'),
		array('name'=>'qq','value'=>'qq'),
		array('name'=>'qrcode','value'=>'qrcode'),
		array('name'=>'question','value'=>'question'),
		array('name'=>'question-circle','value'=>'question-circle'),
		array('name'=>'quote-left','value'=>'quote-left'),
		array('name'=>'quote-right','value'=>'quote-right'),
		array('name'=>'ra','value'=>'ra'),
		array('name'=>'random','value'=>'random'),
		array('name'=>'rebel','value'=>'rebel'),
		array('name'=>'recycle','value'=>'recycle'),
		array('name'=>'reddit','value'=>'reddit'),
		array('name'=>'reddit-square','value'=>'reddit-square'),
		array('name'=>'refresh','value'=>'refresh'),
		array('name'=>'remove','value'=>'remove'),
		array('name'=>'renren','value'=>'renren'),
		array('name'=>'reorder','value'=>'reorder'),
		array('name'=>'repeat','value'=>'repeat'),
		array('name'=>'reply','value'=>'reply'),
		array('name'=>'reply-all','value'=>'eply-all'),
		array('name'=>'retweet','value'=>'retweet'),
		array('name'=>'rmb','value'=>'rmb'),
		array('name'=>'road','value'=>'road'),
		array('name'=>'rocket','value'=>'rocket'),
		array('name'=>'rotate-left','value'=>'rotate-left'),
		array('name'=>'rotate-right','value'=>'rotate-right'),
		array('name'=>'rouble','value'=>'rouble'),
		array('name'=>'rss','value'=>'rss'),
		array('name'=>'rss-square','value'=>'rss-square'),
		array('name'=>'rub','value'=>'rub'),
		array('name'=>'ruble','value'=>'ruble'),
		array('name'=>'rupee','value'=>'rupee'),
		array('name'=>'save','value'=>'save'),
		array('name'=>'scissors','value'=>'scissors'),
		array('name'=>'search','value'=>'search'),
		array('name'=>'search-minus','value'=>'search-minus'),
		array('name'=>'search-plus','value'=>'search-plus'),
		array('name'=>'sellsy','value'=>'sellsy'),
		array('name'=>'send','value'=>'send'),
		array('name'=>'send-o','value'=>'send-o'),
		array('name'=>'server','value'=>'server'),
		array('name'=>'share','value'=>'share'),
		array('name'=>'share-alt','value'=>'share-alt'),
		array('name'=>'share-alt-square','value'=>'share-alt-square'),
		array('name'=>'share-square','value'=>'share-square'),
		array('name'=>'share-square-o','value'=>'share-square-o'),
		array('name'=>'shekel','value'=>'shekel'),
		array('name'=>'sheqel','value'=>'sheqel'),
		array('name'=>'shield','value'=>'shield'),
		array('name'=>'ship','value'=>'ship'),
		array('name'=>'shirtsinbulk','value'=>'shirtsinbulk'),
		array('name'=>'shopping-cart','value'=>'shopping-cart'),
		array('name'=>'sign-in','value'=>'sign-in'),
		array('name'=>'sign-out','value'=>'sign-out'),
		array('name'=>'signal','value'=>'signal'),
		array('name'=>'simplybuilt','value'=>'simplybuilt'),
		array('name'=>'sitemap','value'=>'sitemap'),
		array('name'=>'skyatlas','value'=>'skyatlas'),
		array('name'=>'skype','value'=>'skype'),
		array('name'=>'slack','value'=>'slack'),
		array('name'=>'sliders','value'=>'sliders'),
		array('name'=>'slideshare','value'=>'slideshare'),
		array('name'=>'soccer-ball-o','value'=>'soccer-ball-o'),
		array('name'=>'sort','value'=>'sort'),
		array('name'=>'sort-alpha-asc','value'=>'sort-alpha-asc'),
		array('name'=>'sort-alpha-desc','value'=>'sort-alpha-desc'),
		array('name'=>'sort-amount-asc','value'=>'sort-amount-asc'),
		array('name'=>'sort-amount-desc','value'=>'sort-amount-desc'),
		array('name'=>'sort-asc','value'=>'sort-asc'),
		array('name'=>'sort-desc','value'=>'sort-desc'),
		array('name'=>'sort-down','value'=>'sort-down'),
		array('name'=>'sort-numeric-asc','value'=>'sort-numeric-asc'),
		array('name'=>'sort-numeric-desc','value'=>'sort-numeric-desc'),
		array('name'=>'sort-up','value'=>'sort-up'),
		array('name'=>'soundcloud','value'=>'soundcloud'),
		array('name'=>'space-shuttle','value'=>'space-shuttle'),
		array('name'=>'spinner','value'=>'spinner'),
		array('name'=>'spoon','value'=>'spoon'),
		array('name'=>'spotify','value'=>'spotify'),
		array('name'=>'square','value'=>'square'),
		array('name'=>'square-o','value'=>'square-o'),
		array('name'=>'stack-exchange','value'=>'stack-exchange'),
		array('name'=>'stack-overflow','value'=>'stack-overflow'),
		array('name'=>'star','value'=>'star'),
		array('name'=>'star-half','value'=>'star-half'),
		array('name'=>'star-half-empty','value'=>'star-half-empty'),
		array('name'=>'star-half-full','value'=>'star-half-full'),
		array('name'=>'star-half-o','value'=>'star-half-o'),
		array('name'=>'star-o','value'=>'star-o'),
		array('name'=>'steam','value'=>'steam'),
		array('name'=>'steam-square','value'=>'steam-square'),
		array('name'=>'step-backward','value'=>'step-backward'),
		array('name'=>'step-forward','value'=>'step-forward'),
		array('name'=>'stethoscope','value'=>'stethoscope'),
		array('name'=>'stop','value'=>'stop'),
		array('name'=>'street-view','value'=>'street-view'),
		array('name'=>'strikethrough','value'=>'strikethrough'),
		array('name'=>'stumbleupon','value'=>'stumbleupon'),
		array('name'=>'stumbleupon-circle','value'=>'stumbleupon-circle'),
		array('name'=>'subscript','value'=>'subscript'),
		array('name'=>'subway','subway'),
		array('name'=>'suitcase','value'=>'suitcase'),
		array('name'=>'sun-o','value'=>'sun-o'),
		array('name'=>'superscript','value'=>'superscript'),
		array('name'=>'support','value'=>'support'),
		array('name'=>'table','value'=>'table'),
		array('name'=>'tablet','value'=>'tablet'),
		array('name'=>'tachometer','value'=>'tachometer'),
		array('name'=>'tag','value'=>'tag'),
		array('name'=>'tags','value'=>'tags'),
		array('name'=>'tasks','value'=>'tasks'),
		array('name'=>'taxi','value'=>'taxi'),
		array('name'=>'tencent-weibo','value'=>'tencent-weibo'),
		array('name'=>'terminal','value'=>'terminal'),
		array('name'=>'text-height','value'=>'text-height'),
		array('name'=>'text-width','value'=>'text-width'),
		array('name'=>'th','value'=>'th'),
		array('name'=>'th-large','value'=>'h-large'),
		array('name'=>'th-list','value'=>'th-list'),
		array('name'=>'thumb-tack','value'=>'thumb-tack'),
		array('name'=>'thumbs-down','value'=>'thumbs-down'),
		array('name'=>'thumbs-o-down','value'=>'thumbs-o-down'),
		array('name'=>'thumbs-o-up','value'=>'thumbs-o-up'),
		array('name'=>'thumbs-up','value'=>'thumbs-up'),
		array('name'=>'ticket','value'=>'ticket'),
		array('name'=>'times','value'=>'times'),
		array('name'=>'times-circle','value'=>'times-circle'),
		array('name'=>'times-circle-o','value'=>'times-circle-o'),
		array('name'=>'tint','value'=>'tint'),
		array('name'=>'toggle-down','value'=>'toggle-down'),
		array('name'=>'toggle-left','value'=>'toggle-left'),
		array('name'=>'toggle-off','value'=>'toggle-off'),
		array('name'=>'toggle-on','value'=>'toggle-on'),
		array('name'=>'toggle-right','value'=>'toggle-right'),
		array('name'=>'train','train'),
		array('name'=>'transgender','value'=>'transgender'),
		array('name'=>'transgender-alt','value'=>'transgender-alt'),
		array('name'=>'trash','value'=>'trash'),
		array('name'=>'trash-o','value'=>'trash-o'),
		array('name'=>'tree','value'=>'tree'),
		array('name'=>'trello','value'=>'trello'),
		array('name'=>'trophy','value'=>'trophy'),
		array('name'=>'truck','value'=>'truck'),
		array('name'=>'try','value'=>'try'),
		array('name'=>'tty','value'=>'tty'),
		array('name'=>'tumblr','value'=>'tumblr'),
		array('name'=>'tumblr-square','value'=>'umblr-square'),
		array('name'=>'turkish-lira','value'=>'turkish-lira'),
		array('name'=>'twitch','value'=>'twitch'),
		array('name'=>'twitter','value'=>'twitter'),
		array('name'=>'twitter-square','value'=>'twitter-square'),
		array('name'=>'umbrella','value'=>'umbrella'),
		array('name'=>'underline','value'=>'underline'),
		array('name'=>'undo','value'=>'undo'),
		array('name'=>'university','value'=>'university'),
		array('name'=>'unlink','value'=>'unlink'),
		array('name'=>'unlock','value'=>'unlock'),
		array('name'=>'unlock-alt','value'=>'unlock-alt'),
		array('name'=>'unsorted','value'=>'unsorted'),
		array('name'=>'upload','value'=>'upload'),
		array('name'=>'usd','value'=>'usd'),
		array('name'=>'user','value'=>'user'),
		array('name'=>'user-md','value'=>'user-md'),
		array('name'=>'user-plus','value'=>'user-plus'),
		array('name'=>'user-secret','value'=>'user-secret'),
		array('name'=>'user-times','value'=>'user-times'),
		array('name'=>'users','value'=>'users'),
		array('name'=>'venus','value'=>'venus'),
		array('name'=>'venus-double','value'=>'venus-double'),
		array('name'=>'venus-mars','value'=>'venus-mars'),
		array('name'=>'viacoin','viacoin'),
		array('name'=>'video-camera','value'=>'video-camera'),
		array('name'=>'vimeo-square','value'=>'vimeo-square'),
		array('name'=>'vine','value'=>'vine'),
		array('name'=>'vk','value'=>'vk'),
		array('name'=>'volume-down','value'=>'volume-down'),
		array('name'=>'volume-off','value'=>'volume-off'),
		array('name'=>'volume-up','value'=>'volume-up'),
		array('name'=>'warning','value'=>'warning'),
		array('name'=>'wechat','value'=>'wechat'),
		array('name'=>'weibo','value'=>'weibo'),
		array('name'=>'weixin','value'=>'weixin'),
		array('name'=>'whatsapp','value'=>'whatsapp'),
		array('name'=>'wheelchair','value'=>'wheelchair'),
		array('name'=>'wifi','value'=>'wifi'),
		array('name'=>'windows','value'=>'windows'),
		array('name'=>'won','value'=>'won'),
		array('name'=>'wordpress','value'=>'wordpress'),
		array('name'=>'wrench','value'=>'wrench'),
		array('name'=>'xing','value'=>'xing'),
		array('name'=>'xing-square','value'=>'xing-square'),
		array('name'=>'yahoo','value'=>'yahoo'),
		array('name'=>'yelp','value'=>'yelp'),
		array('name'=>'yen','value'=>'yen'),
		array('name'=>'youtube','value'=>'youtube'),
		array('name'=>'youtube-play','value'=>'youtube-play'),
		array('name'=>'youtube-square','value'=>'youtube-square')
	);

	$tour_args = array(
		'post_type' => 'tour',
	);
	$ale_tours = new WP_Query( $tour_args );
	$tour_list[] = array('name' => 'Disable Tour', 'value' =>  '');
	if ( $ale_tours->have_posts() ) {
		while ( $ale_tours->have_posts() ) {
			$ale_tours->the_post();
			$tour_list[]= array('name' => $ale_tours->post->post_title, 'value' =>  $ale_tours->post->ID);
		}
	} else {
		$tour_list = array(
			array( 'name' => 'No Cause in DataBase' , 'value' => '', ),
		);
	}

	$meta_boxes[] = array(
		'id'         => 'home_page_metabox',
		'title'      => 'Home Page Options',
		'pages'      => array( 'page', ), // Post type
		'context'    => 'normal',
		'priority'   => 'high',
		'show_names' => true, // Show field names on the left
		'show_on'    => array( 'key' => 'page-template', 'value' => array('page-home.php'), ), // Specific post templates to display this metabox
		'fields' => array(
			array(
				'name' => 'Display or hide Boxes on Home page',
				'desc' => '',
				'id'   => $prefix . 'displayhome',
				'type'    => 'title',
			),
			array(
				'name' => 'Show The Slider Box?',
				'desc' => 'Select enable to show the Slider box',
				'id'   => $prefix . 'displayhomeslider',
				'std'  => 'Enable',
				'type'    => 'select',
				'options' => array(
					array( 'name' => 'Enable', 'value' => 'on', ),
					array( 'name' => 'Disable', 'value' => 'off', ),
				),
			),
			array(
				'name' => 'Show The Search Box?',
				'desc' => 'Select enable to show the Search box',
				'id'   => $prefix . 'displayhomesearch',
				'std'  => 'Enable',
				'type'    => 'select',
				'options' => array(
					array( 'name' => 'Enable', 'value' => 'on', ),
					array( 'name' => 'Disable', 'value' => 'off', ),
				),
			),
			array(
				'name' => 'Show The "Hot Deals" Box?',
				'desc' => 'Select enable to show the "Hot Deals" box',
				'id'   => $prefix . 'displayhomehotdeals',
				'std'  => 'Enable',
				'type'    => 'select',
				'options' => array(
					array( 'name' => 'Enable', 'value' => 'on', ),
					array( 'name' => 'Disable', 'value' => 'off', ),
				),
			),
			array(
				'name' => 'Show The Video Box?',
				'desc' => 'Select enable to show the Video box',
				'id'   => $prefix . 'displayhomevideo',
				'std'  => 'Enable',
				'type'    => 'select',
				'options' => array(
					array( 'name' => 'Enable', 'value' => 'on', ),
					array( 'name' => 'Disable', 'value' => 'off', ),
				),
			),
			array(
				'name' => 'Show The Gallery Box?',
				'desc' => 'Select enable to show the Gallery box',
				'id'   => $prefix . 'displayhomegallery',
				'std'  => 'Enable',
				'type'    => 'select',
				'options' => array(
					array( 'name' => 'Enable', 'value' => 'on', ),
					array( 'name' => 'Disable', 'value' => 'off', ),
				),
			),
			array(
				'name' => 'Show The Rewies Box?',
				'desc' => 'Select enable to show the Rewies box',
				'id'   => $prefix . 'displayhomerewies',
				'std'  => 'Enable',
				'type'    => 'select',
				'options' => array(
					array( 'name' => 'Enable', 'value' => 'on', ),
					array( 'name' => 'Disable', 'value' => 'off', ),
				),
			),
			array(
				'name' => 'Show The Blog Box?',
				'desc' => 'Select enable to show the Blog box',
				'id'   => $prefix . 'displayhomeblog',
				'std'  => 'Enable',
				'type'    => 'select',
				'options' => array(
					array( 'name' => 'Enable', 'value' => 'on', ),
					array( 'name' => 'Disable', 'value' => 'off', ),
				),
			),
			array(
				'name' => 'Slider',
				'desc' => '',
				'id'   => $prefix . 'home-1-gallery-slider',
				'type' => 'title',
			),
			array(
				'name' => 'Gallery slider',
				'desc' => 'Insert the count of slider items',
				'id'   => $prefix . 'home-1-gallery-slider-count',
				'std'  => '3',
				'type' => 'text',
			),
			array(
				'name' => 'Hot deals',
				'desc' => '',
				'id'   => $prefix . 'home-1-hot-deals',
				'type' => 'title',
			),
			array(
				'name' => 'Count',
				'desc' => 'Insert the count of posts',
				'id'   => $prefix . 'home-1-hot-deals-count',
				'std'  => '8',
				'type' => 'text',
			),
			array(
				'name' => 'Video',
				'desc' => '',
				'id'   => $prefix . 'home-1-video',
				'type' => 'title',
			),
			array(
				'name' => 'Image',
				'desc' => 'Upload a image for the video. Size: 470x223',
				'id'   => $prefix . 'home-1-video-image',
				'std'  => '',
				'type' => 'file',
			),
			array(
				'name' => 'Video Url',
				'desc' => 'Insert the link',
				'id'   => $prefix . 'home-1-video-link',
				'std'  => 'https://www.youtube.com/watch?v=reb-aOJrGOY',
				'type' => 'text',
			),
			array(
				'name' => 'Title for the video',
				'desc' => 'Insert the title',
				'id'   => $prefix . 'home-1-video-title',
				'std'  => 'What is Corallina',
				'type' => 'text',
			),
			array(
				'name' => 'Description for the video',
				'desc' => 'Insert the text',
				'id'   => $prefix . 'home-1-video-desc',
				'std'  => 'Short video presentation about us',
				'type' => 'text',
			),
			array(
				'name' => 'Title for the text',
				'desc' => 'Insert the title',
				'id'   => $prefix . 'home-1-video-text-title',
				'std'  => 'Printing and typesetting industry',
				'type' => 'text',
			),
			array(
				'name' => 'Description for the text',
				'desc' => 'Insert the text',
				'id'   => $prefix . 'home-1-video-text-desc',
				'std'  => 'Lorem Ipsum is simply dummy text of the',
				'type' => 'text',
			),
			array(
				'name' => 'Gallery',
				'desc' => '',
				'id'   => $prefix . 'home-1-gallery',
				'type' => 'title',
			),
			array(
				'name' => 'Title',
				'desc' => 'Insert the title',
				'id'   => $prefix . 'home-1-gallery-title',
				'std'  => 'Gallery',
				'type' => 'text',
			),
			array(
				'name' => 'Count',
				'desc' => 'Insert the count on slider items',
				'id'   => $prefix . 'home-1-gallery-count',
				'std'  => '20',
				'type' => 'text',
			),
			array(
				'name' => 'Rewies',
				'desc' => '',
				'id'   => $prefix . 'home-1-rewies',
				'type' => 'title',
			),
			array(
				'name' => 'Title',
				'desc' => 'Insert the title',
				'id'   => $prefix . 'home-1-rewies-title',
				'std'  => 'Rewies',
				'type' => 'text',
			),
			array(
				'name' => 'Background image',
				'desc' => 'Upload an image. Size: 1920x358px',
				'id'   => $prefix . 'home-1-rewies-image',
				'type' => 'file',
			),
			array(
				'name' => 'Count',
				'desc' => 'Insert the count on slider items',
				'id'   => $prefix . 'home-1-rewies-count',
				'std'  => '4',
				'type' => 'text',
			),
			array(
				'name' => 'Blog',
				'desc' => '',
				'id'   => $prefix . 'home-1-blog',
				'type' => 'title',
			),
			array(
				'name' => 'Title',
				'desc' => 'Insert the title',
				'id'   => $prefix . 'home-1-blog-title',
				'std'  => 'Our Blog',
				'type' => 'text',
			),
		)
	);

	$meta_boxes[] = array(
		'id'         => 'home_page_metabox',
		'title'      => 'Home Page Options',
		'pages'      => array( 'page', ), // Post type
		'context'    => 'normal',
		'priority'   => 'high',
		'show_names' => true, // Show field names on the left
		'show_on'    => array( 'key' => 'page-template', 'value' => array('template-home-1.php'), ), // Specific post templates to display this metabox
		'fields' => array(
			array(
				'name' => 'Display or hide Boxes on Home page',
				'desc' => '',
				'id'   => $prefix . 'display_template_home_1',
				'type'    => 'title',
			),
			array(
				'name' => 'Show The Slider Box?',
				'desc' => 'Select enable to show the Slider box',
				'id'   => $prefix . 'display_template_home_1_slider',
				'std'  => 'Enable',
				'type'    => 'select',
				'options' => array(
					array( 'name' => 'Enable', 'value' => 'on', ),
					array( 'name' => 'Disable', 'value' => 'off', ),
				),
			),
			array(
				'name' => 'Show The Description Box?',
				'desc' => 'Select enable to show the Description box',
				'id'   => $prefix . 'display_template_home_1_description',
				'std'  => 'Enable',
				'type'    => 'select',
				'options' => array(
					array( 'name' => 'Enable', 'value' => 'on', ),
					array( 'name' => 'Disable', 'value' => 'off', ),
				),
			),
			array(
				'name' => 'Show The Team Box?',
				'desc' => 'Select enable to show the Team box',
				'id'   => $prefix . 'display_template_home_1_team',
				'std'  => 'Enable',
				'type'    => 'select',
				'options' => array(
					array( 'name' => 'Enable', 'value' => 'on', ),
					array( 'name' => 'Disable', 'value' => 'off', ),
				),
			),
			array(
				'name' => 'Show The Title Box?',
				'desc' => 'Select enable to show the Team box',
				'id'   => $prefix . 'display_template_home_1_title',
				'std'  => 'Enable',
				'type'    => 'select',
				'options' => array(
					array( 'name' => 'Enable', 'value' => 'on', ),
					array( 'name' => 'Disable', 'value' => 'off', ),
				),
			),
			array(
				'name' => 'Show The Tour Box?',
				'desc' => 'Select enable to show the Team box',
				'id'   => $prefix . 'display_template_home_1_tour',
				'std'  => 'Enable',
				'type'    => 'select',
				'options' => array(
					array( 'name' => 'Enable', 'value' => 'on', ),
					array( 'name' => 'Disable', 'value' => 'off', ),
				),
			),
			array(
				'name' => 'Image',
				'desc' => '',
				'id'   => $prefix . 'template_home_1_image',
				'type' => 'title',
			),
			array(
				'name' => 'Header Image',
				'desc' => 'Upload an image. Size: 1920x540px',
				'id'   => $prefix . 'template_home_1_image_image',
				'type' => 'file',
			),
			array(
				'name' => 'Slider',
				'desc' => '',
				'id'   => $prefix . 'template_home_1_slider',
				'type' => 'title',
			),
			array(
				'name' => 'Number',
				'desc' => 'Insert the count of slider items',
				'id'   => $prefix . 'template_home_1_slider_count',
				'std'  => '4',
				'type' => 'text',
			),
			array(
				'name' => 'Description',
				'desc' => '',
				'id'   => $prefix . 'template_home_1_description',
				'type' => 'title',
			),
			array(
				'name' => 'Title No.1',
				'desc' => 'Insert the first part of the title',
				'id'   => $prefix . 'template_home_1_description_title_1',
				'std'  => 'There are',
				'type' => 'text',
			),
			array(
				'name' => 'Title No.2',
				'desc' => 'Insert the second part of the title',
				'id'   => $prefix . 'template_home_1_description_title_2',
				'std'  => 'many variations of passages',
				'type' => 'text',
			),
			array(
				'name' => 'Text',
				'desc' => 'Insert the text',
				'id'   => $prefix . 'template_home_1_description_text',
				'std'  => 'These cases are perfectly simple and easy to distinguish. In a free hour, when our power of choice is untrammelled and when ',
				'type' => 'text',
			),
			array(
				'name' => 'Information',
				'desc' => '',
				'id'   => $prefix . 'template_home_1_info',
				'type' => 'title',
			),
			array(
				'name' => 'Background Image',
				'desc' => 'Upload an image. Size: 1920x620px',
				'id'   => $prefix . 'template_home_1_info_bg',
				'type' => 'file',
			),
			array(
				'name' => 'No.1 Icon',
				'desc' => 'Select the icon',
				'id'   => $prefix . 'template_home_1_info_icon_1',
				'std'  => '',
				'type' => 'select',
				'options' => $font_awesome
			),
			array(
				'name' => 'No.1 Title',
				'desc' => 'Insert the title',
				'id'   => $prefix . 'template_home_1_info_title_1',
				'std'  => 'These cases',
				'type' => 'text',
			),
			array(
				'name' => 'No.1 Text',
				'desc' => 'Insert the text',
				'id'   => $prefix . 'template_home_1_info_text_1',
				'std'  => 'There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form',
				'type' => 'text',
			),
			array(
				'name' => 'No.2 Icon',
				'desc' => 'Select the icon',
				'id'   => $prefix . 'template_home_1_info_icon_2',
				'std'  => '',
				'type' => 'select',
				'options' => $font_awesome
			),
			array(
				'name' => 'No.2 Title',
				'desc' => 'Insert the title',
				'id'   => $prefix . 'template_home_1_info_title_2',
				'std'  => 'Revolving Cocktail bar',
				'type' => 'text',
			),
			array(
				'name' => 'No.2 Text',
				'desc' => 'Insert the text',
				'id'   => $prefix . 'template_home_1_info_text_2',
				'std'  => 'There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form',
				'type' => 'text',
			),
			array(
				'name' => 'No.3 Icon',
				'desc' => 'Select the icon',
				'id'   => $prefix . 'template_home_1_info_icon_3',
				'std'  => '',
				'type' => 'select',
				'options' => $font_awesome
			),
			array(
				'name' => 'No.3 Title',
				'desc' => 'Insert the title',
				'id'   => $prefix . 'template_home_1_info_title_3',
				'std'  => 'Free airport pick up service',
				'type' => 'text',
			),
			array(
				'name' => 'No.3 Text',
				'desc' => 'Insert the text',
				'id'   => $prefix . 'template_home_1_info_text_3',
				'std'  => 'There are many variations of passages of Lorem Ipsum available, but the majority',
				'type' => 'text',
			),
			array(
				'name' => 'Our team',
				'desc' => '',
				'id'   => $prefix . 'template_home_1_team',
				'type' => 'title',
			),
			array(
				'name' => 'Number',
				'desc' => 'Insert the number of slider items',
				'id'   => $prefix . 'template_home_1_team_count',
				'std'  => '4',
				'type' => 'text',
			),
			array(
				'name' => 'No.1 Title',
				'desc' => 'Insert the title',
				'id'   => $prefix . 'template_home_1_team_title_1',
				'std'  => 'Our',
				'type' => 'text',
			),
			array(
				'name' => 'No.2 Title',
				'desc' => 'Insert the title',
				'id'   => $prefix . 'template_home_1_team_title_2',
				'std'  => 'team',
				'type' => 'text',
			),
			array(
				'name' => 'Title',
				'desc' => '',
				'id'   => $prefix . 'template_home_1_title',
				'type' => 'title',
			),
			array(
				'name' => 'No.1 Title',
				'desc' => 'Insert the first part of the title',
				'id'   => $prefix . 'template_home_1_title_title_1',
				'std'  => 'Chous yuor',
				'type' => 'text',
			),
			array(
				'name' => 'No.2 Title',
				'desc' => 'Insert the second part of the title',
				'id'   => $prefix . 'template_home_1_title_title_2',
				'std'  => 'adventure',
				'type' => 'text',
			),
			array(
				'name' => 'No.1 Bckground image',
				'desc' => 'Upload an image. Size: 965x898px',
				'id'   => $prefix . 'template_home_1_title_image_1',
				'type' => 'file',
			),
			array(
				'name' => 'No.2 Bckground image',
				'desc' => 'Upload an image. Size: 1260x898px',
				'id'   => $prefix . 'template_home_1_title_image_2',
				'type' => 'file',
			),
			array(
				'name' => 'No.3 Bckground image',
				'desc' => 'Upload an image. Size: 965x898px',
				'id'   => $prefix . 'template_home_1_title_image_3',
				'type' => 'file',
			),
			array(
				'name' => 'Tour',
				'desc' => '',
				'id'   => $prefix . 'template_home_1_tour',
				'type' => 'title',
			),
			array(
				'name' => 'Title',
				'desc' => 'Insert the title',
				'id'   => $prefix . 'template_home_1_tour_title',
				'std'  => 'Availible tours',
				'type' => 'text',
			),
			array(
				'name' => 'Text',
				'desc' => 'Insert the text',
				'id'   => $prefix . 'template_home_1_tour_text',
				'std'  => 'It was a pleasant experience for all. My daughter got some face paint, and my son was too shy',
				'type' => 'text',
			),
		)
	);

	$meta_boxes[] = array(
		'id'         => 'home_page_metabox',
		'title'      => 'Home Page Options',
		'pages'      => array( 'page', ), // Post type
		'context'    => 'normal',
		'priority'   => 'high',
		'show_names' => true, // Show field names on the left
		'show_on'    => array( 'key' => 'page-template', 'value' => array('template-home-2.php'), ), // Specific post templates to display this metabox
		'fields' => array(
			array(
				'name' => 'Display or hide Boxes on Home page',
				'desc' => '',
				'id'   => $prefix . 'display_template_home_2',
				'type'    => 'title',
			),
			array(
				'name' => 'Show The Blog, Hot details, Rewiews, Faq, Twitter Boxes?',
				'desc' => 'Select enable to show the Blog, Hot details, Rewiews, Faq, Twitter Boxes',
				'id'   => $prefix . 'display_template_home_2_custom_box',
				'std'  => 'Enable',
				'type'    => 'select',
				'options' => array(
					array( 'name' => 'Enable', 'value' => 'on', ),
					array( 'name' => 'Disable', 'value' => 'off', ),
				),
			),
			array(
				'name' => 'Show The Information Boxes?',
				'desc' => 'Select enable to show the Information Boxes',
				'id'   => $prefix . 'display_template_home_2_info',
				'std'  => 'Enable',
				'type'    => 'select',
				'options' => array(
					array( 'name' => 'Enable', 'value' => 'on', ),
					array( 'name' => 'Disable', 'value' => 'off', ),
				),
			),
			array(
				'name' => 'Show The Gallery Boxes?',
				'desc' => 'Select enable to show the Gallery Boxes',
				'id'   => $prefix . 'display_template_home_2_gallery',
				'std'  => 'Enable',
				'type'    => 'select',
				'options' => array(
					array( 'name' => 'Enable', 'value' => 'on', ),
					array( 'name' => 'Disable', 'value' => 'off', ),
				),
			),
			array(
				'name' => 'Show The Partners Boxes?',
				'desc' => 'Select enable to show the Partners Boxes',
				'id'   => $prefix . 'display_template_home_2_partners',
				'std'  => 'Enable',
				'type'    => 'select',
				'options' => array(
					array( 'name' => 'Enable', 'value' => 'on', ),
					array( 'name' => 'Disable', 'value' => 'off', ),
				),
			),
			array(
				'name' => 'Image',
				'desc' => '',
				'id'   => $prefix . 'template_home_2_image',
				'type' => 'title',
			),
			array(
				'name' => 'Header Image',
				'desc' => 'Upload an image. Size: 1920x685px',
				'id'   => $prefix . 'template_home_2_image_image',
				'type' => 'file',
			),
			array(
				'name' => 'Search',
				'desc' => '',
				'id'   => $prefix . 'template_home_2_search',
				'type' => 'title',
			),
			array(
				'name' => 'Title',
				'desc' => 'Insert the title',
				'id'   => $prefix . 'template_home_2_search_title',
				'std'  => 'Lorem ipsum',
				'type' => 'text',
			),
			array(
				'name' => 'Description',
				'desc' => 'Insert the text',
				'id'   => $prefix . 'template_home_2_search_desc',
				'std'  => 'These cases are perfectly simple',
				'type' => 'text',
			),
			array(
				'name' => 'Blog',
				'desc' => '',
				'id'   => $prefix . 'template_home_2_blog',
				'type' => 'title',
			),
			array(
				'name' => 'Title',
				'desc' => 'Insert the title',
				'id'   => $prefix . 'template_home_2_blog_title',
				'std'  => 'Our blog',
				'type' => 'text',
			),
			array(
				'name' => 'Count',
				'desc' => 'Insert the count of the posts',
				'id'   => $prefix . 'template_home_2_blog_count',
				'std'  => '4',
				'type' => 'text',
			),
			array(
				'name' => 'Hot deals',
				'desc' => '',
				'id'   => $prefix . 'template_home_2_hot_deals',
				'type' => 'title',
			),
			array(
				'name' => 'Number',
				'desc' => 'Insert the number of the posts',
				'id'   => $prefix . 'template_home_2_hot_deals_count',
				'std'  => '5',
				'type' => 'text',
			),
			array(
				'name' => 'Rewiews',
				'desc' => '',
				'id'   => $prefix . 'template_home_2_rewiews',
				'type' => 'title',
			),
			array(
				'name' => 'Title',
				'desc' => 'Insert the title',
				'id'   => $prefix . 'template_home_2_rewiews_title',
				'std'  => 'Rewiews',
				'type' => 'text',
			),
			array(
				'name' => 'Count',
				'desc' => 'Insert the count of the posts',
				'id'   => $prefix . 'template_home_2_rewiews_count',
				'std'  => '3',
				'type' => 'text',
			),
			array(
				'name' => 'FAQ',
				'desc' => '',
				'id'   => $prefix . 'template_home_2_faq',
				'type' => 'title',
			),
			array(
				'name' => 'Title',
				'desc' => 'Insert the title',
				'id'   => $prefix . 'template_home_2_faq_title',
				'std'  => 'FAQ',
				'type' => 'text',
			),
			array(
				'name' => 'No.1 Title',
				'desc' => 'Insert the title',
				'id'   => $prefix . 'template_home_2_faq_title1',
				'std'  => 'There are many variations of passages of Lorem Ipsum available',
				'type' => 'text',
			),
			array(
				'name' => 'No.1 Text',
				'desc' => 'Insert the text',
				'id'   => $prefix . 'template_home_2_faq_text1',
				'std'  => 'But I must explain to you how all this mistaken idea of denouncing pleasure and praising pain was born and I will give you a complete account of the system, and expound',
				'type' => 'text',
			),
			array(
				'name' => 'No.2 Title',
				'desc' => 'Insert the title',
				'id'   => $prefix . 'template_home_2_faq_title2',
				'std'  => 'On the other hand, we denounce with righteous',
				'type' => 'text',
			),
			array(
				'name' => 'No.2 Text',
				'desc' => 'Insert the text',
				'id'   => $prefix . 'template_home_2_faq_text2',
				'std'  => 'But I must explain to you how all this mistaken idea of denouncing pleasure and praising pain was born and I will give you a complete account of the system, and expound',
				'type' => 'text',
			),
			array(
				'name' => 'No.3 Title',
				'desc' => 'Insert the title',
				'id'   => $prefix . 'template_home_2_faq_title3',
				'std'  => 'But in certain circumstances and owing to the claims',
				'type' => 'text',
			),
			array(
				'name' => 'No.3 Text',
				'desc' => 'Insert the text',
				'id'   => $prefix . 'template_home_2_faq_text3',
				'std'  => 'But I must explain to you how all this mistaken idea of denouncing pleasure and praising pain was born and I will give you a complete account of the system, and expound',
				'type' => 'text',
			),
			array(
				'name' => 'No.4 Title',
				'desc' => 'Insert the title',
				'id'   => $prefix . 'template_home_2_faq_title4',
				'std'  => 'These cases are perfectly simple and easy to distinguish',
				'type' => 'text',
			),
			array(
				'name' => 'No.4 Text',
				'desc' => 'Insert the text',
				'id'   => $prefix . 'template_home_2_faq_text4',
				'std'  => 'But I must explain to you how all this mistaken idea of denouncing pleasure and praising pain was born and I will give you a complete account of the system, and expound',
				'type' => 'text',
			),
			array(
				'name' => 'Information',
				'desc' => '',
				'id'   => $prefix . 'template_home_2_info',
				'type' => 'title',
			),
			array(
				'name' => 'No.1 Icon',
				'desc' => 'Select the icon',
				'id'   => $prefix . 'template_home_2_info_icon_1',
				'std'  => '',
				'type' => 'select',
				'options' => $font_awesome
			),
			array(
				'name' => 'No.1 Text',
				'desc' => 'Insert the text',
				'id'   => $prefix . 'template_home_2_info_text_1',
				'std'  => 'Lorem Ipsum is simply dummy text of the',
				'type' => 'text',
			),
			array(
				'name' => 'No.2 Icon',
				'desc' => 'Select the icon',
				'id'   => $prefix . 'template_home_2_info_icon_2',
				'std'  => '',
				'type' => 'select',
				'options' => $font_awesome
			),
			array(
				'name' => 'No.2 Text',
				'desc' => 'Insert the text',
				'id'   => $prefix . 'template_home_2_info_text_2',
				'std'  => 'The wise man therefore always holds in these',
				'type' => 'text',
			),
			array(
				'name' => 'No.3 Icon',
				'desc' => 'Select the icon',
				'id'   => $prefix . 'template_home_2_info_icon_3',
				'std'  => '',
				'type' => 'select',
				'options' => $font_awesome
			),
			array(
				'name' => 'No.3 Text',
				'desc' => 'Insert the text',
				'id'   => $prefix . 'template_home_2_info_text_3',
				'std'  => 'Lorem Ipsum is simply dummy text of the',
				'type' => 'text',
			),
			array(
				'name' => 'Gallery',
				'desc' => '',
				'id'   => $prefix . 'template_home_2_gallery',
				'type' => 'title',
			),
			array(
				'name' => 'No.1 Title',
				'desc' => 'Insert the title',
				'id'   => $prefix . 'template_home_2_gallery_title_1',
				'std'  => 'Lorem Ipsum is simplydummy',
				'type' => 'text'
			),
			array(
				'name' => 'No.2 Title',
				'desc' => 'Insert the title',
				'id'   => $prefix . 'template_home_2_gallery_title_2',
				'std'  => 'printing and typesetting industry',
				'type' => 'text'
			),
			array(
				'name' => 'Text',
				'desc' => 'Insert the text',
				'id'   => $prefix . 'template_home_2_gallery_text',
				'std'  => 'It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal',
				'type' => 'text'
			),
			array(
				'name' => 'Video',
				'desc' => 'Insert the Link',
				'id'   => $prefix . 'template_home_2_gallery_video',
				'std'  => 'https://www.youtube.com/watch?v=reb-aOJrGOY',
				'type' => 'text'
			),
			array(
				'name' => 'Background Image',
				'desc' => 'Upload an image. Size: 1920x500px',
				'id'   => $prefix . 'template_home_2_gallery_image',
				'type' => 'file'
			),
			array(
				'name' => 'Count',
				'desc' => 'Insert the count of posts',
				'id'   => $prefix . 'template_home_2_gallery_count',
				'std'  => '13',
				'type' => 'text'
			),
			array(
				'name' => 'Partners',
				'desc' => '',
				'id'   => $prefix . 'template_home_2_partners',
				'type' => 'title',
			),
			array(
				'name' => 'Title',
				'desc' => 'Insert the title',
				'id'   => $prefix . 'template_home_2_partners_title',
				'std'  => 'Corallina',
				'type' => 'text'
			),
			array(
				'name' => 'Image',
				'desc' => 'Upload an image for title',
				'id'   => $prefix . 'template_home_2_partners_title_image',
				'type' => 'file'
			),
			array(
				'name' => 'Text',
				'desc' => 'Insert the text',
				'id'   => $prefix . 'template_home_2_partners_text',
				'std'  => 'Contrary to popular belief, Lorem Ipsum is not simply random text',
				'type' => 'text'
			),
			array(
				'name' => 'No.1 Image',
				'desc' => 'Upload an image. Size: 140x101px',
				'id'   => $prefix . 'template_home_2_partners_image_1',
				'type' => 'file',
			),
			array(
				'name' => 'No.1 Link',
				'desc' => 'Insert the Url',
				'id'   => $prefix . 'template_home_2_partners_link_1',
				'std'  => 'https://www.google.com',
				'type' => 'text'
			),
			array(
				'name' => 'No.2 Image',
				'desc' => 'Upload an image. Size: 140x101px',
				'id'   => $prefix . 'template_home_2_partners_image_2',
				'type' => 'file',
			),
			array(
				'name' => 'No.2 Link',
				'desc' => 'Insert the Url',
				'id'   => $prefix . 'template_home_2_partners_link_2',
				'std'  => 'https://www.google.com',
				'type' => 'text'
			),
			array(
				'name' => 'No.3 Image',
				'desc' => 'Upload an image. Size: 140x101px',
				'id'   => $prefix . 'template_home_2_partners_image_3',
				'type' => 'file',
			),
			array(
				'name' => 'No.3 Link',
				'desc' => 'Insert the Url',
				'id'   => $prefix . 'template_home_2_partners_link_3',
				'std'  => 'https://www.google.com',
				'type' => 'text'
			),
			array(
				'name' => 'No.4 Image',
				'desc' => 'Upload an image. Size: 140x101px',
				'id'   => $prefix . 'template_home_2_partners_image_4',
				'type' => 'file',
			),
			array(
				'name' => 'No.4 Link',
				'desc' => 'Insert the Url',
				'id'   => $prefix . 'template_home_2_partners_link_4',
				'std'  => 'https://www.google.com',
				'type' => 'text'
			),
			array(
				'name' => 'No.5 Image',
				'desc' => 'Upload an image. Size: 140x101px',
				'id'   => $prefix . 'template_home_2_partners_image_5',
				'type' => 'file',
			),
			array(
				'name' => 'No.5 Link',
				'desc' => 'Insert the Url',
				'id'   => $prefix . 'template_home_2_partners_link_5',
				'std'  => 'https://www.google.com',
				'type' => 'text'
			),
			array(
				'name' => 'No.6 Image',
				'desc' => 'Upload an image. Size: 140x101px',
				'id'   => $prefix . 'template_home_2_partners_image_6',
				'type' => 'file',
			),
			array(
				'name' => 'No.6 Link',
				'desc' => 'Insert the Url',
				'id'   => $prefix . 'template_home_2_partners_link_6',
				'std'  => 'https://www.google.com',
				'type' => 'text'
			),
		)
	);

	$meta_boxes[] = array(
		'id'         => 'home_page_metabox',
		'title'      => 'Home Page Options',
		'pages'      => array( 'page', ), // Post type
		'context'    => 'normal',
		'priority'   => 'high',
		'show_names' => true, // Show field names on the left
		'show_on'    => array( 'key' => 'page-template', 'value' => array('template-home-3.php'), ), // Specific post templates to display this metabox
		'fields' => array(
			array(
				'name' => 'Display or hide Boxes on Home page',
				'desc' => '',
				'id'   => $prefix . 'display_template_home_3',
				'type'    => 'title',
			),
			array(
				'name' => 'Show The Hot details Box?',
				'desc' => 'Select enable to show the Hot details Box',
				'id'   => $prefix . 'display_template_home_3_hot_deals',
				'std'  => 'Enable',
				'type'    => 'select',
				'options' => array(
					array( 'name' => 'Enable', 'value' => 'on', ),
					array( 'name' => 'Disable', 'value' => 'off', ),
				),
			),
			array(
				'name' => 'Show The Filter Box?',
				'desc' => 'Select enable to show the Filter Box',
				'id'   => $prefix . 'display_template_home_3_filter',
				'std'  => 'Enable',
				'type'    => 'select',
				'options' => array(
					array( 'name' => 'Enable', 'value' => 'on', ),
					array( 'name' => 'Disable', 'value' => 'off', ),
				),
			),
			array(
				'name' => 'Show The Tours Box?',
				'desc' => 'Select enable to show the Tours Box',
				'id'   => $prefix . 'display_template_home_3_tours',
				'std'  => 'Enable',
				'type'    => 'select',
				'options' => array(
					array( 'name' => 'Enable', 'value' => 'on', ),
					array( 'name' => 'Disable', 'value' => 'off', ),
				),
			),
			array(
				'name' => 'Show The Information Box?',
				'desc' => 'Select enable to show the Information Box',
				'id'   => $prefix . 'display_template_home_3_info',
				'std'  => 'Enable',
				'type'    => 'select',
				'options' => array(
					array( 'name' => 'Enable', 'value' => 'on', ),
					array( 'name' => 'Disable', 'value' => 'off', ),
				),
			),
			array(
				'name' => 'Show The Testimonials Box?',
				'desc' => 'Select enable to show the Testimonials Box',
				'id'   => $prefix . 'display_template_home_3_testimonials',
				'std'  => 'Enable',
				'type'    => 'select',
				'options' => array(
					array( 'name' => 'Enable', 'value' => 'on', ),
					array( 'name' => 'Disable', 'value' => 'off', ),
				),
			),
			array(
				'name' => 'Show The Description Box?',
				'desc' => 'Select enable to show the Description Box',
				'id'   => $prefix . 'display_template_home_3_desc',
				'std'  => 'Enable',
				'type'    => 'select',
				'options' => array(
					array( 'name' => 'Enable', 'value' => 'on', ),
					array( 'name' => 'Disable', 'value' => 'off', ),
				),
			),
			array(
				'name' => 'Show The Blog Box?',
				'desc' => 'Select enable to show the Blog Box',
				'id'   => $prefix . 'display_template_home_3_blog',
				'std'  => 'Enable',
				'type'    => 'select',
				'options' => array(
					array( 'name' => 'Enable', 'value' => 'on', ),
					array( 'name' => 'Disable', 'value' => 'off', ),
				),
			),
			array(
				'name' => 'Hot deals',
				'desc' => '',
				'id'   => $prefix . 'template_home_3_hot_deals',
				'type' => 'title',
			),
			array(
				'name' => 'Count',
				'desc' => 'Insert the count of slider items',
				'id'   => $prefix . 'template_home_3_hot_deals_count',
				'std'  => '6',
				'type' => 'text',
			),
			array(
				'name' => 'Tours',
				'desc' => '',
				'id'   => $prefix . 'template_home_3_tours',
				'type' => 'title',
			),
			array(
				'name' => 'Count',
				'desc' => 'Insert the count of slider items',
				'id'   => $prefix . 'template_home_3_tours_count',
				'std'  => '6',
				'type' => 'text',
			),
			array(
				'name' => 'Background Image',
				'desc' => 'Upload an image. Size:1920x536px',
				'id'   => $prefix . 'template_home_3_tours_bg',
				'type' => 'file',
			),
			array(
				'name' => 'Information',
				'desc' => '',
				'id'   => $prefix . 'template_home_3_info',
				'type' => 'title',
			),
			array(
				'name' => 'Background image',
				'desc' => 'Upload an image. Size:1920x486px',
				'id'   => $prefix . 'template_home_3_info_bg',
				'type' => 'file',
			),
			array(
				'name' => 'No.1 Icon',
				'desc' => 'Select the icon',
				'id'   => $prefix . 'template_home_3_info_icon_1',
				'type' => 'select',
				'options' => $font_awesome
			),
			array(
				'name' => 'No.1 Number',
				'desc' => 'Insert the number',
				'id'   => $prefix . 'template_home_3_info_number_1',
				'std'  => '56',
				'type' => 'text',
			),
			array(
				'name' => 'No.1 Title',
				'desc' => 'Insert the title',
				'id'   => $prefix . 'template_home_3_info_title_1',
				'std'  => 'Cruises',
				'type' => 'text',
			),
			array(
				'name' => 'No.1 Description',
				'desc' => 'Insert the text',
				'id'   => $prefix . 'template_home_3_info_desc_1',
				'std'  => 'Since we start',
				'type' => 'text',
			),
			array(
				'name' => 'No.2 Icon',
				'desc' => 'Select the icon',
				'id'   => $prefix . 'template_home_3_info_icon_2',
				'type' => 'select',
				'options' => $font_awesome
			),
			array(
				'name' => 'No.2 Number',
				'desc' => 'Insert the number',
				'id'   => $prefix . 'template_home_3_info_number_2',
				'std'  => '98',
				'type' => 'text',
			),
			array(
				'name' => 'No.2 Title',
				'desc' => 'Insert the title',
				'id'   => $prefix . 'template_home_3_info_title_2',
				'std'  => 'Fligts',
				'type' => 'text',
			),
			array(
				'name' => 'No.2 Description',
				'desc' => 'Insert the text',
				'id'   => $prefix . 'template_home_3_info_desc_2',
				'std'  => 'Since we start',
				'type' => 'text',
			),
			array(
				'name' => 'No.3 Icon',
				'desc' => 'Select the icon',
				'id'   => $prefix . 'template_home_3_info_icon_3',
				'type' => 'select',
				'options' => $font_awesome
			),
			array(
				'name' => 'No.3 Number',
				'desc' => 'Insert the number',
				'id'   => $prefix . 'template_home_3_info_number_3',
				'std'  => '70',
				'type' => 'text',
			),
			array(
				'name' => 'No.3 Title',
				'desc' => 'Insert the title',
				'id'   => $prefix . 'template_home_3_info_title_3',
				'std'  => 'Bus trips',
				'type' => 'text',
			),
			array(
				'name' => 'No.3 Description',
				'desc' => 'Insert the text',
				'id'   => $prefix . 'template_home_3_info_desc_3',
				'std'  => 'Since we start',
				'type' => 'text',
			),
			array(
				'name' => 'Testimonials',
				'desc' => '',
				'id'   => $prefix . 'template_home_3_testimonials',
				'type' => 'title',
			),
			array(
				'name' => 'Title',
				'desc' => 'Insert the title',
				'id'   => $prefix . 'template_home_3_testimonials_title',
				'std'  => 'Testimonials',
				'type' => 'text',
			),
			array(
				'name' => 'Image',
				'desc' => 'Upload an image. Size:352x352px',
				'id'   => $prefix . 'template_home_3_testimonials_image',
				'type' => 'file',
			),
			array(
				'name' => 'Description',
				'desc' => '',
				'id'   => $prefix . 'template_home_3_desc',
				'type' => 'title',
			),
			array(
				'name' => 'No.1 Title',
				'desc' => 'Insert the title',
				'id'   => $prefix . 'template_home_3_desc_title_1',
				'std'  => 'These cases are',
				'type' => 'text',
			),
			array(
				'name' => 'No.2 Title',
				'desc' => 'Insert the title',
				'id'   => $prefix . 'template_home_3_desc_title_2',
				'std'  => 'perfectly simple and easy to distinguish',
				'type' => 'text',
			),
			array(
				'name' => 'Text',
				'desc' => 'Insert the text',
				'id'   => $prefix . 'template_home_3_desc_text',
				'std'  => 'These cases are perfectly simple and easy to distinguish. In a free hour, when our power of choice is untrammelled and when ',
				'type' => 'text',
			),
			array(
				'name' => 'Background Image',
				'desc' => 'Upload an image. Size:1920x734px',
				'id'   => $prefix . 'template_home_3_desc_image',
				'type' => 'file',
			),
			array(
				'name' => 'Blog',
				'desc' => '',
				'id'   => $prefix . 'template_home_3_blog',
				'type' => 'title',
			),
			array(
				'name' => 'Title',
				'desc' => 'Insert the title',
				'id'   => $prefix . 'template_home_3_blog_title',
				'std'  => 'Blog',
				'type' => 'text',
			),
			array(
				'name' => 'Number',
				'desc' => 'Insert the number of slider items',
				'id'   => $prefix . 'template_home_3_blog_count',
				'std'  => '2',
				'type' => 'text',
			),
		)
	);

	$meta_boxes[] = array(
		'id'         => 'home_page_metabox',
		'title'      => 'Home Page Options',
		'pages'      => array( 'page', ), // Post type
		'context'    => 'normal',
		'priority'   => 'high',
		'show_names' => true, // Show field names on the left
		'show_on'    => array( 'key' => 'page-template', 'value' => array('template-home-4.php'), ), // Specific post templates to display this metabox
		'fields' => array(
			array(
				'name' => 'Display or hide Boxes on Home page',
				'desc' => '',
				'id'   => $prefix . 'display_template_home_4',
				'type'    => 'title',
			),
			array(
				'name' => 'Show The Slider Box?',
				'desc' => 'Select enable to show the Slider Box',
				'id'   => $prefix . 'display_template_home_4_slider',
				'std'  => 'Enable',
				'type'    => 'select',
				'options' => array(
					array( 'name' => 'Enable', 'value' => 'on', ),
					array( 'name' => 'Disable', 'value' => 'off', ),
				),
			),
			array(
				'name' => 'Show The Hot Deals Box?',
				'desc' => 'Select enable to show the Hot Deals Box',
				'id'   => $prefix . 'display_template_home_4_hot_deals',
				'std'  => 'Enable',
				'type'    => 'select',
				'options' => array(
					array( 'name' => 'Enable', 'value' => 'on', ),
					array( 'name' => 'Disable', 'value' => 'off', ),
				),
			),
			array(
				'name' => 'Show The Information Box?',
				'desc' => 'Select enable to show the Information Box',
				'id'   => $prefix . 'display_template_home_4_info',
				'std'  => 'Enable',
				'type'    => 'select',
				'options' => array(
					array( 'name' => 'Enable', 'value' => 'on', ),
					array( 'name' => 'Disable', 'value' => 'off', ),
				),
			),
			array(
				'name' => 'Show The The Weather Box?',
				'desc' => 'Select enable to show the The Weather Box',
				'id'   => $prefix . 'display_template_home_4_weather',
				'std'  => 'Enable',
				'type'    => 'select',
				'options' => array(
					array( 'name' => 'Enable', 'value' => 'on', ),
					array( 'name' => 'Disable', 'value' => 'off', ),
				),
			),
			array(
				'name' => 'Show The Single Tour Box?',
				'desc' => 'Select enable to show the Single Tour Box',
				'id'   => $prefix . 'display_template_home_4_single_tour',
				'std'  => 'Enable',
				'type'    => 'select',
				'options' => array(
					array( 'name' => 'Enable', 'value' => 'on', ),
					array( 'name' => 'Disable', 'value' => 'off', ),
				),
			),
			array(
				'name' => 'Show The Tour Box?',
				'desc' => 'Select enable to show the Tour Box',
				'id'   => $prefix . 'display_template_home_4_tour',
				'std'  => 'Enable',
				'type'    => 'select',
				'options' => array(
					array( 'name' => 'Enable', 'value' => 'on', ),
					array( 'name' => 'Disable', 'value' => 'off', ),
				),
			),
			array(
				'name' => 'Show The Subscribe Box?',
				'desc' => 'Select enable to show the Subscribe Box',
				'id'   => $prefix . 'display_template_home_4_subscribe',
				'std'  => 'Enable',
				'type'    => 'select',
				'options' => array(
					array( 'name' => 'Enable', 'value' => 'on', ),
					array( 'name' => 'Disable', 'value' => 'off', ),
				),
			),
			array(
				'name' => 'Slider',
				'desc' => '',
				'id'   => $prefix . 'template_home_4_slider',
				'type' => 'title',
			),
			array(
				'name' => 'Count',
				'desc' => 'Insert the count of slider items',
				'id'   => $prefix . 'template_home_4_slider_count',
				'std'  => '3',
				'type' => 'text',
			),
			array(
				'name' => 'Information',
				'desc' => '',
				'id'   => $prefix . 'template_home_4_info',
				'type' => 'title',
			),
			array(
				'name' => 'No.1 Title',
				'desc' => 'Insert the title',
				'id'   => $prefix . 'template_home_4_info_title_1',
				'std'  => 'Lorem Ipsum is simply dummy text of the',
				'type' => 'text',
			),
			array(
				'name' => 'No.2 Title',
				'desc' => 'Insert the title',
				'id'   => $prefix . 'template_home_4_info_title_2',
				'std'  => 'Printing and typesetting industry',
				'type' => 'text',
			),
			array(
				'name' => 'No.1 Search Title',
				'desc' => 'Insert the title',
				'id'   => $prefix . 'template_home_4_info_search_title_1',
				'std'  => 'Quick',
				'type' => 'text',
			),
			array(
				'name' => 'No.2 Search Title',
				'desc' => 'Insert the title',
				'id'   => $prefix . 'template_home_4_info_search_title_2',
				'std'  => 'search',
				'type' => 'text',
			),
			array(
				'name' => 'Single Tour',
				'desc' => '',
				'id'   => $prefix . 'template_home_4_single_tour',
				'type' => 'title',
			),
			array(
				'name' => 'Background Image',
				'desc' => 'Upload an image. Size: 1920x734',
				'id'   => $prefix . 'template_home_4_single_tour_image',
				'type' => 'file',
			),
			array(
				'name' => 'Tour',
				'desc' => '',
				'id'   => $prefix . 'template_home_4_tour',
				'type' => 'title',
			),
			array(
				'name' => 'Number',
				'desc' => 'Insert the number of slider items',
				'id'   => $prefix . 'template_home_4_tour_count',
				'std'  => '3',
				'type' => 'text',
			),
		)
	);

	$meta_boxes[] = array(
		'id'         => 'home_page_metabox',
		'title'      => 'Home Page Options',
		'pages'      => array( 'page', ), // Post type
		'context'    => 'normal',
		'priority'   => 'high',
		'show_names' => true, // Show field names on the left
		'show_on'    => array( 'key' => 'page-template', 'value' => array('template-home-5.php'), ), // Specific post templates to display this metabox
		'fields' => array(
			array(
				'name' => 'Display or hide Boxes on Home page',
				'desc' => '',
				'id'   => $prefix . 'display_template_home_5',
				'type'    => 'title',
			),
			array(
				'name' => 'Show The Hot Deals Box?',
				'desc' => 'Select enable to show the Hot Deals Box',
				'id'   => $prefix . 'display_template_home_5_hot_deals',
				'std'  => 'Enable',
				'type'    => 'select',
				'options' => array(
					array( 'name' => 'Enable', 'value' => 'on', ),
					array( 'name' => 'Disable', 'value' => 'off', ),
				),
			),
			array(
				'name' => 'Show The Tours Box?',
				'desc' => 'Select enable to show the Tours Box',
				'id'   => $prefix . 'display_template_home_5_tours',
				'std'  => 'Enable',
				'type'    => 'select',
				'options' => array(
					array( 'name' => 'Enable', 'value' => 'on', ),
					array( 'name' => 'Disable', 'value' => 'off', ),
				),
			),
			array(
				'name' => 'Show The Information Box?',
				'desc' => 'Select enable to show the Information Box',
				'id'   => $prefix . 'display_template_home_5_info',
				'std'  => 'Enable',
				'type'    => 'select',
				'options' => array(
					array( 'name' => 'Enable', 'value' => 'on', ),
					array( 'name' => 'Disable', 'value' => 'off', ),
				),
			),
			array(
				'name' => 'Show The Gallery Box?',
				'desc' => 'Select enable to show the Gallery Box',
				'id'   => $prefix . 'display_template_home_5_gallery',
				'std'  => 'Enable',
				'type'    => 'select',
				'options' => array(
					array( 'name' => 'Enable', 'value' => 'on', ),
					array( 'name' => 'Disable', 'value' => 'off', ),
				),
			),
			array(
				'name' => 'Show The Testimonials Box?',
				'desc' => 'Select enable to show the Testimonials Box',
				'id'   => $prefix . 'display_template_home_5_testimonials',
				'std'  => 'Enable',
				'type'    => 'select',
				'options' => array(
					array( 'name' => 'Enable', 'value' => 'on', ),
					array( 'name' => 'Disable', 'value' => 'off', ),
				),
			),
			array(
				'name' => 'Tours',
				'desc' => '',
				'id'   => $prefix . 'template_home_5_tours',
				'type' => 'title',
			),
			array(
				'name' => 'Image',
				'desc' => 'Upload an image. Size:421x507px',
				'id'   => $prefix . 'template_home_5_tours_image',
				'type' => 'file',
			),
			array(
				'name' => 'No.1 Title',
				'desc' => 'Insert the title',
				'id'   => $prefix . 'template_home_5_tours_title_1',
				'std'  => 'Europe',
				'type' => 'text',
			),
			array(
				'name' => 'No.2 Title',
				'desc' => 'Insert the title',
				'id'   => $prefix . 'template_home_5_tours_title_2',
				'std'  => 'Italy',
				'type' => 'text',
			),
			array(
				'name' => 'Description',
				'desc' => 'Insert the text',
				'id'   => $prefix . 'template_home_5_tours_desc',
				'std'  => 'There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don\'t look even slig',
				'type' => 'textarea',
			),
			array(
				'name' => 'Items count',
				'desc' => 'Insert the slider items count',
				'id'   => $prefix . 'template_home_5_tours_count',
				'std'  => '3',
				'type' => 'text',
			),
			array(
				'name' => 'Information',
				'desc' => '',
				'id'   => $prefix . 'template_home_5_info',
				'type' => 'title',
			),
			array(
				'name' => 'Image',
				'desc' => 'Upload an image. Size:1920x622px',
				'id'   => $prefix . 'template_home_5_info_image',
				'type' => 'file',
			),
			array(
				'name' => 'No.1 Title',
				'desc' => 'Insert the title',
				'id'   => $prefix . 'template_home_5_info_title_1',
				'std'  => 'Lorem Ipsum is simply dummy text of the',
				'type' => 'text',
			),
			array(
				'name' => 'No.2 Title',
				'desc' => 'Insert the title',
				'id'   => $prefix . 'template_home_5_info_title_2',
				'std'  => 'printing and typesetting industry',
				'type' => 'text',
			),
			array(
				'name' => 'Description',
				'desc' => 'Insert the text',
				'id'   => $prefix . 'template_home_5_info_desc',
				'std'  => 'Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s',
				'type' => 'text',
			),
			array(
				'name' => 'Video',
				'desc' => 'Insert the Url',
				'id'   => $prefix . 'template_home_5_info_video',
				'std'  => 'https://www.youtube.com/watch?v=reb-aOJrGOY',
				'type' => 'text',
			),
			array(
				'name' => 'Gallery',
				'desc' => '',
				'id'   => $prefix . 'template_home_5_gallery',
				'type' => 'title',
			),
			array(
				'name' => 'Title',
				'desc' => 'Insert the title',
				'id'   => $prefix . 'template_home_5_gallery_title',
				'std'  => 'Photo',
				'type' => 'text',
			),
			array(
				'name' => 'Description',
				'desc' => 'Insert the text',
				'id'   => $prefix . 'template_home_5_gallery_desc',
				'std'  => 'There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour',
				'type' => 'text',
			),
			array(
				'name' => 'Number of posts',
				'desc' => 'Insert the number of posts',
				'id'   => $prefix . 'template_home_5_gallery_num',
				'std'  => '8',
				'type' => 'text',
			),
			array(
				'name' => 'Testimonials',
				'desc' => '',
				'id'   => $prefix . 'template_home_5_testimonials',
				'type' => 'title',
			),
			array(
				'name' => 'Number of posts',
				'desc' => 'Insert the number of posts',
				'id'   => $prefix . 'template_home_5_testimonials_num',
				'std'  => '3',
				'type' => 'text',
			),
		)
	);
	//ndh SE AGREGA TEMPLATE DE WINE TOURS
		$meta_boxes[] = array(
		'id'         => 'post_page_metabox',
		'title'      => 'Post Page Options',
		'pages'      => array( 'page', ), // Post type
		'context'    => 'normal',
		'priority'   => 'high',
		'show_names' => true, // Show field names on the left
		'show_on'    => array( 'key' => 'page-template', 'value' => array('tours-winetours-home.php'), ), // Specific post templates to display this metabox
		'fields' => array(
			array(
				'name' => 'Number of posts',
				'desc' => 'Insert number of posts',
				'id'   => $prefix . 'post_num',
				'std'  => '3',
				'type' => 'text',
			),
		)
	);

	$meta_boxes[] = array(
		'id'         => 'post_page_metabox',
		'title'      => 'Post Page Options',
		'pages'      => array( 'page', ), // Post type
		'context'    => 'normal',
		'priority'   => 'high',
		'show_names' => true, // Show field names on the left
		'show_on'    => array( 'key' => 'page-template', 'value' => array('template-blog-1.php'), ), // Specific post templates to display this metabox
		'fields' => array(
			array(
				'name' => 'Number of posts',
				'desc' => 'Insert number of posts',
				'id'   => $prefix . 'post_num',
				'std'  => '3',
				'type' => 'text',
			),
		)
	);

	$meta_boxes[] = array(
		'id'         => 'post_page_metabox',
		'title'      => 'Post Page Options',
		'pages'      => array( 'page', ), // Post type
		'context'    => 'normal',
		'priority'   => 'high',
		'show_names' => true, // Show field names on the left
		'show_on'    => array( 'key' => 'page-template', 'value' => array('template-blog-2.php'), ), // Specific post templates to display this metabox
		'fields' => array(
			array(
				'name' => 'Number of posts',
				'desc' => 'Insert number of posts',
				'id'   => $prefix . 'post_2_num',
				'std'  => '4',
				'type' => 'text',
			),
		)
	);

	$meta_boxes[] = array(
		'id'         => 'gallery_page_metabox',
		'title'      => 'Gallery Page Options',
		'pages'      => array( 'page', ), // Post type
		'context'    => 'normal',
		'priority'   => 'high',
		'show_names' => true, // Show field names on the left
		'show_on'    => array( 'key' => 'page-template', 'value' => array('template-gallery-1.php'), ), // Specific post templates to display this metabox
		'fields' => array(
			array(
				'name' => 'Number of posts',
				'desc' => 'Insert number of posts',
				'id'   => $prefix . 'gallery_1_num',
				'std'  => '16',
				'type' => 'text',
			),
		)
	);

	$meta_boxes[] = array(
		'id'         => 'gallery_page_metabox',
		'title'      => 'Gallery Page Options',
		'pages'      => array( 'page', ), // Post type
		'context'    => 'normal',
		'priority'   => 'high',
		'show_names' => true, // Show field names on the left
		'show_on'    => array( 'key' => 'page-template', 'value' => array('template-gallery-2.php'), ), // Specific post templates to display this metabox
		'fields' => array(
			array(
				'name' => 'Number of posts',
				'desc' => 'Insert number of posts',
				'id'   => $prefix . 'gallery_2_num',
				'std'  => '10',
				'type' => 'text',
			),
		)
	);

	$meta_boxes[] = array(
		'id'         => 'about_page_metabox',
		'title'      => 'About Page Options',
		'pages'      => array( 'page', ), // Post type
		'context'    => 'normal',
		'priority'   => 'high',
		'show_names' => true, // Show field names on the left
		'show_on'    => array( 'key' => 'page-template', 'value' => array('template-about.php'), ), // Specific post templates to display this metabox
		'fields' => array(
			array(
				'name' => 'Display or hide Boxes on About page',
				'desc' => '',
				'id'   => $prefix . 'display_template_about',
				'type'    => 'title',
			),
			array(
				'name' => 'Show The Video Box?',
				'desc' => 'Select enable to show the Video Box',
				'id'   => $prefix . 'display_template_about_video',
				'std'  => 'Enable',
				'type'    => 'select',
				'options' => array(
					array( 'name' => 'Enable', 'value' => 'on', ),
					array( 'name' => 'Disable', 'value' => 'off', ),
				),
			),
			array(
				'name' => 'Show The Partners Box?',
				'desc' => 'Select enable to show the Partners Box',
				'id'   => $prefix . 'display_template_about_partners',
				'std'  => 'Enable',
				'type'    => 'select',
				'options' => array(
					array( 'name' => 'Enable', 'value' => 'on', ),
					array( 'name' => 'Disable', 'value' => 'off', ),
				),
			),
			array(
				'name' => 'Show The Accordion Box?',
				'desc' => 'Select enable to show the Accordion Box',
				'id'   => $prefix . 'display_template_about_accordion',
				'std'  => 'Enable',
				'type'    => 'select',
				'options' => array(
					array( 'name' => 'Enable', 'value' => 'on', ),
					array( 'name' => 'Disable', 'value' => 'off', ),
				),
			),
			array(
				'name' => 'Video',
				'desc' => '',
				'id'   => $prefix . 'about-video',
				'type' => 'title',
			),
			array(
				'name' => 'Image',
				'desc' => 'Upload a image for the video. Size: 470x223',
				'id'   => $prefix . 'about-video-image',
				'std'  => '',
				'type' => 'file',
			),
			array(
				'name' => 'Video Url',
				'desc' => 'Insert the link',
				'id'   => $prefix . 'about-video-link',
				'std'  => 'https://www.youtube.com/watch?v=reb-aOJrGOY',
				'type' => 'text',
			),
			array(
				'name' => 'Title for the video',
				'desc' => 'Insert the title',
				'id'   => $prefix . 'about-video-title',
				'std'  => 'What is Corallina',
				'type' => 'text',
			),
			array(
				'name' => 'Description for the video',
				'desc' => 'Insert the text',
				'id'   => $prefix . 'about-video-desc',
				'std'  => 'Short video presentation about us',
				'type' => 'text',
			),
			array(
				'name' => 'Title for the text',
				'desc' => 'Insert the title',
				'id'   => $prefix . 'about-video-text-title',
				'std'  => 'Printing and typesetting industry',
				'type' => 'text',
			),
			array(
				'name' => 'Description for the text',
				'desc' => 'Insert the text',
				'id'   => $prefix . 'about-video-text-desc',
				'std'  => 'Lorem Ipsum is simply dummy text of the',
				'type' => 'text',
			),
			array(
				'name' => 'Partners',
				'desc' => '',
				'id'   => $prefix . 'about_partners',
				'type' => 'title',
			),
			array(
				'name' => 'Title',
				'desc' => 'Insert the title',
				'id'   => $prefix . 'about_partners_title',
				'std'  => 'Partners',
				'type' => 'text',
			),
			array(
				'name' => 'Short description',
				'desc' => 'Insert the text',
				'id'   => $prefix . 'about_partners_desc',
				'std'  => 'There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which do\'t look even slig',
				'type' => 'text',
			),
			array(
				'name' => 'No.1 Image',
				'desc' => 'Upload an image. Size:140x101px',
				'id'   => $prefix . 'about_partners_img_1',
				'type' => 'file',
			),
			array(
				'name' => 'No.1 Link',
				'desc' => 'Insert the Url',
				'id'   => $prefix . 'about_partners_link_1',
				'std'  => 'https://www.google.com',
				'type' => 'text',
			),
			array(
				'name' => 'No.2 Image',
				'desc' => 'Upload an image. Size:140x101px',
				'id'   => $prefix . 'about_partners_img_2',
				'type' => 'file',
			),
			array(
				'name' => 'No.2 Link',
				'desc' => 'Insert the Url',
				'id'   => $prefix . 'about_partners_link_2',
				'std'  => 'https://www.google.com',
				'type' => 'text',
			),
			array(
				'name' => 'No.3 Image',
				'desc' => 'Upload an image. Size:140x101px',
				'id'   => $prefix . 'about_partners_img_3',
				'type' => 'file',
			),
			array(
				'name' => 'No.3 Link',
				'desc' => 'Insert the Url',
				'id'   => $prefix . 'about_partners_link_3',
				'std'  => 'https://www.google.com',
				'type' => 'text',
			),
			array(
				'name' => 'No.4 Image',
				'desc' => 'Upload an image. Size:140x101px',
				'id'   => $prefix . 'about_partners_img_4',
				'type' => 'file',
			),
			array(
				'name' => 'No.4 Link',
				'desc' => 'Insert the Url',
				'id'   => $prefix . 'about_partners_link_4',
				'std'  => 'https://www.google.com',
				'type' => 'text',
			),
			array(
				'name' => 'No.5 Image',
				'desc' => 'Upload an image. Size:140x101px',
				'id'   => $prefix . 'about_partners_img_5',
				'type' => 'file',
			),
			array(
				'name' => 'No.5 Link',
				'desc' => 'Insert the Url',
				'id'   => $prefix . 'about_partners_link_5',
				'std'  => 'https://www.google.com',
				'type' => 'text',
			),
			array(
				'name' => 'No.6 Image',
				'desc' => 'Upload an image. Size:140x101px',
				'id'   => $prefix . 'about_partners_img_6',
				'type' => 'file',
			),
			array(
				'name' => 'No.6 Link',
				'desc' => 'Insert the Url',
				'id'   => $prefix . 'about_partners_link_6',
				'std'  => 'https://www.google.com',
				'type' => 'text',
			),
			array(
				'name' => 'Accordion',
				'desc' => '',
				'id'   => $prefix . 'about_accordion',
				'type' => 'title',
			),
			array(
				'name' => 'Left Text',
				'desc' => 'Insert the text',
				'id'   => $prefix . 'about_left_text',
				'std'  => 'There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which dont look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isnt anything embarrassing hidden in the middle of text. All the Lorem Ipsum generators on the Internet tend to repeat predefined chunks as necessary, making this the first true generator on the Internet. It uses a dictionary of over 200 Latin words, combined with a handful of model sentence structures, to generate Lorem Ipsum which looks reasonable. The generated Lorem Ipsum is therefore always free from repetition, injected humour, or non-characteristic words etc. There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which dont look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isnt anything embarrassing hidden in the middle of text. All the Lorem Ipsum generators on the Internet tend to repeat predefined chunks as necessary, making this the first true generator on the Internet. It uses a dictionary of over 200 Latin words, combined with a handful of model sentence structures, to generate Lorem Ipsum which looks reasonable. The generated Lorem Ipsum is therefore always free from repetition, injected humour, or non-characteristic words etc.',
				'type' => 'textarea',
			),
			array(
				'name' => 'Title',
				'desc' => 'Insert the title',
				'id'   => $prefix . 'about_title',
				'std'  => 'Contrary to popular belief, Lorem Ipsum is not simply random text',
				'type' => 'text',
			),
			array(
				'name' => 'Title accordion 1',
				'desc' => 'Insert the title',
				'id'   => $prefix . 'about_ac_tit1',
				'std'  => 'Lorem Ipsum passages, and more recently with desktop',
				'type' => 'text',
			),
			array(
				'name' => 'Description accordion 1',
				'desc' => 'Insert the description',
				'id'   => $prefix . 'about_ac_desc1',
				'std'  => 'There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don\'t look even slightly believable. If you are going to',
				'type' => 'textarea',
			),
			array(
				'name' => 'Title accordion 2',
				'desc' => 'Insert the title',
				'id'   => $prefix . 'about_ac_tit2',
				'std'  => 'There are many variations of passages of Lorem many variations passages',
				'type' => 'text',
			),
			array(
				'name' => 'Description accordion 2',
				'desc' => 'Insert the description',
				'id'   => $prefix . 'about_ac_desc2',
				'std'  => 'There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don\'t look even slightly believable. If you are going to',
				'type' => 'textarea',
			),
			array(
				'name' => 'Title accordion 3',
				'desc' => 'Insert the title',
				'id'   => $prefix . 'about_ac_tit3',
				'std'  => 'Lorem Ipsum passages, and more recently with desktop',
				'type' => 'text',
			),
			array(
				'name' => 'Description accordion 3',
				'desc' => 'Insert the description',
				'id'   => $prefix . 'about_ac_desc3',
				'std'  => 'There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don\'t look even slightly believable. If you are going to',
				'type' => 'textarea',
			),
			array(
				'name' => 'Title accordion 4',
				'desc' => 'Insert the title',
				'id'   => $prefix . 'about_ac_tit4',
				'std'  => 'All the Lorem Ipsum generators on the Internet tend',
				'type' => 'text',
			),
			array(
				'name' => 'Description accordion 4',
				'desc' => 'Insert the description',
				'id'   => $prefix . 'about_ac_desc4',
				'std'  => 'There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don\'t look even slightly believable. If you are going to',
				'type' => 'textarea',
			),
			array(
				'name' => 'Information',
				'desc' => '',
				'id'   => $prefix . 'about_info',
				'type' => 'title',
			),
			array(
				'name' => 'Background image',
				'desc' => 'Upload an image. Size:1920x738px',
				'id'   => $prefix . 'about_info_bg',
				'type' => 'file',
			),
			array(
				'name' => 'No.1 Icon',
				'desc' => 'Select the icon',
				'id'   => $prefix . 'about_info_icon_1',
				'std'  => '',
				'type' => 'select',
				'options' => $font_awesome
			),
			array(
				'name' => 'No.1 Title',
				'desc' => 'Insert the title',
				'id'   => $prefix . 'about_info_title_1',
				'std'  => 'Lorem Ipsum',
				'type' => 'text',
			),
			array(
				'name' => 'No.1 Text',
				'desc' => 'Insert the text',
				'id'   => $prefix . 'about_info_text_1',
				'std'  => 'There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form',
				'type' => 'text',
			),
			array(
				'name' => 'No.2 Icon',
				'desc' => 'Select the icon',
				'id'   => $prefix . 'about_info_icon_2',
				'std'  => '',
				'type' => 'select',
				'options' => $font_awesome
			),
			array(
				'name' => 'No.2 Title',
				'desc' => 'Insert the title',
				'id'   => $prefix . 'about_info_title_2',
				'std'  => 'Lorem Ipsum',
				'type' => 'text',
			),
			array(
				'name' => 'No.2 Text',
				'desc' => 'Insert the text',
				'id'   => $prefix . 'about_info_text_2',
				'std'  => 'There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form',
				'type' => 'text',
			),
			array(
				'name' => 'No.3 Icon',
				'desc' => 'Select the icon',
				'id'   => $prefix . 'about_info_icon_3',
				'std'  => '',
				'type' => 'select',
				'options' => $font_awesome
			),
			array(
				'name' => 'No.3 Title',
				'desc' => 'Insert the title',
				'id'   => $prefix . 'about_info_title_3',
				'std'  => 'Lorem Ipsum',
				'type' => 'text',
			),
			array(
				'name' => 'No.3 Text',
				'desc' => 'Insert the text',
				'id'   => $prefix . 'about_info_text_3',
				'std'  => 'There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form',
				'type' => 'text',
			),
			array(
				'name' => 'No.4 Icon',
				'desc' => 'Select the icon',
				'id'   => $prefix . 'about_info_icon_4',
				'std'  => '',
				'type' => 'select',
				'options' => $font_awesome
			),
			array(
				'name' => 'No.4 Title',
				'desc' => 'Insert the title',
				'id'   => $prefix . 'about_info_title_4',
				'std'  => 'Lorem Ipsum',
				'type' => 'text',
			),
			array(
				'name' => 'No.4 Text',
				'desc' => 'Insert the text',
				'id'   => $prefix . 'about_info_text_4',
				'std'  => 'There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form',
				'type' => 'text',
			),
			array(
				'name' => 'No.5 Icon',
				'desc' => 'Select the icon',
				'id'   => $prefix . 'about_info_icon_5',
				'std'  => '',
				'type' => 'select',
				'options' => $font_awesome
			),
			array(
				'name' => 'No.5 Title',
				'desc' => 'Insert the title',
				'id'   => $prefix . 'about_info_title_5',
				'std'  => 'Lorem Ipsum',
				'type' => 'text',
			),
			array(
				'name' => 'No.5 Text',
				'desc' => 'Insert the text',
				'id'   => $prefix . 'about_info_text_5',
				'std'  => 'There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form',
				'type' => 'text',
			),
			array(
				'name' => 'No.6 Icon',
				'desc' => 'Select the icon',
				'id'   => $prefix . 'about_info_icon_6',
				'std'  => '',
				'type' => 'select',
				'options' => $font_awesome
			),
			array(
				'name' => 'No.6 Title',
				'desc' => 'Insert the title',
				'id'   => $prefix . 'about_info_title_6',
				'std'  => 'Lorem Ipsum',
				'type' => 'text',
			),
			array(
				'name' => 'No.6 Text',
				'desc' => 'Insert the text',
				'id'   => $prefix . 'about_info_text_6',
				'std'  => 'There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form',
				'type' => 'text',
			),
		)
	);

	$meta_boxes[] = array(
		'id'         => 'about_page_metabox',
		'title'      => 'About Page Options',
		'pages'      => array( 'page', ), // Post type
		'context'    => 'normal',
		'priority'   => 'high',
		'show_names' => true, // Show field names on the left
		'show_on'    => array( 'key' => 'page-template', 'value' => array('template-about-1.php'), ), // Specific post templates to display this metabox
		'fields' => array(
			array(
				'name' => 'Display or hide Boxes on About page',
				'desc' => '',
				'id'   => $prefix . 'display_template_about_1',
				'type'    => 'title',
			),
			array(
				'name' => 'Show The About Box?',
				'desc' => 'Select enable to show the About Box',
				'id'   => $prefix . 'display_template_about_1_about',
				'std'  => 'Enable',
				'type'    => 'select',
				'options' => array(
					array( 'name' => 'Enable', 'value' => 'on', ),
					array( 'name' => 'Disable', 'value' => 'off', ),
				),
			),
			array(
				'name' => 'Show The Team Box?',
				'desc' => 'Select enable to show the Team Box',
				'id'   => $prefix . 'display_template_about_1_team',
				'std'  => 'Enable',
				'type'    => 'select',
				'options' => array(
					array( 'name' => 'Enable', 'value' => 'on', ),
					array( 'name' => 'Disable', 'value' => 'off', ),
				),
			),
			array(
				'name' => 'Show The Partners Box?',
				'desc' => 'Select enable to show the Partners Box',
				'id'   => $prefix . 'display_template_about_1_partners',
				'std'  => 'Enable',
				'type'    => 'select',
				'options' => array(
					array( 'name' => 'Enable', 'value' => 'on', ),
					array( 'name' => 'Disable', 'value' => 'off', ),
				),
			),
			array(
				'name' => 'Show The Information Box?',
				'desc' => 'Select enable to show the Information Box',
				'id'   => $prefix . 'display_template_about_1_info',
				'std'  => 'Enable',
				'type'    => 'select',
				'options' => array(
					array( 'name' => 'Enable', 'value' => 'on', ),
					array( 'name' => 'Disable', 'value' => 'off', ),
				),
			),
			array(
				'name' => 'Title ',
				'desc' => 'Insert the title',
				'id'   => $prefix . 'about_1_title',
				'std'  => 'About the Corallina',
				'type' => 'text',
			),
			array(
				'name' => 'Short description',
				'desc' => 'Insert the text',
				'id'   => $prefix . 'about_1_desc',
				'std'  => 'It was a pleasant experience for all. My daughter got some face paint, and my son was too',
				'type' => 'text',
			),
			array(
				'name' => 'Team',
				'desc' => '',
				'id'   => $prefix . 'about_1_team',
				'type' => 'title',
			),
			array(
				'name' => 'Title ',
				'desc' => 'Insert the title',
				'id'   => $prefix . 'about_1_team_title',
				'std'  => 'Meet the team',
				'type' => 'text',
			),
			array(
				'name' => 'Short description',
				'desc' => 'Insert the text',
				'id'   => $prefix . 'about_1_team_desc',
				'std'  => 'There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which do\'t look even slig',
				'type' => 'text',
			),
			array(
				'name' => 'Background Image ',
				'desc' => 'Upload an image. Size:1920x667px',
				'id'   => $prefix . 'about_1_team_bg',
				'type' => 'file',
			),
			array(
				'name' => 'Partners',
				'desc' => '',
				'id'   => $prefix . 'about_1_partners',
				'type' => 'title',
			),
			array(
				'name' => 'Title',
				'desc' => 'Insert the title',
				'id'   => $prefix . 'about_1_partners_title',
				'std'  => 'Our partners',
				'type' => 'text',
			),
			array(
				'name' => 'Short description',
				'desc' => 'Insert the text',
				'id'   => $prefix . 'about_1_partners_desc',
				'std'  => 'There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which do\'t look even slig',
				'type' => 'text',
			),
			array(
				'name' => 'No.1 Image',
				'desc' => 'Upload an image. Size:140x101px',
				'id'   => $prefix . 'about_1_partners_img_1',
				'type' => 'file',
			),
			array(
				'name' => 'No.1 Link',
				'desc' => 'Insert the Url',
				'id'   => $prefix . 'about_1_partners_link_1',
				'std'  => 'https://www.google.com',
				'type' => 'text',
			),
			array(
				'name' => 'No.2 Image',
				'desc' => 'Upload an image. Size:140x101px',
				'id'   => $prefix . 'about_1_partners_img_2',
				'type' => 'file',
			),
			array(
				'name' => 'No.2 Link',
				'desc' => 'Insert the Url',
				'id'   => $prefix . 'about_1_partners_link_2',
				'std'  => 'https://www.google.com',
				'type' => 'text',
			),
			array(
				'name' => 'No.3 Image',
				'desc' => 'Upload an image. Size:140x101px',
				'id'   => $prefix . 'about_1_partners_img_3',
				'type' => 'file',
			),
			array(
				'name' => 'No.3 Link',
				'desc' => 'Insert the Url',
				'id'   => $prefix . 'about_1_partners_link_3',
				'std'  => 'https://www.google.com',
				'type' => 'text',
			),
			array(
				'name' => 'No.4 Image',
				'desc' => 'Upload an image. Size:140x101px',
				'id'   => $prefix . 'about_1_partners_img_4',
				'type' => 'file',
			),
			array(
				'name' => 'No.4 Link',
				'desc' => 'Insert the Url',
				'id'   => $prefix . 'about_1_partners_link_4',
				'std'  => 'https://www.google.com',
				'type' => 'text',
			),
			array(
				'name' => 'No.5 Image',
				'desc' => 'Upload an image. Size:140x101px',
				'id'   => $prefix . 'about_1_partners_img_5',
				'type' => 'file',
			),
			array(
				'name' => 'No.5 Link',
				'desc' => 'Insert the Url',
				'id'   => $prefix . 'about_1_partners_link_5',
				'std'  => 'https://www.google.com',
				'type' => 'text',
			),
			array(
				'name' => 'No.6 Image',
				'desc' => 'Upload an image. Size:140x101px',
				'id'   => $prefix . 'about_1_partners_img_6',
				'type' => 'file',
			),
			array(
				'name' => 'No.6 Link',
				'desc' => 'Insert the Url',
				'id'   => $prefix . 'about_1_partners_link_6',
				'std'  => 'https://www.google.com',
				'type' => 'text',
			),
			array(
				'name' => 'Information',
				'desc' => '',
				'id'   => $prefix . 'about_1_info',
				'type' => 'title',
			),
			array(
				'name' => 'Title',
				'desc' => 'Insert the title',
				'id'   => $prefix . 'about_1_info_title',
				'std'  => 'What we can do',
				'type' => 'text',
			),
			array(
				'name' => 'Short description',
				'desc' => 'Insert the text',
				'id'   => $prefix . 'about_1_info_desc',
				'std'  => 'There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which do\'t look even slig',
				'type' => 'text',
			),
			array(
				'name' => 'Background image',
				'desc' => 'Upload an image. Size:1920x738px',
				'id'   => $prefix . 'about_1_info_bg',
				'type' => 'file',
			),
			array(
				'name' => 'No.1 Icon',
				'desc' => 'Select the icon',
				'id'   => $prefix . 'about_1_info_icon_1',
				'std'  => '',
				'type' => 'select',
				'options' => $font_awesome
			),
			array(
				'name' => 'No.1 Title',
				'desc' => 'Insert the title',
				'id'   => $prefix . 'about_1_info_title_1',
				'std'  => 'Lorem Ipsum',
				'type' => 'text',
			),
			array(
				'name' => 'No.1 Text',
				'desc' => 'Insert the text',
				'id'   => $prefix . 'about_1_info_text_1',
				'std'  => 'There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form',
				'type' => 'text',
			),
			array(
				'name' => 'No.2 Icon',
				'desc' => 'Select the icon',
				'id'   => $prefix . 'about_1_info_icon_2',
				'std'  => '',
				'type' => 'select',
				'options' => $font_awesome
			),
			array(
				'name' => 'No.2 Title',
				'desc' => 'Insert the title',
				'id'   => $prefix . 'about_1_info_title_2',
				'std'  => 'Lorem Ipsum',
				'type' => 'text',
			),
			array(
				'name' => 'No.2 Text',
				'desc' => 'Insert the text',
				'id'   => $prefix . 'about_1_info_text_2',
				'std'  => 'There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form',
				'type' => 'text',
			),
			array(
				'name' => 'No.3 Icon',
				'desc' => 'Select the icon',
				'id'   => $prefix . 'about_1_info_icon_3',
				'std'  => '',
				'type' => 'select',
				'options' => $font_awesome
			),
			array(
				'name' => 'No.3 Title',
				'desc' => 'Insert the title',
				'id'   => $prefix . 'about_1_info_title_3',
				'std'  => 'Lorem Ipsum',
				'type' => 'text',
			),
			array(
				'name' => 'No.3 Text',
				'desc' => 'Insert the text',
				'id'   => $prefix . 'about_1_info_text_3',
				'std'  => 'There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form',
				'type' => 'text',
			),
			array(
				'name' => 'No.4 Icon',
				'desc' => 'Select the icon',
				'id'   => $prefix . 'about_1_info_icon_4',
				'std'  => '',
				'type' => 'select',
				'options' => $font_awesome
			),
			array(
				'name' => 'No.4 Title',
				'desc' => 'Insert the title',
				'id'   => $prefix . 'about_1_info_title_4',
				'std'  => 'Lorem Ipsum',
				'type' => 'text',
			),
			array(
				'name' => 'No.4 Text',
				'desc' => 'Insert the text',
				'id'   => $prefix . 'about_1_info_text_4',
				'std'  => 'There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form',
				'type' => 'text',
			),
			array(
				'name' => 'No.5 Icon',
				'desc' => 'Select the icon',
				'id'   => $prefix . 'about_1_info_icon_5',
				'std'  => '',
				'type' => 'select',
				'options' => $font_awesome
			),
			array(
				'name' => 'No.5 Title',
				'desc' => 'Insert the title',
				'id'   => $prefix . 'about_1_info_title_5',
				'std'  => 'Lorem Ipsum',
				'type' => 'text',
			),
			array(
				'name' => 'No.5 Text',
				'desc' => 'Insert the text',
				'id'   => $prefix . 'about_1_info_text_5',
				'std'  => 'There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form',
				'type' => 'text',
			),
			array(
				'name' => 'No.6 Icon',
				'desc' => 'Select the icon',
				'id'   => $prefix . 'about_1_info_icon_6',
				'std'  => '',
				'type' => 'select',
				'options' => $font_awesome
			),
			array(
				'name' => 'No.6 Title',
				'desc' => 'Insert the title',
				'id'   => $prefix . 'about_1_info_title_6',
				'std'  => 'Lorem Ipsum',
				'type' => 'text',
			),
			array(
				'name' => 'No.6 Text',
				'desc' => 'Insert the text',
				'id'   => $prefix . 'about_1_info_text_6',
				'std'  => 'There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form',
				'type' => 'text',
			),
		)
	);

	$meta_boxes[] = array(
		'id'         => 'about_page_metabox',
		'title'      => 'About Page Options',
		'pages'      => array( 'page', ), // Post type
		'context'    => 'normal',
		'priority'   => 'high',
		'show_names' => true, // Show field names on the left
		'show_on'    => array( 'key' => 'page-template', 'value' => array('template-about-2.php'), ), // Specific post templates to display this metabox
		'fields' => array(
			array(
				'name' => 'Display or hide Boxes on About page',
				'desc' => '',
				'id'   => $prefix . 'display_template_about_2',
				'type'    => 'title',
			),
			array(
				'name' => 'Show The Description Box?',
				'desc' => 'Select enable to show the Description Box',
				'id'   => $prefix . 'display_template_about_2_desc',
				'std'  => 'Enable',
				'type'    => 'select',
				'options' => array(
					array( 'name' => 'Enable', 'value' => 'on', ),
					array( 'name' => 'Disable', 'value' => 'off', ),
				),
			),
			array(
				'name' => 'Show The Team Box?',
				'desc' => 'Select enable to show the Team Box',
				'id'   => $prefix . 'display_template_about_2_team',
				'std'  => 'Enable',
				'type'    => 'select',
				'options' => array(
					array( 'name' => 'Enable', 'value' => 'on', ),
					array( 'name' => 'Disable', 'value' => 'off', ),
				),
			),
			array(
				'name' => 'Show The Information Box?',
				'desc' => 'Select enable to show the Information Box',
				'id'   => $prefix . 'display_template_about_2_info',
				'std'  => 'Enable',
				'type'    => 'select',
				'options' => array(
					array( 'name' => 'Enable', 'value' => 'on', ),
					array( 'name' => 'Disable', 'value' => 'off', ),
				),
			),
			array(
				'name' => 'Show The Testimonials Box?',
				'desc' => 'Select enable to show the Testimonials Box',
				'id'   => $prefix . 'display_template_about_2_testimonials',
				'std'  => 'Enable',
				'type'    => 'select',
				'options' => array(
					array( 'name' => 'Enable', 'value' => 'on', ),
					array( 'name' => 'Disable', 'value' => 'off', ),
				),
			),
			array(
				'name' => 'Description',
				'desc' => '',
				'id'   => $prefix . 'template_about_2_desc',
				'type' => 'title',
			),
			array(
				'name' => 'No.1 Title',
				'desc' => 'Insert the title',
				'id'   => $prefix . 'template_about_2_desc_title_1',
				'std'  => 'We are Corallina',
				'type' => 'text',
			),
			array(
				'name' => 'No.2 Title',
				'desc' => 'Insert the title',
				'id'   => $prefix . 'template_about_2_desc_title_2',
				'std'  => 'touristic agency',
				'type' => 'text',
			),
			array(
				'name' => 'Text',
				'desc' => 'Insert the text',
				'id'   => $prefix . 'template_about_2_desc_text',
				'std'  => 'These cases are perfectly simple and easy to distinguish. In a free hour, when our power of choice is untrammelled and when ',
				'type' => 'text',
			),
			array(
				'name' => 'Background Image',
				'desc' => 'Upload an image. Size:1920x734px',
				'id'   => $prefix . 'template_about_2_desc_image',
				'type' => 'file',
			),
			array(
				'name' => 'Team',
				'desc' => '',
				'id'   => $prefix . 'template_about_2_team',
				'type' => 'title',
			),
			array(
				'name' => 'Title',
				'desc' => 'Insert the title',
				'id'   => $prefix . 'template_about_2_team_title',
				'std'  => 'Our team',
				'type' => 'text',
			),
			array(
				'name' => 'Information',
				'desc' => '',
				'id'   => $prefix . 'template_about_2_info',
				'type' => 'title',
			),
			array(
				'name' => 'Background image',
				'desc' => 'Upload an image. Size:1920x486px',
				'id'   => $prefix . 'template_about_2_info_bg',
				'type' => 'file',
			),
			array(
				'name' => 'No.1 Icon',
				'desc' => 'Select the icon',
				'id'   => $prefix . 'template_about_2_info_icon_1',
				'type' => 'select',
				'options' => $font_awesome
			),
			array(
				'name' => 'No.1 Number',
				'desc' => 'Insert the number',
				'id'   => $prefix . 'template_about_2_info_number_1',
				'std'  => '56',
				'type' => 'text',
			),
			array(
				'name' => 'No.1 Title',
				'desc' => 'Insert the title',
				'id'   => $prefix . 'template_about_2_info_title_1',
				'std'  => 'Cruises',
				'type' => 'text',
			),
			array(
				'name' => 'No.1 Description',
				'desc' => 'Insert the text',
				'id'   => $prefix . 'template_about_2_info_desc_1',
				'std'  => 'Since we start',
				'type' => 'text',
			),
			array(
				'name' => 'No.2 Icon',
				'desc' => 'Select the icon',
				'id'   => $prefix . 'template_about_2_info_icon_2',
				'type' => 'select',
				'options' => $font_awesome
			),
			array(
				'name' => 'No.2 Number',
				'desc' => 'Insert the number',
				'id'   => $prefix . 'template_about_2_info_number_2',
				'std'  => '98',
				'type' => 'text',
			),
			array(
				'name' => 'No.2 Title',
				'desc' => 'Insert the title',
				'id'   => $prefix . 'template_about_2_info_title_2',
				'std'  => 'Fligts',
				'type' => 'text',
			),
			array(
				'name' => 'No.2 Description',
				'desc' => 'Insert the text',
				'id'   => $prefix . 'template_about_2_info_desc_2',
				'std'  => 'Since we start',
				'type' => 'text',
			),
			array(
				'name' => 'No.3 Icon',
				'desc' => 'Select the icon',
				'id'   => $prefix . 'template_about_2_info_icon_3',
				'type' => 'select',
				'options' => $font_awesome
			),
			array(
				'name' => 'No.3 Number',
				'desc' => 'Insert the number',
				'id'   => $prefix . 'template_about_2_info_number_3',
				'std'  => '70',
				'type' => 'text',
			),
			array(
				'name' => 'No.3 Title',
				'desc' => 'Insert the title',
				'id'   => $prefix . 'template_about_2_info_title_3',
				'std'  => 'Bus trips',
				'type' => 'text',
			),
			array(
				'name' => 'No.3 Description',
				'desc' => 'Insert the text',
				'id'   => $prefix . 'template_about_2_info_desc_3',
				'std'  => 'Since we start',
				'type' => 'text',
			),
			array(
				'name' => 'Testimonials',
				'desc' => '',
				'id'   => $prefix . 'template_about_2_testimonials',
				'type' => 'title',
			),
			array(
				'name' => 'Title',
				'desc' => 'Insert the title',
				'id'   => $prefix . 'template_about_2_testimonials_title',
				'std'  => 'Testimonials',
				'type' => 'text',
			),
			array(
				'name' => 'Image',
				'desc' => 'Upload an image. Size:352x352px',
				'id'   => $prefix . 'template_about_2_testimonials_image',
				'type' => 'file',
			),
		)
	);

	$meta_boxes[] = array(
		'id'         => 'testimonial_page_metabox',
		'title'      => 'Testimonial Page Options',
		'pages'      => array( 'testimonial', ), // Post type
		'context'    => 'normal',
		'priority'   => 'high',
		'show_names' => true, // Show field names on the left
		'fields' => array(
			array(
				'name' => 'Short Description',
				'desc' => 'Insert the text',
				'id'   => $prefix . 'test_desc',
				'type' => 'text',
			),
			array(
				'name' => 'Rating',
				'desc' => 'Enter a rating of up to 100 (Ex.: 65)',
				'id'   => $prefix . 'test_rating',
				'type' => 'text',
			),
			array(
				'name' => 'City',
				'desc' => 'Please enter the city name (Ex.: Rome)',
				'id'   => $prefix . 'test_city',
				'type' => 'text',
			),
			array(
				'name' => 'Show The Testimonial on Template Home 3 and Template About 2?',
				'desc' => 'Select enable to show the Testimonial on Template Home 3 and Template About 2',
				'id'   => $prefix . 'test_home_3',
				'std'  => 'Enable',
				'type'    => 'select',
				'options' => array(
					array( 'name' => 'Disable', 'value' => 'off', ),
					array( 'name' => 'Enable', 'value' => 'on', ),
				),
			),
			array(
				'name' => 'Show The Testimonial in tour post?',
				'desc' => 'Select enable to show the Testimonial in tour post',
				'id'   => $prefix . 'test_in_tour',
				'std'  => 'Enable',
				'type'    => 'select',
				'options' => $tour_list
			),
		)
	);

	$meta_boxes[] = array(
		'id'         => 'gallery_page_metabox',
		'title'      => 'Gallery Page Options',
		'pages'      => array( 'gallery', ), // Post type
		'context'    => 'normal',
		'priority'   => 'high',
		'show_names' => true, // Show field names on the left
		'fields' => array(
			array(
				'name' => 'Name of the country',
				'desc' => 'Gallery of what country? (Ex.: Spain)',
				'id'   => $prefix . 'gal_country',
				'type' => 'text',
			),
			array(
				'name' => 'Short description',
				'desc' => 'Insert the text',
				'id'   => $prefix . 'gallery-description',
				'type' => 'text',
			),
			array(
				'name' => 'Show this post in slider?',
				'desc' => 'Select enable to show this post on other pages in slider',
				'id'   => $prefix . 'gallery-slider',
				'std'  => 'Disable',
				'type'    => 'select',
				'options' => array(
					array( 'name' => 'Disable', 'value' => 'off', ),
					array( 'name' => 'Enable', 'value' => 'on', ),
				),
			),
		)
	);

	$meta_boxes[] = array(
		'id'         => 'hot_deals_page_metabox',
		'title'      => 'Hot Deals Page Options',
		'pages'      => array( 'hot_deals', ), // Post type
		'context'    => 'normal',
		'priority'   => 'high',
		'show_names' => true, // Show field names on the left
		'fields' => array(
			array(
				'name' => 'Address',
				'desc' => 'Insert the count of rooms',
				'id'   => $prefix . 'hd_type_address',
				'std'  => '',
				'type'    => 'text'
			),
			array(
				'name' => 'Texto Complemento',
				'desc' => 'Enter the price of tickets to the dollar ( Ex.: 250 ).',
				'id'   => $prefix . 'hd_txtcomplemento',
				'type' => 'text',
			),
			array(
				'name' => 'Price of tours',
				'desc' => 'Enter the price of tickets to the dollar ( Ex.: 250 ).',
				'id'   => $prefix . 'hd_price',
				'type' => 'text',
			),
			array(
				'name' => 'Days tours',
				'desc' => 'Enter the number of days, how long will last offer ( Ex.: 14 ).',
				'id'   => $prefix . 'hd_days',
				'type' => 'text',
			),
			array(
				'name' => 'Check in date',
				'desc' => 'Enter the date. Example: 02/02/2015',
				'id'   => $prefix . 'hd_check_in_date',
				'type' => 'text',
			),
			array(
				'name' => 'Check out date',
				'desc' => 'Enter the date. Example: 02/05/2015',
				'id'   => $prefix . 'hd_check_out_date',
				'type' => 'text',
			),
			array(
				'name' => 'Type of transport',
				'desc' => 'Choose means of transportation.',
				'id'   => $prefix . 'hd_transport',
				'std'  => '',
				'type'    => 'select',
				'options' => array(
					array( 'name' => 'Bus', 'value' => 'bus', ),
					array( 'name' => 'Plane', 'value' => 'plane', ),
					array( 'name' => 'Ship', 'value' => 'ship', ),
				),
			),
			array(
				'name' => 'Rating',
				'desc' => 'Select th rating of the tour.',
				'id'   => $prefix . 'hd_rating',
				'std'  => '',
				'type'    => 'select',
				'options' => array(
					array( 'name' => '0', 'value' => '0', ),
					array( 'name' => '1', 'value' => '1', ),
					array( 'name' => '2', 'value' => '2', ),
					array( 'name' => '3', 'value' => '3', ),
					array( 'name' => '4', 'value' => '4', ),
					array( 'name' => '5', 'value' => '5', ),
				),
			),
			array(
				'name' => 'Nuestra Flota',
				'desc' => 'Editar Nuestra Flota',
				'id'   => $prefix . 'hd_type_flight_details',
				'std'  => '',
				'type'    => 'wysiwyg'
			),
			array(
				'name' => 'Type of offer',
				'desc' => 'Select the type of offer.',
				'id'   => $prefix . 'hd_type_offer',
				'std'  => '',
				'type'    => 'select',
				'options' => array(
					array( 'name' => 'Most recent', 'value' => 'most_recent', ),
					array( 'name' => 'Hot deals', 'value' => 'hot_deals', ),
					array( 'name' => 'Top deals', 'value' => 'top_deals', ),
					array( 'name' => 'Interesting actions', 'value' => 'interesting_actions', ),
				),
			),
			array(
				'name' => 'Show in slider on home page?',
				'desc' => 'Select enable to show this post in slider.',
				'id'   => $prefix . 'hot_deals_slider',
				'std'  => 'Desable',
				'type'    => 'select',
				'options' => array(
					array( 'name' => 'Desable', 'value' => 'desable', ),
					array( 'name' => 'Enable', 'value' => 'enable', ),
				),
			),
		)
	);

	$meta_boxes[] = array(
		'id'         => 'team_page_metabox',
		'title'      => 'Team Page Options',
		'pages'      => array( 'team', ), // Post type
		'context'    => 'normal',
		'priority'   => 'high',
		'show_names' => true, // Show field names on the left
		'fields' => array(
			array(
				'name' => 'Post',
				'desc' => 'Insert the post',
				'id'   => $prefix . 'team_post',
				'type' => 'text',
			),
			array(
				'name' => 'Short description',
				'desc' => 'Insert the text',
				'id'   => $prefix . 'team_desc',
				'type' => 'text',
			),
			array(
				'name' => 'Show on home page?',
				'desc' => 'Select enable to show the Team box',
				'id'   => $prefix . 'team_show_on_home',
				'std'  => 'Disable',
				'type'    => 'select',
				'options' => array(
					array( 'name' => 'Disable', 'value' => 'off', ),
					array( 'name' => 'Enable', 'value' => 'on', ),
				),
			),
			array(
				'name' => 'Show on Archive page?',
				'desc' => 'Select enable to show the Team box',
				'id'   => $prefix . 'team_show_on_archive',
				'std'  => 'Disable',
				'type'    => 'select',
				'options' => array(
					array( 'name' => 'Disable', 'value' => 'off', ),
					array( 'name' => 'Enable', 'value' => 'on', ),
				),
			),
			array(
				'name' => 'Social',
				'desc' => '',
				'id'   => $prefix . 'team_social',
				'type' => 'title',
			),
			array(
				'name' => 'Twitter',
				'desc' => 'Insert the url',
				'id'   => $prefix . 'team_social_twi',
				'std'  => 'https://twitter.com',
				'type' => 'text',
			),
			array(
				'name' => 'Facebook',
				'desc' => 'Insert the url',
				'id'   => $prefix . 'team_social_fb',
				'std'  => 'https://www.facebook.com',
				'type' => 'text',
			),
			array(
				'name' => 'Pinterest',
				'desc' => 'Insert the url',
				'id'   => $prefix . 'team_social_pin',
				'std'  => 'https://www.pinterest.com/',
				'type' => 'text',
			),
		)
	);

	$meta_boxes[] = array(
		'id'         => 'tour_page_metabox',
		'title'      => 'Tour Deals Page Options',
		'pages'      => array( 'tour', ), // Post type
		'context'    => 'normal',
		'priority'   => 'high',
		'show_names' => true, // Show field names on the left
		'fields' => array(
			array(
				'name' => 'Short description',
				'desc' => 'Insert the text',
				'id'   => $prefix . 'tour_desc',
				'type' => 'text',
			),
			array(
				'name' => 'Address',
				'desc' => 'Insert the address',
				'id'   => $prefix . 'tour_address',
				'type' => 'text',
			),
			array(
				'name' => 'Type',
				'desc' => 'Insert the type of tour',
				'id'   => $prefix . 'tour_type',
				'type' => 'text',
			),
			array(
				'name' => 'Icon',
				'desc' => 'Select the icon',
				'id'   => $prefix . 'tour_icon',
				'std'  => 'Enable',
				'type'    => 'select',
				'options' => $font_awesome
			),
			array(
				'name' => 'Show This post on home page 4?',
				'desc' => 'Select enable to show this post on home page 4',
				'id'   => $prefix . 'tour_home_4',
				'std'  => 'Enable',
				'type'    => 'select',
				'options' => array(
					array( 'name' => 'Disable', 'value' => 'off', ),
					array( 'name' => 'Enable', 'value' => 'on', ),
				),
			),
		)
	);


	return $meta_boxes;
}

/**
 * Get image sizes for images
 * 
 * @return array
 */
function aletheme_get_images_sizes() {
	return array(

		'gallery' => array(
			array(
				'name'      => 'gallery-home-slide1',
				'width'     => 176,
				'height'    => 286,
				'crop'      => true,
			),
			array(
				'name'      => 'gallery-home-slide2',
				'width'     => 176,
				'height'    => 232,
				'crop'      => true,
			),
			array(
				'name'      => 'gallery-home-slide3',
				'width'     => 176,
				'height'    => 180,
				'crop'      => true,
			),
			array(
				'name'      => 'gallery-home',
				'width'     => 1920,
				'height'    => 630,
				'crop'      => true,
			),
			array(
				'name'      => 'gallery-home21',
				'width'     => 295,
				'height'    => 295,
				'crop'      => true,
			),
			array(
				'name'      => 'gallery-home22',
				'width'     => 412,
				'height'    => 295,
				'crop'      => true,
			),
			array(
				'name'      => 'gallery-home-5',
				'width'     => 225,
				'height'    => 204,
				'crop'      => true,
			),
			array(
				'name'      => 'gallery-2-1',
				'width'     => 254,
				'height'    => 335,
				'crop'      => true,
			),
			array(
				'name'      => 'gallery-2-2',
				'width'     => 446,
				'height'    => 669,
				'crop'      => true,
			),
			array(
				'name'      => 'gallery-arhive-1',
				'width'     => 176,
				'height'    => 250,
				'crop'      => true,
			),
			array(
				'name'      => 'gallery-arhive-2',
				'width'     => 176,
				'height'    => 232,
				'crop'      => true,
			),
			array(
				'name'      => 'gallery-arhive-3',
				'width'     => 176,
				'height'    => 179,
				'crop'      => true,
			),
			array(
				'name'      => 'gallery-single',
				'width'     => 675,
				'height'    => 261,
				'crop'      => true,
			),
		),
		'post' => array(
			array(
				'name'      => 'post-list-thumba',
				'width'     => 675,
				'height'    => 261,
				'crop'      => true,
			),
			array(
				'name'      => 'post-blog-1',
				'width'     => 675,
				'height'    => 338,
				'crop'      => true,
			),
			array(
				'name'      => 'post-home-3',
				'width'     => 960,
				'height'    => 434,
				'crop'      => true,
			),
			array(
				'name'      => 'post-blog-2',
				'width'     => 356,
				'height'    => 345,
				'crop'      => true,
			),
		),
		'tour' => array(
			array(
				'name'      => 'tour-list-thumba',
				'width'     => 959,
				'height'    => 470,
				'crop'      => true,
			),
			array(
				'name'      => 'tour-item-thumba',
				'width'     => 675,
				'height'    => 261,
				'crop'      => true,
			),
			array(
				'name'      => 'tour-home-3',
				'width'     => 318,
				'height'    => 318,
				'crop'      => true,
			),
			array(
				'name'      => 'tour-home4',
				'width'     => 347,
				'height'    => 369,
				'crop'      => true,
			),
			array(
				'name'      => 'tour-single',
				'width'     => 675,
				'height'    => 261,
				'crop'      => true,
			),
		),
		'page' => array(
			array(
				'name'      => 'page-thumba',
				'width'     => 675,
				'height'    => 261,
				'crop'      => true,
			),
			array(
				'name'      => 'page-about-thumba',
				'width'     => 470,
				'height'    => 151,
				'crop'      => true,
			),
			array(
				'name'      => 'page-about-1-1',
				'width'     => 307,
				'height'    => 397,
				'crop'      => true,
			),
			array(
				'name'      => 'page-about-1-2',
				'width'     => 97,
				'height'    => 97,
				'crop'      => true,
			),
		),
		'testimonial' => array(
			array(
				'name'      => 'testimonial-item-thumba',
				'width'     => 116,
				'height'    => 114,
				'crop'      => true,
			),
			array(
				'name'      => 'testimonial-home-thumba',
				'width'     => 220,
				'height'    => 217,
				'crop'      => true,
			),
			array(
				'name'      => 'testimonial-home-2-thumba',
				'width'     => 97,
				'height'    => 97,
				'crop'      => true,
			),
			array(
				'name'      => 'testimonial-home-5-1',
				'width'     => 307,
				'height'    => 397,
				'crop'      => true,
			),
			array(
				'name'      => 'testimonial-single',
				'width'     => 675,
				'height'    => 261,
				'crop'      => true,
			),
		),
		'hot_deals' => array(
			array(
				'name'      => 'hot_deals-home',
				'width'     => 225,
				'height'    => 144,
				'crop'      => true,
			),
			array(
				'name'      => 'hot_deals-home-big',
				'width'     => 470,
				'height'    => 352,
				'crop'      => true,
			),
			array(
				'name'      => 'hot_deals-item-thumba',
				'width'     => 675,
				'height'    => 261,
				'crop'      => true,
			),
			array(
				'name'      => 'hot_deals-home-1',
				'width'     => 472,
				'height'    => 370,
				'crop'      => true,
			),
			array(
				'name'      => 'hot_deals-home-2-1',
				'width'     => 510,
				'height'    => 510,
				'crop'      => true,
			),
			array(
				'name'      => 'hot_deals-home-2-2',
				'width'     => 255,
				'height'    => 335,
				'crop'      => true,
			),
			array(
				'name'      => 'hot_deals-home-3',
				'width'     => 640,
				'height'    => 410,
				'crop'      => true,
			),
			array(
				'name'      => 'hot_deals-home-5-1',
				'width'     => 384,
				'height'    => 335,
				'crop'      => true,
			),
			array(
				'name'      => 'hot_deals-home-5-2',
				'width'     => 384,
				'height'    => 670,
				'crop'      => true,
			),
			array(
				'name'      => 'hot_deals-home-5-3',
				'width'     => 768,
				'height'    => 335,
				'crop'      => true,
			),
			array(
				'name'      => 'hot_deals-home-5-4',
				'width'     => 768,
				'height'    => 670,
				'crop'      => true,
			),
			array(
				'name'      => 'hot_deals-single',
				'width'     => 920,
				'height'    => 355,
				'crop'      => true,
			),
			array(
				'name'      => 'hot_deals-single_small',
				'width'     => 155,
				'height'    => 96,
				'crop'      => true,
			),
		),
		'team' => array(
			array(
				'name'      => 'team-mini',
				'width'     => 248,
				'height'    => 248,
				'crop'      => true,
			),
			array(
				'name'      => 'team-about-1',
				'width'     => 222,
				'height'    => 276,
				'crop'      => true,
			),
			array(
				'name'      => 'team-about-2',
				'width'     => 302,
				'height'    => 318,
				'crop'      => true,
			),
			array(
				'name'      => 'team-arhive',
				'width'     => 335,
				'height'    => 397,
				'crop'      => true,
			),
			array(
				'name'      => 'team-single',
				'width'     => 675,
				'height'    => 261,
				'crop'      => true,
			),
		),
		'product' => array(
			array(
				'name'      => 'product-thumba',
				'width'     => 324,
				'height'    => 468,
				'crop'      => true,
			),
		),
	);
}

/**
 * Add post types that are used in the theme 
 * 
 * @return array
 */
function aletheme_get_post_types() {
	return array(
		'tour' => array(
			'config' => array(
				'public' => true,
				'menu_position' => 20,
				'has_archive'   => true,
				'supports'=> array(
					'title',
					'editor',
					'thumbnail',
					'comments',
				),
				'show_in_nav_menus'=> true,
			),
			'singular' => 'Tour',
			'multiple' => 'Tour',
			'columns'    => array(
				'first_image',
			)
		),
		'hot_deals' => array(
			'config' => array(
				'public' => true,
				'menu_position' => 20,
				'has_archive'   => true,
				'supports'=> array(
					'title',
					'editor',
					'thumbnail',
					'comments',
				),
				'show_in_nav_menus'=> true,
			),
			'singular' => 'Tour',
			'multiple' => 'Tour admin',
			'columns'    => array(
				'first_image',
			)
		),
		'testimonial' => array(
			'config' => array(
				'public' => true,
				'menu_position' => 20,
				'has_archive'   => true,
				'supports'=> array(
					'title',
					'thumbnail',
					'editor',
					'comments',
				),
				'show_in_nav_menus'=> true,
			),
			'singular' => 'Testimonial',
			'multiple' => 'Testimonials',
			'columns'    => array(
				'first_image',
			)
		),
		'gallery' => array(
			'config' => array(
				'public' => true,
				'menu_position' => 20,
				'has_archive'   => true,
				'supports'=> array(
					'title',
					'editor',
					'thumbnail',
					'comments',
				),
				'show_in_nav_menus'=> true,
			),
			'singular' => 'Gallery',
			'multiple' => 'Galleries',
			'columns'    => array(
				'first_image',
			)
		),
		'team' => array(
			'config' => array(
				'public' => true,
				'menu_position' => 20,
				'has_archive'   => true,
				'supports'=> array(
					'title',
					'editor',
					'thumbnail',
					'comments',
				),
				'show_in_nav_menus'=> true,
			),
			'singular' => 'Team',
			'multiple' => 'Team',
			'columns'    => array(
				'first_image',
			)
		),
	);
}

/**
 * Add taxonomies that are used in theme
 * 
 * @return array
 */
function aletheme_get_taxonomies() {
	return array(
		'hot_deals-category'    => array(
			'for'        => array('hot_deals'),
			'config'    => array(
				'sort'        => true,
				'args'        => array('orderby' => 'term_order'),
				'hierarchical' => true,
			),
			'singular'    => 'Tour General',
			'multiple'    => 'Tour General',
		),
		'rooms-category'    => array(
			'for'        => array('hot_deals'),
			'config'    => array(
				'sort'        => true,
				'args'        => array('orderby' => 'term_order'),
				'hierarchical' => true,
			),
			'singular'    => 'Rooms',
			'multiple'    => 'Rooms',
		),
		'baths-category'    => array(
			'for'        => array('hot_deals'),
			'config'    => array(
				'sort'        => true,
				'args'        => array('orderby' => 'term_order'),
				'hierarchical' => true,
			),
			'singular'    => 'Baths',
			'multiple'    => 'Baths',
		),
	);
}

/**
 * Add post formats that are used in theme
 * 
 * @return array
 */
function aletheme_get_post_formats() {
	return array();
}

/**
 * Get sidebars list
 * 
 * @return array
 */
function aletheme_get_sidebars() {
	$sidebars = array();
	return $sidebars;
}

/**
 * Predefine custom sliders
 * @return array
 */
function aletheme_get_sliders() {
	return array(
		'sneak-peek' => array(
			'title'		=> 'Sneak Peek',
		),
	);
}

/**
 * Post types where metaboxes should show
 * 
 * @return array
 */
function aletheme_get_post_types_with_gallery() {
	return array('gallery','hot_deals', 'testimonial', 'team', 'page','post');
}

/**
 * Add custom fields for media attachments
 * @return array
 */
function aletheme_media_custom_fields() {
	return array();
}