<table border="1" cellspacing="0">
	<tr class="row">
		<th class=""></th>
		<th class="">ID</th>
		<th class="">Name</th>
		<th class="">Price</th>
		<th class="">Discount</th>
		<th class="">Image</th>
		<th class="">Date</th>
		<th class="">Mô tả</th>
		<th class="">Special</th>
		<th class="">Lượt xem</th>
		<th class="">ID Category</th>
	</tr>
	
	<?php
		foreach($listItems as $hanghoa) {
			extract($hanghoa);
			$editItem = "index.php?target=editItem&id=".$ma_hanghoa;
			$deleteItem = "index.php?target=deleteItem&id=".$ma_hanghoa;
			?>
			<tr class="row1">
				<td><input type="checkbox" name=""></td>
				<td><?= $ma_hanghoa ?></td>
				<td><?= $ten_hanghoa ?></td>
				<td><?= $don_gia ?></td>
				<td><?= $giam_gia ?></td>
				<td><img src="<?= $hinh ?>" style="width: 200px;margin: 15px;"></td>
				<td><?= $ngay_nhap ?></td>
				<td><?= $mo_ta ?></td>
				<td><?= $dac_biet ?></td>
				<td><?= $so_luot_xem ?></td>
				<td><?= $ma_loai ?></td>
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