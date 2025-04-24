    <?php
        $sql_lietke_nhanvien="SELECT * FROM NhanVien ORDER BY Ma_NV DESC";
        $result_lietke_nhanvien= mysqli_query($khoitao,$sql_lietke_nhanvien);
    ?>
    <p>Danh sách nhân viên</p>
    <table border="1">
        <tr>
            <th>ID</th>
            <th>Name </th>
            <th>Gender</th>
            <th>NamSinh</th>
            <th>Numberphone</th>
            <th>NgayVao</th>
            <th>CMND</th>
            <th>Address</th>
            <th colspan="2">Quản lý</th>
            

            
        </tr>
            <?php
                $i=0;
                if(mysqli_num_rows($result_lietke_nhanvien) > 0) {
                while($row=mysqli_fetch_array($result_lietke_nhanvien)){
                $i++;
                
            ?>
        
        <tr>
            <td style="height:100px;"> <?php echo $i ?></td>
            <td style="text-align: center;"> <?php echo $row ['Ten_NV']?></td>
            <td style="text-align: center;"> <?php echo $row ['GT_NV']?></td>
            <td style="text-align: center;"> <?php echo $row ['NamSinh_NV']?></td>
            <td style="text-align: center;"> <?php echo $row ['SDT_NV']?></td>
            <td style="text-align: center;"> <?php echo $row ['NgayVao_NV']?></td>
            <td style="text-align: center;"> <?php echo $row ['Cmnd_NV']?></td>
            <td> <?php echo $row ['DC_NV']?></td>
            <td style="text-align: center;">
                    <a href="?action=quanlynhanvien&query=sua&idnhanvien=<?php echo $row['Ma_NV']?>">Sửa</a>
            </td>
            <td style="text-align: center;">
                    <a href="modules/quanlynhanvien/xuly.php?idnhanvien=<?php echo $row['Ma_NV']?>">Xóa</a>
            </td>
            
        </tr>


            <?php
                }
            }else {
                echo "<tr><td colspan='9'>Không có dữ liệu nhân viên.</td></tr>";
            }
            ?>
    </table>
    