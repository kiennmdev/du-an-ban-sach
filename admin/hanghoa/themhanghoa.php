<div class="main">
    <div class="title">
        Quản lý hàng hóa
    </div>
    <div class="addhanghoa">
        <form action="?act=themhanghoa" method="post" enctype="multipart/form-data">
            <div class="row">
                <div class="mb-3 col">
                    <label for="" class="form-label">Mã sách:</label>
                    <input type="text" class="form-control" id="" placeholder="Mã tự động" name="" disabled>
                </div>
                <div class="mb-3 col">
                    <label for="" class="form-label">Tên sách:</label>
                    <input type="text" class="form-control" id="" placeholder="" name="tensp">
                </div>
            </div>
            <div class="row">
                <div class="mb-3 col">
                    <label for="" class="form-label">Giá sách:</label>
                    <input type="text" class="form-control" id="" placeholder="" name="price">
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
                        <input type="radio" class="form-check-input" id="" name="trangthai" value="1"> Đặc biệt
                        <label class="form-check-label" for=""></label>
                        <input type="radio" class="form-check-input" id="" name="trangthai" value="0" checked> Bình thường
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
                            <option value="<?= $id ?>"><?= $name ?></option>
                        <?php endforeach ?>
                    </select>
                </div>
            </div>
            <div class="row">
                <div class="mb-3 col">
                    <label for="" class="form-label">Hình ảnh:</label>
                    <div class="form-control">
                        <input type="file" name="img" id="">
                    </div>
                </div>
                <div class="mb-3 col">
                    <label for="" class="form-label">Lượt xem:</label>
                    <input type="text" class="form-control" id="" placeholder=" " name="luotxem" value="0" disabled>
                </div>
            </div>

            <div class="mb-3 ">
                <label for="comment">Mô tả:</label>
                <textarea class="form-control" rows="5" id="comment" name="mota"></textarea>
            </div>

            <button type="submit" class="btn btn-success" name="themmoi">Thêm mới</button>

            <a href="?act=hanghoa"><button type="button" class="btn btn-primary">Danh sách</button></a>

            <button type="reset" class="btn btn-primary">Nhập lại</button>
        </form>
    </div>
</div>