<?php
	include 'header.php';
	include './model/pdo.php';
	include './model/danhmuc.php';
	
	if(isset($_GET['target'])) {
		$variable = $_GET['target'];
		switch ($variable) {
			case 'adddm':
				if(isset($_POST['addNewItem']) && $_POST['addNewItem']) {
					$ten_loai = $_POST['tenloai'];
					insert($ten_loai);
					$thongbao = "Thêm mới thành công!";
				}
				include './Danhmuc/add.php';
				break;
			case 'listitem' :
				$listItem = select();
				include './Danhmuc/list.php';
				break;
			case 'deleteitem' : 
				if(isset($_GET['id']) && ($_GET['id'] > 0)) {
					delete($_GET['id']);
				}

				$sql = "SELECT * FROM loaihang order by ten_loai";
				$listItem = pdo_query($sql);
				include './Danhmuc/list.php';
				break;
			case 'edititem': 
				if(isset($_GET['id']) && ($_GET['id']>0)) {
					$item = loadOne($_GET['id']);
				}
				include './Danhmuc/update.php';
				// include './Danhmuc/list.php';
				break;
			case 'suaitem': 
				if(isset($_POST['updateitem']) && $_POST['updateitem']) {
					$id = $_POST['id'];
					$ten_loai = $_POST['tenloai'];
					update($id, $ten_loai);
					$thongbao = "Cập nhật thành công!";
				}
				$listItem = select();
				include './Danhmuc/list.php';
				break;
			case 'addhh':
				include './Product/add.php';
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
