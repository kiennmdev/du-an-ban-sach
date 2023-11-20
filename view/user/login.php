<?php
// Kết nối cơ sở dữ liệu
include 'model/pdo.php';

// Kiểm tra nếu người dùng đã gửi form đăng nhập
if (isset($_POST['login'])) {
    // Lấy dữ liệu từ form
    $email = $_POST['email'];
    $matkhau = $_POST['matkhau'];
    $remember = isset($_POST['remember']) ? $_POST['remember'] : false;

    // Kiểm tra xem email có tồn tại trong cơ sở dữ liệu không
    $sql = "SELECT * FROM nguoidung WHERE email = ?";
    $stmt = pdo_get_connection()->prepare($sql);
    $stmt->execute([$email]);
    $user = $stmt->fetch();

    if ($user) {
        // Nếu email tồn tại, kiểm tra xem mật khẩu có khớp không
        // Sử dụng hàm password_verify để so sánh mật khẩu đã mã hóa
        if (password_verify($matkhau, $user['matkhau'])) {
            // Nếu mật khẩu khớp, kiểm tra xem người dùng có bị khóa không
            // Nếu trangthai = 0, người dùng bị khóa
            if ($user['trangthai'] == 0) {
                // Nếu người dùng bị khóa, hiển thị thông báo lỗi
                echo "Tài khoản của bạn đã bị khóa. Vui lòng liên hệ với quản trị viên để biết thêm chi tiết.";
            } else {
                // Nếu người dùng không bị khóa, tạo một phiên làm việc (session) cho người dùng
                // Sử dụng hàm session_start để bắt đầu phiên làm việc
                session_start();
                // Lưu trữ thông tin của người dùng vào biến $_SESSION
                $_SESSION['user_id'] = $user['manguoidung'];
                $_SESSION['user_email'] = $user['email'];
                $_SESSION['user_name'] = $user['hoten'];
                $_SESSION['user_phone'] = $user['sodienthoai'];
                $_SESSION['user_address'] = $user['diachi'];
                $_SESSION['user_image'] = $user['hinh'];
                $_SESSION['user_gender'] = $user['gioitinh'];
                $_SESSION['user_role'] = $user['capbac'];

                // Lưu cookie nếu người dùng chọn "Nhớ mật khẩu"
                if ($remember) {
                    // Nếu người dùng chọn "Nhớ mật khẩu"
                    setcookie("user_email", $user['email'], time() + 3600 * 24 * 30, "/");
                    setcookie("user_password", $user['matkhau'], time() + 3600 * 24 * 30, "/");
                } else {
                    // Nếu người dùng không chọn "Nhớ mật khẩu"
                    setcookie("user_email", $user['email'], 0, "/");
                    setcookie("user_password", $user['matkhau'], 0, "/");
                }

                // Chuyển hướng người dùng đến trang chủ
                header('Location: index.php');
                exit();
            }
        } else {
            // Nếu mật khẩu không khớp, hiển thị thông báo lỗi
            echo "Mật khẩu không đúng. Vui lòng thử lại.";
        }
    } else {
        // Nếu email không tồn tại, hiển thị thông báo lỗi
        echo "Email không tồn tại. Vui lòng đăng ký hoặc thử lại.";
    }
}
?>

<!-- Tạo form đăng nhập -->
<form action="login.php" method="post">
    <label for="email">Email:</label>
    <input type="email" id="email" name="email" required>
    <label for="matkhau">Mật khẩu:</label>
    <input type="password" id="matkhau" name="matkhau" required>
    <label for="remember">Nhớ mật khẩu:</label>
    <input type="checkbox" id="remember" name="remember">
    <label for="forgot">Quên mật khẩu?</label>
    <a href="forgot.php" id="forgot">Nhấn vào đây</a>
    <input type="submit" name="login" value="Đăng nhập">
</form>
