jQuery(function($) {
	"use strict";

	//Menu toggle
	$('header .line-bottom .menu-icon.close').toggle(function(){
		$('header .line-bottom nav').slideDown('slow');
	}, function(){
		$('header .line-bottom nav').slideUp('slow');
	});

	//Twitter slider
	jQuery.fn.TwiterSlider = function (){
		var twiLen =  $('.twit-items').children().length;
		var twiWidth =  $('.twit-items').parent().width();
		var twiBlockWidth = twiWidth * 6;

		$('.twit-items').css({
			width: twiBlockWidth
		});
		var twiMarg = '';
		$('.twit-next').on('click', function(){
			if(twiMarg > (-twiBlockWidth + twiWidth)){
				twiMarg = twiMarg - twiWidth;
			} else{
				twiMarg = '';
			}
			$('.twit-items').css({
				marginLeft: twiMarg
			});
		});
	}
	$('.template-home-5-hot-deals .twitter-block').TwiterSlider();

	//Rating
	jQuery.fn.Rating = function (){
		var i = $('.rating i').length;

		$('.rating i').on('click',  function(){
			var iRate = $(this).data('rate');
			var iCount = i = iRate;
			for(i = 0; i <= iCount; i++){
				$('.rating i.star' + i).removeClass('grey-col-icon').addClass('yellow-col');
			}
			console.log(iRate);
			$('.rating input').val(iRate);
		});
	}
	$('.rating i').Rating();

	//Price range
	$( ".rangeSldier__scale" ).slider({
		range: true,
		min: 0,
		max: 99999,
		values: [ 50, 50000 ],
		slide: function( event, ui ) {
			$( ".sliderRange__amount_first" ).val( ui.values[ 0 ] );
			$( ".sliderRange__amount_last" ).val( ui.values[ 1 ] );
		}
	});
	$( ".sliderRange__amount_first" ).val( $( ".rangeSldier__scale" ).slider( "values", 0 ));

	$( ".sliderRange__amount_last" ).val( $( ".rangeSldier__scale" ).slider( "values", 1 ) );

	//Datepicker
	$( ".datepicker" ).datepicker();

	//Map hover
	$('.template-home-1-tour #tour-map').hover(function(){
		$('.template-home-1-tour .top').css({
			top: -300,
			opacity: 0
		});
	}, function(){
		$('.template-home-1-tour .top').css({
			top: 0,
			opacity: 1
		});
	});

	if($('.page_load').length){
		$(window).load(function(){
			$('.body').css({opacity: 1});
			$('.page_load').css({display: 'none'});
		});
	}

	//Pup up window
	$('.exit').on('click', function(){
		$('.pop-up').fadeOut('slow');
	});

	$('.home-video .video-box .click-overlay, .template-home-2-gallery .wrapper .video-icon,.template-home-5-info .fa-play').on('click', function(){
		$('.home-video .pop-up, .template-home-2-gallery .wrapper .pop-up,.template-home-5-info .pop-up').fadeIn('slow');
	});
	
	//About 1
	$('.template-about-1-post .text .images .item,.single-page .image .overlay').on('click', function(){
		$('.template-about-1-post .text .pop-up, .single-page .image .pop-up').fadeIn('slow');
		if($(".template-about-1-post .text .slider,.single-page .image .slider").length){
			$('.template-about-1-post .text .slider,.single-page .image .slider').flexslider({
				animation: "slide",
				controlNav: false,
				prevText: "",
				nextText: "",
				pauseOnHover: true,
				smoothHeight: true
			});
		}
	});

	//Weather box
	if($(".weather-box").length){
		$('.weather-box .w-select').bind("click", function(e){
			$('.city-drop').slideToggle();
		});
	}

	//Sliders
	if($(".home-slider-box .slider, .template-home-2-hot_deals .slider, .template-home-4-slider .slider").length){
		$('.home-slider-box .slider, .template-home-2-hot_deals .slider, .template-home-4-slider .slider').flexslider({
			animation: "fade",
			slideshow: false,
			directionNav: false,
			pauseOnHover: true
		});
	}

	if($(".home-hotdeals .slider,.template-home-5-hot-deals .slider").length){
		$('.home-hotdeals .slider,.template-home-5-hot-deals .slider').flexslider({
			animation: "slide",
			directionNav: false,
			prevText: "",
			nextText: "",
			pauseOnHover: true
		});
	}

	if($('.hotdeals-archive .items .slider').length){
		$('.hotdeals-archive .items .slider').flexslider({
			animation: "slide",
			directionNav: false,
			prevText: "",
			nextText: "",
			pauseOnHover: true,
			start: function() {
				$('.grid-system-marg').isotope({
					layoutMode: 'packery',
					itemSelector: '.grid-item',
					packery: {
						gutter: '.gutter'
					}
				});
			}
		});
	}

	if($(".home-gallery .slider").length){
		$('.home-gallery .slider').flexslider({
			animation: "slide",
			itemWidth: 176,
			itemMargin: 20,
			move: 1,
			controlNav: false,
			prevText: "",
			nextText: "",
			pauseOnHover: true
		});
	}

	if($(".home-review .slider, .template-home-1-hot-deals .slider, .template-home-1-team .slider, .template-home-2-rewiews .testimonials-posts, .template-home-3-hot-deals .slider,.template-home-3-blog .slider, .template-home-4-tour .slider, .template-home-5-tours .slider, .template-nome-5-testimonials .slider,.tour-archive .items .tour-review .slider").length){
		$('.home-review .slider, .template-home-1-hot-deals .slider, .template-home-1-team .slider, .template-home-2-rewiews .testimonials-posts, .template-home-3-hot-deals .slider,.template-home-3-blog .slider, .template-home-4-tour .slider, .template-home-5-tours .slider, .template-nome-5-testimonials .slider,.tour-archive .items .tour-review .slider').flexslider({
			animation: "slide",
			controlNav: false,
			prevText: "",
			nextText: "",
			pauseOnHover: true,
			smoothHeight: true
		});
	}

	if($(".template-home-3-tours .slider").length){
		$('.template-home-3-tours .slider').flexslider({
			animation: "slide",
			controlNav: false,
			prevText: "",
			nextText: "",
			direction: "vertical",
			animationLoop: false,
			startAt: 1,
			pauseOnHover: true
		});
	}
	if($('.single-hot_deals .tabs .item .slider').length){
		$('.single-hot_deals .tabs .item .slider').flexslider({
			animation: "slide",
			controlNav: false,
			directionNav: false,
			prevText: "",
			nextText: "",
			animationLoop: false,
			pauseOnHover: true,
			slideshow: false,
			sync: ".single-hot_deals .tabs .item .image-nav"
		});

		$('.single-hot_deals .tabs .item .image-nav').flexslider({
			animation: "slide",
			controlNav: false,
			prevText: "",
			nextText: "",
			animationLoop: false,
			pauseOnHover: true,
			slideshow: false,
			itemWidth: 154,
			asNavFor: '.single-hot_deals .tabs .item .slider'
		});
	}

	
	//Accordion
	$( ".accordion" ).accordion({
		collapsible: true
	});

	if($(".accordion > .accordion-item").length){
		/* acordion About page */
		var allAccordions = $('.accordion div.data');
		var allAccordionItems = $('.accordion .accordion-item');
		$('.accordion > .accordion-item').click(function() {
			if($(this).hasClass('open'))
			{
				$(this).removeClass('open');
				$(this).next().slideUp("slow");
			}
			else
			{
				allAccordions.slideUp("slow");
				allAccordionItems.removeClass('open');
				$(this).addClass('open');
				$(this).next().slideDown("slow");
				return false;
			}
		});
	}
	
	//Tabs
	$(".tabs").tabs({
		collapsible: true
	});
	$('.tabs').bind('tabsshow', function(event, ui) {
		if (ui.panel.id == "mapTab") {
			google.maps.event.trigger(map, "resize");
			map.setCenter(center);   // Important to add this!
		}
	});

	//Isotope
	$( window ).load(function() {
		if($('.grid-system').length){
			$('.grid-system').isotope({
				itemSelector: '.grid-item',
				layoutMode: 'packery'
			});
		}

		if($('.grid-system-marg').length){
			$('.grid-system-marg').isotope({
				layoutMode: 'packery',
				itemSelector: '.grid-item',
				packery: {
					gutter: '.gutter'
				}
			});
		}
	});
});

