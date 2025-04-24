<p>Thêm nhân viên</p>
<table border="1" width="50%" style="border-collapse: collapse;">
    <form method="POST" action="modules/quanlynhanvien/xuly.php">
        <tr>
            <th colspan="2">Điền thông tin nhân viên</th>
        </tr>
        <tr>
            <td>Tên nhân viên</td>
            <td><input type="text" size="50" name="tennv"></td>
        </tr>
        <tr>
            <td>Giới tính</td>
            <td>
                <select name="gioitinh">
                    <option value="Nam">Nam</option>
                    <option value="Nữ">Nữ</option>
                    <option value="Khác">Khác</option>
                </select>
        </tr>
        <tr>
            <td>Năm sinh</td>
            <td><input type="text" size="50" name="namsinh"></td>
        </tr>
        <tr>
            <td>Ngày vào làm</td>
            <td><input type="text" size="50" name="ngayvaolam"></td>
        </tr>
        <tr>
            <td>Số điện thoại</td>
            <td><input type="text" size="50" name="sodienthoai"></td>
        </tr>
        <tr>
            <td>Số CMND</td>
            <td><input type="text" size="50" name="socmnd"></td>
        </tr>
        <tr>
            <td>Địa chỉ</td>
            <td><textarea name="diachi"  cols="47" rows="10" style="resize: none;">
			</textarea></td>
        </tr>
        <tr>
            <td colspan="2"><input type="submit" value="Thêm nhân viên" name="themnhanvien"></td>
        </tr>
    </form>
</table>
