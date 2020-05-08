/**
 * jQuery Banner Rotator 
 * Copyright (c) 2014 Allan Ma (http://codecanyon.net/user/webtako)
 * Version: 3.4 (3/21/2014)
 */
(function($) {
	var ALIGN = {
		'topLeft':['top', 'left'],
		'top':['top', 'center'],
		'topRight':['top', 'right'],
		'bottomLeft':['bottom', 'left'],
		'bottom':['bottom', 'center'],
		'bottomRight':['bottom', 'right'],
		'leftTop':['left', 'top'],
		'left':['left', 'center'],
		'leftBottom':['left', 'bottom'],
		'rightTop':['right', 'top'],
		'right':['right', 'center'],
		'rightBottom':['right', 'bottom']
	};
		
	var EFFECTS = {
		'fade': ['vCover', 'fade'],
		'zoomIn': ['vCover', 'zoom'],
		'zoomOut': ['vCover', 'zoom'],
		'coverDown': ['vCover', 'sliceDown'],
		'coverUp': ['vCover', 'sliceUp'],
		'coverRight': ['hCover', 'sliceRight'],
		'coverLeft': ['hCover', 'sliceLeft'],
		'blockExpandDown': ['blocks', 'expand'],
		'blockExpandUp': ['blocks', 'expand'],
		'blockExpandRight': ['blocks', 'expand'],
		'blockExpandLeft': ['blocks', 'expand'], 
		'diagonalFade': ['blocks', 'diagonalFade'],
		'reverseDiagonalFade': ['blocks', 'diagonalFade'],
		'diagonalExpand': ['blocks', 'diagonalExpand'],
		'reverseDiagonalExpand': ['blocks', 'diagonalExpand'],		
		'diagonalShift': ['blocks', 'diagonalShift'],
		'reverseDiagonalShift': ['blocks', 'diagonalShift'],
		'blockRandomFade': ['blocks', 'randomEffect'],
		'blockRandomExpand': ['blocks', 'randomEffect'],
		'blockRandomDrop': ['blocks', 'randomEffect'],
		'zigZagDown': ['blocks', 'zigZag'],
		'zigZagUp': ['blocks', 'zigZag'],
		'zigZagRight': ['blocks', 'zigZag'],
		'zigZagLeft': ['blocks', 'zigZag'],
		'spiralIn': ['blocks', 'spiral'],
		'spiralOut': ['blocks', 'spiral'],
		'sliceDownRight': ['vSlices', 'sliceDown'],
		'sliceDownLeft': ['vSlices', 'sliceDown'],
		'sliceDownRandom': ['vSlices', 'sliceDown'],
		'sliceUpRight': ['vSlices', 'sliceUp'],
		'sliceUpLeft': ['vSlices', 'sliceUp'],
		'sliceUpRandom': ['vSlices', 'sliceUp'],
		'sliceFadeRight': ['vSlices', 'fade'],
		'sliceFadeLeft': ['vSlices', 'fade'],
		'verticalRandomFade': ['vSlices', 'fade'],		
		'sliceAltRight': ['vSlices', 'sliceAlt'],
		'sliceAltLeft': ['vSlices', 'sliceAlt'],
		'blindsRight': ['vSlices', 'blinds'],
		'blindsLeft': ['vSlices', 'blinds'],		
		'verticalRandomBlinds': ['vSlices', 'blinds'],
		'sliceMoveRight': ['vSlices', 'move'],
		'sliceMoveLeft': ['vSlices', 'move'],
		'sliceRightDown': ['hSlices', 'sliceRight'],
		'sliceRightUp': ['hSlices', 'sliceRight'],
		'sliceRightRandom': ['hSlices', 'sliceRight'],
		'sliceLeftDown': ['hSlices', 'sliceLeft'],		
		'sliceLeftUp': ['hSlices', 'sliceLeft'],
		'sliceLeftRandom': ['hSlices', 'sliceLeft'],
		'sliceFadeDown': ['hSlices', 'fade'],
		'sliceFadeUp': ['hSlices', 'fade'],		
		'horizontalRandomFade': ['hSlices', 'fade'],
		'sliceAltDown': ['hSlices', 'sliceAlt'],
		'sliceAltUp': ['hSlices', 'sliceAlt'],
		'blindsDown': ['hSlices', 'blinds'],
		'blindsUp': ['hSlices', 'blinds'],
		'horizontalRandomBlinds': ['hSlices', 'blinds'],		
		'sliceMoveDown': ['hSlices', 'move'],
		'sliceMoveUp': ['hSlices', 'move'],
		'horizontalSlide': ['hSlide', 'slide'],
		'verticalSlide': ['vSlide', 'slide']
	};
	
	var IS_TOUCH = 'ontouchstart' in window;
	var MSIE = msieCheck();
	var MSIE6 = msieCheck(6);
	var ANDROID2 = androidCheck(2.9);
	var CHROME = chromeCheck();
	var ANIMATE_SPEED = 500;
	var SWIPE_MIN = 50;
	var UPDATE_THUMBNAILS = 'updateThumbnails';
	var RESIZE_CPANEL = 'resizeControlPanel';
	var UPDATE_SIZE = 'updateSize';
	var PLUGIN_NAME = 'rotator';
	
	//event names
	var ROTATOR_INIT = 'rotatorInit';
	var ROTATOR_SLIDE_CHANGE = 'rotatorSlideChange';
	var ROTATOR_SLIDE_COMPLETE = 'rotatorSlideComplete';
	var ROTATOR_FIRST = 'rotatorFirst';
	var ROTATOR_LAST = 'rotatorLast';
	var ROTATOR_PLAY = 'rotatorPlay';
	var ROTATOR_PAUSE = 'rotatorPause';
	var ROTATOR_PREV = 'rotatorPrevious';
	var ROTATOR_NEXT = 'rotatorNext';
	
	var CUBIC_BEZIER = {
		'linear':			'linear',
		'':					'ease',
		'swing':			'ease',
		'ease':           	'ease',
       	'ease-in':        	'ease-in',
       	'ease-out':       	'ease-out',
       	'ease-in-out':    	'ease-in-out',
		'easeInQuad':		'cubic-bezier(.55,.085,.68,.53)',
		'easeOutQuad':		'cubic-bezier(.25,.46,.45,.94)',
		'easeInOutQuad':	'cubic-bezier(.455,.03,.515,.955)',
		'easeInCubic':		'cubic-bezier(.55,.055,.675,.19)',
		'easeOutCubic':		'cubic-bezier(.215,.61,.355,1)',
		'easeInOutCubic':	'cubic-bezier(.645,.045,.355,1)',
		'easeInQuart':		'cubic-bezier(.895,.03,.685,.22)',
		'easeOutQuart':		'cubic-bezier(.165,.84,.44,1)',
		'easeInOutQuart':	'cubic-bezier(.77,0,.175,1)',
		'easeInQuint':		'cubic-bezier(.755,.05,.855,.06)',
		'easeOutQuint':		'cubic-bezier(.23,1,.32,1)',
		'easeInOutQuint':	'cubic-bezier(.86,0,.07,1)',
		'easeInSine':		'cubic-bezier(.47,0,.745,.715)',
		'easeOutSine':		'cubic-bezier(.39,.575,.565,1)',
		'easeInOutSine':	'cubic-bezier(.445,.05,.55,.95)',
		'easeInExpo':		'cubic-bezier(.95,.05,.795,.035)',
		'easeOutExpo':		'cubic-bezier(.19,1,.22,1)',
		'easeInOutExpo':	'cubic-bezier(1,0,0,1)',
		'easeInCirc':		'cubic-bezier(.6,.04,.98,.335)',
		'easeOutCirc':		'cubic-bezier(.075,.82,.165,1)',
		'easeInOutCirc':	'cubic-bezier(.785,.135,.15,.86)',
		'easeInBack':		'cubic-bezier(.60,-.28,.735,.045)',
		'easeOutBack':		'cubic-bezier(.175,.885,.32,1.275)',
		'easeInOutBack':	'cubic-bezier(.68,-.55,.265,1.55)'
	};
	
	styleSupport('transform');
	styleSupport('transition');
	styleSupport('backgroundSize');
	styleSupport('borderRadius');
	
	var CSS_TRANSITION;
	var CSS_TRANSITION_END;
	switch($.support.transition) {
		case 'WebkitTransition':
			CSS_TRANSITION = '-webkit-transition';
			CSS_TRANSITION_END = 'webkitTransitionEnd';
			break;
		case 'MozTransition':
			CSS_TRANSITION = '-moz-transition';
			CSS_TRANSITION_END = 'transitionend';
			break;
		case 'OTransition':
			CSS_TRANSITION = '-o-transition';
			CSS_TRANSITION_END = 'oTransitionEnd';
			break;
		default:
			CSS_TRANSITION = 'transition';
			CSS_TRANSITION_END = 'transitionend';
			break;
	}
	
	function BarTimer($screen, align) {
		this._$timer = $('<div></div>').addClass('br-bar-timer');
		
		var pos = getValue(ALIGN[align], ALIGN['top']);
		this._$timer.addClass('bottom' === pos[0] ? 'br-bottom' : 'br-top');
		
		$screen.append(this._$timer);
	}
	
	BarTimer.prototype = {
		start: function(delay) {
			this._$timer.animate({width:'101%'}, {duration:delay, easing:'linear', queue:false});
		},
		stop: function() {
			this._$timer.stop().width(0);
		},
		pause: function() {
			this._$timer.stop();
		}
	}
	
	function PieTimer($screen, align) {
		this._$timer = $('<div class="br-pie-timer">\
							<div class="br-rside"><div class="br-rotate"></div></div>\
							<div class="br-lside"><div class="br-rotate"></div></div>\
						  </div>');
		
		var pos = getValue(ALIGN[align], ALIGN['topRight']);
		this._$timer.css(pos[0], 0).css(pos[1], 0).addClass('br-opacity-transition');
		
		this._$left = this._$timer.find('>.br-lside .br-rotate');
		this._$right = this._$timer.find('>.br-rside .br-rotate');
		this._elapsed = this._delay = 0;
		this._startTime;
		$screen.append(this._$timer);
	}
	
	PieTimer.prototype = {
		start: function(delay) {
			if (0 === this._delay) {
				this._delay = delay;
				this._$timer.addClass('br-opacity');
				this._$left.add(this._$right).stopTransition(true).css({transform:'rotateZ(0deg)'});
			}
			
			var half = this._delay/2;
			this._startTime = (new Date()).getTime();
			this._$right.transition({transform:'rotateZ(180deg)'}, Math.max(half - this._elapsed, 0), 'linear', 
										$.proxy(function() {
											var leftDuration = Math.max(half - Math.max(this._elapsed - half, 0), 0); 
											this._$left.transition({transform:'rotateZ(180deg)'}, leftDuration, 'linear'); 
										}, this));
		},
		
		stop: function() {
			this._elapsed = this._delay = 0;
			this._$left.add(this._$right).stopTransition(true).css({transform:'rotateZ(180deg)'});
			this._$timer.removeClass('br-opacity');
		},
		
		pause: function() {
			this._$left.add(this._$right).stopTransition(true);
			
			this._elapsed += (new Date()).getTime() - this._startTime;
			var pct = this._elapsed/this._delay, 
				deg = pct * 360;
				
			if (pct <= 0.5) {
				this._$right.css({transform:'rotateZ(' + deg + 'deg)'});
			}
			else {
				this._$left.css({transform:'rotateZ(' + (deg - 180) + 'deg)'});
			}
		}
	}
	
	//Effect Constructor
	function Effect(parent, delay) {
		this._parent = parent;
		this._intervalId = null;
		this._delay = delay;
	}
	
	Effect.prototype = {
		//create elements
		create: function(name) {
			var i = this._total, content = '', 
				$container = this._parent._$screen.find('>.br-effects');
			
			while (i--) {
				content += '<div class="' + name + '"></div>';
			}
			$container.append(content);
			
			$el = $container.children('.' + name).slice(-this._total);
			$el.css({backgroundColor:this._parent._$screen.css('backgroundColor')});
			
			if (ANDROID2) {
				$el.css('backface-visibility', 'visible');
			}
			
			return $el;
		},

		//clear elements
		clear: function() {
			clearInterval(this._intervalId);
			this._$el.stopTransition(true, false).css({visibility:'hidden'});
			this._parent._inProgress = false;
		},

		//resize elements
		resize: function(ratio) {
			this.clear();
			this._width  = Math.ceil(this._$el.data('width') * ratio);
			this._height = Math.ceil(this._$el.data('height') * ratio);
		},
		
		//init element's image
		setImage: function($elem, $source) {
			$elem.find('>img').remove();
			$elem.append($('<img src="' + $source.attr('src') + '" alt=""/>').css({top:$source.css('top'), left:$source.css('left'), width:$source.width(), height:$source.height()}));
		},
		
		//init element's background image
		setBgImage: function($elem, $source) {
			$elem.css({backgroundImage:'url(' + $source.attr('src') + ')', backgroundSize:$source.css('width') + ' ' + $source.css('height'), backgroundPosition:$source.css('left')  + ' ' + $source.css('top')});
		},
		
		//animate elements
		animate: function(elArray, props, duration, easing) {
			var i = 0, last = this._total - 1;
			this._intervalId = setInterval(
				$.proxy(function() {
					if (i !== last) {
						$(elArray[i]).transition(props, duration, easing);
					}
					else {
						$(elArray[i]).transition(props, duration, easing,
							$.proxy(function() {
								this._parent.displayCurrent();
								this._$el.css({visibility:'hidden'});
							}, this));
					}
					
					if (++i == this._total) {
						clearInterval(this._intervalId);
					}
				}, this), this._delay);
		}
	}
	
	//Slide Class
	Slide.prototype = new Effect();
	Slide.prototype.constructor = Slide;

	//Constructor
	function Slide(parent, orientation) {
		Effect.call(this, parent, 0);
		this._cssTransform = this._parent._cssTransform;
		this._orientation = orientation;
		this._total = 1;
		
		var name;
		if ('vertical' === this._orientation) {
			this._position = 'top';
			name = 'br-vslide';
		}
		else {
			this._position = 'left';
			name = 'br-hslide';
		}
		
		this._$el = this.create(name).append('<div></div><div></div>');
		this._$slides = this._$el.children();
	}
	
	Slide.prototype.slide = function($currImg, effect, duration, easing) {
		var $prevSlide, $currSlide, props = {}, 
			$prevImg = this._parent._$prevItem.find('>img.br-main-img'), 
			size, translate;
			
		if ('vertical' === this._orientation) { 
			size = -this._$slides.height();
			translate = 'translateY';
		}
		else {
			size = -this._$slides.width();
			translate = 'translateX';
		}
		
		if (this._parent._backward) {
			$currSlide = this._$slides.first();
			$prevSlide = this._$slides.last();
			if (this._cssTransform) {
				this._$el.css({transform:translate + '(' + size + 'px)'});
				props['transform'] = translate + '(0)';
			}
			else {
				this._$el.css(this._position, size);
				props[this._position] = 0;
			}
		}
		else {
			$currSlide = this._$slides.last();
			$prevSlide = this._$slides.first();
			if (this._cssTransform) {
				this._$el.css({transform:translate + '(0)'});
				props['transform'] = translate + '(' + size + 'px)';
			}
			else {
				this._$el.css(this._position, 0);
				props[this._position] = size;
			}
		}
		
		if ($.support.backgroundSize) {
			this.setBgImage($prevSlide, $prevImg);
			this.setBgImage($currSlide, $currImg);
		}
		else {
			this.setImage($prevSlide, $prevImg);
			this.setImage($currSlide, $currImg);
		}
		
		if (CHROME) {
			setTimeout($.proxy(function() {
				this._$el.css({visibility:'visible'});
				this._parent._$items.css({visibility:'hidden'});
				this.animate(this._$el.toArray(), props, duration, easing);
			}, this), 1);
		}
		else {
			this._$el.css({visibility:'visible'});
			this._parent._$items.css({visibility:'hidden'});
			this.animate(this._$el.toArray(), props, duration, easing);
		}
	}
	
	//Vertical Slices Class
	VSlices.prototype = new Effect();
	VSlices.prototype.constructor = VSlices;

	function VSlices(parent, total, delay) {
		Effect.call(this, parent, delay);
		this._cssTransform = this._parent._cssTransform;
		this._total = total;
		this._width = Math.ceil(this._parent._stageWidth/this._total);
		this._$el = this.create('br-vslice').data({width:this._width});
	}
	
	VSlices.prototype.sliceDown = function($img, effect, duration, easing) {
		var elArray = this._$el.toArray();
		if ('sliceDownLeft' === effect) {
			elArray.reverse();
		}
		else if ('sliceDownRandom' === effect) {
			shuffleArray(elArray);
		}
		
		if (this._cssTransform) {
			this.set($img, {transform:'translateY(-100%)'});
			this.animate(elArray, {transform:'translateY(0)'}, duration, easing);
		}
		else {
			this.set($img, {top:-this._$el.height()});
			this.animate(elArray, {top:0}, duration, easing);
		}
	}
	
	VSlices.prototype.sliceUp = function($img, effect, duration, easing) {
		var elArray = this._$el.toArray();
		if ('sliceUpLeft' === effect) {
			elArray.reverse();
		}
		else if ('sliceUpRandom' === effect) {
			shuffleArray(elArray);
		}
		
		if (this._cssTransform) {
			this.set($img, {transform:'translateY(100%)'});
			this.animate(elArray, {transform:'translateY(0)'}, duration, easing);
		}
		else {
			this.set($img, {top:this._$el.height()});
			this.animate(elArray, {top:0}, duration, easing);
		}
	}
	
	VSlices.prototype.sliceAlt = function($img, effect, duration, easing) {
		var elArray = this._$el.toArray();
		if ('sliceAltLeft' === effect) {
			elArray.reverse();
		}
		
		if (this._cssTransform) {
			this.set($img, {transform:'translateY(-100%)'});
			this._$el.filter(':odd').css({transform:'translateY(100%)'});
			this.animate(elArray, {transform:'translateY(0)'}, duration, easing);
		}
		else {
			this.set($img, {top:-this._$el.height()});
			this._$el.filter(':odd').css({top:this._$el.height()});
			this.animate(elArray, {top:0}, duration, easing);
		}
	}
	
	VSlices.prototype.blinds = function($img, effect, duration, easing) {
		this.set($img, {width:0});

		var elArray = this._$el.toArray();
		if ('blindsLeft' === effect) {
			elArray.reverse();
		}
		else if ('verticalRandomBlinds' === effect) {
			shuffleArray(elArray);
		}
		
		this.animate(elArray, {width:this._width + 'px'}, duration, easing);
	}
	
	VSlices.prototype.fade = function($img, effect, duration, easing) {
		this.set($img, {opacity:0});

		var elArray = this._$el.toArray();
		if ('sliceFadeLeft' === effect) {
			elArray.reverse();
		}
		else if ('verticalRandomFade' === effect) {
			shuffleArray(elArray);
		}
		
		this.animate(elArray, {opacity:1}, duration, easing);
	}
	
	VSlices.prototype.move = function($img, effect, duration, easing) {
		var elArray = this._$el.toArray(),
			width = this._$el.parent().width();
		
		if ('sliceMoveRight' === effect) {
			elArray.reverse();
			width *= -1;
		}
		
		if (this._cssTransform) {
			this.set($img, {transform:'translateX(' + width + 'px)'});
			this.animate(elArray, {transform:'translateX(0)'}, duration, easing);
		}
		else {
			this.set($img, {left:'+=' + width});
			this.animate(elArray, {left:'-=' + width}, duration, easing);
		}
	}
	
	VSlices.prototype.zoom = function($img, effect, duration, easing) {
		if (this._cssTransform) {
			this.set($img, 'zoomOut' === effect ? {transform:'scale(2)'} : {transform:'scale(0)'});
			this.animate(this._$el.toArray(), {transform:'scale(1)'}, duration, easing);
		}
		else {
			this.fade($img, effect, duration, easing);
		}
	}
	
	//set slices
	VSlices.prototype.set = function($img, css) {
		var imgLeft = $img.position().left;
		
		if ($.support.backgroundSize) {
			this.setBgImage(this._$el, $img);
		}
		else {
			this.setImage(this._$el, $img);
		}
		
		var availWidth = this._$el.parent().width();
		this._$el.each($.proxy(function(n, el) {
			var width = Math.min(this._width, availWidth),
				left = n * this._width,
				x = (imgLeft - left) + 'px';
			
			$(el).css({left:left, width:width});
			if ($.support.backgroundSize) {
				$(el).css({backgroundPosition:x + ' ' + $img.css('top')});
			}
			else {
				$(el).find('>img').css({left:x});
			}
			
			availWidth -= width;
		}, this));
		
		this._$el.css($.extend({opacity:1, top:0, visibility:'visible', transform:'none'}, css));
	}
		
	//Horizontal Slices
	HSlices.prototype = new Effect();
	HSlices.prototype.constructor = HSlices;
	
	function HSlices(parent, total, delay) {
		Effect.call(this, parent, delay);
		this._cssTransform = this._parent._cssTransform;
		this._total = total;
		this._height = Math.ceil(this._parent._stageHeight/this._total);
		this._$el = this.create('br-hslice').data({height:this._height});
	}
	
	HSlices.prototype.sliceRight = function($img, effect, duration, easing) {
		var elArray = this._$el.toArray();
		if ('sliceRightUp' === effect) {
			elArray.reverse();
		}
		else if ('sliceRightRandom' === effect) {
			shuffleArray(elArray);
		}
		
		if (this._cssTransform) {
			this.set($img, {transform:'translateX(-100%)'});
			this.animate(elArray, {transform:'translateX(0)'}, duration, easing);
		}
		else {
			this.set($img, {left:-this._$el.width()});
			this.animate(elArray, {left:0}, duration, easing);
		}
	}
	
	HSlices.prototype.sliceLeft = function($img, effect, duration, easing) {
		var elArray = this._$el.toArray();
		if ('sliceLeftUp' === effect) {
			elArray.reverse();
		}
		else if ('sliceLeftRandom' === effect) {
			shuffleArray(elArray);
		}
		
		if (this._cssTransform) {
			this.set($img, {transform:'translateX(100%)'});
			this.animate(elArray, {transform:'translateX(0)'}, duration, easing);
		}
		else {
			this.set($img, {left:this._$el.width()});
			this.animate(elArray, {left:0}, duration, easing);
		}
	}
	
	HSlices.prototype.sliceAlt = function($img, effect, duration, easing) {
		var elArray = this._$el.toArray();
		if ('sliceAltUp' === effect) {
			elArray.reverse();
		}
		
		if (this._cssTransform) {
			this.set($img, {transform:'translateX(-100%)'});
			this._$el.filter(':odd').css({transform:'translateX(100%)'});
			this.animate(elArray, {transform:'translateX(0)'}, duration, easing);
		}
		else {
			this.set($img, {left:-this._$el.width()});
			this._$el.filter(':odd').css({left:this._$el.width()});
			this.animate(elArray, {left:0}, duration, easing);
		}
	}
	
	HSlices.prototype.blinds = function($img, effect, duration, easing) {
		this.set($img, {height:0});
		
		var elArray = this._$el.toArray();
		if ('blindsUp' === effect) {
			elArray.reverse();
		}
		else if ('horizontalRandomBlinds' === effect) {
			shuffleArray(elArray);
		}
		
		this.animate(elArray, {height:this._height + 'px'}, duration, easing);
	}
	
	HSlices.prototype.fade = function($img, effect, duration, easing) {
		this.set($img, {opacity:0});
		
		var elArray = this._$el.toArray();
		if ('sliceFadeUp' === effect) {
			elArray.reverse();
		}
		else if ('horizontalRandomFade' === effect) {
			shuffleArray(elArray);
		}
		
		this.animate(elArray, {opacity:1}, duration, easing);
	}
	
	HSlices.prototype.move = function($img, effect, duration, easing) {
		var elArray = this._$el.toArray(),
			height = this._$el.parent().height();
		
		if ('sliceMoveDown' === effect) {
			elArray.reverse();
			height *= -1;
		}
		
		if (this._cssTransform) {
			this.set($img, {transform:'translateY(' + height + 'px)'});
			this.animate(elArray, {transform:'translateY(0)'}, duration, easing);
		}
		else {
			this.set($img, {top:'+=' + height});
			this.animate(elArray, {top:'-=' + height}, duration, easing);
		}
	}
	
	//set slices
	HSlices.prototype.set = function($img, css) {
		var imgTop = $img.position().top;
		
		if ($.support.backgroundSize) {
			this.setBgImage(this._$el, $img);
		}
		else {
			this.setImage(this._$el, $img);
		}
		
		var availHeight = this._$el.parent().height();
		this._$el.each($.proxy(function(n, el) {
			var height = Math.min(this._height, availHeight),
				top = n * this._height,
				y = (imgTop - top) + 'px';
			
			$(el).css({top:top, height:height});
			if ($.support.backgroundSize) {
				$(el).css({backgroundPosition:$img.css('left') + ' ' + y});
			}
			else {
				$(el).find('>img').css({top:y});
			}
			
			availHeight -= height;
		}, this));
		
		this._$el.css($.extend({opacity:1, left:0, visibility:'visible', transform:'none'}, css));
	}
	
	//Blocks Effect
	Blocks.prototype = new Effect();
	Blocks.prototype.constructor = Blocks;
	
	function Blocks(parent, numRows, numCols, delay) {
		Effect.call(this, parent, delay);
		this._cssTransform = this._parent._cssTransform;
		this._blockArray;
		this._numRows = numRows;
		this._numCols = numCols;
		this._width  = Math.ceil(this._parent._stageWidth/this._numCols);
		this._height = Math.ceil(this._parent._stageHeight/this._numRows);
		this._total = this._numRows * this._numCols;
		this._$el = this.create('br-block').data({width:this._width, height:this._height});
		
		var k = 0;
		this._blockArray = [];
		for (var i = 0; i < this._numRows; i++) {
			this._blockArray[i] = [];
			for (var j = 0; j < this._numCols; j++) {
				this._blockArray[i][j] = this._$el.eq(k++);
			}
		}		
	}

	Blocks.prototype.diagonalFade = function($img, effect, duration, easing) {
		this.set($img, {opacity:0});
		
		var elArray = this.getDiagonalArray();
		if ('reverseDiagonalFade' === effect) {
			elArray.reverse();
		}
		
		this.animate(elArray, {opacity:1}, duration, easing);
	}
	
	Blocks.prototype.diagonalExpand = function($img, effect, duration, easing) {
		var elArray = this.getDiagonalArray(), 
			expand = this.getExpandCSS();
		
		this.set($img, expand.from);
		if ('reverseDiagonalExpand' === effect) {
			elArray.reverse();
		}
		
		this.animate(elArray, expand.to, duration, easing);
	}
	
	Blocks.prototype.diagonalShift = function($img, effect, duration, easing) {
		var elArray = this.getDiagonalArray(), 
			w = this._width, h = this._height;
		
		if ('reverseDiagonalShift' === effect) {
			elArray.reverse();
			w *= -1;
			h *= -1;
		}
		
		if (this._cssTransform) {
			this.set($img, {opacity:0, transform:'translate(' + w + 'px, ' + h + 'px)'});
			this.animate(elArray, {opacity:1, transform:'translate(0, 0)'}, duration, easing);
		}
		else {
			this.set($img, {opacity:0, left:'+=' + w, top:'+=' + h});
			this.animate(elArray, {opacity:1, left:'-=' + w, top:'-=' + h}, duration, easing);
		}
	}
	
	Blocks.prototype.randomEffect = function($img, effect, duration, easing) {
		var elArray = this._$el.toArray();
		shuffleArray(elArray);
		
		var from, to;
		if  ('blockRandomDrop' === effect) {
			var height = this._$el.parent().height();
			if (this._cssTransform) {
				from = {transform:'translateY(' + -height + 'px)'};
				to = {transform:'translateY(0)'};
			}
			else {
				from = {top:'-=' + height};
				to = {top:'+=' + height};
			}
		}
		else if ('blockRandomExpand' === effect) {
			var expand = this.getExpandCSS();
			from = expand.from;
			to = expand.to;
		}
		else {
			from = {opacity:0};
			to = {opacity:1};
		}
		
		this.set($img, from);
		this.animate(elArray, to, duration, easing);
	}
	
	Blocks.prototype.zigZag = function($img, effect, duration, easing) {
		this.set($img, {opacity:0});
		
		var elArray = this.getZigZagArray(effect);
		if ('zigZagLeft' === effect || 'zigZagUp' === effect) {
			elArray.reverse();
		}
		
		this.animate(elArray, {opacity:1}, duration, easing);
	}
	
	Blocks.prototype.spiral = function($img, effect, duration, easing) {
		this.set($img, {opacity:0});

		var elArray = this.getSpiralArray();
		if ('spiralOut' === effect) {
			elArray.reverse();
		}
		
		this.animate(elArray, {opacity:1}, duration, easing);
	}
	
	Blocks.prototype.expand = function($img, effect, duration, easing) {
		var expand = this.getExpandCSS();
		this.set($img, expand.from);
		this.animate(this.getDirectionalArray(effect), expand.to, duration, easing);
	}
	
	Blocks.prototype.getExpandCSS = function() {
		if (this._cssTransform) {
			return {from:{transform:'scale(0)'}, to:{transform:'scale(1)'}};
		}
		else {
			return {from:{width:0, height:0}, to:{width:this._width + 'px', height:this._height + 'px'}};
		}
	}
	
	//set blocks 
	Blocks.prototype.set = function($img, css) {
		var imgTop = $img.position().top, 
			imgLeft = $img.position().left;
		
		if ($.support.backgroundSize) {
			this.setBgImage(this._$el, $img);
		}
		else {
			this.setImage(this._$el, $img);
		}
		
		var $container = this._$el.parent(),
			availHeight = $container.height();
			
		for (var i = 0; i < this._numRows; i++) {
			var availWidth = $container.width(),
				height = Math.min(this._height, availHeight);
			availHeight -= height;
			
			for (var j = 0; j < this._numCols; j++) {
				var width = Math.min(this._width, availWidth),
					top  = i * this._height,
					left = j * this._width,
					x = (imgLeft - left),
					y = (imgTop - top),
					$el = this._blockArray[i][j];
					
				$el.css({top:top, left:left, width:width, height:height});
				if ($.support.backgroundSize) {
					$el.css({backgroundPosition:x + 'px ' + y + 'px'}); 
				}
				else {
					$el.find('>img').css({left:x, top:y});
				}
				
				availWidth -= width;
			}
		}
		
		this._$el.css($.extend({opacity:1, visibility:'visible', transform:'none'}, css));
	}
	
	//get diagonal array
	Blocks.prototype.getDiagonalArray = function() {
		var elArray = [];
		var start = 0, end = (this._numRows - 1) + (this._numCols - 1) + 1;
		
		while (start != end) {
			i = Math.min(this._numRows - 1, start);
			while(i >= 0) {
				j = Math.abs(i - start);
				if (j >= this._numCols) {
					break;
				}
				elArray.push(this._blockArray[i][j]);
				i--;
			}
			start++;
		}
		
		return elArray;
	}
	
	//get zig zag array
	Blocks.prototype.getZigZagArray = function(effect) {
		var i = 0, j = 0, fwd = true;
		
		var elArray = [];
		if ('zigZagUp' === effect || 'zigZagDown' === effect) {
			for (var count = 0; count < this._total; count++) {
				elArray[count] = this._blockArray[i][j];
				
				fwd ? j++ : j--;
				if (j == this._numCols || j < 0) {
					fwd = !fwd;
					j = (fwd ? 0 : this._numCols - 1);
					i++;
				}	
			}
		}
		else {
			for (var count = 0; count < this._total; count++) {
				elArray[count] = this._blockArray[i][j];
				
				fwd ? i++ : i--;
				if (i == this._numRows || i < 0) {
					fwd = !fwd;
					i = (fwd ? 0 : this._numRows - 1);
					j++;
				}				
			}	
		}
		
		return elArray;
	}
	
	//get direction array
	Blocks.prototype.getDirectionalArray = function(effect) {
		var elArray = [];
		switch (effect) {
			case 'blockExpandRight':
				for (var j = 0; j < this._numCols; j++) {
					for (var i = 0; i < this._numRows; i++) {
						elArray.push(this._blockArray[i][j]);
					}
				}
				break;
			case 'blockExpandLeft':
				for (var j = this._numCols - 1; j >= 0; j--) {
					for (var i = 0; i < this._numRows; i++) {
						elArray.push(this._blockArray[i][j]);
					}
				}					
				break;
			case 'blockExpandUp':
				for (var i = this._numRows - 1; i >= 0; i--) {
					for (var j = 0; j < this._numCols; j++) {
						elArray.push(this._blockArray[i][j]);
					}
				}
				break;
			default:
				elArray = this._$el.toArray();
				break;
		}
		
		return elArray;
	}
	
	//get spiral array
	Blocks.prototype.getSpiralArray = function() {
		var i = 0, j = 0;
		var rowCount = this._numRows - 1;
		var colCount = this._numCols - 1;
		var dir = 0;
		var limit = colCount;
		var elArray = [];
		while (rowCount >= 0 && colCount >=0) {
			var count = 0; 
			while(true) { 
				elArray.push(this._blockArray[i][j]);
				if ((++count) > limit) {
					break;
				}
				switch(dir) {
					case 0:
						j++;
						break;
					case 1:
						i++;
						break;
					case 2:
						j--;
						break;
					case 3:
						i--;
						break;
				}
			} 
			switch(dir) {
				case 0:
					dir = 1;
					limit = (--rowCount);
					i++;
					break;
				case 1:
					dir = 2;
					limit = (--colCount);
					j--;
					break;
				case 2:
					dir = 3;
					limit = (--rowCount);
					i--;
					break;
				case 3:
					dir = 0;
					limit = (--colCount);
					j++;
					break;
			}
		}
			
		return elArray;
	}
		
	//class Rotator
	function Rotator(obj, opts) {
		this._options = opts;
		this._stageWidth = 	opts.width;
		this._stageHeight = opts.height;
		this._rotate = opts.autoPlay;
		this._cssTransition = $.support.transition && !ANDROID2 ? opts.cssTransition : false;
		this._cssTransform =  $.support.transform && this._cssTransition;
		this._numItems;
		this._currIndex;
		this._effects = {};
		this._backward;
		this._verticalCPanel;
		this._timer;
		this._timerId = null;
		this._tooltipId = null;
		this._layerIds = [];
		this._inProgress = false;
		this._start;
		this._delay = 0;
		this._cpAlign;
		this._effectArray;
		this._startX;
		this._startY;
		this._swipeMove;
		this._swipeStart;
		this._touchScrolling;
		this._scrollEasing;
		this._promise;
		this._winWidth;
		
		this._$rotator = $(obj);
		this._$stage;
		this._$screen;
		this._$layers;
		this._$preloader;
		this._$cpanel;
		this._$cpWrapper;
		this._$extPanel;
		this._$thumbPanel;
		this._$list;
		this._$items;
		this._$thumbList;
		this._$thumbs;
		this._$tooltip;
		this._$currItem;
		this._$prevItem;
		
		this._namespace = '.' + ((typeof this._$rotator.attr('id') !== 'undefined') ? this._$rotator.attr('id') : 'rotator');
		
		this.init();
	}
	
	Rotator.prototype = {
		//init banner rotator
		init: function() {
			if (!this._cssTransition) {
				$.fn.transition = $.fn.animate;
				$.fn.stopTransition = $.fn.stop;
			}
			
			this._$list = this._$rotator.find('>ul');
			if (!this._$list.hasClass('br-slides')) {
				this._$list.addClass('br-slides');
			}
			
			if (this._options.shuffle) {
				this.shuffleItems(this._$list);
			}
			this._$items = this._$list.children('li').addClass('br-item');
			this._numItems = this._$items.length;
			
			if ('random' === this._options.startIndex) {
				this._currIndex = Math.floor(Math.random() * this._numItems);
			}
			else {
				var startIndex = parseInt(this._options.startIndex, 0);
				this._currIndex = (!isNaN(startIndex) && 0 <= startIndex && startIndex < this._numItems) ? startIndex : 0;
			}
			
			if (this._numItems <= 1) {
				this._rotate = false;
			}
			
			if (!this._options.responsive) {
				this._$rotator.css({width:this._stageWidth, height:this._stageHeight});
			}
			
			//init components		
			this.initStage();
			this.initItems();
			this.initCPanel();
			this.initEffects();
			
			if (this._options.responsive) {
				this.resize();
				$(window).bind('resize' + this._namespace, $.proxy(this.resize, this));
			}
			
			if (1 < this._numItems) {
				if (this._options.mousewheel) {
					this._$rotator.bind('mousewheel DOMMouseScroll', $.proxy(this.mousescroll, this));
				}
					
				if (this._options.keyboard) {
					$(document).bind('keyup' + this._namespace, $.proxy(this.keyControl, this));
				}
				
				if (this._options.pauseOnHover) {
					this._$rotator.hover($.proxy(this.pause, this), 
										 $.proxy(function(e) {
											if (!this.onTooltip(e)) {
												this.play();
											}
										 }, this));
				}

				if (IS_TOUCH && this._options.swipe) {
					this._$rotator.bind('touchstart', $.proxy(this.touchStart, this));
				}
			}
			
			if (this._numItems) { 
				//init image loading
				if (!MSIE6) {
					this.loadNextImage(this._$items.toArray());
				}
				else {
					this.loadAllImages();
				}
				this.loadSlide();
			}
		},
		
		//init stage
		initStage: function() {
			this.initBorder();
			
			this._$list.wrap('<div class="br-stage"><div class="br-screen"></div></div>');
			this._$screen = this._$list.parent();
			this._$stage = this._$screen.parent();
			
			this.setBackgroundColor(this._$screen, this._options.backgroundColor);
			
			//init containers
			this._$screen.append('<div class="br-effects"></div><div class="br-preloader"></div><div class="br-links"></div><div class="br-layers"></div>');
			
			//init preloader
			this._$preloader = this._$screen.find('>.br-preloader');
			
			//init timer
			if (false !== this._options.timer && 'none' !== this._options.timer) {
				if ('pie' === this._options.timer) {
					if (this._cssTransform) {
						this._timer = new PieTimer(this._$screen, this._options.timerAlign);
					}
				}
				else {
					this._timer = new BarTimer(this._$screen, this._options.timerAlign);
				}
			}
			
			//init side buttons
			if ('large' === this._options.navButtons && 1 < this._numItems) {
				this.initSideButtons();
			}
		},
		
		initBorder: function() {
			var styles = ['borderWidth', 'borderColor', 'borderStyle', 'borderRadius'];
			for (var i = 0; i < styles.length; i++) {
				var name = styles[i],
					val = this._options[name];
					
				if (typeof val !== 'undefined') {
					this._$rotator.css(name, val);
				}
			}
			
			if (0 < parseInt(this._$rotator.css('borderRightWidth'), 0)) {
				this._$rotator.css({backgroundColor:this._$rotator.css('borderRightColor')});
			}
		},
		
		createBorderWrapper: function() {
			var $wrapper = $('<div></div>').addClass('br-wrapper').copyBorder(this._$rotator);
			
			this._$rotator.css({borderWidth:0, borderRadiusTopLeft:0, borderRadiusTopRight:0, borderRadiusBottomLeft:0, borderRadiusBottomRight:0});
				
			if (!this._options.responsive) {
				$wrapper.css({width:this._$rotator.outerWidth(true), height:this._$rotator.outerHeight(true)});
			}
			
			this._$rotator.wrap($wrapper);
		},
		
		//init side navigation buttons
		initSideButtons: function() {
			var $prevButton = $('<div><div></div></div>').addClass('br-side-prev').click($.proxy(this.prevSlide, this));
			var	$nextButton = $('<div><div></div></div>').addClass('br-side-next').click($.proxy(this.nextSlide, this));
			var $buttons = $prevButton.add($nextButton).mousedown(preventDefault);
			if (!ANDROID2) {
				$buttons.find('>div').addClass('br-opacity-transition');
			}
			this._$screen.append($buttons);
	
			if (this._options.navButtonsOnHover) {
				$buttons.css({opacity:0});
				this._$rotator.hover(
					function() {
						$buttons.animate({opacity:1}, {duration:ANIMATE_SPEED, queue:false});
					}, 
					$.proxy(function(e) {
						if (!this.onTooltip(e)) {
							$buttons.animate({opacity:0}, {duration:ANIMATE_SPEED, queue:false});
						}
					}, this));
			}
		},
		
		//init items
		initItems: function() {
			for (var i = 0; i < this._numItems; i++) {
				var $item = this._$items.eq(i),
					$imgLink = $item.children(':first'),
					$img, thumbUrl, caption;
				
				if ($imgLink.is('a')) {
					$imgLink.addClass('br-img-link');
					$img = $imgLink.find('>img');
					if (0 === $img.length) {
						thumbUrl = $imgLink.attr('href');
						caption = getValue($imgLink.text(), '');
					}
					$item.data('imgurl', $imgLink.attr('href')).append($('<img alt=""/>').addClass('br-main-img'));
				}
				else {
					$img = $item.find('>img:not(.tt-img):first').addClass('br-main-img');
				}
				
				if ($img.length) {
					if (typeof $img.data('thumb') !== 'undefined') {
						thumbUrl = $img.data('thumb');
					}
					else {
						thumbUrl = $img.attr('src');
					}
					caption = getValue($img.attr('title'), '');
					$img.removeAttr('title');
				}
				
				if ('image' === this._options.tooltip) {
					if (0 === $item.find('>img.tt-img').length) {
						$item.append($('<img alt=""/>').addClass('tt-img').attr('src', thumbUrl));
					}
				}
				
				//init link
				var linkVal = $item.data('link');
				if (typeof linkVal !== 'undefined' && '' !== $.trim(linkVal)) {
					var $link = $('<a></a>').addClass('br-main-link').attr('href', linkVal),
						target = $item.data('target');
					
					if (typeof target !== 'undefined') {
						$link.attr('target', target);
					}
					
					if (this._options.pauseOnInteraction) {
						$link.click($.proxy(this.pause, this));
					}
					
					this._$screen.find('>.br-links').append($link);
					$item.data('linkEl', $link);
				}
				
				this.setShorthandData($item, 'transition', ['effect', 'duration', 'easing', 'delay']);
				$item.data({caption:caption, thumburl:thumbUrl, ready:false,
							effect:getValue($item.data('effect'), this._options.effect), 
							duration:getPosInteger($item.data('duration'), this._options.duration), 
							easing:this.checkEasing(getValue($item.data('easing'), this._options.easing)), 
							delay:getPosInteger($item.data('delay'), this._options.delay)});
				
				this.initLayer($item);
			}
			
			var $container = this._$screen.find('>.br-layers');
			this._$layers = $container.children();
			
			if (ANDROID2) {
				this._$layers.css('backface-visibility', 'visible');
			}
			
			if (this._options.layerOnHover) {				
				$container.css({opacity:0});
				this._$rotator.hover(function() { $container.animate({opacity:1}, {duration:300, queue:false}); }, 
									 function() { $container.animate({opacity:0}, {duration:300, queue:false}); });
			}
		},
		
		//init control panel
		initCPanel: function() {
			this._$cpanel = $('<div></div>').addClass('br-cpanel');
			this._$rotator.append(this._$cpanel);
			
			this._cpAlign = getValue(ALIGN[this._options.cpanelAlign], ALIGN['bottom']);
			this._verticalCPanel = ('left' === this._cpAlign[0] || 'right' === this._cpAlign[0]);
			
			this.initThumbnails();
			this.initButtons();
			
			var $el = this._$cpanel.children();
			if ($el.length) {
				this._$cpanel.wrap('<div class="br-cpanel-wrapper"></div>');
				this._$cpWrapper = this._$cpanel.parent();
					
				if (this._verticalCPanel) {
					//set size
					var totalHeight = 0, maxWidth = Math.max.apply(null, $el.map(function() { return $(this).outerWidth(true); }).get()),
						top = 0, bottom = 0;
					
					$el.each(function() {
						$(this).css({left:Math.floor((maxWidth - $(this).outerWidth(true))/2)});
						
						var height = $(this).outerHeight(true);
						if ($(this).data('front')) {
							$(this).css({top:top});
							top += height;
						}
						else {
							$(this).css({bottom:bottom});
							bottom += height;
						}
						totalHeight += height;
					});
					
					this._$cpanel.css({width:maxWidth, height:totalHeight});
					
					//align control panel
					if ('top' === this._cpAlign[1]) {
						this._$cpWrapper.css({top:0});
					}
					else if ('bottom' === this._cpAlign[1]) {
						this._$cpWrapper.css({bottom:0});
					}
					else {
						this._$cpWrapper.css({top:'50%'});
						this._$cpanel.css({top:-this._$cpanel.outerHeight(true)/2});
					}
					
					//set inside or outside
					if (this._options.cpanelOutside) {
						this.setOutsideVerticalCPanel();
					}
					else {
						this.setInsideCPanel();
					}
					
					//check overflow
					if (false !== this._options.thumbnails) {
						this._$cpanel.data({margin:this._$cpanel.outerHeight(true) - this._$cpanel.height(), buttonsSize:this._$cpanel.height() - $el.filter('.br-thumbnails').height()});
						
						if (this._options.responsive) {
							this._$rotator.bind(RESIZE_CPANEL, $.proxy(this.resizeVerticalCPanel, this));
							this.initVerticalScroll();
						}
						else if (this._$cpanel.outerHeight(true) > this._stageHeight) {
							this.resizeVerticalCPanel();
							this.initVerticalScroll();
						}
					}
				}
				else {
					//set size
					var totalWidth = 0, maxHeight = Math.max.apply(null, $el.map(function() { return $(this).outerHeight(true); }).get()),
						left = 0, right = 0;
						
					$el.each(function() {
						$(this).css({top:Math.floor((maxHeight - $(this).outerHeight(true))/2)});
						
						var width = $(this).outerWidth(true);
						if ($(this).data('front')) {
							$(this).css({left:left});
							left += width;
						}
						else {
							$(this).css({right:right});
							right += width;
						}
						totalWidth += width;
					});
					
					this._$cpanel.css({width:totalWidth, height:maxHeight});
					
					//align control panel
					if ('left' === this._cpAlign[1]) {
						this._$cpWrapper.css({left:0});
					}
					else if ('right' === this._cpAlign[1]) {
						this._$cpWrapper.css({right:0});
					}
					else {
						this._$cpWrapper.css({left:'50%'});
						this._$cpanel.css({left:-this._$cpanel.outerWidth(true)/2});
					}
					
					//set inside or outside
					if (this._options.cpanelOutside) {
						this.setOutsideHorizontalCPanel();
					}
					else {
						this.setInsideCPanel();
					}
					
					//check overflow
					if (false !== this._options.thumbnails) {
						this._$cpanel.data({margin:this._$cpanel.outerWidth(true) - this._$cpanel.width(), buttonsSize:this._$cpanel.width() - $el.filter('.br-thumbnails').width()});
						
						if (this._options.responsive) {
							this._$rotator.bind(RESIZE_CPANEL, $.proxy(this.resizeHorizontalCPanel, this));
							this.initHorizontalScroll();
						}
						else if (this._$cpanel.outerWidth(true) > this._stageWidth) {
							this.resizeHorizontalCPanel();
							this.initHorizontalScroll();
						}
					}
				}
				this._$cpanel.css({visibility:'visible'});
			}
			else {
				this._$cpanel.remove();
			}
		},
		
		//set inside cpanel
		setInsideCPanel: function() {
			this._$cpWrapper.css(this._cpAlign[0], 0);
			
			if (this._options.cpanelOnHover) {
				this._$cpanel.css({opacity:0});
				this._$rotator.hover($.proxy(function() { this._$cpanel.animate({opacity:1}, {duration:ANIMATE_SPEED, queue:false}); }, this), 
									 $.proxy(function(e) { 
												if (!this.onTooltip(e)) {
													this._$cpanel.animate({opacity:0}, {duration:ANIMATE_SPEED, queue:false}); 
												}
										     }, this));
			}
		},
		
		//set outside horizontal cpanel
		setOutsideHorizontalCPanel: function() {
			this._$cpWrapper.wrap('<div class="br-ext-cp"></div>');
			this._$extPanel = this._$cpWrapper.parent().prepend('<div class="br-ext-bg"></div>');
			var height = this._$cpWrapper.height(),
				margin, position;
			
			if ('top' === this._cpAlign[0]) {
				margin = 'marginTop';
				position = 'top';
			}
			else {
				margin = 'marginBottom';
				position = 'bottom';
			}
			
			this._$rotator.css(margin, height).css({overflow:'visible'});
			this._$extPanel.css({left:0, width:'100%', height:height}).css(position, -height);
			this.createBorderWrapper();
		},
		
		//set outside vertical cpanel
		setOutsideVerticalCPanel: function() {
			this._$cpWrapper.wrap('<div class="br-ext-cp"></div>');
			this._$extPanel = this._$cpWrapper.parent().prepend('<div class="br-ext-bg"></div>');
			var	width = this._$cpWrapper.width(),
				margin, position;
			
			if ('left' === this._cpAlign[0]) {
				margin = 'marginLeft';
				position = 'left';
			}
			else {
				margin = 'marginRight';
				position = 'right';
			}
			
			this._$rotator.css(margin, width).css({overflow:'visible'});
			this._$extPanel.css({top:0, width:width, height:'100%'}).css(position, -width);
			this.createBorderWrapper();
		},
		
		setBackgroundColor: function($el, bgColor) {
			if (typeof bgColor !== 'undefined') {
				if ('' === $.trim(bgColor)) {
					bgColor = 'transparent';
				}
				$el.css({backgroundColor:bgColor});
			}
		},
		
		//init buttons
		initButtons: function() {
			var css = {width:this._options.buttonWidth, height:this._options.buttonHeight, margin:this._options.buttonMargin},
				$playButton, $prevButton, $nextButton;
			
			//init play button
			if (this._options.playButton && 1 < this._numItems) {
				$playButton = $('<div><div></div></div>');
				$playButton.addClass('br-play-button').css(css).toggleClass('br-pause', this._rotate).click($.proxy(this.togglePlay, this)).mousedown(preventDefault);
				if (!ANDROID2) {
					$playButton.addClass('br-all-color-transition');
				}
				this._$cpanel.prepend($playButton);
			}
			
			//init navigation buttons
			if ((true === this._options.navButtons || 'small' === this._options.navButtons) && 1 < this._numItems) {
				$prevButton = $('<div><div></div></div>').addClass('br-prev-button').css(css).toggleClass('br-up', this._verticalCPanel)
														 .click($.proxy(this.prevSlide, this)).mousedown(preventDefault);
				$nextButton = $('<div><div></div></div>').addClass('br-next-button').css(css).toggleClass('br-down', this._verticalCPanel)
														 .click($.proxy(this.nextSlide, this)).mousedown(preventDefault);
				if (!ANDROID2) {
					$prevButton.add($nextButton).addClass('br-all-color-transition');
				}
				
				if (typeof $playButton !== 'undefined') {
					$playButton.before($nextButton).after($prevButton);
				}
				else {
					$prevButton.data('front', true);
					this._$cpanel.append($prevButton).prepend($nextButton);
				}
			}
		},
		
		//init thumbnails
		initThumbnails: function() {
			var thumbnails = (1 < this._numItems ? this._options.thumbnails : false);
			if (false !== thumbnails && 'none' !== thumbnails) {
				this._$thumbPanel = $('<div></div>').addClass('br-thumbnails');
				this._$thumbList = $('<ul></ul>');
				this._$thumbPanel.append(this._$thumbList);
				this._$cpanel.append(this._$thumbPanel);
				
				for (var i = 0; i < this._numItems; i++) {
					if ('number' === thumbnails) {
						this._$thumbList.append('<li>' + (i+1) + '</li>');
					}
					else if ('text' === thumbnails) {
						this._$thumbList.append('<li>' + this._$items.eq(i).data('caption') + '</li>');
					}
					else if ('image' === thumbnails) {
						var $thumb = $('<li></li>').addClass('br-thumb-img'), 
							$img = $('<img alt=""/>').css({opacity:0});
						
						if (!MSIE6) {
							$thumb.append('<div></div>');
							if (!ANDROID2) {
								$thumb.find('>div').addClass('br-opacity-transition');
							}
						}
												
						$thumb.prepend($img).appendTo(this._$thumbList);
						$img.one('load',
							$.proxy(function(e) {
								this.fillContent($(e.currentTarget), this._options.thumbWidth, this._options.thumbHeight);
								$(e.currentTarget).animate({opacity:1}, ANIMATE_SPEED);
							}, this)).attr('src', this._$items.eq(i).data('thumburl'));
						
						if ($img[0].complete || 'complete' === $img[0].readyState) {
							$img.trigger('load');
						}
					}
					else {
						this._$thumbList.append($('<li></li>').toggleClass('br-bullet', 'bullet' === thumbnails));
					}
				}
				
				this._$thumbs = this._$thumbList.children('li');
				
				if (!ANDROID2) {
					this._$thumbs.addClass('bullet' === thumbnails ? 'br-all-transition' : 'br-all-color-transition');
				}
						
				if ('bullet' !== thumbnails) {
					this._$thumbs.css({width:this._options.thumbWidth, height:this._options.thumbHeight, margin:this._options.thumbMargin, lineHeight:this._options.thumbHeight + 'px'});
				}
				
				if (this._options.selectOnHover) {
					this._$thumbs.mouseenter($.proxy(this.selectSlide, this));
				}
				else {
					this._$thumbs.click($.proxy(this.selectSlide, this)).mousedown(preventDefault);
				}
				
				if (this._verticalCPanel) {
					this._$thumbList.css({width:this._$thumbs.outerWidth(true), height:this._numItems * this._$thumbs.outerHeight(true)});
				}
				else {
					this._$thumbList.css({width:this._numItems * this._$thumbs.outerWidth(true), height:this._$thumbs.outerHeight(true)});
				}
				
				this.initTooltip();
			}
			else {
				this._options.thumbnails = false;
			}
		},
		
		//init layer
		initLayer: function($item) {
			var	$layers = $item.children(':not(.tt-html, img.tt-img, img.br-main-img, a.br-img-link)').addClass('br-layer');
			$item.data('layers', $layers);
			this._$screen.find('>.br-layers').append($layers);
			
			$layers.each($.proxy(function(n, el) {
				var $el = $(el), verticalMargin = 'marginTop', horizontalMargin = 'marginLeft';
				
				if ('auto' === $el[0].style.width && 'auto' === $el[0].style.height) {
					$el.css('white-space', 'nowrap');
				}
				
				if (!isNaN(parseInt($el[0].style.top, 0))) {
					if (!isPercent($el[0].style.top)) {
						$el.css({top:(getInteger($el.css('top'), 0)/this._stageHeight * 100) + '%'});
					}
					$el.css({bottom:'auto'});
				}
				else if (!isNaN(parseInt($el[0].style.bottom, 0))) {
					if (!isPercent($el[0].style.bottom)) {
						$el.css({bottom:(getInteger($el.css('bottom'), 0)/this._stageHeight * 100) + '%'});
					}
					$el.css({top:'auto'});
					verticalMargin = 'marginBottom';
				}
				
				if (!isNaN(parseInt($el[0].style.left, 0))) {
					if (!isPercent($el[0].style.left)) {
						$el.css({left:(getInteger($el.css('left'), 0)/this._stageWidth * 100) + '%'});
					}
					$el.css({right:'auto'});
				}
				else if (!isNaN(parseInt($el[0].style.right, 0))) {
					if (!isPercent($el[0].style.right)) {
						$el.css({right:(getInteger($el.css('right'), 0)/this._stageWidth * 100) + '%'});
					}
					$el.css({left:'auto'});
					horizontalMargin = 'marginRight';
				}
				
				this.setShorthandData($el, 'transition', ['effect', 'duration', 'easing', 'delay']);
				this.setShorthandData($el, 'transitionOut', ['effectOut', 'durationOut', 'easingOut', 'delayOut']);
				$el.data({ width: 'auto' === $el[0].style.width ? 'auto' : $el.width(),
						   height:'auto' === $el[0].style.height ? 'auto' : $el.height(),
						   opacity: getFloat($el.css('opacity'), 1),
						   padTop: getInteger($el.css('paddingTop'), 0),
						   padBottom: getInteger($el.css('paddingBottom'), 0),
						   padLeft: getInteger($el.css('paddingLeft'), 0),
						   padRight: getInteger($el.css('paddingRight'), 0),
						   borderTop: getInteger($el.css('borderTopWidth'), 0),
						   borderBottom: getInteger($el.css('borderBottomWidth'), 0),
						   borderLeft: getInteger($el.css('borderLeftWidth'), 0),
						   borderRight: getInteger($el.css('borderRightWidth'), 0),
						   fontSize: parseInt($el.css('fontSize'), 0),
						   lineHeight: parseInt($el.css('lineHeight'), 0),
						   verticalMargin: verticalMargin, horizontalMargin: horizontalMargin,
						   effect: this.getEffect(getValue($el.data('effect'), this._options.layerEffect)),
						   duration: getPosInteger($el.data('duration'), this._options.layerDuration),
						   easing: this.checkEasing(getValue($el.data('easing'), this._options.layerEasing)),
						   delay: getNonNegInteger($el.data('delay'), this._options.layerDelay),
						   effectOut: this.getEffect(getValue($el.data('effectOut'), this._options.layerEffectOut)),
						   durationOut: getPosInteger($el.data('durationOut'), this._options.layerDurationOut),
						   easingOut: this.checkEasing(getValue($el.data('easingOut'), this._options.layerEasingOut)),
						   delayOut: getNonNegInteger($el.data('delayOut'), this._options.layerDelayOut)});
			}, this));
		},
		
		setShorthandData: function($el, name, props) {
			var attr = $el.data(name);
			if (typeof attr !== 'undefined') {
				var arr = attr.split(' ', props.length);
				for (var i = 0; i < props.length; i++) {
					if (typeof arr[i] !== 'undefined') {
						$el.data(props[i], arr[i]);
					}
				}
				$el.removeData(name);
			}
		},
		
		//create effects
		initEffects: function() {
			this._$rotator
				.one('createEffect.vCover', $.proxy(function() {
					this._effects.vCover = new VSlices(this, 1, 0);
				}, this))
				.one('createEffect.hCover', $.proxy(function() {
					this._effects.hCover = new HSlices(this, 1, 0);
				}, this))
				.one('createEffect.blocks', $.proxy(function() {
					this._effects.blocks = new Blocks(this, this._options.blockRows, this._options.blockCols, this._options.blockDelay);
				}, this))
				.one('createEffect.vSlices', $.proxy(function() {
					this._effects.vSlices = new VSlices(this, this._options.verticalSlices, this._options.verticalSliceDelay);
				}, this))
				.one('createEffect.hSlices', $.proxy(function() {
					this._effects.hSlices = new HSlices(this, this._options.horizontalSlices, this._options.horizontalSliceDelay);
				}, this))
				.one('createEffect.vSlide', $.proxy(function() {
					this._effects.vSlide = new Slide(this, 'vertical');
				}, this))
				.one('createEffect.hSlide', $.proxy(function() {
					this._effects.hSlide = new Slide(this, 'horizontal');
				}, this));
			
			var effects = this._$items.map(function() { return $(this).data('effect'); }).get();
			effects[effects.length] = this._options.effect;
			for (var i = 0; i < effects.length; i++) {
				var effect = effects[i];
				if ('random' === effect) {
					this._effectArray = [];
					$.each(EFFECTS, $.proxy(function(key, value) {
						this._effectArray[this._effectArray.length] = key;
					}, this));
					
					this._$rotator.trigger('createEffect');
					break;
				}
				
				if (typeof EFFECTS[effect] !== 'undefined') {
					this._$rotator.trigger('createEffect.' + EFFECTS[effect][0]);
				}
			}
			
			this._$rotator.unbind('createEffect');
		},
		
		//init tooltip
		initTooltip: function() {
			if (false !== this._options.tooltip && 'none' !== this._options.tooltip) {
				this._$tooltip = $('<div></div>').addClass('br-tt br-tt-' + this._cpAlign[0]).append('<div class="br-tt-tip"></div><div class="br-tt-content"></div>');
				var $content = this._$tooltip.find('>.br-tt-content').css({width:this._options.tooltipWidth, height:this._options.tooltipHeight});
				$('body').prepend(this._$tooltip);
				
				if ('image' === this._options.tooltip) {
					this._$items.each($.proxy(function(n, el) {
						var $img = $(el).find('>img.tt-img'),
							$ttImg = $img.clone();
						
						$content.append($ttImg);
						var $thumb = this._$thumbs.eq(n);
						
						$thumb.hover($.proxy(function() {
							this._$tooltip.stop(true, true).find('img').hide().eq(n).show();
							this.displayTooltip($thumb);
						}, this), $.proxy(this.hideTooltip, this));
						
						$img.one('load', $.proxy(function() {
							this.fillContent($img, this._options.tooltipWidth, this._options.tooltipHeight);
							$ttImg.css({visibility:'visible', top:$img.css('top'), left:$img.css('left'), width:$img.width(), height:$img.height()});
							$img.remove();
						}, this)).attr('src', $img.attr('src'));
						
						if ($img[0].complete || 'complete' === $img[0].readyState) {
							$img.trigger('load');
						}					
					}, this));
				}
				else {
					this._$items.each($.proxy(function(n, el) {
						var caption, $el = $(el).find('>.tt-html');
						
						if ($el.length && '' !== $el.html()) {
							caption = $el.html();
						}
						else {
							caption = $(el).data('caption');
						}
						
						if (typeof caption !== 'undefined' && '' !== caption) {
							var $thumb = this._$thumbs.eq(n);
							
							if ('auto' === this._options.tooltipWidth && 'auto' === this._options.tooltipHeight) {
								$content.html(caption);
								var width = $content.width() + 1, height = $content.height() + 1;
								$content.html('');
								
								$thumb.bind(UPDATE_SIZE, $.proxy(function() {
									$content.css({width:width,height:height});
								}, this));
							}
						
							$thumb.hover($.proxy(function() {
								this._$tooltip.stop(true, true);
								$thumb.trigger(UPDATE_SIZE);
								$content.html(caption);
								this.displayTooltip($thumb);
							}, this), $.proxy(this.hideTooltip, this));
						}
					}, this));
				}
				
				if (MSIE) {
					this._$tooltip.mouseleave($.proxy(function(e) {
						if (document.elementFromPoint && !$(document.elementFromPoint(e.clientX, e.clientY)).closest('.banner-rotator').is(this._$rotator)) {
							this._$rotator.trigger('mouseleave');
						}
					}, this));
				}
			}
		},
		
		//display tooltip
		displayTooltip: function($thumb) {
			var $el = this._options.cpanelOutside ? this._$extPanel : $thumb,
				top, left;
			
			if (this._verticalCPanel) {
				left = $el.offset().left;
				if ('left' === this._cpAlign[0]) {
					left += $el.outerWidth();
				}
				else {
					left -= this._$tooltip.outerWidth(true);
				}
				top = $thumb.offset().top - (this._$tooltip.outerHeight(true) - $thumb.outerHeight())/2;
			}
			else {
				top = $el.offset().top;
				if ('top' === this._cpAlign[0]) {
					top += $el.outerHeight();
				}
				else {
					top -= this._$tooltip.outerHeight(true);
				}
				left = $thumb.offset().left - (this._$tooltip.outerWidth(true) - $thumb.outerWidth())/2;
			}
			
			this._tooltipId = setTimeout($.proxy(function() { 
				this._$tooltip.css({opacity:0, top:top, left:left}).show().animate({opacity:1}, ANIMATE_SPEED);
			}, this), this._options.tooltipDelay);
		},
		
		//hide tooltip
		hideTooltip: function() {
			clearTimeout(this._tooltipId);
			this._$tooltip.stop(true).animate({opacity:0}, 400, function() { $(this).hide(); });
		},
		
		//select slide
		selectSlide: function(e) {
			if (this._options.pauseOnInteraction) {
				this.pause();
			}
			
			if (!this._inProgress) {
				var index = $(e.currentTarget).index();
				if (index != this._currIndex) {
					if (this._options.layerOutSync) {
						this.loadDeferred($.proxy(function() { this.select_slide(index); }, this));
					}
					else {
						this.select_slide(index);
					}
				}
			}
		},
		
		select_slide: function(index) {
			this._backward = index < this._currIndex;
			this._currIndex = index;
			this.loadSlide();
		},
		
		//go to previous slide
		prevSlide: function() {
			if (this._options.pauseOnInteraction) {
				this.pause();
			}
			
			if (!this._inProgress) {
				if (this._options.layerOutSync) {
					this.loadDeferred($.proxy(function() { this.prev_slide(); }, this));
				}
				else {
					this.prev_slide();
				}	
			}
		},
		
		prev_slide: function() {
			this._$rotator.trigger(ROTATOR_PREV);
			this._options.onPrev.call(this);
			
			this._backward = true;
			this._currIndex = (this._currIndex > 0) ? (this._currIndex - 1) : (this._numItems - 1);
			this.loadSlide();
		},
		
		//go to next slide
		nextSlide: function() {
			if (this._options.pauseOnInteraction) {
				this.pause();
			}
			
			if (!this._inProgress) {
				if (this._options.layerOutSync) {
					this.loadDeferred($.proxy(function() { this.next_slide(); }, this));
				}
				else {
					this.next_slide();
				}
			}
		},
		
		next_slide: function() {
			this._$rotator.trigger(ROTATOR_NEXT);
			this._options.onNext.call(this);
			
			this._backward = false;
			this._currIndex = (this._currIndex < this._numItems - 1) ? (this._currIndex + 1) : 0;
			this.loadSlide();
		},
		
		//rotate slide
		rotateSlide: function() {
			if (!this._inProgress) {
				if (this._options.layerOutSync) {
					this.loadDeferred($.proxy(function() { this.rotate_slide(); }, this));
				}
				else {
					this.rotate_slide();
				}
			}
		},
		
		rotate_slide: function() {
			this._backward = false;
			this._currIndex = (this._currIndex < this._numItems - 1) ? (this._currIndex + 1) : 0;
			this.loadSlide();
		},
		
		//toggle play
		togglePlay: function() {
			if (this._rotate) { 
				this.pause();
			}
			else {
				this.play();
			}
		},
		
		//play
		play: function() {
			if (!this._rotate) {
				this._rotate = true;
				this._$cpanel.find('>.br-play-button').addClass('br-pause');
				if (!this._inProgress) {
					this.resumeTimer();
				}
				this._$rotator.trigger(ROTATOR_PLAY);
				this._options.onPlay.call(this);
			}
		},
	
		//pause
		pause: function() {
			if (this._rotate) {
				this._rotate = false;
				this._$cpanel.find('>.br-play-button').removeClass('br-pause');
				if (!this._inProgress) {
					this.pauseTimer();
				}
				this._$rotator.trigger(ROTATOR_PAUSE);
				this._options.onPause.call(this);
			}
		},
		
		//display layers
		displayLayers: function() {
			this.stopLayers();
			
			this._layerIds = [];
			this._$currItem.data('layers').each($.proxy(function(n, layer) {
				this._layerIds.push(setTimeout($.proxy(function() { this.animateLayer($(layer)); }, this), $(layer).data('delay')));
			}, this));
		},
		
		//animate layer
		animateLayer: function($layer) {
			$layer.stopTransition(true, true);
			
			var data = $layer.data(),
				from = {}, to = {};
			
			$layer.css({opacity:data.opacity, margin:0, transform:'none'}).show();
			switch(data.effect) {
				case 'fade':
					from = {opacity:0};
					to = {opacity:data.opacity};
					break;
				case 'moveDown':
					var prop = this.getVerticalMoveProp($layer, true);
					from = prop['from'];
					to = prop['to'];
					break;
				case 'moveUp':
					var prop = this.getVerticalMoveProp($layer, false);
					from = prop['from'];
					to = prop['to'];
					break;
				case 'moveRight':
					var prop = this.getHorizontalMoveProp($layer, true);
					from = prop['from'];
					to = prop['to'];
					break;
				case 'moveLeft':
					var prop = this.getHorizontalMoveProp($layer, false);
					from = prop['from'];
					to = prop['to'];
					break;
				case 'zoomIn':
					from = {transform:'scale(0)', opacity:0};
					to = {transform:'scale(1)', opacity:data.opacity};
					break;
				case 'zoomOut':
					from = {transform:'scale(2)', opacity:0};
					to = {transform:'scale(1)', opacity:data.opacity};
					break;
				case 'flipDown':
					from = {transform:'perspective(400px) rotateX(90deg)'};
					to = {transform:'perspective(400px) rotateX(0deg)'};
					break;
				case 'flipUp':
					from = {transform:'perspective(400px) rotateX(-90deg)'};
					to = {transform:'perspective(400px) rotateX(0deg)'};
					break;
				case 'flipRight':
					from = {transform:'perspective(400px) rotateY(-90deg)'};
					to = {transform:'perspective(400px) rotateY(0deg)'};
					break;
				case 'flipLeft':
					from = {transform:'perspective(400px) rotateY(90deg)'};
					to = {transform:'perspective(400px) rotateY(0deg)'};
					break;
				case 'slideDown':
				case 'slideUp':
				case 'slideRight':
				case 'slideLeft':
					this.slideEffect($layer, {effect:data.effect, duration:data.duration, easing:data.easing, effectOut:false});
					this.deferLayerOut($layer);
					return;
				default:
					this.deferLayerOut($layer);
					return;
			}
			
			$layer.css(from).transition(to, data.duration, data.easing);
			this.deferLayerOut($layer);
		},
		
		deferLayerOut: function($layer) {
			var delay = $layer.data('delayOut');
			if (typeof delay !== 'undefined' && 0 < delay) {
				$layer.promise().done($.proxy(function() {
					this._layerIds.push(setTimeout($.proxy(function() { this.animateLayerOut($layer); }, this), delay));
				}, this));
			}
		},
		
		//animate layer out
		animateLayerOut: function($layer) {
			$layer.stopTransition(true, true);
			
			var data = $layer.data(), 
				from = {}, to = {};
			
			switch(data.effectOut) {
				case 'fade':
					from = {opacity:data.opacity};
					to = {opacity:0};
					break;
				case 'moveDown':
					var prop = this.getVerticalMoveProp($layer, false);
					from = prop['to'];
					to = prop['from'];
					break;
				case 'moveUp':
					var prop = this.getVerticalMoveProp($layer, true);
					from = prop['to'];
					to = prop['from'];
					break;
				case 'moveRight':
					var prop = this.getHorizontalMoveProp($layer, false);
					from = prop['to'];
					to = prop['from'];
					break;
				case 'moveLeft':
					var prop = this.getHorizontalMoveProp($layer, true);
					from = prop['to'];
					to = prop['from'];
					break;
				case 'zoomIn':	
					from = {transform:'scale(1)', opacity:data.opacity};
					to = {transform:'scale(2)', opacity:0};
					break;
				case 'zoomOut':			
					from = {transform:'scale(1)', opacity:data.opacity};
					to = {transform:'scale(0)', opacity:0};
					break;
				case 'flipDown':
					from = {transform:'perspective(400px) rotateX(0deg)'};
					to = {transform:'perspective(400px) rotateX(-90deg)'};
					break;
				case 'flipUp':
					from = {transform:'perspective(400px) rotateX(0deg)'};
					to = {transform:'perspective(400px) rotateX(90deg)'};
					break;
				case 'flipRight':
					from = {transform:'perspective(400px) rotateY(0deg)'};
					to = {transform:'perspective(400px) rotateY(90deg)'};
					break;
				case 'flipLeft':
					from = {transform:'perspective(400px) rotateY(0deg)'};
					to = {transform:'perspective(400px) rotateY(-90deg)'};
					break;
				case 'slideDown':
				case 'slideUp':
				case 'slideRight':
				case 'slideLeft':
					this.slideEffect($layer, {effect:data.effectOut, duration:data.durationOut, easing:data.easingOut, effectOut:true, complete:function() { $(this).hide(); }});
					$layer.data({promise:$layer.promise()});
					return;
				default:
					$layer.hide();
					return;
			}
			
			$layer.css(from).transition(to, data.durationOut, data.easingOut, function() { $(this).hide(); }).data({promise:$layer.promise()});
		},
		
		slideEffect: function($el, opts) {
			var effect = opts.effect,
				from = {}, to = {}, 
				that = this,
				position, size;
			
			if ('slideLeft' === effect || 'slideRight' === effect) {
				position = 'left';
				size = $el.outerWidth(true);
			}
			else {
				position = 'top';
				size = $el.outerHeight(true);
			}
				
			if (opts.effectOut) {
				from[position] = 0;
				to[position] = ('slideLeft' === effect || 'slideUp' === effect) ? -size : size;
			}
			else {
				from[position] = ('slideRight' === effect || 'slideDown' === effect) ? -size : size;
				to[position] = 0;
			}
			
			this.createWrapper($el);
			$el.css(from).transition(to, opts.duration, opts.easing,
					function() {
						that.removeWrapper($el);
						
						if ($.isFunction(opts.complete)) {
							opts.complete.call(this);
						}
					});
		},
		
		//create wrapper
		createWrapper: function($el) {
			this.saveStyle($el);
			
			var size = {width:$el.width(), height:$el.height()},
				$wrapper = $('<div></div>');
			
			$wrapper.addClass('br-effect-wrapper').css({
				position:$el.css('position'),
				'float':$el.css('float'),
				width:$el.outerWidth(true),
				height:$el.outerHeight(true),
				zIndex:$el.css('zIndex'),
				top:$el[0].style.top,
				left:$el[0].style.left,
				bottom:$el[0].style.bottom,
				right:$el[0].style.right
			});
			
			$el.wrap($wrapper).css({
				display:'block',
				position:'relative',
				top:0,
				left:0,
				bottom:'auto',
				right:'auto'
			}).css(size);
		},
		
		//remove wrapper
		removeWrapper: function($el) {
			this.restoreStyle($el);
			if ($el.parent().is('.br-effect-wrapper')) {
				$el.unwrap();
			}
		},
		
		//save element style
		saveStyle: function($el) {
			var data = {}, props = ['display', 'position', 'top', 'left', 'bottom', 'right', 'width', 'height'];
			
			for (var i = 0; i < props.length; i++) {
				data[props[i]] = $el[0].style[props[i]];
			}
			
			$el.data('effectdata', data);
		},
		
		//restore element style
		restoreStyle: function($el) {
			$.each($el.data('effectdata'), function(name, val) {
				if (typeof val === 'undefined') {
					val = '';
				}
				$el.css(name, val);
			});
		},
		
		//stop layers
		stopLayers: function() {
			while(this._layerIds.length) {
				clearTimeout(this._layerIds.pop());
			}
			this._$layers.stopTransition(true, true);
		},
		
		//clear layers
		clearLayers: function(useEffect) {
			this.stopLayers();
			var $layers = this._$layers.filter(':visible');
			
			if (useEffect) {
				$layers.each($.proxy(function(n, layer) { this.animateLayerOut($(layer)); }, this));
			}
			else {
				$layers.hide();
			}
		},
		
		//load slide deferred
		loadDeferred: function(callback) {
			if (typeof this._promise === 'undefined' || 'pending' !== this._promise.state()) {
				this._$items.find('>img.br-main-img').unbind('load.display');
				this.resetTimer();
				while(this._layerIds.length) {
					clearTimeout(this._layerIds.pop());
				}
				
				var $layers = this._$layers.filter(':visible');
				if ($layers.length) {
					var promises = [];
					$layers.each($.proxy(
							function(n, layer) {
								var $layer = $(layer);
								if (typeof $layer.data('promise') === 'undefined' || 'pending' !== $layer.data('promise').state()) {
									this.animateLayerOut($layer);
								}
								promises[n] = $layer.data('promise');
							}, this));
					
					this._promise = $.when.apply(null, promises).done(function() { callback.call(this); });
					$layers.removeData('promise');
				}
				else {
					callback.call(this);
				}
			}
		},
		
		//load current slide
		loadSlide: function() {
			this._$items.find('>img.br-main-img').unbind('load.display');
			this._$screen.find('>.br-links>a.br-main-link').hide();
			this.resetTimer();
			this.clearLayers(true);
			
			$.each(this._effects, function(i, effect) {
				effect.clear();
			});
			
			if (0 === this._currIndex) {
				this._$rotator.trigger(ROTATOR_FIRST);
				this._options.onFirstSlide.call(this);
			}
			
			if ((this._numItems - 1) === this._currIndex) {
				this._$rotator.trigger(ROTATOR_LAST);
				this._options.onLastSlide.call(this);
				
				if (this._options.playOnce) {
					this.pause();
				}				
			}
			
			this._$rotator.trigger(ROTATOR_SLIDE_CHANGE);
			this._options.onSlideChange.call(this);
			
			//update current thumb
			if (false !== this._options.thumbnails) {
				this._$thumbs.removeClass('br-curr').eq(this._currIndex).addClass('br-curr');
				this._$rotator.trigger(UPDATE_THUMBNAILS);
			}
			
			//load content
			var $item = this._$items.eq(this._currIndex);
			if ($item.data('ready')) {
				this.displayContent($item);
			}	
			else {
				this._$preloader.show();
				
				//load image
				var $img = $item.find('>img.br-main-img');
				$img.one('load.display',
					$.proxy(function() {
						if (!$item.data('ready')) {
							this.processImage($item);
						}
						this.displayContent($item);
					}, this)
				);
				
				var imgSrc = ((typeof $img.attr('src') === 'undefined' || '' === $img.attr('src')) ? $item.data('imgurl') : $img.attr('src'));
				$img.attr('src', imgSrc);
				
				if ($img[0].complete || 'complete' === $img[0].readyState) {
					$img.trigger('load');
				}
			}	    
		},
		
		//display content
		displayContent: function($item) {
			this._$preloader.hide();
			this._inProgress = true;
					
			this._$prevItem = this._$currItem;
			this._$currItem = $item;
			var data = this._$currItem.data();
			
			//show link
			if (typeof data.linkEl !== 'undefined') {
				data.linkEl.show();
			}
			
			//show layers
			if (!this._options.layerSync) {
				this.displayLayers();
			}
			
			//show if 1st
			if (typeof this._$prevItem === 'undefined' || this._$prevItem.index() == this._$currItem.index()) {
				this.displayCurrent();
				return;
			}
			
			//setup effect
			var effect = data.effect;
			if ('random' === effect) {
				effect = this._effectArray[Math.floor(Math.random() * this._effectArray.length)];
			}
			
			if (typeof EFFECTS[effect] !== 'undefined') {
				var name = EFFECTS[effect][0];
				var fn 	 = EFFECTS[effect][1];
				this._effects[name][fn](this._$currItem.find('>img.br-main-img'), effect, data.duration, data.easing);
			}
			else {
				this.displayCurrent();
			}
		},
		
		//display current item
		displayCurrent: function() {
			this._$rotator.trigger(ROTATOR_SLIDE_COMPLETE);
			this._options.onSlideComplete.call(this);
			
			//show layers
			if (this._options.layerSync) {
				this.displayLayers();
			}
			
			this._$items.css({visibility:'hidden'});
			this._$currItem.css({visibility:'visible'});
			
			this.startTimer();
			this._inProgress = false;
		},
		
		loadImage: function($item) {
			var deferred = $.Deferred(),
				$img = $item.find('>img.br-main-img');
			
			$img.one('load', $.proxy(function() {  
					if (!$item.data('ready')) {
						this.processImage($item);
					}
					deferred.resolve();
				}, this))
				.error(function() { 
					deferred.reject(); 
				});
				
			var imgSrc = ((typeof $img.attr('src') === 'undefined' || '' === $img.attr('src')) ? $item.data('imgurl') : $img.attr('src'));
			$img.attr('src', imgSrc);
				
			if ($img[0].complete || 'complete' === $img[0].readyState) {
				$img.trigger('load');
			}
			
			return deferred;
		},
			
		//load next image
		loadNextImage: function(items, callback) {
			if (items.length) {
				$.when(this.loadImage($(items.pop()))).always($.proxy(function() {
					this.loadNextImage(items, callback);
				}, this));
			}
			else if ($.isFunction(callback)) {
				callback.call(this);
			}
		},
		
		//load all images
		loadAllImages: function() {
			var i = 0;
			var id = setInterval($.proxy(function() {
				if (i < this._numItems) { 
					var $item = this._$items.eq(i++),
						$img = $item.find('>img.br-main-img');
					
					$img.one('load', $.proxy(function() {
						if (!$item.data('ready')) {
							this.processImage($item);
						}
					}, this));
					
					var imgSrc = ((typeof $img.attr('src') === 'undefined' || '' === $img.attr('src')) ? $item.data('imgurl') : $img.attr('src'));
					$img.attr('src', imgSrc);
			
					if ($img[0].complete || 'complete' === $img[0].readyState) {
						$img.trigger('load');
					}
				}
				else {
					clearInterval(id);
				}
			}, this), 100);
		},
		
		//process image
		processImage: function($item) {
			var $img = $item.find('>img.br-main-img'),
				position = getValue($item.data('imagePosition'), this._options.imagePosition),
				arr = (position + '').split(' ');
			
			if (2 === arr.length) {
				if (!isNaN(parseInt(arr[0], 0))) {
					$img.css({left:arr[0]});
				}
				if (!isNaN(parseInt(arr[1], 0))) {
					$img.css({top:arr[1]});
				}
			}
			else {
				switch(position) {
					case 'fill':
						this.fillContent($img, this._stageWidth, this._stageHeight);
						break;
					case 'fit':
						this.fitContent($img, this._stageWidth, this._stageHeight);
						break;
					case 'center':
						this.centerContent($img, this._stageWidth, this._stageHeight);
						break;
					case 'stretch':
						this.stretchContent($img, this._stageWidth, this._stageHeight);
						break;
				}
			}
						
			var ratio = this._$stage.width()/this._stageWidth,
			top = parseInt($img.css('top'), 0),
			left = parseInt($img.css('left'), 0),
			width = $img.width(),
			height = $img.height();
				
			$img.data({top:top, left:left, width:width, height:height})
				.css({top:Math.round(ratio * top), left:Math.round(ratio * left), width:Math.round(ratio * width), height:Math.round(ratio * height)});
				
			$item.data('ready', true);
		},
		
		//center content
		centerContent: function($content, boxWidth, boxHeight) {
			$content.css({top:(boxHeight - $content.height())/2, left:(boxWidth - $content.width())/2});
		},
		
		//fill content
		fillContent: function($content, boxWidth, boxHeight) {
			if ('auto' === boxWidth || 'auto' === boxHeight) {
				return;
			}
			
			var width = $content.width(), height = $content.height(),
				scale = Math.max(boxHeight/height, boxWidth/width);
			
			$content.css({width:width * scale, height:height * scale});
			this.centerContent($content, boxWidth, boxHeight);
		},
		
		//fit content
		fitContent: function($content, boxWidth, boxHeight) {
			var width = $content.width(), 
				height = $content.height(),
				boxRatio = boxWidth/boxHeight, 
				ratio = width/height;
			
			if (boxRatio > ratio) {
				width *= boxHeight/height;
				height = boxHeight;
			}
			else {
				height *= boxWidth/width;
				width = boxWidth;
			}
			
			$content.css({width:width, height:height});
			this.centerContent($content, boxWidth, boxHeight);
		},
		
		//stretch content
		stretchContent: function($content, boxWidth, boxHeight) {
			$content.css({top:0, left:0, width:boxWidth, height:boxHeight});
		},
		
		//start timer
		startTimer: function() {
			this._delay = this._$currItem.data('delay');
			this.resumeTimer();
		},
		
		//resume timer
		resumeTimer: function() {
			if (this._rotate && 0 < this._delay) {
				this._start = new Date();
				this._timerId = setTimeout($.proxy(this.rotateSlide, this), this._delay);
				
				if (typeof this._timer !== 'undefined') {
					this._timer.start(this._delay);
				}
			}
		},
		
		//reset timer
		resetTimer: function() {
			this._delay = 0;
			clearTimeout(this._timerId);
			
			if (typeof this._timer !== 'undefined') {
				this._timer.stop();
			}
		},
		
		//pause timer
		pauseTimer: function() {
			if (typeof this._start !== 'undefined') {
				this._delay -= (new Date() - this._start);
			}
			clearTimeout(this._timerId);
			
			if (typeof this._timer !== 'undefined') {
				this._timer.pause();
			}
		},
		
		//init horizontal thumb scroll
		initHorizontalScroll: function() {
			this._scrollEasing = ('easeOutCirc' in $.easing) ? 'easeOutCirc' : 'linear';
			this._$rotator.bind(UPDATE_THUMBNAILS, $.proxy(this.updateHorizontalThumbs, this));
			
			if (!IS_TOUCH) {
				this._$thumbPanel.hover($.proxy(function() { this._$rotator.unbind(UPDATE_THUMBNAILS); }, this),
										$.proxy(function() { this._$rotator.unbind(UPDATE_THUMBNAILS).bind(UPDATE_THUMBNAILS, $.proxy(this.updateHorizontalThumbs, this)); }, this))
				.mousemove($.proxy(function(e) {
					var ratio = (e.pageX - this._$thumbPanel.offset().left)/this._$thumbPanel.width();
					this._$thumbList.animate({left:Math.round(this._$thumbPanel.data('range') * ratio)}, {duration:ANIMATE_SPEED, easing:this._scrollEasing, queue:false});
				}, this));
			}		
		},
		
		//init vertical thumb scroll
		initVerticalScroll: function() {
			this._scrollEasing = ('easeOutCirc' in $.easing) ? 'easeOutCirc' : 'linear';
			this._$rotator.bind(UPDATE_THUMBNAILS, $.proxy(this.updateVerticalThumbs, this));
			
			if (!IS_TOUCH) {
				this._$thumbPanel.hover($.proxy(function() { this._$rotator.unbind(UPDATE_THUMBNAILS); }, this), 
										$.proxy(function() { this._$rotator.unbind(UPDATE_THUMBNAILS).bind(UPDATE_THUMBNAILS, $.proxy(this.updateVerticalThumbs, this)); }, this))
				.mousemove($.proxy(function(e) {
					var ratio = (e.pageY - this._$thumbPanel.offset().top)/this._$thumbPanel.height();
					this._$thumbList.animate({top:Math.round(this._$thumbPanel.data('range') * ratio)}, {duration:ANIMATE_SPEED, easing:this._scrollEasing, queue:false});
				}, this));
			}
		},
		
		//update horizontal thumb list position
		updateHorizontalThumbs: function() {
			var thumbLeft = this._$thumbs.eq(this._currIndex).offset().left,
				panelLeft = this._$thumbPanel.offset().left;
			
			if (thumbLeft < panelLeft) {
				this._$thumbList.animate({left:-this._currIndex * this._$thumbs.outerWidth(true)}, {duration:ANIMATE_SPEED, easing:this._scrollEasing, queue:false});
			}
			else if (thumbLeft + this._$thumbs.width() > panelLeft + this._$thumbPanel.width()) {
				var left = (((this._numItems - 1) - this._currIndex) * this._$thumbs.outerWidth(true)) + this._$thumbPanel.data('range');
				this._$thumbList.animate({left:left}, {duration:ANIMATE_SPEED, easing:this._scrollEasing, queue:false});
			}		
		},
		
		//update vertical thumb list position
		updateVerticalThumbs: function() {
			var thumbTop = this._$thumbs.eq(this._currIndex).offset().top, 
				panelTop = this._$thumbPanel.offset().top;
			
			if (thumbTop < panelTop) {
				this._$thumbList.animate({top:-this._currIndex * this._$thumbs.outerHeight(true)}, {duration:ANIMATE_SPEED, easing:this._scrollEasing, queue:false});
			}
			else if (thumbTop + this._$thumbs.height() > panelTop + this._$thumbPanel.height()) {
				var top = (((this._numItems - 1) - this._currIndex) * this._$thumbs.outerHeight(true)) + this._$thumbPanel.data('range');
				this._$thumbList.animate({top:top}, {duration:ANIMATE_SPEED, easing:this._scrollEasing, queue:false});
			}		
		},
		
		//resize horizontal cpanel
		resizeHorizontalCPanel: function() {
			this._$thumbPanel.css({width:Math.min(this._$screen.width() - this._$cpanel.data('margin') - this._$cpanel.data('buttonsSize'), this._$thumbList.width())});
			this._$cpanel.css({width:this._$cpanel.data('buttonsSize') + this._$thumbPanel.width()});
			this._$cpWrapper.siblings('.br-ext-bg').css({width:this._$screen.width()});
			
			this._$thumbList.stop();
			var range = this._$thumbPanel.width() - this._$thumbList.width();
			if (this._$thumbList.position().left < range) {
				this._$thumbList.css({left:range});
			}
			this._$thumbPanel.data({range:range});
			
			if ('center' === this._cpAlign[1]) {
				this._$cpanel.css({left:-this._$cpanel.outerWidth(true)/2});
			}
		},
		
		//resize vertical cpanel
		resizeVerticalCPanel: function() {
			this._$thumbPanel.css({height:Math.min(this._$screen.height() - this._$cpanel.data('margin') - this._$cpanel.data('buttonsSize'), this._$thumbList.height())});
			this._$cpanel.css({height:this._$cpanel.data('buttonsSize') + this._$thumbPanel.height()});
			this._$rotator.find('>.br-ext-cp').css({height:this._$screen.height()});
			
			this._$thumbList.stop();
			var range = this._$thumbPanel.height() - this._$thumbList.height();
			if (this._$thumbList.position().top < range) {
				this._$thumbList.css({top:range});
			}
			this._$thumbPanel.data({range:range});
			
			if ('center' === this._cpAlign[1]) {
				this._$cpanel.css({top:-this._$cpanel.outerHeight(true)/2});
			}
		},
		
		touchStart: function(e) {
			this._swipeMove = 0;
			if (1 === e.originalEvent.touches.length) {
				this._swipeStart = new Date();
				this._startX = e.originalEvent.touches[0].pageX;
				this._startY = e.originalEvent.touches[0].pageY;
				this._$rotator.bind('touchmove', $.proxy(this.touchMove, this)).one('touchend', $.proxy(this.touchEnd, this));
			}
		},
		
		touchMove: function(e) {
			var xDist = this._startX - e.originalEvent.touches[0].pageX;
			var	yDist = this._startY - e.originalEvent.touches[0].pageY;
				
			if ('verticalSlide' === this._options.effect) {
				this._swipeMove = yDist;
				this._touchScrolling = Math.abs(this._swipeMove) < Math.abs(xDist);
			}
			else {
				this._swipeMove = xDist;
				this._touchScrolling = Math.abs(this._swipeMove) < Math.abs(yDist);
			}
			
			if (!this._touchScrolling) {
				e.preventDefault();
			}
		},
		
		touchEnd: function(e) {
			this._$rotator.unbind('touchmove');
			
			if (!this._touchScrolling) {
				if (Math.abs(this._swipeMove) > SWIPE_MIN) {
					if (this._swipeMove > 0) {
						this.nextSlide();
					}
					else if (this._swipeMove < 0) {
						this.prevSlide();
					}
				}
			}
		},
		
		//mousewheel scroll content
		mousescroll: function(e) {
			e.preventDefault();
			var delta = (typeof e.originalEvent.wheelDelta === 'undefined') ?  -e.originalEvent.detail : e.originalEvent.wheelDelta;
			if (delta > 0) {
				this.prevSlide();
			}
			else {
				this.nextSlide();
			}
		},
		
		//keyup event handler
		keyControl: function(e) {
			switch(e.keyCode) {
				case 37:
					this.prevSlide();
					break;
				case 39:
					this.nextSlide();
					break;
				case 80:
					this.togglePlay();
					break;
			}
		},
						
		//resize
		resize: function() {
			if ($(window).width() !== this._winWidth) {
				this._winWidth = $(window).width();
				this.resetTimer();
				this.clearLayers(false);
				
				//resize stage
				var ratio = this._$stage.width()/this._stageWidth;
				this._$stage.css({height:Math.round(ratio * this._stageHeight)});
				this._$screen.css({width:this._$stage.width(), height:this._$stage.height()});
				
				//resize effects
				$.each(this._effects, function(i, effect) {
					effect.resize(ratio);
				});
				
				//resize images
				this._$items.each(function() {
					if ($(this).data('ready')) {
						var $img = $(this).find('>img.br-main-img');
						$img.css({top:Math.round(ratio * $img.data('top')), left:Math.round(ratio * $img.data('left')), width:Math.round(ratio * $img.data('width')), height:Math.round(ratio * $img.data('height'))})
					}
				});
				
				//resize layers
				this._$layers.each(function() {
					var data = $(this).data(), size = {};
					if (!isNaN(data.width)) {
						size['width'] = Math.ceil(ratio * data.width) + 'px';
					}
					
					if (!isNaN(data.height)) {
						size['height'] = Math.ceil(ratio * data.height) + 'px';
					}
					
					$(this).css({paddingTop:Math.round(ratio * data.padTop) + 'px',
								 paddingBottom:Math.round(ratio * data.padBottom) + 'px',
								 paddingLeft:Math.round(ratio * data.padLeft) + 'px',
								 paddingRight:Math.round(ratio * data.padRight) + 'px',
								 borderTopWidth:Math.round(ratio * data.borderTop) + 'px',
								 borderBottomWidth:Math.round(ratio * data.borderBottom) + 'px',
								 borderLeftWidth:Math.round(ratio * data.borderLeft) + 'px',
								 borderRightWidth:Math.round(ratio * data.borderRight) + 'px',
								 fontSize:Math.floor(ratio * data.fontSize) + 'px',
								 lineHeight:Math.floor(ratio * data.lineHeight) + 'px'})
							.css(size);
				});
				
				//resize control panel
				this._$rotator.trigger(RESIZE_CPANEL);
				
				//display current
				var $currItem = this._$items.eq(this._currIndex);
				if ($currItem.data('ready')) {
					this._$items.css({visibility:'hidden'});
					$currItem.css({visibility:'visible'});
					this.displayLayers();
					this.startTimer();
				}
			}
		},
		
		getEffect: function(effect) {
			if (!this._cssTransform) {
				if (-1 < $.inArray(effect, ['zoomIn', 'zoomOut', 'flipDown', 'flipUp', 'flipRight', 'flipLeft'])) {
					effect = 'fade';
				}
			}
			return effect;
		},
		
		//shuffle items
		shuffleItems: function($list) {
			var items = $list.children('li').toArray();
			shuffleArray(items);
			$list.append(items);
		},
		
		//check for valid easing
		checkEasing: function(easing) {
			if (this._cssTransition) {
				if (!(easing in CUBIC_BEZIER)) {
					easing = 'ease';
				}
			}
			else if (!(easing in $.easing)) {
				easing = 'swing';
			}
			
			return easing;
		},
		
		onTooltip: function(e) {
			if (MSIE && document.elementFromPoint) {
				return $(document.elementFromPoint(e.clientX, e.clientY)).closest('.br-tt').is(this._$tooltip);
			}	
			return false;
		},
		
		getVerticalOffset: function($el, down) {
			var y;
			if ('marginBottom' === $el.data('verticalMargin')) {
				down = !down;
				y = $el[0].style.bottom;
			}
			else {
				y = $el[0].style.top;
			}
			
			y = Math.ceil(parseFloat(y)/100 * this._$screen.height());
			return down ? -(y + $el.outerHeight() + 1) : (this._$screen.height() - y) + 1;
		},
		
		getHorizontalOffset: function($el, right) {
			var x;
			if ('marginRight' === $el.data('horizontalMargin')) {
				right = !right;
				x = $el[0].style.right;
			}
			else {
				x = $el[0].style.left;
			}
			
			x = Math.ceil(parseFloat(x)/100 * this._$screen.width());
			return right ? -(x + $el.outerWidth() + 1) : (this._$screen.width() - x) + 1;
		},
		
		getVerticalMoveProp: function($layer, isDown) {
			var from = {}, to = {};
			
			if (this._cssTransform) {
				var top = $layer.position().top;
				var offset = (isDown ? -(top + $layer.outerHeight()) : (this._$screen.outerHeight() - top));
				from['transform'] = 'translateY(' + offset + 'px)';
				to['transform'] = 'translateY(0)';
			}
			else {
				var data = $layer.data();
				from[data.verticalMargin] = this.getVerticalOffset($layer, isDown);
				to[data.verticalMargin] = 0;
			}
			
			return {from:from, to:to};
		},
		
		getHorizontalMoveProp: function($layer, isRight) {
			var from = {}, to = {};
			
			if (this._cssTransform) {
				var left = $layer.position().left;
				var offset = (isRight ? -(left + $layer.outerWidth()) : (this._$screen.outerWidth() - left));
				from['transform'] = 'translateX(' + offset + 'px)';
				to['transform'] = 'translateX(0)';
			}
			else {
				var data = $layer.data();
				from[data.horizontalMargin] = this.getHorizontalOffset($layer, isRight);
				to[data.horizontalMargin] = 0;
			}
			
			return {from:from, to:to};
		}
	}
	
	//prevent default
	function preventDefault(e) {
		e.preventDefault();
	}
	
	//get int value
	function getInteger(val, defaultVal) {
		return parseInt(val, 0) || defaultVal;
	}
	
	//get positive int
	function getPosInteger(val, defaultVal) {
		val = parseInt(val, 0);
		return (isNaN(val) || val <= 0) ? defaultVal : val;
	}

	//get nonnegative int
	function getNonNegInteger(val, defaultVal) {
		val = parseInt(val, 0);
		return (isNaN(val) || val < 0) ? defaultVal : val;
	}
	
	//get float value
	function getFloat(val, defaultVal) {
		return parseFloat(val) || defaultVal;
	}
	
	//get string value
	function getValue(val, defaultVal) {
		return (typeof val !== 'undefined') ? val : defaultVal;
	}
	
	//check style percent
	function isPercent(style) {
		return (style.indexOf('%') > 0);
	}
	
	//get style property support
	function styleSupport(prop) {
		var prefixes = ['Webkit', 'Moz', 'O', 'ms'],
			elem = document.body || document.documentElement,
			style = elem.style,
			supportedProp = false;
	
		if (typeof style[prop] !== 'undefined') {
			supportedProp = prop;
		}
		else {
			var capProp = prop.charAt(0).toUpperCase() + prop.slice(1);
			for (var i = 0; i < prefixes.length; i++) {
				var prefixProp = prefixes[i] + capProp;
				if (typeof style[prefixProp] !== 'undefined') {
					supportedProp = prefixProp;
					break;
				}
			}
		}

		$.support[prop] = supportedProp;
		return supportedProp;
	}
	
	//msie ver. check
	function msieCheck(ver) {
		if (/MSIE (\d+\.\d+);/.test(navigator.userAgent)) {
	 		var ieVer = new Number(RegExp.$1);
			if (typeof ver === 'undefined' || ieVer <= ver) {
				return true;
			}
		}
		return false;
	}
	
	//android check
	function androidCheck(ver) {
		var ua = navigator.userAgent;
		var index = ua.indexOf('Android');
		if (index > -1) {
			if (typeof ver === 'undefined' || parseFloat(ua.slice(index + 8)) <= ver) {
				return true;
			}
		}
		return false;
	}
	
	function chromeCheck() {
		var ua = navigator.userAgent;
		var index = ua.indexOf('Chrome');
		return (index > -1);
	}
	
	//shuffle array
	function shuffleArray(arr) {
		var i = arr.length;
		while(--i > 0) {
			var ri = Math.floor(Math.random() * (i+1)),
				temp = arr[i];
			arr[i] = arr[ri];
			arr[ri] = temp;
		}
	}
		
	//copy border
	$.fn.copyBorder = function($source) {
		var sides = ['top', 'bottom', 'left', 'right'],
			props = ['width', 'style', 'color'],
			radius = ['borderRadiusTopLeft', 'borderRadiusTopRight', 'borderRadiusBottomLeft', 'borderRadiusBottomRight'];
		
		return this.each(
			function() {
				for (var i = 0; i < sides.length; i++) {
					for (var j = 0; j < props.length; j++) {
						var name = 'border-' + sides[i] + '-' + props[j];
						$(this).css(name, $source.css(name));
					}
				}
				
				for (var j = 0; j < radius.length; j++) {
					$(this).css(radius[j], $source.css(radius[j]));
				}
			}
		);
	}
	
	//transition
	$.fn.transition = function() {
		var props = arguments[0],
			duration, easing, complete, always;
		
		if (typeof arguments[1] === 'object') {
			var opts = arguments[1];
			duration = opts['duration'];
			easing = opts['easing'];
			complete = opts['complete'];
			always = opts['always'];
		}
		else {
			duration = arguments[1];
			easing = arguments[2];
			complete = arguments[3];
		}
		duration = getValue(duration, 400);
		easing = getValue(easing, 'swing');
		
		return this.each(
			function() {
				$(this).queue(function(){
					if ($.isFunction(complete)) {
						$(this).one(CSS_TRANSITION_END, complete);
						$(this).forceTransitionEnd(duration + 50);
					}
					
					if ($.isFunction(always)) {
						$(this).one(CSS_TRANSITION_END + '.always', always);
					}
					
					$(this).one(CSS_TRANSITION_END, function() { 
						$(this).dequeue();
					});
					
					props[CSS_TRANSITION] = 'all ' + duration + 'ms ' + CUBIC_BEZIER[easing];
					$(this).reflow().css(props);
				});
			}
		);
	}
	
	//stop transition
	$.fn.stopTransition = function(clearQueue, jumpToEnd) {
		return this.each(
			function() {
				if (clearQueue) {
					$(this).clearQueue();
				}
				
				clearTimeout($(this).data('endId'));
				if (jumpToEnd) {
					$(this).trigger(CSS_TRANSITION_END);
				}
				else {
					$(this).trigger(CSS_TRANSITION_END + '.always');
					$(this).unbind(CSS_TRANSITION_END);
				}
				
				$(this).css(CSS_TRANSITION, 'none').css(CSS_TRANSITION + '-duration', '0s').dequeue();
			}
		);
	}
	
	//force reflow
	$.fn.reflow = function() {
		return this.each(
			function() {
				var reflow = this.offsetWidth;
			}
		);
	}
	
	//force transition end
	$.fn.forceTransitionEnd = function(duration) {
		return this.each(function() {
			var called = false;
			
			$(this).one(CSS_TRANSITION_END, function() { called = true; });
			$(this).data('endId', setTimeout($.proxy(function() {
				if (!called) {
					$(this).trigger(CSS_TRANSITION_END);
				}
			}, this), duration));
		});
	}
	
	if ($.cssHooks && $.support.borderRadius) {
		function borderCornerRadius(dir) {
			var prefix = ('borderRadius' === $.support.borderRadius) ? 'border' : $.support.borderRadius.replace('BorderRadius', '') + 'Border'; 
			if ('MozBorderRadius' === $.support.borderRadius) {
				return 'MozBorderRadius' + dir.charAt(0).toUpperCase() + dir.substr(1).toLowerCase();
			}
			else {
				return prefix + dir + 'Radius';
			}
		}
		
		$.each(['TopLeft', 'TopRight', 'BottomRight', 'BottomLeft'], function(i, dir) {
			$.cssHooks['borderRadius' + dir] = {
				get: function(elem, computed, extra) {
					return $.css(elem, borderCornerRadius(dir));
				},
				set: function(elem, value) {
					elem.style[borderCornerRadius(dir)] = value;
				}
			};
		});
	}
	
	var methods = {
  		play: function() {
			$(this).data(PLUGIN_NAME).play();
		},
  		pause: function() {
			$(this).data(PLUGIN_NAME).pause();
		},
		previous: function() {
			$(this).data(PLUGIN_NAME).prevSlide();
		},
		next: function() {
			$(this).data(PLUGIN_NAME).nextSlide();
		},
		destroy: function() {
			var obj = $(this).data(PLUGIN_NAME);
			obj.pause();
			if (typeof obj._namespace !== 'undefined' && '' !== obj._namespace) {
				$(window).add($(document)).unbind(obj._namespace);
			}
			obj._$rotator.add($('*', obj._$rotator)).unbind().removeData();
			$(this).removeData(PLUGIN_NAME);
		}
 	};
	
	var defaults = { 
		width:1000,
		height:300,
		thumbWidth:28,
		thumbHeight:28,
		thumbMargin:3,
		buttonWidth:28,
		buttonHeight:28,
		buttonMargin:3,
		tooltipWidth:'auto',
		tooltipHeight:'auto',
		backgroundRepeat:'repeat',
		backgroundPosition:'center center',
		startIndex:0,
		autoPlay:true,
		delay:6000,
		playOnce:false,
		pauseOnHover:false,
		pauseOnInteraction:false,
		effect:'fade',
		duration:800,
		easing:'',
		cpanelAlign:'bottom',
		cpanelOutside:false,
		cpanelOnHover:false,
		thumbnails:'number',
		selectOnHover:false,
		tooltip:'text',
		tooltipDelay:0,
		playButton:true,
		timer:'pie',
		timerAlign:'topRight',
		navButtons:'small',
		navButtonsOnHover:false,
		layerEffect:'fade',
		layerDuration:ANIMATE_SPEED,
		layerEasing:'',
		layerDelay:0,
		layerEffectOut:'fade',
		layerDurationOut:ANIMATE_SPEED,
		layerEasingOut:'',
		layerDelayOut:-1,
		layerSync:true,
		layerOutSync:true,
		layerOnHover:false,
		imagePosition:'fill',
		blockCols:12,
		blockRows:4,
		verticalSlices:14,
		horizontalSlices:6,
		blockDelay:25,
		verticalSliceDelay:75,
		horizontalSliceDelay:75,
		shuffle:false,
		mousewheel:false,
		keyboard:true,
		swipe:true,
		cssTransition:true,
		responsive:true,
		onInit:function() {},
		onSlideChange:function() {},
		onSlideComplete:function() {},
		onFirstSlide:function() {},
		onLastSlide:function() {},
		onPlay:function() {},
		onPause:function() {},
		onPrev:function() {},
		onNext:function() {}
	};
		
	$.fn.bannerRotator = function() {
		var args = arguments;
		var params = args[0];
		
		return this.each(
			function(n, el) {
				if (methods[params]) {
					if (typeof $(el).data(PLUGIN_NAME) !== 'undefined') {
						methods[params].apply(el, Array.prototype.slice.call(args, 1));
					}
				}
				else if (typeof params === 'object' || !params) {
					var plugin = new Rotator(el, $.extend({}, defaults, params));
					$(el).data(PLUGIN_NAME, plugin);
					
					plugin._$rotator.trigger(ROTATOR_INIT);
					plugin._options.onInit.call(plugin);
				}
			}
		);
	}
})(jQuery);