<?php
function insert_item($ten_sp, $gia_sp, $giam_gia, $image, $date, $mota, $view, $ma_loai)
{
	$sql = "INSERT INTO hanghoa(ten_hanghoa, don_gia, giam_gia, hinh, ngay_nhap, mo_ta, so_luot_xem, ma_loai)
		 		VALUES ('$ten_sp','$gia_sp','$giam_gia','$image','$date','$mota','$view','$ma_loai')";
	pdo_execute($sql);
}

function select_items_body()
{
	$sql = "SELECT * FROM hanghoa  WHERE 1 order by ma_hanghoa desc limit 0,9";
	$listItems = pdo_query($sql);
	return $listItems;
}

function select_product_top10()
{
	$sql = "SELECT * FROM hanghoa  WHERE 1 order by so_luot_xem desc limit 0,10";
	$listItems = pdo_query($sql);
	return $listItems;
}

function select_items()
{
	$sql = "SELECT * FROM hanghoa order by ma_hanghoa desc";
	$listItems = pdo_query($sql);
	return $listItems;
}

function select_items_search($keyw, $ma_loai)
{
	$sql = "SELECT * FROM hanghoa  WHERE 1 ";
	if ($keyw != "") {
		$sql .= " AND ten_hanghoa LIKE '%" . $keyw . "%'";
	}
	if ($ma_loai > 0) {
		$sql .= " AND ma_loai='" . $ma_loai . "'";
	}
	$sql .= " order by ten_hanghoa desc";
	$listItems = pdo_query($sql);
	return $listItems;
}


function delete_item($id)
{
	$sql = "DELETE FROM hanghoa WHERE ma_hanghoa ='$id'";
	pdo_execute($sql);
}

function loadOne_item($id)
{
	$sql = "SELECT * FROM hanghoa WHERE ma_hanghoa =" . $id;
	$item = pdo_query_one($sql);
	return $item;
}


function load_products($id, $iddm)
{
	$sql = "SELECT * FROM hanghoa WHERE  ma_loai='$iddm' AND ma_hanghoa <>" . $id;
	$item = pdo_query($sql);
	return $item;
}

function update_item($id, $ten_sp, $gia_sp, $giam_gia, $image, $date, $mota, $view, $ma_loai)
{
	$sql = "UPDATE hanghoa SET ten_hanghoa ='$ten_sp', don_gia = '$gia_sp', giam_gia = '$giam_gia',
		 hinh = '$image',ngay_nhap = '$date', mo_ta = '$mota', so_luot_xem = '$view', ma_loai = '$ma_loai'  
		 WHERE ma_hanghoa =" . $id;
	pdo_execute($sql);
}
?>