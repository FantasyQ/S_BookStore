<?php
    $page_name = 'book_literature';
    require("connection.php");

    $sql = "SELECT * FROM `products` WHERE `category_sid` = '1' ORDER BY `sid` ASC;";
    $rs = mysql_query($sql, $conn) or die(mysql_error());
?>


<?php
    include("__html_head.php");
?>


    <link rel="stylesheet" href="../css/book_style.css">
    <link rel="stylesheet" href="../css/book_style_ipad.css">
    <link rel="stylesheet" href="../css/book_style_mobile.css">

    <style>
        .tt_litbook{
            border-bottom: 2px solid hsla(193, 19%, 45%, 1);
        }
    </style>

</head>
<body>


<?php
    include("nav_fixed.php");
?>


<!-- start of Literature Book -->
<div id="book_text_all">

    <div id="box1">
        <a href="#box2" class="arrowdown"><img src="../img/forPages/downdown.svg"></a>
        <ul class="book_slider">

            <a href="#" class="arrow_left">
                <div class="boxxx"></div>
            </a>

            <a href="#" class="arrow_right">
                <div class="boxxx"></div>
            </a>


            <li class="book_li book_s01">

                <div class="book_pic pic01"><img src="../img/slider/1-01.png"></div>

                <div class="text_smallcontent1">

                    <div class="book_text text01">
                        <div class="text_words01"><img src="../img/slider/1-05.png"><a href="book_literature_info.php?sid=26" class="text_btn1"><img
                                src="../img/slider/1-09.png"></a></div>

                    </div>


                </div>
            </li>

            <li class="book_li book_s02">
                <div class="book_pic pic02"><img src="../img/slider/1-02.png"></div>

                <div class="text_smallcontent1">

                    <div class="book_text text02">
                        <div class="text_words02"><img src="../img/slider/1-06.png"><a href="book_literature_info.php?sid=30" class="text_btn1"><img
                                src="../img/slider/1-09.png"></a></div>

                    </div>

                </div>
            </li>

            <li class="book_li book_s03">
                <div class="book_pic pic03"><img src="../img/slider/1-03.png"></div>

                <div class="text_smallcontent1">

                    <div class="book_text text03">
                        <div class="text_words03"><img src="../img/slider/1-07.png"><a href="book_literature_info.php?sid=31" class="text_btn1"><img
                                src="../img/slider/1-09.png"></a></div>

                    </div>

                </div>
            </li>

            <li class="book_li book_s04">
                <div class="book_pic pic04"><img src="../img/slider/1-04.png"></div>

                <div class="text_smallcontent1">

                    <div class="book_text text04">
                        <div class="text_words04"><img src="../img/slider/1-08.png"><a href="book_literature_info.php?sid=46" class="text_btn1"><img
                                src="../img/slider/1-09.png"></a></div>

                    </div>

                </div>
            </li>
        </ul>
    </div>

    <script src="../js/bookfadeinout_js.js"></script>

    <div id="box2">

        <ul class="bookshelf">

            <?php while ($row = mysql_fetch_assoc($rs)): ?>
                <img src="../img/forPages/menu_lit.svg" alt="" class="mobile_product">
                <li class="book">

                    <a href="book_literature_info.php?sid=<?= $row['sid'] ?>">
                        <img src="../img/book1/<?= $row['book_id'].'-1' ?>.png" alt="cover">
                    </a>

                    <div class="h_info">
                        <ul class="h_text">
                            <li class="h_title">
                                <img src="../img/forPages/%5B.svg" class="tt_left" alt="">
                                <h3 class="this_is_h3"><?= $row['bookname'] ?></h3>
                                <img src="../img/forPages/%5D.svg" class="tt_right" alt="">
                            </li>
                            <li>
                                <h5><?= $row['author'] ?></h5>
                            </li>
                        </ul>

                        <p>NT$ <?= $row['price'] ?></p>

                        <a class="moreinfo_link" href="book_literature_info.php?sid=<?= $row['sid'] ?>"></a>

                        <a class="shopping_link" href="" data-p_sid="<?= $row['sid'] ?>">
                            <img src="../img/forPages/cart.svg" alt="cart">
                        </a>
                    </div>
                </li>
            <?php endwhile ?>

        </ul>
    </div>
</div>

<script>
    $('.shopping_link').click(function(){
        event.preventDefault();
        var mycart = $(this);

        var p_sid = mycart.data('p_sid');
        var qty = 1;

        $.get('add_to_cart.php', {p_sid:p_sid, qty:qty}, function(){
            alert("[ " + mycart.closest('.h_info').find('h3').text() + " ]" + " 已加入購物車");
        });

        console.log(mycart.closest('.h_info').find('h3').text());

    });
</script>




<?php
    include("__html_foot.php");
?>
