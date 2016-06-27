$(function(){
		var li_index = 0;
		var li_count = $('.home_slider li').length;
		var li_width = $('.home_li').width();
		var picSrc = '';
		var speed = 7000;
		var movespeed = 500;
		var aa = setInterval( playplay,speed);


		$('.home_slider').width( li_count*li_width );


		function playplay(){


			if(li_index < li_count-1){
				li_index++;
			}else{
				li_index = 0;
			}

			$('.home_slider').stop(true,false).animate({left: li_index*li_width*-1},movespeed);
		}

	});


$(function(){
	$('.sale, .lightbox').click(
		function(){
			$('.lightbox,.lb-content').fadeToggle();
			$('.sale1').addClass('saleactive1');
			$('.sale2').addClass('saleactive2');
			$('.sale3').addClass('saleactive3');
			$('.sale4').addClass('saleactive4');
		}
	)
});