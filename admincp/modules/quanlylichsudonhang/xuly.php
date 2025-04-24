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


    if(isset($_GET['code'])){
        $code_cart = $_GET['code'];
        $sql_update ="UPDATE LichSuDonHang SET trangthai=0 WHERE Ma_cart='$code_cart'";
        $query = mysqli_query($khoitao, $sql_update);
        if($query){
            header('Location:../../index.php?action=quanlylichsudonhang&query=them');
            exit();
        } else {
            echo "Lỗi khi cập nhật trạng thái đơn hàng.";
            exit();
        }
    }
    
    
if(isset($_GET['iddonhang'])){
    $id = $_GET['iddonhang'];
    
    // Xóa đơn hàng từ bảng LichSuDonHang
    $sql_delete_donhang = "DELETE FROM LichSuDonHang WHERE Ma_DonHang='$id'";
    $query_delete_donhang = mysqli_query($khoitao, $sql_delete_donhang);
    if($query_delete_donhang){
        header('Location:../../index.php?action=quanlylichsudonhang&query=them');
        exit();
    } else {
        echo "Lỗi khi xóa đơn hàng.";
        exit();
    }
}
?>
