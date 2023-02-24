<div class="box">
    <span class="notify_success">
    <?= isset($thongbao) ? $thongbao : '' ?>
    </span>

    <?php
    if (!isset($_SESSION['user'])) {
        ?>

        <h3 class="login-title">Đăng Nhập</h3>
        <form action="index.php?target=dangnhap" method="post" class="form-login">
            <p class="login-name">Email đăng nhập</p>
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
        <p class="login-name">Xin chào, <?= $ten_khach_hang ?> !!</p>
        <p class="profile-title">Thông tin cá nhân</p>
        <ul class="profile-list">
            <!-- <li>Gmail:  <?= $email ?></li> -->
            <li>Số phone:   <?= $so_dien_thoai ?></li>
            <li>Địa chỉ: <?= $dia_chi ?></li>
            <li>
            <?php 
                if($vai_tro === 1) { ?>
                    Tư cách: Admin
               <?php } ?>                
            </li>
            <p>------------</p>   
        </ul>
        <p class="profile-title">Thông tin quản lý</p>
        <ul class="login-menu">
            <?php if ($vai_tro == 1) { ?>
                <li><a href="index.php?target=listUsers">Quản lý Admin</a></li>
                <li><a href="index.php?target=listCate">Quản lý Danh mục</a></li>
                <li><a href="index.php?target=listItems">Quản lý Hàng hóa</a></li>
                <li><a href="index.php?target=listbl">Quản lý Bình luận</a></li>
                <li><a href="index.php?target=addtk">Quản lý Thống kê</a></li>  
                <li><a href="index.php?target=Listbill">Thông tin đơn hàng</a></li>
            <?php } ?>
            <p>------------</p>
            <li><a href="index.php?target=doimatkhau">Đổi mật khẩu</a></li>
            <li><a href="index.php?target=editTk">Cập nhật tài khoản</a></li>
            <li><a href="index.php?target=exit">Đăng xuất</a></li>
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
   <!--  <div>
        <form action="index.php?target=product" method="post">
            <input type="text" name="keyw" placeholder="Nhập sản phẩm tìm kiếm..">
            <input type="submit" class="btn" value="Tìm kiếm" name=search>
        </form>
    </div> -->
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