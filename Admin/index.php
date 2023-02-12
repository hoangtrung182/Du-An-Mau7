<?php
include 'view/header.php';
include './model/pdo.php';
include './model/danhmuc.php';
include './model/hanghoa.php';
$listCates = select_cate();

include './view/product.php';
if (isset($_GET['target'])) {
	$variable = $_GET['target'];
	switch ($variable) {
		case 'product':
			if (isset($_GET['iddm']) && ($_GET['iddm'] > 0)) {
				$iddm = $_GET['iddm'];
				$list_product = select_items_search("", $iddm);

				$name_dm = loadname_item($iddm);
			}

			include './view/product.php';
			break;
		case 'product_ct':
			if (isset($_GET['id']) && ($_GET['id'] > 0)) {
				$id = $_GET['id'];

				$item = loadOne_item($_GET['id']);
				extract($item);
				$items = load_products($id, $ma_loai);
			}

			include './view/product_ct.php';
			break;
		case 'addmoveCate':
			include './Danhmuc/add.php';
			break;
		case 'addCate':
			if (isset($_POST['addNewCate']) && $_POST['addNewCate']) {
				$ten_loai = $_POST['tenloai'];
				insert_cate($ten_loai);
				$thongbao = "Thêm mới danh mục thành công!";
			}
			$listCates = select_cate();
			include './Danhmuc/list.php';
			break;
		case 'listCate':
			$listCates = select_cate();
			include './Danhmuc/list.php';
			break;

		case 'deleteCate':
			if (isset($_GET['id']) && ($_GET['id'] > 0)) {
				delete_cate($_GET['id']);
				$thongbao_xoa = "Xóa thành công !!";
			}

			$listCates = select_cate();
			include './Danhmuc/list.php';
			break;
		case 'editCate':
			if (isset($_GET['id']) && ($_GET['id'] > 0)) {
				$item = loadOne_cate($_GET['id']);
			}

			include './Danhmuc/update.php';
			break;
		case 'editedCate':
			if (isset($_POST['updateCate']) && $_POST['updateCate']) {
				$id = $_POST['id'];
				$ten_loai = $_POST['tenloai'];
				update_cate($id, $ten_loai);
				$thongbao = "Cập nhật danh mục thành công!";
			}
			$listCates = select_cate();
			include './Danhmuc/list.php';
			break;

		case 'addmoveItems':
			$listCates = select_cate();
			include './Product/add.php';
			break;
		case 'addItems':
			if (isset($_POST['addNewItem']) && $_POST['addNewItem']) {
				$ten_loai = $_POST['nameitem'];
				$gia = $_POST['priceitem'];
				$discount = $_POST['discountitem'];
				$mota = $_POST['descitem'];
				$view = $_POST['views'];
				$date = $_POST['date'];
				$ma_loai = $_POST['maloai'];

				// if($_POST['nameitem']==null){
				// 	$thongbao1 = "Vui lòng nhập tên sản phẩm !";	
				// }
				// if($_POST['priceitem']==null || $_POST['priceitem']<0){
				// 	$thongbao2 = "Vui lòng nhập giá sản phẩm là số dương !";	
				// }
				// if($_POST['discountitem']==null || $_POST['discountitem']<0){
				// 	$thongbao3 = "Vui lòng nhập giá sale sản phẩm là số dương !";	
				// }
				// if($_POST['date']==null){
				// 	$thongbao4 = "Vui lòng nhập ngày nhập sản phẩm !";	
				// }
				// if($_POST['descitem']==null){
				// 	$thongbao5 = "Vui lòng nhập mô tả sản phẩm !";	
				// }
				// if($_POST['views']==null || $_POST['views']<0){
				// 	$thongbao6 = "Vui lòng nhập số lượt xem là số dương sản phẩm !";	
				// }

				$anh_dai_dien = isset($_FILES['imageitem']) ? $_FILES['imageitem'] : '';
				$save_url = '';
				if ($anh_dai_dien['size'] > 0 && $anh_dai_dien['size'] < 500000) {
					$photo_folder = 'Image/';
					$photo_file = uniqid() . $anh_dai_dien['name'];

					$file_se_luu = $anh_dai_dien['tmp_name'];
					$url = $photo_folder . $photo_file;

					if (move_uploaded_file($file_se_luu, $url)) {
						$save_url = $url;
					}
				}
				//if($ten_loai && $gia >0 && $discount >0 && $mota && $view >0 && $date){
				insert_item($ten_loai, $gia, $discount, $save_url, $date, $mota, $view, $ma_loai);
				$thongbao = "Thêm mới sản phẩm  thành công !";

				//}
			}

			$listItems = select_items();

			include './Product/list.php';
			break;
		case 'listItems':
			if (isset($_POST['listok']) && $_POST['listok']) {
				$keyw = $_POST['keyw'];
				$ma_loai = $_POST['maloai'];
			} else {
				$keyw = "";
				$ma_loai = 0;
			}
			$listCates = select_cate();
			$listItems = select_items_search($keyw, $ma_loai);
			include './Product/list.php';
			break;
		case 'deleteItem':
			if (isset($_GET['id']) && ($_GET['id'] > 0)) {
				delete_item($_GET['id']);
				$thongbao_delete = "Xóa thành công !!";
			}

			$listItems = select_items();
			include './Product/list.php';
			break;
		case 'editItem':
			if (isset($_GET['id']) && ($_GET['id'] > 0)) {
				$item = loadOne_item($_GET['id']);

			}
			$listCates = select_cate();
			include './Product/update.php';
			// include './Product/list.php';
			break;
		case 'editedItem':
			if (isset($_POST['updateitem']) && $_POST['updateitem']) {
				$id = $_POST['id'];
				$ten_loai = $_POST['nameitem'];
				$gia = $_POST['priceitem'];
				$discount = $_POST['discountitem'];
				$mota = $_POST['descitem'];
				$view = $_POST['views'];
				$date = $_POST['date'];
				$ma_loai = $_POST['maloai'];

				$anh_dai_dien = isset($_FILES['imageitem']) ? $_FILES['imageitem'] : '';
				$save_url = '';
				if ($anh_dai_dien['size'] > 0 && $anh_dai_dien['size'] < 500000) {
					$photo_folder = 'Image/';
					$photo_file = uniqid() . $anh_dai_dien['name'];

					$file_se_luu = $anh_dai_dien['tmp_name'];
					$url = $photo_folder . $photo_file;

					if (move_uploaded_file($file_se_luu, $url)) {
						$save_url = $url;
					}
				}
				update_item($id, $ten_loai, $gia, $discount, $save_url, $date, $mota, $view, $ma_loai);
				$thongbao_update = "Cập nhật sp thành công!";
			}
			$listItems = select_items();
			include './Product/list.php';
			break;
		default:
			// $listItems = select_items();
			include 'body.php';
			break;
	}
} else {
	$listbody = select_items_body();
	include './view/body.php';
	//break;
}
include './view/footer.php';
?>