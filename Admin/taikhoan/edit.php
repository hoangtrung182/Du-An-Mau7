<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thêm sản phẩm mới</title>
    <link rel="stylesheet" href="css/style.css">
</head>

<body>
    <section class="main">
        <h2>Form chỉnh sửa tài khoản</h2>
        <?php
        if (isset($_SESSION['user']) && is_array($_SESSION['user'])) {
            extract($_SESSION['user']);
        }
        ?>
        <form action="index.php?target=editTk" method="post" enctype="multipart/form-data">

            <div class="text_input">
                <p class="input_title">Tên khách hàng</p>
                <input type="text" name="name" class="input_second" value="<?= $ten_khach_hang ?>">
            </div>
            <div class="text_input">
                <p class="input_title">Email</p>
                <input type="email" name="email" class="input_second" value="<?= $email ?>"><br>

            </div>
            <div class="text_input">
                <p>Password</p>
                <input type="password" name="password" class="input_second" value="<?= $password ?>"><br>

            </div>
            <div class="text_input">
                <p>Hình ảnh</p>
                <input type="file" name="hinh" class="input_second"><br>

            </div>
            <div class="text_input">
                <p>Số điện thoại</p>
                <input type="number" name="phone" class="input_second" value="<?= $so_dien_thoai ?>"><br>

            </div>
            <div class="text_input">
                <p>Địa chỉ</p>
                <input type="text" name="diachi" class="input_second" value="<?= $dia_chi ?>"><br>

            </div>


            <div class="button">
                <input type="hidden" name="id" value="<?= $ma_khach_hang ?>">
                <input type="submit" value="Cập nhật" name="editTk" class="input_button btn">
                <input type="reset" value="Nhập lại">


            </div>
            <span style="color:red;">
                <?= isset($thongbao) ? $thongbao : '' ?>
            </span>
        </form>
    </section>
</body>

</html>