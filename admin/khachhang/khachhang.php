<div class="main">
            <div class="title">
                Quản lý khách hàng
            </div>
            <div class="listhanghoa">
                <table class="table">
                    <thead>
                        <tr>
                            <th></th>
                            <th>ID</th>
                            <th>Tên đăng nhập</th>
                            <th>Mật khẩu</th>
                            <th>Hình ảnh</th>
                            <th>Email</th>
                            <th>Số điện thoại</th>
                            <th>Vai trò</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            foreach($dstk as $tk):
                                extract($tk);
                        ?>
                        <tr>
                            <td><input type="checkbox"></td>
                            <td><?= $id ?></td>
                            <td><?= $user ?></td>
                            <td><?= $pass ?></td>
                            <td>
                                <img src="<?= '../' . $img_path . $img ?>" width="50px" alt="">
                            </td>
                            <td><?= $email ?></td>
                            <td><?= $tel ?></td>
                            <td><?= $role ?></td>
                            <td>
                                <a href="?act=suakhachhang&idtk=<?= $id ?>"><button type="button"
                                        class="btn btn-primary">Sửa</button></a>
                                <a href="?act=xoakhachhang&idtk=<?= $id ?>"><button type="button" class="btn btn-danger" onclick="return confirm('Bạn có muốn xóa không?')">Xóa</button></a>
                            </td>
                        </tr>
                        <?php endforeach ?>
                    </tbody>
                </table>
                <div class="chucnang">
                    <a href="?act=themkhachhang"><button type="button" class="btn btn-success">Thêm mới</button></a>
                    <button type="button" class="btn btn-primary">Chọn tất cả</button>
                    <button type="button" class="btn btn-primary">Bỏ chọn tất cả</button>
                    <button type="button" class="btn btn-danger">Xóa các mục chọn</button>
                </div>
            </div>
        </div>