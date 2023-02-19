<?php 
	$thongbao = isset($thongbao) ? $thongbao : '';
	$thongbao_delete = isset($thongbao_xoa) ? $thongbao_xoa : '';
?>
<p class=""><?= $thongbao ?></p>
<p class=""><?= $thongbao_delete ?></p>

<table border="1" cellspacing="0">
	<tr class="row">
		<!-- <th class="type"></th> -->
		<th class="type">Mã loại</th>
		<th class="type">Tên loại</th>
		<th class="type" colspan="2">Thao tác</th>
		<!-- <th class="type"></th> -->
	</tr>
	<?php
		foreach($listCates as $loaihang) {
			extract($loaihang);
			$editItem = "index.php?target=editCate&id=".$ma_loai;
			$deleteItem = "index.php?target=deleteCate&id=".$ma_loai;
			?>
			<tr class="row1">
				<!-- <td><input type="checkbox" name=""></td> -->
				<td><?= $ma_loai ?></td>
				<td><?= $ten_loai ?></td>
				<td>
					<a href="<?= $editItem ?>">
						<input type="button" value="Edit"  class="btn btn_edit">
					</a>
				</td> 
				<td>
					<a href="<?= $deleteItem ?>">
						<input type="button" value="Delete" class="btn btn_delete">
					</a>
				</td>
			</tr>
		<?php  }  ?>
</table>
<button  class="input_submit btn ml-180">
	<a href="index.php?target=addmoveCate">Thêm mới</a>
</button>
