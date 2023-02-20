<p class=""><?= isset($thongbao) ? $thongbao : '' ?></p>
<p class=""><?= isset($thongbao_xoa) ? $thongbao_xoa : '' ?></p>

<div>
    <h1>Danh sách bình luận</h1>
</div>
<table border="" cellspacing="0">
	<tr class="row">
		<th class="type"></th>
		<th class="type">ID</th>
		<th class="type">Nội Dung</th>
		<th class="type">IdUser</th>
		<th class="type">Tên Sản Phẩm</th>
		<th class="type">Thời Gian</th>
		<th colspan="2" class="type">Thao Tác</th>
	</tr>
	<?php
		foreach($listBinhluan as $binhluan) {
			extract($binhluan);
			$editBinhluan = "index.php?target=editBinhluan&id=".$ma_binh_luan;
			$deleteBinhluan = "index.php?target=deleteBinhluan&id=".$ma_binh_luan;
			$xemchitiet = "index.php?target=product_ct&id=" .$ma_hang_hoa;
			$item = loadOne_item($ma_hang_hoa);
			extract($item);
			?>
			<tr class="row1">
				<td>
					<a href="<?= $xemchitiet ?>">
						<input type="button" value="Xem chi tiết" class="cart-row btn">
					</a>
				</td>
				<td><?= $ma_binh_luan ?></td>
				<td><?= $noi_dung ?></td>
				<td><?= $ma_khach_hang ?></td>
				<td><?= $ten_hanghoa ?></td>
				<td><?= $khoang_thoi_gian ?></td>
				<td>
					<a href="<?= $editBinhluan ?>">
						<input type="button" value="Update" class="btn btn_edit">
					</a>
				</td>
				<td>
					<a href="<?= $deleteBinhluan ?>">
						<input type="button" value="Delete" class="btn btn_delete">
					</a>
				</td>
			</tr>
	<?php  }  ?>
</table>
<!-- <button  class="input_submit btn">
	<a href="index.php?target=addmoveCate">ADD NEW</a>
</button> -->
