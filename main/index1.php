<?php
$severname="localhost";
$username="root";
$password="";
$database="banthuoc";

$khoitao= new mysqli($severname,$username,$password,$database);
if(mysqli_connect_errno()){
    echo "loi ket noi".mysqli_connect_error();
    exit();
}
    // GET id là lấy id từ bên MENU.php 
    $sql_show ="SELECT * FROM DanhMuc,SanPham WHERE SanPham.Ma_DM=DanhMuc.Ma_DM ORDER BY SanPham.Ma_SP DESC LIMIT 10";
    $query_show =mysqli_query($khoitao,$sql_show);
   
   
?>

<ul class="product_list">

    <?php
        while ($row=mysqli_fetch_array($query_show)){
    ?>
        <li>
            <a href="index.php?quanly=sanpham&id=<?php echo $row['Ma_SP'] ?>">
                <img src="admincp/modules/quanlysp/uploads/<?php echo $row['hinhanh'] ?>">
                <p class="title_product"> <?php echo $row['Ten_SP'] ?></p>
                <p class="price_product">Giá: <?php echo number_format($row['Gia'],0,',','.').'vnd' ?></p>
                <p class="title_product">Số lượng:<?php echo $row['SLTonKho'] ?></p>
				<p class="title_product"><?php echo $row['Ten_DM']?></p>
            </a>

        </li>

    <?php
        }
    ?>
</ul>
<div style="clear:both;"></div>