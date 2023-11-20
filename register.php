<?php
if (!function_exists('pdo_get_connection')) {
  include('model/pdo.php');
}
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Lấy dữ liệu từ form đăng ký
    $hoten = $_POST['hoten'];
    $email = $_POST['email'];
    $matkhau = $_POST['matkhau'];
    $sodienthoai = $_POST['sodienthoai'];
    $diachi = $_POST['diachi'];

    try {
        // Kết nối cơ sở dữ liệu
        $conn = pdo_get_connection();

        // Truy vấn để thêm thông tin người dùng vào bảng nguoidung
        $sql = "INSERT INTO nguoidung (hoten, email, matkhau, sodienthoai, diachi) VALUES (:hoten, :email, :matkhau, :sodienthoai, :diachi)";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':hoten', $hoten);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':matkhau', $matkhau);
        $stmt->bindParam(':sodienthoai', $sodienthoai);
        $stmt->bindParam(':diachi', $diachi);
        $stmt->execute();

        // Chuyển hướng đến trang chính hoặc trang cần thiết sau khi đăng ký thành công
        header("Location: index.php"); // Thay đổi đường dẫn nếu cần
        exit();
    } catch (PDOException $e) {
        // Xử lý lỗi nếu có
        echo "Error: " . $e->getMessage();
    } finally {
        unset($conn);
    }
}
?>

<!-- Form đăng ký -->
<div class="main-content">
    <form action="register.php" method="post">
        <h4 class="fontsize20">Thông Tin Đăng Ký</h4>
        <hr>
        <div class="mb-3 mt-3">
            <label for="hoten" class="form-label">Họ và tên:</label>
            <input type="text" class="form-control" id="hoten" placeholder="Nhập họ và tên" name="hoten" required>
        </div>
        <div class="mb-3">
            <label for="email" class="form-label">Email:</label>
            <input type="email" class="form-control" id="email" placeholder="Nhập email" name="email" required>
        </div>
        <div class="mb-3">
            <label for="matkhau" class="form-label">Mật khẩu:</label>
            <input type="password" class="form-control" id="matkhau" placeholder="Nhập mật khẩu" name="matkhau" required>
        </div>
        <div class="mb-3">
            <label for="sodienthoai" class="form-label">Số điện thoại:</label>
            <input type="text" class="form-control" id="sodienthoai" placeholder="Nhập số điện thoại" name="sodienthoai" required>
        </div>
        <div class="mb-3">
            <label for="diachi" class="form-label">Địa chỉ:</label>
            <input type="text" class="form-control" id="diachi" placeholder="Nhập địa chỉ" name="diachi" required>
        </div>
        <button type="submit" class="btn btn-success">Đăng Ký</button>
    </form>
</div>

</div>
</main>
</div>