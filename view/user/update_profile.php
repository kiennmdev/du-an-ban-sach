<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Lấy thông tin từ yêu cầu Ajax
    $hoten = $_POST['hoten'];
    $email = $_POST['email'];
    $sodienthoai = $_POST['sodienthoai'];
    $diachi = $_POST['diachi'];

    try {
        // Kết nối cơ sở dữ liệu
        include('model/pdo.php');
        $conn = pdo_get_connection();

        // Cập nhật thông tin người dùng trong cơ sở dữ liệu
        $sql = "UPDATE nguoidung SET hoten = :hoten, sodienthoai = :sodienthoai, diachi = :diachi WHERE email = :email";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':hoten', $hoten);
        $stmt->bindParam(':sodienthoai', $sodienthoai);
        $stmt->bindParam(':diachi', $diachi);
        $stmt->bindParam(':email', $email);
        $stmt->execute();
        
        // Phản hồi thành công (nếu cần)
        echo "Cập nhật thông tin thành công!";
    } catch (PDOException $e) {
        // Xử lý lỗi nếu có
        echo "Error: " . $e->getMessage();
    } finally {
        unset($conn);
    }
}
?>
