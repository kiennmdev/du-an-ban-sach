<div class="main">
            <div class="title mb">
                Quản lý khách hàng
            </div>
            <div class="addhanghoa">
                <form action="?act=suakhachhang&idtk=<?= $idtk ?>" method="post" enctype="multipart/form-data">
                <div class="row">
                        <div class="mb-3 col">
                            <label for="" class="form-label">ID khách hàng:</label>
                            <input type="text" class="form-control" id="" placeholder="" name="idkh"
                            value="<?= $id ?>" readonly>
                        </div>
                        <div class="mb-3 col">
                            <label for="" class="form-label">Tên đăng nhập:</label>
                            <input type="text" class="form-control" id="" placeholder=""
                            value="<?= $user ?>" name="tendangnhap" >
                        </div>
                    </div>
                    <div class="row">
                        <div class="mb-3 col">
                            <label for="" class="form-label">Mật khẩu:</label>
                            <input type="text" class="form-control" id="" placeholder=""
                            value="<?= $pass ?>" name="matkhau">
                        </div>
                        <div class="mb-3 col">
                            <label for="" class="form-label">Xác nhận mật khẩu:</label>
                            <input type="text" class="form-control" id="" placeholder=""
                            value="<?= $pass ?>" name="xacnhanmatkhau">
                        </div>
                    </div>
                    <div class="row">
                        <div class="mb-3 col">
                            <label for="" class="form-label">Kích hoạt?:</label>
                            <div class="form-control">
                                <input type="radio" class="form-check-input" id="" name="kichhoat"
                                <?= ($kichhoat == 0) ? 'checked' : '' ?>     value="0"> Chưa kích hoạt
                                <label class="form-check-label" for=""></label>
                                <input type="radio" class="form-check-input" id="" name="kichhoat"
                                <?= ($kichhoat == 1) ? 'checked' : '' ?>     value="1"> Kích hoạt
                                <label class="form-check-label" for=""></label>
                            </div>
                        </div>
                        <div class="mb-3 col">
                            <label for="" class="form-label">Vai trò:</label>
                            <div class="form-control">
                                <input type="radio" class="form-check-input" id="" name="vaitro"
                                <?= ($role == 0) ? 'checked' : '' ?>    value="0"> Admin
                                <label class="form-check-label" for=""></label>
                                <input type="radio" class="form-check-input" id="" name="vaitro"
                                <?= ($role == 1) ? 'checked' : '' ?>     value="1"> Khách hàng
                                <label class="form-check-label" for=""></label>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="mb-3 col">
                            <label for="" class="form-label">Hình ảnh:</label>
                            <div class="form-control">
                                <input type="file" id="" name="hinhanh"><br>
                                <img src="<?= '../' . $img_path . $img ?>" alt="" width="100px">
                            </div>
                        </div>
                        <div class="mb-3 col">
                            <label for="" class="form-label">Họ tên:</label>
                            <input type="text" class="form-control" id="" placeholder=""
                            value="<?= $hoten ?>" name="hoten" value="">
                        </div>
                    </div>
                    <div class="row">
                        <div class="mb-3 col">
                            <label for="" class="form-label">Email:</label>
                            <input type="text" class="form-control" id="" placeholder=""
                            value="<?= $email ?>" name="email">
                        </div>
                        <div class="mb-3 col">
                            <label for="" class="form-label">Số điện thoại:</label>
                            <input type="text" class="form-control" id="" placeholder=""
                            value="<?= $tel ?>" name="sdt">
                        </div>
                    </div>
                    <div class="row">
                        <div class="mb-3 col">
                            <label for="" class="form-label">Địa chỉ:</label>
                            <input type="text" class="form-control" id="" placeholder=""
                            value="<?= $address ?>" name="diachi">
                        </div>
                    </div>

                    <button type="submit" class="btn btn-success" name="suatk">Sửa</button>
                    <a href="?act=khachhang"><button type="button" class="btn btn-primary">Danh sách</button></a>
                    <button type="reset" class="btn btn-primary">Nhập lại</button>
                </form>
            </div>
        </div>