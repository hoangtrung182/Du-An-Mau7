<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Document</title>
	<link rel="stylesheet" href="../css/style.css">
	<link rel="stylesheet" href="../css/slideshow.css">
</head>


<body>
	<div class="body_main">
		<div class="main-content">
			<div class="slideshow">
				<!-- Slideshow container -->
				<div class="slideshow-container">

<<<<<<< HEAD
				  <!-- Full-width images with number and caption text -->
				  <div class="mySlides fade">
				    <div class="numbertext">1 / 3</div>
				    <img src="Image/ipbanner.jpg" style="width:100%;height: 200px">
				    <!-- <div class="text"></div> -->
				  </div>

				  <div class="mySlides fade">
				    <div class="numbertext">2 / 3</div>
				    <img src="Image/iphonebanner.jpg" style="width:100%;height: 200px">
				    <!-- <div class="text">Caption Two</div> -->
				  </div>

				  <div class="mySlides fade">
				    <div class="numbertext">3 / 3</div>
				    <img src="Image/laptopbanner.jpg" style="width:100%; height: 200px">
				    <!-- <div class="text">Caption Three</div> -->
				  </div>
				  <!-- Next and previous buttons -->
				  <a class="prev" onclick="plusSlides(-1)">&#10094;</a>
				  <a class="next" onclick="plusSlides(1)">&#10095;</a>
=======
					<!-- Full-width images with number and caption text -->
					<div class="mySlides fade">
						<div class="numbertext">1 / 3</div>
						<img src="Image/ipbanner.jpg" style="width:100%;height: 200px">
						<div class="text">Caption Text</div>
					</div>

					<div class="mySlides fade">
						<div class="numbertext">2 / 3</div>
						<img src="Image/iphonebanner.jpg" style="width:100%;height: 200px">
						<div class="text">Caption Two</div>
					</div>

					<div class="mySlides fade">
						<div class="numbertext">3 / 3</div>
						<img src="Image/laptopbanner.jpg" style="width:100%; height: 200px">
						<div class="text">Caption Three</div>
					</div>
					<!-- Next and previous buttons -->
					<a class="prev" onclick="plusSlides(-1)">&#10094;</a>
					<a class="next" onclick="plusSlides(1)">&#10095;</a>
>>>>>>> 8400fbd87daf057cb8071014e1bc5874671ed4a8
				</div>
				<br>

				<!-- The dots/circles -->
				<div style="text-align:center">
					<span class="dot" onclick="currentSlide(1)"></span>
					<span class="dot" onclick="currentSlide(2)"></span>
					<span class="dot" onclick="currentSlide(3)"></span>
				</div>
			</div>
			<div class="product">
				<section class="main-menu">
					<?php
					foreach ($listbody as $hanghoa) {
						extract($hanghoa); ?>
						<div class="box">
							<div class="main-type">
								<?php $item = loadOne_cate($ma_loai);
								extract($item); ?>
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
			<?php include './view/box_right.php'; ?>
		</div>
	</div>
	<script>
		let slideIndex = 0;
		showSlides();

		function showSlides() {
			let i;
			let slides = document.getElementsByClassName("mySlides");
			for (i = 0; i < slides.length; i++) {
				slides[i].style.display = "none";
			}
			slideIndex++;
			if (slideIndex > slides.length) { slideIndex = 1 }
			slides[slideIndex - 1].style.display = "block";
			setTimeout(showSlides, 2000); // Change image every 2 seconds
		}
	</script>
</body>

</html>