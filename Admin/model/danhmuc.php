<?php
function insert_cate($ten_loai)
{
	$sql = "INSERT INTO loaihang(ten_loai) VALUES ('$ten_loai')";
	pdo_execute($sql);
}

function select_cate()
{
	$sql = "SELECT * FROM loaihang order by ma_loai";
	$listCate = pdo_query($sql);
	return $listCate;
}

function delete_cate($id)
{
	$sql = "DELETE FROM loaihang WHERE ma_loai =" . $id;
	pdo_execute($sql);
}

function loadOne_cate($id)
{
	$sql = "SELECT * FROM loaihang WHERE ma_loai =" . $id;
	$item = pdo_query_one($sql);
	return $item;
}

function update_cate($id, $name)
{
	$sql = "UPDATE loaihang SET ten_loai ='$name' WHERE ma_loai ='$id'";
	pdo_execute($sql);
}

function loadname_item($id)
{
	if ($id > 0) {
		$sql = "SELECT * FROM loaihang WHERE ma_loai =" . $id;
		$dm = pdo_query_one($sql);
		extract($dm);
		return $ten_loai;
	} else {
		return "";
	}
}


?>