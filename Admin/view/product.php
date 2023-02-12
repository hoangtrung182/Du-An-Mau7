

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Document</title>
	<link rel="stylesheet" href="./css/body.css">
	
</head>
<?php
if(isset($_GET['iddm']) && ($_GET['iddm'] > 0)) {
					$iddm=$_GET['iddm'];
					$list_product=select_items_search("",$iddm);
					
					$name_dm=loadname_item($iddm);
				}
				
				include './view/product.php';
                ?>
<body>
	<div class="body_main">
	<div class="left">
		<div class="row_product">
			
			<div class="title_row">
				<span class="title_product"><?= $name_dm ?></span>
			</div>
            <?php
			foreach ($list_product as $hanghoa) { 
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
		 			<a href="./index.php?target=product&id=<?= $ma_hanghoa ?> ">
		 				<img class="main-image" src="<?= $hinh ?>" alt="">
		 			</a>
		 		</div>
		 		<div class="main-info">
				 <span class="main-price">
		 				 <?= $don_gia ?>VND
		 		</span>
				
		 			<h3 class="main-title">
		 				<a href="./index.php?target=product&id=<?= $ma_hanghoa ?> ">
		 					<?= $ten_hanghoa ?>
		 				</a>
		 			</h3>
		 			
		 		</div>
		 	</div>
		<?php }  ?>
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