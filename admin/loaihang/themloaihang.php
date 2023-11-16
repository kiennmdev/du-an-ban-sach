<div class="main">
            <div class="title">
                Quản lý loại sách
            </div>
            <div class="addloaihang">
                <form action="" method="post">
                    <div class="mb-3 mt-3">
                        <label for="iddm" class="form-label">Mã loại hàng:</label>
                        <input type="text" class="form-control" id="iddm" placeholder="Mã tự động" name="iddm" disabled>
                    </div>
                    <div class="mb-3">
                        <label for="tenloaihang" class="form-label">Tên loại hàng:</label>
                        <input type="text" class="form-control" id="tenloaihang" placeholder="" name="tenloaihang">
                    </div>
                    <div class="mb-3">
                        <label for="trangthai" class="form-label">Trạng thái:</label>
                        <div class="form-control">
                        <input type="radio" class="form-check-input" name="trangthai" id="" value="1"> Hiện
                        <input type="radio" class="form-check-input" name="trangthai" id="" value="0"> Ẩn
                        </div>
                    </div>
                    <button type="submit" class="btn btn-success" name="themloaihang">Thêm loại sách</button>
                    
                    <a href="?act=loaihang"><button type="button" class="btn btn-primary">Danh Sách</button></a>
                </form>
            </div>
        </div>