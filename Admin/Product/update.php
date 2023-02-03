<section class="main">
	<form action="index.php?target=editedItem" method="post" enctype="multipart/form-data">
		<p>Loai Hang</p>
		<select name="maloai" id="" > 
				<?php foreach ($listCates as $loaihang) { 
					extract($loaihang);
					?>
					<option value="<?= $ma_loai ?>">
						<?= $ten_loai ?>	
					</option>
				<?php } ?>
		</select><br><br>
		<?php extract($item) ?>
		
		<input type="text" name="iditem" disabled="">
		<div class="">
			<p>Tên Sản phẩm</p>
			<input type="text" name="nameitem" value="<?= $ten_hanghoa ?>"  class="input_second">
		</div>
		<div class="">
			<p>Giá Sản phẩm</p>
			<input type="number" name="priceitem" value="<?= $don_gia ?>"  class="input_second">
		</div>
		<div class="">
			<p>Giam Giá Sản phẩm</p>
			<input type="number" name="discountitem" value="<?= $giam_gia ?>" class="input_second">
		</div>
		<div class="">
			<p>Hình ảnh</p>
			<input type="file" name="imageitem" value="<?= $hinh ?>" class="input_second" >
		</div>
		<div class="">
			<p>Mô tả</p>
			<textarea name="descitem" cols="30" value="<?= $mo_ta ?>" rows="10"></textarea>
		</div>
		<p>Lượt xem</p>
		<input type="number" name="views" value="<?= $so_luot_xem ?>"  class="input_second">

		<div class="button">
			<input type="hidden" name="id" value="<?= $ma_hanghoa ?>"> 
			<input type="submit" value="Update" name="updateitem" class="input_submit btn">
			<input type="reset" value="Retype" class="input_reset btn">
			<a href="index.php?target=listItems"><input type="button" value="List Product" class="btn" ></a>
		</div>
		<?= isset($thongbao) ? $thongbao : '' ?>
	</form>
</section>