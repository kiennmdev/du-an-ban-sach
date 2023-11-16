<div class="main">
    <div class="title">
        Quản lý hàng hóa
    </div>
    <div class="addhanghoa">
        <form action="?act=themhanghoa" method="post" enctype="multipart/form-data">
            <div class="row">
                <div class="mb-3 col">
                    <label for="" class="form-label">Tên sách:<span class="important">*</span></label>
                    <input type="text" class="form-control" id="" placeholder="" name="tensach" >
                    <span class="err"><?= isset($err['tensach']) ? $err['tensach'] : '' ?></span>
                </div>
                <div class="mb-3 col">
                    <label for="" class="form-label">Nhà xuất bản:<span class="important">*</span></label>
                    <input type="text" class="form-control" id="" placeholder="" name="nxb">
                    <span class="err"><?= isset($err['nxb']) ? $err['nxb'] : '' ?></span>
                </div>
            </div>
            <div class="row">
                <div class="mb-3 col">
                    <label for="" class="form-label">Giá sách:<span class="important">*</span></label>
                    <input type="text" class="form-control" id="" placeholder="" name="gia">
                    <span class="err"><?= isset($err['gia']) ? $err['gia'] : '' ?></span>
                </div>
                <div class="mb-3 col">
                    <label for="" class="form-label">Ngày xuất bản:<span class="important">*</span></label>
                    <input type="date" class="form-control" id="" placeholder="" name="timexb" >
                    <span class="err"><?= isset($err['timexb']) ? $err['timexb'] : '' ?></span>
                </div>
            </div>
            <div class="row">
                <div class="mb-3 col">
                    <label for="" class="form-label">Trạng thái:<span class="important">*</span></label>
                    <div class="form-control">
                        <input type="radio" class="form-check-input" id="" name="trangthai" value="1" checked> Hiện
                        <label class="form-check-label" for=""></label>
                        <input type="radio" class="form-check-input" id="" name="trangthai" value="0" > Ẩn
                        <label class="form-check-label" for=""></label>
                    </div>
                </div>
                <div class="mb-3 col">
                    <label for="" class="form-label">Loại sách:<span class="important">*</span></label>
                    <select class="form-control" name="loaisach" id="">
                        <?php
                            foreach ($dsdm as $dm) :
                                extract($dm);
                        ?>
                            <option value="<?= $madanhmuc ?>"><?= $tendanhmuc ?></option>
                        <?php endforeach ?>
                    </select>
                </div>
            </div>
            <div class="row">
                <div class="mb-3 col">
                    <label for="" class="form-label">Hình ảnh:<span class="important">*</span></label>

                        <input type="file" class="form-control" name="hinh" id="">

                    <span class="err"><?= isset($err['img']) ? $err['img'] : '' ?></span>
                </div>
                <div class="mb-3 col">
                    <label for="" class="form-label">Số lượng:<span class="important">*</span></label>
                    <input type="text" class="form-control" id="" placeholder=" " name="soluong" value="">
                    <span class="err"><?= isset($err['soluong']) ? $err['soluong'] : '' ?></span>
                </div>
            </div>

            <div class="mb-3 ">
                <label for="comment">Mô tả:<span class="important">*</span></label>
                <textarea class="form-control" rows="5" id="comment" name="mota"></textarea>
                <span class="err"><?= isset($err['mota']) ? $err['mota'] : '' ?></span>
            </div>

            <button type="submit" class="btn btn-success" name="themmoi">Thêm mới</button>

            <a href="?act=hanghoa"><button type="button" class="btn btn-primary">Danh sách</button></a>

            <button type="reset" class="btn btn-primary">Nhập lại</button>
        </form>
    </div>
</div>