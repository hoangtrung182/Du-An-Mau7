<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Document</title>
	<link rel="stylesheet" href="./css/list_product.css">
</head>
<body>
<table border="1" cellspacing="0">
	<tr class="row">
		<th class="type"></th>
		<th class="type">ID</th>
		<th class="type">Name</th>
		<th class="type">Price</th>
		<th class="type">Discount</th>
		<th class="type">Image</th>
		<th class="type">Date</th>
		<th class="type">Mô tả</th>
		<th class="type">Special</th>
		<th class="type">Lượt xem</th>
		<th class="type">ID Category</th>
		<th class="type"></th>
		<th class="type"></th>
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
				<td><img src="<?= $hinh ?>" style="width: 200px"></td>
				<td><?= $ngay_nhap ?></td>
				<td><?= $mo_ta ?></td>
				<td><?= $dac_biet ?></td>
				<td><?= $so_luot_xem ?></td>
				<td><?= $ma_loai ?></td>
				<td>
					<a href="<?= $editItem ?>">
						<input type="button" value="Edit" class="btn btn_edit">
					</a>
				</td>
				<td>
					<a href="<?= $deleteItem ?>">
						<input type="button" value="Delete" class="btn btn_delete">
					</a>
				</td>
			</tr>
		<?php 
	   }
	?>
</table>
<button  class="input_submit btn">
	<a href="index.php?target=addItems">ADD NEW</a>
</button>		
</body>
</html>