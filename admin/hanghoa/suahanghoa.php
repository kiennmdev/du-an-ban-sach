<div class="main">
    <div class="title">
        Quản lý hàng hóa
    </div>
    <div class="addhanghoa">
        <form action="?act=suahanghoa&idsp=<?= $id ?>" method="post" enctype="multipart/form-data">
            <div class="row">
                <div class="mb-3 col">
                    <label for="" class="form-label">Mã hàng hóa:</label>
                    <input type="text" class="form-control" id="" placeholder="" name="" value="<?=$id?>" disabled>
                </div>
                <div class="mb-3 col">
                    <label for="" class="form-label">Tên sản phẩm:</label>
                    <input type="text" class="form-control" id="" placeholder="" name="tensp" value="<?=$name?>">
                </div>
            </div>
            <div class="row">
                <div class="mb-3 col">
                    <label for="" class="form-label">Giá sản phẩm:</label>
                    <input type="text" class="form-control" id="" placeholder="" name="price" value="<?= $price ?>">
                </div>
                <div class="mb-3 col">
                    <label for="" class="form-label">Mức giảm giá:</label>
                    <input type="text" class="form-control" id="" placeholder=" " name="discount" readonly>
                </div>
            </div>
            <div class="row">
                <div class="mb-3 col">
                    <label for="" class="form-label">Trạng thái đặc biệt:</label>
                    <div class="form-control">
                        <input type="radio" class="form-check-input" id="" name="trangthai" value="1" <?= ($trangthai == 1) ? 'checked' : '' ?>> Đặc biệt
                        <label class="form-check-label" for=""></label>
                        <input type="radio" class="form-check-input" id="" name="trangthai" <?= ($trangthai == 0) ? 'checked' : '' ?> value="0"> Bình thường
                        <label class="form-check-label" for=""></label>
                    </div>
                </div>
                <div class="mb-3 col">
                    <label for="" class="form-label">Loại hàng:</label>
                    <select class="form-control" name="loaihang" id="">
                        <?php
                        foreach ($dsdm as $dm) :
                            extract($dm);
                        ?>
                            <option value="<?= $id ?>" <?= ($iddm == $id) ? 'selected' : '' ?>> <?= $name ?> </option>
                        <?php endforeach ?>
                    </select>
                </div>
            </div>
            <div class="row">
                <div class="mb-3 col">
                    <label for="" class="form-label">Hình ảnh:</label>
                    <div class="form-control">
                        <input type="file" name="img" id=""> <br><br>
                        <img src="<?= '../' . $img_path . $img ?>" alt="" width="100px">
                    </div>
                </div>
                <div class="mb-3 col">
                    <label for="" class="form-label">Lượt xem:</label>
                    <input type="text" class="form-control" id="" placeholder=" " name="luotxem" value="<?= $luotxem ?>" readonly>
                </div>
            </div>

            <div class="mb-3 ">
                <label for="comment">Mô tả:</label>
                <textarea class="form-control" rows="5" id="comment" name="mota"><?= $mota ?></textarea>
            </div>

            <button type="submit" class="btn btn-success" name="suahanghoa">Sửa</button>

            <a href="?act=hanghoa"><button type="button" class="btn btn-primary">Danh sách</button></a>

            <button type="reset" class="btn btn-primary">Nhập lại</button>
        </form>
    </div>
</div>