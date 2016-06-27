<?php
$page_name = 'shoppingTable';
require("connection.php");

$cart_data = array();

if(! empty($_SESSION['cart'])){
	$cart_order = array_keys( $_SESSION['cart'] );

	$sql = sprintf("SELECT * FROM `products` WHERE `sid` IN (%s)", implode(',', $cart_order));
	$rs = mysql_query($sql, $conn) or die(mysql_error());

	while($row = mysql_fetch_assoc($rs)){
		$cart_data[ $row['sid'] ] = $row;
	}

	foreach( $_SESSION['cart'] as $k => $v) {
		$cart_data[ $k ]['qty'] = $v;
	}
//	$K就是拿到sid，$v就是拿到數量。

}
?>

<?php
include("__html_head.php")
?>

<link rel="stylesheet" href="../css/shoppingTable_style.css">

</head>
<body>

<?php
	include("nav_fixed.php");
?>

<!-- start of shoppingTable -->

<div class="shop_wrapwrap">
	<div class="shop_wrap">

		<?php if(empty($_SESSION['cart'])): ?>
		<div class="cart_empty_warning">
			<h3>購物車是空的</h3>
		</div>

		<?php else: ?>
		<h3>購物車明細</h3>

		<table class="shop_table">
			<tr>
				<td style="min-width: 40px">序號</td>
				<td>圖片</td>
				<td>品名</td>
				<td>售價</td>
				<td>數量</td>
				<td style="min-width: 100px">總計</td>
				<td>移除</td>
			</tr>

			<?php
				$o = 0;
				foreach( $cart_order as $sid ):
					$row = $cart_data[$sid];
					$o ++;
				?>
			<tr data-sid="<?= $sid ?>" class="product_list">
				<td style="min-width: 40px">
					<?= $o ?>
				</td>

				<td>
					<img src="../img/book1/<?= $row['book_id'].'-1' ?>.png">
				</td>

				<td>
					<?= $row['bookname'] ?>
				</td>

				<td>
					<span>NT$ </span>
					<span class="my_price"><?= $row['price'] ?></span>
				</td>

				<td>
					<select class="qty" data-oval="<?= $row['qty'] ?>">
						<?php for($q=1 ; $q<=20 ; $q++): ?>
							<option value="<?= $q ?>"><?= $q ?></option>
						<?php endfor ?>
					</select>
				</td>

				<td>
					<span>NT$ </span>

					<span class="auto_count" style="min-width: 100px">
						<?php
							echo $row['price'] * $row['qty'];
						?>
					</span>
				</td>

				<td>
					<div class="sxx cancel_btn">
						<div class="rxx"></div>
						<div class="lxx"></div>
					</div>
				</td>
			</tr>
			<?php endforeach ?>
		</table>

		<div class="qq">
			<?php if(!isset($_SESSION['user'])): ?>
<!--			<div class="please_login">-->
<!--				<a class="please_login_a" href="#">[&nbsp;&nbsp;結帳前，請先登入會員&nbsp;&nbsp;]</a>-->
<!--			</div>-->

			<div class="check_out_div">
				<span class="amount_text">總計&nbsp;&nbsp;</span>
				<span id="total_amount" class="total_text"></span>

				<div class="payitnow please_login_a">
					<a href="#">
						<span>請先登入會員</span>
					</a>
				</div>
			</div>
			<?php else: ?>


			<div class="check_out_div">
				<span class="amount_text">總計&nbsp;&nbsp;</span>
				<span id="total_amount" class="total_text"></span>

				<div class="payitnow">
					<a>
						<span>結帳</span>
					</a>
				</div>
			</div>
			<?php endif ?>


		</div>

		<?php endif ?>
	</div>
</div>

<script>

//設定數量
	$('.qty').each(function(){
		var oval = $(this).data('oval');
		$(this).val(oval);
	});


//計算總金額
	function cal_total(){
		var total = 0;
		var numtotal = 0;

		$('.my_price').each(function() {
			var price = parseInt( $(this).text() );
			var qty = parseInt( $(this).parent().closest('.product_list').find('.qty').val() );

			total += price * qty;

	//把數字加上千分位逗號
			numtotal = total.toString();

			var pattern = /(-?\d+)(\d{3})/;

			while(pattern.test(numtotal)) {
				numtotal = numtotal.replace(pattern, "$1,$2");
			}
	//把數字加上千分位逗號END
		});

		$('#total_amount').text( "NT$" + " " + numtotal );

	}

	cal_total();



	$('.qty').change(function(){
		var mm_this = $(this);
		var p_sid = $(this).closest('.product_list').data('sid');
		var qty = $(this).val();

		$.get('add_to_cart.php', {p_sid:p_sid, qty:qty}, function(data){
			var price = parseInt( mm_this.parent().closest('.product_list').find('.my_price').text() );

			var price_qty = qty*price;


			mm_this.parent().closest('.product_list').find('.auto_count').text( price_qty );
			cal_total();
		});
	});


//按鈕 - 刪除商品
	$('.cancel_btn').click(function(){
		var mm_this = $(this);
		var sid = mm_this.closest('.product_list').data('sid');

		$.get('add_to_cart.php', {p_sid:sid}, function(data){
			mm_this.closest('.product_list').remove();
			cal_total();
		});
	});

</script>




<?php
include("__html_foot.php")
?>

