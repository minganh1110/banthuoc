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
	if(isset($_POST['dangnhap'])){
		$taikhoan = $_POST['taikhoan'];
		$matkhau = md5($_POST['password']);
        $mkadmin = $_POST['password'];
		$sql = "SELECT * FROM KhachHang ,tbl_user WHERE KhachHang.taikhoan='".$taikhoan."' AND KhachHang.matkhau='".$matkhau."' LIMIT 1";
		$row = mysqli_query($khoitao,$sql);
		$count = mysqli_num_rows($row);
		if($count>0){
			$row_data = mysqli_fetch_array($row);
			$_SESSION['dangky'] = $row_data['taikhoan'];
			$_SESSION['matkhau'] = $row_data['matkhau'];
            $_SESSION['Ma_KH']= $row_data['Ma_KH'];
			header("Location:index.php");
		}elseif($taikhoan == 'admin'){
            $sql_admin = "SELECT * FROM tbl_user WHERE user='".$taikhoan."' AND pass='".$mkadmin."'  LIMIT 1";
            $row_admin = mysqli_query($khoitao,$sql_admin); 
            $count = mysqli_num_rows($row_admin);
            if($count>0){
                $_SESSION['dangnhap']=$taikhoan;
                header("Location:admincp/index.php");
            }else{
                echo '<script>alert("Tài khoản hoặc Mật khẩu không đúng, vui lòng nhập lại.");</script>';
            }
        }else{
            echo '<script>alert("Tài khoản hoặc Mật khẩu không đúng, vui lòng nhập lại.");</script>';
        }
	} 
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đăng nhập</title>
    <style>
        body {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 400px;
            margin: 0;
        }
        .login-container {
            width: 300px;
            padding: 20px;
            border: 1px solid #ccc;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        .login-container h2 {
            text-align: center;
        }
        .login-container form {
            display: flex;
            flex-direction: column;
        }
        .login-container form input[type="text"],
        .login-container form input[type="password"],
        .login-container form input[type="submit"] {
            margin-bottom: 10px;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            outline: none;
        }
        .login-container form input[type="submit"] {
            background-color: #007bff;
            color: #fff;
            cursor: pointer;
        }
        .login-container form input[type="submit"]:hover {
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
    <div class="login-container">
        <h2>Đăng nhập</h2>
        <form action="" method="post">

            <input type="text" name="taikhoan" placeholder="Tên đăng nhập" required>

            <input type="password" name="password" placeholder="Mật khẩu" required>

            <input type="submit" name="dangnhap" value="Đăng nhập">
        
        </form>
        <div class="register-link">
           <a href='dangky.php'> Nếu chưa có tài khoản!Click vào đây để đăng ký</a>
        </div>
        <div class="register-link">
           <td class="register-link"><a href="index.php">Về trang chủ</a></td>
        </div>
    </div>
</body>
</html>