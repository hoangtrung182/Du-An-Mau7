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
        <h2>Form lấy lại mật khẩu</h2>
        <form action="index.php?target=quenMk" method="post" enctype="multipart/form-data">


            <div class="text_input">
                <p class="input_title">Email</p>
                <input type="email" name="email" class="input_second"><br>

            </div>


            <div class="button">
                <input type="submit" value="Gửi" name="quenMk" class="input_button btn">
                <input type="reset" value="Nhập lại">


            </div>
            <span style="color:red;">
                <?= isset($thongbao) ? $thongbao : '' ?>
            </span>
        </form>
    </section>
</body>

</html>