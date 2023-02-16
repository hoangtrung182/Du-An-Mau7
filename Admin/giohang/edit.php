<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="./css/style.css">
</head>

<body>
    <section class="main">
        <h2>Form chỉnh sửa đơn hàng</h2>
        <form action="index.php?target=editListBill" method="post" enctype="multipart/form-data">

            <?php extract($items); ?>
            <div class="">
                <p>Mã đơn hàng</p>
                <input type="text" name="idbill" disabled="" placeholder="Không chỉnh sửa mã sản phẩm"
                    class="input_second">
            </div>
            <div class="">
                <p>Tên khách hàng</p>
                <input type="text" name="name" value="<?= $name ?>" class="input_second">
            </div>
            <div class="">
                <p>Email</p>
                <input type="email" name="email" value="<?= $email ?>" class="input_second">
            </div>
            <div class="">
                <p>Địa chỉ</p>
                <input type="text" name="diachi" value="<?= $dia_chi ?>" class="input_second">
            </div>
            <div class="">
                <p>Số điện thoại</p>
                <input type="number" name="phone" value="<?= $phone ?>" class="input_second">
            </div>

            <div class="">
                <p>Tình trạng đơn hàng</p>
                <!-- <input type="number" name="status" value="<?= $status ?>" class="input_second"> -->
                <input type="radio" name="status" id="" value=0>Đơn hàng mới
                <input type="radio" name="status" id="" value=1>Đang xử lý
                <input type="radio" name="status" id="" value=2>Đang giao hàng
                <input type="radio" name="status" id="" value=3>Đã giao hàng thành công
            </div>
            <div class="text_input">
                <p>Ngày nhập</p>
                <input type="datetime" name="date" class="input_second" value="<?= $ngay_nhap ?>">
            </div>

            <input type="hidden" name="idbill" value="<?= $idbill ?>">
            <input type="submit" value="Update" name="updatebill" class="btn input_submit">
            <input type="reset" value="Reset" class="btn input_reset">
            <a href="index.php?target=listbill">
                <input type="button" value="List Bill" class="btn">
            </a>
            </div>
            <?= isset($thongbao) ? $thongbao : '' ?>
        </form>
    </section>
</body>

</html>