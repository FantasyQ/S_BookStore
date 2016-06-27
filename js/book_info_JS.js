$(function(){

		var picSrc = '';
		var nowPic = 0;

		$('.small_pic img').click(function(){
			picSrc = $(this).attr('src');
			nowPic = $(this).parent().index();
			// console.log('nowPic=' + nowPic);

			$('.small_pic .active').removeClass();
			$(this).addClass('active');

			$('.big_pic img').attr('src', picSrc);
		})


		// 下一張

		$('.next').click(function(){
			$('.small_pic .active').removeClass();

			// nowPic = nowPic + 1;
			if(nowPic == 4){
				nowPic = 0;
			}else{
				nowPic++;
			}

			console.log('nowPic=' + nowPic);
			$('.small_pic img').eq(nowPic).addClass('active');

			picSrc = $('.small_pic img').eq(nowPic).attr('src');
			$('.big_pic img').attr('src', picSrc);
		})


		// 上一張
		$('.prev').click(function(){
			$('.small_pic .active').removeClass();

			nowPic--;
			console.log('nowPic=' + nowPic);
			$('.small_pic img').eq(nowPic).addClass('active');

			picSrc = $('.small_pic img').eq(nowPic).attr('src');
			$('.big_pic img').attr('src', picSrc);
		})
	})