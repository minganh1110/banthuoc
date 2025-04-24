<p>Thêm khách hàng</p>
<table border="1" width="50%" style="border-collapse: collapse;">
    <form method="POST" action="modules/quanlynguoidung/xuly.php">
        <tr>
            <th colspan="2">Điền thông tin khách hàng</th>
        </tr>
        <tr>
            <td>Tên khách hàng</td>
            <td><input type="text" size="50" name="hovaten"></td>
        </tr>
        <tr>
            <td>Tài khoản</td>
            <td><input type="text" size="50" name="taikhoan"></td>
        </tr>
        <tr>
            <td>Mật khẩu</td>
            <td><input type="password" size="50" name="matkhau"></td>
        </tr>
        <tr>
            <td>Giới tính</td>
            <td>
                <select name="gioitinh">
                    <option value="Nam">Nam</option>
                    <option value="Nữ">Nữ</option>
                    <option value="Khác">Khác</option>
                </select>
            </td>
        </tr>
        <tr>
            <td>Số điện thoại</td>
            <td><input type="text" size="50" name="sodienthoai"></td>
        </tr>
        <tr>
            <td>Địa chỉ</td>
            <td><textarea name="diachi" cols="47" rows="10" style="resize: none;"></textarea></td>
        </tr>
        <tr>
            <td colspan="2"><input type="submit" value="Thêm khách hàng" name="themnguoidung"></td>
        </tr>
    </form>
</table>
