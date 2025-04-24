<?php
    // GET id là lấy id từ bên MENU.php 
    $sql_show ="SELECT * FROM SanPham WHERE Ma_SP='$_GET[id]' ORDER BY Ma_SP DESC";
    $query_show =mysqli_query($khoitao,$sql_show);
   
    //get ten danh muc
    $sql_cate ="SELECT * FROM DanhMuc WHERE Ma_DM='$_GET[id]' LIMIT 1";
    $query_cate =mysqli_query($khoitao,$sql_cate);
    $row_title =mysqli_fetch_array($query_cate);
?>
<h3> Danh muc : 
    <?php 
            if(isset($row_title['Ten_DM'])){
                echo $row_title['Ten_DM'];
            }else{
                echo "lỗi không lấy được data";
            }
    ?>

</h3>
<ul class="product_list">
    <?php
        while($row_pro=mysqli_fetch_array($query_show)){
    ?>
                    <li> 
                        <a href="index.php?quanly=sanpham&id=<?php echo $row_pro['Ma_SP'] ?>">
                            <img src="admincp/modules/quanlysp/uploads/<?php echo $row_pro['hinhanh'] ?>">
                            <p class="title_product"> <?php echo $row_pro['Ten_SP'] ?></p>
                            <p class="title_product">Số lượng: <?php echo $row_pro['SLTonKho'] ?></p>
                            <p class="price_product">Giá: <?php echo number_format($row_pro['Gia'],0,',','.').'vnd' ?></p>
                        </a>
                    </li>
    <?php
        }
    ?>
                   
</ul>
