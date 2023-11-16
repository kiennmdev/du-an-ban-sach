<div class="main">
            <div class="title mb">
                Chi tiết bình luận
            </div>
            <h4>Hàng hóa: Máy ảnh siêu xịn</h4>
            <div class="listdanhmuc">
                <table class="table">
                    <thead>
                        <tr>
                            <th></th>
                            <th>Nội dung</th>
                            <th>Ngày BL</th>
                            <th>Người BL</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach($dscmt as $cmt):
                            extract($cmt);
                        ?>
                        <tr>
                            <td><input type="checkbox"></td>
                            <td><?= $noidung ?></td>
                            <td><?= $ngaybinhluan ?></td>
                            <td><?= $user ?></td>
                            <td>
                                <a href="?act=xoabinhluan&idsp=<?= $idsp ?>&idbl=<?= $id ?>"><button type="button" class="btn btn-danger" onclick="return confirm('Bạn có muốn xóa không?')">Xóa</button></a>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
                <div class="chucnang">
                    <a href="?act=binhluan"><button type="button" class="btn btn-primary">Danh sách</button></a>
                    <button type="button" class="btn btn-primary">Chọn tất cả</button>
                    <button type="button" class="btn btn-primary">Bỏ chọn tất cả</button>
                    <button type="button" class="btn btn-danger">Xóa các mục chọn</button>
                </div>
            </div>
        </div>