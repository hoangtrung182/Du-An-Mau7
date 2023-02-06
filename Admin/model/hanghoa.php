<?php
	function insert_item($ten_sp, $gia_sp, $giam_gia, $image, $mota, $view, $ma_loai, $date) {
		$sql = "INSERT INTO hanghoa(ten_hanghoa, don_gia, giam_gia, hinh, mo_ta, so_luot_xem, ma_loai, ngay_nhap)
		 		VALUES ('$ten_sp','$gia_sp','$giam_gia','$image','$mota','$view','$ma_loai', $date)";
		pdo_execute($sql);
	}

	function select_items() {
		$sql = "SELECT * FROM hanghoa order by ten_hanghoa";
		$listItems = pdo_query($sql);
		return $listItems;
	}

	function delete_item($id) {
		$sql = "DELETE FROM hanghoa WHERE ma_hanghoa ='$id'";
		pdo_execute($sql);
	}

	function loadOne_item($id) {
		$sql = "SELECT * FROM hanghoa WHERE ma_hanghoa =" .$id;
		$item = pdo_query_one($sql);
		return $item;
	}

	function update_item($id, $ten_sp, $gia_sp, $giam_gia, $image, $date, $mota, $view, $ma_loai) {
		$sql = "UPDATE hanghoa SET ten_hanghoa ='$ten_sp', don_gia = '$gia_sp', giam_gia = '$giam_gia',
		 hinh = '$image',ngay_nhap='$date', mo_ta = '$mota', so_luot_xem = '$view', ma_loai = '$ma_loai'  
		 WHERE ma_hanghoa =".$id;
		pdo_execute($sql);
	}
 ?>
 