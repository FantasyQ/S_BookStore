	$(function(){
		
	var $block = $('.book_slider'), 
		$ad = $block.find('.book_li'),
		showIndex = 0,			// 預設要先顯示那一張
		fadeOutSpeed = 500,	// 淡出的速度
		fadeInSpeed = 500,		// 淡入的速度
		speed = 10000,
		defaultZ = 5;			// 預設的 z-index
 
	// 先把其它圖片的變成透明
	$ad.css({opacity: 0,zIndex: defaultZ - 1}).eq(showIndex).css({opacity: 1,zIndex: defaultZ});
 
	// 當按鈕被點選時
	// $('.arrow_left').click(function(){
	// 	// event.preventDefault();
	// 	// 取得目前點擊的號碼
	// 	showIndex = $(this).text() * 1 - 1;
 
	// 	// 顯示相對應的區域並把其它區域變成透明
	// 	$ad.eq(showIndex).stop().fadeTo(fadeInSpeed, 1).css('zIndex', defaultZ).siblings('.book_li').stop().fadeTo(fadeOutSpeed, 0).css('zIndex', defaultZ - 1);
	// 	// 讓 a 加上 .on

	// 	return false;

	// }).focus(function(){
	// 	$(this).blur();
	// });


      //   clearInterval(aa);
      //   aa = setInterval( autoClick , speed );
      // })

	$('.arrow_left').click(function(){
		showIndex = (showIndex + $('.book_slider li').length - 2) % $('.book_slider li').length;
		autoClick();
	});

	$('.arrow_right').click(function(){
		autoClick();
		// event.preventDefault();
		// // 取得目前點擊的號碼
		// showIndex = $(this).text() * 1 - 1;
 
		// // 顯示相對應的區域並把其它區域變成透明
		// $ad.eq(showIndex).stop().fadeTo(fadeInSpeed, 1).css('zIndex', defaultZ).siblings('.book_li').stop().fadeTo(fadeOutSpeed, 0).css('zIndex', defaultZ - 1);
		// // 讓 a 加上 .on

		// return false;

	})
	// .focus(function(){
	// 	$(this).blur();
	// });

	//  	clearInterval(aa);
 //        aa = setInterval( autoClick , speed );
 //      })

// });





	$('.book_slider li').click(function(){
		isClick = false;
		clearTimeout(timer);
		// 啟動計時器
		timer = setTimeout(autoClick, speed);
	})
 
	// 自動點擊下一個
	function autoClick(){
		// if(isHover) return;
		showIndex = (showIndex + 1) % $('.book_slider li').length;
		$ad.eq(showIndex).stop()
		.fadeTo(fadeInSpeed, 1)
		.css('zIndex', defaultZ)
		.siblings('.book_li')
		.stop().
		fadeTo(fadeOutSpeed, 0).
		css('zIndex', defaultZ - 1);
		$('.book_slider li').eq(showIndex).click();
	}
 
	// 啟動計時器
	timer = setTimeout(autoClick, speed);

	// 下拉動畫
	$('a[href^="#').on('click',function(event){

		var target = $($(this).attr('href'));

		if(target.length){
			event.preventDefault();
			$('html,body').stop(true,false).animate( {scrollTop:target.offset().top}, 400 );
		}
	});
});




