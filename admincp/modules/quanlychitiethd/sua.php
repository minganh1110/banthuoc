<?php
    $sql_sua_chitiet="SELECT * FROM ChiTietHD,SanPham WHERE ChiTietHD.Ma_SP=SanPham.Ma_SP AND ChiTietHD.Ma_HD='$_GET[idchitiethd]' LIMIT 1";
    $result_sua_chitiet= mysqli_query($khoitao,$sql_sua_chitiet);
?>
<p>Sửa chi tiết hóa đơn</p>
<table border="1" width="50%" style="border-collapse: collapse;">
    <form method="POST" action="modules/quanlychitiethd/xuly.php?idchitiethd=<?php echo $_GET['idchitiethd']?>" enctype="multipart/form-data">
    <?php
        while($row =mysqli_fetch_array($result_sua_chitiet)){
    ?>
    <tr>
        <th colspan="2">Thông tin chi tiết hóa đơn</th>
    </tr>
    <tr>
        <td>Số lượng bán</td>
        <td><input type="text" value="<?php echo $row['SLBan']?>" name="soluongban" id="soluongban" onchange="tinhTongTien()" ></td>
    </tr>
    <tr>
        <td>Tổng tiền</td>
        <td><input type="text" value="<?php echo $row['TongTien']?>" name="tongtien" id="tongtien"  readonly></td>
    </tr>
    <tr>
        <td colspan="2"><input type="submit" value="Sửa chi tiết hóa đơn" name="suachitiet"></td>
    </tr>
    <script>
    function tinhTongTien() {
        var soluong = document.getElementById("soluongban").value;
        var gia = <?php echo $row['Gia']?>; // Giá của sản phẩm lấy từ PHP

        // Tính toán tổng tiền
        var tongtien = soluong * gia;

        // Hiển thị tổng tiền vào trường tổng tiền
        document.getElementById("tongtien").value = tongtien;
    }
</script>
    <?php
        }
    ?>
    </form>
</table>
