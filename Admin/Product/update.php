<form action="index.php?target=updatesp" method="post" enctype="multipart/form-data">
		<p>Mã Sản phẩm</p>
		<input type="text" name="idprod" disabled="" class="input_first">
		<p>Tên Sản phẩm</p>
		<input type="text" name="nameprod"  class="input_second">
		<p>Giá Sản phẩm</p>
		<input type="text" name="priceprod"  class="input_second">
		<p>Hình ảnh</p>
		<input type="file" name="imageprod"  class="input_second">
		<p>Mô tả</p>
		<textarea name="descprod" cols="30" rows="10"></textarea>
		<p>Lượt xem</p>
		<input type="text" name="views"  class="input_second">

		<div class="button">
			<input type="submit" value="Update" name="addNewItem" class="input_submit btn">
			<input type="reset" value="Retype" class="input_reset btn">
			<a href="index.php?target=listproduct">
				<input type="button" value="List product" class="btn" >
			</a>
		</div>
		<?= isset($thongbao) ? $thongbao : '' ?>
	</form>