<?php
	include 'header.php';
	include './model/pdo.php';
	include './model/danhmuc.php';
	include './model/hanghoa.php';
	
	if(isset($_GET['target'])) {
		$variable = $_GET['target'];
		switch ($variable) {
			case 'addCate':
				if(isset($_POST['addNewCate']) && $_POST['addNewCate']) {
					$ten_loai = $_POST['tenloai'];
					insert_cate($ten_loai);
					$thongbao = "Thêm mới danh mục thành công!";
				}
				include './Danhmuc/add.php';
				break;
			case 'listCate' :
				$listCates = select_cate();
				include './Danhmuc/list.php';
				break;
			case 'deleteCate' : 
				if(isset($_GET['id']) && ($_GET['id'] > 0)) {
					delete_cate($_GET['id']);
				}

				$listCates = select_cate();
				include './Danhmuc/list.php';
				break;
			case 'editCate': 
				if(isset($_GET['id']) && ($_GET['id'] > 0)) {
					$item = loadOne_cate($_GET['id']);
				}
				$item = $item;
				include './Danhmuc/update.php';
				break;
			case 'editedCate': 
				if(isset($_POST['updateCate']) && $_POST['updateCate']) {
					$id = $_POST['id'];
					$ten_loai = $_POST['tenloai'];
					update_cate($id, $ten_loai);
					$thongbao = "Cập nhật danh mục thành công!";
				}
				$listCates = select_cate();
				include './Danhmuc/list.php';
				break;
			case 'addItems':
				if(isset($_POST['addNewItem']) && $_POST['addNewItem']) {
					$ten_loai = $_POST['nameitem'];
					$gia = $_POST['priceitem'];
					$discount = $_POST['discountitem'];
					$mota = $_POST['descitem'];
					$view = $_POST['views'];
					$date = $_POST['date'];
					$ma_loai = $_POST['maloai'];

					$anh_dai_dien = isset($_FILES['imageitem']) ? $_FILES['imageitem'] : '';
					$save_url = '';
					if($anh_dai_dien['size'] > 0 && $anh_dai_dien['size'] < 500000) {
						$photo_folder = 'Image/';
						$photo_file = uniqid() . $anh_dai_dien['name'];

						$file_se_luu = $anh_dai_dien['tmp_name'];
						$url = $photo_folder . $photo_file;

						if(move_uploaded_file($file_se_luu, $url)) {
							$save_url = $url;
						}
					}

					insert_item($ten_loai, $gia, $discount, $save_url, $date, $mota, $view, $ma_loai); 
					$thongbao = "Thêm mới sản phẩm  thành công !";	
				}

				$listCates = select_cate();
				include './Product/add.php';
				break;
			case 'listItems' :
				$listItems = select_items();
				include './Product/list.php';
				break;
			case 'deleteItem' : 
				if(isset($_GET['id']) && ($_GET['id'] > 0)) {
					delete_item($_GET['id']);
				}

				$listItems = select_items();
				include './Product/list.php';
				break;
			case 'editItem': 
				if(isset($_GET['id']) && ($_GET['id']>0)) {
					$item = loadOne_item($_GET['id']);
				}
				$listCates = select_cate();
				include './Product/update.php';
				// include './Product/list.php';
				break;
			case 'editedItem': 
				if(isset($_POST['updateitem']) && $_POST['updateitem']) {
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
					if($anh_dai_dien['size'] > 0 && $anh_dai_dien['size'] < 500000) {
						$photo_folder = 'Image/';
						$photo_file = uniqid() . $anh_dai_dien['name'];

						$file_se_luu = $anh_dai_dien['tmp_name'];
						$url = $photo_folder . $photo_file;

						if(move_uploaded_file($file_se_luu, $url)) {
							$save_url = $url;
						}
					}
					update_item($id, $ten_loai, $gia, $discount, $save_url, $date, $mota, $view, $ma_loai);
					$thongbao = "Cập nhật sp thành công!";
				}
				$listItems = select_items();
				include './Product/list.php';
				break;
			default:
				include 'body.php';
				break;
		}
	}else {
		include 'body.php';
	}

	include 'footer.php';	
 ?>
