;(function( $, window, document ) {

	"use strict";

	var 

	_doc = $( document ), 
	
	_win = $( window ), 

	/* ==========================================================================
	  Devsolution Main Functions
	============================================================================= */
	Devsolution = {

		isHandheld: (function(a){return /(android|bb\d+|meego).+mobile|android|ipad|playbook|silk|avantgo|bada\/|blackberry|blazer|compal|elaine|fennec|hiptop|iemobile|ip(hone|od)|iris|kindle|lge |maemo|midp|mmp|mobile.+firefox|netfront|opera m(ob|in)i|palm( os)?|phone|p(ixi|re)\/|plucker|pocket|psp|series(4|6)0|symbian|treo|up\.(browser|link)|vodafone|wap|windows (ce|phone)|xda|xiino/i.test(a) || /1207|6310|6590|3gso|4thp|50[1-6]i|770s|802s|a wa|abac|ac(er|oo|s\-)|ai(ko|rn)|al(av|ca|co)|amoi|an(ex|ny|yw)|aptu|ar(ch|go)|as(te|us)|attw|au(di|\-m|r |s )|avan|be(ck|ll|nq)|bi(lb|rd)|bl(ac|az)|br(e|v)w|bumb|bw\-(n|u)|c55\/|capi|ccwa|cdm\-|cell|chtm|cldc|cmd\-|co(mp|nd)|craw|da(it|ll|ng)|dbte|dc\-s|devi|dica|dmob|do(c|p)o|ds(12|\-d)|el(49|ai)|em(l2|ul)|er(ic|k0)|esl8|ez([4-7]0|os|wa|ze)|fetc|fly(\-|_)|g1 u|g560|gene|gf\-5|g\-mo|go(\.w|od)|gr(ad|un)|haie|hcit|hd\-(m|p|t)|hei\-|hi(pt|ta)|hp( i|ip)|hs\-c|ht(c(\-| |_|a|g|p|s|t)|tp)|hu(aw|tc)|i\-(20|go|ma)|i230|iac( |\-|\/)|ibro|idea|ig01|ikom|im1k|inno|ipaq|iris|ja(t|v)a|jbro|jemu|jigs|kddi|keji|kgt( |\/)|klon|kpt |kwc\-|kyo(c|k)|le(no|xi)|lg( g|\/(k|l|u)|50|54|\-[a-w])|libw|lynx|m1\-w|m3ga|m50\/|ma(te|ui|xo)|mc(01|21|ca)|m\-cr|me(rc|ri)|mi(o8|oa|ts)|mmef|mo(01|02|bi|de|do|t(\-| |o|v)|zz)|mt(50|p1|v )|mwbp|mywa|n10[0-2]|n20[2-3]|n30(0|2)|n50(0|2|5)|n7(0(0|1)|10)|ne((c|m)\-|on|tf|wf|wg|wt)|nok(6|i)|nzph|o2im|op(ti|wv)|oran|owg1|p800|pan(a|d|t)|pdxg|pg(13|\-([1-8]|c))|phil|pire|pl(ay|uc)|pn\-2|po(ck|rt|se)|prox|psio|pt\-g|qa\-a|qc(07|12|21|32|60|\-[2-7]|i\-)|qtek|r380|r600|raks|rim9|ro(ve|zo)|s55\/|sa(ge|ma|mm|ms|ny|va)|sc(01|h\-|oo|p\-)|sdk\/|se(c(\-|0|1)|47|mc|nd|ri)|sgh\-|shar|sie(\-|m)|sk\-0|sl(45|id)|sm(al|ar|b3|it|t5)|so(ft|ny)|sp(01|h\-|v\-|v )|sy(01|mb)|t2(18|50)|t6(00|10|18)|ta(gt|lk)|tcl\-|tdg\-|tel(i|m)|tim\-|t\-mo|to(pl|sh)|ts(70|m\-|m3|m5)|tx\-9|up(\.b|g1|si)|utst|v400|v750|veri|vi(rg|te)|vk(40|5[0-3]|\-v)|vm40|voda|vulc|vx(52|53|60|61|70|80|81|83|85|98)|w3c(\-| )|webc|whit|wi(g |nc|nw)|wmlb|wonu|x700|yas\-|your|zeto|zte\-/i.test(a.substr(0, 4));})(navigator.userAgent||navigator.vendor||window.opera), 

		cssTransitions: (function(a,b){a=(new Image).style;b='ransition';return't'+b in a||'webkitT'+b in a||'MozT'+b in a})(), 

		cssAnimations: (function(a,b){a=(new Image).style;b='nimationName';return'a'+b in a||'webkitA'+b in a||'MozA'+b in a})(), 

		resizeCallbacks: [], 

		/* ==========================================================================
		  Dropdown
		============================================================================= */

		SelectDrop: function(){
			$('.dropdown').dropdown();
		},

		/* ==========================================================================
		  Timeline
		============================================================================= */

		DevTimeline: function(){
			if($.fn.devtimeline){
				$('.dev-timeline').devtimeline();				
			}
		},

		/* ==========================================================================
		  Coming Soon
		============================================================================= */

		ComingSoon: function(){
			if($('.coming-soon-page .counters').length > 0 && $.fn.countdown){

				var toTime = $('.coming-soon-page .counters').first().data('to').toString();

				$('.coming-soon-page .counters').find('.inner-counter').first().countdown(toTime, function(event) {
				   var $this = $(this).html(event.strftime(''
				     + '<div><span class="int">%w</span><span class="label">weeks</span></div> '
				     + '<div><span class="int">%d</span><span class="label">days</span></div> '
				     + '<div><span class="int">%H</span><span class="label">hours</span></div> '
				     + '<div><span class="int">%M</span><span class="label">minuts</span></div> '
				     + '<div><span class="int">%S</span><span class="label">seconds</span></div> '));
				});
			}
		},

		/* ==========================================================================
		  Projects
		============================================================================= */

		Projects: function(){
			$('.projects-content').each(function(){
				var $thisContainer = $(this).parent();

				if($.fn.imagesLoaded && $.fn.isotope){
					$('.project-items', this).imagesLoaded(function(){
						$( this ).isotope({
							itemSelector: 'li', 
							transitionDuration: '0.5s'
						}).closest( '.projects-content' ).addClass( 'loaded' );
					});
				}
			});

			// Portfolio Grid 2, 3, 4 Columns
			_doc.on( 'click', '.filters-projects a[data-filter]', function( e ) {
				e.preventDefault();	
				$( this )
					.closest( 'li' )
						.siblings()
						.removeClass( 'active' )
						.end()
					.addClass( 'active' )
					.closest( '.projects' )
						.find( '.projects-content .project-items' )
						.isotope({ filter: $( this ).data( 'filter' ) })
						.end().end()
					.closest('.projects')
					.find( '.filters-projects' )
						.find( '.active' )
						.find('a')
						.html( this.innerHTML );
				e.preventDefault();

			});
		},

		/* ==========================================================================
		  Gallery
		============================================================================= */

		DevGallery: function(){
			if($.fn.owlCarousel){
				var gallery = $('.dev-gallery');

				gallery.each(function(){
					var gl = $(this);

					gl.owlCarousel({
						nav: true,
						navText: [ '<i class="fa fa-angle-left" aria-hidden="true"></i>', '<i class="fa fa-angle-right" aria-hidden="true"></i>'],
						items:1,
						dots: false,
						loop: true,
						autoplay: true,
						rewind: false,
						margin: 0,
					});
				});
			}
		},

		/* ==========================================================================
		  Modals
		============================================================================= */
		DevModals: function(){
			var ModalObject = {
					
					init: function(){
						if($.fn.devModals && $('.dev-modals-btn, .dev-modal-triggerd, .dev-product-modals').length > 0){

							$('.dev-modals-btn, .dev-modal-triggerd').each(function(){
								ModalObject.modal(this);
							});

							$('.dev-product-modals').each(function(){
								ModalObject.productModal(this);
							});
						}
					},

					productModal: function(wrapper){
						var $this 					= $(wrapper),
						 	wrapper 				= $this.data('wrapper') !== undefined ? $this.data('wrapper') : ".dev-modals-js",
						 	popupType       		= $this.data('popup') !== undefined ? $this.data('popup') : null,
						 	exitTopDistance       	= $this.data('exit-top') !== undefined ? $this.data('exit-top') : 40,
						 	scrollTopDistance       = $this.data('scroll-top') !== undefined ? $this.data('scroll-top') : 400,

						 	setCookie       		= $this.data('cookie') !== undefined ? $this.data('cookie') : null,
						 	cookieDays       		= $this.data('cookie-days') !== undefined ? $this.data('cookie-days') : null,
						 	cookieTriggerClass  	= $this.data('cookie-class') !== undefined ? $this.data('cookie-class') : "setDevCookies",
						 	cookieName  			= $this.data('cookie-name') !== undefined ? $this.data('cookie-name') : "DevCookies",

							location 				= $this.data('location') !== undefined ? $this.data('location') : "center",
							margin 					= $this.data('margin') !== undefined ? $this.data('margin') : "0px",
							padding 				= $this.data('padding') !== undefined ? $this.data('padding') : "0",
							radius 					= $this.data('radius') !== undefined ? $this.data('radius') : "0",
							width 					= $this.data('width') !== undefined ? $this.data('width') : "1170px",
							height 					= $this.data('height') !== undefined ? $this.data('height') : "780px",
								
							overlayBg 				= $this.data('overlay') !== undefined ? $this.data('overlay') : true,
							overlayBgColor 			= $this.data('overlay-color') !== undefined ? $this.data('overlay-color') : "rgba(0,0,0,0.6)",
							overlayTransition 		= $this.data('overlay-trans') !== undefined ? $this.data('overlay-trans') : "ease-in",
							overlayTransitionSpeed 	= $this.data('overlay-trans-speed') !== undefined ? $this.data('overlay-trans-speed') : "0.4",

							background 				= $this.data('background') !== undefined ? $this.data('background') : "rgba(255,255,255, 1)",
							backgroundEff 			= $this.data('background-effect') !== undefined ? $this.data('background-effect') : "fade",
							blurBgRadius 			= $this.data('background-radius') !== undefined ? $this.data('background-radius') : "2px",
							scaleBgValue 			= $this.data('background-scale') !== undefined ? $this.data('background-scale') : "0.9",
								
							windowEffect 			= $this.data('window-effect') !== undefined ? $this.data('window-effect') : "zoomIn",
							windowTransition 		= $this.data('window-trans') !== undefined ? $this.data('window-trans') : "ease",
							windowTransitionSpeed 	= $this.data('window-trans-speed') !== undefined ? $this.data('window-trans-speed') : "0.4",
							windowShadowOffsetX 	= $this.data('window-shadow-ox') !== undefined ? $this.data('window-shadow-ox') : "0",
							windowShadowOffsetY 	= $this.data('window-shadow-oy') !== undefined ? $this.data('window-shadow-oy') : "0",
							windowShadowBlurRadius 	= $this.data('window-blur-radius') !== undefined ? $this.data('window-blur-radius') : "0",
							windowShadowSpreadRadius= $this.data('window-spread-radius') !== undefined ? $this.data('window-spread-radius') : "0",
							windowShadowColor		= $this.data('window-shadow-color') !== undefined ? $this.data('window-shadow-color') : "rgba(0,0,0,0)",

							delay 					= $this.data('delay') !== undefined ? $this.data('delay') : 1000;

							$this.devModals({
									// Functionality
								    popupType: popupType,
								    delayTime: delay,
								    exitTopDistance: exitTopDistance,
								    scrollTopDistance: scrollTopDistance,

								    // Cookies
								    setCookie: setCookie,
						            cookieDays: cookieDays,
						            cookieTriggerClass: cookieTriggerClass,
						            cookieName: cookieName,

								    // Overlay options
								    overlayBg: overlayBg,
								    overlayBgColor: overlayBgColor,
								    overlayTransition: overlayTransition,
								    overlayTransitionSpeed: overlayTransitionSpeed,

								    // Background effects
								    bgEffect: backgroundEff,
								    blurBgRadius: blurBgRadius,
								    scaleBgValue: scaleBgValue,

								    // Window options
								    windowWidth: width,
								    windowHeight: height,
								    windowLocation: location,
								    windowTransition: windowTransition,
								    windowTransitionSpeed: windowTransitionSpeed,
								    windowTransitionEffect: windowEffect,
								    windowShadowOffsetX: windowShadowOffsetX,
								    windowShadowOffsetY: windowShadowOffsetY,
								    windowShadowBlurRadius: windowShadowBlurRadius,
								    windowShadowSpreadRadius: windowShadowSpreadRadius,
								    windowShadowColor: windowShadowColor,
								    windowBackground: background,
								    windowRadius: radius,
								    windowMargin: margin,
								    windowPadding: padding,

								    // Close and reopen button
								    closeButton: "icon",
								    wrapperID: wrapper,

								    onLoad: function(){
								    	Devsolution.sliders.quickview();
								    }
							});


					},

					modal: function(wrapper){
						var $this 					= $(wrapper),
						 	wrapper 				= $this.data('wrapper') !== undefined ? $this.data('wrapper') : ".dev-modals-js",
						 	popupType       		= $this.data('popup') !== undefined ? $this.data('popup') : null,
						 	exitTopDistance       	= $this.data('exit-top') !== undefined ? $this.data('exit-top') : 40,
						 	scrollTopDistance       = $this.data('scroll-top') !== undefined ? $this.data('scroll-top') : 400,

						 	setCookie       		= $this.data('cookie') !== undefined ? $this.data('cookie') : null,
						 	cookieDays       		= $this.data('cookie-days') !== undefined ? $this.data('cookie-days') : null,
						 	cookieTriggerClass  	= $this.data('cookie-class') !== undefined ? $this.data('cookie-class') : "setDevCookies",
						 	cookieName  			= $this.data('cookie-name') !== undefined ? $this.data('cookie-name') : "DevCookies",

							location 				= $this.data('location') !== undefined ? $this.data('location') : "center",
							margin 					= $this.data('margin') !== undefined ? $this.data('margin') : "0px auto",
							padding 				= $this.data('padding') !== undefined ? $this.data('padding') : "0",
							radius 					= $this.data('radius') !== undefined ? $this.data('radius') : "0",
							width 					= $this.data('width') !== undefined ? $this.data('width') : "500px",
							height 					= $this.data('height') !== undefined ? $this.data('height') : "300px",
								
							overlayBg 				= $this.data('overlay') !== undefined ? $this.data('overlay') : false,
							overlayBgColor 			= $this.data('overlay-color') !== undefined ? $this.data('overlay-color') : "rgba(255,255,255,0.9)",
							overlayTransition 		= $this.data('overlay-trans') !== undefined ? $this.data('overlay-trans') : "ease",
							overlayTransitionSpeed 	= $this.data('overlay-trans-speed') !== undefined ? $this.data('overlay-trans-speed') : "0.4",

							background 				= $this.data('background') !== undefined ? $this.data('background') : "rgba(255,255,255,0)",
							backgroundEff 			= $this.data('background-effect') !== undefined ? $this.data('background-effect') : "fade",
							blurBgRadius 			= $this.data('background-radius') !== undefined ? $this.data('background-radius') : "2px",
							scaleBgValue 			= $this.data('background-scale') !== undefined ? $this.data('background-scale') : "0.9",
								
							windowEffect 			= $this.data('window-effect') !== undefined ? $this.data('window-effect') : "fade",
							windowTransition 		= $this.data('window-trans') !== undefined ? $this.data('window-trans') : "ease",
							windowTransitionSpeed 	= $this.data('window-trans-speed') !== undefined ? $this.data('window-trans-speed') : "0.4",
							windowShadowOffsetX 	= $this.data('window-shadow-ox') !== undefined ? $this.data('window-shadow-ox') : "0",
							windowShadowOffsetY 	= $this.data('window-shadow-oy') !== undefined ? $this.data('window-shadow-oy') : "0",
							windowShadowBlurRadius 	= $this.data('window-blur-radius') !== undefined ? $this.data('window-blur-radius') : "0",
							windowShadowSpreadRadius= $this.data('window-spread-radius') !== undefined ? $this.data('window-spread-radius') : "0",
							windowShadowColor		= $this.data('window-shadow-color') !== undefined ? $this.data('window-shadow-color') : "rgba(0,0,0,0)",

							delay 					= $this.data('delay') !== undefined ? $this.data('delay') : 1000;

							$this.devModals({
									// Functionality
								    popupType: popupType,
								    delayTime: delay,
								    exitTopDistance: exitTopDistance,
								    scrollTopDistance: scrollTopDistance,

								    // Cookies
								    setCookie: setCookie,
						            cookieDays: cookieDays,
						            cookieTriggerClass: cookieTriggerClass,
						            cookieName: cookieName,

								    // Overlay options
								    overlayBg: overlayBg,
								    overlayBgColor: overlayBgColor,
								    overlayTransition: overlayTransition,
								    overlayTransitionSpeed: overlayTransitionSpeed,

								    // Background effects
								    bgEffect: backgroundEff,
								    blurBgRadius: blurBgRadius,
								    scaleBgValue: scaleBgValue,

								    // Window options
								    windowWidth: width,
								    windowHeight: height,
								    windowLocation: location,
								    windowTransition: windowTransition,
								    windowTransitionSpeed: windowTransitionSpeed,
								    windowTransitionEffect: windowEffect,
								    windowShadowOffsetX: windowShadowOffsetX,
								    windowShadowOffsetY: windowShadowOffsetY,
								    windowShadowBlurRadius: windowShadowBlurRadius,
								    windowShadowSpreadRadius: windowShadowSpreadRadius,
								    windowShadowColor: windowShadowColor,
								    windowBackground: background,
								    windowRadius: radius,
								    windowMargin: margin,
								    windowPadding: padding,

								    // Close and reopen button
								    closeButton: "icon",
								    wrapperID: wrapper
							});
					}
				}

			ModalObject.init();
		},

		megamenu: function(){

    			var Header 			= $('.site-container .header'),
    				last_item   	= Header.find('.nav > li').last(),
    				first_item	 	= Header.find('.nav > li').first(),
    				navbar          = Header.find('.navbar').first(),
    				headerTool      = navbar.find('.header-tool').first(),
    				MegaMenu 		= Header.find('.nav > .mega-menu').first();


    			// Change Location

    			if(Header.hasClass('header-left') && _win.outerWidth(true) < 768){
    				headerTool.appendTo('.navbar-header');
    			}else{
    				headerTool.appendTo('.navbar');
    			}


    			if(Header.hasClass('header') && !Header.hasClass('header-center')){
    				// Right Logo
    				if(MegaMenu.length > 0){
    					var windowW = _win.outerWidth(true),
	    					headerW = Header.outerWidth(true); // Fullsize

	    					MegaMenu.each(function(){
	    						var $this 		= $(this),
	    							sub_menu 	= $this.find('.sub-menu'),
	    							sub_menuWD  = 1170;

	    							if(sub_menu.hasClass('column_2') || sub_menu.hasClass('column_3')){
	    								sub_menuWD = 960;
	    							}

	    						if(windowW >= (sub_menuWD + first_item.offset().left)){
		    						var sub_menu_margin	= first_item.offset().left - $this.offset().left;
		    						sub_menu.css({'margin-left': sub_menu_margin, 'width' : ''});
	    						}else{
	    							var sub_menu_margin	= first_item.offset().left - $this.offset().left;
		    						sub_menu.css({'margin-left': -($this.offset().left), 'width' : windowW});
	    						}


	    					});
    				}
    			}

    			if(Header.hasClass('header-center')){
    				if(MegaMenu.length > 0){
    					var windowW = _win.outerWidth(true),
    						navbar 	= Header.find('.navbar-collapse > .navbar-nav'),
	    					headerW = Header.outerWidth(true); 

	    				MegaMenu.each(function(){
	    					var $this 		= $(this),
	    						sub_menu 	= $this.find('.sub-menu'),
	    						sub_menuWD  = 1170,
	    						marginLeft  = ($this.offset().left - navbar.offset().left),
	    						marginLeft  = (Math.abs(navbar.outerWidth(true) - sub_menuWD) / 2) + marginLeft;

	    						if(windowW > Math.abs(sub_menuWD)){	
	    							sub_menu.css({'margin-left': -marginLeft, 'width' : sub_menuWD});
	    						}else{
	    							sub_menu.css({'margin-left': -($this.offset().left), 'width' : windowW});
	    						}

	    				});
    				}
    			}

            	// Dropdown Menu
            	Devsolution.DropDownMenu();

            	// Responsive Menu
            	Devsolution.responsiveMenu();

		},

		DropDownMenu: function(){

            	var DropDownLevel  = $('.dropdown > li').find('> ul'),
            		sizeOfDropDown = DropDownLevel.children().length;


            	if(DropDownLevel.length > 0){
            		DropDownLevel.each(function(index, value){
            			var $this = $(this),
            				leftMargin = (_win.width() - $this.offset().left) - $this.outerWidth(),
            				rightOffset = _win.width() - ($this.offset().left + $this.outerWidth()),
            				ContainerWidth = $this.outerWidth() * sizeOfDropDown;

            			// Left or Right Open
            			if( rightOffset < ContainerWidth ){
            				$this.css({'left': 'initial', 'right' : '100%'});
            				$this.find('li ul').css({'left': 'initial', 'right' : '100%'});

            			}else{
            				$this.css({'right': 'initial', 'left' : '100%'});
            				$this.find('li ul').css({'right': 'initial', 'left' : '100%'});
            			}

            		});
            	}
		},

		responsiveMenu: function(){
			if($.fn.sidr){

				$('#navbar-toggle').sidr({
			      name: 'sidr-main',
			      source: '#mobile-menu',
			      side: 'right',
			      renaming: false,
			      onOpenEnd: function(){
			      	$('#navbar-toggle').addClass('active');
			      },
			      onCloseEnd: function(){
			      	$('#navbar-toggle').removeClass('active');
			      }
			    });

				_win.on('resize',function(){
					$.sidr('close', 'sidr-main');
				});

				$('.site-container').on('click', function(){
					$.sidr('close', 'sidr-main');
				});

				$('.sidr .sidr-inner .close-menu').on('click', function(){
					$.sidr('close', 'sidr-main');
				});

				// If have child li
				var $sidr 		= $('.sidr'),
					sidrInner 	= $sidr.find('.sidr-inner').first(),
					sidrNav     = sidrInner.find('ul').first(),
					parentLi    = sidrNav.find('li');


					parentLi.each(function(index, value){
						var li  = $(this);
						
						if(li.has('ul').length > 0){
							li.append('<span class="sidr-class-droped"></span>');
						}

					});

					// Child of menu
					Devsolution.sidrDropedClose('.sidr-class-droped', false);
			}

		},

		sidrDropedClose: function(element, forAll){
			$(element).on("click", function(event){
					event.preventDefault();
					var span  = $(this),
						li 	  = span.closest('li'),
						liUL  = li.find(' > ul');

						li.toggleClass('sidr-class-openli');
						span.toggleClass('sidr-class-open');

						if(li.hasClass('sidr-class-openli')){
							liUL.first().stop(true, true).slideDown();
						}else{
							liUL.first().stop(true, true).slideUp();
						}	

					return false;
			});
		},

		/* ==========================================================================
		  Header
		============================================================================= */

		headerAffix: function(){
			if( $.fn.affix ) {
				$( 'header' ).not('.not-scroll-header').each(function() {
					var header 		= $( this ),
						//topAffix 	= header.offset().top + slider; 
						topAffix 	= header.outerHeight() * 2; 

					// Homepage
					header.affix({
						offset: {
							top: function() {
								return topAffix;
							}
						}
					});

				});
			}

			// Navbar Hamburger Menu Animation
			$(".navbar-toggle").on("click", function () {
				$(this).toggleClass("active");
			});
		},

		/* ==========================================================================
		  Typed
		============================================================================= */
		textTyped: function(){
			var $typed = $(".typed-text");

			if($.fn.typed && $typed.length > 0){
				$typed.each(function(index){
					var $this 	= $(this),
						$data 	= $this.data('rotate-text'),
						$dataV 	= $data.split(',');

					if( typeof $this.data('rotate-text') !== 'undefined' ){
						$this.find('.typed-value').first().typed({
					        strings: $dataV,
					        typeSpeed: 150,
					        startDelay: 300
					    });
					}else{
						alert("Something missing");
					}
				});
			}
		},

		elementMiddle: function(){
			/* ==========================================================================
			  Middle Pagination of OwlCarosel
			============================================================================= */

			$.each({
				'.featured-image .owl-controls': '.owl-dots',
			},function(selector, delegate){
				$(selector).each(function(){
					var slider_pagination = $(this).find(delegate);
					var pagination_width  = slider_pagination.first(),
						middle 			  = Math.round(pagination_width.width() / 2);

					slider_pagination.css({'margin-left' : -middle+'px'});

				});
			});

			$.each({
				'.dev-ourteam .profile-img': '.hover ul',
			},function(selector, delegate){
				$(selector).each(function(){
					var container = $(this).find(delegate);
					var container_width  = container.first(),
						middle 			  = Math.round(container_width.width() / 2);

					container_width.css({'margin-left' : -middle+'px'});

				});
			});
		},

		/* ==========================================================================
		  MailChimp Subscriber
		============================================================================= */
		subscriber: function(){
			var $widgetSubscribe = $('.dev-newsletter form').first();

			$widgetSubscribe.submit(function() {
				var $this    = $(this),
					$email 	 = $this.find('#email'),
					$list_id = $this.data('list_id'),
					$button  = $this.find('.btn').first(),
					$message = $this.find('.input-group').last();

					$this.find('.ajaxmsg').remove();

			    if (!Devsolution.subscribeValidateEmail($email.val())){
			       	$message.after("<span class='error ajaxmsg'>The email address you entered was invalid. Please make sure you enter a valid email address to subscribe.</span>");
			    }else{   
			    		$button.addClass('loading').attr('disabled');
			            $.ajax({
			                url: './php/subscriber/subscriber.php', 
			                data: $this.serialize()+"&list_id="+$list_id,
			                type: 'POST',
			                success: function(msg) {

			                	$message.next('.ajaxmsg').first().remove();

			                	if(msg=="listfaild"){
				                   	$message.after("<span class='error ajaxmsg'>List ID not exist please use on form like data-list_id='' </span>");
			                	}else{
			                		if(msg=="success"){
				                        $email.val("");
				                        $message.after("<span class='success ajaxmsg'>You have successfully subscribed to our mailing list.</span>");
				                        
				                        // Fade message
			        					$message.parent().find('.ajaxmsg').fadeDelay(2000);
				                    }else{
				                      	$message.after("<span class='error ajaxmsg'>The email address you entered was invalid. Please make sure you enter a valid email address to subscribe.</span>");  
				                      	
				                      	// Fade message
			        					$message.parent().find('.ajaxmsg').fadeDelay(2000);
				                    }
			                	}

			                	// Remove Disabled button and loading
			        			$button.removeClass('loading').removeAttr('disabled');
			                }
			            });
			    }

			        // Fade message
			        $message.parent().find('.ajaxmsg').fadeDelay(2000);


			        return false;
			    });
		},

		subscribeValidateEmail: function(email){
			var pattern = new RegExp(/^[+a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$/i);
			return pattern.test(email);
		},

		// Custom Select box
		CustomSelect: function(){
			if($.fn.selectBoxIt){
				$('.dev-custom-sbox').selectBoxIt({
					theme: "bootstrap"
				});
			}
		},

		animsitionLinks: function(){
			if($.fn.animsition){

				var animsition_container = $(".site-container.animsition").first();

				if(animsition_container.length > 0){
					animsition_container.animsition({
					    inClass:'fade-in',
				    	outClass:'fade-out',
				    	inDuration:1500,
				    	outDuration:800,
					    linkElement:'a:not([target="_blank"]):not([href^="#"]):not(a.mfp-zoom)',
					    loading: true,
					    loadingParentElement: 'body',
					    loadingClass: 'animsition-loading',
					    loadingInner: '',
					    timeout: false,
					    timeoutCountdown: 5000,
					    onLoadEvent: true,
					    browser: [ 'animation-duration', '-webkit-animation-duration'],
					    overlay : false,
					    overlayClass : 'animsition-overlay-slide',
					    overlayParentElement : 'body',
					    transition: function(url){ window.location.href = url; }
					  });
				}
			}
		},

		sliders: {
			homeTwo: function(){
				if($.fn.revolution){
					var fullRevolution;

				 	if ($("#dev-fullwidthslider").revolution == undefined) {
                        revslider_showDoubleJqueryError("#dev-fullwidthslider");
                    } else {
                        fullRevolution = $("#dev-fullwidthslider").show().revolution({
                        	sliderType:"standard",
                            sliderLayout:"auto",				

      						responsiveLevels: [2500, 1920, 1170, 778],
						    gridwidth: [2500, 1920, 1170, 778],
							gridheight: [600, 600, 600, 600],

      						navigation: {
						      	arrows:{
						      		enable: true,
						      		left : {
								       h_offset:0,
								    },
								    right : {
								       h_offset:0,
								    }
						      	},
						      	bullets:{
							         style:"dev-bullets",
							         enable:true,
							         container: "slider",
							         hide_onmobile:true,
							         hide_onleave:true,
							         hide_delay:200,
								     hide_delay_mobile:1200,
								     hide_under:0,
								     hide_over:9999,
							         tmp:'<span></span>', 
							         direction:"horizontal",
							         space:0,       
							         h_align:"center",
							         v_align:"bottom",
							         h_offset:0,
							         v_offset:35
							    },
						    }, 

      						jsFileLocation:"assets/plugins/revolution/js/",
      						dottedOverlay: "none",
                            delay: 9000,
                            lazyType: "all",
                            shadow: 0,
                            spinner: "off",
                            disableProgressBar: "on",
                        });
                    }
				}
			},

			featuredProjects: function(){
				if($.fn.owlCarousel){
					var projectSlider = $('.featured-slider');

					if(projectSlider.length > 0){
						projectSlider.each(function(){
							$(this).owlCarousel({
								nav: true,
								navText: [ '<i class="fa fa-angle-left" aria-hidden="true"></i>', '<i class="fa fa-angle-right" aria-hidden="true"></i>'],
							    center: true,
							    items:3,
								dots: false,
								loop: true,
								autoplay: true,
								rewind: false,
							    margin: 0,
							    startPosition: 1,

							    responsiveRefreshRate: 100,
								responsiveClass:true,
								responsive:{
								    0:{
								        items:1,
								    },
								    480: {
								       	items:1,
								    },
								    776: {
								    	items:2,
								    },
								    991:{
								        items:3,
								    },
								    1200:{
								       items:3,
								    }
								}
							});
						});
					}
				}
			},

			clientSlider: function(){
				if($.fn.owlCarousel){ 
					var clients = $('.clients-slider');
					if(clients.length > 0){
						clients.each(function(){
							$(this).owlCarousel({
								nav: true,
								dots: false,
								loop: true,
								autoplay: true,
								rewind: true,
								autoplayTimeout: 3000,
								autoplayHoverPause: true,
								navText: [ '<i class="fa fa-angle-left" aria-hidden="true"></i>', '<i class="fa fa-angle-right" aria-hidden="true"></i>'],

								items: 5,
								margin: 50,
								startPosition: 1,
								responsiveRefreshRate: 100,
								responsiveClass:true,
								responsive:{
								    0:{
								        items:2,
								        nav: false
								    },
								    480: {
								       	items:3,
								        nav: false
								    },
								    991:{
								        items:3,
								        nav: false
								    },
								    1200:{
								       items:5,
								    }
								}
							});
						});
					}
				}
			}
		},

		init: function() {
			
			/* ==========================================================================
				Add Mobile Device class
			============================================================================= */
			( ! Devsolution.isHandheld ) && $( 'html' ).addClass( 'desktop' );

			/* ==========================================================================
				Setup Listeners
			============================================================================= */
			Devsolution.setupListeners();

			/* ==========================================================================
				Wait for Document.Ready
			============================================================================= */
			Devsolution.ready();
		}, 

		ready: function() {

			// Coming Soon
			Devsolution.ComingSoon();

			// Default Gallery
			Devsolution.DevGallery();

			// Projects
			Devsolution.Projects();

			// Dev Timeline
			Devsolution.DevTimeline();

			// Carousel for featured projects
			Devsolution.sliders.featuredProjects();

			// Carousel for clients
			Devsolution.sliders.clientSlider();

			/* ==========================================================================
			  Custom Dropdown
			============================================================================= */

			Devsolution.SelectDrop();

			/* ==========================================================================
			  Modals
			============================================================================= */

			Devsolution.DevModals();

			/* ==========================================================================
			  Mega Menu
			============================================================================= */
			Devsolution.megamenu();

			/* ==========================================================================
			  Middle element
			============================================================================= */

			Devsolution.elementMiddle();

			/* ==========================================================================
			  Subscriber Form
			============================================================================= */

			Devsolution.subscriber();

			/* ==========================================================================
			  Custom Select Box Plugin
			============================================================================= */

			Devsolution.CustomSelect();

			/* ==========================================================================
			  Page Transition
			============================================================================= */

			Devsolution.animsitionLinks();

			/* ==========================================================================
			  Tooltip
			============================================================================= */
			$('.footer-social li a, .social li a, .nav-socials li a').tooltip();

			if($.fn.popover){

				_doc.on('click', '.circle-box a', function(event){
					event.preventDefault();
				});

				$('.circle-box a').popover({
						html: true,
						trigger: 'hover',
						delay: { show: 300, hide: 100 },
						placement: 'top',
				});
			}
			/* ==========================================================================
				Add transition class
			============================================================================= */
			if( Devsolution.cssTransitions ) {
				$( 'html' ).addClass( 'csstransitions' );
			}

			/* ==========================================================================
				ScrollSpy
			============================================================================= */
			if( $.fn.scrollspy ) {
				$( document.body ).scrollspy({
					target: '#navigation'
				});
			}

			/* ==========================================================================
				Media Elements
			============================================================================= */
			if( $.fn.mediaelementplayer ) {
				if($.fn.fitVids){
					$('.video-wrapper iframe, .video-wrapper embed').fitVids();
				}

				$('audio,video').mediaelementplayer({
					enableKeyboard: false,
					features: [],
					success: function(media, node, player) {
						$('#' + node.id + '-mode').html('mode: ' + media.pluginType);
					}
				});

			}

			/* ==========================================================================
				Parallax Sections
			============================================================================= */
			if( $.fn.parallax ) {
				$( '[data-background]' ).not(".google-maps, ul.devModals, .banner-box > li").each(function() {
					$( this ).parallax( $.extend( true, {
						lazyLoad: true, 
						mode: Devsolution.isHandheld ? 'none' : 'parallax', 
						activeClass: 'has-bg', 
						fixedBgClass: 'bg-fixed', 
						parallaxClass: 'bg-fixed', 
						speedFactor: 0.3
					}, $( this ).data() ) );
				});
			}

			/**
			 *
			 * Custom Backgrounds
			 *
			 */

			 $('[data-custom-background]').each(function(){

			 	var cbg = $(this),
			 		bg  = cbg.data('custom-background');

			    cbg.css({
			        'background-image': 'url('+bg+')',
			        'background-repeat': 'no-repeat'
			    });
			 });
			


			/* ==========================================================================
				Counter Animation
			============================================================================= */
			if( 'function' == typeof countUp ) {
				$( '.devex-counter' ).each(function() {
					var el = $( this ).find( '.nums' ), 
						counter, suffix, countTo = parseInt( el.text(), 10 );

					var hasSuffix = el.data().hasOwnProperty("suffix");

					hasSuffix === true ? suffix = el.data('suffix') : "";

					var options = {
						 useEasing : true, 
						 useGrouping : true, 
						 separator : ',', 
						 decimal : '.', 
						 prefix : '', 
						 suffix : suffix
					};


					if( el.length && $.isNumeric( countTo ) ) {
						el.html( 0 );
						counter = new countUp( el[0], 0, countTo, 0, 2.5, options );
						el.waypoint(function() { counter.start(function() { counter = null; }); }, { offset: '70%', triggerOnce: true });
					}
				});
			}


			/* ==========================================================================
				Smooth Scrolling
			============================================================================= */
			_doc.on( 'click', '#gotop', function(e) {
				var href = $( this ).attr( 'href' ), 
					target = ( '#' == href ) ? 0 : document.getElementById( href.split(/#/).pop() );

				if( null !== target ) {

					target = ( 0 == target ) ? 0 : $( target ).offset().top;

					$( 'html, body' ).stop().animate({ scrollTop: target }, Devsolution.isHandheld ? 0 : 750 );
					e.preventDefault();
				}
			});



			/* ==========================================================================
				Magnific Popup
			============================================================================= */
			if( $.fn.magnificPopup ) {

				// Each Image
				$.each({
					'.gallery-item': 'a.mfp-zoom',
					'.videobg': 'a.playbtn',
					'.hover': 'a.open-popup',
				}, function( selector, delegate ) {
					$( selector ).each(function() {

						var type = $(this).find(delegate).data('type');
						(type == 'video' || type  == 'html') ? type = 'iframe' : type = 'image';

						var defaults = {
							delegate: delegate,
							type: type,
							gallery: delegate ? {enable: true} : false
						};


						// Title
						var title 	= $(selector).data('title') !== 'undefined' ? $(selector).data('title') : false;
						var titlable = {
							image: {
								titleSrc: 'title'
							}
						};

						if(title){
							defaults = $.extend(defaults, titlable);
						}

						// Zoom Animation
						var zoom 		= $(selector).data('zoom') !== 'undefined' ? $(selector).data('zoom') : false;
						var zoomable 	= {
							zoom: {
							    enabled: true, // By default it's false, so don't forget to enable it

							    duration: 300, // duration of the effect, in milliseconds
							    easing: 'ease-in-out', // CSS transition easing function

							    opener: function(openerElement) {
							      var image = openerElement.closest('.post-item').find('img');
							      return image.is('img') ? image : image.find('img');
							    }
							}
						};

						if(zoom){
							defaults = $.extend(defaults, zoomable);
						}

						// Markup Iframe
						var markup  = $(selector).find(delegate).first().data('markup') !== 'undefined'  ? true : false;

						var markupable = {
							iframe: {
								markup: '<div class="mfp-iframe-scaler dev-iframe">'+
							            	//'<div class="mfp-close"></div>'+
							            	'<iframe class="mfp-iframe" frameborder="0" allowfullscreen></iframe>'+
							          	'</div>', // HTML markup of popup, `mfp-close` will be replaced by the close button

							     patterns: {
								    youtube: {
								      index: 'youtube.com/', // String that detects type of video (in this case YouTube). Simply via url.indexOf(index).

								      id: 'v=', // String that splits URL in a two parts, second part should be %id%
								      // Or null - full URL will be returned
								      // Or a function that should return %id%, for example:
								      // id: function(url) { return 'parsed id'; }

								      src: '//www.youtube.com/embed/%id%?autoplay=1' // URL that will be set as a source for iframe.
								    },
								    vimeo: {
								      index: 'vimeo.com/',
								      id: '/',
								      src: '//player.vimeo.com/video/%id%?autoplay=1'
								    },
								    gmaps: {
								      index: '//maps.google.',
								      src: '%id%&output=embed'
								    }

								  },
							}
						}

						if(markup){
							defaults = $.extend(defaults, markupable);
						}


						$( this ).magnificPopup(defaults);

						$( this ).on("click", function(){
							return false;
						});

					});
				});
			}

			/* ==========================================================================
				Progressbar
			============================================================================= */
			if( $.fn.waypoint ) {
				$( '.progress' ).waypoint(function( direction ) {
					var value = $( this ).data( 'value' ) || 100;
					$( this ).find( '.progress-bar' ).css({ 'width': value + '%' });
				}, {
					triggerOnce: true, 
					offset: function() {
						return $.waypoints( 'viewportHeight' ) - 1;
					}
				});
			}

			/* ==========================================================================
				Placeholder
			============================================================================= */
			$.fn.placeholder && $( '[placeholder]' ).placeholder();

			/* ==========================================================================
				Contact Form
			============================================================================= */
			if( $.validator && $.fn.ajaxSubmit ) {
				(function() {
					var formSelector = '.form-group,[class*="col-xs-"],[class*="col-sm-"],[class*="col-md-"],[class*="col-lg-"]';

					// override jquery validate plugin defaults
					$.validator.setDefaults({
						highlight: function( el ) {
							$( el ).closest( formSelector ).addClass( 'has-error' );
						},
						unhighlight: function( el ) {
							$( el ).closest( formSelector ).removeClass( 'has-error' );
						},
						errorElement: 'span',
						errorClass: 'help-block',
						errorPlacement: function( error, el ) {
							error.insertAfter( el );
						}
					});

					$( '.contact-form' ).each(function() {
						$( this ).validate({
							submitHandler: function( form ) {

								var appendLoading = $(form).find('.devbtn').parent();

								// Loading Gif
								$( _doc[0].createElement( 'span' ) )
									.addClass('loading')
									.appendTo(appendLoading);

								$(form).find('.alert').remove();

								// Messages
								$( form ).ajaxSubmit(function( response ) {

									// Remove Gif
									$(form).find('.loading').remove();

									response = $.parseJSON( response );
									$( _doc[0].createElement( 'div' ) )
										.addClass( 'alert' )
										.toggleClass( 'alert-danger', ! response.success )
										.toggleClass( 'alert-success', response.success )
										.html( response.message )
										.prepend( '<button type="button" class="close" data-dismiss="alert">&times;</button>' )
										.hide().prependTo( form ).slideDown();

									if( response.success ) {
										$( form ).resetForm();
									}
								});
							}
						});
					});
				})();
			}

			/* ==========================================================================
				Waypoints Entry Animation
			============================================================================= */

			if( ! Devsolution.isHandheld && Devsolution.cssAnimations && $.fn.devAnimate ) {
				$( '.section-row .row' ).filter(function() {
					// Prevent nested row animations
					return $( this ).parents( '.row' ).length == 0;
				}).devAnimate();

				// Full width animated
				$('.animation-full').filter(function(){
					return $(this);
				}).devAnimate();
			}

			/* ==========================================================================
				Contextual Setups
			============================================================================= */
			Devsolution.setup();

			/* ==========================================================================
				Fire initial window resize callbacks
			============================================================================= */
			_win.triggerHandler( 'resize' );
		}, 

		setupListeners: function() {

			/* ==========================================================================
				Monitor Document Height Changes
			============================================================================= */
			(function( callback ) {
				var db = document.body, 
					dd = document.documentElement, 
					docHeight = Math.max(
						db.scrollHeight, dd.scrollHeight,
						db.offsetHeight, dd.offsetHeight,
						db.clientHeight, dd.clientHeight
					);

				function domChangeListener() {
					var currDocHeight = Math.max(
						db.scrollHeight, dd.scrollHeight,
						db.offsetHeight, dd.offsetHeight,
						db.clientHeight, dd.clientHeight
					);

					if( currDocHeight != docHeight ) {
						docHeight = currDocHeight;
						callback();
					}
					setTimeout( domChangeListener, 1000 );
				}

				domChangeListener();
			})( Devsolution.onDocHeightChange );

			/* ==========================================================================
				Window.Resize
			============================================================================= */
			var resizeTimer, n;
			_win.on( 'resize orientationchange', function() {
				if( resizeTimer ) clearTimeout( resizeTimer );
				resizeTimer = setTimeout(function() {
					for( n = 0; n < Devsolution.resizeCallbacks.length; n++ ) {
						var cb = Devsolution.resizeCallbacks[n];
						'function' == typeof cb.callback && cb.callback.apply( cb.context || window );
					}
				}, 50);
			});
		}, 

		setup: function( context ) {
			context = $( context );

			if( ! context.length )
				context = $( document.body );

			/* ==========================================================================
				Tooltips
			============================================================================= */
			if( $.fn.tooltip ) {
				context.find( '[rel="tooltip"]' ).tooltip();
			}


			/* ==========================================================================
				FitVids
			============================================================================= */
			if( $.fn.fitVids ) {
				context.find( '.media' ).fitVids();
			}

			/* ==========================================================================
				Sliders
			============================================================================= */

			Devsolution.sliders.homeTwo();

			/* ==========================================================================
				Header
			============================================================================= */

			Devsolution.headerAffix();

		}, 

		windowLoad: function() {

			/* ==========================================================================
				Google Maps
			============================================================================= */
			if( $.fn.DevGoogleMaps ) {
				$( '.google-maps' ).DevGoogleMaps();
			}
		}, 

		onDocHeightChange: function() {

			if( $.fn.scrollspy ) {
				$( document.body ).scrollspy( 'refresh' );
			}

			if( $.waypoints ) {
				$.waypoints( 'refresh' );
			}

			if( $.fn.parallax ) {
				$( '[data-background]' ).not(".google-maps, .devModals, .banner-box > li").parallax( 'refresh' );
			}
		},

		onResizeWindow: function(){
			/* ==========================================================================
			  Mega Menu
			============================================================================= */
			Devsolution.megamenu();

			// Dev Timeline
			Devsolution.DevTimeline();
		}
	};
 
	_doc.ready(function(){ // don't change with .on('ready',function(){...}) => it't depricated
		/* ==========================================================================
			Window.Load
		============================================================================= */
		_win.on("load", Devsolution.windowLoad);

		/* ==========================================================================
		  Window Resize
		============================================================================= */

		_win.on('resize', Devsolution.onResizeWindow);

		/* ==========================================================================
		 When is document ready
		============================================================================= */

		Devsolution.init();

		/* EOF */
	});

}) ( jQuery, window, document );

