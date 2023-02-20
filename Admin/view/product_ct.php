<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>San pham chi tiet</title>
	<link rel="stylesheet" href="../css/style.css">
	<link rel="stylesheet" href="../css/button.css">

</head>

<body>
	<div class="body_mainct">
		<div class="main-content">
			<!-- Product Info -->
			<div class="row_product">
				<?php extract($item); ?>
				<div class="title_row">
					<span class="title_product">
						Thông tin sản phẩm
					</span>
				</div>
				<div class="product-info">
					<h3>
						<?= $ten_hanghoa ?>
					</h3>
				</div>
				<div class="product-img">
					<img src="<?= $hinh ?>" alt="">
				</div>
				<div class="product-price">
					<span>Price:
						<?= $don_gia ?> $
					</span>
				</div>
				<div>
					<form action="index.php?target=addtoCart" method="post">
						<input type="hidden" name="id" value="<?= $ma_hanghoa ?>">
						<input type="hidden" name="name" value="<?= $ten_hanghoa ?>">
						<input type="hidden" name="img" value="<?= $hinh ?>">
						<input type="hidden" name="price" value="<?= $don_gia ?>">
						<input type="submit" name="addCart" value="Add to Cart" class="btn">
					</form>
				</div>
				<div class="product-desc">
					<p class="">
						<?= $mo_ta ?>
					</p>
				</div>
			</div>
			<!-- Comments -->
			<div class="row_product">

				<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
				<script>
					$(document).ready(function () {
						$("#binhluan").load("./binhluan/form_comment.php", { idpro:<?= $ma_hanghoa ?>} )
					});
				</script>
				<div>
					<span id="binhluan"></span>
				</div>
			</div>
			<!-- Other Products -->
			<div class="row_product">
				<div class="title_row">SẢN PHẨM CÙNG LOẠI</div>
				<div class="cate-menu">
					<?php
					foreach ($getItem as $products) { 
						extract($products); 
						$link_products = "index.php?target=product_ct&id=" . $ma_hanghoa;
					?>
					<ul class="list-product__same">
						<li><a href="<?= $link_products ?>"><?= $ten_hanghoa ?></a></li>
					</ul>						
				<?php	}  ?>
				</div>
			</div>
		</div>


		<div class="sidebar">
			<?php include './view/box_right.php'; ?>
		</div>
	</div>
</body>

</html>