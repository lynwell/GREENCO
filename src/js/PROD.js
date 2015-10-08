(function(){
	$(function() {
		$(".pro-item").quickpaginate({
			perpage : 15,//每页显示条数,
			pager : $("#page_text")
		})
	});
})()