<?php
	session_start(); // Bắt đầu phiên làm việc
    $severname="localhost";
    $username="root";
    $password="";
    $database="banthuoc";
    
    $khoitao= new mysqli($severname,$username,$password,$database);
    if(mysqli_connect_errno()){
        echo "loi ket noi".mysqli_connect_error();
        exit();
    }
	if(isset($_POST['dangnhap'])){
        $taikhoan = $_POST['usernamez'];
        $matkhau = $_POST['password'];
        if(empty($taikhoan) || empty($matkhau)) {
            echo '<script>alert("Tài khoản hoặc Mật khẩu không được để trống, vui lòng nhập.");</script>';
        } else {
            $sql_admin = "SELECT * FROM tbl_user WHERE user='".$taikhoan."' AND pass='".$matkhau."'  LIMIT 1";
            $row_admin = mysqli_query($khoitao,$sql_admin); 
            $count = mysqli_num_rows($row_admin);
            if($count>0){
                $_SESSION['dangnhap']=$taikhoan;
                header("Location:index.php");
            } else {
                echo '<script>alert("Tài khoản hoặc Mật khẩu không đúng, vui lòng nhập lại.");</script>';
            }
        }
    }
    
    

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- <link rel="stylesheet" href="css/style_login.css"> -->
    <style>
        body{
            background-image: linear-gradient( 45deg, rgb(199, 201, 214) 0%, 
            rgb(182, 156, 180) 50%, rgb(148, 146, 143) 100% );
            height: 100vh;
            overflow: hidden;
        }

        .warpper{   
            width: auto;
            height: auto;
            text-align: center;
            padding: 20px;
        }

        .trangchu {
            margin-top: 10px;
        }
        .trangchu a {
            color: #007bff;
            text-decoration: none;
        }
        .trangchu a:hover {
            text-decoration: underline;
        }

        @media screen and (min-width :600px){
            .warpper{
                max-width: 1280px;
                margin: 0 auto;
            }
        }
    </style>
    <title>Login</title>
</head>
<body>
    <div class="warpper">
    <form action="" method="POST">
        <h1>LOGIN ADMIN</h1>
       <div class="taikhoan">
           <label for=""> Tài Khoản</label><br>
           <input type="text" name="usernamez">
       </div>

       <div class="matkhau">
           <label for=""> Mật khẩu</label><br>
           <input type="password" name="password">
       </div>
       <div>
           <input type="submit" name="dangnhap" value="Đăng Nhập">
       </div>
       <br>
       <div class="trangchu">
           <label for=""><a href="../index.php">Về Trang Chủ</a></label><br>
       </div>
    </form>
    </div>

    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
</body>
</html>