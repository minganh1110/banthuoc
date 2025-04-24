<?php
    $sql_sua_danhmuc="SELECT * FROM DanhMuc WHERE Ma_DM='$_GET[iddanhmuc]' LIMIT 1";
    $result_sua_danhmuc= mysqli_query($khoitao,$sql_sua_danhmuc);
?>
<p>Sửa danh mục</p>
<table border="1" width="50%" style="border-collapse: collapse;">
    <form method="POST" action="modules/quanlydanhmuc/xuly.php?iddanhmuc=<?php echo $_GET['iddanhmuc']?>" enctype="multipart/form-data">
    <?php
        while($row =mysqli_fetch_array($result_sua_danhmuc)){
    ?>
    <tr>
        <th colspan="2">Thông tin danh mục sản phẩm</th>
    </tr>
    <tr>
        <td>Tên danh mục</td>
        <td><input type="text" value="<?php echo $row['Ten_DM']?>" name="tendanhmuc" ></td>
    </tr>
    <tr>
        <td>Thứ tự</td>
        <td><input type="text" value="<?php echo $row['thutu']?>" name="thutu" ></td>
    </tr>
    <tr>
        <td colspan="2"><input type="submit" value="Sửa danh mục" name="suadanhmuc"></td>
    </tr>
    <?php
        }
    ?>
    </form>
</table>