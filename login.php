<?php
if (!function_exists('pdo_get_connection')) {
    include('model/pdo.php');
}
// Kiểm tra session tồn tại chưa trước khi gọi
if (session_status() == PHP_SESSION_NONE) {
    ob_start(); // Bắt đầu đệm đầu ra
    session_start(); // Bắt đầu session
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Lấy dữ liệu từ form đăng nhập
    $email = $_POST['email'];
    $matkhau = $_POST['matkhau'];
    $remember = isset($_POST['remember']) ? $_POST['remember'] : false;

    try {
        // Kết nối cơ sở dữ liệu
        $conn = pdo_get_connection();

        // Truy vấn để kiểm tra thông tin đăng nhập
        $sql = "SELECT manguoidung, email, matkhau, trangthai, capbac FROM nguoidung WHERE email = :email";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':email', $email);
        $stmt->execute();

        // Kiểm tra xem có dòng dữ liệu nào trả về không
        if ($stmt->rowCount() > 0) {
            // Đăng nhập thành công, lưu thông tin người dùng vào session
            $user = $stmt->fetch(PDO::FETCH_ASSOC);

            if ($matkhau == $user['matkhau']) {
                // Kiểm tra xem người dùng có bị khóa không
                if ($user['trangthai'] == 0) {
                    echo "Tài khoản của bạn đã bị khóa. Vui lòng liên hệ với quản trị viên để biết thêm chi tiết.";
                } else {
                    // Người dùng không bị khóa, lưu thông tin vào session
                    $_SESSION['user_id'] = $user['manguoidung'];
                    $_SESSION['user_email'] = $user['email'];

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

                    // Kiểm tra vai trò của người dùng và chuyển hướng đến trang tương ứng
                    if ($user['capbac'] == 0) {
                        // Nếu là admin
                        header("Location: admin1/index.php");
                    } else {
                        // Nếu là user
                        header("Location: index.php");
                    }
                    exit();
                }
            } else {
                // Đăng nhập thất bại, chuyển hướng về trang đăng nhập
                header("Location: login.php");
                exit();
            }
        } else {
            // Đăng nhập thất bại, chuyển hướng về trang đăng nhập
            header("Location: login.php");
            exit();
        }
    } catch (PDOException $e) {
        // Xử lý lỗi nếu có
        echo "Error: " . $e->getMessage();
    } finally {
        unset($conn);
    }
}
?>


<form action="login.php" method="post" class="main-content">
    <h4 class="fontsize20">Thông Tin Đăng Nhập</h4>
    <hr>
    <div class="mb-3 mt-3">
        <label for="email" class="form-label">Email:</label>
        <input type="email" id="email" name="email" class="form-control" placeholder="Nhập email" required>
    </div>
    <div class="mb-3">
        <label for="matkhau" class="form-label">Mật khẩu:</label>
        <input type="password" id="matkhau" name="matkhau" class="form-control" placeholder="Nhập mật khẩu" required>
    </div>
    <div class="mb-3 form-check">
        <input type="checkbox" id="remember" name="remember" class="form-check-input">
        <label for="remember" class="form-check-label">Nhớ mật khẩu</label>
    </div>
    <div class="mb-3">
        <label for="forgot" class="form-label">Quên mật khẩu?</label>
        <a href="forgot.php" id="forgot" class="form-label">Nhấn vào đây</a>
        <p>Bạn chưa có tài khoản? <a href="index.php?act=dangky">Nhấn vào đây</a></p>
    </div>
    <button type="submit" class="btn btn-success">Đăng Nhập</button>
    <div class="mb-3">
    </div>
</form>