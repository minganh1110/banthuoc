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
    //TĂNG SỐ LUONG
    if(isset($_GET['cong'])){
		$id=$_GET['cong'];

        // Lấy số lượng tồn kho hiện tại của sản phẩm từ cơ sở dữ liệu
        $query_select_quantity = "SELECT SLTonKho FROM SanPham WHERE Ma_SP = '$id'";
        $result_select_quantity = mysqli_query($khoitao, $query_select_quantity);
        $row = mysqli_fetch_assoc($result_select_quantity);
        $current_quantity = $row['SLTonKho'];

        // Tính toán số lượng mới
        $new_quantity = $current_quantity - 1;

        // Cập nhật số lượng mới vào cơ sở dữ liệu
        $query_update_quantity = "UPDATE SanPham SET SLTonKho = '$new_quantity' WHERE Ma_SP = '$id'";
        mysqli_query($khoitao, $query_update_quantity);

        foreach($_SESSION['cart'] as $cart_item){
            if($cart_item['id']!=$id){
                $product[]= array('Ten_SP'=>$cart_item['Ten_SP'],'id'=>$cart_item['id'],'SLTonKho'=>$cart_item['SLTonKho'],'Gia'=>$cart_item['Gia'],'hinhanh'=>$cart_item['hinhanh'],'masp'=>$cart_item['masp']);
                $_SESSION['cart'] =$product;
            }
            else{
                
                if($cart_item['SLTonKho']<=100){
                    $tangsoluong =$cart_item['SLTonKho']+1;
                    $product[]= array('Ten_SP'=>$cart_item['Ten_SP'],'id'=>$cart_item['id'],'SLTonKho'=>$tangsoluong,'Gia'=>$cart_item['Gia'],'hinhanh'=>$cart_item['hinhanh'],'masp'=>$cart_item['masp']);
             
                }else{
                    $product[]= array('Ten_SP'=>$cart_item['Ten_SP'],'id'=>$cart_item['id'],'SLTonKho'=>$cart_item['SLTonKho'],'Gia'=>$cart_item['Gia'],'hinhanh'=>$cart_item['hinhanh'],'masp'=>$cart_item['masp']);
             

                }
                $_SESSION['cart'] =$product;
            }

        }
        header('Location:../../index.php?quanly=giohang');
	}
    //TRỪ SỐ LƯỢNG
    if(isset($_GET['tru'])){
		$id=$_GET['tru'];

        // Lấy số lượng tồn kho hiện tại của sản phẩm từ cơ sở dữ liệu
        $query_select_quantity = "SELECT SLTonKho FROM SanPham WHERE Ma_SP = '$id'";
        $result_select_quantity = mysqli_query($khoitao, $query_select_quantity);
        $row = mysqli_fetch_assoc($result_select_quantity);
        $current_quantity = $row['SLTonKho'];

        // Kiểm tra nếu số lượng tồn kho hiện tại không là 0
        if ($current_quantity > 0) {
            // Tính toán số lượng mới
            $new_quantity = $current_quantity + 1;

            // Cập nhật số lượng mới vào cơ sở dữ liệu
            $query_update_quantity = "UPDATE SanPham SET SLTonKho = '$new_quantity' WHERE Ma_SP = '$id'";
            mysqli_query($khoitao, $query_update_quantity);
        }


        foreach($_SESSION['cart'] as $cart_item){
            if($cart_item['id']!=$id){
                $product[]= array('Ten_SP'=>$cart_item['Ten_SP'],'id'=>$cart_item['id'],'SLTonKho'=>$cart_item['SLTonKho'],'Gia'=>$cart_item['Gia'],'hinhanh'=>$cart_item['hinhanh'],'masp'=>$cart_item['masp']);
                $_SESSION['cart'] =$product;
            }
            else{
                
                if($cart_item['SLTonKho']>1){
                    $trusoluong =$cart_item['SLTonKho']-1;
                    $product[]= array('Ten_SP'=>$cart_item['Ten_SP'],'id'=>$cart_item['id'],'SLTonKho'=>$trusoluong,'Gia'=>$cart_item['Gia'],'hinhanh'=>$cart_item['hinhanh'],'masp'=>$cart_item['masp']);
             
                }else{
                    $product[]= array('Ten_SP'=>$cart_item['Ten_SP'],'id'=>$cart_item['id'],'SLTonKho'=>$cart_item['SLTonKho'],'Gia'=>$cart_item['Gia'],'hinhanh'=>$cart_item['hinhanh'],'masp'=>$cart_item['masp']);
             

                }
                $_SESSION['cart'] =$product;
            }

        }
        header('Location:../../index.php?quanly=giohang');
	}

?>
