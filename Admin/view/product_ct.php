<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>San pham chi tiet</title>
	<link rel="stylesheet" href="../css/style.css">

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
					<h3><?= $ten_hanghoa ?></h3>
				</div>
				<div class="product-img">
					<img src="<?= $hinh ?>" alt="">
				</div>
				<div class="product-price">
					<span>Price:  <?= $don_gia ?> $</span>
				</div>
				<div class="product-desc">
					<p class="">
						<?= $mo_ta ?>
					</p>
				</div>
			</div>
			<!-- Comments -->
			<div class="row_product">
				<div class="title_row">BÌNH LUẬN</div>
				<div class="main_row">
					<iframe src="binhluan/form_comment.php?id=<?= $ma_binh_luan ?>" frameborder="0" width="100%"
						height="300px"></iframe>
				</div>
			</div>
			<!-- Other Products -->
			<div class="row_product">
				<div class="title_row">SẢN PHẨM KHÁC</div>
				<div>
					<?php
					foreach ($list_top10 as $hanghoa) {
						extract($hanghoa); ?>
						<div class="box1">
							<div class="top-image">
								<a href="./index.php?target=product_ct&id=<?= $ma_hanghoa ?> ">
									<img src="<?= $hinh ?>" alt="">
								</a>
							</div>
							<div class="main-info">
								<h3 class="top-item_title">
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

		<div class="sidebar">
			<div class="box">
				<h3 class="login-title">Đăng Nhập</h3>
				<form action="" method="post" class="form-login">
					<p class="login-name">Tên đăng nhập</p>
					<input type="text" name="name" placeholder="Nhập tên tài khoản.." required>
					<p class="login-pwd">Mật khẩu</p>
					<input type="password" name="password" placeholder="Nhập mật khẩu.." required> <br>
					<input type="checkbox" name="checkbox" id="">Ghi nhớ tài khoản
					<input type="submit" value="Đăng nhập">
				</form>
				<ul class="login-menu">
					<li><a href="">Quên mật khẩu</a></li>
					<li><a href="">Đăng ký thành viên</a></li>
				</ul>
			</div>
			<div class="box">
				<h3 class="cate-title">DANH MỤC</h3>
				<ul class="cate-menu">
					<?php 
					foreach ($load_nameitem as $products) {
						extract($products); ?>
					<li>
						<a href="index.php?target=product&id=<?= $ma_loai ?>"><?= $ten_loai ?></a>
					</li>
					<?php }  ?>
				</ul>
			</div>
			<div class="box">
				<h3 class="top-title">TOP YÊU THÍCH</h3>
				<div>
					<?php
					foreach ($list_top10 as $hanghoa) {
						extract($hanghoa); ?>
						<div class="box1">
							<div class="top-image">
								<a href="./index.php?target=product_ct&id=<?= $ma_hanghoa ?> ">
									<img src="<?= $hinh ?>" alt="">
								</a>
							</div>
							<div class="main-info">
								<h3 class="top-item_title">
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