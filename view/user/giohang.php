
    <div class="main-content">
        <form action="?act=giohang" class="mb-4" id="info-form" method="post">
            <!-- <h4 class="text-success h2">Thông Tin Cá Nhân</h4>
            <hr>
            <div class="mb-3">
                <label for="" class="form-label">Họ và tên:</label>
                <input type="text" class="form-control" id="" placeholder="Nhập họ và tên" name="hoten" value="<?= $hoten ?>">
            </div>
            <div class="mb-3">
                <label for="" class="form-label">Số điện thoại:</label>
                <input type="text" class="form-control" id="" placeholder="Nhập số điện thoại" name="sodienthoai" value="<?= $sodienthoai ?>">
            </div>
            <div class="mb-3">
                <label for="" class="form-label">Địa chỉ nhận:</label>
                <input type="text" class="form-control" id="" placeholder="Nhập địa chỉ" name="diachinhan" value="<?= $diachi ?>">
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
            </div> -->
        
        <div id="cart">
            <h2 class="text-success">Giỏ Hàng</h2>
            <?php if(isset($_SESSION['giohang']) && $_SESSION['giohang']): ?>
                <table class="table table-striped table-bordered ">
                <thead>
                    <tr>
                        <th class="text-center">STT</th>
                        <th class="text-center">Hình</th>
                        <th class="text-center">Sản phẩm</th>
                        <th class="text-center">Giá</th>
                        <th class="text-center">Số lượng</th>
                        <th class="text-center">Thành tiền</th>
                        <th class="text-center">Xoá</th>
                    </tr>
                </thead>
                <tbody id="cart-items">
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
                        <td>
                            <input class="form-control" type="number" name="soluong[]" id="" min="1" max="<?= $soluongsach ?>" value="<?= $soluongmua ?>">
                        </td>
                        <td class="text-center"><?=number_format($soluongmua*($gia - $gia*$giamgia/100),0,',','.')?><sup> đ</sup></td>
                        <td class="text-center"><button class="btn btn-danger">Xoá</button></td>
                    </tr>
                    <?php endfor ?>
                    <tr>
                        <th colspan="5">Tạm Tính: </th>
                        <th colspan="2" class="text-center"><?=number_format(tong_thanh_tien(),0,',','.') ?><sup> đ</sup></th>
                    </tr>
                </tbody>
            </table>
            <div class="d-flex align-items-start">
                <!-- <a href="?act=order" class="btn btn-success me-2" onclick="return confirm('Bạn có chắc muốn đặt hàng?')">Đặt Hàng</a> -->
                <a href="?act=order" class="btn btn-success me-2">Đặt Hàng</a>
                <button class="btn btn-warning me-2" type="submit" name="updatecart">Cập nhật giỏ hàng</button>
                <a href="?act=danhsach" class="btn btn-secondary me-2">Chọn Thêm Sản Phẩm</a>
                <a href="" class="btn btn-danger me-2">Xoá Giỏ Hàng</a>
                
            </div>
            <?php else: ?>
                <p class="text-center text-danger">Giỏ hàng trống</p>
                <a href="?act=danhsach" class="btn btn-secondary me-2"> Tiếp tục xem sản phẩm</a>
                <?php endif?>
                
        </div>
        </form>
    </div>
    </div>
</main>
</div>