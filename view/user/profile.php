
                <div class="main-content">
                    <form action="?act=profile" method="post" enctype="multipart/form-data">
                        <h4 class="fontsize20">Thông Tin Cá Nhân</h4>
                        <hr>
                        <div class="mb-3 mt-3">
                            <img src="<?= $img_path ?>banner.jpg" alt="" width="150px" height="150px" style="border-radius: 50%">
                        </div>
                        <div class="mb-3 mt-3">
                            <label for="" class="form-label">Họ và tên:</label>
                            <input type="text" class="form-control" id="" placeholder="Nhập họ và tên" name="" value="" readonly>
                          </div>
                          <div class="mb-3 mt-3">
                            <label for="" class="form-label">Số điện thoại:</label>
                            <input type="text" class="form-control" id="" placeholder="Nhập số điện thoại" name="" value="" readonly>
                          </div>
                          <div class="mb-3 mt-3">
                            <label for="" class="form-label">Địa chỉ:</label>
                            <input type="text" class="form-control" id="" placeholder="Nhập địa chỉ" name="" value="" readonly>
                          </div>
                          <a href="?act=profile"><button class="btn btn-danger">Đăng xuất</button></a>
                        <button type="submit" class="btn btn-warning">Sửa tài khoản</button>
                      </form>
                </div>
        </main>
    </div>
