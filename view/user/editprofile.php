
<div class="main-content">
                    <form action="?act=editprofile" method="post" enctype="multipart/form-data">
                        <h4 class="fontsize20">Thông Tin Cá Nhân</h4>
                        <hr>
                       
                        <div class="mb-3 mt-3">
                            <label for="" class="form-label">Họ và tên:</label>
                            <input type="text" class="form-control" id="" placeholder="Nhập họ và tên" name="hoten" value="">
                          </div>
                          <div class="mb-3 mt-3">
                            <input type="file" class="form-control" id="" name="hinh">
                            <img src="<?= $img_path ?>banner.jpg" alt="" width="150px" height="150px" style="border-radius: 50%">
                        </div>
                          <div class="mb-3 mt-3">
                            <label for="" class="form-label">Số điện thoại:</label>
                            <input type="text" class="form-control" id="" placeholder="Nhập số điện thoại" name="sdt" value="">
                          </div>
                          <div class="mb-3 mt-3">
                            <label for="" class="form-label">Địa chỉ:</label>
                            <input type="text" class="form-control" id="" placeholder="Nhập địa chỉ" name="diachi" value="">
                          </div>
                        <button type="submit" class="btn btn-success">Sửa tài khoản</button>
                      </form>
                </div>
        </main>
    </div>
