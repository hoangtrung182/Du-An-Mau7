<?php
	extract($item);
?>

<section class="main">
	<form action="index.php?target=suaitem" method="post">
		<p>Mã loại</p>
		<input type="text" name="maloai" disabled="" class="input_first">
		<p>Tên Loại</p>
		<input type="text" name="tenloai"
			 placeholder="Nhập tên loại hàng..." 
			 class="input_second"
			 value="<?= $ten_loai ?>" 
			 >
		<div class="button">
			<input type="hidden" name="id" value="<?= $ma_loai ?>"> 
			<input type="submit" value="Edit" name="updateitem" class="input_submit btn">
			<input type="reset" value="Retype" class="input_reset btn">
			<a href="index.php?target=listitem"><input type="button" value="List Item" class="btn" ></a>
		</div>
		<?= isset($thongbao) ? $thongbao : '' ?>
	</form>
</section>
	