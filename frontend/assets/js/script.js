$(document).ready(function(){
	
	$(".menu-mb").click(function(){
		var is_check = $(".menu-mb-content").hasClass('show-menu-mb-content');
		if(is_check==true)
		{
			$(".menu-mb-content").removeClass('show-menu-mb-content');
		}else{
			$(".menu-mb-content").addClass('show-menu-mb-content');
		}
	});
	
});