Modernizr.addTest('ipad', function () {
	return !!navigator.userAgent.match(/iPad/i);
});

Modernizr.addTest('iphone', function () {
	return !!navigator.userAgent.match(/iPhone/i);
});

Modernizr.addTest('ipod', function () {
	return !!navigator.userAgent.match(/iPod/i);
});

Modernizr.addTest('appleios', function () {
	return (Modernizr.ipad || Modernizr.ipod || Modernizr.iphone);
});

Modernizr.addTest('positionfixed', function () {
	var test    = document.createElement('div'),
		control = test.cloneNode(false),
		fake = false,
		root = document.body || (function () {
			fake = true;
			return document.documentElement.appendChild(document.createElement('body'));
		}());

	var oldCssText = root.style.cssText;
	root.style.cssText = 'padding:0;margin:0';
	test.style.cssText = 'position:fixed;top:42px';
	root.appendChild(test);
	root.appendChild(control);

	var ret = test.offsetTop !== control.offsetTop;

	root.removeChild(test);
	root.removeChild(control);
	root.style.cssText = oldCssText;

	if (fake) {
		document.documentElement.removeChild(root);
	}

	/* Uh-oh. iOS would return a false positive here.
	 * If it's about to return true, we'll explicitly test for known iOS User Agent strings.
	 * "UA Sniffing is bad practice" you say. Agreeable, but sadly this feature has made it to
	 * Modernizr's list of undectables, so we're reduced to having to use this. */
	return ret && !Modernizr.appleios;
});


