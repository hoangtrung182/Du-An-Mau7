<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/style.css">

</head>


<body>
    <div class="body_main">
        <div class="left">
            <div class="row_product">
                <?php
                foreach ($list_dm as $hanghoa) {
                    extract($hanghoa); ?>
                    <div class="box">
                        <div class="title_row">
                            <span class="title_product">
                                <?= $ten_dm ?>
                            </span>
                        </div>
                        <div class="img_product">
                            <a href="./index.php?target=product_ct&id=<?= $ma_hanghoa ?> ">
                                <img class="img_products" src="<?= $hinh ?>" alt="">
                            </a>
                        </div>
                        <div class="main-info">
                            <span class="main-price">
                                <?= $don_gia ?>VND
                            </span>

                            <h3 class="main-title">
                                <a href="./index.php?target=product_ct&id=<?= $ma_hanghoa ?> ">
                                    <?= $ten_hanghoa ?>
                                </a>
                            </h3>

                        </div>
                    </div>
                <?php } ?>

            </div>




        </div>

        <div class="right">
            <div class="box">
                <h3>TÀI KHOẢN</h3>

            </div>
            <div class="box">
                <h3>DANH MỤC</h3>
                <?php
                foreach ($load_nameitem as $products) {
                    extract($products);
                    $link_product = "index.php?target=product&id=" . $ma_loai;
                    echo '<li><a href="' . $link_product . '">' . $ten_loai . '</li>';
                }
                ?>

            </div>
            <div class="box">
                <div>
                    <?php

                    foreach ($list_top10 as $hanghoa) {
                        extract($hanghoa); ?>
                        <div class="box1">

                            <div class="">
                                <a href="./index.php?target=product_ct&id=<?= $ma_hanghoa ?> ">
                                    <img class="img_top" src="<?= $hinh ?>" alt="">
                                </a>
                            </div>
                            <div class="main-info">


                                <h3 class="main-title">
                                    <a href="./index.php?target=product_ct&id=<?= $ma_hanghoa ?> ">
                                        <?= $ten_hanghoa ?>
                                    </a>
                                </h3>

                            </div>
                        </div>
                    <?php } ?>
                </div>
            </div>
        </div>

    </div>
</body>

</html>