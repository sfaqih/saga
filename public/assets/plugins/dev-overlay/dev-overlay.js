/* ==========================================================================
  Overlay Search Box
============================================================================= */
(function($) {

	// If not exist overlay stop function
	if($('.overlay').length === 0) return false; 

	// If not exist button 
	if($('#trigger-overlay').length === 0) return false;

	if($('.overlay-close').length === 0) return false;

	var container = document.querySelector( 'div.site-container' ),
		triggerBttn = document.getElementById( 'trigger-overlay' ),
		overlay = document.querySelector( 'div.overlay' ),
		closeBttn = overlay.querySelector( '.overlay-close' ),
		transEndEventNames = {
			'WebkitTransition': 'webkitTransitionEnd',
			'MozTransition': 'transitionend',
			'OTransition': 'oTransitionEnd',
			'msTransition': 'MSTransitionEnd',
			'transition': 'transitionend'
		},

		transEndEventName = transEndEventNames[ Modernizr.prefixed( 'transition' ) ],
		support = { transitions : Modernizr.csstransitions };

	function toggleOverlay(event) {
		event.preventDefault();
		if( classie.has( overlay, 'open' ) ) {
			classie.remove( overlay, 'open' );
			classie.remove( container, 'overlay-open' );
			classie.add( overlay, 'close' );
			var onEndTransitionFn = function( ev ) {
				if( support.transitions ) {
					if( ev.propertyName !== 'visibility' ) return;
					this.removeEventListener( transEndEventName, onEndTransitionFn );
				}
				classie.remove( overlay, 'close' );
			};
			if( support.transitions ) {
				overlay.addEventListener( transEndEventName, onEndTransitionFn );
			}
			else {
				onEndTransitionFn();
			}
		}
		else if( !classie.has( overlay, 'close' ) ) {
			classie.add( overlay, 'open' );
			classie.add( container, 'overlay-open' );
		}
	}

	triggerBttn.addEventListener( 'click', toggleOverlay);
	closeBttn.addEventListener( 'click', toggleOverlay );
})(jQuery);