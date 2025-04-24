+<?php
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
<?php
    //them so luong

    //tru so luong

	//xóa sản phẩm 
	if(isset($_SESSION['cart'])&& $_GET['xoa']){

		
	}

    
    //them 
    if(isset($_POST['themgiohang'])){
		//session_destroy();
		$id=$_GET['idsanpham'];
		$soluong=1;
		$sql ="SELECT * FROM SanPham WHERE Ma_SP='".$id."' LIMIT 1";
		$query = mysqli_query($khoitao,$sql);
		$row = mysqli_fetch_array($query);
		if($row){
			$new_product=array(array('Ten_SP'=>$row['Ten_SP'],'id'=>$id,'SLTonKho'=>$soluong,'Gia'=>$row['Gia'],'hinhanh'=>$row['hinhanh'],'masp'=>$row['TenThuoc']));
			//kiem tra session gio hang ton tai
			if(isset($_SESSION['cart'])){
				$found = false;
				foreach($_SESSION['cart'] as $cart_item){
					//neu du lieu trung
					if($cart_item['id']==$id){
						$product[]= array('Ten_SP'=>$cart_item['Ten_SP'],'id'=>$cart_item['id'],'SLTonKho'=>$soluong+1,'Gia'=>$cart_item['Gia'],'hinhanh'=>$cart_item['hinhanh'],'masp'=>$cart_item['masp']);
						$found = true;
						// Lấy số lượng tồn kho hiện tại của sản phẩm từ cơ sở dữ liệu
						$query_select_quantity = "SELECT SLTonKho FROM SanPham WHERE Ma_SP = '$id'";
						$result_select_quantity = mysqli_query($khoitao, $query_select_quantity);
						$row = mysqli_fetch_assoc($result_select_quantity);
						$current_quantity = $row['SLTonKho'];
				
						// Tính toán số lượng mới
						$new_quantity = $current_quantity - 1;
				
						// Cập nhật số lượng mới vào cơ sở dữ liệu
						$query_update_quantity = "UPDATE SanPham SET SLTonKho = '$new_quantity' WHERE Ma_SP = '$id'";
						mysqli_query($khoitao, $query_update_quantity);
					}else{
						//neu du lieu khong trung
						$product[]= array('Ten_SP'=>$cart_item['Ten_SP'],'id'=>$cart_item['id'],'SLTonKho'=>$cart_item['SLTonKho'],'Gia'=>$cart_item['Gia'],'hinhanh'=>$cart_item['hinhanh'],'masp'=>$cart_item['masp']);
						
					}
				}
				if($found == false){
					//lien ket du lieu new_product voi product
					$_SESSION['cart']=array_merge($product,$new_product);
				}else{
					$_SESSION['cart']=$product;
				}
			}else{
				$_SESSION['cart'] = $new_product;
			}

		}
		header('Location:../../index.php?quanly=giohang');
		
	}
?>