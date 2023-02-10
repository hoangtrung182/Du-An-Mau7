<?php
function select_comments() {
    $sql = "SELECT * FROM binhluan order by ma_binh_luan";
    $listComment = pdo_query($sql);
    return $listComment;
}

// function insert_comments($noidung, $ma_khach_hang, $ma_hang_hoa, $ma_thoi_gian) {
//     $sql = "INSERT INTO loaihang(noidung, ma_khach_hang, ma_hang_hoa, ma_thoi_gian) VALUES ('$noidung', '$ma_khach_hang', '$ma_hang_hoa', '$ma_thoi_gian')";
//     pdo_execute($sql);
// }

function delete_comment($id) {
    $sql = "DELETE FROM binhluan WHERE ma_binh_luan =".$id;
    pdo_execute($sql);
}
?>
