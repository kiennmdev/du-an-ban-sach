<div class="main-content">
    <div class="mb-4">
        <!-- <div class="alert alert-success">
    <strong>Đặt Hàng Thành Công!</strong>&nbsp;<a href="<?= isset($_SESSION['idtk']) ? '?act=profile' : '?act=tracuudonhang' ?>" style="color: #1A585D; text-decoration:none;font-size:13px">(Theo giõi đơn hàng của bạn)</a>
  </div> -->
        <h4 class="text-success">Mã đơn hàng: <?= $madon ?></h4>
        <hr>
        <h5 class="text-primary">Thông tin đơn hàng</h5>
        <div class="row">
            <div class="col-md-8">
                <table class="table table-striped">
                    <tbody>
                        <tr>
                            <th>Họ tên</th>
                            <td><?= $hoten ?></td>
                        </tr>
                        <tr>
                            <th>Địa chỉ</th>
                            <td><?= $diachinhan ?></td>
                        </tr>
                        <tr>
                            <th>Điện thoại</th>
                            <td><?= $sodienthoai ?></td>
                        </tr>
                        <tr>
                            <th>Email</th>
                            <td><?= $email ?></td>
                        </tr>
                        <!-- <tr>
                        <th>Phương thức thanh toán</th>
                        <td>
                            <?= $pttt == 0 ? 'Giao hàng nhận tiền' : 'Chuyển khoản' ?>
                        </td>
                    </tr> -->
                        <tr>
                            <th>Ghi chú</th>
                            <td><?= !empty($ghichu) ? $ghichu : '' ?></td>
                        </tr>
                    </tbody>
            
                </table>
            </div>
            <div class="text-right col-md-4">
                <form class="mb-2" action="?act=bill" method="post">
                    <h4>Phương Thức Thanh Toán</h4>                   
                    <input type="radio" name="payments" id="" value="0"> Giao hàng nhận tiền <br>
                    <input type="radio" name="payments" id="" value="1"> Chuyển khoản <br>
                    <button onclick="return confirm('Bạn có chắc muốn thanh toán?')" type="submit" id="checkout-btn" class="btn btn-danger me-2" name="pay">Thanh Toán Ngay</button>
                </form>
                <form action="view/thanhtoanonline/xulythanhtoanmomo.php" method="post" enctype="application/x-www-form-urlencoded">
                    <input type="hidden" name="tongtien" value="<?=$tongtien?>">
                    <button onclick="return confirm('Bạn có chắc muốn thanh toán?')" type="submit" id="checkout-btn" class="btn btn-danger me-2" name="order">Thanh Toán MOMO</button> <br>
                    <span class="text-danger"><?=$err != "" ? $err : ''?></span> <br>
                </form>
            </div>
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
                for ($i = 0; $i < sizeof($convertcart); $i++) :
                    extract($convertcart[$i]);
                ?>
                    <tr>
                        <td class="text-center">
                            <?= $i + 1 ?>
                            <input type="hidden" name="id[]" value="<?= $masach ?>">
                        </td>
                        <td class="text-center"><img src="<?= $img_path . $hinh ?>" alt=" " width="100" height="100"></td>
                        <td><?= $tensach ?></td>
                        <td class="text-center"><?= number_format($gia - $gia * $giamgia / 100, 0, ',', '.') ?><sup> đ</sup></td>
                        <td class="text-center">
                            <?= $soluongmua ?>
                        </td>
                        <td class="text-center"><?= number_format($soluongmua * ($gia - $gia * $giamgia / 100), 0, ',', '.') ?><sup> đ</sup></td>
                    </tr>
                <?php endfor ?>
                <tr>
                    <th colspan="5">Tổng: </th>
                    <th colspan="2" class="text-center"><?= number_format(tong_thanh_tien(), 0, ',', '.') ?><sup> đ</sup></th>
                </tr>
            </tbody>
        </table>
    </div>

</div>

</div>
</main>
</div>