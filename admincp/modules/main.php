<div class="clear"></div>
<div class="main">
<?php 
                        
                        if(isset($_GET['action']) && $_GET['query']){                        
                            $bientam=$_GET['action'];
                            $query =$_GET['query'];
                        }else{
                            $bientam='';
                            $query='';
                        }
                        if ($bientam=='quanlysanpham' && $query=='them'){
                            include("modules/quanlysp/them.php");
                            include("modules/quanlysp/lietke.php");

                        }elseif($bientam=='quanlysanpham' && $query=='sua'){
                            include("modules/quanlysp/sua.php");

                        }elseif($bientam=='quanlydanhmuc' && $query=='them'){
                            include("modules/quanlydanhmuc/them.php");
                            include("modules/quanlydanhmuc/lietke.php");

                        }elseif($bientam=='quanlydanhmuc' && $query=='sua'){
                            include("modules/quanlydanhmuc/sua.php");

                        }elseif($bientam=='quanlynhanvien' && $query=='them'){
                            include("modules/quanlynhanvien/them.php");
                            include("modules/quanlynhanvien/lietke.php");
                            
                        }elseif($bientam=='quanlynhanvien' && $query=='sua'){
                            include("modules/quanlynhanvien/sua.php");
                            
                        }elseif($bientam=='quanlynguoidung' && $query=='them'){
                            include("modules/quanlynguoidung/them.php");
                            include("modules/quanlynguoidung/lietke.php");
                            
                        }elseif($bientam=='quanlynguoidung' && $query=='sua'){
                            include("modules/quanlynguoidung/sua.php");
                            
                        }elseif($bientam=='quanlyhoadon' && $query=='them' ){
                            include("modules/quanlyhoadon/lietke.php");
                            
                        }elseif($bientam=='quanlyhoadon' && $query=='sua' ){
                            include("modules/quanlyhoadon/sua.php");
                            
                        }elseif($bientam=='quanlychitiethd' && $query=='them' ){
                            include("modules/quanlychitiethd/lietke.php");
                            
                        }elseif($bientam=='quanlychitiethd' && $query=='sua' ){
                            include("modules/quanlychitiethd/sua.php");
                            
                        }elseif($bientam=='quanlydonhang' && $query=='them' ){
                            include("modules/quanlydonhang/lietke.php");
                            
                        }elseif($bientam=='quanlydonhang' && $query=='xemdonhang'){
                            include("modules/quanlydonhang/xemdonhang.php");
                            
                        }elseif($bientam=='quanlylichsudonhang' && $query=='them' ){
                            include("modules/quanlylichsudonhang/lietke.php");
                            
                        }elseif($bientam=='dangxuat'){
                            include("../../dangnhap.php");
                        }
                        else{
                            echo '<p>Welcome to Bảng Điều Khiển</p>';
                        }
                    ?>
</div>