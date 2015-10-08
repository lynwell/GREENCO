require.config({
    paths: {
        jquery: './lib/jquery-1.11.3.min',
        bootstrap:'./lib/bootstrap.min',
        validation: './lib/bootstrap3-validation',
        bootbox: './lib/bootbox.min',
    },
    shim: {
    	bootstrap: {
            deps: ['jquery'],
        },
    	validation:{
    		deps: ["jquery","bootstrap"],
    	},
    	bootbox: {
	    	deps: ["jquery","bootstrap"],
    		}
    }
});
require(['jquery','bootstrap','validation','bootbox'], function($) {
	$(function(){
		var count = $('.phone').length;
		var i = Math.floor(Math.random()*count);
		$('.phone').eq(i).removeClass('hide');
		
		$('#code').click(function(){
			$(this).attr("src","Code?r="+Math.random());
		});
		
	    $("#codeMsg a.btn").on("click", function(e) {
	    	$("#codeMsg").modal('hide');
	    });
	    $("#emailMsg a.btn").on("click", function(e) {
	    	$("#emailMsg").modal('hide');
	    });	    
	    
		$("#contactForm").validation();
		$("button[type='submit']").on('click',function(event){
			event.preventDefault();
			if ($("#contactForm").valid(this,"error!")==false){
				return false;
			}else{
					var code = $("#codeValue").val();
					var data = $("#contactForm").serialize();
					$.get("sendEmail?"+data, function(result){
						if(result == 1){
							$("#emailMsg").modal("show"); 
						}else{
							$("#codeMsg").modal("show"); 
							$('#code').click();
							$('#codeValue').val("");
						}
					});
			}
		});
	});
});
