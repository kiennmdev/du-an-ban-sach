<div class="main-content">
    <h3 class="text-primary">Danh Sách Đơn Hàng</h3>
    <table class="table table-hover">
        <thead>
            <tr>
                <th>STT</th>
                <th>Mã đơn hàng</th>
                <th>Người đặt</th>
                <th>Tổng cộng</th>
                <th>Trạng thái</th>
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
</div>
</main>
</div>