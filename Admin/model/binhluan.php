<?php
function selectList_comments($id)
{
    $sql = "SELECT * FROM binhluan WHERE ma_hang_hoa='$id' order by ma_binh_luan";
    $listComment = pdo_query($sql);
    return $listComment;
}
function select_comments()
{
    $sql = "SELECT * FROM binhluan order by ma_binh_luan";
    $listComment = pdo_query($sql);
    return $listComment;
}

function insert_comments($noi_dung, $ma_khach_hang, $ma_hang_hoa, $khoang_thoi_gian)
{
    $sql = "INSERT INTO binhluan(noi_dung, ma_khach_hang, ma_hang_hoa, khoang_thoi_gian) VALUES ('$noi_dung', '$ma_khach_hang', '$ma_hang_hoa', '$khoang_thoi_gian')";
    pdo_execute($sql);

}

function update_comment($id, $noidung, $khoangthoigian)
{
    $sql = "UPDATE binhluan SET noi_dung ='$noidung', khoang_thoi_gian='$khoangthoigian' WHERE ma_binh_luan ='$id'";
    pdo_execute($sql);
}

function delete_comment($id)
{
    $sql = "DELETE FROM binhluan WHERE ma_binh_luan =" . $id;
    pdo_execute($sql);
}

function loadOne_comment($id)
{
    $sql = "SELECT * FROM binhluan WHERE ma_binh_luan =" . $id;
    $comment = pdo_query_one($sql);
    return $comment;
}
?>