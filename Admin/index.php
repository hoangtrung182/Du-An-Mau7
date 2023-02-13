<?php
include './view/header.php';
include './model/pdo.php';
include './model/danhmuc.php';
include './model/hanghoa.php';
include './model/binhluan.php';


$listbody = select_items_body();
$load_nameitem = select_cate();
$list_top10 = select_product_top10();

if (isset($_GET['target'])) {
	$variable = $_GET['target'];
	switch ($variable) {
		case 'product':
			if (isset($_POST['keyw']) && $_POST['keyw'] != "") {
				$keyw = $_POST['keyw'];
			} else {
				$keyw = " ";
			}
			if (isset($_GET['id']) && $_GET['id'] > 0) {
				$id = $_GET['id'];
			} else {
				$id = 0;
			}
			$list_dm = select_items_search($keyw, $id);
			$ten_dm = loadname_item($id);
			include './view/product.php';
			break;
		case 'product_ct':
			if (isset($_GET['id']) && $_GET['id'] > 0) {
				$item = loadOne_item($_GET['id']);
				extract($item);
				$getItem = load_products($_GET['id'], $ma_loai);
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
			//$item = $item;
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

				insert_item($ten_loai, $gia, $discount, $save_url, $mota, $view, $ma_loai, $date);
				$thongbao = "Thêm mới sản phẩm  thành công !";
			}

			$listItems = select_items();
			include './Product/list.php';
			break;
		case 'listItems':
			if (isset($_POST['listok']) && $_POST['listok']) {
				$keyw = $_POST['keyw'];
				$iddm = $_POST['maloai'];
			} else {
				$keyw = "";
				$iddm = 0;
			}
			$listCates = select_cate();
			$listItems = select_items_search($keyw, $iddm);


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

		case 'listbl':
			$listBinhluan = select_comments();
			include './binhluan/list.php';
			break;

		case 'deleteBinhluan':
			if (isset($_GET['id']) && ($_GET['id'] > 0)) {
				delete_comment($_GET['id']);
				$thongbao_xoa = "Xóa thành công!";
			}

			$listComment = select_comments();
			include './binhluan/list.php';
			break;
		case 'editBinhluan':
			if (isset($_GET['id']) && ($_GET['id'] > 0)) {
				$comment = loadOne_comment($_GET['id']);
			}
			//$comment = $comment;
			include './binhluan/update.php';
			break;
		case 'editedBinhluan':
			if (isset($_POST['updateComment']) && $_POST['updateComment']) {
				$id = $_POST['id'];
				$ma_binh_luan = $_POST['mabinhluan'];
				$noi_dung = $_POST['content'];
				$ma_khach_hang = $_POST['idUser'];
				$ma_hang_hoa = $_POST['idCate'];
				$khoang_thoi_gian = $_POST['time'];
				update_comment($id, $noi_dung, $khoang_thoi_gian);
				$thongbao = "Cập nhật danh mục thành công!";
			}
			$listBinhluan = select_comments();
			include './binhluan/list.php';
			break;
		default:
			// $listItems = select_items();
			include './view/body.php';
			break;
	}
} else {
	$listCates = select_cate();
	$listItems = select_items();
	include './view/body.php';
	// break;
}
include './view/footer.php';