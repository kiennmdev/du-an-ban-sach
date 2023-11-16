<div class="main">
            <div class="title">
                Quản lý loại sách
            </div>
            <div class="addloaihang">
                <form action="" method="post">
                    <div class="mb-3 mt-3">
                        <label for="" class="form-label">Mã loại sách:</label>
                        <input type="text" class="form-control" id="" value="<?= $madanhmuc ?>" name="madanhmuc" readonly>
                    </div>
                    <div class="mb-3">
                        <label for="tenloaihang" class="form-label">Tên loại hàng:<span class="important">*</span></label>
                        <input type="text" class="form-control" id="tenloaihang" placeholder="" value="<?= $tendanhmuc ?>" name="tendanhmuc">
                        <span class="err"><?= isset($err['tenloaihang']) ? $err['tenloaihang'] : '' ?></span>
                    </div>
                    <div class="mb-3">
                        <label for="trangthai" class="form-label">Trạng thái:<span class="important">*</span></label>
                        <div class="form-control">
                        <input type="radio" class="form-check-input" name="trangthai" id="" value="1" <?= $trangthai == 1 ? 'checked' : ''  ?>> Hiện
                        <input type="radio" class="form-check-input" name="trangthai" id="" value="0" <?= $trangthai == 0 ? 'checked' : ''  ?>> Ẩn
                        </div>
                        <span class="err"><?= isset($err['trangthai']) ? $err['trangthai'] : '' ?></span>
                    </div>
                    <button type="submit" class="btn btn-success" name="sualoaihang">Sửa loại hàng</button>
                    <a href="?act=loaihang"><button type="button" class="btn btn-primary">Danh Sách</button></a>
                </form>
            </div>
        </div>