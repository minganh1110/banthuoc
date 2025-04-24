<?php
    // Kiểm tra xem nguoi dung dang nhap chưa
    if (!isset($_SESSION['Ma_KH'])) {
        echo '<script> alert("Vui lòng đăng nhập để xem đơn hàng!"); </script>';
        header('Location: ../../dangnhap.php');  
        exit();
    }

    // Kết nối đến cơ sở dữ liệu
    $servername = "localhost";
    $username = "root";
    $password = "";
    $database = "banthuoc";

    $khoitao = new mysqli($servername, $username, $password, $database);
    if(mysqli_connect_errno()){
        echo "Lỗi kết nối: " . mysqli_connect_error();
        exit();
    }
?>
<p>Xem đơn hàng</p>
<?php
    // Truy vấn cơ sở dữ liệu để lấy thông tin đơn hàng từ bảng LichSuDonHang
    $id_khachhang = $_SESSION['Ma_KH'];
    $sql = "SELECT * FROM LichSuDonHang WHERE Ma_KH = '$id_khachhang'";
    $result = $khoitao->query($sql);
    if (!$result) {
        echo "Lỗi: " . mysqli_error($khoitao);
        exit();
    }
?>
<?php
    $i=0;
    // Hiển thị thông tin đơn hàng
    if ($result->num_rows > 0) {
        echo "<table style='border-collapse: collapse; width: 100%; text-align: center;'>";
        echo "<tr>";
        echo "<th style='border: 1px solid black; padding: 8px;'>ID</th>";
        echo "<th style='border: 1px solid black; padding: 8px;'>Mã Đơn Hàng</th>";
        echo "<th style='border: 1px solid black; padding: 8px;'>Ngày Đặt Hàng</th>";
        echo "<th style='border: 1px solid black; padding: 8px;'>Số lượng Mua</th>";
        echo "<th style='border: 1px solid black; padding: 8px;'>Thành Tiền</th>";
        echo "<th style='border: 1px solid black; padding: 8px;'>Trạng Thái</th>"; // Sửa đổi ở đây
        echo "</tr>";

        while($row = $result->fetch_assoc()) {
            $i++;
            echo "<tr>";
            echo "<td style='border: 1px solid black; padding: 8px;'>" .$i. "</td>";
            echo "<td style='border: 1px solid black; padding: 8px;'>" . $row["Ma_cart"]. "</td>";
            echo "<td style='border: 1px solid black; padding: 8px;'>" . $row["NgayDatHang"]. "</td>";
            echo "<td style='border: 1px solid black; padding: 8px;'>" . $row["SLBan"]. "</td>";
            echo "<td style='border: 1px solid black; padding: 8px;'>" . $row["TongTien"]. "</td>";
            // Thêm trạng thái ở đây
            echo "<td style='border: 1px solid black; padding: 8px;'>";
            // Thêm trạng thái vào đây
            if($row["trangthai"] == 1){
                echo 'Đang giao hàng';
            } else {
                echo 'Đã hủy đơn hàng';
            }
            echo "</td>";
            echo "</tr>";
        }
        echo "</table>";
    } else {
        echo "Không có đơn hàng.";
    }
?>
