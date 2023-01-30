<section class="main">
	<form action="index.php?target=adddm" method="post">
		<p>Mã loại</p>
		<input type="text" name="maloai" disabled="" class="input_first">
		<p>Tên Loại</p>
		<input type="text" name="tenloai"
			 placeholder="Nhập tên loại hàng..." 
			 class="input_second">
		<div class="button">
			<input type="submit" value="ADD" name="addNewItem" class="input_submit btn">
			<input type="reset" value="Retype" class="input_reset btn">
			<a href="index.php?target=listitem"><input type="button" value="List Item" class="btn" ></a>
		</div>
		<?= isset($thongbao) ? $thongbao : '' ?>
	</form>
</section>