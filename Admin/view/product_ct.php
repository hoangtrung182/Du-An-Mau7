<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Document</title>
	<link rel="stylesheet" href="css/style.css">

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

			<div class="row_product">
				<div class="title_row">SẢN PHẨM CÙNG LOẠI</div>
				<div>
					<?php
					foreach ($items as $products) {
						extract($products);

						$link_products = "index.php?target=product_ct&id=" . $ma_hanghoa;
						echo '<li><a href="' . $link_products . '">' . $ten_hanghoa . '</a></li>';

					}
					?>
				</div>
			</div>
		</div>

		<div class="right">
			<div class="box">
				<h3>TÀI KHOẢN</h3>
				<form action="" method="post">
					<p>Tên đăng nhập</p>
					<input type="text" name="name">
					<p>Mật khẩu</p>
					<input type="password" name="password" id=""> <br>
					<input type="checkbox" name="checkbox" id="">Ghi nhớ tài khoản<br>
					<input type="submit" value="Đăng nhập">
				</form>
				<ul>
					<li>Quên mật khẩu</li>
					<li><a href="index.php?target=dangky">Đăng ký thành viên</a></li>
				</ul>
			</div>
			<div class="box">
				<h3>DANH MỤC</h3>
				<div>
					<?php
					foreach ($load_nameitem as $sp) {
						extract($sp);
						$link_product = "index.php?target=product&id=" . $ma_loai;
						echo '<li><a href="' . $link_product . '">' . $ten_loai . '</a></li>';
					}
					?>
				</div>
				<br>
				<div>
					<form action="index.php?target=product" method="post">
						<input type="text" name="keyw" id="">
						<input type="submit" value="Tìm kiếm" name="search">

					</form>
				</div>
			</div>
			<div class="box">
				<h3>TOP 10 YÊU THÍCH</h3>
				<div>
					<?php

					foreach ($list_top10 as $hanghoa) {
						extract($hanghoa); ?>
						<div class="box1">

							<div class="">
								<a href="./index.php?target=product_ct&id=<?= $ma_hanghoa ?> ">
									<img class="img_top" src="<?= $hinh ?>" alt="">
								</a>
							</div>
							<div class="main-info">


								<h3 class="main-title">
									<a href="./index.php?target=product_ct&id=<?= $ma_hanghoa ?> ">
										<?= $ten_hanghoa ?>
									</a>
								</h3>

							</div>
						</div>
					<?php } ?>
				</div>
			</div>
		</div>

	</div>
</body>

</html>