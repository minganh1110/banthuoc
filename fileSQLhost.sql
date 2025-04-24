-- Tạo bảng NhanVien
CREATE TABLE IF NOT EXISTS NhanVien (
    Ma_NV int(10) AUTO_INCREMENT primary key,
    Ten_NV varchar(40) not null,
    GT_NV varchar(3),
    NamSinh_NV int,
    NgayVao_NV char(20),
    SDT_NV char(10),
    Cmnd_NV char(20),
    DC_NV nvarchar(100)
);

-- Tạo bảng KhachHang
CREATE TABLE IF NOT EXISTS KhachHang (
    Ma_KH int(10) AUTO_INCREMENT primary key,
    Ten_KH varchar(40) not null,
    taikhoan varchar(100),
    matkhau varchar(100),
    GT_KH varchar(3),
    SDT_KH char(10),
    DC_KH varchar(100)
);

-- Tạo bảng DanhMuc
CREATE TABLE IF NOT EXISTS DanhMuc (
    Ma_DM int(10) AUTO_INCREMENT primary key,
    Ten_DM varchar(50) not null,
    thutu varchar(50)
);

-- Tạo bảng SanPham
CREATE TABLE IF NOT EXISTS SanPham (
    Ma_SP int(10) AUTO_INCREMENT primary key,
    Ten_SP varchar(40) not null,
    TenThuoc char(20),
    hinhanh varchar(100),
    SLTonKho char(20),
    Gia char(20),
    Ma_DM int(10),
    CONSTRAINT DanhMuc_SanPham_fk FOREIGN KEY (Ma_DM) REFERENCES DanhMuc(Ma_DM) ON DELETE CASCADE ON UPDATE CASCADE
);

-- Tạo bảng HoaDon
CREATE TABLE IF NOT EXISTS HoaDon (
    Ma_HD int(10) AUTO_INCREMENT primary key,
    Ma_KH int(10),
    CONSTRAINT KhachHang_HoaDon_fk FOREIGN KEY (Ma_KH) REFERENCES KhachHang(Ma_KH) ON DELETE CASCADE ON UPDATE CASCADE,
    Ma_cart int(10) not null,
    Ngaylap_HD char(20),
    thanhtoan varchar(100) NOT NULL,
    trangthai int(10)
);

-- Tạo bảng ChiTietHD
CREATE TABLE IF NOT EXISTS ChiTietHD (
    Ma_HD int(10),
    CONSTRAINT HoaDon_ChiTietHD_fk FOREIGN KEY (Ma_HD) REFERENCES HoaDon(Ma_HD) ON DELETE CASCADE ON UPDATE CASCADE,
    Ma_SP int(10),
    CONSTRAINT SanPham_ChiTietHD_fk FOREIGN KEY (Ma_SP) REFERENCES SanPham(Ma_SP) ON DELETE CASCADE ON UPDATE CASCADE,
    Ma_cart int(10) not null,
    SLBan int,
    TongTien float,
    primary key (Ma_HD,Ma_SP)
);

-- Tạo bảng user
CREATE TABLE IF NOT EXISTS tbl_user (
    id int(4) primary key,
    user varchar(20),
    pass varchar(20),
    role tinyint(1)
);

-- Tạo bảng LichSuDonHang
CREATE TABLE IF NOT EXISTS LichSuDonHang (
    Ma_DonHang int(10) AUTO_INCREMENT primary key,
    Ma_KH int(10), Constraint
    KhachHang_LichSuDonHang_fk FOREIGN KEY (Ma_KH) REFERENCES KhachHang(Ma_KH) ON DELETE CASCADE ON UPDATE CASCADE,
    Ma_cart int(10) not null,
    NgayDatHang DATETIME,
    SLBan int,
    TongTien float,
    trangthai int(10)
);

-- Chèn dữ liệu vào các bảng
-- Chèn dữ liệu cho bảng NhanVien
INSERT INTO NhanVien (Ten_NV, GT_NV, NamSinh_NV, NgayVao_NV, SDT_NV, Cmnd_NV, DC_NV) VALUES
(N'Nguyễn Văn An', 'Nam', 1990, '01/01/2010', '1234567890', '1234567890', N'111/114, Đường Trần Hưng Đạo, Quận Hoàn Kiếm, Hà Nội, Việt Nam'),
(N'Trần Thị Bích', N'Nữ', 1992, '01/02/2011', '0987654321', '0987654321', N'Tầng 8, Tòa nhà Bitexco Financial Tower, Số 2, Đường Hải Triều, Quận 1, TP Hồ Chí Minh, Việt Nam'),
(N'Phạm Văn Cao', 'Nam', 1988, '03/05/2009', '9876543210', '9876543210', N'110/111, Đường Lạch Tray, Quận Ngô Quyền, Hải Phòng, Việt Nam'),
(N'Lê Thị Hương', N'Nữ', 1995, '10/10/2014', '0123456789', '0123456789', N'220/112, Đường Bạch Đằng, Quận Hải Châu, Đà Nẵng, Việt Nam'),
(N'Hoàng Văn Em', 'Nam', 1993, '05/06/2012', '5678901234', '5678901234', N'115/113, Đường Quang Trung, TP Vinh, Nghệ An, Việt Nam');

