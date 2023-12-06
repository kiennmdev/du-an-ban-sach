<div class="main-content">
    <h4>Giao dịch thanh toán bằng MOMO thành công</h4>
    <p>Vui lòng vào trang <a href="<?= isset($_SESSION['idtk']) ? '?act=managebill&status=0' : '?act=tracuudonhang' ?>">quản lý đơn hàng</a> để xem chi tiết đơn hàng của bạn</p>
</div>

</div>
</main>
</div>
<?php unset($_SESSION['giohang']); unset($_SESSION['thongtinkhachhang']); ?>