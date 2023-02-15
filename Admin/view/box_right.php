<span class="notify_success">
    <?= isset($thongbao) ? $thongbao : '' ?>
</span>

<div class="box">
    <?php
    if (!isset($_SESSION['user'])) {
        ?>

        <h3 class="login-title">Đăng Nhập</h3>
        <form action="index.php?target=dangnhap" method="post" class="form-login">
            <p class="login-name">Tên đăng nhập</p>
            <input type="text" name="email" placeholder="Nhập tên tài khoản..">
            <p class="login-pwd">Mật khẩu</p>
            <input type="password" name="pass" placeholder="Nhập mật khẩu.."> <br>
            <input type="checkbox" name="checkbox" id="">Ghi nhớ tài khoản<br>
            <input type="submit" class="btn" value="Đăng nhập" name="dangnhap"> <br>
        </form>
        <ul class="login-menu">
            <li><a href="index.php?target=quenMk">Quên mật khẩu</a></li>
            <li><a href="index.php?target=dangky">Đăng ký thành viên</a></li>
        </ul>

    <?php } else {
        extract($_SESSION['user']);
         ?>
        <p class="login-name">Hi, <?= $ten_khach_hang ?> !!</p>
        <p class="profile-title">Your Profile</p>
        <ul class="profile-list">
            <li>Gmail: <?= $email ?></li>
            <li>Tele: <?= $so_dien_thoai ?></li>
            <li>Address: <?= $dia_chi ?></li>
            <li>Role: <?= $vai_tro ?></li>
        </ul>
        <ul class="login-menu">
            <li><a href="index.php?target=quenMk">Quên mật khẩu</a></li>
            <?php if ($vai_tro == 1) { ?>
                <li><a href="index.php?target=listUsers">Đăng nhập Admin</a></li>

            <?php } ?>

            <li><a href="index.php?target=editUser">Cập nhật tài khoản</a></li>
            <li><a href="index.php?target=exit">Thoát</a></li>
        </ul>
    <?php } ?>
</div>
<div class="box">
    <h3 class="cate-title">DANH MỤC</h3>

    <ul class="cate-menu">
        <?php
        foreach ($load_nameitem as $products) {
            extract($products); ?>
            <li>
                <a href="index.php?target=product&id=<?= $ma_loai ?>"><?= $ten_loai ?></a>
            </li>
        <?php } ?>
    </ul>
    <div>
        <form action="index.php?target=product" method="post">
            <input type="text" name="keyw" placeholder="Nhập sản phẩm tìm kiếm..">
            <input type="submit" class="btn" value="Tìm kiếm" name=search>
        </form>
    </div>
</div>
<div class="box">
    <h3 class="top-title">TOP YÊU THÍCH</h3>
    <div>
        <?php
        foreach ($list_top10 as $hanghoa) {
            extract($hanghoa); ?>
            <div class="box1">
                <div class="top-image">
                    <a href="./index.php?target=product_ct&id=<?= $ma_hanghoa ?> ">
                        <img src="<?= $hinh ?>" alt="">
                    </a>
                </div>
                <div class="main-info">
                    <h3 class="top-item_title">
                        <a href="./index.php?target=product_ct&id=<?= $ma_hanghoa ?> ">
                            <?= $ten_hanghoa ?>
                        </a>
                    </h3>
                </div>
            </div>
        <?php } ?>
    </div>
</div>