-- Chèn dữ liệu cho bảng KhachHang
INSERT INTO KhachHang (Ten_KH, taikhoan, matkhau, GT_KH, SDT_KH, DC_KH) VALUES
(N'Nguyễn Thị Diễm', '', '', N'Nữ', '0987654321', N'155/123, Đường Nguyễn Văn Linh, Quận Ninh Kiều, Cần Thơ, Việt Nam'),
(N'Trần Văn Giang', '', '', 'Nam', '0123456789', N'330/134, Đường Hạ Long, TP Hạ Long, Quảng Ninh, Việt Nam'),
(N'Phạm Thị Hồ', '', '', N'Nữ', '0987654321', N'112/145, Đường Lê Lợi, TP Huế, Thừa Thiên Huế, Việt Nam'),
(N'Lê Văn Iam', '', '', 'Nam', '0123456789', N'225/156, Đường Bà Rịa, TP Vũng Tàu, Bà Rịa-Vũng Tàu, Việt Nam'),
(N'Hoàng Thị Thuỳ', '', '', N'Nữ', '0987654321', N'118/179, Đường Trần Phú, TP Tuy Hòa, Phú Yên, Việt Nam');

-- Chèn dữ liệu cho bảng DanhMuc
INSERT INTO DanhMuc (Ten_DM, thutu) VALUES 
('Phân bón', '1'),
('Dung dịch', '2'),
('Viên', '3'),
('Thuốc phun bột', '4'),
('Bột hòa nước', '5'),
('Hữu cơ', '6');

-- Chèn dữ liệu cho bảng SanPham
INSERT INTO SanPham (Ten_SP, TenThuoc, hinhanh, SLTonKho, Gia, Ma_DM) VALUES 
(N'Thuốc trừ sâu vi sinh', 'Paracetamol', 'visinh.jpg', '1000', '5000', '1'),
(N'Clo hữu cơ', 'Amoxicillin', 'huuco.jpg', '500', '10000', '2'),
(N'Lân hữu cơ', 'Ibuprofen', 'lanhuuco.jpg', '750', '8000', '3'),
(N'Thuốc thảo mộc', 'Aspirin', 'thaomoc.jpg', '1200', '6000', '4'),
(N'Carbamate', 'Diphenhydramine', 'Carbamate.jpg', '200', '15000', '5'),
(N'Caramete', 'Diphenhy', 'Caramete.jpg', '300', '17000', '6');

-- Chèn dữ liệu cho bảng HoaDon
INSERT INTO HoaDon (Ma_KH, Ma_cart, Ngaylap_HD, thanhtoan, trangthai) VALUES
('1', '2432', '01/01/2022', 'tiền mặt', '0'),
('2', '2212', '02/01/2022', 'tiền mặt', '0'),
('3', '3241', '03/01/2022', 'tiền mặt', '0'),
('4', '5465', '04/01/2022', 'Hình thúc khác', '0'),
('5', '4032', '05/01/2022', 'Hình thúc khác', '0');

-- Chèn dữ liệu cho bảng ChiTietHD
INSERT INTO ChiTietHD (Ma_HD, Ma_SP, Ma_cart, SLBan, TongTien) VALUES 
('1', '1', '2432', 2, '0'),
('2', '2', '2212', 1, '0'),
('3', '3', '3241', 0, '0'),
('4', '4', '5465', 3, '0'),
('5', '5', '4032', 4, '0');

-- Chèn dữ liệu cho bảng user
INSERT INTO tbl_user (id,user,pass,role) VALUES ('1','admin','1',1);

-- Chèn dữ liệu cho bảng LichSuDonHang
-- INSERT INTO LichSuDonHang (Ma_HD, Ma_KH, Ma_cart, NgayDatHang, SLBan, TongTien, trangthai) VALUES 
-- ('1','1','2432', '', '', '', '0'),
-- ('2','2', '2212', '', '', '', '0'),
-- ('3','3', '3241', '', '', '', '0'),
-- ('4','4', '5465', '', '', '', '0'),
-- ('5','5', '4032', '', '', '', '0');
