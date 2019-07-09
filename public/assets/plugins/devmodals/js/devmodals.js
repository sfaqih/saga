/* ==========================================================================
 - document:  DevSolution Modals - HTML5 and CSS3 powered modal popups
 - author:    Sami Maxhuni
 - profile:   http://codecanyon.net/user/DevSolution
 - version:   1.0
============================================================================= */

(function($){
	$.fn.devModals = function(options){
		// Settings
        var settings = $.extend({

            // Functionality
            popupType: null,
            delayTime: null,
            exitTopDistance: null,
            scrollTopDistance: null,
            setCookie: false,
            cookieDays: null,
            cookieTriggerClass: "setDevCookies",
            cookieName: "DevCookies",

            // Overlay options
            overlayBg: false,
            overlayBgColor: null,
            overlayTransition: null,
            overlayTransitionSpeed: null,

            // Background effects
            bgEffect: null,
            blurBgRadius: null,
            scaleBgValue: null,

            // Window options
            windowWidth: null,
            windowHeight: null,
            windowLocation: null,
            windowTransition: null,
            windowTransitionSpeed: null,
            windowTransitionEffect: null,
            windowShadowOffsetX: null,
            windowShadowOffsetY: null,
            windowShadowBlurRadius: null,
            windowShadowSpreadRadius: null,
            windowShadowColor: null,
            windowBackground: null,
            windowRadius: null,
            windowMargin: null,
            windowPadding: null,

            // Close and open button
            closeButton: null,
            wrapperID: "#dev-modals-js",

        }, options);
		
		return this.each(function () {
            var $this = $(this),
           		self  = $(settings.wrapperID);

            // Popup types
            function showModal() {
                $(self).addClass("isActive");
            };
            function hideModal() {
                $(self).removeClass("isActive");
            };
            if (settings.popupType === "delayed") {
                if (document.cookie.indexOf(settings.cookieName) < 0) {
                    setTimeout(showModal, settings.delayTime + 200);
                    setTimeout(beginBgEffects, settings.delayTime);
                }
            }
            if (settings.popupType === "exit") {
                $(document).mousemove(function(e) {
                    if ((document.cookie.indexOf(settings.cookieName) < 0) && (e.clientY <= settings.exitTopDistance)) {
                        showModal();
                        beginBgEffects();
                    }
                });
            }
            if (settings.popupType === "scrolled") {
                $(document).scroll(function() {
                    var y = $(this).scrollTop();
                    if ((document.cookie.indexOf(settings.cookieName) < 0) && (y > settings.scrollTopDistance)) {
                        showModal();
                        beginBgEffects();
                    }
                });
            }
            if (document.cookie.indexOf(settings.cookieName) >= 0) {
                hideModal();
                endBgEffects();
            }

            // Background Effects
            var page = "body > *";
            function beginBgEffects() {
                function beginBluring() {
                    $(page).not(".devModals").addClass("blurred").css({
                        "-webkit-filter" : "blur" + "(" + settings.blurBgRadius + ")",
                        "-moz-filter" : "blur" + "(" + settings.blurBgRadius + ")",
                        "-ms-filter" : "blur" + "(" + settings.blurBgRadius + ")",
                        "filter" : "blur" + "(" + settings.blurBgRadius + ")",
                    });
                };
                function beginScaling() {
                    $(page).not(".devModals").addClass("scaled").css({
                        "-webkit-transform" : "scale" + "(" + settings.scaleBgValue + ")",
                        "-moz-transform" : "scale" + "(" + settings.scaleBgValue + ")",
                        "-ms-transform" : "scale" + "(" + settings.scaleBgValue + ")",
                        "transform" : "scale" + "(" + settings.scaleBgValue + ")",
                    });
                };
                if (settings.bgEffect === "blur") {
                    beginBluring()
                };
                if (settings.bgEffect === "scale") {
                    beginScaling()
                };
                if (settings.bgEffect === "both") {
                    beginBluring();
                    beginScaling();
                };
                $(page).not(".devModals").css({
                   "-webkit-transition-duration" : settings.overlayTransitionSpeed + "s",
                   "-moz-transition-duration" : settings.overlayTransitionSpeed + "s",
                   "-ms-transition-duration" : settings.overlayTransitionSpeed + "s",
                   "transition-duration" : settings.overlayTransitionSpeed + "s",
                });
            };
            function endBgEffects() { 
                $(page).removeClass("blurred scaled").css({
                    "-webkit-transform" : "",
                    "-moz-transform" : "",
                    "-ms-transform" : "",
                    "transform" : "",
                    "-webkit-filter" : "",
                    "-moz-filter" : "",
                    "-ms-filter" : "",
                    "filter" : "",
                });
            };

            // Overlay styling
            function showOverlay() {

                // if exist don't apply
                if($(self).find('.dev-overlay').length == 0){
                    $(self).prepend("<div class='dev-overlay devClosModal'>" + "</div>");
                    $(self).children(".dev-overlay").addClass(settings.overlayTransition + " " + settings.cookieTriggerClass).css({
                        "background" : settings.overlayBgColor,
                        "-webkit-transition-duration" : settings.overlayTransitionSpeed + "s",
                        "-moz-transition-duration" : settings.overlayTransitionSpeed + "s",
                        "-ms-transition-duration" : settings.overlayTransitionSpeed + "s",
                        "transition-duration" : settings.overlayTransitionSpeed + "s",
                    });
                }
            };
            if (settings.overlayBg === true) {
                showOverlay();
            };

            // Add close button
            if($(self).children(".dev-window").find('.devClosModal').length == 0){
                $(self).children(".dev-window").prepend("<div class='close devClosModal'>" + "</div>");
                $(self).find(".dev-window").children(".devClosModal").addClass(settings.closeButton + " " + settings.cookieTriggerClass);
            }

            // Close Video
            function closeVideos(){
                var iframes     = $(self).children(".dev-window").find('iframe'),
                    srcIframe   = iframes.attr('src');

                iframes.attr('src', '');
                iframes.attr('src', srcIframe); 
            }


            // Window styling
            function windowStyling() {

                // If auto click
                if($(self).hasClass('dev-modal-triggerd')){
                    $(self).addClass('dev-once-modal');                
                }
                
                // end auto click

                if (settings.overlayBg === false) {
                    $(self).css({
                        "width" : settings.windowWidth,
                        "height" : settings.windowHeight,
                        "margin" : settings.windowMargin
                    }).addClass(settings.windowLocation);

                    $(self).children(".dev-window").addClass(settings.windowLocation + " " + settings.windowTransitionEffect + " " + settings.windowTransition).css({
                        "width": "100%",
                        "height": "100%",
                        "box-shadow" : settings.windowShadowOffsetX + " " + settings.windowShadowOffsetY + " " + settings.windowShadowBlurRadius + " " + settings.windowShadowSpreadRadius + " " + settings.windowShadowColor,
                        "background" : settings.windowBackground,
                        "border-radius" : settings.windowRadius,
                        "padding" : settings.windowPadding,
                        "-webkit-transition-duration" : settings.windowTransitionSpeed + "s",
                        "-moz-transition-duration" : settings.windowTransitionSpeed + "s",
                        "-ms-transition-duration" : settings.windowTransitionSpeed + "s",
                        "transition-duration" : settings.windowTransitionSpeed + "s",
                    });

                    if (settings.windowLocation === "center") {
                        $(self).css({
                            "margin" : "auto",
                        });
                    }

                }else{

                     $(self).children(".dev-window").addClass(settings.windowLocation + " " + settings.windowTransitionEffect + " " + settings.windowTransition).css({
                        "width" : settings.windowWidth,
                        "height" : settings.windowHeight,
                        "box-shadow" : settings.windowShadowOffsetX + " " + settings.windowShadowOffsetY + " " + settings.windowShadowBlurRadius + " " + settings.windowShadowSpreadRadius + " " + settings.windowShadowColor,
                        "background" : settings.windowBackground,
                        "border-radius" : settings.windowRadius,
                        "margin" : settings.windowMargin,
                        "padding" : settings.windowPadding,
                        "-webkit-transition-duration" : settings.windowTransitionSpeed + "s",
                        "-moz-transition-duration" : settings.windowTransitionSpeed + "s",
                        "-ms-transition-duration" : settings.windowTransitionSpeed + "s",
                        "transition-duration" : settings.windowTransitionSpeed + "s",
                    });

                    if (settings.windowLocation === "center") {
                        $(self).children(".dev-window").css({
                            "margin" : "auto",
                        });
                    };
                }

                // Modified for responsive
                $(window).on("load resize", function(){
                    var width   = $(window).width();
                    var height  = $(window).height();


                    if(parseInt(settings.windowWidth) >= width){

                        if (settings.overlayBg === false) {
                            var windowElement   = $(self);
                        }else{
                            var windowElement   = $(self).children(".dev-window");
                        }

                        // Width Contain Percentage
                        if(settings.windowWidth.indexOf('%') >= 0){
                            var aspectWidth     = parseInt(width / windowElement.width());
                        }else{
                            var aspectWidth     = parseInt(settings.windowWidth);  
                        }

                        if(settings.windowHeight.indexOf('%') >= 0){
                            var aspectHeight    = parseInt(height / windowElement.height());
                        }else{
                            var aspectHeight    = parseInt(settings.windowHeight); 
                        }

                        var aspectRatio     = aspectWidth+":"+aspectHeight;
                        var t = $.type( aspectRatio );

                        
                        if ( t !== 'string' && t !== 'number' ) {
                            return;
                        }else if ( t === 'string' && /\d+\:\d+/.test( aspectRatio ) ) { 
                            aspectRatio = aspectRatio.match(/(\d+)\:(\d+)/);
                            aspectRatio = aspectRatio[1] / aspectRatio[2];
                            aspectRatio = 1 / aspectRatio;
                        }


                        if (settings.overlayBg === false) {
                            $(self).css({
                                "padding-top": aspectRatio * 100 + "%"
                            }).addClass("auto-height");

                            // If is lower then window element
                            if(width <= windowElement.width()){
                                $(self).children(".dev-window").css({
                                    "width": "100%",
                                    "height": "100%"
                                });
                            }

                        }else{
                            $(self).children(".dev-window").css({
                                "padding-top": aspectRatio * 100 + "%"
                            }).addClass("auto-height");
                        }

                    }else{

                        $(self).children(".dev-window").css({
                            "width": settings.windowWidth,
                            "height": settings.windowHeight,
                            "padding" : settings.windowPadding,
                            "overflow": "hidden",// inherit
                        }).removeClass('auto-height');

                        if (settings.overlayBg === false) {
                            $(self).css({
                                "padding" : settings.windowPadding
                            }).removeClass('auto-height');

                            if(settings.windowWidth.indexOf('%') >= 0){
                                $(self).children(".dev-window").css({
                                    "width": "100%",
                                    "height": "100%",
                                    "padding" : settings.windowPadding,
                                    "overflow": "hidden",
                                }).removeClass('auto-height');
                            }
                        }
                        
                    }
                });

            };
            windowStyling();

            // Set a cookie to hide modal
            if (settings.setCookie === true) {
                function DevCookie() {
                    days = settings.cookieDays;
                    CookieDate = new Date();
                    if (days > 0) {
                        CookieDate.setTime(CookieDate.getTime() + (days * 24 * 60 * 60 * 1000));
                        document.cookie = settings.cookieName + "=true; expires=" + CookieDate.toGMTString();
                    }
                    if (days === 0) {
                        document.cookie = settings.cookieName + "=true;";
                    }
                }
                var cookie = document.cookie.split(";").map(function (x) {
                    return x.trim().split("=");
                }).filter(function (x) {
                    return x[0] === settings.cookieName;
                }).pop();
                $("." + settings.cookieTriggerClass).on("click", function () {
                    DevCookie();
                });
            };

            // Close modal
            $(".devClosModal").on("click", function () {
                hideModal();
                endBgEffects();

                // Close Video
                closeVideos();
            });

            if($this.hasClass('dev-once-modal') === false){
			    $this.on("click", function(event){

                    if($this.hasClass('dev-once-modal')){
                        return false;
                    }

				    event.preventDefault();
				    showModal();
				    beginBgEffects();

                    // On load actions
                    if(typeof settings.onLoad == 'function'){
                        settings.onLoad.call(this);
                    }

			    });
            }

        });

	}
})(jQuery);