<?php
if (!function_exists('pdo_get_connection')) {
    include('model/pdo.php');
}
// Kiểm tra session tồn tại chưa trước khi gọi
if (session_status() == PHP_SESSION_NONE) {
    ob_start(); // Bắt đầu đệm đầu ra
    session_start(); // Bắt đầu session
}

// Kiểm tra xem người dùng đã đăng nhập hay chưa
if (!isset($_SESSION['user_id'])) {
    // Nếu chưa đăng nhập, chuyển hướng về trang đăng nhập
    header("Location: index.php?act=dangnhap");
    exit();
}

try {
    // Kết nối cơ sở dữ liệu
    $conn = pdo_get_connection();

    // Truy vấn để lấy thông tin người dùng
    $sql = "SELECT * FROM nguoidung WHERE manguoidung = :user_id";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':user_id', $_SESSION['user_id']);
    $stmt->execute();

    // Kiểm tra xem có dòng dữ liệu nào trả về không
    if ($stmt->rowCount() > 0) {
        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        // Hiển thị thông tin tài khoản của người dùng
        // ...
    } else {
        echo "Không tìm thấy thông tin người dùng.";
    }
} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
} finally {
    unset($conn);
}
?>

<div class="main-content">
    <div class="profile-info">
        <div class="d-flex justify-content-between align-items-center">
            <h4 class="fontsize20">Thông Tin Tài Khoản</h4>
            <button class="btn btn-warning" id="editProfileBtn">Sửa</button>
        </div>
        <hr>
        <div class="mb-3 mt-3">
            <p><strong>Họ và tên:</strong> <span id="hoten"><?php echo $user['hoten']; ?></span></p>
        </div>
        <div class="mb-3">
            <p><strong>Email:</strong> <span id="email"><?php echo $user['email']; ?></span></p>
        </div>
        <div class="mb-3">
            <p><strong>Số Điện Thoại:</strong> <span id="sodienthoai"><?php echo $user['sodienthoai']; ?></span></p>
        </div>
        <div class="mb-3">
            <p><strong>Địa Chỉ:</strong> <span id="diachi"><?php echo $user['diachi']; ?></span></p>
        </div> <!-- Các trường thông tin khác nếu có -->

        <!-- Nút Lưu và Huỷ ẩn ban đầu -->
        <div id="editButtons" style="display: none;">
            <button class="btn btn-success" id="saveProfileBtn">Lưu</button>
            <button class="btn btn-secondary" id="cancelEditBtn">Huỷ</button>
        </div>
    </div>

    <div class="text-center mt-3">
        <button class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#logoutModal">Đăng Xuất</button>
    </div>
</div>

<!-- Modal Xác Nhận Đăng Xuất -->
<div class="modal fade" id="logoutModal" tabindex="-1" aria-labelledby="logoutModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="logoutModalLabel">Xác Nhận Đăng Xuất</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                Bạn có chắc chắn muốn đăng xuất không?
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Huỷ</button>
                <a href="logout.php" class="btn btn-danger">Đăng Xuất</a>
            </div>
        </div>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Xử lý sự kiện khi nhấn nút Sửa
        document.getElementById('editProfileBtn').addEventListener('click', function() {
            // Ẩn nút Sửa và hiển thị nút Lưu và Huỷ
            document.getElementById('editProfileBtn').style.display = 'none';
            document.getElementById('editButtons').style.display = 'block';

            // Chuyển các thông tin hiển thị sang trường input để chỉnh sửa
            document.getElementById('hoten').innerHTML = '<input type="text" id="hotenInput" value="' + document.getElementById('hoten').innerText + '">';
            document.getElementById('email').innerHTML = '<input type="email" id="emailInput" value="' + document.getElementById('email').innerText + '">';
            document.getElementById('sodienthoai').innerHTML = '<input type="text" id="sodienthoaiInput" value="' + document.getElementById('sodienthoai').innerText + '">';
            document.getElementById('diachi').innerHTML = '<input type="text" id="diachiInput" value="' + document.getElementById('diachi').innerText + '">';
        });

        // Xử lý sự kiện khi nhấn nút Huỷ
        document.getElementById('cancelEditBtn').addEventListener('click', function() {
            // Hiển thị lại nút Sửa và ẩn nút Lưu và Huỷ
            document.getElementById('editProfileBtn').style.display = 'block';
            document.getElementById('editButtons').style.display = 'none';

            // Chuyển các trường input về dạng hiển thị thông tin
            document.getElementById('hoten').innerHTML = '<span id="hoten">' + document.getElementById('hotenInput').value + '</span>';
            document.getElementById('email').innerHTML = '<span id="email">' + document.getElementById('emailInput').value + '</span>';
            document.getElementById('sodienthoai').innerHTML = '<span id="sodienthoai">' + document.getElementById('sodienthoaiInput').value + '</span>';
            document.getElementById('diachi').innerHTML = '<span id="diachi">' + document.getElementById('diachiInput').value + '</span>';
        });

        // Xử lý sự kiện khi nhấn nút Lưu
        document.getElementById('saveProfileBtn').addEventListener('click', function() {
            // Lấy thông tin từ các trường input
            var hoten = document.getElementById('hotenInput').value;
            var email = document.getElementById('emailInput').value;
            var sodienthoai = document.getElementById('sodienthoaiInput').value;
            var diachi = document.getElementById('diachiInput').value;

            // Gửi yêu cầu Ajax đến server để cập nhật thông tin
            var xhr = new XMLHttpRequest();
            xhr.open('POST', 'update_profile.php', true);
            xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
            xhr.onreadystatechange = function() {
                if (xhr.readyState === 4 && xhr.status === 200) {
                    // Xử lý phản hồi từ server (nếu cần)
                    console.log(xhr.responseText);
                }
            };
            var data = 'hoten=' + encodeURIComponent(hoten) +
                '&email=' + encodeURIComponent(email) +
                '&sodienthoai=' + encodeURIComponent(sodienthoai) +
                '&diachi=' + encodeURIComponent(diachi);
            xhr.send(data);

            // Hiển thị lại nút Sửa và ẩn nút Lưu và Huỷ
            document.getElementById('editProfileBtn').style.display = 'block';
            document.getElementById('editButtons').style.display = 'none';

            // Chuyển các trường input về dạng hiển thị thông tin
            document.getElementById('hoten').innerHTML = '<span id="hoten">' + hoten + '</span>';
            document.getElementById('email').innerHTML = '<span id="email">' + email + '</span>';
            document.getElementById('sodienthoai').innerHTML = '<span id="sodienthoai">' + sodienthoai + '</span>';
            document.getElementById('diachi').innerHTML = '<span id="diachi">' + diachi + '</span>';
        });
    });
</script>