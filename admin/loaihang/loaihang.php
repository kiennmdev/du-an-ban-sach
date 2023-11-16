<div class="main">
    <div class="title">
        Quản lý loại sách
    </div>
    <div class="listdanhmuc">
        <table class="table">
            <thead>
                <tr>
                    <th></th>
                    <th>Mã loại sách</th>
                    <th>Tên loại sách</th>
                    <th>Trạng thái</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                <?php
                foreach ($dsdm as $dm) {
                    extract($dm); ?>
                    <tr>
                        <td><input type="checkbox"></td>
                        <td> <?= $madanhmuc ?> </td>
                        <td> <?= $tendanhmuc ?> </td>
                        <td><?= $trangthai == 1 ? 'Hiện' : 'Ẩn' ?></td>
                        <td>
                            <a href="?act=sualoaihang&iddm=<?= $madanhmuc ?> "><button type="button" class="btn btn-warning">Sửa</button></a>

                            <a href="?act=loaihang&iddm= <?= $madanhmuc ?> "><button type="button" class="btn btn-danger" onclick="return confirm('Bạn có muốn xóa không?')">Xóa</button></a>
                        </td>
                    </tr>
                <?php } ?>
                

            </tbody>
        </table>
        <div class="chucnang">
            <form action="?act=loaihang" method="get">
                <a href="?act=themloaihang"><button type="button" class="btn btn-success" >Thêm mới</button></a>
                <button type="button" class="btn btn-primary">Chọn tất cả</button>
                <button type="button" class="btn btn-primary">Bỏ chọn tất cả</button>
                <button type="button" class="btn btn-danger">Xóa các mục chọn</button>
            </form>
        </div>
    </div>
</div>