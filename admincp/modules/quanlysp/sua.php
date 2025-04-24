<?php
    $sql_sua_sp="SELECT * FROM SanPham WHERE Ma_SP='$_GET[idsanpham]' LIMIT 1";
    $result_sua_sp= mysqli_query($khoitao,$sql_sua_sp);
?>
 <p>Sủa danh mục sản phẩm</p>
 <table border="1" width="50%" style="border-collapse: collapse;">
    <form method="POST" action="modules/quanlysp/xuly.php?idsanpham=<?php echo $_GET['idsanpham']?>" enctype="multipart/form-data">
 <?php
    while($row =mysqli_fetch_array($result_sua_sp)){
        

?>
   
    <tr>
        <th colspan="2">Điền sản phẩm</th>
    </tr>
    <tr>
        <td>Tên sản phẩm</td>
        <td><input type="text"  value="<?php echo $row['Ten_SP']?>" name="tensanpham" ></td>
    </tr>
    <tr>
        <td>Mã sản phẩm</td>
        <td><input type="text" name="masp" value="<?php echo $row['TenThuoc']?>" ></td>
    </tr>
    <tr>
        <td>Giá</td>
        <td><input type="number" name="giasp" value="<?php echo $row['Gia']?>"></td>
    </tr>
    <tr>
        <td>Số lượng</td>
        <td><input type="text" name="soluong" value="<?php echo $row['SLTonKho']?>"></td>
    </tr>
    <tr>
        <td>Hình ảnh</td>
        <td><input type="file" name="hinhanh" >
        <img src="modules/quanlysp/uploads/<?php echo $row['hinhanh'] ?> " width="150px" >
    </td>
    </tr>
    <tr>
        <td>Danh mục sản phẩm</td>
        <td>
          <select name="danhmuc">
                <?php
                    $sql_danhmuc="SELECT * FROM DanhMuc ORDER BY Ma_DM DESC";
                    $query_danhmuc=mysqli_query($khoitao,$sql_danhmuc);
                    while($row_danhmuc=mysqli_fetch_array($query_danhmuc)){
                        if($row_danhmuc['Ma_DM']==$row['Ma_DM']){
                ?>
                <!--dùng value thêm danh mục dựa vào địa chỉ Ma_SP -->
                <option value="<?php echo $row_danhmuc['Ma_DM']?>" selected><?php echo $row_danhmuc['Ten_DM']?></option>
                <?php
                        }else{
                        
                ?>
                <option value="<?php echo $row_danhmuc['Ma_DM']?>"><?php echo $row_danhmuc['Ten_DM']?></option>
                <?php
                        }
                    }
                ?>
          </select>
        </td>
    </tr>
    <tr>

        <td colspan="2"><input type="submit" value="Sửa sản phẩm" name="suasanpham" onClick="sua"></td>
    </tr>
</form>
<?php
}
?>
 </table>
