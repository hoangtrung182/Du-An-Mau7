<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title></title>
    <link rel="stylesheet" href="../css/style.css">

</head>

<body>
    <div class="body_mainct">
        <div class="main-content">
            <div class="row_product">
                <div class="title_row">ĐƠN HÀNG CỦA TÔI</div>
                <table>
                    <tr class="row">
                        <th class="type">Mã đơn hàng</th>
                        <th class="type">Ngày đặt</th>
                        <th class="type">Số lượng mặt hàng</th>
                        <th class="type">Tổng giá trị đơn hàng</th>
                        <th class="type">Tình trạng đơn hàng</th>
                    </tr>
                    <?php
                    if (is_array($list_bill)) {
                        foreach ($list_bill as $bill) {
                            extract($bill);
                            $status_bill = get_bill($bill['status']);
                            $count_mh = soluong_mh($idbill); ?>
                            <tr>
                                <td>
                                    <?= $idbill ?>
                                </td>
                                <td>
                                    <?= $ngay_nhap ?>
                                </td>
                                <td>
                                    <?= $count_mh ?>
                                </td>
                                <td>
                                    <?= $tong_bill ?>
                                </td>

                                <td>
                                    <?= $status_bill ?>
                                </td>
                            </tr>
                        <?php } ?>
                    <?php } ?>
                </table>
            </div>
        </div>
        <div class="sidebar">
            <?php include './view/box_right.php'; ?>
        </div>
    </div>
</body>
</html>