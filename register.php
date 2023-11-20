<?php
if (!function_exists('pdo_get_connection')) {
    include('model/pdo.php');
}

$message = ''; // Biến để lưu trữ thông báo

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

        // Kiểm tra xem email đã tồn tại hay chưa
        $check_email_sql = "SELECT COUNT(*) FROM nguoidung WHERE email = :email";
        $check_email_stmt = $conn->prepare($check_email_sql);
        $check_email_stmt->bindParam(':email', $email);
        $check_email_stmt->execute();
        $email_exists = $check_email_stmt->fetchColumn();

        if ($email_exists) {
            // Nếu email đã tồn tại, cập nhật biến thông báo
            $message = "Tài khoản với email đã tồn tại. Vui lòng sử dụng email khác.";
        } else {
            // Thêm thông tin người dùng vào bảng nguoidung
            $insert_user_sql = "INSERT INTO nguoidung (hoten, email, matkhau, sodienthoai, diachi) VALUES (:hoten, :email, :matkhau, :sodienthoai, :diachi)";
            $insert_user_stmt = $conn->prepare($insert_user_sql);
            $insert_user_stmt->bindParam(':hoten', $hoten);
            $insert_user_stmt->bindParam(':email', $email);
            $insert_user_stmt->bindParam(':matkhau', $matkhau);
            $insert_user_stmt->bindParam(':sodienthoai', $sodienthoai);
            $insert_user_stmt->bindParam(':diachi', $diachi);
            $insert_user_stmt->execute();

            // Chuyển hướng đến trang chính hoặc trang cần thiết sau khi đăng ký thành công
            header("Location: index.php");
            exit();
        }
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    } finally {
        unset($conn);
    }
}
?>

<!-- Form đăng ký -->
<div class="main-content">
    <form action="index.php?act=dangky" method="post">
        <h4 class="fontsize20">Thông Tin Đăng Ký</h4>
        <hr>
        <!-- Hiển thị thông báo email đã tồn tại -->
        <?php if (!empty($message)) : ?>
            <div class="alert alert-danger" role="alert">
                <?php echo $message; ?>
            </div>
        <?php endif; ?>
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