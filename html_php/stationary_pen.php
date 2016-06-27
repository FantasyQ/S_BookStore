<?php
    $page_name = 'stationary_note';
    require("connection.php");

    $sql = "SELECT * FROM `products` WHERE `category_sid` = '4' ORDER BY `sid` ASC;";
    $rs = mysql_query($sql, $conn) or die(mysql_error());
?>



<?php
	include("__html_head.php");
?>


	<link rel="stylesheet" href="../css/book_style.css">
	<link rel="stylesheet" href="../css/stationary_style.css">
	<link rel="stylesheet" href="../css/book_style_mobile.css">

	<style>
		.tt_pen{
			border-bottom: 2px solid hsla(193, 19%, 45%, 1);
		}
	</style>

</head>
<body>


<?php
	include("nav_fixed.php");
?>


<!-- start of Pen -->
	<ul class="bookshelf">

	    <?php while ($row = mysql_fetch_assoc($rs)): ?>
			<img src="../img/forPages/menu_pen.svg" alt="" class="mobile_product">

			<li class="book">

				<a href="stationary_pen_info.php?sid=<?= $row['sid'] ?>">
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
							<h5><?= $row['brand'] ?></h5>
						</li>
					</ul>

					<p>NT$ <?= $row['price'] ?></p>

					<a class="moreinfo_link" href="stationary_pen_info.php?sid=<?= $row['sid'] ?>">
					</a>
					
					<a class="shopping_link" href="" data-p_sid="<?= $row['sid'] ?>">
						<img src="../img/forPages/cart.svg" alt="cart">
					</a>
				</div>
			</li>
		<?php endwhile ?>
	</ul>

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
	include('__html_foot.php');
?>