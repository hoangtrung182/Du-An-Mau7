<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Document</title>
	<link rel="stylesheet" href="../css/style.css">
</head>
<body>
	<div class="body_main">
		<div class="main-content">
			<div class="slideshow">
				<img src="img_product/product1.jpg" alt="">
			</div>
			<div class="product">
				<section class="main-menu">
					<?php
					foreach ($listbody as $hanghoa) {
						extract($hanghoa); ?>
						<div class="box">
							<div class="main-type">
								<?php $item = loadOne_cate($ma_loai);
								extract($item);	?>
								<?= $ten_loai ?>
							</div>

							<div class="img_product">
								<a href="./index.php?target=product_ct&id=<?= $ma_hanghoa ?> ">
									<img class="main-image" src="<?= $hinh ?>" alt="">
								</a>
							</div>
							<div class="main-info">
								<h3 class="main-title">
									<a href="./index.php?target=product_ct&id=<?= $ma_hanghoa ?> ">
										<?= $ten_hanghoa ?>
									</a>
								</h3>
								<span class="main-price">
									<?= $don_gia ?> $
								</span>
							</div>
						</div>
					<?php } ?>
				</section>
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
				<!-- <?php
				foreach ($load_nameitem as $products) {
					extract($products);
					$link_product = "index.php?target=product&id=" . $ma_loai;
					echo '<li><a href="' . $link_product . '">' . $ten_loai . '</a></li>';
				}
				?> -->
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