
    <div class="main-content">
        <form action="?act=giohang" class="mb-4" id="info-form" method="post">
        
        <div id="cart">
            <h2 class="text-success">Giỏ Hàng</h2>
            <a href="?act=danhsach" class="text-dark" ><i class="fa-solid fa-arrow-left"></i>&nbsp;Chọn Thêm Sản Phẩm</a>
            <?php if(isset($_SESSION['giohang']) && $_SESSION['giohang']): ?>
                <table class="table table-striped table-bordered mt-2">
                <thead>
                    <tr>
                        <th class="text-center">STT</th>
                        <th class="text-center">Hình</th>
                        <th class="text-center">Sản phẩm</th>
                        <th class="text-center">Giá</th>
                        <th class="text-center">Số lượng</th>
                        <th class="text-center">Thành tiền</th>
                        <th class="text-center"></th>
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
                        <td class="text-center"><a href="?act=giohang&delspcart=<?=$masach?>" class="text-dark"><i class="fa-solid fa-trash"></i></a></td>
                    </tr>
                    <?php endfor ?>
                    <tr>
                        <th colspan="5">Tạm Tính: </th>
                        <th colspan="2" class="text-center"><?=number_format(tong_thanh_tien(),0,',','.') ?><sup> đ</sup></th>
                    </tr>
                </tbody>
            </table>
            <div class="d-flex justify-content-between">
                <!-- <a href="?act=order" class="btn btn-success me-2" onclick="return confirm('Bạn có chắc muốn đặt hàng?')">Đặt Hàng</a> -->
                <div class="chucnang1">
                <a href="?act=order" class="btn btn-success me-2">Mua Hàng</a>
                <a href="?act=giohang&delcart=1" class="btn btn-danger me-2">Xoá Giỏ Hàng</a>
                </div>
                <button class="btn btn-primary" type="submit" name="updatecart">Cập nhật giỏ hàng</button>
            </div>
            <?php else: ?>
                <p class="text-center text-danger">Giỏ hàng trống</p>
                <hr>
                <?php endif?>
                
        </div>
        </form>
    </div>
    </div>
</main>
</div>