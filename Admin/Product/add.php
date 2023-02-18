<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Thêm sản phẩm mới</title>
	<link rel="stylesheet" href="css/style.css">
</head>

<body>
	<section class="main">
		<h2>Form thêm mới sản phẩm</h2>
		<form action="index.php?target=addItems" method="post" enctype="multipart/form-data">
			<p>Loại hàng</p>
			<select name="maloai" id="" class="select_op">
				<?php foreach ($listCates as $loaihang) {
					extract($loaihang); ?>
					<option value="<?= $ma_loai ?>">
						<?= $ten_loai ?>
					</option>
				<?php } ?>
			</select><br>
			<div class="text_input">
				<!-- <p class="input_title">Mã loại hàng</p> -->
				<input type="hidden" name="iditem" disabled placeholder="Không thay đổi mã loại hàng"
					class="input_second">
			</div>
			<div class="text_input">
				<p class="input_title">Tên sản phẩm</p>
				<input type="text" name="nameitem" class="input_second"><br>

			</div>
			<div class="text_input">
				<p>Giá sản phẩm</p>
				<input type="number" name="priceitem" class="input_second"><br>

			</div>
			<div class="text_input">
				<p>Giảm giá sản phẩm</p>
				<input type="number" name="discountitem" class="input_second"><br>

			</div>
			<div class="text_input">
				<p>Hình ảnh</p>
				<input type="file" name="imageitem" class="input_second">

			</div>
			<div class="text_input">
				<p>Ngày nhập</p>
				<input type="date" name="date" class="input_second"><br>

			</div>
			<div class="text_input">
				<p>Mô tả</p>
				<textarea name="descitem" cols="60" rows="7" class="input_mota"></textarea><br>
				<br>
			</div>
			<p>Lượt xem</p>
			<input type="number" name="views" class="input_second"><br>


			<div class="button">
				<input type="submit" value="ADD" name="addNewItem" class="input_button btn">
				<input type="reset" value="Retype" class="input_button btn">
				<a href="index.php?target=listItems"><input type="button" value="List Product" class="btn"></a>

			</div>
			<?= isset($thongbao) ? $thongbao : '' ?>
		</form>
	</section>
</body>

</html>