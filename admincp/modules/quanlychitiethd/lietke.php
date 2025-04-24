<?php
    // Truy vấn SQL để lấy danh sách chi tiết hóa đơn từ bảng ChiTietHD
    $sql_lietke_chitiet = "SELECT * FROM HoaDon,SanPham,ChiTietHD WHERE HoaDon.Ma_HD=ChiTietHD.Ma_HD AND SanPham.Ma_SP=ChiTietHD.Ma_SP ORDER BY ChiTietHD.Ma_HD DESC, ChiTietHD.Ma_SP DESC";
    $result_lietke_chitiet = mysqli_query($khoitao, $sql_lietke_chitiet);
?>
<p>Danh sách chi tiết hóa đơn</p>
<table border="1">
    <tr>
        <th>ID</th>
        <th>Mã Hóa đơn</th>
        <th>Mã Sản phẩm</th>
        <th>Mã Giỏ hàng</th>
        <th>Số lượng bán</th>
        <th>Tổng tiền</th>
        <th colspan="2">Quản lý</th>
    </tr>
    <?php
        $i=0;
        if(mysqli_num_rows($result_lietke_chitiet) > 0) {
            while($row = mysqli_fetch_array($result_lietke_chitiet)) {
                $i++;
    ?>
    <tr>

        <td style="text-align: center;"><?php echo $i; ?></td>
        <td style="text-align: center;"><?php echo $row['Ma_HD']; ?></td>
        <td style="text-align: center;"><?php echo $row['Ma_SP']; ?></td>
        <td style="text-align: center;"><?php echo $row['Ma_cart']; ?></td>
        <td style="text-align: center;"><?php echo $row['SLBan']; ?></td>
        <td style="text-align: center;"><?php echo $row['TongTien']; ?></td>
        <td style="text-align: center;">
            <a href="?action=quanlychitiethd&query=sua&idchitiethd=<?php echo $row['Ma_HD']; ?>">Sủa</a>
        </td>
        <td style="text-align: center;">
            <a href="modules/quanlychitiethd/xuly.php?idchitiethd=<?php echo $row['Ma_HD']; ?>">Xóa</a>
        </td>
    </tr>
    <?php
            }
        } else {
            echo "<tr><td colspan='7'>Không có dữ liệu chi tiết hóa đơn.</td></tr>";
        }
    ?>
</table>
