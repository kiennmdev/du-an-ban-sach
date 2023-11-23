
    <div class="main-content">
        <form action="" class="mb-4" id="info-form">
            <h4 class="text-success h2">Thông Tin Cá Nhân</h4>
            <hr>
            <div class="mb-3">
                <label for="" class="form-label">Họ và tên:</label>
                <input type="text" class="form-control" id="" placeholder="Nhập họ và tên" name="">
            </div>
            <div class="mb-3">
                <label for="" class="form-label">Số điện thoại:</label>
                <input type="text" class="form-control" id="" placeholder="Nhập số điện thoại" name="">
            </div>
            <div class="mb-3">
                <label for="" class="form-label">Địa chỉ:</label>
                <input type="text" class="form-control" id="" placeholder="Nhập địa chỉ" name="">
            </div>
            <div class="mb-3">
                <label for="" class="form-label">Hình thức thanh toán:</label>
                <select class="form-select" id="payment-method" name="">
                    <option value="Tiền mặt">Thanh toán tiền mặt</option>
                    <option value="Chuyển khoản">Thanh toán chuyển khoản</option>
                </select>
            </div>
        </form>
        <div id="cart">
            <h2 class="text-success">Giỏ Hàng</h2>
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>STT</th>
                        <th>Hình</th>
                        <th>Sản phẩm</th>
                        <th>Số lượng</th>
                        <th>Thành tiền</th>
                        <th>Xoá</th>
                    </tr>
                </thead>
                <tbody id="cart-items">
                    <tr>
                        <td>1</td>
                        <td><img src="" alt=" " width="100" height="100"></td>
                        <td>Áo thun nam</td>
                        <td>
                            <input class="form-control" type="number" name="" id="" min="1" max="10" value="1">
                        </td>
                        <td>200.000 VNĐ</td>
                        <td><button class="btn btn-danger">Xoá</button></td>
                    </tr>
                </tbody>
            </table>
            <div id="total" class="mb-3">Tạm tính: <span id="total-price">500.000</span> VNĐ</div>
            <div class="d-flex align-items-start">
                <button type="submit" id="checkout-btn" class="btn btn-success me-2">Đặt Hàng</button>
                <a href=""><button id="clear-btn" class="btn btn-danger me-2">Xoá Giỏ Hàng</button></a>
                <a href="?act=danhsach"><button class="btn btn-secondary"> Chọn Thêm Sản Phẩm </button></a>
            </div>
        </div>
    </div>
    </div>
</main>
</div>