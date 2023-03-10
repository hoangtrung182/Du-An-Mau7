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
include './model/thongke.php';


$listbody = select_items_body();
$load_nameitem = select_cate();
$list_top10 = select_product_top10();
$listtaikhoan = load_taikhoan();

if(!isset($_SESSION['mycart'])) {
	$_SESSION['mycart'] = [];
} 

// var_dump($_SESSION['mycart']);

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
				// $password_mahoa = password_hash($password, PASSWORD_BCRYPT);
				insert_khachhang($ten_kh, $email, $password);
				$thongbao = "Đã đăng ký thành công vui lòng đăng nhập tài khoản để sử dụng dịch vụ!";
			}
			include './taikhoan/dangky.php';
			break;
		case 'dangnhap':
			if (isset($_POST['dangnhap']) && $_POST['dangnhap']) {
				$gmailUser = $_POST['email'];
				$pass = $_POST['pass'];
				$check_user = check_khachhang($gmailUser, $pass);
				if (is_array($check_user))  {
					$_SESSION['user'] = $check_user;
					$thongbao = 'Đăng nhập thành công';
					header('location:index.php');
					// include './view/header.php';
				} else {
					$thongbao = 'Người dùng không tồn tại';
					include './view/body.php';
					//header('location:index.php');
				}
			}
			break;
		case 'updateUser':
			$listtaikhoan = load_taikhoan();
			include './taikhoan/edit.php';
			break;
		case 'editTk':
			include './taikhoan/edit.php';
			if (isset($_POST['editTk']) && $_POST['editTk']) {
				$id = $_POST['id'];
				$name = $_POST['name'];
				$email = $_POST['email'];
				// $password = $_POST['password'];
				$phone = $_POST['phone'];
				$diachi = $_POST['diachi'];
				// $role = $_POST['role'];

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

				update_Tk($id, $name, $email, $save_url, $phone, $diachi);	//bỏ password
				// $_SESSION['user'] = check_khachhang($email, $password);
				$thongbao = "Chỉnh sửa tài khoản thành công!";
				header('location:index.php');
				// include './view/body.php';	
			}
			break;
		case 'doimatkhau' :
			if(isset($_POST['doimatkhau']) && $_POST['doimatkhau']) {
				$id = $_POST['id'];
				$email = $_POST['email'];
				$oldpass = $_POST['oldpass'];
				$newpass = $_POST['newpass'];
				if($oldpass == $_SESSION['user']['password']) {
					$thongbaodung = 'Nhập đúng mật khẩu cũ';
					update_mk($id, $newpass);
					$_SESSION['user'] = check_khachhang($email, $newpass);
					$thongbao = "Đổi mật khẩu thành công!";
					header('location:index.php?target=exit');
				}else {
					$thongbaodung = "Nhập sai";
				}
				
			}
			include './taikhoan/doimatkhau.php';
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
		case 'exit':
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
			if (isset($_GET['id']) && ($_GET['id'] > 0)) {
				$item = loadOne_item($_GET['id']);
			}
			include './binhluan/list.php';
			break;
		case 'deleteBinhluan':
			if (isset($_GET['id']) && ($_GET['id'] > 0)) {
				delete_comment($_GET['id']);
				$thongbao_xoa = "Xóa thành công!";
			}

			$listBinhluan = select_comments();
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
			$listUsers = load_taikhoan();
			include './khachhang/list.php';
			break;
		case 'editUser': 
			if (isset($_GET['id']) && ($_GET['id'] > 0)) {
				$user = loadOne_user($_GET['id']);
			}
			include './khachhang/update.php';
			break;
		case 'manageUsers': 
			// include './taikhoan/edit.php';
			if (isset($_POST['editUser']) && $_POST['editUser']) {
				$id = $_POST['id'];
				$name = $_POST['name'];
				$email = $_POST['email'];
				$password = $_POST['pass'];
				$phone = $_POST['phone'];
				$diachi = $_POST['diachi'];
				$role = $_POST['role'];

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
				update_user($id, $name, $email, $password, $save_url, $phone, $diachi, $role);
				// $_SESSION['user'] = check_khachhang($email, $password);
				$thongbao = "Chỉnh sửa tài khoản thành công!";
				// header('location:index.php');
				$listUsers = load_taikhoan();
				include './khachhang/list.php';	
			}
			break;
		case 'deleteUser': 
			if (isset($_GET['id']) && ($_GET['id'] > 0)) {
				delete_user($_GET['id']);
				$thongbao_xoa = "Xóa user thành công !!";
			}

			$listUsers = load_taikhoan();
			include './khachhang/list.php';
			break;
		case 'addtoCart': 
			if(isset($_POST['addCart']) && ($_POST['addCart'])) {
				$id = $_POST['id'];
				$name = $_POST['name'];
				$img = $_POST['img'];
				$price = $_POST['price'];
				$soluong = 1;
				$thanhtien = $soluong * $price;

				$objCart = [$id, $name, $img, $price, $soluong, $thanhtien];
				array_push($_SESSION['mycart'], $objCart);
			}
			header('Location: index.php');
			// include './giohang/viewCart.php';
			break;
		case 'deleteC':
			if(isset($_GET['idCart'])) {
				array_splice($_SESSION['mycart'], $_GET['idCart'], 1);
			}else {
				$_SESSION['mycart'] = [];
			}
			header('Location: index.php?target=viewcart');
			break;
		case 'viewcart': 
			include './giohang/viewCart.php';
			break;
		case 'bill': 
			include './giohang/bill.php';
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
				$ngaydat = date('h:i:s d/m/Y');
				$tong_bill = tongBill();
				$pttt = $_POST['pttt'];

				$id_donhang = insert_bill($ma_khach_hang, $name, $email, $diachi, $phone, $ngaydat, $tong_bill, $pttt);
				//insert_into cart: với $_SESSION['cart'] và $id_donhang
				foreach ($_SESSION['mycart'] as $cart) {
					insert_cart($_SESSION['user']['ma_khach_hang'], $cart[1], $cart[2], $cart[3], $cart[4], $cart[5], $id_donhang);

				}
				// xóa ssi
				$_SESSION['mycart'] = [];
				$Bill = loadone_bill($id_donhang);
				$billct = loadone_cart($id_donhang);
			}

			include './giohang/billcomfim.php';
			break;
		case 'deleteAllcart' :
			$_SESSION['mycart'] = [];
			header('Location:index.php?target=viewcart');
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
		case 'mybill':
			$list_bill = loadall_bill('',$_SESSION['user']['ma_khach_hang']);
			// var_dump($_SESSION['user']['ma_khach_hang']);
			// die;
			include './giohang/mybill.php';
			break;
		case 'thongtin':
			include './view/about.php';
			break;
		case 'addtk':
			$listthongke = loadall_thongke();
			include './thongke/list.php';
			break;
		case 'bieudo':
			$listthongke = loadall_thongke();
			include './thongke/chart.php';
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