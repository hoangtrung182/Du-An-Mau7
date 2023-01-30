<?php
	include 'header.php';
	include './model/pdo.php';
	
	if(isset($_GET['target'])) {
		$variable = $_GET['target'];
		switch ($variable) {
			case 'adddm':
				if(isset($_POST['addNewItem']) && $_POST['addNewItem']) {
					$ten_loai = $_POST['tenloai'];
					$sql = "INSERT INTO loaihang(ten_loai) VALUES ('$ten_loai')";
					pdo_execute($sql);
					$thongbao = "Thêm mới thành công!";
				}
				include './Danhmuc/add.php';
				break;
			case 'listitem' :
				$sql = "SELECT * FROM loaihang order by ten_loai";
				$listItem = pdo_query($sql);
				include './Danhmuc/list.php';
				break;
			case 'deleteitem' : 
				if(isset($_GET['id']) && ($_GET['id'] > 0)) {
					$sql = "DELETE FROM loaihang WHERE ma_loai =".$_GET['id'];
					pdo_execute($sql);
				}

				$sql = "SELECT * FROM loaihang order by ten_loai";
				$listItem = pdo_query($sql);
				include './Danhmuc/list.php';
				break;
			case 'edititem':
				include './Danhmuc/update.php';
				// include './Danhmuc/list.php';
				break;
			case 'suaitem': 
				if(isset($_POST['updateitem']) && $_POST['updateitem']) {
					$id = $_POST['id'];
					$ten_loai = $_POST['tenloai'];
					$sql = "UPDATE loaihang SET ten_loai ='".$ten_loai."' WHERE ma_loai =".$id;
					pdo_execute($sql);
					$thongbao = "Cập nhật thành công!";
				}
				$sql = "SELECT * FROM loaihang order by ten_loai";
				$listItem = pdo_query($sql);
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