// Modernizr.load loading the right scripts only if you need them
Modernizr.load([
	{
		// Let's see if we need to load selectivizr
		test : Modernizr.borderradius,
		// Modernizr.load loads selectivizr and Respond.js for IE6-8
		nope : [ale.template_dir + '/js/libs/selectivizr.min.js', ale.template_dir + '/js/libs/respond.min.js']
	},{
		test: Modernizr.touch,
		yep:ale.template_dir + '/css/touch.css'
	}
]);



jQuery(function($) {
	var is_single = $('#post').length;
	var posts = $('article.post');
	var is_mobile = parseInt(ale.is_mobile);

	var slider_settings = {
		animation: "slide",
		slideshow: false,
		controlNav: false
	}

	$(document).ajaxComplete(function(){
		try{
			if (!posts.length) {
				return;
			}
			FB.XFBML.parse();
			gapi.plusone.go();
			twttr.widgets.load();
			pin_load();
		}catch(ex){}
	});

	// open external links in new window
	$("a[rel$=external]").each(function(){
		$(this).attr('target', '_blank');
	});

	$.fn.init_posts = function() {
		var init_post = function(data) {
			// close other posts
			data.post.siblings('.open-post').find('a.toggle').trigger('click', {
				hide:true
			});

			var loading = data.post.find('span.loading');

			if (data.more.is(':empty')) {
				data.post.addClass('post-loading');
				loading.css('visibility', 'visible');
				data.more.load(ale.ajax_load_url, {
					'action':'aletheme_load_post',
					'id':data.post.data('post-id')
				}, function(){
					loading.remove();
					data.more.slideDown(400, function(){
						data.post.addClass('open-post');
						data.toggler.text('Close Post');
						$('.video', data.more).fitVids();
						if (data.scroll) {
							data.scroll.scrollTo('fast');
						}
					});
					init_comments(data.post);
				});
			} else {
				data.more.slideDown(400, function(){
					data.post.addClass('open-post');
					data.toggler.text('Close Post');
					if (data.scroll) {
						data.scroll.scrollTo('fast');
					}
				});
			}
		}

		var load_post = function(e, _opts) {
			e.preventDefault();
			var data  = {
				toggler:$(this),
				scroll:false
			};
			var opts = $.extend({
				comments:false,
				hide:false,
				add_comment:false
			}, _opts);
			data.post = data.toggler.parents('article.post');
			data.more = data.post.find('.full');

			if (data.more.is(':visible')) {
				if (opts.hide == true) {
					// quick hide for multiple posts
					data.more.hide();
				} else {
					data.more.slideUp(400);
				}
				data.toggler.text('Open Post');
				data.post.removeClass('open-post');
			} else {
				if (typeof(e.originalEvent) != 'undefined' ) {
					data.scroll = data.post;
				}
				init_post(data);
			}
		}

		var init_comments = function(post) {
			var respond = $('section.respond', post);
			var respond_form = $('form', respond);
			var respond_form_error = $('p.error', respond_form);
			//var respond_cancel = $('.cancel-comment-reply a', respond);
			var comments = $('section.comments', post);

			/*$('a.comment-reply-link', post).on('click', function(e){
			 e.preventDefault();
			 var comment = $(this).parents('li.comment');
			 comment.find('>div').append(respond);
			 respond_cancel.show();
			 respond.find('input[name=comment_post_ID]').val(post.data('post-id'));
			 respond.find('input[name=comment_parent]').val(comment.data('comment-id'));
			 respond.find('input:first').focus();
			 }).attr('onclick', '');

			 respond_cancel.on('click', function(e){
			 e.preventDefault();
			 comments.after(respond);
			 respond.find('input[name=comment_post_ID]').val(post.data('post-id'));
			 respond.find('input[name=comment_parent]').val(0);
			 $(this).hide();
			 });
			 */
			respond_form.ajaxForm({
				'beforeSubmit':function(){
					respond_form_error.text('').hide();
				},
				'success':function(_data){
					var data = $.parseJSON(_data);
					if (data.error) {
						respond_form_error.html(data.msg).slideDown('fast');
						return;
					}
					var comment_parent_id = respond.find('input[name=comment_parent]').val();
					var _comment = $(data.html);
					var list;
					_comment.hide();

					if (comment_parent_id == 0) {
						list = comments.find('ol');
						if (!list.length) {
							list = $('<ol class="commentlist "></ol>');
							comments.find('.scrollbox .jspContainer .jspPane').append(list);
						}
					} else {
						list = $('#comment-' + comment_parent_id).parent().find('ul');
						if (!list.length) {
							list = $('<ul class="children"></ul>');
							$('#comment-' + comment_parent_id).parent().append(list);
						}
						respond_cancel.trigger('click');
					}
					list.append(_comment);
					_comment.fadeIn('fast');
					//.scrollTo();

					respond.find('textarea').clearFields();
				},
				'error':function(response){
					var error = response.responseText.match(/\<p\>(.*)<\/p\>/)[1];
					if (typeof(error) == 'undefined') {
						error = 'Something went wrong. Please reload the page and try again.';
					}
					respond_form_error.html(error).slideDown('fast');
				}
			});
		}
		$(this).each(function(){
			var post = $(this);
			// init post galleries
			$(window).load(function(){
				$('.preview .flexslider', post).flexslider(slider_settings);
			});
			// do not init ajax posts & comments for mobile
			if (!is_mobile) {
				// ajax posts enabled
				if (ale.ajax_posts) {
					$('a.toggle', post).click(load_post);
					$('.video', post).fitVids();
					$('.preview figure a', post).click(function(e){
						e.preventDefault();
						$(this).parents('article.post').find('a.toggle').trigger('click');
					});
				}
			}
		});
		// init ajax comments on a single post if ajax comments are enabled
		if (is_single && parseInt(ale.ajax_comments)) {
			init_comments(posts);
		}
		// open single post on page
		if (parseInt(ale.ajax_open_single) && !is_single && posts.length == 1) {
			posts.find('a.toggle').trigger('click');
		}
	}
	posts.init_posts();

	$.fn.init_gallery = function() {
		$(this).each(function(){
			var gallery = $(this);
			$(window).load(function(){
				$('.flexslider', gallery).flexslider(slider_settings);
			});

		})
	}
	$('#gallery').init_gallery();

	$.fn.init_archives = function()
	{
		$(this).each(function(){
			var archives = $(this);
			var year = $('#archives-active-year');
			var months = $('div.months div.year-months', archives);
			var arrows = $('a.up, a.down', archives);
			var activeMonth;
			var current, active;
			var animated = false;
			if (months.length == 1) {
				arrows.remove();
				activeMonth = months.filter(':first').addClass('year-active').show();
				year.text(activeMonth.attr('id').replace(/[^0-9]*/, ''));
				return;
			}
			arrows.click(function(e){
				e.preventDefault();
				if (animated) {
					return;
				}
				var fn = $(this);
				animated = true;
				arrows.css('visibility', 'visible');
				var current = months.filter('.year-active');
				if (fn.hasClass('up')) {
					active = current.prev();
					if (!active.length) {
						active = months.filter(':last');
					}
				} else {
					active = current.next();
					if (!active.length) {
						active = months.filter(':first');
					}
				}
				current.removeClass('year-active').fadeOut(150, function(){
					active.addClass('year-active').fadeIn(150, function(){
						animated = false;
					});
					year.text(active.attr('id').replace(/[^0-9]*/, ''));

					if (fn.hasClass('up')) {
						if (!active.prev().length) {
							arrows.filter('.up').css('visibility', 'hidden');
						}
					} else {
						if (!active.next().length) {
							arrows.filter('.down').css('visibility', 'hidden');
						}
					}
				});
			});
			activeMonth = months.filter(':first').addClass('year-active').show();
			year.text(activeMonth.attr('id').replace(/[^0-9]*/, ''));
			arrows.filter('.up').css('visibility', 'hidden');
		});
	}
	$('#archives .ale-archives').init_archives();






});

// HTML5 Fallbacks for older browsers
jQuery(function($) {
	// check placeholder browser support
	if (!Modernizr.input.placeholder) {
		// set placeholder values
		$(this).find('[placeholder]').each(function() {
			$(this).val( $(this).attr('placeholder') );
		});

		// focus and blur of placeholders
		$('[placeholder]').focus(function() {
			if ($(this).val() == $(this).attr('placeholder')) {
				$(this).val('');
				$(this).removeClass('placeholder');
			}
		}).blur(function() {
				if ($(this).val() == '' || $(this).val() == $(this).attr('placeholder')) {
					$(this).val($(this).attr('placeholder'));
					$(this).addClass('placeholder');
				}
			});

		// remove placeholders on submit
		$('[placeholder]').closest('form').submit(function() {
			$(this).find('[placeholder]').each(function() {
				if ($(this).val() == $(this).attr('placeholder')) {
					$(this).val('');
				}
			});
		});
	}
});

