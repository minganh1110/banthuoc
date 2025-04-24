<?php
    // Truy vấn SQL để lấy danh sách hóa đơn từ bảng HoaDon
    $sql_lietke_hoadon = "SELECT * FROM HoaDon ORDER BY Ma_HD DESC";
    $result_lietke_hoadon = mysqli_query($khoitao, $sql_lietke_hoadon);
?>
<p>Danh sách hóa đơn</p>
<table border="1">
    <tr>
        <th>ID</th>
        <th>Mã Hóa Đon</th>
        <th>Mã Khách hàng</th>
        <th>Mã Giỏ hàng</th>
        <th>Ngày lập HĐ</th>
        <th>Thanh toán</th>
        <th>Trạng thái</th>
        <th colspan="2">Quản lý</th>
    </tr>
    <?php
        $i = 0;
        if(mysqli_num_rows($result_lietke_hoadon) > 0) {
            while($row = mysqli_fetch_array($result_lietke_hoadon)) {
                $i++;
    ?>
    <tr>
        <td style="height:100px; text-align: center;"><?php echo $i; ?></td>
        <td style="text-align: center;"><?php echo $row['Ma_HD']; ?></td>
        <td style="text-align: center;"><?php echo $row['Ma_KH']; ?></td>
        <td style="text-align: center;"><?php echo $row['Ma_cart']; ?></td>
        <td style="text-align: center;"><?php echo $row['Ngaylap_HD']; ?></td>
        <td style="text-align: center;"><?php echo $row['thanhtoan']; ?></td>
        <td style="text-align: center;"><?php echo $row['trangthai']; ?></td>
        <td style="text-align: center;">
            <a href="?action=quanlyhoadon&query=sua&idhoadon=<?php echo $row['Ma_HD']; ?>">Sủa</a>
        </td>
        <td style="text-align: center;">
            <a href="modules/quanlyhoadon/xuly.php?idhoadon=<?php echo $row['Ma_HD']; ?>">Xóa</a>
        </td>
    </tr>
    <?php
            }
        } else {
            echo "<tr><td colspan='8'>Không có dữ liệu hóa đơn.</td></tr>";
        }
    ?>
</table>