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
            <form action="index.php?target=billcomfim" method="post">
                <div class="row_product">
                    <div class="title_row">THÔNG TIN ĐẶT HÀNG</div>
                    <?php
                    if (isset($_SESSION['user'])) {
                        $name = $_SESSION['user']['ten_khach_hang'];
                        $diachi = $_SESSION['user']['dia_chi'];
                        $email = $_SESSION['user']['email'];
                        $phone = $_SESSION['user']['so_dien_thoai'];
                    } else {
                        $name = '';
                        $diachi = '';
                        $email = '';
                        $phone = '';
                    }
                    ?>
                    <table>
                        <tr class="text_input">
                            <td class="input_title">Người đặt hàng</td>
                            <td><input type="text" name="name" class="input_second" value="<?= $name ?>"></td>
                        </tr>
                        <tr class="text_input">
                            <td class="input_title">Địa chỉ</td>
                            <td> <input type="text" name="diachi" class="input_second" value="<?= $diachi ?>"></td>
                        </tr>
                        <tr class="text_input">
                            <td class="input_title">Email</td>
                            <td><input type="email" name="email" class="input_second" value="<?= $email ?>"><br></td>

                        </tr>
                        <tr class="text_input">
                            <td>Điện thoại</td>
                            <td> <input type="text" name="phone" class="input_second" value="<?= $phone ?>"><br></td>
                        </tr>
                        <?= isset($thongbao) ? $thongbao : '' ?>
                    </table>
                    <input type="submit" value="Xác nhận" class="btn" name=dathang>
                </div>


                <div class="row_product">
                    <div class="title_row">PHƯƠNG THỨC THANH TOÁN</div>

                    <input type="radio" name="pttt" id="" checked>
                    <label for="pttt">Thanh toán khi nhận hàng</label>
                    <input type="radio" name="pttt" id="">
                    <label for="pttt">Chuyển khoản ngân hàng</label>
                    <input type="radio" name="pttt" id="">
                    <label for="pttt">Thanh toán online</label>
            </form>
        </div>

        <div class="row_product">
            <div class="title_row">THÔNG TIN GIỎ HÀNG</div>
            <table border="1" cellspacing="0">
                <?php viewCart(0); ?>
            </table>
        </div>
    </div>
    <div class="sidebar">
        <?php include './view/box_right.php'; ?>
    </div>

    </div>
</body>

</html>