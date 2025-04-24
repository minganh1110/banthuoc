<?php
	$sql_nguoidung="SELECT * FROM KhachHang WHERE Ma_KH='$_GET[idnguoidung]' LIMIT 1";
	$querynd=mysqli_query($khoitao,$sql_nguoidung);
	
?>
<h3>SỬA NGƯỜI DÙNG</h3>

<form action="modules/quanlynguoidung/xuly.php?idnguoidung=<?php echo $_GET['idnguoidung'] ?>" method="POST" enctype="multipart/form-data">
<table   width="50%" style="border-collapse: collapse;">
	<?php
	
	 	while($nguoidung =mysqli_fetch_array($querynd)){
	
	?>

	<tr>
		<td>Name</td>
		<td><input type="text" size="50" name="hovaten"	value="<?php echo $nguoidung['Ten_KH']?>"></td>
	</tr>
    <tr>
		<td>Account</td>
		<td><input type="text" size="50" name="taikhoan" value="<?php echo $nguoidung['taikhoan']?>"></td>
	</tr>
	<tr>
        <td>Password</td>
        <td><input type="password" size="50" name="matkhau" value="<?php echo $nguoidung['matkhau']?>"></td>
    </tr>
	<tr>
		<td>Gender</td>
		<td><input type="text" size="10" name="gioitinh" value="<?php echo $nguoidung['GT_KH']?>">
				<select name="gioitinh">
                    <option value="Nam">Nam</option>
                    <option value="Nữ">Nữ</option>
                    <option value="Khác">Khác</option>
                </select>
		</td>
                
	</tr>
	<tr>
		<td>Number Phone</td>
		<td><input type="text" size="50" name="sodienthoai" value="<?php echo $nguoidung['SDT_KH']?>">	</td>
	</tr>
	<tr>
		<td>Address</td>
		<td><textarea name="diachi"  cols="47" rows="10" style="resize: none;">
					<?php echo $nguoidung['DC_KH']?>
			</textarea></td>
	</tr>
	
	<tr>
		
		<td colspan="2" style="text-align: center;"><input type="submit" name="suanguoidung" value="Sửa"></td>
		
	</tr>
</table>

</form>
<?php
	 }
	
	?>