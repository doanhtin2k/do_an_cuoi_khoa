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
	$(".add-to-cart").click(function(){
		var product_id = $(this).attr("data-id");
		var obj_ajax = {
			url: 'index.php?controller=cart&action=add',
			method: 'GET',
			data: {
				product_id:product_id
			},
			success: function(data){
                //console.log(data);
                $('.alert-secondary-content').html('Thêm sản phẩm vào giỏ hàng thành công');
                $('.alert-secondary').addClass('alert-secondary-show');
                setTimeout(function(){
                    $('.alert-secondary').removeClass('alert-secondary-show');
                },1000);
			}
		};

        $.ajax(obj_ajax);
	});
});