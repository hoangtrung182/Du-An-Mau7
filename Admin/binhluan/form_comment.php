<?php
include '../model/pdo.php';
include '../model/binhluan.php';
session_start();
$idpro = $_REQUEST['idpro'];

?>

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
    <div class="box">
        <h3>BÌNH LUẬN</h3>
        <?php
        echo "Bình luận:" . $idpro;
        ?>
        <br>
        <div>
            <form action="<?= $_SERVER['PHP_SELF'] ?>" method="post">
                <input type="text" name="idpro" hidden value="<?= $idpro ?>">
                <input type="text" name="mess" id="">
                <input type="submit" value="Gửi bình luận" name="btnComment">

            </form>
        </div>
        <?php
        if (isset($_POST['btnComment']) && $_POST['btnComment']) {
            $iddrop = $_POST['idpro'];
            $noi_dung = $_POST['mess'];
            $ma_khach_hang = $_SESSION['ten_khach_hang']['id'];
            $khoang_thoi_gian = date('h:i:sa d/m/Y');

            insert_comments($noi_dung, $ma_khach_hang, $idpro, $khoang_thoi_gian);
        }


        ?>
    </div>
</body>

</html>