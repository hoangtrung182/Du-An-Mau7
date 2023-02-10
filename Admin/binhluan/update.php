<section class="main">
	<h2>Form chỉnh sửa bình luận</h2>
	<?php extract($comment); ?>		
	<form action="index.php?target=editedBinhluan" method="post">
		<p>Mã bình luận</p>
		<input type="text" name="mabinhluan" disabled="" 
				class="input_second" 
				placeholder="Không được thay đổi mã bình luận">
		<p>Nội dung</p>
		<input type="text" name="content" 
			   class="input_second"
			   value="<?= $noi_dung ?>">

        <p>Mã khách hàng:</p>
		<input type="text" name="idUser" 
			   class="input_second"
			   value="<?= $ma_khach_hang ?>">

               <p>Mã hàng hóa</p>
		<input type="text" name="idCate" 
			   class="input_second"
			   value="<?= $ma_hang_hoa ?>">

               <p>Thời gian</p>
		<input type="text" name="time" 
			   class="input_second"
			   value="<?= $khoang_thoi_gian ?>">

		<div class="button">
			<input type="hidden" name="id" value="<?= $ma_binh_luan ?>"> 
			<input type="submit" value="Edit" name="updateComment" class="input_submit btn">
			<input type="reset" value="Retype" class="input_reset btn">
			<a href="index.php?target=listbl"><input type="button" value="List Comment" class="btn"></a>
		</div>
		<?= isset($thongbao) ? $thongbao : '' ?>
	</form>
</section>
	