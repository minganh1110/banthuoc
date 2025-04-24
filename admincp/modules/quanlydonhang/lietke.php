<?php
    $sql_lietke_dh="SELECT * FROM HoaDon,KhachHang  WHERE HoaDon.Ma_KH=KhachHang.Ma_KH ORDER BY Ma_HD DESC";
    $result_lietke_dh= mysqli_query($khoitao,$sql_lietke_dh);
?>
<p>Danh sách đơn hàng của người dùng</p>
 <table style="width: 100%;" border="1" style="border-collapse:collapse;"> 
     <tr>
         <td>ID</td>
         <td>Mã đơn hàng</td>
         <td>Tên khách hàng</td>
         <td>Địa chỉ</td>
         <td>Tài khoản</td>
         <td>Hình thức thanh toán</td>
         <td>Điện thoại</td>
         <td>Tinh Trạng </td>
         <td colspan="2">Quản lý </td>
     </tr>
     <?php
    $i = 0;
    if(mysqli_num_rows($result_lietke_dh) > 0) {
        while($row = mysqli_fetch_array($result_lietke_dh)){
            $i++;
    ?>
    <tr>
        <td style="text-align: center;"><?php echo $i ?></td>
        <td style="text-align: center;"><?php echo $row['Ma_cart'] ?></td>
        <td style="text-align: center;"><?php echo $row['Ten_KH']?></td>
        <td><?php echo $row['DC_KH']?></td>
        <td style="text-align: center;"><?php echo $row['taikhoan']?></td>
        <td style="text-align: center;"><?php echo $row['thanhtoan']?></td>
        <td style="text-align: center;"><?php echo $row['SDT_KH']?></td>
        <td style="text-align: center;">
            <?php 
            if($row['trangthai'] == 1){
                echo '<a href="modules/quanlydonhang/xuly.php?code='.$row['Ma_cart'].'">Đơn hàng mới</a>';
            } else {
                echo 'Đã xem';
            }
            ?>
        </td>
        <td style="text-align: center;">
            <a href="index.php?action=quanlydonhang&query=xemdonhang&code=<?php echo $row['Ma_cart']?>">Xem đơn hàng</a>
            <!-- <a href="modules/quanlydonhang/xuly.php?iddonhang=<?php echo $row['Ma_cart']?>">Xóa</a> -->
        </td>
        <td style="text-align: center;"><a href="modules/quanlydonhang/xuly.php?iddonhang=<?php echo $row['Ma_cart']?>">Xóa</a> </td>
    </tr>
    <?php
        }
    } else {
        echo "<tr><td colspan='9'>Không có dữ liệu đơn hàng.</td></tr>";
    }
    ?>
</table>