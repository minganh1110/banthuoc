<?php
$servername="localhost";
$username="root";
$password="";
$database="banthuoc";

$khoitao = new mysqli($servername, $username, $password, $database);
if(mysqli_connect_errno()){
    echo "Lỗi kết nối: " . mysqli_connect_error();
    exit();
}
    
if(isset($_POST['mahoadon']) && isset($_POST['ngaylaphoadon']) && isset($_POST['thanhtoan']) && isset($_POST['trangthai'])){
    // Lấy dữ liệu từ các trường
    $mahoadon = $_POST['mahoadon'];
    $ngaylaphoadon = $_POST['ngaylaphoadon'];
    $thanhtoan = $_POST['thanhtoan'];
    $trangthai = $_POST['trangthai'];
}

if(isset($_POST['suahoadon'])){
    //Thực hiện truy vấn để cập nhật thông tin hóa đơn trong cơ sở dữ liệu
    $sql_sua_hoadon = "UPDATE HoaDon SET Ma_HD='".$mahoadon."',Ngaylap_HD='".$ngaylaphoadon."', thanhtoan='".$thanhtoan."', trangthai='".$trangthai."' WHERE Ma_HD='$_GET[idhoadon]'";
    mysqli_query($khoitao, $sql_sua_hoadon);

    // Chuyển hướng người dùng đến trang quản lý hóa đơn sau khi cập nhật thành công
    header('Location:../../index.php?action=quanlyhoadon&query=them');
}
elseif(isset($_GET['idhoadon'])){
    $id = $_GET['idhoadon'];
    
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
        header('Location:../../index.php?action=quanlyhoadon&query=them');
        exit();
    } else {
        echo "Lỗi khi xóa hóa đơn.";
        exit();
    }
}
?>
