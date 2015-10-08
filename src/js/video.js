require.config({
    paths: {
        jquery: './lib/jquery-1.11.3.min',
        bootstrap:'./lib/bootstrap.min',
        validation: './lib/bootstrap3-validation',
        search:'./lib/search',
        jwplayer:'./video/jwplayer'
    },
    shim: {
    	bootstrap: {
            deps: ['jquery'],
        },
    	validation:{
    		deps: ["jquery","bootstrap"],
    	},
    	search: {
	    	deps: ["jquery","validation"],
    		}
    }
});
require(['jquery','bootstrap','validation','search','jwplayer'], function($) {
	$(function(){
		var root = $("#videoConfig").attr("root");
		root += "/js/video"
		jwplayer("player").setup({
			  skin: root+"/glow.zip",//皮肤地址
			  flashplayer: root+"/player.swf",
			  image: root+"/bg.jpg",//开始的图片
			  width: 600,//宽度
			  height:400,//高度
			  levels: [{file: root+"/greenco.flv"}]//视频路径
			})
	});
});
