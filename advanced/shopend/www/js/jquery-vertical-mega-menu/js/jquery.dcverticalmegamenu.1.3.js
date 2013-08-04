/*
 * DC Vertical Mega Menu - jQuery vertical mega menu
 * Copyright (c) 2011 Design Chemical
 *
 * Dual licensed under the MIT and GPL licenses:
 * 	http://www.opensource.org/licenses/mit-license.php
 * 	http://www.gnu.org/licenses/gpl.html
 *
 */
(function($){

	//define the new for the plugin ans how to call it	
	$.fn.dcVerticalMegaMenu = function(options){
		//set default options  
		var defaults = {
			classParent: 'dc-mega',
			arrow: true,
			classArrow: 'dc-mega-icon',
			classContainer: 'sub-container',
			classSubMenu: 'sub',
			classMega: 'mega',
			classSubParent: 'mega-hdr',
			classSubLink: 'mega-hdr',
			classRow: 'span6',
			rowItems: 3,
			speed: 'fast',
			effect: 'show',
			direction: 'right'
		};

		//call in the default otions
		var options = $.extend(defaults, options);
		var $dcVerticalMegaMenuObj = this;

		//act upon the element that is passed into the design    
		return $dcVerticalMegaMenuObj.each(function(options){

			$mega = $(this);
			if(defaults.direction == 'left'){
				$mega.addClass('left');
			} else {
				$mega.addClass('right');
			}
			// Get Menu Width
			var megaWidth = $mega.width();
			
			// Set up menu
			$('> li',$mega).each(function(){
				
				var $parent = $(this);
				var $megaSub = $('> ul',$parent);
	
				if($megaSub.length > 0){
					
				$('> a',$parent).addClass(defaults.classParent).append('<span class="'+defaults.classArrow+'"></span>');
					$megaSub.addClass(defaults.classSubMenu).wrap('<div class="'+defaults.classContainer+'" />');
					var $container = $('.'+defaults.classContainer,$parent);
					
					if($('ul',$megaSub).length > 0){
						
						$parent.addClass(defaults.classParent+'-li');
						$container.addClass(defaults.classMega);
						
						// Set sub headers
						$('> li',$megaSub).each(function(){
							$(this).addClass('mega-unit');
							if($('> ul',this).length){
								$(this).addClass(defaults.classSubParent);
								$('> a',this).addClass(defaults.classSubParent+'-a');
							} else {
								$(this).addClass(defaults.classSubLink);
								$('> a',this).addClass(defaults.classSubLink+'-a');
							}
						});
						
						// Create Rows
						var hdrs = $('.mega-unit',$parent);
						rowSize = parseInt(defaults.rowItems);
						for(var i = 0; i < hdrs.length; i+=rowSize){
							hdrs.slice(i, i+rowSize).wrapAll('<div class="'+defaults.classRow+'" />');
						}

						// Get mega dimensions
						var itemWidth = $('.mega-unit',$megaSub).outerWidth(true);
						var rowItems = $('.row:eq(0) .mega-unit',$megaSub).length;
						var innerItemWidth = itemWidth * rowItems;
						var totalItemWidth = innerItemWidth + containerPad;

						// Set mega header height
						$('.row',this).each(function(){
							$('.mega-unit:last',this).addClass('last');
							var maxValue = undefined;
							$('.mega-unit > a',this).each(function(){
								var val = parseInt($(this).height());
								if (maxValue === undefined || maxValue < val){
									maxValue = val;
								}
							});
							$('.mega-unit > a',this).css('height',maxValue+'px');
							$(this).css('width',innerItemWidth+'px');
						});
						var subWidth = $megaSub.outerWidth(true);
						var totalWidth = $container.outerWidth(true);
						var containerPad = totalWidth - subWidth;
						// Calculate Row Height
						$('.row',$megaSub).each(function(){
							var rowHeight = $(this).height();
							$(this).parent('.row').css('height',rowHeight+'px');
						});
						$('.row:last',$megaSub).addClass('last');
						$('.row:first',$megaSub).addClass('first');
					} else {
						$container.addClass('non-'+defaults.classMega);
					}
				} 
			
				var $container = $('.'+defaults.classContainer,$parent);
				var subWidth = $megaSub.outerWidth(true);
				// Get flyout height
				var subHeight = $container.height();
				var itemHeight = $parent.outerHeight(true);
				// Set position to top of parent
				$container.css({
					height: subHeight+'px',
					marginTop: -itemHeight+'px',
					zIndex: '1000',
					width: subWidth+'px'
				}).hide();
			});

			// HoverIntent Configuration
			var config = {
				sensitivity: 2, // number = sensitivity threshold (must be 1 or higher)
				interval: 100, // number = milliseconds for onMouseOver polling interval
				over: megaOver, // function = onMouseOver callback (REQUIRED)
				timeout: 0, // number = milliseconds delay before onMouseOut
				out: megaOut // function = onMouseOut callback (REQUIRED)
			};
			
			$('li',$dcVerticalMegaMenuObj).hoverIntent(config);
				
			function megaOver(){
				$(this).addClass('mega-hover');
				var $link = $('> a',this);
				var $subNav = $('.sub',this);
				var $container = $('.sub-container',this);
				var width = $container.width();
				var outerHeight = $container.outerHeight();
				var height = $container.height();
				var itemHeight = $(this).outerHeight(true);
				var offset = $link.offset();
				var scrollTop = $(window).scrollTop();
				var offset = offset.top - scrollTop
				var bodyHeight = $(window).height();
				var maxHeight = bodyHeight - offset;
				var xsHeight = maxHeight - outerHeight;
			
				if(xsHeight < 0){
					var containerMargin = xsHeight - itemHeight;
					$container.css({marginTop: containerMargin+'px'});
				}
				
				var containerPosition = {right: megaWidth};
				if(defaults.direction == 'right'){
					containerPosition = {left: megaWidth};
				}
				
				if(defaults.effect == 'fade'){
					$container.css(containerPosition).fadeIn(defaults.speed);
				}
				if(defaults.effect == 'show'){
					$container.css(containerPosition).show();
				}
				if(defaults.effect == 'slide'){
					$container.css({
						width: 0,
						height: 0,
						opacity: 0});
					
					if(defaults.direction == 'right'){
				
						$container.show().css({
							left: megaWidth
						});
					} else {
					
						$container.show().css({
							right: megaWidth
						});
					}
					$container.animate({
							width: width,
							height: height,
							opacity: 1
						}, defaults.speed);
				}
			}
			
			function megaOut(){
				$(this).removeClass('mega-hover');
				var $container = $('.sub-container',this);
				$container.hide();
			}
		});
	};
})(jQuery);