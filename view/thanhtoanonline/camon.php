<div class="main-content">
    <?php if ($thongbao): ?>
    <h4>Giao dịch thanh toán bằng MOMO thành công</h4>
    <p>Vui lòng vào trang <a href="<?= isset($_SESSION['idtk']) ? '?act=managebill&status=0' : '?act=tracuudonhang' ?>">quản lý đơn hàng</a> để xem chi tiết đơn hàng của bạn</p>
    <?php else: ?>
        <h4>Giao dịch thất bại</h4>
        <p>Giao dịch của bạn đã bị hủy. Quay về <a href="?act=giohang">giỏ hàng</a> của bạn</p>
    <?php endif?>
</div>

</div>
</main>
</div>
<?php 
    if ($thongbao) {
        unset($_SESSION['giohang']);
    }
    unset($_SESSION['thongtinkhachhang']);
?>