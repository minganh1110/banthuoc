<?php
    $sql_lietke_ls = "SELECT DISTINCT * FROM LichSuDonHang, KhachHang WHERE LichSuDonHang.Ma_KH = KhachHang.Ma_KH  ORDER BY Ma_DonHang DESC";
    $result_lietke_ls= mysqli_query($khoitao,$sql_lietke_ls);
?>
<p>Lịch sử đơn hàng của người dùng</p>
<table style="width: 100%;" border="1" style="border-collapse:collapse;"> 
    <tr>
        <td>ID</td>
        <td>Mã đơn hàng</td>
        <td>Tên khách hàng</td>
        <td>Địa chỉ</td>
        <td>Tài khoản</td>
        <td>Điện thoại</td>
        <td>Ngày đặt hàng</td>
        <td>Số lượng bán</td>
        <td>Tổng tiền</td>
        <td>Tình trạng</td>
        <td colspan="2">Quản lý</td>
    </tr>
    <?php
    $i = 0;
    if(mysqli_num_rows($result_lietke_ls) > 0) {
        while($row = mysqli_fetch_array($result_lietke_ls)){
            $i++;
    ?>
    <tr>
        <td style="text-align: center;"><?php echo $i ?></td>
        <td style="text-align: center;"><?php echo $row['Ma_cart'] ?></td>
        <td style="text-align: center;"><?php echo $row['Ten_KH']?></td>
        <td><?php echo $row['DC_KH']?></td>
        <td style="text-align: center;"><?php echo $row['taikhoan']?></td>
        <td style="text-align: center;"><?php echo $row['SDT_KH']?></td>
        <td style="text-align: center;"><?php echo $row['NgayDatHang']?></td>
        <td style="text-align: center;"><?php echo $row['SLBan']?></td>
        <td style="text-align: center;"><?php echo number_format($row['TongTien'], 0, ',', '.') . ' VNĐ'?></td>
        <td style="text-align: center;">
            <?php 
            if($row['trangthai'] == 1){
                echo 'Đang giao hàng';
            } else {
                echo 'Đã hủy';
            }
            ?>
        </td>
        <td style="text-align: center;">
        <a href="modules/quanlylichsudonhang/xuly.php?&code=<?php echo $row['Ma_cart']?>">Hủy Đơn hàng</a>
        </td>
        <td style="text-align: center;"><a href="modules/quanlylichsudonhang/xuly.php?iddonhang=<?php echo $row['Ma_DonHang']?>">Xóa</a></td>
    </tr>
    <?php
        }
    } else {
        echo "<tr><td colspan='12'>Không có dữ liệu đơn hàng.</td></tr>";
    }
    ?>
</table>
