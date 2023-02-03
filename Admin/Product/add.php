<section class="main">
	<form action="index.php?target=addItems" method="post" enctype="multipart/form-data">
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
		
		<input type="text" name="iditem" disabled="">
		<div class="">
			<p>Tên Sản phẩm</p>
			<input type="text" name="nameitem"  class="input_second">
		</div>
		<div class="">
			<p>Giá Sản phẩm</p>
			<input type="number" name="priceitem"  class="input_second">
		</div>
		<div class="">
			<p>Giam Giá Sản phẩm</p>
			<input type="number" name="discountitem"  class="input_second">
		</div>
		<div class="">
			<p>Hình ảnh</p>
			<input type="file" name="imageitem"  class="input_second" >
		</div>
		<div class="">
			<p>Mô tả</p>
			<textarea name="descitem" cols="30" rows="10"></textarea>
		</div>
		<p>Lượt xem</p>
		<input type="number" name="views"  class="input_second">

		<div class="button">
			<input type="submit" value="ADD" name="addNewItem" class="input_submit btn">
			<input type="reset" value="Retype" class="input_reset btn">
			<a href="index.php?target=listItems"><input type="button" value="List Product" class="btn" ></a>
		</div>
		<?= isset($thongbao) ? $thongbao : '' ?>
	</form>
</section>