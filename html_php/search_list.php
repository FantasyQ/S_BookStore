<?php
$page_name = 'search_list';
require("connection.php");

$where = '';
$search = isset($_SESSION['search']) ? $_SESSION['search'] : '';
if (!empty($search)) {
    $search = '%' . $search . '%';
    $search = GetSQLValueString($search, 'text');
    $where = " WHERE `bookname` LIKE $search OR `author` LIKE $search ";
}

$sql = "SELECT * FROM `products` $where ORDER BY `sid` ASC;";
$rs = mysql_query($sql, $conn) or die(mysql_error());
?>


<?php
    include("__html_head.php");
?>


<link rel="stylesheet" href="../css/book_style.css">
<link rel="stylesheet" href="../css/book_style_ipad.css">
<link rel="stylesheet" href="../css/book_style_mobile.css">
<link rel="stylesheet" href="../css/search_list.css">

</head>
<body>


<?php
    include("nav_fixed.php");
?>


<!-- start of Literature Book -->
<div id="book_text_all">

    <div class="search_result">
        <h3>[ &nbsp;<?= $_SESSION['search'] ?>&nbsp; ]&nbsp;&nbsp;的搜尋結果</h3>
    </div>

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
                                <h5>
                                    <?= $row['author'] ?>
                                </h5>
                            </li>
                        </ul>

                        <p>
                            NT$<?= $row['price'] ?>
                        </p>

                        <a class="moreinfo_link" href="book_literature_info.php?sid=<?= $row['sid'] ?>">
                        </a>

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
    $('#cancel_search').click(function () {
        location.href = 'save_search.php';
    });

    $('.shopping_link').click(function(){
        var me = $(this);

        var p_sid = me.data('p_sid');
        var qty = 1;

        $.get('add_to_cart.php', {p_sid: p_sid, qty: qty}, function () {
            alert("[ " + me.closest('.h_info').find('h3').text() + " ]" + " 已加入購物車");
        });

    });
</script>

<script src="../js/bookfadeinout_js.js"></script>

<?php
include("__html_foot.php");
?>
