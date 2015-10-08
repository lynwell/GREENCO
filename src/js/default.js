require.config({
    paths: {
        jquery: './lib/jquery-1.11.3.min',
        bootstrap:'http://cdn.bootcss.com/bootstrap/3.3.4/js/bootstrap.min',
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
	
});
