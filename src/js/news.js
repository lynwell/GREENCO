require.config({
    paths: {
        jquery: './lib/jquery-1.11.3.min',
        bootstrap:'http://cdn.bootcss.com/bootstrap/3.3.4/js/bootstrap.min',
        quickpaginate: './lib/jquery.quickpaginate',
    },
	shim: {
		bootstrap: {
	        deps: ['jquery'],
	    },
	    quickpaginate:{
			deps: ["jquery"],
		}
	}
});
require(['jquery','bootstrap','quickpaginate',], function($) {
	$(function(){
		$(".mypagination").quickpaginate({
			perpage: 6,//每页显示条数,
			pager : $("#page_text") //div的ID
		})
	})
});
