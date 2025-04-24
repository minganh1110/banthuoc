<?php
	session_start();
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
<p>Thông tin thanh toán</p>
 <div class="container">
 <?php
    if(isset($_SESSION['Ma_KH'])){
?>
    <div class="arrow-steps clearfix">
        <div class="step "> <span> <a href="../../index.php?quanly=giohang" >Giỏ hàng</a></span> </div>
         <div class="step"> <span><a href="../thanhtoan/vanchuyen.php" >Kiểm tra</a></span> </div>
        <div class="step current"> <span><a href="../thanhtoan/thongtinthanhtoan.php" >Thanh toán</a><span> </div>
       
    </div>
    <?php
  } 
  ?>
  	<form action="thanhtoan.php" method="POST">
	<div class="row">
  		<h5>Giỏ hàng của bạn</h5>
  	<table style="width:100%; text-align: center; border-collapse: collapse;" border="1">
		<tr>
        <th>ID</th>
        <th>TenSP :</th>
        <th>Tên Thuốc</th>
        <th>Hình</th>
        <th>Số lượng</th>
        <th>Giá :</th>
        <th>Thành tiền</th>   
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
            <td><img src="../../admincp/modules/quanlysp/uploads/<?php echo $cart_item['hinhanh'] ?>" width="150px"></td>

            <td>
                <a href="main/giohang/suasoluong.php?cong=<?php echo $cart_item['id'] ?>"><i class="fa-solid fa-plus"></i></a>
                <?php echo $cart_item['SLTonKho'] ?>
                <a href="main/giohang/suasoluong.php?tru=<?php echo $cart_item['id'] ?>"><i class="fa-solid fa-minus"></i></a>
            </td>

            <td><?php echo number_format($cart_item['Gia'],0,',','.') . ' VNĐ'?></td>
            <td><?php  echo number_format($thanhtien,0,',','.') . ' VNĐ' ?></td>
            <td><a href="main/giohang/xoasanpham.php?xoa=<?php echo $cart_item['id'] ?>" class="btn btn-success">XÓA</a></td>
        </tr>


    <?php 
            }
    ?>

        <tr>
            <td colspan="8">
                <p style="float: left text-align: center;" class="btn btn-success"> Tổng tiền : <?php echo number_format($tongtien,0,',','.') . ' VNĐ'  ?></p>
                <p style="float: right;"><a href="main/giohang/xoahetgiohang.php?xoatatca=xoahet" class="btn btn-success">Xóa Hêt</a></p>
                <div style="clear:both;"> </div>
		    </td>
		  </tr>
		  <?php	
		  }else{ 
		  ?>
		   <tr>
		    <td colspan="8"><p>Hiện tại giỏ hàng trống</p></td>
		   
		  </tr>
		  <?php
		  } 
		  ?>
		 
	</table>
  	</div>
  	<style type="text/css">
  		.col-md-4.hinhthucthanhtoan .form-check {
		    margin: 11px;
		}
  	</style>

  	<div class="col-md-4 hinhthucthanhtoan">
  		<h4>Phương thức thanh toán</h4>
  		<div class="form-check">
		  <input class="form-check-input" type="radio" name="payment" id="exampleRadios1" value="Tiền Mặt" checked>
		  <label class="form-check-label" for="exampleRadios1">
		    Tiền mặt
		  </label>
		</div>
		<div class="form-check">
		  <input class="form-check-input" type="radio" name="payment" id="exampleRadios2" value="Hình thúc khác">
		  <label class="form-check-label" for="exampleRadios2">
		    Hình thức khác
		  </label>
		</div>
		<input type="submit" value="Thanh toán ngay" name="redirect"  class="btn btn-danger" onClick="thanh()">
		
		</form>
    <script>
      function thanh(){
					alert("Thanh toán thành công.");
        }
		</script>
		<p></p>
	
		<?php 
		$tongtien = 0;
		foreach($_SESSION['cart'] as $key => $value){
			$thanhtien = $value['SLTonKho']*$value['Gia'];
  			$tongtien+=$thanhtien;
		} 
		$tongtien_vnd = $tongtien;
		$tongtien_usd = round($tongtien/22667);
		?>
		<input type="hidden" name="" value="<?php echo $tongtien_usd ?>" id="tongtien">
		

		 </div>
		 	
		 </div>
<?php
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thông tin thanh toán</title>
    <style>
        /* jQuery Demo */

.clearfix:after {
    clear: both;
    content: "";
    display: block;
    height: 0;
  }
  

  .arrow-steps .step {
    font-size: 14px;
    text-align: center;
    color: #777;
    cursor: default;
    margin: 0 1px 0 0;
    padding: 10px 0px 10px 0px;
    width: 15%;
    float: left;
    position: relative;
    background-color: #c9c2c2;
    -webkit-user-select: none;
    -moz-user-select: none;
    -ms-user-select: none;
    user-select: none;
  }
  
  .arrow-steps .step a {
    color: #777;
    text-decoration: none;
  }
  
  .arrow-steps .step:after,
  .arrow-steps .step:before {
    content: "";
    position: absolute;
    top: 0;
    right: -17px;
    width: 0;
    height: 0;
    border-top: 19px solid transparent;
    border-bottom: 17px solid transparent;
    border-left: 17px solid #b9b7b7;
    z-index: 2;
  }
  
  .arrow-steps .step:before {
    right: auto;
    left: 0;
    border-left: 17px solid #f3f1f1;
    z-index: 0;
  }
  
  .arrow-steps .step:first-child:before {
    border: none;
  }
  
  .arrow-steps .step:last-child:after {
     border: none;
  }
  
  .arrow-steps .step:first-child {
    border-top-left-radius: 4px;
    border-bottom-left-radius: 4px;
  }
  
  .arrow-steps .step:last-child {
    border-top-right-radius: 4px;
    border-bottom-right-radius: 4px;
  }
  
  .arrow-steps .step span {
    position: relative;
  }
  
  *.arrow-steps .step.done span:before {
    opacity: 1;
    content: "";
    position: absolute;
    top: -2px;
    left: -10px;
    font-size: 11px;
    line-height: 21px;
  }
  
  .arrow-steps .step.current {
    color: #fff;
    background-color: #5599e5;
  }
  
  .arrow-steps .step.current a {
    color: #fff;
    text-decoration: none;
  }
  
  .arrow-steps .step.current:after {
    border-left: 17px solid #5599e5;
  }
  
  .arrow-steps .step.done {
    color: #173352;
    background-color: #2f69aa;
  }
  
  .arrow-steps .step.done a {
    color: #173352;
    text-decoration: none;
  }
  
  .arrow-steps .step.done:after {
    border-left: 17px solid #2f69aa;
  }
    </style>
</head>
<body>
    
</body>
</html>