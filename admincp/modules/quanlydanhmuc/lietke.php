<?php  
    $sql_lietke_danhmuc = "SELECT * FROM DanhMuc";
    $result_lietke_danhmuc = mysqli_query($khoitao, $sql_lietke_danhmuc);
?>

<p>Liệt kê danh mục sản phẩm</p>
<table border="1">
    <tr>
        <th>ID</th>
        <th>Tên danh mục</th>
        <th>Thứ tự</th>
        <th>Quản lý</th>
    </tr>
    <?php
    $i = 0;
    if(mysqli_num_rows($result_lietke_danhmuc) > 0) {
        while($row_danhmuc = mysqli_fetch_array($result_lietke_danhmuc)) {
            $i++;
    ?>
    <tr>
        <td style="text-align: center;"><?php echo $i ?></td>
        <td style="text-align: center;"><?php echo $row_danhmuc['Ten_DM'] ?></td>
        <td style="text-align: center;"><?php echo $row_danhmuc['thutu'] ?></td>
        <td style="text-align: center;">
            <a href="?action=quanlydanhmuc&query=sua&iddanhmuc=<?php echo $row_danhmuc['Ma_DM'] ?>">Sửa</a> |
            <a href="modules/quanlydanhmuc/xuly.php?iddanhmuc=<?php echo $row_danhmuc['Ma_DM'] ?>">Xóa</a>
        </td>
    </tr>
    <?php
        }
    } else {
        echo "<tr><td colspan='4'>Không có dữ liệu danh mục sản phẩm.</td></tr>";
    }
    ?>
</table>
