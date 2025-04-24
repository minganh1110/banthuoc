<?php
    session_start();
    $severname="localhost";
    $username="root";
    $password="";
    $database="banthuoc";

    $khoitao= new mysqli($severname,$username,$password,$database);
    if(mysqli_connect_errno()){
        echo "loi ket noi".mysqli_connect_error();
        exit();
    }
    if(!isset($_SESSION['dangnhap'])){
        header('Location:../dangnhap.php');
    }

?>
<?php
            if(isset($_GET['dangxuat']) && $_GET['dangxuat'] == 1){
                unset($_SESSION['dangnhap']);
                header('Location:../dangnhap.php');
                exit(); // Đảm bảo dừng script sau khi chuyển hướng
            }
            ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style_admincp.css">
    <title>AdminCp</title>
</head>
<body>
    <h3 class="admincp_tile">Welcome to AdminCP Page</h3>
    <div class="wrapper">
        <p><a href="index.php?dangxuat=1">Đăng xuất : <?php if(isset($_SESSION['dangnhap'])){
            echo $_SESSION['dangnhap'];
    
        } ?></a></p>
        

        <ul class="admincp_list">
            
        <li><a href="index.php?action=quanlysanpham&query=them">Quản lý sản phẩm </a></li>

        <li><a href="index.php?action=quanlydanhmuc&query=them">Quản lý danh mục </a></li>

        <li><a href="index.php?action=quanlynhanvien&query=them">Quản lý nhân viên </a></li>

        <?php
            if(isset($_SESSION['dangnhap'])){
                if($_SESSION['dangnhap']=='admin'){
        ?>
            <li><a href="index.php?action=quanlynguoidung&query=them">Quản lý người dùng</a></li>
            
        <?php

                }
        }

        ?>
        <li><a href="index.php?action=quanlyhoadon&query=them">Quản lý hóa đơn </a></li>

        <li><a href="index.php?action=quanlychitiethd&query=them">Quản lý chi tiết hóa đơn </a></li>

        <li><a href="index.php?action=quanlydonhang&query=them">Quản lý đơn hàng </a></li>

        <li><a href="index.php?action=quanlylichsudonhang&query=them">Quản lý lịch sủ đơn hàng </a></li>
        </ul>
        <?php
            include("modules/main.php");
        ?>
        <p>Footer Admincp</p>
    </div>
</body>
</html>