<p class=""><?= isset($thongbao) ? $thongbao : '' ?></p>
<p class=""><?= isset($thongbao_xoa) ? $thongbao_xoa : '' ?></p>

<div>
    <h1>Danh sách bình luận</h1>
</div>
<table border="" cellspacing="0">
	<tr class="row">
		<th class="type"></th>
		<th class="type">ID</th>
		<th class="type">Nội dung</th>
		<th class="type">IdUser</th>
		<th class="type">IdProduct</th>
		<th class="type">Thời gian</th>
	</tr>
	<?php
		foreach($listBinhluan as $binhluan) {
			extract($binhluan);
			$editBinhluan = "index.php?target=editBinhluan&id=".$ma_binh_luan;
			$deleteBinhluan = "index.php?target=deleteBinhluan&id=".$ma_binh_luan;
			?>
			<tr class="row1">
				<td><input type="checkbox" name=""></td>
				<td><?= $ma_binh_luan ?></td>
				<td><?= $noi_dung ?></td>
				<td><?= $ma_khach_hang ?></td>
				<td><?= $ma_hang_hoa ?></td>
				<td><?= $khoang_thoi_gian ?></td>
				<td>
					<a href="<?= $editBinhluan ?>">
						<input type="button" value="Edit"  class="btn_edit">
					</a>
				</td>
				<td>
					<a href="<?= $deleteBinhluan ?>">
						<input type="button" value="Delete" class="btn_delete">
					</a>
				</td>
			</tr>
	<?php  }  ?>
</table>
<!-- <button  class="input_submit btn">
	<a href="index.php?target=addmoveCate">ADD NEW</a>
</button> -->
