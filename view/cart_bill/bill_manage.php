<div class="main-content">
    <h3 class="text-primary">Danh Sách Đơn Hàng</h3>
    <table class="table table-hover">
        <thead>
            <tr>
                <th>STT</th>
                <th>Mã đơn hàng</th>
                <th>Người đặt</th>
                <th>Ngày Đặt</th>
                <th>Tổng cộng</th>
                <th>Trạng thái</th>
                <th>Hình thức thanh toán</th>
                <th class="text-center">Chi tiết đơn</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            <?php if($dsbill == true):?>
                <?php for ($i = 0; $i < sizeof($dsbill); $i++) :
                extract($dsbill[$i]);
            ?>
                <tr>
                    <td><?= $i + 1 ?></td>
                    <td><?= $id ?></td>
                    <td><?= $hoten ?></td>
                    <td><?=$ngaydathang?></td>
                    <td><?= number_format($tongtien,0,',','.')?><sup>đ</sup></td>
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
                        <td>
                            <?php if($cachthanhtoan==2): ?>
                                <a href="?act=managebill&congthanhtoan=momo&code_cart=<?=$id?>" style="text-decoration: none;">MoMo</a>
                            <?php else:
                                echo $cachthanhtoan == 0 ? 'Giao hàng nhận tiền' : 'Chuyển khoản';
                            ?>
                            <?php endif ?>   
                        </td>
                    <td class="text-center">
                        <a href="?act=detailbill&mabill=<?=$id?>" class="btn btn-secondary">Xem</a>
                    </td>
                    <td>
                    <?php if ($trangthai == 0): ?>
                        <a href="?act=managebill&cancel=<?=$id?>" class="btn btn-danger" onclick="return confirm('Bạn có chắc muốn hủy đơn hàng này không')">Hủy</a>
                        <?php endif ?>
                    </td>
                </tr>
            <?php endfor ?>
            <?php else: ?>
                <tr class="table-secondary">
                    <td class="text-center" colspan="8">No matching records found</td>
                </tr>
            <?php endif ?>
        </tbody>
    </table>
    <?php if (isset($_GET['congthanhtoan'])): ?>
        <h4 class="text-primary">Chi tiết thanh toán qua cổng thanh toán: momo</h4>
        <table class="table">
            <thead>
            <tr>
                <th>Partner_code</th>
                <th>Order_id</th>
                <th>Amount</th>
                <th>Order_info</th>
                <th>Order_type</th>
                <th>Trans_id</th>
                <th>Pay_type</th>
                <th>Code_cart</th>
            </tr>
            </thead>
            <tbody>
            <tr>
                <td><?=$partner_code?></td>
                <td><?=$order_id?></td>
                <td><?=$amount?></td>
                <td><?=$order_info?></td>
                <td><?=$order_type?></td>
                <td><?=$trans_id?></td>
                <td><?=$pay_type?></td>
                <td><?=$ma_don?></td>
            </tr>
            </tbody>
        </table>
        <?php endif?>
</div>
</main>
</div>