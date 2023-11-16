<div class="main">
            <div class="title">
                Quản lý hàng hóa
            </div>
            <div class="listhanghoa">
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
                            <td><input type="checkbox"></td>
                            <td><?= $id ?></td>
                            <td><?= $name ?></td>
                            <td>
                                <img src="<?= "../". $img_path . $img ?>" width="50px" alt="">
                            </td>
                            <td>$<?= $price ?></td>
                            <td><?= $luotxem ?></td>
                            <td>Bình thường</td>
                            <td><?= $tendanhmuc ?></td>
                            <td>
                                <a href="?act=suahanghoa&idsp=<?= $id ?>"><button type="button"
                                        class="btn btn-primary">Sửa</button></a>
                                <a href="?act=xoahanghoa&idsp=<?= $id ?>"><button type="button" class="btn btn-danger" onclick="return confirm('Bạn có muốn xóa không?')">Xóa</button></a>
                            </td>
                        </tr>
                        <?php endforeach ?>
                    </tbody>
                </table>
                <div class="chucnang">
                    <a href="?act=themhanghoa"><button type="button" class="btn btn-success">Thêm mới</button></a>
                    <button type="button" class="btn btn-primary">Chọn tất cả</button>
                    <button type="button" class="btn btn-primary">Bỏ chọn tất cả</button>
                    <button type="button" class="btn btn-danger">Xóa các mục chọn</button>
                </div>
            </div>
        </div>