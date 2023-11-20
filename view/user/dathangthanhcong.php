<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Giỏ Hàng</title>
    <link rel="stylesheet" href="fontawesome-free-6.4.2-web/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <div class="container">
        <div class="mb-4">
            <h4 class="text-success">Mã đơn hàng: 123456</h4>
            <hr>
            <h5 class="text-primary">Thông tin nhận hàng</h5>
            <table class="table table-striped">
                <tbody>
                    <tr>
                        <th>Họ tên</th>
                        <td>Nguyễn Văn A</td>
                    </tr>
                    <tr>
                        <th>Địa chỉ</th>
                        <td>Số 1, đường 2, phường 3, quận 4, TP.HCM</td>
                    </tr>
                    <tr>
                        <th>Điện thoại</th>
                        <td>0987654321</td>
                    </tr>
                    <tr>
                        <th>Email</th>
                        <td>nguyenvana@gmail.com</td>
                    </tr>
                </tbody>
            </table>
        </div>
        <div id="cart">
            <h2 class="text-primary">Giỏ Hàng</h2>
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>STT</th>
                        <th>Hình</th>
                        <th>Sản phẩm</th>
                        <th>Số lượng</th>
                        <th>Thành tiền</th>
                    </tr>
                </thead>
                <tbody id="cart-items">
                    <!-- Dữ liệu sản phẩm sẽ được thêm vào đây -->
                    <tr>
                        <td>1</td>
                        <td><img src="^1^" alt="Áo thun nam" width="100" height="100"></td>
                        <td>Áo thun nam</td>
                        <td>2</td>
                        <td>200.000 VNĐ</td>
                    </tr>
                    <tr>
                        <td>2</td>
                        <td><img src="^2^" alt="Quần jean nữ" width="100" height="100"></td>
                        <td>Quần jean nữ</td>
                        <td>1</td>
                        <td>300.000 VNĐ</td>
                    </tr>
                </tbody>
            </table>
            <div id="total" class="mb-3">Thành tiền: <span id="total-price">500.000</span> VNĐ</div>
        </div>
    </div>


</body>

</html>