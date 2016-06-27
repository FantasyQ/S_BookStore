	$(function(){

		$('.mobile_menu').click(function(){
			$('.burger_menu').toggleClass('aaa');
		});
		$('.mobile_menu').click(function(){
			$('nav').toggleClass('test1');
		});

		$('.mobile_menu').click(function(){
			$('.home_slider').toggleClass('mobile_menu_move');
		});
		$('.mobile_menu').click(function(){
			$('.map').toggleClass('mobile_menu_move');
		});
		$('.mobile_menu').click(function(){
			$('.bookshelf').toggleClass('mobile_menu_move');
		});
		$('.mobile_menu').click(function(){
			$('.book_info').toggleClass('mobile_menu_move');
		});
		$('.mobile_menu').click(function(){
			$('.stationary_info').toggleClass('mobile_menu_move');
		});
		$('.mobile_menu').click(function(){
			$('.stationary_slider').toggleClass('mobile_menu_move');
		});
	})

	$(function(){
		$('.burger').click(function(){
			$('.cheese').toggleClass('bbb');
			$('.topC').toggleClass('ccc');
			$('.bottomC').toggleClass('ddd');
			$('.middleC').toggleClass('eee');

		});
	})

	$(function(){
		$('.search_btn').click(function(){
			event.preventDefault();
			$('.search_act input').toggleClass('inputopa');
			$('.search_act').toggleClass('search_actmove');
			$('.ll_img').toggleClass('ll_imgmove');
			$('.rr_img').toggleClass('rr_imgmove');
			
		});


		$('input').click(function(event){
	        event.stopPropagation();


		});
	})

	
	$(function(){

		$('.nav_member').click(function(){
			event.preventDefault();
			$('.lable_bg').addClass('clickmove2');
			
			});
			$('.xx').click(function(){

	        	$('.lable_bg').removeClass('clickmove2');

			});

			$('.lable_bg').click(function(event){
	        event.stopPropagation();

			});
			$('.search_btn').click(function(event){
	        event.stopPropagation();

			});
			$('.search_cart').click(function(event){
	        event.stopPropagation();

			});
	});

	$(function(){


		$('.please_login_a').click(function(){
			event.preventDefault();
			$('.lable_bg').addClass('clickmove2');

		});
		$('.xx').click(function(){

			$('.lable_bg').removeClass('clickmove2');

		});

		$('.lable_bg').click(function(event){
			event.stopPropagation();

		});
		$('.search_btn').click(function(event){
			event.stopPropagation();

		});
		$('.search_cart').click(function(event){
			event.stopPropagation();

		});
	});
