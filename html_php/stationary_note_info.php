<?php
    $page_name = 'stationary_note_info';
    require("connection.php");

    $sid = isset($_GET['sid']) ? intval($_GET['sid']) : 0;

    $sql = "SELECT * FROM `products` WHERE `sid` = $sid";
    $rs = mysql_query($sql, $conn) or die(mysql_error());

    if(mysql_num_rows($rs)==0){
        header("Location: stationary_note.php");
        exit;
    }

    $row = mysql_fetch_assoc($rs);
?>


<?php
	include('__html_head.php');
?>



	<link rel="stylesheet" href="../css/stationary_info_style.css">
	<link rel="stylesheet" href="../css/stationary_info_style_mobile.css">

	<style>
		.tt_note{
			border-bottom: 2px solid hsla(193, 19%, 45%, 1);
		}
	</style>

</head>
<body>



<?php
	include('nav_fixed.php');
?>


<!-- start of Note info -->
	<div class="stationary_info">
		<div class="stationary_slider">
			<div class="book_content_all">
				<div class="picall">
					<div class="big_pic">
							<img src="../img/book1/<?= $row['book_id'].'-1' ?>.png" alt="">
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

		<div class="stationary_text">
			<ul class="stationary_detail">
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
				<li class="sta_mobile_slider">
					<img src="img/book1/<?= $row['book_id'].'-1' ?>.png" alt="">
				</li>
				<li class="detail_border">
					<p>
						<?= $row['introduction'] ?>
					</p>
				</li>
				<li>
					<table class="sta_detail">
						<tr>
							<td class="table_title">品牌</td>
							<td><?= $row['brand'] ?></td>
						</tr>

						<tr>
							<td class="table_title">尺寸</td>
							<td><?= $row['length'] ?></td>
						</tr>

						<tr>
							<td class="table_title">頁數</td>
							<td><?= $row['pages'] ?></td>
						</tr>

						<tr>
							<td class="table_title">備註</td>
							<td>
								<?= $row['note'] ?>
							</td>
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
			</ul>
		</div>
	</div>


<script src="../js/book_info_JS.js"></script>

<script>
	$('.add_to_btn').click(function(){
		var mycart = $(this);

		var p_sid = mycart.data('p_sid');
		var qty = $('.qty').val();

		$.get('add_to_cart.php', {p_sid:p_sid, qty:qty}, function(){
			alert("[ <?= $row['bookname'] ?> ] " + " 已加入購物車");

		});

	});
</script>


<?php
include('__html_foot.php')
?>
