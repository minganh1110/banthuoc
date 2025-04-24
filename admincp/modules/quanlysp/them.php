 <p>Thêm sản phẩm</p>
 <table border="1" width="50%" style="border-collapse: collapse;">
   <form method="POST" action="modules/quanlysp/xuly.php" enctype="multipart/form-data">
    <tr>
        <th colspan="2">Điền sản phẩm</th>
    </tr>
    <tr>
        <td>Tên sản phẩm</td>
        <td><input type="text" name="tensanpham" ></td>
    </tr>
    <tr>
        <td>Tên Thuốc</td>
        <td><input type="text" name="masp" ></td>
    </tr>
    <tr>
        <td>Giá</td>
        <td><input type="number" name="giasp" ></td>
    </tr>
    <tr>
        <td>Số lượng</td>
        <td><input type="text" name="soluong" ></td>
    </tr>
    <tr>
        <td>Hình ảnh</td>
        <td><input type="file" name="hinhanh" ></td>
        
    </tr>
    <tr>
        <td>Danh mục sản phẩm</td>
        <td>
          <select name="danhmuc">
                <?php
                    $sql_danhmuc="SELECT * FROM DanhMuc ORDER BY Ma_DM DESC";
                    $query_danhmuc=mysqli_query($khoitao,$sql_danhmuc);
                    while($row_danhmuc=mysqli_fetch_array($query_danhmuc)){
                ?>
                <!--dùng value thêm danh mục dựa vào địa chỉ Ma_SP -->
                <option value="<?php echo $row_danhmuc['Ma_DM']?>"><?php echo $row_danhmuc['Ten_DM']?></option>
            

                <?php
                    }
                ?>
          </select>
        </td>
    </tr>
    <tr>

        <td colspan="2"><input type="submit" value="Thêm sản phẩm" name="themsanpham"></td>
    </tr>
</form>
 </table>