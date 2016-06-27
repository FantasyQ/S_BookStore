//首頁幻燈片
$(function(){

    var $block = $('.home_slider');
    var $ad = $block.find('.home_li');
    var showIndex = 0;      // 預設要先顯示那一張
    var fadeOutSpeed = 2000;     // 淡出的速度
    var fadeInSpeed = 1500;      // 淡入的速度
    var speed = 6000;       // 幾秒換一張
    var defaultZ = 5;       // 預設的 z-index

    // 先把其它圖片的變成透明
    $ad.css({opacity: 0,zIndex: defaultZ - 1}).eq(showIndex).css({opacity: 1,zIndex: defaultZ});


    $('.home_slider li').click(function(){
        isClick = false;
        clearTimeout(timer);
        // 啟動計時器
        timer = setTimeout(autoClick, speed);
    });

    // 自動點擊下一個
    function autoClick(){
        showIndex = (showIndex + 1) % $('.home_slider li').length;
        $ad.eq(showIndex).stop()
            .fadeTo(fadeInSpeed, 1)
            .css('zIndex', defaultZ)
            .siblings('.home_li')
            .stop().
            fadeTo(fadeOutSpeed, 0).
            css('zIndex', defaultZ - 1);
        $('.home_slider li').eq(showIndex).click();
    }

    // 啟動計時器
    timer = setTimeout(autoClick, speed);
});

// 最新消息 lightbox
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




