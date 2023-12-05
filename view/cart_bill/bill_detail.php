<div class="main-content">
    <h3 class="text-primary">Chi Tiết Đơn Hàng</h3>
    <a href="<?= $_SERVER['HTTP_REFERER'] ?>" class="text-dark none-underline"><i class="fa-solid fa-arrow-left"></i>&nbsp;Quay về</a>
        <?php extract($bill); ?>
            <h4 class="text-success">Mã đơn hàng: <?=$id?></h4>
            <hr>
            <h5 class="text-primary">Thông tin đơn hàng</h5>
            <table class="table table-striped">
                <tbody>
                    <tr>
                        <th>Họ tên</th>
                        <td><?= $hoten ?></td>
                    </tr>
                    <tr>
                        <th>Địa chỉ nhận</th>
                        <td><?=$diachinhan?></td>
                    </tr>
                    <tr>
                        <th>Điện thoại</th>
                        <td><?=$sodienthoai?></td>
                    </tr>
                    <tr>
                        <th>Email</th>
                        <td><?=$email?></td>
                    </tr>
                    <tr>
                        <th>Tổng tiền</th>
                        <td><?=number_format($tongtien,0,',','.')?><sup>đ</sup></td>
                    </tr>
                    <tr>
                        <th>Ngày đặt hàng</th>
                        <td><?=$ngaydathang?></td>
                    </tr>
                    <tr>
                        <th>Ghi chú</th>
                        <td><?=$ghichu?></td>
                    </tr>
                    <tr>
                        <th>Trạng thái</th>
                        <td class="
                            <?php
                            if ($trangthai == 0) {
                                $status = 'Chờ xác nhận';
                                echo  'text-secondary';
                            } else if ($trangthai == 1) {
                                $status = 'Đã xác nhận';
                                echo 'text-primary';
                            } else if ($trangthai == 2) {
                                $status = 'Chờ giao hàng';
                                echo 'text-warning';
                            } else if ($trangthai == 3) {
                                $status = 'Hoàn thành';
                                echo  'text-success';
                            } else {
                                $status = 'Đã hủy đơn';
                                echo 'text-danger';
                            };
                            ?>"><?= $status ?></td>
                    </tr>
                    <tr>
                        <th>Phương thức thanh toán</th>
                        <td><?= $cachthanhtoan == 0 ? 'Giao hàng nhận tiền' : 'Chuyển khoản'?></td>
                    </tr>
                </tbody>
            </table>
    <table class="table table-hover">
        <thead>
            <tr>
                <th>STT</th>
                <th>Hình ảnh</th>
                <th>Tên sách</th>
                <th>Đơn giá</th>
                <th>Số lượng</th>
                <th>Thành tiền</th>
            </tr>
        </thead>
        <tbody>
                <?php for ($i = 0; $i < sizeof($dsspdh); $i++) :
                extract($dsspdh[$i]);
            ?>
                <tr>
                    <td><?= $i + 1 ?></td>
                    <td>
                        <img src="<?= $img_path . $hinh ?>" alt="" width="100px">
                    </td>
                    <td><?= $tensach ?></td>
                    <td><?= $dongia ?></td>
                    <td><?= $soluong ?></td>
                    <td><?=$thanhtien?></td>
                </tr>
            <?php endfor ?>
    </table>
</div>
</main>
</div>