 <p>Xem đơn hàng</p>
 <?php
    $code=$_GET['code'];
    $sql_lietke_dh="SELECT * FROM HoaDon,ChiTietHD,SanPham  WHERE ChiTietHD.Ma_SP=SanPham.Ma_SP
        AND HoaDon.Ma_HD= ChiTietHD.Ma_HD
        AND ChiTietHD.Ma_cart='$code'
        ORDER By ChiTietHD.Ma_HD DESC";
    $result_lietke_dh= mysqli_query($khoitao,$sql_lietke_dh);

?>
<p>Liệt kê danh mục sản phẩm</p>
<table style="width: 100%;" border="1" style="border-collapse:collapse;"> 
    <tr>
        <td>ID</td>
        <td>Mã đơn hàng</td>
        <td>Tên Sản phẩm</td>
        <td>Hình </td>
        <td>Số lượng</td>
        <td>Đơn giá</td>
        <td>Thành tiền</td> 
    </tr>
    <?php
    $i=0;
    $tongtien=0;
    while($row=mysqli_fetch_array($result_lietke_dh)){
        $i++;
        $thanhtien= $row['Gia'] * $row['SLBan'];
        $tongtien+=$thanhtien;
    ?>
    <tr>
        <td><?php echo $i ?></td>
        <td><?php echo $row['Ma_cart'] ?></td>
        <td><?php echo $row['Ten_SP']?></td>
        <td style="width:150px;height:150px;">
            <img src="modules/quanlysp/uploads/<?php echo $row['hinhanh'] ?>" width="100%">
        </td>
        <td><?php echo $row['SLBan']?></td>
        <td><?php echo number_format($row['Gia'],0,',','.').'VNĐ' ?></td>
        <td><?php echo number_format($thanhtien,0,',','.').'VNĐ' ?></td>
    </tr>
    <?php
        }
    ?>
    <tr>
        <th colspan="7">Tổng tiền : <?php echo number_format($tongtien,0,',','.').'VNĐ' ?></th>
    </tr>
    <tr></tr>
</table>