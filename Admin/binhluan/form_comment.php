<?php
include '../model/pdo.php';
include '../model/binhluan.php';
include '../model/khachhang.php';
session_start();
$idpro = $_REQUEST['idpro'];
$list_bl = selectList_comments($idpro);

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
        <div class="binhluan">
            <table>
                <?php
                foreach ($list_bl as $bl) {
                    extract($bl);
                    echo '<tr><td> ' . $noi_dung . '</td>';
                    echo '<td> ' . $ma_khach_hang . '</td>';
                    echo '<td> ' . $khoang_thoi_gian . '</td></tr>';

                }
                ?>
            </table>
        </div>

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
            $ma_khach_hang = $_SESSION['user']['ma_khach_hang'];
            $khoang_thoi_gian = date('h:i:sa d/m/Y');

            insert_comments($noi_dung, $ma_khach_hang, $idpro, $khoang_thoi_gian);
            header("Location: " . $_SERVER['HTTP_REFERER']);
        }


        ?>
    </div>
</body>

</html>