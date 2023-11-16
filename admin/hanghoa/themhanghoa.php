<div class="main">
    <div class="title">
        Quản lý hàng hóa
    </div>
    <div class="addhanghoa">
        <form action="?act=themhanghoa" method="post" enctype="multipart/form-data">
            <div class="row">
                <div class="mb-3 col">
                    <label for="" class="form-label">Tên sách:</label>
                    <input type="text" class="form-control" id="" placeholder="" name="tensach" >
                </div>
                <div class="mb-3 col">
                    <label for="" class="form-label">Nhà xuất bản:</label>
                    <input type="text" class="form-control" id="" placeholder="" name="nxb">
                </div>
            </div>
            <div class="row">
                <div class="mb-3 col">
                    <label for="" class="form-label">Giá sách:</label>
                    <input type="text" class="form-control" id="" placeholder="" name="gia">
                </div>
                <div class="mb-3 col">
                    <label for="" class="form-label">Ngày xuất bản:</label>
                    <input type="date" class="form-control" id="" placeholder="" name="timexb" >
                </div>
            </div>
            <div class="row">
                <div class="mb-3 col">
                    <label for="" class="form-label">Trạng thái:</label>
                    <div class="form-control">
                        <input type="radio" class="form-check-input" id="" name="trangthai" value="1" checked> Hiện
                        <label class="form-check-label" for=""></label>
                        <input type="radio" class="form-check-input" id="" name="trangthai" value="0" > Ẩn
                        <label class="form-check-label" for=""></label>
                    </div>
                </div>
                <div class="mb-3 col">
                    <label for="" class="form-label">Loại sách:</label>
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
                    <label for="" class="form-label">Hình ảnh:</label>
                    <div class="form-control">
                        <input type="file" name="hinh" id="">
                    </div>
                </div>
                <div class="mb-3 col">
                    <label for="" class="form-label">Số lượng:</label>
                    <input type="text" class="form-control" id="" placeholder=" " name="soluong" value="">
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