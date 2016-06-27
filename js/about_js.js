
  $(function(){

  	$('.svg1111').fadeOut();

    $(window).scroll(

      function(){
        if($(this).scrollTop()>300){
          $('.svg1111').fadeIn();
        }else{};
        
       }); 
  });