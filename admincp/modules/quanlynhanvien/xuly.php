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
    if(isset($_POST['tennv']) && isset($_POST['gioitinh']) && isset($_POST['namsinh']) 
    && isset($_POST['sodienthoai']) && isset($_POST['ngayvaolam']) && isset($_POST['socmnd']) && isset($_POST['diachi'])) {
    $name = $_POST['tennv'];
    $gender =$_POST['gioitinh'];
    $namsinh =$_POST['namsinh'];
    $numberphone =$_POST['sodienthoai'];
    $ngayvao =$_POST['ngayvaolam'];
    $cmnd =$_POST['socmnd'];
    $address =$_POST['diachi'];

    }
    

    if(isset($_POST['themnhanvien'])){
                
        // Thực hiện truy vấn để chèn dữ liệu vào bảng NhanVien
        $sql_themnv = "INSERT INTO NhanVien (Ten_NV, GT_NV, NamSinh_NV, NgayVao_NV, SDT_NV, Cmnd_NV, DC_NV) 
        VALUES ('$name', '$gender', $namsinh, '$numberphone', '$ngayvao', '$cmnd', '$address')";
        mysqli_query($khoitao,$sql_themnv);
        header('Location:../../index.php?action=quanlynhanvien&query=them');
}

   elseif(isset($_POST['suanhanvien'])){
        $sql_sua_nv="UPDATE NhanVien SET Ten_NV='".$name."',GT_NV='".$gender."',NamSinh_NV='".$namsinh."',SDT_NV='".$numberphone."',NgayVao_NV='".$ngayvao."',Cmnd_NV='".$cmnd."',DC_NV='".$address."' WHERE Ma_NV='$_GET[idnhanvien]'";
        mysqli_query($khoitao,$sql_sua_nv);
        header('Location:../../index.php?action=quanlynhanvien&query=them');
    }elseif (isset($_GET['idnhanvien'])) {
        $id = $_GET['idnhanvien'];
        //xóa bản ghi từ bảng NhanVien
        $sql_xoa_nv = "DELETE FROM NhanVien WHERE Ma_NV = ?";
        $stmt_xoa_nhanvien = $khoitao->prepare($sql_xoa_nv);
        $stmt_xoa_nhanvien->bind_param("i", $id);
        if ($stmt_xoa_nhanvien->execute()) {
            header('Location: ../../index.php?action=quanlynhanvien&query=them');
        } else {
            echo "Xóa nhân viên không thành công.";
        }
    }else {
        echo "ID nhanvien không hợp lệ.";
    }
?>