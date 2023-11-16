<div class="main">
            <div class="title mb">
                Quản lý khách hàng
            </div>
            <div class="addhanghoa">
                <form action="?act=themkhachhang" method="post" enctype="multipart/form-data">
                    <div class="row">
                        <div class="mb-3 col">
                            <label for="" class="form-label">ID khách hàng:</label>
                            <input type="text" class="form-control" id="" placeholder="Mã tự động" name="idkh" readonly>
                        </div>
                        <div class="mb-3 col">
                            <label for="" class="form-label">Tên đăng nhập:</label>
                            <input type="text" class="form-control" id="" placeholder=" " name="tendangnhap">
                        </div>
                    </div>
                    <div class="row">
                        <div class="mb-3 col">
                            <label for="" class="form-label">Mật khẩu:</label>
                            <input type="text" class="form-control" id="" placeholder="" name="matkhau">
                        </div>
                        <div class="mb-3 col">
                            <label for="" class="form-label">Xác nhận mật khẩu:</label>
                            <input type="text" class="form-control" id="" placeholder=" " name="xacnhanmatkhau">
                        </div>
                    </div>
                    <div class="row">
                        <div class="mb-3 col">
                            <label for="" class="form-label">Kích hoạt?:</label>
                            <div class="form-control">
                                <input type="radio" class="form-check-input" id="" name="kichhoat"
                                    value="0"> Chưa kích hoạt
                                <label class="form-check-label" for=""></label>
                                <input type="radio" class="form-check-input" id="" name="kichhoat"
                                    value="1"> Kích hoạt
                                <label class="form-check-label" for=""></label>
                            </div>
                        </div>
                        <div class="mb-3 col">
                            <label for="" class="form-label">Vai trò:</label>
                            <div class="form-control">
                                <input type="radio" class="form-check-input" id="" name="vaitro"
                                    value="0"> Admin
                                <label class="form-check-label" for=""></label>
                                <input type="radio" class="form-check-input" id="" name="vaitro"
                                    value="1"> Khách hàng
                                <label class="form-check-label" for=""></label>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="mb-3 col">
                            <label for="" class="form-label">Hình ảnh:</label>
                            <div class="form-control">
                                <input type="file" id="" name="hinhanh">
                            </div>
                        </div>
                        <div class="mb-3 col">
                            <label for="" class="form-label">Họ tên:</label>
                            <input type="text" class="form-control" id="" placeholder=" " name="hoten" value="">
                        </div>
                    </div>
                    <div class="row">
                        <div class="mb-3 col">
                            <label for="" class="form-label">Email:</label>
                            <input type="text" class="form-control" id="" placeholder="" name="email">
                        </div>
                        <div class="mb-3 col">
                            <label for="" class="form-label">Số điện thoại:</label>
                            <input type="text" class="form-control" id="" placeholder=" " name="sdt">
                        </div>
                    </div>
                    <div class="row">
                        <div class="mb-3 col">
                            <label for="" class="form-label">Địa chỉ:</label>
                            <input type="text" class="form-control" id="" placeholder="" name="diachi">
                        </div>
                    </div>

                    <button type="submit" class="btn btn-success" name="themmoi">Thêm mới</button>
                    <a href="?act=khachhang"><button type="button" class="btn btn-primary">Danh sách</button></a>
                    <button type="reset" class="btn btn-primary">Nhập lại</button>
                </form>
            </div>
        </div>