<?php
$servername="localhost";
$username="root";
$password="";
$database="banthuoc";

$khoitao = new mysqli($servername, $username, $password, $database);
if(mysqli_connect_errno()){
    echo "loi ket noi".mysqli_connect_error();
    exit();
}

if(isset($_GET['code'])){
    $code_cart = $_GET['code'];
    $sql_update ="UPDATE HoaDon SET trangthai=0 WHERE Ma_cart='".$code_cart."'";
    $query = mysqli_query($khoitao, $sql_update);
    if($query){
        header('Location:../../index.php?action=quanlydonhang&query=them');
        exit();
    } else {
        echo "Lỗi khi cập nhật trạng thái hóa đon.";
        exit();
    }
}
    
if(isset($_GET['iddonhang'])){
    $id = $_GET['iddonhang'];
    
    // Xóa hóa đơn từ bảng HoaDon
    $sql_delete_hoadon = "DELETE FROM HoaDon WHERE Ma_cart='$id'";
    $query_delete_hoadon = mysqli_query($khoitao, $sql_delete_hoadon);
    if($query_delete_hoadon){
            // Cập nhật trạng thái đơn hàng
            $sql_update_trangthai = "UPDATE LichSuDonHang SET trangthai=0 WHERE Ma_cart='$id'";
            $query_trangthai = mysqli_query($khoitao, $sql_update_trangthai);
            if(!$query_trangthai) {
                echo "Lỗi khi cập nhật trạng thái đơn hàng.";
                exit();
            }
            header('Location:../../index.php?action=quanlydonhang&query=them');
            exit();
    } else {
        echo "Lỗi khi xóa hóa đơn.";
        exit();
    }
}
?>
