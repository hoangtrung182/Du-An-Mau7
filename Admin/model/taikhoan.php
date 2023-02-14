<?php
function insert_khachhang($ten_kh, $email, $pass)
{
    $sql = "INSERT INTO khachhang(ten_khach_hang, email, password)
		 		VALUES ('$ten_kh','$email','$pass')";
    pdo_execute($sql);
}

?>