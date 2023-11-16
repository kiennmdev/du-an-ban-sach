<div class="main">
            <div class="title">
                Quản lý hàng hóa
            </div>
            <div class="listhanghoa">
                <form action="?act=hanghoa" method="post">
                <table class="table">
                    <thead>
                        <tr>
                            <th></th>
                            <th>Mã sách</th>
                            <th>Tên sách</th>
                            <th>Hình ảnh</th>
                            <th>Giá</th>
                            <th>Số lượng</th>
                            <th>Trạng thái</th>
                            <th>Loại sách</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            foreach ($dssp as $sp):
                                extract($sp);
                        ?>
                        <tr>
                            <td class="text-center"><input type="checkbox" class="checkbox" name="masach[]" value="<?=$masach?>"></td>
                            <td><?= $masach ?></td>
                            <td><?= $tensach ?></td>
                            <td>
                                <img src="<?= "../". $img_path . $hinh ?>" width="50px" alt="">
                            </td>
                            <td><?= $gia ?></td>
                            <td><?= $soluong ?></td>
                            <td><?= $trangthai == 1 ? 'Hiện' : 'Ẩn' ?></td>
                            <td><?= $tendanhmuc ?></td>
                            <td>
                                <a href="?act=suahanghoa&idsp=<?= $masach ?>"><button type="button"
                                        class="btn btn-warning">Sửa</button></a>
                                <a href="?act=hanghoa&idsp=<?= $masach ?>"><button type="button" class="btn btn-danger" onclick="return confirm('Bạn có muốn xóa không?')">Xóa</button></a>
                            </td>
                        </tr>
                        <?php endforeach ?>
                    </tbody>
                </table>
                <div class="chucnang">
                    <a href="?act=themhanghoa"><button type="button" class="btn btn-success">Thêm mới</button></a>
                    <button type="button" id="checkall" class="btn btn-primary">Chọn tất cả</button>
                    <button type="button" id="clearall" class="btn btn-primary">Bỏ chọn tất cả</button>
                    <button type="submit" id="deleteall" class="btn btn-danger" onclick="return confirm('Bạn có muốn xóa không?')">Xóa các mục chọn</button>
                </div>
                </form>
            </div>
        </div>