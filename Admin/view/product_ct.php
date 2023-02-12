<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Document</title>
	<link rel="stylesheet" href="css/body.css">

</head>

<body>
	<div class="body_main">
		<div class="left">
			<div class="row_product">
				<?php extract($item); ?>
				<div class="title_row">
					<span class="title_product">
						<?= $ten_hanghoa ?>
					</span>
				</div>
				<div>
					<img class="img_row" src="<?= $hinh ?>" alt="">
				</div>
				<span class="desc_row">
					<?= $mo_ta ?>
				</span>
			</div>

			<div class="row_product">
				<div class="title_row">BÌNH LUẬN</div>
				<div class="main_row">

				</div>
			</div>

			<div class="row_product">
				<div class="title_row">SẢN PHẨM CÙNG LOẠI</div>
				<div>
					<?php
					foreach ($items as $products) {
						extract($products);
						$link_product = "index.php?target=product&id=" . $ma_hanghoa;
						echo '<li><a href="' . $link_product . '">' . $ten_hanghoa . '</li>';
					}
					?>
				</div>
			</div>
		</div>

		<div class="right">
			<div class="box">
				<h3>TÀI KHOẢN</h3>

			</div>
			<div class="box">
				<h3>DANH MỤC</h3>

			</div>
			<div class="box">
				<h3>TOP 10 YÊU THÍCH</h3>
			</div>
		</div>

	</div>
</body>

</html>