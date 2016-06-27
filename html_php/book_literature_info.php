<?php
	$page_name = 'book_literature_info';
	require("connection.php");

	$sid = isset($_GET['sid']) ? intval($_GET['sid']) : 0;

	$sql = "SELECT * FROM `products` WHERE `sid` = $sid";
	$rs = mysql_query($sql, $conn) or die(mysql_error());

	if(mysql_num_rows($rs)==0){
		header("Location: book_literature.php");
		exit;
	}

	$row = mysql_fetch_assoc($rs);
?>



<?php
	include('__html_head.php');
?>

	<link rel="stylesheet" href="../css/book_info_style.css">

	<style>
		.tt_litbook{
			border-bottom: 2px solid hsla(193, 19%, 45%, 1);
		}
	</style>

</head>
<body>


<?php
	include('nav_fixed.php');
?>



<!-- start of Literature Book info -->
	<div class="book_info">
		<div class="book_slider">
			<div class="book_content_all">
				<div class="picall">
					<div class="big_picall">
						<div class="big_pic">
							<img src="../img/book1/<?= $row['book_id'].'-1' ?>.png" alt="">
						</div>
					</div>

					<ul class="small_pic">
						<?php
						$book_id = $row['book_id'];
						for( $i=1 ; $i<6 ; $i++ ) {
							echo '<li class="fake"><img src="../img/book1/'.$book_id.'-'.$i.'.png" alt=""></li>';
						}
						?>
					</ul>
				</div>
			</div>
		</div>

		<div class="book_text">
			<ul class="book_detail">
				<li>
					<h3>
						<?= $row['bookname'] ?>
					</h3>
				</li>
				<li>
					<h3>
						NT$ <?= $row['price'] ?>
					</h3>
				</li>

				<li class="detail_border">
					<table class="sta_detail">
						<tr>
							<td class="table_title">作者</td>
							<td><?= $row['author'] ?></td>
						</tr>

						<tr>
							<td class="table_title">譯者</td>
							<td><?= $row['translator'] ?></td>
						</tr>

						<tr>
							<td class="table_title">出版社</td>
							<td><?= $row['publisher'] ?></td>
						</tr>

						<tr>
							<td class="table_title">出版日期</td>
							<td><?= $row['publish_date'] ?></td>
						</tr>

						<tr>
							<td class="table_title">語言</td>
							<td><?= $row['language'] ?></td>
						</tr>

						<tr>
							<td class="table_title">數量</td>
							<td>

								<select name="" id="" class="qty">
									<?php for($q=1 ; $q<=20 ; $q++): ?>
									<option value="<?= $q ?>"><?= $q ?></option>
									<?php endfor ?>
								</select>

							</td>
						</tr>
					</table>

					<a data-p_sid="<?= $sid ?>" href="" class="add_to_btn" role="button">
						<p>加入購物車</p>
					</a>

				</li>

				<li>
					<p>
						<?= $row['introduction'] ?>
					</p>
				</li>
			</ul>
		</div>
	</div>

<script src="../js/book_info_JS.js"></script>

<script>
	$('.add_to_btn').click(function(){
		event.preventDefault();
		var mycart = $(this);

		var p_sid = mycart.data('p_sid');
		var qty = $('.qty').val();

		$.get('add_to_cart.php', {p_sid:p_sid, qty:qty}, function(){
			alert("[ <?= $row['bookname'] ?> ] " + " 已加入購物車");

		});

	});
</script>


<?php
	include('__html_foot.php');
?>
