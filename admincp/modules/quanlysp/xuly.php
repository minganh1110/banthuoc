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

    if(isset($_POST['tensanpham']) && isset($_POST['masp']) && isset($_POST['giasp']) 
    && isset($_POST['soluong']) && isset($_POST['danhmuc'])) {
    
    $tensanpham = $_POST['tensanpham'];
    $tenthuoc = $_POST['masp'];
    $giasanpham = $_POST['giasp'];
    $soluong = $_POST['soluong'];
    $danhmuc = $_POST['danhmuc'];
    }
    // Xử lý hình ảnh
    $file = $_FILES['hinhanh'];
    $hinhanh = $file['name'];
    $hinhanh_tmp = $_FILES['hinhanh']['tmp_name'];
    $hinhanhgio = time().'_'.$hinhanh;

    

    if(isset($_POST['themsanpham'])){

        
        if(isset($_FILES['hinhanh'])){
            if($file['type']== 'image/jpeg'||$file['type']== 'imgae/jpg'||$file['type']== 'image/png'){
                
                move_uploaded_file($hinhanh_tmp,'uploads/'.$hinhanh);
                
                $sql_themsp="INSERT INTO SanPham(Ten_SP,TenThuoc,hinhanh,SLTonKho,Gia,Ma_DM) 
                VALUE ('".$tensanpham."','".$tenthuoc."','".$hinhanh."','".$soluong."','".$giasanpham."','".$danhmuc."')";
                mysqli_query($khoitao,$sql_themsp);
                header('Location:../../index.php?action=quanlysanpham&query=them');
        
            }else{
                $hinhanh='';
                header('Location:../../index.php?action=quanlysanpham&query=them');
            }
        }
       

    }
    
     
    
    elseif(isset($_POST['suasanpham'])){
        if($hinhanh!=''){
            move_uploaded_file($hinhanh_tmp,'uploads/'.$hinhanh);
            $sql_sua="UPDATE SanPham SET Ten_SP='".$tensanpham."',TenThuoc='".$tenthuoc."',
            Gia='".$giasanpham."',SLTonKho='".$soluong."',hinhanh='".$hinhanh."',
            Ma_DM='".$danhmuc."' WHERE Ma_SP='$_GET[idsanpham]'";
            
            $sql="SELECT*FROM SanPham WHERE Ma_SP='$_GET[idsanpham]' LIMIT 1";
            $query=mysqli_query($khoitao,$sql);
            while($row=mysqli_fetch_array($query)){
                unlink('uploads/'.$row['hinhanh']);
            }
        
        }else{
            $sql_sua="UPDATE SanPham SET Ten_SP='".$tensanpham."',TenThuoc='".$tenthuoc."',
            Gia='".$giasanpham."',SLTonKho='".$soluong."',
            Ma_DM='".$danhmuc."' WHERE Ma_SP='$_GET[idsanpham]'";
        }  
        mysqli_query($khoitao,$sql_sua);
        header('Location:../../index.php?action=quanlysanpham&query=them');
    }
    
    // Xử lý khi nhấn nút xóa sản phẩm
        elseif (isset($_GET['idsanpham'])) {
            $id = $_GET['idsanpham'];
                //xóa bản ghi trong bảng SanPham
                $sql_xoa_sanpham = "DELETE FROM SanPham WHERE Ma_SP = ?";
                $stmt_xoa_sanpham = $khoitao->prepare($sql_xoa_sanpham);
                $stmt_xoa_sanpham->bind_param("i", $id);
                if ($stmt_xoa_sanpham->execute()) {
                    header('Location: ../../index.php?action=quanlysanpham&query=them');
                } else {
                    echo "Xóa sản phẩm không thành công.";
                }
            }else {
            echo "ID sản phẩm không hợp lệ.";
        }
    
?>
