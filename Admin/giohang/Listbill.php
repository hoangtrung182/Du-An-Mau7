<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title></title>
    <link rel="stylesheet" href="./css/style.css">
</head>

<body>
    <div class="title_row">ĐƠN HÀNG CỦA TÔI</div>
    <p>Tìm kiếm</p>
    <form action="index.php?target=Listbill" method="post">
        <input type="text" name="keyw" id="filter-input" class="" placeholder="Nhập mã đơn hàng.....">
        <input type="submit" id="btn-submit_product" value="Search" name="listok">
    </form>
    <?php
    $thongbao = isset($thongbao) ? $thongbao : '';
    $thongbao_xoa = isset($thongbao_delete) ? $thongbao_delete : '';
    $thongbao_sua = isset($thongbao_update) ? $thongbao_update : '';
    ?>
    <p class="">
        <?= $thongbao ?>
    </p>
    <p class="">
        <?= $thongbao_xoa ?>
    </p>
    <p class="">
        <?= $thongbao_sua ?>
    </p>

    <table border="1" cellspacing="0">
        <tr class="row">
            <th class="type"></th>
            <th class="type">Mã đơn hàng</th>
            <th class="type">Khách hàng</th>
            <th class="type">Số lượng hàng</th>
            <th class="type">Giá trị đơn hàng</th>
            <th class="type">Tình trạng đơn hàng</th>
            <th class="type">Ngày đặt hàng</th>
            <th class="type" colspan=2>Thao tác</th>


        </tr>

        <?php
        foreach ($listBill as $bill) {
            extract($bill);
            $editBill = "index.php?target=editBill&id=" . $idbill;
            $deleteBill = "index.php?target=deleteListBill&id=" . $idbill;
            $khach_hang = $bill["name"] . "<br>" . $bill["email"] . "<br>" . $bill["dia_chi"] . "<br>" . $bill["phone"];
            $count_mh = soluong_mh($bill['idbill']);
            $status_bill = get_bill($bill['status']);

            ?>
            <tr class="row1">
                <td><input type="checkbox" name=""></td>
                <td>
                    <?= $bill['idbill'] ?>
                </td>
                <td>
                    <?= $khach_hang ?>
                </td>
                <td>
                    <?= $count_mh ?>
                </td>
                <td>
                    <?= $bill['tong_bill'] ?>
                </td>

                <td>
                    <?= $status_bill ?>
                </td>
                <td>
                    <?= $bill['ngay_nhap'] ?>
                </td>

                <td>
                    <a href="<?= $editBill ?>">
                        <input type="button" value="Edit" class="btn btn_edit">
                    </a>
                </td>
                <td>
                    <a href="<?= $deleteBill ?>">
                        <input type="button" value="Delete" class="btn btn_delete"
                            onclick="return confirm('Bạn có chắc chắn muốn xóa không!')">
                    </a>
                </td>
            </tr>
        <?php } ?>
    </table>
    </table>
    <button class="input_submit btn">
        <a href="index.php">Tiếp tục mua sắm</a>
    </button>
</body>

</html>