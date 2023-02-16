<?php
session_start();
include './view/header.php';
include './model/pdo.php';
include './model/danhmuc.php';
include './model/hanghoa.php';
include './model/binhluan.php';
include './model/khachhang.php';
include './model/taikhoan.php';
include './model/cart.php';

if (!isset($_SESSION['cart'])) {

	$_SESSION['cart'] = [];
}

$listbody = select_items_body();
$load_nameitem = select_cate();
$list_top10 = select_product_top10();
$listtaikhoan = load_taikhoan();

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
		case 'dangky':
			if (isset($_POST['dangky']) && $_POST['dangky']) {
				$ten_kh = $_POST['name'];
				$email = $_POST['email'];
				$password = $_POST['password'];
				//$password_mahoa = password_hash($password, PASSWORD_BCRYPT);
				insert_khachhang($ten_kh, $email, $password);
				$thongbao = "Đã đăng ký thành công vui lòng đăng nhập tài khoản để sử dụng dịch vụ!";
			}
			include './taikhoan/dangky.php';
			break;
		case 'dangnhap':

			if (isset($_POST['dangnhap']) && $_POST['dangnhap']) {
				$ten_kh = $_POST['name'];
				$pass = $_POST['pass'];
				$check_user = check_khachhang($ten_kh, $pass);
				if (is_array($check_user)) {
					$_SESSION['user'] = $check_user;
					header('location:index.php');
					//$thongbao = 'Đăng nhập thành công';
					//include './view/body.php';
				} else {
					$thongbao = 'Người dùng không tồn tại';
					include './view/body.php';
					//header('location:index.php');
				}
			}
			include './taikhoan/dangky.php';
			break;
		case 'editTk':
			if (isset($_POST['editTk']) && $_POST['editTk']) {
				$id = $_POST['id'];
				$name = $_POST['name'];
				$email = $_POST['email'];
				$password = $_POST['password'];
				$phone = $_POST['phone'];
				$diachi = $_POST['diachi'];

				$anh_dai_dien = isset($_FILES['hinh']) ? $_FILES['hinh'] : '';
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

				update_Tk($id, $name, $email, $password, $save_url, $phone, $diachi);
				$_SESSION['user'] = check_khachhang($name, $password);
				$thongbao = "Chỉnh sửa tài khoản thành công!";
			}
			$listtaikhoan = load_taikhoan();
			//include './khachhang/list.php';
			include './taikhoan/edit.php';
			break;
		case 'quenMk':
			if (isset($_POST['quenMk']) && $_POST['quenMk']) {
				$email = $_POST['email'];

				$check_email = check_Mk($email);
				if (is_array($check_email)) {
					$thongbao = "Mật khẩu của bạn là: " . $check_email['password'];
				} else {
					$thongbao = "Email không tồn tại!";
				}
			}
			include './taikhoan/quenMk.php';
			break;
		case 'thoat':
			session_unset();
			header('location:index.php');
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
		case 'addkh':
			$listtaikhoan = load_taikhoan();
			include './khachhang/list.php';
			break;
		case 'addtoCart':
			if (isset($_POST['addCart']) && $_POST['addCart']) {
				$id = $_POST['id'];
				$name = $_POST['name'];
				$img = $_POST['img'];
				$price = $_POST['price'];
				$soluong = 1;
				$thanhtien = $price * $soluong;
				$sppAdd = array($id, $name, $img, $price, $soluong, $thanhtien);
				array_push($_SESSION['cart'], $sppAdd);

			}

			include './giohang/viewCart.php';
			break;
		case 'delete':
			if (isset($_GET['id'])) {
				var_dump($_GET['id']);
				array_slice($_SESSION['cart'], $_GET['id'], 1);

			}

			header("Location:index.php?target=viewcart");
			break;

		case 'viewcart':
			include './giohang/viewCart.php';
			break;
		case 'deleteAllcart':
			//if (isset($_GET['deleteAll']) && $_GET['deleteAll']) {
			$_SESSION['cart'] = [];

			//}
			header("Location:index.php?target=viewcart");
			break;
		case 'bill':
			include './giohang/bill.php';
			break;
		case 'Listbill':
			if (isset($_POST['keyw']) && $_POST['keyw'] != "") {
				$keyw = $_POST['keyw'];
			} else {
				$keyw = "";
			}
			$listBill = loadall_bill($keyw, 0);
			include './giohang/Listbill.php';
			break;
		case 'deleteListBill':
			if (isset($_GET['id']) && ($_GET['id'] > 0)) {
				delete_bill($_GET['id']);
				delete_bills($_GET['id']);
				$thongbao_xoa = "Xóa thành công !!";
			}

			$listBill = loadall_bill('', $_GET['id']);
			//include './giohang/Listbill.php';
			header("Location:index.php?target=Listbill");
			break;
		case 'editBill':
			if (isset($_GET['id']) && ($_GET['id'] > 0)) {
				$item = loadone_bill($_GET['id']);
			}
			$items = $item;

			//$listBill = loadall_bill('', $_GET['id']);
			include './giohang/edit.php';
			// include './Product/list.php';
			break;
		case 'editListBill':
			if (isset($_POST['updatebill']) && $_POST['updatebill']) {
				$id = $_POST['idbill'];
				$name = $_POST['name'];
				$email = $_POST['email'];
				$diachi = $_POST['diachi'];
				$phone = $_POST['phone'];
				$status = $_POST['status'];
				$date = $_POST['date'];
				update_bill($id, $name, $email, $diachi, $phone, $status, $date);
				$thongbao = "Cập nhật dơn hàng thành công!";
				$listBill = loadall_bill('', $_POST['idbill']);
			}
			header("Location:index.php?target=Listbill");
			break;
		case 'mybill':
			$list_bill = loadall_bill($_SESSION['user']['ma_khach_hang']);
			include './giohang/mybill.php';
			break;
		case 'billcomfim':
			if (isset($_POST['dathang']) && $_POST['dathang']) {
				if (isset($_SESSION['user'])) {
					$ma_khach_hang = $_SESSION['user']['ma_khach_hang'];
				} else {
					$ma_khach_hang = 0;
				}
				$name = $_POST['name'];
				$diachi = $_POST['diachi'];
				$email = $_POST['email'];
				$phone = $_POST['phone'];
				$ngaydat = date('h:i:sa d/m/Y');
				$tong_bill = tongBill();
				$pttt = $_POST['pttt'];

				$id_donhang = insert_bill($ma_khach_hang, $name, $email, $diachi, $phone, $ngaydat, $tong_bill, $pttt);
				//insert_into cart: với $_SESSION['cart'] và $id_donhang
				foreach ($_SESSION['cart'] as $cart) {
					insert_cart($_SESSION['user']['ma_khach_hang'], $cart[1], $cart[2], $cart[3], $cart[4], $cart[5], $id_donhang);

				}
				// xóa ssi
				$_SESSION['cart'] = [];
				$Bill = loadone_bill($id_donhang);
				$billct = loadone_cart($id_donhang);
			}

			include './giohang/billcomfim.php';
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

				insert_item($ten_loai, $gia, $discount, $save_url, $date, $mota, $view, $ma_loai);
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
		case 'listUsers':
			include './khachhang/list.php';
			break;
		default:
			// $listItems = select_items();
			//include './view/body.php';
			break;
	}
} else {
	$listCates = select_cate();
	$listItems = select_items();
	include './view/body.php';
	// break;
}
include './view/footer.php';