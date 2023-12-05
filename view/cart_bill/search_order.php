<div class="main-content">
    <h3 class="text-center maincolor">Kiểm tra đơn hàng của bạn</h3>
    <div class="form-search-order mb-3">
        <form action="?act=tracuudonhang" method="POST" class="d-flex justify-content-center" style="margin: 0 auto; width:600px">
            <div class="form-order-input col">
                <input type="text" name="idbill" class="form-control" placeholder="Vui lòng nhập mã đơn hàng*" id="">
            </div>
            <div class="form-order-button">
                <button class="btn btn-success ">Tra cứu</button>
            </div>
        </form>
    </div>
    <?php if(isset($_GET['mabill'])): 
            extract($bill);
        ?>
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
        <?php else: ?>
        <?php if($_SERVER['REQUEST_METHOD'] === 'POST'):?>
        <table class="table table-hover">
            <thead class="table-primary">
                <tr>
                    <th>Mã đơn hàng</th>
                    <th>Người đặt</th>
                    <th>Tổng Tiền</th>
                    <th>Địa chỉ nhận</th>
                    <th>Ngày đặt hàng</th>
                    <th>Trạng thái</th>
                    <th class="text-center">Chi tiết đơn</th>
                </tr>
            </thead>
            <tbody>
                <?php if(isset($bill) && $bill == true):
                        extract($bill);
                    ?>
                    <tr>
                        <td><?= $id ?></td>
                        <td><?= $hoten ?></td>
                        <td><?= number_format($tongtien,0,',','.')?><sup>đ</sup></td>
                        <td><?=$diachinhan?></td>
                        <td><?=$ngaydathang?></td>
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
                        <td class="text-center">
                            <a href="?act=tracuudonhang&mabill=<?=$id?>" class="btn btn-secondary">Xem</a>
                        </td>
                    </tr>
                <?php else: ?>
                    <tr class="table-secondary">
                        <td class="text-center" colspan="8">No matching records found</td>
                    </tr>
                <?php endif ?>
            </tbody>
        </table>
        <?php endif ?>
    <?php endif ?>
</div>
</main>
</div>