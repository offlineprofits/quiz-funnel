/*!
 * Fancy Countdown v1.2
 *
 * Copyright 2011, Rafael Dery
 *
 * Only for sale at the envato marketplaces
 */

;(function($) {
	$.fancyCountdown = {version: '1.2'};
	
	$.fn.fancyCountdown = function(arg) {
		
		var options = $.extend({},$.fn.fancyCountdown.defaults,arg);
		var $elem, timerInterval, targetDate, startTimeSet = false, currentSec1, currentSec2, currentMin1, currentMin2, currentHour1, currentHour2, currentDay1, currentDay2, currentDay3 ;
	    var second1Digits, second2Digits, minute1Digits, minute2Digits, hour1Digits, hour2Digits, day1Digits, day2Digits, day3Digits;
		
			function _init(elem) {
				
				$elem = $(elem);	
				$elem.addClass('fc-panel');
							
				//check if digit unit is requested
				if(options.digits.seconds) {
				  second1Digits = _createDigitUnit('seconds');
				  second2Digits = _createDigitUnit('seconds');
				}
				if(options.digits.minutes) {
				  if(options.digits.seconds) _createColon();
				  minute1Digits = _createDigitUnit('minutes');
				  minute2Digits = _createDigitUnit('minutes');
				}
				if(options.digits.hours) {
				   if(options.digits.minutes) _createColon();
				  hour1Digits = _createDigitUnit('hours');
				  hour2Digits = _createDigitUnit('hours');
				}
				if(options.digits.days) {
				  if(options.digits.days) _createColon();
				  if(options.dayDigitsAmount > 0) { day1Digits = _createDigitUnit('days') }
				  if(options.dayDigitsAmount > 1) { day2Digits = _createDigitUnit('days') }
				  if(options.dayDigitsAmount > 2) { day3Digits = _createDigitUnit('days') }
				}
				
				$elem.find('.fc-digits ul li, .fc-colon').css('font-size', options.digitSize);
				
				//set captions if requested
				if(options.captions) {
					var offset = parseInt($elem.children('.fc-digitUnit').css('margin-right')) * 0.5;
					if(options.digits.seconds) _createTitle(options.captionTitles.seconds, $($elem.children('.fc-seconds')[1]).position().left-offset);
					if(options.digits.minutes) _createTitle(options.captionTitles.minutes, $($elem.children('.fc-minutes')[1]).position().left-offset);
					if(options.digits.hours) _createTitle(options.captionTitles.hours, $($elem.children('.fc-hours')[1]).position().left-offset);
					if(options.digits.days) _createTitle(options.captionTitles.days, ((options.digitUnitWidth * options.dayDigitsAmount) * 0.5) + (offset * (options.dayDigitsAmount)));						
				}	
	
		        if(options.autoStart) $.fancyCountdown.start();
		        
		        //stop countdown when changing tab, restart when coming back
		        $(window).blur($.fancyCountdown.stop);
		        $(window).focus($.fancyCountdown.start);
			};
			
			function _timer() {
				
				//target date depending on the timezone
				targetDate = Date.UTC(options.year, options.month-1, options.day, options.hour-options.timezone, options.minute, options.second);
				var now = new Date();
				
				//calculate seconds, minutes, hours and days
				var timeLeft = targetDate - now.getTime();
				var seconds = Math.floor(timeLeft / 1000);
			    var minutes = Math.floor(seconds / 60);
			    var hours = Math.floor(minutes / 60);
			    var days = Math.floor(hours / 24);
				seconds %= 60;
			    minutes %=60;
			    hours %=24;
				
				//getting the different digits of each time unit
				var sec1 = Math.floor(seconds % 10);
				var sec2 = Math.floor(seconds / 10);
				var min1 = Math.floor(minutes % 10);
				var min2 = Math.floor(minutes / 10);
				var hour1 = Math.floor(hours % 10);
				var hour2 = Math.floor(hours / 10);
				var day1 = Math.floor(days % 10);
				var day2 = Math.floor((Math.floor(days / 10)) % 10);
				var day3= Math.floor(days / 100);
				
				//set the start digits once
				if(!startTimeSet) {
					currentSec1 = sec1;
					currentSec2 = sec2;
					currentMin1 = min1;
					currentMin2 = min2;
					currentHour1 = hour1;
					currentHour2 = hour2;
					currentDay1 = day1;
					currentDay2 = day2;
					currentDay3 = day3;
					
					var digitValue = -2;
					for(var i=0; i < 4; ++i) {
						if(options.digits.seconds) {
						  if(second1Digits) { second1Digits[i].text(_calculateTimeRange(sec1+digitValue, 0, 9)); }
						  if(second2Digits) { second2Digits[i].text(_calculateTimeRange(sec2+digitValue, 0, 5)); }
						}
						if(options.digits.minutes) {
						  if(minute1Digits) { minute1Digits[i].text(_calculateTimeRange(min1+digitValue, 0, 9)); }
						  if(minute2Digits) { minute2Digits[i].text(_calculateTimeRange(min2+digitValue, 0, 5)); }
						}
						if(options.digits.hours) {
						  if(hour1Digits) { hour1Digits[i].text(_calculateTimeRange(hour1+digitValue, 0, 9)); }
						  if(hour2Digits) { hour2Digits[i].text(_calculateTimeRange(hour2+digitValue, 0, 2)); }
						}
						if(options.digits.days) {
						  if(day1Digits) { day1Digits[i].text(_calculateTimeRange(day1+digitValue, 0, 9)); }
						  if(day2Digits) { day2Digits[i].text(_calculateTimeRange(day2+digitValue, 0, 9)); }
						  if(day3Digits) { day3Digits[i].text(_calculateTimeRange(day3+digitValue, 0, 9)); }
						}
						++digitValue;
					}
				}
				startTimeSet = true;
				
				//check if target date is reached
				if(timeLeft > 0)
				{
					//show next second of digit one when the current second has changed
					if(currentSec1 != sec1) {
						if(second1Digits) { _moveDigits(second1Digits, _calculateTimeRange(sec1-2, 0, 9)); }
						currentSec1 = sec1;
					}
					//show next second of digit two when the current second has changed
					if(currentSec2 != sec2 && second2Digits) {
						_moveDigits(second2Digits, _calculateTimeRange(sec2-2, 0, 5));
						currentSec2 = sec2;
					}
					//show next minute of digit one when the current minute has changed
					if(currentMin1 != min1 && minute1Digits) {
						_moveDigits(minute1Digits, _calculateTimeRange(min1-2, 0, 9));
						currentMin1 = min1;
					}
					//show next minute of digit two when the current minute has changed
					if(currentMin2 != min2 && minute2Digits) {
						_moveDigits(minute2Digits, _calculateTimeRange(min2-2, 0, 5));
						currentMin2 = min2;
					}
					//show next hour of digit one when the current hour has changed
					if(currentHour1 != hour1 && hour1Digits) {
						_moveDigits(hour1Digits, _calculateTimeRange(hour1-2, 0, 9));					
						currentHour1 = hour1;
					}
					//show next hour of digit two when the current hour has changed
					if(currentHour2 != hour2 && hour2Digits) {
						_moveDigits(hour2Digits, _calculateTimeRange(hour2-2, 0, 2));	
						currentHour2 = hour2;
					}
					//show next day of digit one when the current day has changed
					if(currentDay1 != day1 && day1Digits) {
						_moveDigits(day1Digits, _calculateTimeRange(day1-2, 0, 9));
						currentDay1 = day1;
					}
					//show next day of digit two when the current day has changed
					if(currentDay2 != day2 && day2Digits) {
						_moveDigits(day2Digits, _calculateTimeRange(day2-2, 0, 9));
						currentDay2 = day2;
					}
					//show next day of digit three when the current day has changed
					if(currentDay3 != day3 && day3Digits) {
						_moveDigits(day3Digits, _calculateTimeRange(day3-2, 0, 9));
						currentDay3 = day3;
					};
				}
				else {
					$.fancyCountdown.stop();
					$.fancyCountdown.reset();
					options.callback();
				}
			};
			
			//main movement for the digits
			function _moveDigits(digits, lastDigitValue) {			
				digits[0].animate({top: -($(digits[0]).height()-options.topDigitOffset)}, 300);
				digits[1].animate({'top': 0}, 300);
				digits[2].animate({'top': options.digitUnitHeight-options.bottomDigitOffset}, 300);
				digits[3].animate({'top': options.digitUnitHeight}, 300, function() {
					var lastDigit = digits.pop();
					$(lastDigit).css('top', -$(lastDigit).height()+"px");
					lastDigit.text(lastDigitValue);
					digits.unshift(lastDigit);				
				  }
				);
			};
			
			//calculate the range between two numbers
			function _calculateTimeRange(value, minValue, maxValue) {
				if(value < 0) return maxValue+value+1;
				else if(value > maxValue) return minValue+value-maxValue-1;
				else return value;
			};
			
			//create the digit unit with 4 digits and the overlay
			function _createDigitUnit(id) {
				
				$elem.prepend("<div style='width:"+options.digitUnitWidth+"px;height:"+options.digitUnitHeight+"px;background:"+options.fillColor+";' class='fc-digitUnit fc-"+id+"'><div class='fc-digits'><ul><li>8</li><li>9</li><li>0</li><li>1</li></ul></div><img src='"+options.overlayImageUrl+"' width="+options.digitUnitWidth+" height="+options.digitUnitHeight+" class='fc-digitOverlay' /></div>");
				
				var digits = $elem.children('div:first').find('.fc-digits li').css({'width': options.digitUnitWidth+"px", 'line-height': options.digitUnitHeight+"px"});
				var $digits = [];
				
				$digits[0] = $(digits[0]).css('top', -$(digits[0]).height()+"px");
				$digits[1] = $(digits[1]).css('top', -($(digits[0]).height()-options.topDigitOffset)+"px");
				$digits[2] = $(digits[2]).css('top', '0px');
				$digits[3] = $(digits[3]).css('top', options.digitUnitHeight-options.bottomDigitOffset+"px");
				
				return $digits;
			};
			
			//create a colon
			function _createColon() {
				$elem.prepend("<div style='width:"+options.colonUnitWidth+"px;height:"+options.digitUnitHeight+"px;background:"+options.fillColor+";' class='fc-digitUnit'><div style='width:"+options.colonUnitWidth+"px;line-height:"+options.digitUnitHeight+"px;' class='fc-colon'>:</div><img src='"+options.overlayImageUrl+"' width="+options.digitUnitWidth+" height="+options.digitUnitHeight+" class='fc-digitOverlay' /></div>");
			};
			
			//create a title
			function _createTitle(text, xPos) {			
				$elem.append("<div class='fc-captions'>"+text+"</div>");
				xPos = xPos - $elem.find('div:last').width() * 0.5;
				$elem.find('div:last').css({
					'left': xPos,
				    'top': options.digitUnitHeight
				});
			};
			
			//start the countdown
			$.fancyCountdown.start = function() {
				if(timerInterval) return;
				startTimeSet = false;
				timerInterval = setInterval(_timer, 100);
			};
			
			//stop the countdown
			$.fancyCountdown.stop = function() {
				if(!timerInterval) return;
				clearInterval(timerInterval);
				timerInterval = null;
			};
			
			//reset all digits
			$.fancyCountdown.reset = function() {
			  $elem.find('.fc-digits li').stop(true, true);			  		
			  for(var i=0; i < 4; ++i) {
				  if(second1Digits) { second1Digits[i].text((8+i)%10); }
				  if(second2Digits) { second2Digits[i].text((4+i)%6); }
				  if(minute1Digits) { minute1Digits[i].text((8+i)%10); }
				  if(minute2Digits) { minute2Digits[i].text((4+i)%6); }
				  if(hour1Digits) { hour1Digits[i].text((8+i)%10); }
				  if(hour2Digits) { hour2Digits[i].text((1+i)%3); }
				  if(day1Digits) { day1Digits[i].text((8+i)%10); }
				  if(day2Digits) { day2Digits[i].text((8+i)%10); }
				  if(day3Digits) { day3Digits[i].text((8+i)%10); }
				  
			  }			
			};
			
			//set the fill color of each unit
			$.fancyCountdown.fillColor = function(color) {
				$elem.children('.fc-digitUnit').css('background', color);
			};
			
			//set the target date
			$.fancyCountdown.targetDate = function(year, month, day, hour, minute, second) {
				hour = hour || 0;
				minute = minute || 0;
				second = second || 0;
				
				options.year = parseInt(year);
				options.month = parseInt(month), 
				options.day = parseInt(day);
				options.hour = parseInt(hour);
				options.minute = parseInt(minute);
				options.second = parseInt(second);
				startTimeSet = false;
			};
			
			//set the timezone
			$.fancyCountdown.timezone = function(value) {
	            options.timezone = parseFloat(value);
			};

		return this.each(function() {_init(this)});
	};
	
	$.fn.fancyCountdown.defaults = {
		year: 2012, //4 digits
		month: 12, //1-12
		day: 31, //1-31
		hour: 0, //0-23
		minute: 0, //0-59
		second: 0, //0-59
		digitUnitWidth: 60, //the width of a digit unit
		digitUnitHeight: 80, //the height of a digit unit
		colonUnitWidth: 20, //the width of a colon unit
		topDigitOffset: 25, //the offset of the top digit, which comes next after the current digit
		bottomDigitOffset: 27, //the offset of the bottom digit, which is after the current digit
		timezone: 0, //the timezone you would like to target
		dayDigitsAmount: 3, //the amount of digits for the day, a value between 1-3
		fillColor: '#005152', //the fill color the units
		autoStart: true, //enable/disbale auto-start
		captions: true, //enable/disable the captions
		digits: {days:true, hours:true, minutes:true, seconds:true}, //enable/disbale each time unit
		captionTitles: {days: "Days", hours: "Hours", minutes: "Minutes", seconds: "Seconds"},
		callback: function(){}, // a callback function that will be called, when the target date is reached
		digitSize: 57, //the size of the digits in px since V1.2
		overlayImageUrl: 'images/fancyCountdown/overlay.png' //the path to the overlay image since V1.2
	};
})(jQuery);