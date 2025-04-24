<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style_detal.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/style_cart.css">
    <link rel="stylesheet" href="css/style_ads.css">
    <link rel="stylesheet" href="css/footer.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <title>Shop</title>
    <style>

</style>
</head>
<body>
<div>
    <img src="images/baner.png" width="100%" height="200">
</div>
<?php
    $severname="localhost";
    $username="root";
    $password="";
    $database="banthuoc";

    $khoitao= new mysqli($severname,$username,$password,$database);
    if(mysqli_connect_errno()){
        echo "loi ket noi".mysqli_connect_error();
        exit();
    }
?>

    <div class="wrapper">
        <?php
        session_start();
        include("main/main.php");
        ?>
    </div>


<div class="clear">
</div>
<div class="footer">
<div id="marginfooter">
    <div class="muc">

    <span class="toi"><h4>Liên hệ</h4></span><br>
    <p>Địa chỉ:131 Xuân Thắng - Thới Lai - Cần Thơ</p>
    <p >Điện thoại:0862525032</ơ>
    <p >Fax:</p>
    <p >Email:baokhangkhang123@gmail.com</p>
    </div>
    <div class="muc1">
    <span class="toi"><h4>Menu</h4></span><br><div id="menufooter">

    <ul>
    <li><a href="?mod=home">Trang chủ</a></li>
    <li><a href="main/contact.php">Giới thiệu</a></li>
    <li><a href="?mod=products">Sản Phẩm</a></li>
    <li><a href="?mod=lienhe">Liên hệ</a></li>
    <li><a href="dangnhap.php">Đăng nhập</a></li>
    <li><a href="dangky.php">Đăng ký</a></li>
    <li><a href="index.php?quanly=cart.php">Giỏ hàng</a></li>
    </ul>

    </div></div>
    <div class="muc2">
    <span class="toi"><h4>Danh mục</h4></span><br><div id="danhmucfooter">
    <ul >
        <li><a href="?mod=products&type=1">Phân Bón</a></li>
        <li><a href="?mod=products&type=2">Dung Dịch</a></li>
        <li><a href="?mod=products&type=3">Viên</a></li>
        <li><a href="?mod=products&type=5">Thuốc Phun Bột</a></li>
        <li><a href="?mod=products&type=3">Bột Hòa Nước</a></li>
        <li><a href="?mod=products&type=3">Hữa Cơ</a></li>
        </ul>
    </div></div>
    <div class="muc3">
    <span class="toi"><h4>Tìm kiếm</h4></span><br>
    <div id="search1">

    <label>Search:</label>
    <input type="text" name="txtSearchText"  id="text" value="" />
    <input type="submit" name="btnSearch" value="Tìm Kiếm" id="button" />

    </div></div>
    </div>
</div>
   

</body>
<script type="text/javascript" src="js/modal.js"></script>
</html>