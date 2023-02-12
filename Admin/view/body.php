
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
		 			<?php
		 				$item = loadOne_cate($ma_loai);
		 				extract($item);
		 			 ?>
		 			 <?= $ten_loai ?>
		 		</div>
				
		 		<div class="img_product" >
		 			<a href="./index.php?target=product_ct&id=<?= $ma_hanghoa ?> ">
		 				<img class="main-image" src="<?= $hinh ?>" alt="">
		 			</a>
		 		</div>
		 		<div class="main-info">
				 <span class="main-price">
		 				 <?= $don_gia ?>VND
		 		</span>
				
		 			<h3 class="main-title">
		 				<a href="./index.php?target=product_ct&id=<?= $ma_hanghoa ?> ">
		 					<?= $ten_hanghoa ?>
		 				</a>
		 			</h3>
		 			
		 		</div>
		 	</div>
		<?php }  ?>
</section>
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
						<input type="checkbox" name="checkbox" id="">Ghi nhớ tài khoản
						<input type="submit" value="Đăng nhập">
					</form>
					<ul>
						<li>Quên mật khẩu</li>
						<li>Đăng ký thành viên</li>
					</ul>
				</div>
				<div class="box">
					<h3>DANH MỤC</h3>
					<?php
					foreach($listCates as $name){
						extract($name);
						$link_product="index.php?target=product&id=".$ma_loai;
						echo '<li><a class="link_product" href="'.$link_product.'">'.$ten_loai.'</li>';
					}
					?>
				</div>
				<div class="box">
					<h3>TOP 10 YÊU THÍCH</h3>
				</div>
			</div>
	</div>
</body>
</html>