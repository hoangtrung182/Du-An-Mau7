<?php
function load_taikhoan(){
    $sql = "SELECT * from khachhang order by ma_khach_hang asc";
    $listUsers = pdo_query($sql);
    return $listUsers;
}


function loadOne_user($id) {
	$sql = "SELECT * FROM khachhang WHERE ma_khach_hang =" . $id;
	$user = pdo_query_one($sql);
	return $user;
}


function delete_user($id) {
	$sql = "DELETE FROM khachhang WHERE ma_khach_hang =" . $id;
	pdo_execute($sql);
}


function update_user($id, $ten_kh, $email, $pass, $image, $phone, $diachi, $vaitro) {
    $sql = "UPDATE khachhang SET ten_khach_hang ='$ten_kh', email = '$email', password = '$pass',
		 avatar = '$image',so_dien_thoai = '$phone', dia_chi = '$diachi', vai_tro = '$vaitro'  
		 WHERE ma_khach_hang ='$id'";
    pdo_execute($sql);
}

?>