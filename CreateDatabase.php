<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<?php
// Tạo kết nối đến cơ sở dữ liệu
$khoitao = new mysqli('localhost','root','');
mysqli_set_charset($khoitao,'utf8');

// Kiểm tra kết nối
if ($khoitao->connect_error) {
    die("Kết nối thất bại: " . $khoitao->connect_error);
}

// Kiểm tra xem cơ sở dữ liệu đã tồn tại chưa
$database_name = "banthuoc";
$result = $khoitao->query("SHOW DATABASES LIKE '$database_name'");
if ($result->num_rows == 0) {
    // Nếu chưa tồn tại, tạo cơ sở dữ liệu
    $sql = "CREATE DATABASE $database_name";
    if ($khoitao->query($sql) === TRUE) {
        echo "Tạo cơ sở dữ liệu $database_name thành công";
        $khoitao->select_db($database_name);
        // Tạo các bảng và thêm dữ liệu
        // Tạo bảng NhanVien
        $sql = "CREATE TABLE NhanVien (
            Ma_NV int(10) AUTO_INCREMENT primary key,
            Ten_NV varchar(40) not null,
            GT_NV varchar(3), NamSinh_NV int,
            NgayVao_NV char(20), SDT_NV char(10),
            Cmnd_NV char(20), DC_NV nvarchar(100)
        )";
        if ($khoitao->query($sql) === TRUE) {
            echo "<br>Tạo bảng nhanvien thành công";
        } else {
            echo "Lỗi: " . $khoitao->error;
        }
        // Tạo bảng KhachHang
        $sql = "CREATE TABLE KhachHang (
            Ma_KH int(10) AUTO_INCREMENT primary key,
            Ten_KH varchar(40) not null,
            taikhoan varchar(100),
            matkhau varchar(100),
            GT_KH varchar(3), SDT_KH char(10),
            DC_KH varchar(100)
        )";
        if ($khoitao->query($sql) === TRUE) {
            echo "<br>Tạo bảng KhachHang thành công";
        } else {
            echo "Lỗi: " . $khoitao->error;
        }

        // Tạo bảng DanhMuc
        $sql = "CREATE TABLE DanhMuc (
            Ma_DM int(10) AUTO_INCREMENT primary key,
            Ten_DM varchar(50) not null,
            thutu varchar(50)
        )";
        if ($khoitao->query($sql) === TRUE) {
            echo "<br>Tạo bảng DanhMuc thành công";
        } else {
            echo "Lỗi: " . $khoitao->error;
        }

        // Tạo bảng SanPham
        $sql = "CREATE TABLE SanPham (
            Ma_SP int(10) AUTO_INCREMENT primary key,
            Ten_SP varchar(40) not null,
            TenThuoc char(20),
            hinhanh varchar(100),
            SLTonKho char(20),
            Gia char(20),
            Ma_DM int(10),Constraint
        DanhMuc_SanPham_fk FOREIGN KEY (Ma_DM) REFERENCES DanhMuc(Ma_DM) ON DELETE CASCADE ON UPDATE CASCADE
        )";
        if ($khoitao->query($sql) === TRUE) {
            echo "<br>Tạo bảng SanPham thành công";
        } else {
            echo "Lỗi: " . $khoitao->error;
        }
        // Tạo bảng HoaDon
        $sql = "CREATE TABLE HoaDon (
            Ma_HD int(10) AUTO_INCREMENT primary key,
            Ma_KH int(10), Constraint
        KhachHang_HoaDon_fk FOREIGN KEY (Ma_KH) REFERENCES KhachHang(Ma_KH) ON DELETE CASCADE ON UPDATE CASCADE,
            Ma_cart int(10) not null,
            Ngaylap_HD char(20),
            thanhtoan varchar(100) NOT NULL,
            trangthai int(10)
        )";
        if ($khoitao->query($sql) === TRUE) {
            echo "<br>Tạo bảng HoaDon thành công";
        } else {
            echo "Lỗi: " . $khoitao->error;
        }
        // Tạo bảng ChiTietHD
        $sql = "CREATE TABLE ChiTietHD (
            Ma_HD int(10), Constraint
        HoaDon_ChiTietHD_fk FOREIGN KEY (Ma_HD) REFERENCES HoaDon(Ma_HD) ON DELETE CASCADE ON UPDATE CASCADE,
            Ma_SP int(10), Constraint
        SanPham_ChiTietHD_fk FOREIGN KEY (Ma_SP) REFERENCES SanPham(Ma_SP) ON DELETE CASCADE ON UPDATE CASCADE,
            Ma_cart int(10) not null,
            SLBan int,
            TongTien float,
            primary key (Ma_HD,Ma_SP)
        )";
        if ($khoitao->query($sql) === TRUE) {
            echo "<br>Tạo bảng ChiTietHD thành công";
        } else {
            echo "Lỗi: " . $khoitao->error;
        }

        // Tạo bảng user
        $sql = "CREATE TABLE tbl_user (
            id int(4) primary key,
            user varchar(20),
            pass varchar(20),
            role tinyint(1)
        )";
        if ($khoitao->query($sql) === TRUE) {
            echo "<br>Tạo bảng user thành công";
        } else {
            echo "Lỗi: " . $khoitao->error;
        }

        //Tạo bảng LichSuDonHang
        $sql = "CREATE TABLE LichSuDonHang (
            Ma_DonHang int(10) AUTO_INCREMENT primary key,
            Ma_KH int(10), Constraint
        KhachHang_LichSuDonHang_fk FOREIGN KEY (Ma_KH) REFERENCES KhachHang(Ma_KH) ON DELETE CASCADE ON UPDATE CASCADE,
            Ma_cart int(10) not null,
            NgayDatHang DATETIME,
            SLBan int,
            TongTien float,
            trangthai int(10)           
        )";
        if ($khoitao->query($sql) === TRUE) {
            echo "<br>Tạo bảng tbl_giohang thành công";
        } else {
            echo "Lỗi: " . $khoitao->error;
        }

        // Lệnh SQL để insert dữ liệu
        // -- Đang đổ dữ liệu cho bảng NhanVien 
        $sql = "INSERT INTO NhanVien (MA_NV, Ten_NV, GT_NV, NamSinh_NV, NgayVao_NV, SDT_NV, Cmnd_NV, DC_NV) VALUES
        ('', N'Nguyễn Văn An', 'Nam', 1990, '01/01/2010', '1234567890', '1234567890', N'111/114, Đường Trần Hưng Đạo, Quận Hoàn Kiếm, Hà Nội, Việt Nam'),
        ('', N'Trần Thị Bích', N'Nữ', 1992, '01/02/2011', '0987654321', '0987654321', N'Tầng 8, Tòa nhà Bitexco Financial Tower, Số 2, Đường Hải Triều, Quận 1, TP Hồ Chí Minh, Việt Nam'),
        ('', N'Phạm Văn Cao', 'Nam', 1988, '03/05/2009', '9876543210', '9876543210', N'110/111, Đường Lạch Tray, Quận Ngô Quyền, Hải Phòng, Việt Nam'),
        ('', N'Lê Thị Hương', N'Nữ', 1995, '10/10/2014', '0123456789', '0123456789', N'220/112, Đường Bạch Đằng, Quận Hải Châu, Đà Nẵng, Việt Nam'),
        ('', N'Hoàng Văn Em', 'Nam', 1993, '05/06/2012', '5678901234', '5678901234', N'115/113, Đường Quang Trung, TP Vinh, Nghệ An, Việt Nam')
        ";
        if ($khoitao->query($sql) === TRUE) {
            echo "<br>Thêm dữ liệu bang NhanVien thành công";
        } else {
            echo "Lỗi: " . $sql . "<br>" . $khoitao->error;
        }
        // -- Đang đổ dữ liệu cho bảng KhachHang  
        $sql = "INSERT INTO KhachHang (MA_KH, Ten_KH, taikhoan, matkhau, GT_KH, SDT_KH, DC_KH) VALUES
        ('', N'Nguyễn Thị Diễm', '', '', N'Nữ', '0987654321', N'155/123, Đường Nguyễn Văn Linh, Quận Ninh Kiều, Cần Thơ, Việt Nam'),
        ('', N'Trần Văn Giang', '', '', 'Nam', '0123456789', N'330/134, Đường Hạ Long, TP Hạ Long, Quảng Ninh, Việt Nam'),
        ('', N'Phạm Thị Hồ', '', '', N'Nữ', '0987654321', N'112/145, Đường Lê Lợi, TP Huế, Thừa Thiên Huế, Việt Nam'),
        ('', N'Lê Văn Iam', '', '', 'Nam', '0123456789', N'225/156, Đường Bà Rịa, TP Vũng Tàu, Bà Rịa-Vũng Tàu, Việt Nam'),
        ('', N'Hoàng Thị Thuỳ', '', '', N'Nữ', '0987654321', N'118/179, Đường Trần Phú, TP Tuy Hòa, Phú Yên, Việt Nam')
        ";
        if ($khoitao->query($sql) === TRUE) {
            echo "<br>Thêm dữ liệu bang KhachHang  thành công";
        } else {
            echo "Lỗi: " . $sql . "<br>" . $khoitao->error;
        }

        // -- Đang đổ dữ liệu cho bảng DanhMuc  
        $sql = "INSERT INTO DanhMuc (Ma_DM, Ten_DM, thutu) VALUES 
        ('', 'Phân bón', '1'),
        ('', 'Dung dịch', '2'),
        ('', 'Viên', '3'),
        ('', 'Thuốc phun bột', '4'),
        ('', 'Bột hòa nước', '5'),
        ('', 'Hữu cơ', '6')
        ";
        if ($khoitao->query($sql) === TRUE) {
            echo "<br>Thêm dữ liệu bảng DanhMuc thành công";
        } else {
            echo "Lỗi: " . $sql . "<br>" . $khoitao->error;
        }

        // -- Đang đổ dữ liệu cho bảng SanPham  
        $sql = "INSERT INTO SanPham (Ma_SP, Ten_SP, TenThuoc, hinhanh, SLTonKho, Gia, Ma_DM) VALUES 
        ('', N'Thuốc trừ sâu vi sinh', 'Paracetamol', 'visinh.jpg', '1000', '5000', '1'),
        ('', N'Clo hữu cơ', 'Amoxicillin', 'huuco.jpg', '500', '10000', '2'),
        ('', N'Lân hữu cơ', 'Ibuprofen', 'lanhuuco.jpg', '750', '8000', '3'),
        ('', N'Thuốc thảo mộc', 'Aspirin', 'thaomoc.jpg', '1200', '6000', '4'),
        ('', N'Carbamate', 'Diphenhydramine', 'Carbamate.jpg', '200', '15000', '5'),
        ('', N'Caramete', 'Diphenhy', 'Caramete.jpg', '300', '17000', '6')
        ";
        if ($khoitao->query($sql) === TRUE) {
            echo "<br>Thêm dữ liệu bang SanPham  thành công";
        } else {
            echo "Lỗi: " . $sql . "<br>" . $khoitao->error;
        }
        // -- Đang đổ dữ liệu cho bảng HoaDon  
        $sql = "INSERT INTO HoaDon (Ma_HD, Ma_KH, Ma_cart, Ngaylap_HD, thanhtoan, trangthai) VALUES
        ('', '1', '2432', '01/01/2022', 'tiền mặt', '0'),
        ('', '2', '2212', '02/01/2022', 'tiền mặt', '0'),
        ('', '3', '3241', '03/01/2022', 'tiền mặt', '0'),
        ('', '4', '5465', '04/01/2022', 'Hình thúc khác', '0'),
        ('', '5', '4032', '05/01/2022', 'Hình thúc khác', '0')
        ";
        if ($khoitao->query($sql) === TRUE) {
            echo "<br>Thêm dữ liệu bang HoaDon  thành công";
        } else {
            echo "Lỗi: " . $sql . "<br>" . $khoitao->error;
        }
        // -- Đang đổ dữ liệu cho bảng ChiTietHD  
        $sql = "INSERT INTO ChiTietHD (Ma_HD, Ma_SP, Ma_cart, SLBan, TongTien) VALUES 
        ('1', '1', '2432', 2, '0'),
        ('2', '2', '2212', 1, '0'),
        ('3', '3', '3241', 0, '0'),
        ('4', '4', '5465', 3, '0'),
        ('5', '5', '4032', 4, '0')
        ";
        if ($khoitao->query($sql) === TRUE) {
            echo "<br>Thêm dữ liệu bang ChiTietHD  thành công";
        } else {
            echo "Lỗi: " . $sql . "<br>" . $khoitao->error;
        }

        $sql = "INSERT INTO tbl_user (id,user,pass,role)
        VALUES ('1','admin','1',1)
        ";
        if ($khoitao->query($sql) === TRUE) {
            echo "<br>Thêm dữ liệu bang dh_user thành công";
        } else {
            echo "Lỗi: " . $sql . "<br>" . $khoitao->error;
        }

        //Liên kết đến trang ĐN
        header("Location:index.php") or die ("Lỗi: " . $sql . "<br>" . $khoitao->error);
        
        // Đóng kết nối
        $khoitao->close();      
    } else {
        echo "Lỗi: " . $khoitao->error;
    }
} else {
    // Nếu đã tồn tại, chuyển hướng đến trang khác
    header("Location:index.php") or die ("Lỗi: " . $sql . "<br>" . $khoitao->error);
    exit(); // Dừng kịch bản hiện tại sau khi chuyển hướng
}

?>
</body>
</html>