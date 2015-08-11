<?php
if(isset($_COOKIE["background"])) {
	$ale_bg_image = $_COOKIE["background"];
} else{
	$ale_bg_image = ale_get_option('background');
}
if(isset($_COOKIE["maincolor"])) {
	$ale_maincolor = $_COOKIE["maincolor"];
} else{
	$ale_maincolor = ale_get_option('maincolor');
}
if(isset($_COOKIE["secondarycolor"])) {
	$ale_secondarycolor = $_COOKIE["secondarycolor"];
} else{
	$ale_secondarycolor = ale_get_option('secondarycolor');
}
if(isset($_COOKIE["tertiarycolor"])) {
	$ale_tertiarycolor = $_COOKIE["tertiarycolor"];
} else{
	$ale_tertiarycolor = ale_get_option('tertiarycolor');
}
$ale_background = ale_get_option('background');
$ale_headerfont = ale_get_option('headerfont');
$ale_mainfont = ale_get_option('mainfont');
$ale_thirdfont = ale_get_option('thirdfont');
$ale_fourthfont = ale_get_option('fourthfont');
$ale_font = ale_get_option('bodystyle');
$ale_h1 = ale_get_option('h1sty');
$ale_h2 = ale_get_option('h2sty');
$ale_h3 = ale_get_option('h3sty');
$ale_h4 = ale_get_option('h4sty');
$ale_h5 = ale_get_option('h5sty');
$ale_h6 = ale_get_option('h6sty');
?>
<?php
	if(ale_get_option('headerfontex')){ $headerfontex = ":".esc_attr(ale_get_option('headerfontex')); } else {$headerfontex =""; }
	if(ale_get_option('mainfontex')){ $mainfontex = ":".esc_attr(ale_get_option('mainfontex')); } else {$mainfontex = "";}
	if(ale_get_option('thirdfontex')){ $thirdfontex = ":".esc_attr(ale_get_option('thirdfontex')); } else {$thirdfontex = "";}
	if(ale_get_option('fourthfontex')){ $fourthfontex = ":".esc_attr(ale_get_option('fourthfontex')); } else {$fourthfontex = "";}
	//if(ale_get_option('headerfont')){ echo "<link href='http://fonts.googleapis.com/css?family=".ale_get_option('headerfont').$headerfontex."' rel='stylesheet' type='text/css'>"; }
	if(ale_get_option('mainfont')){ echo "<link href='http://fonts.googleapis.com/css?family=".ale_get_option('mainfont').$mainfontex."' rel='stylesheet' type='text/css'>"; }
	if(ale_get_option('thirdfont')){ echo "<link href='http://fonts.googleapis.com/css?family=".ale_get_option('thirdfont').$thirdfontex."' rel='stylesheet' type='text/css'>"; }
	if(ale_get_option('fourthfont')){ echo "<link href='http://fonts.googleapis.com/css?family=".ale_get_option('fourthfont').$fourthfontex."' rel='stylesheet' type='text/css'>"; }
