<?php  
    
    $sql_lietke_sp="SELECT * FROM DanhMuc,SanPham WHERE SanPham.Ma_DM=DanhMuc.Ma_DM ORDER BY SanPham.Ma_SP DESC";
    $result_lietke_sp= mysqli_query($khoitao,$sql_lietke_sp);
?>
<p>Liệt kê danh mục sản phẩm</p>
 <table style="width: 100%;" border="1" style="border-collapse:collapse;"> 
     <tr>
         <td>ID</td>
         <td>Tên sản phảm</td>
         <td>Hình ảnh </td>
         <td>Giá sản phẩm</td>
         <td>Số lượng</td>
         <td>Danh mục</td>
         <td>Tên Thuốc</td>
         <td>Quản lý</td>
     </tr>
     <?php
    $i=0;
    if(mysqli_num_rows($result_lietke_sp) > 0) {
    while($row=mysqli_fetch_array($result_lietke_sp)){
        $i++;
    
     ?>
     <tr>
         <td style="text-align: center;"><?php echo $i ?></td>
         <td style="width:80px;height:150px; text-align: center;">
                            <?php echo $row['Ten_SP'] ?>   
         </td>
         
         <td style="width:150px;height:150px;" >
                            <img src="modules/quanlysp/uploads/<?php echo $row['hinhanh'] ?> " width="100%" >   
         </td>

         <td style="width:150px;text-align: center;">
                            <?php echo number_format($row['Gia'],0,',','.').'VNĐ'  ?>   
         </td>
         <td style="text-align: center;"><?php echo $row['SLTonKho'] ?>      </td>
         <td style="text-align: center;"><?php echo $row['Ten_DM'] ?>      </td>
         <td style="text-align: center;"><?php echo $row['TenThuoc'] ?>    </td>
         <td style="text-align: center;">
             <a href="?action=quanlysanpham&query=sua&idsanpham=<?php echo $row['Ma_SP']?>">Sửa</a> |
             <a href="modules/quanlysp/xuly.php?idsanpham=<?php echo $row['Ma_SP']?>">Xóa</a>
         </td>
     </tr>

     <?php
        }
    }else {
        echo "<tr><td colspan='9'>Không có dữ liệu sản phẩm.</td></tr>";
    }
    ?>
 </table>