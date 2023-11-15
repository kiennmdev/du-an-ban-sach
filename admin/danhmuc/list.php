<div class="container">
    <div class="tittleinadmin my-2">
        <h2>DANH SÁCH DANH MỤC</h2>
    </div>
    <?php if (isset($thongbao)) { ?>
        <div class="alert alert-success">
            <strong><?= $thongbao ?></strong>
        </div>
    <?php } ?>
    <form class="d-flex my-3">
        <input class="form-control me-2" type="text" placeholder="Search">
        <button class="btn btn-success" type="button">Search</button>
    </form>
    <table class="table table-bordered">
        <tr>
            <th></th>
            <th>Mã danh mục</th>
            <th>Tên danh mục</th>
            <th>Trạng thái</th>
            <th></th>
        </tr>
        <?php foreach ($danhmuc as $dm) : ?>
            <?php extract($dm) ?>
            <tr>
                <td class="text-center"><input type="checkbox" name="" id=""></td>
                <td><?= $madanhmuc ?></td>
                <td><?= $tendanhmuc ?></td>
                <td><?php echo $trangthai ? "Hiển thị" : "Ẩn" ?></td>
                <td class="text-center"><input type="button" class="btn btn-primary mx-3" value="Sửa"><input type="button" class="btn btn-danger mx-3" value="Xóa"></td>
            </tr>
        <?php endforeach ?>
    </table>
    <a href="?act=themdm"><input type="button" class="btn btn-success mx-3" value="Nhập thêm"></a>
    <a href=""><input type="button" class="btn btn-success mx-3" value="Chọn tất cả"></a>
    <a href=""><input type="button" class="btn btn-success mx-3" value="Bỏ chọn tất cả"></a>
    <a href=""><input type="button" class="btn btn-success mx-3" value="Xóa tất cả"></a>
</div>