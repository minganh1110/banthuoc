<?php
// if (session_status() == PHP_SESSION_NONE) {
//    session_start();//bắt đầu phiên
// }
?>

 <p>Chi tiết sản phẩm </p>
 <?php
    $sql_chitiet ="SELECT * FROM DanhMuc,SanPham WHERE SanPham.Ma_DM=DanhMuc.Ma_DM AND SanPham.Ma_SP='$_GET[id]' LIMIT 1";
    $query_chitiet=mysqli_query($khoitao,$sql_chitiet);
    while ($row_chitiet=mysqli_fetch_array($query_chitiet)){
 ?>
 <div class="warpper_deital"> 
 <div class="hinhanh_sanpham">
         <img src="admincp/modules/quanlysp/uploads/<?php echo $row_chitiet['hinhanh']?>" style="width: 120px; height: auto;">
 </div>
    <form action="main/giohang/themgiohang.php?idsanpham=<?php echo $row_chitiet['Ma_SP'] ?>" method="POST">
        <div class="chitiet_sanpham">
            <h3 style="margin: 0;"><?php echo $row_chitiet['Ten_SP'] ?></h3>
            <p>Tên :<?php echo $row_chitiet['TenThuoc'] ?></p>
            <p>Giá :<?php echo number_format($row_chitiet['Gia'],0,',','.').'vnd' ?></p>
            <p>Số lượng:<?php echo $row_chitiet['SLTonKho'] ?></p>
            <p>Danh mục :<?php echo $row_chitiet['Ten_DM'] ?></p>
            <p><input class="themgiohang" type="submit" name="themgiohang" value="Thêm Giỏ Hàng"></p>
        </div>
    </form>
 </div>
 <?php
    }
 ?>