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
    //XÓA SẢN PHẨM
    if(isset($_SESSION['cart'])&& isset($_GET['xoa'])){
        $id=$_GET['xoa'];
        foreach($_SESSION['cart'] as $cart_item){
            if($cart_item['id']!=$id){
                //thiết lập lại session 
                $product[]= array('Ten_SP'=>$cart_item['Ten_SP'],'id'=>$cart_item['id'],'SLTonKho'=>$cart_item['SLTonKho'],'Gia'=>$cart_item['Gia'],'hinhanh'=>$cart_item['hinhanh'],'masp'=>$cart_item['masp']);
                
            }
        $_SESSION['cart']=$product;
        header('Location:../../index.php?quanly=giohang');
        }
		
	}

?>