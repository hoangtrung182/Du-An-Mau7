<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Document</title>
	<link rel="stylesheet" href="./css/style.css">
</head>

<body>
	<section class="main">
		<h2>Form chỉnh sửa sản phẩm</h2>
		<form action="index.php?target=editedItem" method="post" enctype="multipart/form-data">
			<p>Loại hàng</p>
			<select name="maloai" id="" class="select_op">
				<?php foreach ($listCates as $loaihang) {
					extract($loaihang); ?>
					<option value="<?= $ma_loai ?>">
						<?= $ten_loai ?>
					</option>
				<?php } ?>
			</select><br><br>
			<?php extract($item) ?>
			<div class="">
				<p>Mã sản phẩm</p>
				<input type="text" name="iditem" disabled="" placeholder="Không chỉnh sửa mã sản phẩm"
					class="input_second">
			</div>
			<div class="">
				<p>Tên sản phẩm</p>
				<input type="text" name="nameitem" value="<?= $ten_hanghoa ?>" class="input_second">
			</div>
			<div class="">
				<p>Giá sản phẩm</p>
				<input type="number" name="priceitem" value="<?= $don_gia ?>" class="input_second">
			</div>
			<div class="">
				<p>Giảm giá sản phẩm</p>
				<input type="number" name="discountitem" value="<?= $giam_gia ?>" class="input_second">
			</div>
			<div class="">
				<p>Hình ảnh</p>
				<input type="file" name="imageitem" value="<?= $hinh ?>" class="input_second">
			</div>
			<div class="text_input">
				<p>Ngày nhập</p>
				<input type="date" name="date" class="input_second" value="<?= $ngay_nhap ?>">
			</div>
			<div class="">
				<p>Mô tả</p>
				<textarea name="descitem" cols="60" rows="7" class="input_mota"
					value="<?= $mo_ta ?>"><?= $mo_ta ?></textarea>
			</div>
			<p>Lượt xem</p>
			<input type="number" name="views" value="<?= $so_luot_xem ?>" class="input_second">
			<div class="button btn-group">
				<input type="hidden" name="id" value="<?= $ma_hanghoa ?>">
				<input type="submit" value="Update" name="updateitem" class="btn input_submit">
				<input type="reset" value="Reset" class="btn input_reset">
				<a href="index.php?target=listItems">
					<input type="button" value="List Product" class="btn">
				</a>
			</div>
			<?= isset($thongbao) ? $thongbao : '' ?>
		</form>
	</section>
</body>

</html>