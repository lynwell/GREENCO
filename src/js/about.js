require.config({
    paths: {
        jquery: './lib/jquery-1.11.3.min',
        bootstrap:'./lib/bootstrap.min',
        validation: './lib/bootstrap3-validation',
        search:'./lib/search'
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
require(['jquery','bootstrap','validation','search'], function($) {
	$(function(){
		$(".pic-item").click(function(){
			var data = $(this).attr("data");
			$("#mypic").attr("src",data);
			$('#myModal').modal();
		});
	});
});
