
    <div class="main-content">
        <form action="?act=order" method="post">
        <div class="mb-4">
             <h4 class="text-primary h2">Thông Tin Cá Nhân</h4>
            <hr>
            <div class="mb-3">
                <label for="" class="form-label">Họ và tên:</label>
                <input type="text" class="form-control" id="" placeholder="Nhập họ và tên" name="hoten" value="<?= isset($hoten) ? $hoten : "" ?>">
                <span class="text-danger"><?=isset($check_err_order['hoten'])?$check_err_order['hoten']:''?></span>
            </div>
            <div class="mb-3">
                <label for="" class="form-label">Email:</label>
                <input type="text" class="form-control" id="" placeholder="Nhập email" name="email" value="<?= isset($email) ? $email : "" ?>">
                <span class="text-danger"><?=isset($check_err_order['email'])?$check_err_order['email']:''?></span>
            </div>
            <div class="mb-3">
                <label for="" class="form-label">Số điện thoại:</label>
                <input type="text" class="form-control" id="" placeholder="Nhập số điện thoại" name="sodienthoai" value="<?= isset($sodienthoai) ? $sodienthoai : "" ?>">
                <span class="text-danger"><?=isset($check_err_order['sodienthoai'])?$check_err_order['sodienthoai']:''?></span>
            </div>
            <div class="mb-3">
                <label for="" class="form-label">Địa chỉ nhận:</label>
                <input type="text" class="form-control" id="" placeholder="Nhập địa chỉ" name="diachinhan" value="<?= isset($diachi) ? $diachi : ""  ?>">
                <span class="text-danger"><?=isset($check_err_order['diachinhan'])?$check_err_order['diachinhan']:''?></span>
            </div>
            <div class="mb-3">
                <label for="" class="form-label">Ghi chú:</label>
                <input type="text" class="form-control" id="" placeholder="Nhập ghi chú" name="ghichu">
            </div>
            <div class="mb-3">
                <label for="" class="form-label">Hình thức thanh toán:</label>
                <select class="form-select" id="payment-method" name="payments">
                    <option value="0">Giao hàng nhận tiền</option>
                    <option value="1">Chuyển khoản</option>
                </select>
            </div>
        </div>
        <div id="cart">
            <table class="table table-hover">
                <thead class="table-primary">
                    <tr>
                        <th class="text-center">STT</th>
                        <th class="text-center">Hình</th>
                        <th class="text-center">Sản phẩm</th>
                        <th class="text-center">Giá</th>
                        <th class="text-center">Số lượng</th>
                        <th class="text-center">Thành tiền</th>
                    </tr>
                </thead>
                <tbody id="cart-items">
                    <!-- Dữ liệu sản phẩm sẽ được thêm vào đây -->
                    <?php 
                        $convertcart = array_values($_SESSION['giohang']);
                        for($i = 0; $i < sizeof($convertcart);$i++): 
                        extract($convertcart[$i]);
                        ?>
                    <tr>
                        <td class="text-center">
                            <?= $i + 1 ?>
                            <input type="hidden" name="id[]" value="<?= $masach ?>">
                        </td>
                        <td class="text-center"><img src="<?= $img_path . $hinh ?>" alt=" " width="100" height="100"></td>
                        <td><?= $tensach ?></td>
                        <td class="text-center"><?= number_format($gia - $gia*$giamgia/100,0,',','.') ?><sup> đ</sup></td>
                        <td class="text-center">
                            <?= $soluongmua ?>
                        </td>
                        <td class="text-center"><?=number_format($soluongmua*($gia - $gia*$giamgia/100),0,',','.')?><sup> đ</sup></td>
                    </tr>
                    <?php endfor ?>
                    <tr>
                        <th colspan="5">Tổng: </th>
                        <th colspan="2" class="text-center"><?=number_format(tong_thanh_tien(),0,',','.') ?><sup> đ</sup></th>
                    </tr>
                </tbody>
            </table>
        </div>
        <button onclick="return confirm('Bạn có chắc muốn đặt hàng?')" type="submit" id="checkout-btn" class="btn btn-danger me-2" name="order">Đặt Hàng</button>
        <a href="?act=giohang" class="btn btn-primary me-2">Chỉnh sửa đơn hàng</a>
        </form>
    </div>

    </div>
</main>
</div>