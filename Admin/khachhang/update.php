
<body>
    <section class="main">
        <h2>Form chỉnh sửa tài khoản</h2>
        <?php
        if (isset($_SESSION['user']) && is_array($_SESSION['user'])) {
            extract($_SESSION['user']);
        }
            extract($user);
        ?>
        <form action="index.php?target=manageUsers" method="post" enctype="multipart/form-data">

            <div class="text_input">
                <p class="input_title">Tên khách hàng</p>
                <input type="text" name="name"  class="input_second" value="<?= $ten_khach_hang ?>">
            </div>
            <div class="text_input">
                <p class="input_title">Email</p>
                <input type="email" name="email" class="input_second" value="<?= $email ?>"><br>
            </div>
            <div class="text_input">
                <p>Password</p>
                <input type="password" name="pass" class="input_second" value="<?= $password ?>"><br>
            </div>
            <div class="text_input">
                <p>Avatar</p>
                <input type="file" name="hinh" class="input_second" value="<?= $avatar ?>"><br>
            </div>
            <div class="text_input">
                <p>Số điện thoại</p>
                <input type="text" name="phone" class="input_second" value="<?= $so_dien_thoai ?>"><br>
            </div>
            <div class="text_input">
                <p>Địa chỉ</p>
                <input type="text" name="diachi" class="input_second" value="<?= $dia_chi ?>"><br>
            </div>
            <div class="text_input">
                <p>Vai trò</p>
                <input type="text" name="role" class="input_second" value="<?= $vai_tro ?>"><br>
            </div>
            <div class="button">
                <input type="hidden" name="id" value="<?= $ma_khach_hang ?>">
                <input type="submit" value="Cập nhật" name="editUser" class="input_button btn">
                <input type="reset" class="btn" value="Nhập lại">
                <button class="btn"><a class="btn" href="index.php?target=exit">Tiếp tục</a></button>
            </div>
            <span style="color:red;">
                <?= isset($thongbao) ? $thongbao : '' ?>
            </span>
        </form>
    </section>
</body>