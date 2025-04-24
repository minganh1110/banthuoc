<?php
    $servername = "localhost";
    $username = "root";
    $password = "";
    $database = "banthuoc";

    $khoitao = new mysqli($servername, $username, $password, $database);
    if(mysqli_connect_errno()){
        echo "Lỗi kết nối: " . mysqli_connect_error();
        exit();
    }
    
    if(isset($_POST['soluongban']) && isset($_POST['tongtien'])){
    $soluongban = $_POST['soluongban'];
    $tongtien = $_POST['tongtien'];
    }

    if(isset($_POST['suachitiet'])){
        // Thực hiện truy vấn để cập nhật thông tin chi tiết hóa đơn
        $sql_sua_chitiet="UPDATE ChiTietHD SET SLBan='".$soluongban."',TongTien='".$tongtien."' WHERE Ma_HD='$_GET[idchitiethd]'";
        mysqli_query($khoitao, $sql_sua_chitiet);
        header('Location:../../index.php?action=quanlychitiethd&query=them');
    }    
    
    elseif(isset($_GET['idchitiethd'])){
        $id = $_GET['idchitiethd'];
        
        // Xóa chi tiết hóa đơn từ bảng ChiTietHD
        $sql_delete_chitiet = "DELETE FROM ChiTietHD WHERE Ma_HD='$id'";
        $query_delete_chitiet = mysqli_query($khoitao, $sql_delete_chitiet);
        if($query_delete_chitiet){
            // Xóa hóa đơn từ bảng HoaDon
            $sql_delete_hoadon = "DELETE FROM HoaDon WHERE Ma_HD='$id'";
            $query_delete_hoadon = mysqli_query($khoitao, $sql_delete_hoadon);
            if($query_delete_hoadon){
                // Cập nhật trạng thái đơn hàng trong bảng LichSuDonHang
                $sql_update_trangthai = "UPDATE LichSuDonHang SET trangthai=0 WHERE Ma_cart='$id'";
                $query_trangthai = mysqli_query($khoitao, $sql_update_trangthai);
                if(!$query_trangthai) {
                    echo "Lỗi khi cập nhật trạng thái đơn hàng.";
                    exit();
                }
                header('Location:../../index.php?action=quanlychitiethd&query=them');
                exit();
            } else {
                echo "Lỗi khi xóa hóa đơn.";
                exit();
            }
        } else {
            echo "Lỗi khi xóa chi tiết hóa đơn.";
            exit();
        }
    }
?>
