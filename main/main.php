<?php
     $sql_danhmuc="SELECT * FROM DanhMuc ORDER BY Ma_DM DESC";
     $query_danhmuc=mysqli_query($khoitao,$sql_danhmuc);
     

?>
<?php
	if(isset($_GET['dangxuat'])&&$_GET['dangxuat']==1){
		unset($_SESSION['dangky']);
	} 
?>
<div class="menu">
               
            <ul class="menu_list">
                <li> <a href="index.php">Home</a></li>
                
                 <li> <a href="index.php?quanly=contact">Liên hệ </a></li>
                <li> <a href="index.php?quanly=giohang">Giỏ hàng</a></li>
                <li><a href="">Danh mục</a>
                        <ul class="menu_danhmuc">
                        <?php
                                    while($row_danhmuc=mysqli_fetch_array($query_danhmuc)){

                                ?>
                                <li> <a href="index.php?quanly=danhmuclist&id=<?php echo $row_danhmuc['Ma_DM'] ?>"><?php echo $row_danhmuc['Ten_DM']?></a></li>

                                <?php
                                    }

                                ?>
                        </ul>
                </li>
                <?php
                    if(isset($_SESSION['dangky'])){
                ?>
                   
                    <li><a href="index.php?quanly=thongtin"> Thông Tin</a></li>
                    <li> <a href="index.php?dangxuat=1">Đăng xuât</a></li>
                    <li> <a href="index.php?quanly=xemdonhang">Đơn đặt hàng</a></li>
                <?php
                    }else{
                ?>
                     <li> <a href="dangnhap.php">Đăng nhập</a></li>
                     <li> <a href="dangky.php">Đăng ký</a></li>
                     <li> <a href="main/dondathang/xemdonhang.php">Đơn đặt hàng</a></li>
                <?php
                    }
                ?>
                 
                
               
                <li> 
                    <Form method="POST" action="index.php?quanly=timkiem"> 
                        <input type="text" placeholder="sreach....." name="tukhoa">
                        <input type="submit" name="timkiem" value="Tìm Kiếm">
                    </Form>
                </li>
            </ul>
 </div>


<div class="main">
<div class="sidebar">
                <ul class="sidebar_list">
                    <?php
                        $sql_danhmuc="SELECT * FROM DanhMuc ORDER BY Ma_DM DESC";
                        $query_danhmuc=mysqli_query($khoitao,$sql_danhmuc);
                        while ($row=mysqli_fetch_array($query_danhmuc)){

                    ?>
                    <li><a href="index.php?quanly=danhmuclist&id=<?php echo $row['Ma_DM'] ?>"><?php echo $row['Ten_DM']?></a></li>
                    <?php

                        }
                        ?>
                </ul>
            </div>
            <div class="maincontent">
              
                <?php //lấy quanly từ menu truyền vào bằng phuongư thức GET
                        if(isset($_GET['quanly'])){
                            $bientam=$_GET['quanly'];

                        }else{
                            $bientam="";
                        }
                        if ($bientam=='danhmuclist'){
                            include("danhmuc.php");
                        }elseif ($bientam=='giohang'){ 
                            include("main/giohang/cart.php");
                        }elseif ($bientam=='dangky'){ 
                            include("dangky.php");
                        }elseif ($bientam=='contact'){ 
                            include("main/contact.php");
                        }elseif ($bientam=='sanpham'){ 
                            include("sanpham.php");
                        
                        }elseif ($bientam=='dangnhap'){ 
                            include("dangnhap.php");
                        }elseif ($bientam=='thongtin'){ 
                            include("thongtin.php");

                        }elseif ($bientam=='xemdonhang'){ 
                            include("main/dondathang/xemdonhang.php");

                        }elseif ($bientam=='timkiem'){ 
                            include("main/timkiem.php");
                            
                        
                        }else{ ?>






                <div class="silder">
                        <div class="sildes">
                            <input type="radio" name="radio_btn" id="radio1">
                            <input type="radio" name="radio_btn" id="radio2">
                            <input type="radio" name="radio_btn" id="radio3">
                            <input type="radio" name="radio_btn" id="radio4">
                            <div class="silde first">
                                <img src="images/lide1.png" alt="">
                            </div>
                            <div class="silde">
                                <img src="images/lide2.jpg" alt="">
                            </div>
                            <div class="silde">
                                <img src="images/lide3.png" alt="">
                            </div>
                            <div class="silde">
                                <img src="images/lide4.jpg" alt="">
                            </div>


                            <div class="navigation-auto">
                                <div class="auto-btn1"></div>
                                <div class="auto-btn2"></div>
                                <div class="auto-btn3"></div>
                                <div class="auto-btn4"></div>

                            </div>

                        
                        </div>
                        <div class="navigation-manual">
                            <label for="radio1" class="manual-btn"></label>
                            <label for="radio2" class="manual-btn"></label>
                            <label for="radio3" class="manual-btn"></label>
                            <label for="radio4" class="manual-btn"></label>
                        </div>

                </div>
                        <?php
                       
                        }
 ?>
                
            </div>
        </div>



        <div style="clear:both;"></div>

<div class="show_new">
<?php //lấy quanly từ menu truyền vào bằng phuongư thức GET
                        if(isset($_GET['quanly'])){
                            $bientam=$_GET['quanly'];

                        }else{
                            $bientam="";
                        }
                       if($bientam==""){?>

                        <div class="new_product">
                        <h3>SẢN PHẨM MỚI</h3>
                        </div>
                    <?php
                            include("sanphammoi.php");
                       
                            
                        }
 ?>
 
 </div>
 
 <div style="clear:both;"></div>
 <div class="show">
<?php //lấy quanly từ menu truyền vào bằng phuongư thức GET
                        if(isset($_GET['quanly'])){
                            $bientam=$_GET['quanly'];

                        }else{
                            $bientam="";
                        }
                       if($bientam==""){
                           
                          ?>
                           <div class="new_product">
                            <h3>TẤT CẢ SẢN PHẨM</h3>
                            </div>
                     <?php
                            include("index1.php");
                            
                        }

 ?>

 </div>
