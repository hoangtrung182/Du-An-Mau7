
<section class="main">
	<h2>Form thêm mới danh mục</h2>
	<form action="index.php?target=addCate" method="post">
		<p>Mã loại</p>
		<input type="text" name="maloai" disabled="" class="input_second"  placeholder="Không được thay đổi mã loại" >
		<p>Tên Loại</p>
		<input type="text" name="tenloai"
			 placeholder="Nhập tên loại hàng..." 
			 class="input_second">
		<div class="button">
			<input type="submit" value="Thêm mới" name="addNewCate" class="input_submit btn">
			<input type="reset" value="Reset" class="input_reset btn">
			<a href="index.php?target=listCate"><input type="button" value="Danh sách" class="btn" ></a>
		</div>
		<?= isset($thongbao) ? $thongbao : '' ?>
	</form>
</section>