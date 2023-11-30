<div class="main-content">
    <h3 class="text-primary">Chi Tiết Đơn Hàng</h3>
    <a href="<?= $_SERVER['HTTP_REFERER'] ?>" class="text-dark none-underline"><i class="fa-solid fa-arrow-left"></i>&nbsp;Quay về</a>
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