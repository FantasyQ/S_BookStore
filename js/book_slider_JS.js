$(function(){
		var li_index = 0;
		var li_count = $('.book_slider li').length;
		var li_width = $('.book_li').width();
		var picSrc = '';
		var speed = 3000;
		var movespeed = 1000;
		var aa = setInterval( playplay,speed);


		$('.book_slider').width( li_count*li_width );


		$('.next').click(

      	function(){

	        if( li_index==4 ){
	        li_index = 0;
	        }else{
	          li_index++;
	        }

        event.preventDefault();

        $('.pic').stop(true,false).animate({left: li_index*li_width*-1});

        clearInterval(aa);
        aa = setInterval( playplay , speed );
     	 });



    	$('.prev').click(
      	function(){

	        if( li_index==0 ){
	        li_index = 4;
	        }else{
	          li_index--;
	        }

        event.preventDefault();

        $('.pic').stop(true,false).animate({left: li_index*li_width*-1});

        clearInterval(aa);
        aa = setInterval( playplay , speed );
    	});


		function playplay(){


			if(li_index < li_count-1){
				li_index++;
			}else{
				li_index = 0;
			}

			$('.book_slider').stop(true,false).animate({left: li_index*li_width*-1},movespeed);
		}

	});