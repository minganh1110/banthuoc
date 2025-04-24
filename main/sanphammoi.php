<?php
    // GET id là lấy id từ bên MENU.php 
    $sql_show_new ="SELECT * FROM DanhMuc,SanPham WHERE SanPham.Ma_DM=DanhMuc.Ma_DM ORDER BY SanPham.Ma_SP DESC LIMIT 5";
    $query_show_new =mysqli_query($khoitao,$sql_show_new);
   
   
?>

<ul class="product_list">
    <?php
        while ($row=mysqli_fetch_array($query_show_new)){
    ?>
        <li>
            <a href="index.php?quanly=sanpham&id=<?php echo $row['Ma_SP'] ?>">
                <img src="admincp/modules/quanlysp/uploads/<?php echo $row['hinhanh'] ?>">
                <p class="title_product"> <?php echo $row['Ten_SP'] ?></p>
                <p class="price_product">Giá: <?php echo number_format($row['Gia'],0,',','.').'vnd' ?></p>
                <p class="title_product">Số lượng: <?php echo $row['SLTonKho'] ?></p>
                <p class="title_product"><?php echo $row['Ten_DM']?></p>
            </a>

        </li>

    <?php
        }
    ?>
</ul>
