    <?php
        $sql_lietke_nguoidung="SELECT * FROM KhachHang ORDER BY Ma_KH DESC";
        $result_lietke_nguoidung= mysqli_query($khoitao,$sql_lietke_nguoidung);
    ?>
    <p>Danh sách người dùng</p>
    <table border="1">
        <tr>
            <th>ID</th>
            <th>Name </th>
            <th>Account</th>
            <th>Pass</th>
            <th>Gender</th>
            <th>Numberphone</th>
            <th>Address</th>
            <th colspan="2">Quản lý</th>
            

            
        </tr>
            <?php
                $i=0;
                if(mysqli_num_rows($result_lietke_nguoidung) > 0) {
                while($row=mysqli_fetch_array($result_lietke_nguoidung)){
                $i++;
                
            ?>
        
        <tr>
            <td style="height:100px;"> <?php echo $i ?></td>
            <td style="text-align: center;"> <?php echo $row ['Ten_KH']?></td>
            <td style="text-align: center;"> <?php echo $row ['taikhoan']?></td>
            <td style="text-align: center;"> <?php echo $row ['matkhau']?></td>
            <td style="text-align: center;"> <?php echo $row ['GT_KH']?></td>
            <td style="text-align: center;"> <?php echo $row ['SDT_KH']?></td>
            <td> <?php echo $row ['DC_KH']?></td>
            <td style="text-align: center;">
                    <a href="?action=quanlynguoidung&query=sua&idnguoidung=<?php echo $row['Ma_KH']?>">Sửa</a>
            </td>
            <td>
                    <a href="modules/quanlynguoidung/xuly.php?idnguoidung=<?php echo $row['Ma_KH']?>">Xóa</a>
            </td>
            
        </tr>


            <?php
                }
            }else {
                    echo "<tr><td colspan='9'>Không có dữ liệu nguoi dùng.</td></tr>";
                }
            ?>
    </table>
    