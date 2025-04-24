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
    if(isset($_POST['tendanhmuc']) && isset($_POST['thutu'])){
        $tendanhmuc=$_POST['tendanhmuc'];
        $thutu=$_POST['thutu'];
    }
    
    
    if(isset($_POST['themdanhmuc'])){
                
            $sql_themdm="INSERT INTO DanhMuc(Ten_DM, thutu) 
            VALUE ('".$tendanhmuc."','".$thutu."')";
            mysqli_query($khoitao,$sql_themdm);
            header('Location:../../index.php?action=quanlydanhmuc&query=them');
    }
    
    elseif(isset($_POST['suadanhmuc'])){
        $sql_sua_dm="UPDATE DanhMuc SET Ten_DM='".$tendanhmuc."',thutu='".$thutu."' WHERE Ma_DM='$_GET[iddanhmuc]'";
        mysqli_query($khoitao,$sql_sua_dm);
        header('Location:../../index.php?action=quanlydanhmuc&query=them');
    }
    // Xử lý khi nhấn nút xóa danh mục
        elseif (isset($_GET['iddanhmuc'])) {
            $id = $_GET['iddanhmuc'];
            // Xóa bản ghi trong bảng DanhMuc
            $sql_xoa_danhmuc = "DELETE FROM DanhMuc WHERE Ma_DM = ?";
            $stmt_xoa_danhmuc = $khoitao->prepare($sql_xoa_danhmuc);
            $stmt_xoa_danhmuc->bind_param("i", $id);
            if ($stmt_xoa_danhmuc->execute()) {
                header('Location: ../../index.php?action=quanlydanhmuc&query=them');
            } else {
                echo "Xóa danh mục không thành công.";
            }
        } else {
            echo "ID danh mục không hợp lệ.";
        } 
?>