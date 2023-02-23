<?php

function loadall_thongke()
{
    $sql = "select loaihang.ma_loai as malh, loaihang.ten_loai, count(ma_hanghoa) as countsp, min(hanghoa.don_gia) as minprice, max(hanghoa.don_gia) as maxprice, avg(hanghoa.don_gia) as avgprice from hanghoa left join loaihang on loaihang.ma_loai = hanghoa.ma_loai group by loaihang.ma_loai order by loaihang.ma_loai desc";
    $listtk = pdo_query($sql);
    return $listtk;
}

?>