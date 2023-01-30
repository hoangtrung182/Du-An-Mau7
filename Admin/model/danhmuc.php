<?php
	function insert($ten_loai) {
		$sql = "INSERT INTO loaihang(ten_loai) VALUES ('$ten_loai')";
		pdo_execute($sql);
	}

	function select() {
		$sql = "SELECT * FROM loaihang order by ten_loai";
		$listItem = pdo_query($sql);
		return $listItem;
	}

	function delete($id) {
		$sql = "DELETE FROM loaihang WHERE ma_loai =".$id;
		pdo_execute($sql);
	}

	function loadOne($id) {
		$sql = "SELECT * FROM loaihang WHERE ma_loai =" .$id;
		$item = pdo_query_one($sql);
		return $item;
	}

	function update($id, $name) {
		$sql = "UPDATE loaihang SET ten_loai ='".$name."' WHERE ma_loai =".$id;
		pdo_execute($sql);
	}
 ?>