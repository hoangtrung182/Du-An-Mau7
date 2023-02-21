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
                <div class="title_row">CẢM ƠN</div>
                <h3>Cảm ơn bạn đã đặt hàng!</h3>
            </div>
            <?php if (isset($Bill) && is_array($Bill)) {
                extract($Bill);
            }
            ?>
            <div class="row_product">
                <div class="title_row">THÔNG TIN ĐƠN HÀNG</div>
                Mã đơn hàng:
                <?= $Bill['idbill'] ?><br>
                Ngày đặt hàng:
                <?= $Bill['ngay_nhap'] ?><br>
                Địa chỉ:
                <?= $Bill['dia_chi'] ?><br>
            </div>
            <div class="row_product">
                <div class="title_row">THÔNG TIN ĐẶT HÀNG</div>
                <table>
                    <tr class="text_input">
                        <td class="input_title">Người đặt hàng</td>
                        <td>
                            <?= $Bill['name'] ?>
                        </td>
                    </tr>
                    <tr class="text_input">
                        <td class="input_title">Địa chỉ</td>
                        <td>
                            <?= $Bill['dia_chi'] ?>
                        </td>
                    </tr>
                    <tr class="text_input">
                        <td class="input_title">Email</td>
                        <td>
                            <?= $Bill['email'] ?><br>
                        </td>
                    </tr>
                    <tr class="text_input">
                        <td>Điện thoại</td>
                        <td>
                            <?= $Bill['phone'] ?><br>
                        </td>
                    </tr>
                    <?= isset($thongbao) ? $thongbao : '' ?>
                </table>
            </div>

            <div class="row_product">
                <div class="title_row">PHƯƠNG THỨC THANH TOÁN</div>
                <table>
                    <tr>
                        <td><input type="radio" name="pttt" id="" checked>Thanh toán khi nhận hàng</td>
                        <td><input type="radio" name="pttt" id="">Chuyển khoản ngân hàng</td>
                        <td><input type="radio" name="pttt" id="">Thanh toán online</td>
                    </tr>
                </table>
            </div>
            <div class="row_product">
                <div class="title_row">THÔNG TIN GIỎ HÀNG</div>
                <table border="1" cellspacing="0">
                    <?php
                    bill_chi_tiet($billct);
                    ?>
                </table>
            </div>
        </div>
        <div class="sidebar">
            <?php include './view/box_right.php'; ?>
        </div>

    </div>
</body>

</html>