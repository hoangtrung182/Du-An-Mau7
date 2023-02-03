<table border="1" cellspacing="0">
	<tr class="row">
		<th class="th1"></th>
		<th class="th2">Ma Loai</th>
		<th class="th3">Ten Loai</th>
		<th class="th4"></th>
		<th class="th4"></th>
	</tr>
	
	<?php
		foreach($listCates as $loaihang) {
			extract($loaihang);
			$editItem = "index.php?target=editCate&id=".$ma_loai;
			$deleteItem = "index.php?target=deleteCate&id=".$ma_loai;
			?>
			<tr class="row1">
				<td><input type="checkbox" name=""></td>
				<td><?= $ma_loai ?></td>
				<td><?= $ten_loai ?></td>
				<td>
					<a href="<?= $editItem ?>">
						<input type="button" value="Edit">
					</a>
				</td>
				<td>
					<a href="<?= $deleteItem ?>">
						<input type="button" value="Delete">
					</a>
				</td>
			</tr>
		<?php
		}
	?>
</table>
<p><?= $thongbao ?></p>
<button  class="input_submit btn">
	<a href="index.php?target=addCate">ADD NEW</a>
</button>
