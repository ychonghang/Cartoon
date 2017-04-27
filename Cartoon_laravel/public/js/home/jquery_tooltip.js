/**
 *  jQuery Tooltip Plugin
 *@requires jQuery v1.2.6
 *  http://www.socialembedded.com/labs
 *
 *  Copyright (c)  Hernan Amiune (hernan.amiune.com)
 *  Dual licensed under the MIT and GPL licenses:
 *  http://www.opensource.org/licenses/mit-license.php
 *  http://www.gnu.org/licenses/gpl.html
 * 
 *  Version: 1.0
 */
 
(function($){ $.fn.tooltip = function(options){

    var defaults = {
        cssClass: "",     //CSS class or classes to style the tooltip
		delay : 0,        //The number of milliseconds before displaying the tooltip
        duration : 0,   //The number of milliseconds after moving the mouse cusor before removing the tooltip.
        xOffset : 15,     //X offset will allow the tooltip to appear offset by x pixels.
        yOffset : 15,     //Y offset will allow the tooltip to appear offset by y pixels.
		opacity : 0,      //0 is completely opaque and 100 completely transparent
		fadeDuration: 0, //[toxi20090112] added fade duration in millis (default = "normal")
    	show : function(el,tip){
			tip.data("title",el.attr("title"));
			el.attr("title","");
			tip.data("alt",el.attr("alt"));
			el.attr("alt","");	
			tip.html(tip.data("title"));
		},
		hide : function(el,tip){
			el.attr("title",tip.data("title"));
			el.attr("alt",tip.data("alt"));
		}
	};
  
    var options = $.extend(defaults, options);
	
	
	return this.each(function(index) {
		
		var $this = $(this);
		
		//use just one div for all tooltips
		// [toxi20090112] allow the tooltip div to be already present (would break currently)
		$tooltip=$("#divTooltip");
		if($tooltip.length == 0){
			$tooltip = $('<div id="divTooltip"></div>');			
			$('body').append($tooltip);
			$tooltip.hide();
		}
		
		if($this.attr('tooltip')=='tooltip'){
			return true
		}else{
			$this.attr('tooltip','tooltip');
		};
		
		//displays the tooltip
		$this.mouseover(function(e){
			//compatibility issue
			e = e ? e : window.event;
			
			//don't hide the tooltip if the mouse is over the element again
			clearTimeout($tooltip.data("hideTimeoutId"));
			
			//set the tooltip class
			$tooltip.removeClass($tooltip.attr("class"));
			$tooltip.css("width","");
			$tooltip.css("height","");
			$tooltip.addClass(options.cssClass);
			$tooltip.css("opacity",1-options.opacity/100);
			$tooltip.css("position","absolute");			
			
			//save the title text and remove it from title to avoid showing the default tooltip
			if(options.show($this,$tooltip)==false) return;
			
			//set the tooltip content
			
			// [toxi20090112] only use ajax if there actually is an href attrib present
			//var href=$this.attr("href");
			// [Peter] href!="" added
			//if(href!=undefined && href!="" && href != "#")
			//    $tooltip.html($.ajax({url:$this.attr("href"),async:false}).responseText);
			//set the tooltip position
			winw = $(window).width();
			w = $tooltip.width();
			xOffset = options.xOffset;
			
			//right priority
			var l=$(document).scrollLeft();
			if(w+xOffset+50 < winw-e.clientX)
			  $tooltip.css("left", l + e.clientX+xOffset);
			else if(w+xOffset+50 < e.clientX)
			  $tooltip.css("left", l + e.clientX-(w+xOffset));
			else{
			  //there is more space at left, fit the tooltip there
			  if(e.clientX > winw/2){
				$tooltip.width(e.clientX-50);
				$tooltip.css("left", l + 25);
			  }
			  //there is more space at right, fit the tooltip there
			  else{
				$tooltip.width((winw-e.clientX)-50);
				$tooltip.css("left", l + e.clientX+xOffset);
			  }
			}
			
			winh = $(window).height();
			h = $tooltip.height();
			yOffset = options.yOffset;
			//top position priority
			if(h+yOffset + 50 < e.clientY)
			  $tooltip.css("top", $(document).scrollTop() + e.clientY-(h+yOffset));
			else if(h+yOffset + 50 < winh-e.clientY)
			  $tooltip.css("top", $(document).scrollTop() + e.clientY+yOffset);
			else 
			  $tooltip.css("top", $(document).scrollTop() + 10);
			
			//start the timer to show the tooltip
			//[toxi20090112] modified to make use of fadeDuration option
			if(options.delay>0){
				$tooltip.data("showTimeoutId", setTimeout("$tooltip.fadeIn("+options.fadeDuration+")",options.delay));
			}else{
				$tooltip.show();
			}
		});
		
		$this.mouseout(function(e){
			//restore the title
			if(options.hide($this,$tooltip)==false) return;
			//don't show the tooltip if the mouse left the element before the delay time
			clearTimeout($tooltip.data("showTimeoutId"));
			//start the timer to hide the tooltip
			//[toxi20090112] modified to make use of fadeDuration option
			if(options.delay>0){
				$tooltip.data("hideTimeoutId", setTimeout("$tooltip.fadeOut("+options.fadeDuration+")",options.duration));
			}else{
				$tooltip.hide();
			}
		});
		
		$this.click(function(e){
		   //e.preventDefault();
		});

	});

}})(jQuery);
