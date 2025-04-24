<?php
    session_start();
    $servername="localhost";
    $username="root";
    $password="";
    $database="banthuoc";

    $khoitao= new mysqli($servername,$username,$password,$database);
    if(mysqli_connect_errno()){
        echo "Lỗi kết nối: " . mysqli_connect_error();
        exit();
    }
    if(isset($_POST['redirect'])){
        $id_khachhang = $_SESSION['Ma_KH'];
        $thanhtoan=$_POST['payment'];
        $code_order = rand(0,9999); // Random từ 0 đến 4 số

        $insert_order = "INSERT INTO HoaDon(Ma_KH, Ma_cart, Ngaylap_HD, thanhtoan, trangthai) VALUES ('$id_khachhang','$code_order', NOW(), '$thanhtoan', '1')";
        $cart_query = mysqli_query($khoitao, $insert_order);

        if(isset($_SESSION['cart'])){
            $i=0;
            $tongtien=0;
            $tongSoLuong = 0;
            foreach($_SESSION['cart'] as $cart_item){
                $soLuong = $cart_item['SLTonKho'];
                $tongSoLuong += $soLuong;
                $thanhtien = $cart_item['SLTonKho'] * $cart_item['Gia'];
                $tongtien+=$thanhtien;
                $i++;
            }
        }

        if($cart_query){
            // Lấy mã hóa đơn vừa thêm
            $id_hoadon = mysqli_insert_id($khoitao);

            // Thêm vào bảng ChiTietHD cho sản phẩm trong giỏ hàng
            foreach($_SESSION['cart'] as $key => $value){
                $masanpham = $value['id'];
                $soluong = $value['SLTonKho'];
                $thanhtien = $value['Gia'] * $soluong;

                // Thêm vào bảng ChiTietHD
                $insert_order_details = "INSERT INTO ChiTietHD(Ma_HD, Ma_SP, Ma_cart, SLBan, TongTien) VALUES ('$id_hoadon', '$masanpham', '$code_order', '$soluong', '$thanhtien')";
                mysqli_query($khoitao, $insert_order_details);
            }

            // Thêm vào bảng LichSuDonHang
            $insert_order_status = "INSERT INTO LichSuDonHang(ma_KH, Ma_cart, NgayDatHang, SLBan, TongTien, trangthai) VALUES ('$id_khachhang', '$code_order', NOW(), '$tongSoLuong', '$tongtien', '1')";
            mysqli_query($khoitao, $insert_order_status);
        }

        // Sau khi thêm dữ liệu vào cả các bảng, tiến hành chuyển hướng về trang chủ
        header('Location:../../index.php');

        // Reset giỏ hàng sau khi thanh toán
        if(isset($_SESSION['cart'])){
            unset($_SESSION['cart']);
        }
    }
?>
