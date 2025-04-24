<?php
    $sql_sua_hoadon = "SELECT * FROM HoaDon WHERE Ma_HD='$_GET[idhoadon]' LIMIT 1";
    $result_sua_hoadon = mysqli_query($khoitao, $sql_sua_hoadon);
?>
<p>Xem hóa đơn</p>
<table border="1" width="50%" style="border-collapse: collapse;">
    <form method="POST" action="modules/quanlyhoadon/xuly.php?idhoadon=<?php echo $_GET['idhoadon']?>" enctype="multipart/form-data">
    <?php
        while ($row = mysqli_fetch_array($result_sua_hoadon)) {
    ?>
    <tr>
        <th colspan="2">Thông tin hóa đơn</th>
    </tr>
    <tr>
        <td>Mã hóa đơn</td>
        <td><input type="text" value="<?php echo $row['Ma_HD']; ?>" name="mahoadon"></td>
    </tr>
    <tr>
        <td>Mã khách hàng</td>
        <td><input type="text" value="<?php echo $row['Ma_KH']; ?>" name="makhachhang" readonly></td>
    </tr>
    <tr>
        <td>Mã giỏ hàng</td>
        <td><input type="text" value="<?php echo $row['Ma_cart']; ?>" name="magiohang" readonly></td>
    </tr>
    <tr>
        <td>Ngày lập hóa đơn</td>
        <td><input type="text" value="<?php echo $row['Ngaylap_HD']; ?>" name="ngaylaphoadon"></td>
    </tr>
    <tr>
        <td>Thanh toán</td>
        <td><input type="text" value="<?php echo $row['thanhtoan']; ?>" name="thanhtoan"></td>
    </tr>
    <tr>
    <td>Trạng thái</td>
    <td>
        <select name="trangthai">
            <option value="0" <?php if ($row['trangthai'] == 0) echo "selected"; ?>>0</option>
            <option value="1" <?php if ($row['trangthai'] == 1) echo "selected"; ?>>1</option>
        </select>
    </td>
</tr>
    <tr>
        <td colspan="2"><input type="submit" value="Sửa hóa đơn" name="suahoadon"></td>
    </tr>
    <?php
        }
    ?>
    </form>
</table>
