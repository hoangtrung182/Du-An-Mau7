<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>List San Pham</title>
	<link rel="stylesheet" href="./css/style.css">
</head>

<body>
	<h2>Danh sách sản phẩm</h2>
	<p>Tìm kiếm sản phẩm</p>
	<form action="index.php?target=listItems" method="post">
		<input type="text" name="keyw" id="filter-input" class="" placeholder="Nhập tên sản phẩm.....">
		<select name="maloai" id="" class="select-product">
			<option value="0" selected>Tất cả</option>
			<?php foreach ($listCates as $loaihang) {
				extract($loaihang); ?>
				<option value="<?= $ma_loai ?>">
					<?= $ten_loai ?>
				</option>
			<?php } ?>
		</select>
		<input type="submit" id="btn-submit_product" class="btn" value="Search" name="listok">
	</form>
	<?php
	$thongbao = isset($thongbao) ? $thongbao : '';
	$thongbao_xoa = isset($thongbao_delete) ? $thongbao_delete : '';
	$thongbao_sua = isset($thongbao_update) ? $thongbao_update : '';
	?>
	<p class="">
		<?= $thongbao ?>
	</p>
	<p class="">
		<?= $thongbao_xoa ?>
	</p>
	<p class="">
		<?= $thongbao_sua ?>
	</p>

	<table border="1" cellspacing="0">
		<tr class="row">
			<th class="type"></th>
			<th class="type">id</th>
			<th class="type_name">Name</th>
			<th class="type">Price</th>
			<th class="type">Discount</th>
			<th class="type">Image</th>
			<th class="type">Date</th>
			<th class="type_desc">Description</th>
			<th class="type">Views</th>
			<th class="type">Mã loại</th>
			<th class="type"></th>
			<th class="type"></th>
		</tr>

		<?php
		foreach ($listItems as $hanghoa) {
			extract($hanghoa);
			$editItem = "index.php?target=editItem&id=" . $ma_hanghoa;
			$deleteItem = "index.php?target=deleteItem&id=" . $ma_hanghoa;
			?>
			<tr id="rowAll">
				<td><input type="checkbox" name=""></td>
				<td>
					<?= $ma_hanghoa ?>
				</td>
				<td>
					<?= $ten_hanghoa ?>
				</td>
				<td>
					<?= $don_gia ?>
				</td>
				<td>
					<?= $giam_gia ?>
				</td>
				<td><img src="<?= $hinh ?>" style="width: 150px; height: 150px"></td>
				<td>
					<?= $ngay_nhap ?>
				</td>
				<td id="id_mota">
					<?= $mo_ta ?>
				</td>
				<td>
					<?= $so_luot_xem ?>
				</td>
				<td>
					<?= $ma_loai ?>
				</td>
				<td>
					<a href="<?= $editItem ?>">
						<input type="button" value="Edit" class="btn btn_edit">
					</a>
				</td>
				<td>
					<a href="<?= $deleteItem ?>">
						<input type="button" value="Delete" class="btn btn_delete"
							onclick="return confirm('Bạn có chắc chắn muốn xóa không!')">
					</a>
				</td>
			</tr>
		<?php } ?>
	</table>
	</table>
	<button class="btn">
		<a  href="index.php?target=addmoveItems">ADD NEW</a>
	</button>
</body>

</html>