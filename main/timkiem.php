<?php
	if(isset($_POST['timkiem'])){
		$tukhoa = $_POST['tukhoa'];
		$sql_pro = "SELECT * FROM DanhMuc,SanPham WHERE SanPham.Ma_DM=DanhMuc.Ma_DM AND Ten_SP LIKE '%".$tukhoa."%'";
		$query_pro = mysqli_query($khoitao,$sql_pro);
		if(mysqli_num_rows($query_pro) > 0) {
	?>
	<h3>Từ khoá tìm kiếm : <?php echo $_POST['tukhoa']; ?></h3>
	<ul class="product_list">
		<?php
		while($row = mysqli_fetch_array($query_pro)){ 
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
	<?php
		} else {
			echo "Không tìm thấy sản phẩm nào phù hợp!";
		}
	}
	?>
