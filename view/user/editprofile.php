
<div class="main-content">
                    <form action="?act=editprofile" method="post" enctype="multipart/form-data">
                        <h4 class="fontsize20">Thông Tin Cá Nhân</h4>
                        <hr>
                       
                        <div class="mb-3 mt-3">
                          <input type="hidden" name="idtk" value="<?= $_SESSION['idtk'] ?>">
                            <label for="" class="form-label">Họ và tên:</label>
                            <input type="text" class="form-control" id="" placeholder="" name="hoten" value="<?= $hoten ?>">
                            <span class="text-danger"><?=isset($err['hoten'])?$err['hoten']:''?></span>
                          </div>
                          <div class="mb-3 mt-3">
                            <input type="file" class="form-control" id="" name="hinh">
                            <img src="<?= $img_path.$hinh ?>" alt="" width="150px" height="150px" style="border-radius: 50%">
                        </div>
                          <!-- <div class="mb-3 mt-3">
                            <label for="" class="form-label">Số điện thoại:</label>
                            <input type="text" class="form-control" id="" placeholder="" name="sdt" value="<?= $sodienthoai ?>" readonly>
                          </div> -->
                          <div class="mb-3 mt-3">
                            <label for="" class="form-label">Địa chỉ:</label>
                            <input type="text" class="form-control" id="" placeholder="Nhập địa chỉ" name="diachi" value="<?= $diachi ?>">
                          </div>
                        <button type="submit" class="btn btn-success">Sửa tài khoản</button>
                      </form>
                </div>
        </main>
    </div>
