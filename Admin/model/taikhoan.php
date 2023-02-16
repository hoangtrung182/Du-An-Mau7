<?php
function insert_khachhang($ten_kh, $email, $pass)
{
    $sql = "INSERT INTO khachhang(ten_khach_hang, email, password)
		 		VALUES ('$ten_kh','$email','$pass')";
    pdo_execute($sql);
}

function check_khachhang($email, $password) {
    $sql = "SELECT * FROM khachhang WHERE email ='$email' AND password ='$password'";
    $item = pdo_query_one($sql);
    return $item;
}

function update_Tk($id, $ten_kh, $email, $pass, $image, $phone, $diachi)
{
    $sql = "UPDATE khachhang SET ten_khach_hang ='$ten_kh', email = '$email', password = '$pass',
		 avatar = '$image',so_dien_thoai = '$phone', dia_chi = '$diachi'  
		 WHERE ma_khach_hang ='$id'";
    pdo_execute($sql);
}

function check_Mk($email)
{
    $sql = "SELECT * FROM khachhang WHERE email ='$email'";
    $item = pdo_query_one($sql);
    return $item;
}
?>