?>
<style type='text/css'>
	body {
		<?php
		if($ale_font['size']){ echo "font-size:".$ale_font['size'].";"; };
		if($ale_font['style']){ echo "font-style:".$ale_font['style'].";"; };
		if($ale_font['color']){ echo "color:".$ale_font['color'].";"; };
		if($ale_font['face']){ $fontfamily =  str_replace ('+',' ',$ale_font['face']); echo "font-family:".$fontfamily.";"; };
		if($ale_background['color']){ echo "background-color:".$ale_background['color'].";"; }
		if($ale_background['image']){ echo "background-image: url(".$ale_background['image'].");"; }
		if($ale_background['repeat']){ echo "background-repeat:".$ale_background['repeat'].";"; }
		if($ale_background['position']){ echo "background-position:".$ale_background['position'].";"; }
		if($ale_background['attachment']){ echo "background-attachment:".$ale_background['attachment'].";"; }
		?>
	}
	h1 {
		<?php
		if($ale_h1['size']){ echo "font-size:".$ale_h1['size'].";"; };
		if($ale_h1['style']){ echo "font-style:".$ale_h1['style'].";"; };
		if($ale_h1['color']){ echo "color:".$ale_h1['color'].";"; };
		if($ale_h1['face']){ $h1family =  str_replace ('+',' ',$ale_h1['face']); echo "font-family:".$h1family.";"; };
		?>
	}
	h2 {
		<?php
		if($ale_h2['size']){ echo "font-size:".$ale_h2['size'].";"; };
		if($ale_h2['style']){ echo "font-style:".$ale_h2['style'].";"; };
		if($ale_h2['color']){ echo "color:".$ale_h2['color'].";"; };
		if($ale_h2['face']){ $h2family =  str_replace ('+',' ',$ale_h2['face']); echo "font-family:".$h2family.";"; };
		?>
	}
	h3 {
		<?php
		if($ale_h3['size']){ echo "font-size:".$ale_h3['size'].";"; };
		if($ale_h3['style']){ echo "font-style:".$ale_h3['style'].";"; };
		if($ale_h3['color']){ echo "color:".$ale_h3['color'].";"; };
		if($ale_h3['face']){ $h3family =  str_replace ('+',' ',$ale_h3['face']); echo "font-family:".$h3family.";"; };
		?>
	}
	h4 {
		<?php
		if($ale_h4['size']){ echo "font-size:".$ale_h4['size'].";"; };
		if($ale_h4['style']){ echo "font-style:".$ale_h4['style'].";"; };
		if($ale_h4['color']){ echo "color:".$ale_h4['color'].";"; };
		if($ale_h4['face']){ $h4family =  str_replace ('+',' ',$ale_h4['face']); echo "font-family:".$h4family.";"; };
		?>
	}
	h5 {
		<?php
		if($ale_h5['size']){ echo "font-size:".$ale_h5['size'].";"; };
		if($ale_h5['style']){ echo "font-style:".$ale_h5['style'].";"; };
		if($ale_h5['color']){ echo "color:".$ale_h5['color'].";"; };
		if($ale_h5['face']){ $h5family =  str_replace ('+',' ',$ale_h5['face']); echo "font-family:".$h5family.";"; };
		?>
	}
	h6 {
		<?php
		if($ale_h6['size']){ echo "font-size:".$ale_h6['size'].";"; };
		if($ale_h6['style']){ echo "font-style:".$ale_h6['style'].";"; };
		if($ale_h6['color']){ echo "color:".$ale_h6['color'].";"; };
		if($ale_h6['face']){ $h6family =  str_replace ('+',' ',$ale_h6['face']); echo "font-family:".$h6family.";"; };
		?>
	}

	/* Main Font "Arial" */
	body, .vid-desc p, .rev-block span, .r-t-head .name, .r-t-head .rating {
		<?php if($ale_headerfont){ $headerfontname =  str_replace ('+',' ',$ale_headerfont); echo "font-family:".$headerfontname.";"; } ?>
	}

	/* Header Font "Open Sans" */
	.caption p, .btn-nav-toggle, .hot-d-cap .offer, .hot-d-cap h3, .block-text-bottom span.price, .block-text-bottom span.date, .rev-block p, .f-text p, .f-text .f-title,
	.t-d p, .r-t-text p, .pagination ul > li a, .com-form input, .com-form textarea, .c-form-w input, .c-form-w textarea, .c-form-footer input, .c-form-footer textarea,
	.home-slider-box .slider .slides li .text h3,.home-review .slider .slides li .item .text .string, .button-offer,
	.template-home-1-hot-deals .slider li article .col-7 h2,.template-home-1-hot-deals .slider .slides li article .col-7 .details .price,
	.template-home-1-hot-deals .slider .slides li article .col-7 .details .date,.template-home-1-description h2,
	.template-home-1-info article h2,.template-home-1-info article p,.template-home-1-team .slider .slides li article .text .top span,
	.template-home-1-team .slider .slides li article .text .top h3,.template-home-1-team .slider .slides li article .text .description,
	.template-home-1-team .slider .slides li article .text .string,.template-home-1-title h2,.template-home-1-tour .top .inner-block h2,
	.template-home-1-tour .top .inner-block p,.search-home-1 h2,.search-home-1 h3,.search-home-1 form input[type="search"],
	.search-home-1 form .form-button input[type="submit"],.template-home-2-rewiews .testimonials-posts .slides li article h3,
	.template-home-2-rewiews .testimonials-posts .slides li article .string,.template-home-2-faq .accordion h3,
	.template-home-2-faq .accordion .text p,.template-home-2-info .item p,.template-home-2-gallery .wrapper .text p,
	.template-home-2-partners .wrapper p,.template-home-3-info article h3,.template-home-3-info article p,
	.template-home-3-testimonials article h3,.template-home-3-testimonials article .string,
	.template-home-3-testimonials article .details span,.template-home-3-desc h3,.template-home-4-slider .slider .slides li .text h2,
	.template-home-4-slider .slider .slides li .text h3,.special-offer,.template-home-4-info .wrapper .col-4 form h4,
	.template-home-4-info .wrapper .col-4 form h5,.template-home-4-blog .wrapper .text .address,
	.template-home-4-single-tour .wrapper .article .text-bg,.template-home-4-tour .slider .slides li article .text .type,.mc4wp-form label,
	.template-home-4-suscribe .form .subscribe-form input[type="submit"],.template-home-5-hot-deals .grid-item form .top h4,
	.template-home-5-hot-deals .grid-item form .top h5,.template-home-5-tours .slider .slides li article .text .details .price,
	.template-home-5-tours .slider .slides li article .text .details .date,.template-home-5-tours .titles h2,
	.template-home-5-info .wrapper h3,.template-nome-5-testimonials .text .text-block h4,.template-nome-5-testimonials .text .text-block .string,
	.template-blog-2 .blog-items article .text h2,.template-blog-2 .blog-items article .text .string,
	.template-about-1-post .text h3,.template-about-1-post .text .string,.template-about-1-team .items article h3,
	.template-about-1-info .items article h3,.template-about-1-info .items article p,.template-about-2-team .items article .team-post,
	.template-about-2-team .items article h3,.template-about-2-team .items article .string,.team-archive-top-post article .text h2,
	.team-archive-top-post article .text .string,.team-archive-top-post article .text h3,.team-archive-posts .items article .text h3,
	.team-archive-posts .items article .text .string,.blog-comments .form input,.blog-comments .form textarea,
	.single-hot_deals .tabs .item .details .price,.single-hot_deals .tabs .item .details .date,
	.woocommerce ul.products li.product h3,.template-home-4-weather .now-weather span {
		<?php if($ale_mainfont){ $mainfontname =  str_replace ('+',' ',$ale_mainfont); echo "font-family:".$mainfontname.",sans-serif;"; } ?>
	}

	/* Header Font "Open Sans Condensed" */
	.caption p span, .vid-text h3, .gallery_title, .flexgallery .carousel-caption p, .review-wrap h3, .o-blog h3, .column-s h3, .column-t h3, .column-l h3, .partner-h h3,
	.atw h3, .content-title, .t-d h2, .gal-title h4, .blog-title h1, .elements h3, .post-title h2, .post-title a, ol.numbered li:before, .com-wrap h3, .com-form h3,
	.widget h3, .r-post a h4, .c-form-w h3, .c-form-footer h3,.home-slider-box .slider .slides li .text h2,.home-video .text-box h3,.home-video .text-box h2,
	.home-gallery .slider .slides li h3,.home-gallery h2,.home-review .title h2,.template-home-1-description h3,
	.template-home-1-team h2,.template-home-1-title h2 span,.template-home-2-blog h2,.template-home-2-rewiews h2,.template-home-2-faq h2,
	.template-home-2-gallery .wrapper .title h3,.template-home-2-gallery .wrapper .title h2,
	.template-home-3-tours .slider .slides li article .text h2,.template-home-3-desc h2,.template-home-4-info .wrapper .col-8 h2,
	.template-home-4-info .wrapper .col-8 h3,.template-home-4-blog .wrapper .text h2,.template-home-4-tour .slider .slides li article .text h2,
	.template-home-5-tours .titles h3,.template-home-5-info .wrapper h2,.template-nome-5-gallery .top h2,.content-title,
	.sidebar .widget .caption,.template-blog-1 .blog-items article .text h2 a,.template-about-1-team .top h2,
	.template-about-1-partners .top h2,.template-about-1-info .top h2,.template-about-2-team h2,.team-archive-posts h2,.tour-archive .items .text h2,
	.about-accordion h2,.template-about-partners .top h2,.template-contact .c-form-w h3, .c-form-footer h3,.single-page .top h2,.blog-comments h3,.blog-comments h4,
	.template-home-4-weather .now-weather .c-now-weather,.tribe-events-meta-group .tribe-events-single-section-title {
		<?php if($ale_thirdfont){ $thirdfontname =  str_replace ('+',' ',$ale_thirdfont); echo "font-family:".$thirdfontname.",sans-serif;"; } ?>
	}

	/* Header Font "PT Serif" */
	.flexgallery .carousel-caption span, .gal-title p,.home-gallery .slider .slides li p,.gallery-archive .grid-item .text span {
		<?php if($ale_fourthfont){ $fourthfontname =  str_replace ('+',' ',$ale_fourthfont); echo "font-family:".$fourthfontname.";"; } ?>
	}

	/**
	**COLORS
	**/
	/*Background*/
	<?php if(isset($_COOKIE["background"])) { ?>
		body{
			background-image: url('<?php echo esc_url($ale_bg_image); ?>');
		}
	<?php } ?>
	/*Green*/
	.green-bg,.color-selector .colors-choose .colors .color.color1,header .line-bottom nav > ul li.current-menu-item > a,
	header .line-bottom nav > ul li > ul,header .line-bottom nav > ul li:hover > a,.button-offer,
	.home-gallery .slider .flex-direction-nav li a:hover,.home-review .slider .flex-direction-nav li a:hover,
	.template-home-1-hot-deals .slider .flex-direction-nav li a:hover,.search-home-2 form .form-button:hover,
	.template-home-2-gallery .wrapper .video-icon:hover,.price-range .rangeSlider .ui-state-default, 
	.price-range .rangeSlider .ui-widget-content .ui-state-default, .price-range .rangeSlider .ui-widget-header .ui-state-default,
	.template-home-3-tours .slider .flex-direction-nav li a:hover,.template-home-4-single-tour .wrapper .article .text .more:hover,
	.template-home-4-suscribe .form .subscribe-form .submit:hover,.template-nome-5-testimonials .slider .flex-direction-nav li a:hover,
	.pagination .page-numbers li a.next,.pagination .page-numbers li a.prev,.blog-comments .btn-com,
	.tour-archive .items .tour-review .slider .flex-direction-nav li a:hover,.woocommerce .woocommerce-ordering .dropdown .selected,
	.woocommerce-page .woocommerce-ordering .dropdown .selected,.woocommerce span.onsale,
	.woocommerce a.button, .woocommerce button.button, .woocommerce input.button, .woocommerce #respond input#submit,
	.pagination .page-numbers li a.next, .woocommerce-pagination .page-numbers li a.next,.pagination .page-numbers li a.prev,
	.woocommerce-pagination .page-numbers li a.prev,.woocommerce a.button.alt, .woocommerce button.button.alt, .woocommerce input.button.alt,
	.woocommerce #respond input#submit.alt,.woocommerce .widget_price_filter .ui-slider .ui-slider-handle,
	.woocommerce .widget_price_filter .ui-slider .ui-slider-range,.template-home-2-rewiews .testimonials-posts .flex-direction-nav li a:hover,.ale-service .iconbox,
	#tribe-events .tribe-events-button, #tribe-events .tribe-events-button:hover, #tribe_events_filters_wrapper input[type=submit], .tribe-events-button,
	.tribe-events-button.tribe-active:hover, .tribe-events-button.tribe-inactive, .tribe-events-button:hover, .tribe-events-calendar td.tribe-events-present div[id*=tribe-events-daynum-],
	.tribe-events-calendar td.tribe-events-present div[id*=tribe-events-daynum-]>a, #tribe-bar-form .tribe-bar-submit input[type=submit] {
		<?php echo 'background-color: '.$ale_maincolor.';'; ?>
	}
	.green-col,.template-home-3-hot-deals .slider .flex-direction-nav li a:hover:before,.home-slider-box .slider .slides li .text h2 a:hover,
	.home-hotdeals .tabs .items article .text h3 a:hover,.template-home-1-team .slider .slides li article .text .top h3 a:hover,
	.template-home-2-hot_deals article .text h2 a:hover,.template-home-3-hot-deals .slider .slides li article .text .left-part h2 a:hover,
	.template-home-4-hot-deals article .inner-box .text h2 a:hover,.template-home-4-single-tour .wrapper .article .text h2 a:hover,
	.template-home-4-tour .slider .slides li article .text h2 a:hover,.template-home-5-hot-deals .grid-item .text h2 a:hover,
	.template-home-5-tours .slider .slides li article .text h2 a:hover,.template-nome-5-testimonials .slider .slides li article .text .top .details h2 a:hover,
	.template-blog-2 .blog-items article .text h2 a:hover,.blog-archive .item .text .post-title h2 a:hover,
	.template-gallery-2 .gallery-items .grid-item .text h2 a:hover,.template-gallery-1 .gallery-items .grid-item .text h2 a:hover,
	.template-about-1-team .items article h3 a:hover,.template-about-2-team .items article h3 a:hover,
	.hotdeals-archive .items .grid-item .text h3 a:hover,.tour-archive .items .image .text h2 a:hover,
	.team-archive-top-post article .text h2 a:hover,.team-archive-posts .items article .text h3 a:hover,.story blockquote:before,.story a,
	.story ul > li:before,.story ol > li:before,.sidebar .widget a:hover,.template-home-4-slider .slider .slides li .text h2 a:hover,
	.template-nome-5-gallery .items .grid-item .text h3 a:hover,.template-blog-1 tours-winetours-home .blog-items article .text h2 a:hover,
	.woocommerce ul.products li.product .price,.woocommerce div.product div.summary .woocommerce-review-link,
	.woocommerce div.product span.price, .woocommerce div.product p.price,.woocommerce div.product .product_meta a,
	.widget_archive ul li:before, .widget_categories ul li:before, .widget_pages ul li:before, .widget_meta ul li:before, .widget_nav_menu ul li:before{
		<?php echo 'color: '.$ale_maincolor.';'; ?>
	}
	.team-archive-posts .items article{
		<?php echo 'border-bottom: 3px solid '.$ale_maincolor.';'; ?>
	}
	/*Purple*/
	.purple-bg,.color-selector .colors-choose .colors .color.color2,.dropdown li.focus,.button-offer:hover,
	.template-home-2-rewiews .testimonials-posts .flex-direction-nav li a,.template-home-3-hot-deals .slider .slides li article .text .left-part .offer:hover,
	.template-home-3-tours .slider .flex-direction-nav li a,.template-home-3-blog .slider .slides li article .image .traveling:hover,
	.template-home-3-blog .slider .flex-direction-nav li a:hover,.template-home-1-team .slider .flex-direction-nav li a:hover,
	.template-home-4-hot-deals article .inner-box .text .special-offer:hover,.template-home-4-tour .slider .flex-direction-nav li a:hover,
	.template-home-5-tours .slider .flex-direction-nav li a:hover,.template-nome-5-testimonials .slider .flex-direction-nav li a,
	.pagination .page-numbers li span,.pagination .page-numbers li a.next:hover,.pagination .page-numbers li a.prev:hover,
	.template-blog-1 .blog-items article .image a:hover,.template-blog-2 .blog-items article .text .read-more:hover,.blog-comments .form,
	.template-home-2-hot_deals article .text .offer:hover,.woocommerce a.button:hover, .woocommerce button.button:hover, .woocommerce input.button:hover,
	.woocommerce #respond input#submit:hover,.pagination .page-numbers li a.next, .woocommerce-pagination .page-numbers li a.next:hover,
	 .woocommerce-pagination .page-numbers li a.prev:hover,.pagination .page-numbers li span, .woocommerce-pagination .page-numbers li span,
	 .woocommerce div.product form.cart .button:hover,.woocommerce a.button.alt:hover, .woocommerce button.button.alt:hover, .woocommerce input.button.alt:hover,
	 .woocommerce #respond input#submit.alt:hover,.woocommerce-checkout #payment,.color-selector .show-colors:hover,
	.woocommerce .widget_price_filter .price_slider_wrapper .ui-widget-content{
		<?php echo 'background-color: '.$ale_secondarycolor.';'; ?>
	}
	.purple-col,.template-home-3-hot-deals .slider .flex-direction-nav li a:before,.home-blog .item h3 a:hover,
	.template-home-2-blog .blog-posts article h3 a:hover,.about-accordion .accordion-box .accordion h3.ui-accordion-icons:before,
	.story a:hover,.woocommerce div.product div.summary .woocommerce-review-link:hover,.woocommerce div.product .product_meta a:hover{
		<?php echo 'color: '.$ale_secondarycolor.';'; ?>
	}
	/*Yellow*/
	.yellow-bg,.color-selector .colors-choose .colors .color.color3,.button,
	.price-range .rangeSlider .ui-widget-header,.blog-comments .btn-com:hover,.tribe-events-day .tribe-events-day-time-slot h5{
		<?php echo 'background-color: '.$ale_tertiarycolor.';'; ?>
	}
	.yellow-col,.template-home-3-filter form .price-bath-rate .rating i:hover,.template-home-3-filter form .price-bath-rate .rating i:hover ~ i:before,
	.woocommerce .star-rating span{
		<?php echo 'color: '.$ale_tertiarycolor.';'; ?>
	}
	.home-hotdeals .tabs .tab-nav li.ui-tabs-active,.woocommerce div.product .woocommerce-tabs ul.tabs li.active{
		<?php echo '-webkit-box-shadow: 0 5px 0 0 '.$ale_tertiarycolor.';'; ?>
		<?php echo '-moz-box-shadow: 0 5px 0 0 '.$ale_tertiarycolor.';'; ?>
		<?php echo 'box-shadow: 0 5px 0 0 '.$ale_tertiarycolor.';'; ?>
	}


</style>