<?php
	$sql_nhanvien="SELECT * FROM NhanVien WHERE Ma_NV='$_GET[idnhanvien]' LIMIT 1";
	$querynd=mysqli_query($khoitao,$sql_nhanvien);
	
?>
<h3>SỬA NHÂN VIÊN</h3>

<form action="modules/quanlynhanvien/xuly.php?idnhanvien=<?php echo $_GET['idnhanvien'] ?>" method="POST" enctype="multipart/form-data">
<table   width="50%" style="border-collapse: collapse;">
	<?php
	
	 	while($nhanvien =mysqli_fetch_array($querynd)){
	
	?>

	<tr>
		<td>Name</td>
		<td><input type="text" size="50" name="tennv"	value="<?php echo $nhanvien['Ten_NV']?>"></td>
	</tr>
    <tr>
		<td>Gender</td>
            <td>
                <select name="gioitinh">
                    <option value="Nam">Nam</option>
                    <option value="Nữ">Nữ</option>
                    <option value="Khác">Khác</option>
                </select>
		
	</tr>
	<tr>
		<td>NamSinh</td>
		<td><input type="text" size="50" name="namsinh" value="<?php echo $nhanvien['NamSinh_NV']?>">		</td>
	</tr>
	<tr>
		<td>NumberPhone</td>
		<td><input type="text" size="50" name="sodienthoai" value="<?php echo $nhanvien['SDT_NV']?>">	</td>
	</tr>
	<tr>
		<td>NgayVao</td>
		<td><input type="text" size="50" name="ngayvaolam" value="<?php echo $nhanvien['NgayVao_NV']?>">	</td>
	</tr>
	<tr>
		<td>CMND</td>
		<td><input type="text" size="50" name="socmnd" value="<?php echo $nhanvien['Cmnd_NV']?>">	</td>
	</tr>
	<tr>
		<td>Address</td>
		<td><textarea name="diachi"  cols="47" rows="10" style="resize: none;">
					<?php echo $nhanvien['DC_NV']?>
			</textarea></td>
	</tr>
	
	<tr>
		
		<td colspan="2" style="text-align: center;"><input type="submit" name="suanhanvien" value="Sửa"></td>
		
	</tr>
</table>

</form>
<?php
	 }
	
	?>