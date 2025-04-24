   
    <p>Giỏ hàng</p>
          
    <p><?php
        if(isset($_SESSION['dangky'])){
            echo 'xin chào: '.'<span style="color:red">'.$_SESSION['dangky'].'</span>';
        
        } 
  ?></p>

    <?php
            if(isset($_SESSION['cart'])){

                
            }

    ?>
    <table border="1" style="width:100%;">
        <tr>
            <th>ID</th>
            <th>TenSP :</th>
            <th>Tên thuốc</th>
            <th>Hình</th>
            <th>Số lượng</th>
            <th>Giá :</th>
            <th>Thành tiền</th>
            <th></th>
        </tr>
    <?php
        if(isset($_SESSION['cart'])){
            $i=0;
            $tongtien=0;
            foreach($_SESSION['cart'] as $cart_item){
                $thanhtien = $cart_item['SLTonKho'] * $cart_item['Gia'];
                $tongtien+=$thanhtien;
                $i++;
    ?>
        <tr>
            <td><?php echo $i ?></td>
            <!-- ở đây lấy dữ liêu cart_item['masp'] từ themgiohang.php -->
            <td><?php echo $cart_item['masp']?></td>
            <td><?php echo $cart_item['Ten_SP'] ?></td>
            <td><img src="admincp/modules/quanlysp/uploads/<?php echo $cart_item['hinhanh'] ?>" width="100%" style="height:200px"></td>

            <td>
                <a href="main/giohang/suasoluong.php?cong=<?php echo $cart_item['id'] ?>"><i class="fa-solid fa-plus"></i></a>
                <?php echo $cart_item['SLTonKho'] ?>
                <a href="main/giohang/suasoluong.php?tru=<?php echo $cart_item['id'] ?>"><i class="fa-solid fa-minus"></i></a>
            </td>

            <td><?php echo number_format($cart_item['Gia'],0,',','.') . ' VNĐ'?></td>
            <td><?php  echo number_format($thanhtien,0,',','.') . ' VNĐ' ?></td>
            <td><a href="main/giohang/xoasanpham.php?xoa=<?php echo $cart_item['id'] ?>">XÓA</a></td>
        </tr>


    <?php 
            }
    ?>

        <tr>
            <td colspan="8">
                <p style="float: left;"> Tổng tiền : <?php echo number_format($tongtien,0,',','.') . ' VNĐ'  ?></p>
                <p style="float: right;"><a href="main/giohang/xoahetgiohang.php?xoatatca=xoahet">Xóa Hêt</a></p>
                <div style="clear:both;"> </div>

                    <?php
                            if(isset($_SESSION['dangky'])){
                                
                    ?>
                            <p><a href="main/thanhtoan/vanchuyen.php">Đặt hàng</a></p>
                    <?php
                    }else{
                    
                    ?>
                         <p><a href="dangnhap.php">Đăng nhập đặt hàng</a></p>
                    <?php
                     }

                    ?>
               
                
            </td>
        
        </tr>

    <?php
            
        }else{

        
    ?>



        <tr>
            <td colspan="6">Hiện tại giỏ hàng trống</td>
        </tr>



    <?php
        }
    ?>


    </table>