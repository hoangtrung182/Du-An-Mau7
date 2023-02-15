<?php
function load_taikhoan(){
    $sql = "select * from khachhang order by ma_khach_hang desc";
    $listtaikhoan = pdo_query($sql);
    return $listtaikhoan;
}


function loadOne_user($id) {
	$sql = "SELECT * FROM khachhang WHERE ma_khach_hang =" . $id;
	$user = pdo_query_one($sql);
	return $user;
}


?>