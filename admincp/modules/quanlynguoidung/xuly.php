<?php
    $severname="localhost";
    $username="root";
    $password="";
    $database="banthuoc";

    $khoitao= new mysqli($severname,$username,$password,$database);
    if(mysqli_connect_errno()){
        echo "loi ket noi".mysqli_connect_error();
        exit();
    }

    if(isset($_POST['hovaten']) && isset($_POST['taikhoan']) && isset($_POST['matkhau']) 
    && isset($_POST['gioitinh']) && isset($_POST['sodienthoai']) && isset($_POST['diachi'])) {
    
    $name = $_POST['hovaten'];
    $account = $_POST['taikhoan'];
    $password = $_POST['matkhau'];
    $gender = $_POST['gioitinh'];
    $numberphone = $_POST['sodienthoai'];
    $address = $_POST['diachi'];
    }


    if(isset($_POST['themnguoidung'])){
    // Thực hiện truy vấn để chèn dữ liệu vào bảng KhachHang
    $sql_themkh = "INSERT INTO KhachHang (Ten_KH, taikhoan, matkhau, GT_KH, SDT_KH, DC_KH) 
                   VALUES ('$name', '$account', '$password', '$gender', '$numberphone', '$address')";
    mysqli_query($khoitao,$sql_themkh);
    header('Location:../../index.php?action=quanlynguoidung&query=them');
    }
    elseif(isset($_POST['suanguoidung'])){
        $sql_sua_nd="UPDATE KhachHang SET Ten_KH='".$name."',taikhoan='".$account."',GT_KH='".$gender."',SDT_KH='".$numberphone."',DC_KH='".$address."' WHERE Ma_KH='$_GET[idnguoidung]'";
        mysqli_query($khoitao,$sql_sua_nd);
        header('Location:../../index.php?action=quanlynguoidung&query=them');
    }elseif (isset($_GET['idnguoidung'])) {
        $id=$_GET['idnguoidung'];
        //xóa bản ghi từ bảng khachhang
        $sql_xoa_nd="DELETE FROM KhachHang WHERE Ma_KH = ?";
        $stmt_xoa_nguoidung = $khoitao->prepare($sql_xoa_nd);
        $stmt_xoa_nguoidung->bind_param("i", $id);
        if ($stmt_xoa_nguoidung->execute()) {
            header('Location:../../index.php?action=quanlynguoidung&query=them');
        } else {
            echo "Xóa khách hàng không thành công.";
        }
    }else {
        echo "ID khachhang không hợp lệ.";
    }    
?>