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
    //XÓA HẾT GIỎ HÀNG
    if(isset($_GET['xoatatca'])&& $_GET['xoatatca']=='xoahet'){
		unset($_SESSION['cart']);
		header('Location:../../index.php?quanly=giohang');
	}

?>