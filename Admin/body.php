<section class="main-menu">
	<?php
		foreach ($listItems as $hanghoa) { 
			extract($hanghoa); ?>
		 	<div class="main-item">
		 		<div class="main-type">
		 			<?php
		 				$item = loadOne_cate($ma_loai);
		 				extract($item);
		 			 ?>
		 			 <?= $ten_loai ?>
		 		</div>
		 		<div class="main-image">
		 			<a href="">
		 				<img src="<?= $hinh ?>" alt="">
		 			</a>
		 		</div>
		 		<div class="main-info">
		 			<h3 class="main-title">
		 				<a href="">
		 					<?= $ten_hanghoa ?>
		 				</a>
		 			</h3>
		 			<span class="main-price">
		 				Giá: <?= $don_gia ?>VND
		 			</span>
		 		</div>
		 	</div>
		<?php }  ?>
</section>