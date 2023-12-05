<!-- Form đăng ký -->
<div class="main-content">
    <form action="index.php?act=dangky" method="post" style="width: 600px; margin: 0 auto">
        <h4 class="fontsize20">Thông Tin Đăng Ký</h4>
        <hr>
        <div class="mb-3 mt-3">
            <label for="hoten" class="form-label">Họ và tên:<span class="text-danger">*</span></label>
            <input type="text" class="form-control" id="hoten" placeholder="Nhập họ và tên" name="hoten" >
            <span class="text-danger"><?=isset($err['hoten'])?$err['hoten']:''?></span>
        </div>
        <div class="mb-3">
            <label for="email" class="form-label">Email:<span class="text-danger">*</span></label>
            <input type="text" class="form-control" id="email" placeholder="Nhập email" name="email" >
            <span class="text-danger"><?=isset($err['email'])?$err['email']:''?></span>
        </div>
        <div class="mb-3">
            <label for="matkhau" class="form-label">Mật khẩu:<span class="text-danger">*</span></label>
            <input type="password" class="form-control" id="matkhau" placeholder="Nhập mật khẩu" name="matkhau" >
            <span class="text-danger"><?=isset($err['matkhau'])?$err['matkhau']:''?></span>
        </div>
        <div class="mb-3">
            <label for="sodienthoai" class="form-label">Số điện thoại:<span class="text-danger">*</span></label>
            <input type="text" class="form-control" id="sodienthoai" placeholder="Nhập số điện thoại" name="sodienthoai" >
            <span class="text-danger"><?=isset($err['sodienthoai'])?$err['sodienthoai']:''?></span>
        </div>
        <div class="mb-3">
            <label for="diachi" class="form-label">Địa chỉ:</label>
            <input type="text" class="form-control" id="diachi" placeholder="Nhập địa chỉ" name="diachi">
        </div>
        <button type="submit" class="btn btn-success">Đăng Ký</button>
    </form>
</div>

</div>
</main>
</div>