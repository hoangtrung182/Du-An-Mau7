<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thống Kê</title>
</head>

<body>

    <h2>Danh sách loại hàng</h2>
    <table border="1" cellspacing="0">
        <tr class="row">
            <!-- <th class="type"></th> -->
            <th class="type">Mã loại hàng</th>
            <th class="type">Tên loại hàng</th>
            <th class="type">Số lượng</th>
            <th class="type">Giá cao nhất</th>
            <th class="type">Giá thấp nhất</th>
            <th class="type">Giá trung bình</th>

        </tr>

        <?php
        foreach ($listthongke as $thongke) {
            extract($thongke);
            echo '
            <tr class="row1">
            <!-- <td><input type="checkbox" name=""></td> -->
            <td>
                ' . $malh . '
            </td>
            <td>
                ' . $ten_loai . '
            </td>
            <td>
                ' . $countsp . '
            </td>
            <td>
                ' . $maxprice . '
            </td>
            <td>
                ' . $minprice . '
            </td>
            <td>
                ' . $avgprice . '
            </td>

        </tr>';
        }
        ?>



    </table>
    <div class="mb10">
        <a href="index.php?target=bieudo"><input type="button" value="Xem biểu đồ"></a>
    </div>
</body>

</html>