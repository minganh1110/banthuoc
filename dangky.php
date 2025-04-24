<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Đăng ký</title>
	<style type="text/css">
		table.dangky tr td {
			padding: 5px;
		}
		body {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 600px;
            margin: 0;
        }
		.dangky-container {
			width: 600px;
			padding: 20px;
			border: 1px solid #ccc;
			border-radius: 5px;
			box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
		}

		.dangky-container h2 {
			text-align: center;
		}

		.dangky-container form {
			display: flex;
			flex-direction: column;
		}

		.dangky-container form input[type="text"],
		.dangky-container form input[type="password"],
		.dangky-container form input[type="submit"] {
			margin-bottom: 10px;
			padding: 10px;
			border: 1px solid #ccc;
			border-radius: 5px;
			outline: none;
		}

		.dangky-container form input[type="submit"] {
			background-color: #007bff;
			color: #fff;
			cursor: pointer;
		}

		.dangky-container form input[type="submit"]:hover {
			background-color: #0056b3;
		}
		.register-link {
			text-align: center;
			margin-top: 10px;
		}

		.register-link a {
			color: #007bff;
			text-decoration: none;
		}

		.register-link a:hover {
			text-decoration: underline;
		}
</style>
</head>
<body>
	<div class="dangky-container">
	<p><h1>Đăng ký thành viên</h1></p>
<form action="" method="POST">
<table class="dangky"  width="50%" style="border-collapse: collapse;">
	<tr>
		<td>Họ và tên</td>
		<td><input type="text" size="50" name="hovaten"></td>
	</tr>
    <tr>
		<td>Tài khoản</td>
		<td><input type="text" size="50" name="taikhoan"></td>
	</tr>
    <tr>
		<td>Mật khẩu</td>
		<td><input type="password" size="50" name="matkhau"></td>
	</tr>
    <tr>
		<td>Nhập lại mật khẩu</td>
		<td><input type="password" size="50" name="rematkhau"></td>
	</tr>
	<tr>
		<td>Giói Tính</td>
		<td><input name="gioitinh" type="radio" size="20" value="Nam" />Nam
		<input name="gioitinh" type="radio" size="20" value="Nữ" />Nữ
		<input name="gioitinh" type="radio" size="20" value="Khác" />Khác</td>
	</tr>
	<tr>
		<td>Điện thoại</td>
		<td><input type="text" size="50" name="dienthoai" ></td>
	</tr>
	<tr>
		<td>Địa chỉ</td>
		<td><textarea name="diachi" cols="50" rows="10"></textarea></td>
	</tr>
	
	<tr>
		
		<td><input type="submit" name="dangky" value="Đăng ký"></td>
		<td class="register-link"><a href="dangnhap.php">Đăng nhập nếu có tài khoản</a></td>
		<td class="register-link"><a href="index.php">Về trang chủ</a></td>
	</tr>
</table>
</form>
	</div>
</body>
</html>

<div>
<?php
session_start(); // Bắt đầu phiên làm việc
$severname="localhost";
$username="root";
$password="";
$database="banthuoc";

$khoitao= new mysqli($severname,$username,$password,$database);
if(mysqli_connect_errno()){
	echo "loi ket noi".mysqli_connect_error();
	exit();
}

	if(isset($_POST['dangky'])) {
		$tenkhachhang = $_POST['hovaten'];
		$taikhoan= $_POST['taikhoan'];
        $matkhau = md5($_POST['matkhau']);
        $rematkhau=  md5($_POST['rematkhau']);
		$gioitinh = $_POST['gioitinh'];
		$dienthoai = $_POST['dienthoai'];
		$diachi = $_POST['diachi'];
		if (!$tenkhachhang || !$taikhoan || !$matkhau || !$rematkhau || !$gioitinh || !$dienthoai || !$diachi)
		{
			echo '<script>
					alert("Vui lòng nhập đầy đủ thông tin.");
				  </script>';
			
		}elseif($matkhau!=$rematkhau){
			echo '<script>
					alert("mật khẩu không trùng khóp");
				  </script>';

		}
		else{	
			$sql_dangky = "INSERT INTO KhachHang(Ten_KH,taikhoan,matkhau,GT_KH,SDT_KH,DC_KH) VALUE('".$tenkhachhang."','".$taikhoan."','".$matkhau."','".$gioitinh."','".$dienthoai."','".$diachi."')";
			$query_dangky=mysqli_query($khoitao,$sql_dangky);
			if($query_dangky){
				echo '<script>
						alert("Bạn đã đăng ký thành công.");
				 	 </script>';
				$_SESSION['dangky'] = $taikhoan;
				$_SESSION['hovaten'] = $tenkhachhang;
				$_SESSION['Ma_KH'] = mysqli_insert_id($khoitao);
				
				}
			}
		}
			
?>
</div>