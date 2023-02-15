<?php
function load_taikhoan()
{
    $sql = "select * from khachhang order by ma_khach_hang desc";
    $listtaikhoan = pdo_query($sql);
    return $listtaikhoan;
}

?>