<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gio Hang</title>
    <link rel="stylesheet" href="./css/style.css">
</head>

<body>
    <div class="body_main">
        <div class="main-content">
            <h2>Giỏ hàng</h2>

            <?php

            $thongbao = isset($thongbao) ? $thongbao : '';
            $thongbao_xoa = isset($thongbao_delete) ? $thongbao_delete : '';
            $thongbao_sua = isset($thongbao_update) ? $thongbao_update : '';
            ?>
            <p class=""><?= $thongbao ?></p>
            <p class=""><?= $thongbao_xoa ?></p>
            <p class=""><?= $thongbao_sua ?></p>

            <table class="table" cellspacing="0">
                <?php
                     viewCart(1);
                ?>
            </table>
            <div class="cart_wrapperOption">
                <form action="index.php?target=bill" method="post">
                    <a href="" class="">
                        <input type="submit" value="Đồng ý đặt hàng" name="dathang" class="btn_cart">
                    </a>
                </form>

                <a href="index.php?target=deleteAllcart">
                    <input type="button" value="Xóa giỏ hàng" name="deleteAll" class="btn_cart">
                </a>
                <div>
                    <a href="index.php">
                        <input type="button" value="Tiếp tục mua hàng" class="btn_cart">
                    </a>
                </div>
            </div>
        </div>

        <div class="sidebar">
            <?php include './view/box_right.php'; ?>
        </div>
    </div>
</body>
</html>