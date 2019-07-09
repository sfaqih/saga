(function($){
	 $.fn.devtimeline = function( options ) {
 
        // Default options
        var settings = $.extend({
        	treeEl: '.timeline-tree',
            treeItem: 'li',
            contentEl: '.timeline-content',
            contentItem: '.timeline-item',
            contentInner: '.timeline-inner',
        }, options );

		this.each(function() {
			var $el 			= $(this),
				$contentWidth   = $el.find(settings.contentEl).outerWidth(),
				$contentLength  = $el.find(settings.contentItem).length,
				$currentItem    = $el.find(settings.treeEl+ " " +settings.treeItem+ ".active"),
				$marginLeftC    = $currentItem.index() * $contentWidth;

			// Reset Margin Left
			$el.find(settings.contentInner).first().css({'margin-left': "-"+$marginLeftC+"px"});

			// Inner Content set max width
			$el.find(settings.contentEl + " > " + settings.contentInner).css("width", ($contentLength * $contentWidth) + "px" );

			// Content Item assign width
			$el.find(settings.contentItem).each(function(){
				$(this).width($contentWidth);
			});

			// On Click Timeline event
			$el.find(settings.treeEl).stop().on('click', settings.treeItem, function(event){
				event.preventDefault();
				var $item 	= $(this),
					$sItemW = $item.index() * $contentWidth;       

				// Tree
				$item.siblings().removeClass('active');
				$item.addClass('active');

				// Slide Content
				$el.find(settings.contentInner).first().clearQueue().animate({
				    marginLeft: "-"+ $sItemW +"px"
				}, 500);

			});
		});

		return this;
    };
})(jQuery);