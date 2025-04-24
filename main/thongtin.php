 <style>
     .thongtin{
         width: 50%;
         height: 100%;
         border: 1px solid black;
         text-align: center;
         border-radius: 15px;
     }
 </style>
 
 <p>Thông tin cá nhân </p>
<div class="thongtin">
 <p><?php
        if(isset($_SESSION['dangky'])){
            echo 'xin chào: '.'<span style="color:red">'.$_SESSION['dangky'].'</span>';
            $id =$_SESSION['dangky'];
            $sql_thongtin ="SELECT * FROM KhachHang WHERE taikhoan='$id' LIMIT 1";
            $query_thongtin=mysqli_query($khoitao,$sql_thongtin);
            
            while($row=mysqli_fetch_array($query_thongtin)){
            
        
  ?></p><br>
    

    <p>Họ và tên : <?php echo $row['Ten_KH']  ?></p>
    <p>Giói Tính : <?php echo $row['GT_KH']  ?></p>
    <p>Số điện thoại : <?php echo $row['SDT_KH']  ?></p>
    <p>Địa chỉ : <?php echo $row['DC_KH']  ?></p>
    


<?php
            }
    }

    ?>
</div>