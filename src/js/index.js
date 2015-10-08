require.config({
    paths: {
        jquery: "./lib/jquery-1.11.3.min",
        bootstrap:"./lib/bootstrap.min",
        slides:"./lib/jquery.slides.min", 
    },
    shim: {
    	bootstrap:{
    		deps: ["jquery"],
    	},
    	slides:{
    		deps: ["jquery"],
    	},
    	
    }
});
require(['jquery','bootstrap','slides'], function($) {
	$(function() {
	        $('#slides').slidesjs({
	          width: 1000,
	          height: 300,
	          play: {
	            auto: true,
	            interval: 4000,
	            swap: false
	          }
	        });
	});
	
	$(function(){
		var  slider = {};
		slider.sync = true;
		var fun = function(callback,choose){
			var sliders = $("#sildeContainer .slider-item");
			var k = 0,len = sliders.length;
			var f = !!choose ? 1 : -1;
			if(slider.sync != true){
				return false;
			}
			slider.sync = false;
			for(var i = 0;i<len; i++){
				var left = parseInt($(sliders[i]).css('left'));
				$(sliders[i]).animate({left:(left-344*f)+"px"},"slow",function(){
					if(parseInt(this.style.left) < 0){
						this.style.left = ((len-1*f)*312+(len-1*f)*32)+"px";
						slider.sync = true;
					}
					if(parseInt(this.style.left)> (len-1)*344){
						this.style.left = 0 +"px";
						//$(this).animate({left:0+"px"},"slow")
						slider.sync = true;
					}
				});
			}
		}
		slider.timer = null;
		slider.createTimer = function(){
			slider.timer = setInterval(function(){
				fun(null,true);
			},2500);
		};
		slider.clearTimer = function(){
			clearInterval(slider.timer);
		};
		slider.next = function(){
			fun(null,true);
		};
		slider.prev = function(){
			fun(null,false);
		};
		slider.pause = function(){
			slider.clearTimer();
		};
		slider.start = function(){
			slider.createTimer();
		};
		$("#next").click(function(){
			slider.next();
		})
		$("#prev").click(function(){
			slider.prev();
		})
		//$("#sliderWrap").hover(slider.pause,slider.start);
		//slider.start();
	});	
});
