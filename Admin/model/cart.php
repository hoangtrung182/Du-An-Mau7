<?php

function viewCart($del) {
    $tong = 0;
    $i = 0; 
    $link = "index.php?target=deleteC&idCart=$i";

    if ($del ===  1) {
        $delete_th = '<th>Thao tác</th>';
        $delete_td = '<a href="' . $link . '"><input type="button" value="Xóa" class="btn btn_delete"</a>';
    } else {
        $delete_th = "";
        $delete_td = "";
    } ?>

    <tr class="row">
        <th class="type">Hình ảnh</th>
        <th class="type">Tên sản phẩm</th>
        <th class="type">Đơn giá</th>
        <th class="type">Số lượng</th>
        <th class="type">Thành tiền</th>
        <?= $delete_th ?>
    </tr>

    <?php 
        if(count($_SESSION['mycart']) == 0) { ?>
            <p class="cart-notify">Chưa có sản phẩm nào !! Xin hãy chọn sản phẩm</p> 
        <?php }else { ?>
            <?php
            foreach ($_SESSION['mycart'] as $cart) {
                $img = $cart[2];
                $thanhtien = $cart[3] * $cart[4];
                $tong += $thanhtien;

                $link = "index.php?target=deleteC&idCart=$i";

                if ($del == 1) {
                    $delete_th = '<th>Thao tác</th>';
                    $delete_td = '<a href="'. $link .'" class="btn_delCart"><input type="button" value="Xóa" class="btn btn_delete"</a>';
                } else {
                    $delete_th = "";
                    $delete_td = "";
                } 
            ?>
                <tr class="cart-row">
                    <td><img src="<?= $img ?>" height="60px" width="60px" alt=""></td>
                    <td>
                        <?= $cart[1] ?>
                    </td>
                    <td>
                        <?= $cart[3] ?>
                    </td>
                    <td>
                        <?= $cart[4] ?>
                        <!-- <input type="button" value="+" >  -->
                    </td>
                    <td>
                        <?= $thanhtien ?> $
                    </td>

                    <td>
                        <?= $delete_td ?>
                    </td>
                </tr>
                <?php $i += 1; ?>
            <?php } ?>
                <?php }
            ?>

    
    <tr class="cart-row">
        <td colspan=4>Tổng thành tiền : </td>
        <td><?= $tong ?> $</td>
    </tr>
<?php }

 ?>

<?php 

// var_dump(count($_SESSION['mycart']));

function tongBill()
{
    $tong = 0;
    $i = 0; ?>

    <?php foreach ($_SESSION['mycart'] as $cart) {
        $img = $cart[2];
        $thanhtien = $cart[3] * $cart[4];
        $tong += $thanhtien; ?>

        <?php $i += 1; ?>
    <?php } ?>
    <?php return $tong; ?>
<?php } ?>


<?php
function insert_bill($id, $name, $email, $diachi, $phone, $date, $tongbill, $pttt) {
    $sql = "INSERT INTO bill(ma_khach_hang,name, email, dia_chi, phone, ngay_nhap,tong_bill,pttt)
		 		VALUES ('$id','$name','$email','$diachi','$phone','$date','$tongbill','$pttt')";
    return pdo_execute_lastinsertID($sql);
}

function insert_cart($ma_khach_hang, $name, $img, $price, $soluong, $thanhtien, $idbill) {
    $sql = "INSERT INTO cart(ma_khach_hang, name, image, price, soluong,thanhtien,idbill)
		 		VALUES ('$ma_khach_hang','$name','$img','$price','$soluong','$thanhtien','$idbill')";
    return pdo_execute($sql);
}

function loadone_bill($id) {
    $sql = "SELECT * FROM bill WHERE idbill =" . $id;
    $bill = pdo_query_one($sql);
    return $bill;
}
function loadone_cart($id) {
    $sql = "SELECT * FROM cart WHERE idbill =" . $id;
    $bill = pdo_query($sql);
    return $bill;
}
function loadall_bill($keyw = " ", $id = 0) {
    $sql = "SELECT * FROM bill WHERE 1";
    if (isset($id) && $id > 0) {
        $sql .= " AND ma_khach_hang =" . $id;
    }

    if ($keyw != " ") {
        $sql .= " AND idbill LIKE '%" . $keyw . "%'";
    }
    $sql .= " ORDER BY idbill asc";
    $listbill = pdo_query($sql);
    return $listbill;
}
function get_bill($i) {
    switch ($i) {
        case '0':
            $tt = "Đơn hàng mới";
            break;
        case '1':
            $tt = "Đang xử lý";
            break;

        case '2':
            $tt = "Đang giao hàng";
            break;

        case '3':
            $tt = "Đã giao hàng thành công";
            break;

        default:
            $tt = "Đơn hàng mới";
            break;
    }
    return $tt;
}
function delete_bill($id) {
    $sql = "DELETE FROM cart WHERE idbill =" . $id;
    pdo_execute($sql);
}
function delete_bills($id) {
    $sql = "DELETE FROM bill WHERE idbill =" . $id;
    pdo_execute($sql);
}

function update_bill($id, $ten, $email, $diachi, $phone, $status, $date) {
    $sql = "UPDATE bill SET name ='$ten', email = '$email', dia_chi = '$diachi',
		 status = '$status',ngay_nhap = '$date'  
		 WHERE idbill =" . $id;
    pdo_execute($sql);
}



function soluong_mh($id) {
    $sql = "SELECT * FROM cart WHERE idbill =" . $id;
    $bill = pdo_query($sql);
    return sizeof($bill);
}

?>
<?php
function bill_chi_tiet($Bill) {
    $tong = 0;
    $i = 0; ?>

    <tr class="row">
        <th class="type">Hình ảnh</th>
        <th class="type">Tên sản phẩm</th>
        <th class="type">Đơn giá</th>
        <th class="type">Số lượng</th>
        <th class="type">Thành tiền</th>
    </tr>
    <?php foreach ($Bill as $cart) {
        $img = $cart['image'];
        $tong += $cart['thanhtien']; ?>
        <tr>
            <td><img src="<?= $img ?>" height="60px" width="60px" alt=""></td>
            <td>
                <?= $cart['name'] ?>
            </td>
            <td>
                <?= $cart['price'] ?> 
            </td>
            <td>
                <?= $cart['soluong'] ?>
            </td>
            <td>
                <?= $cart['thanhtien'] ?>
            </td>
        </tr>
        <?php $i += 1; ?>
    <?php } ?>
    <tr>
        <td colspan=4>Tổng đơn hàng</td>
        <td>
            <?= $tong ?>
        </td>
    </tr>
<?php
     }
?>