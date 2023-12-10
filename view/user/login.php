<div class="main-content">
<form action="?act=dangnhap" method="post" class="main-content" style="width: 600px; margin: 0 auto">
    <h4 class="fontsize20">Thông Tin Đăng Nhập</h4>
    <hr>
    <span style="color: red;"><?= isset($err) ? $err : ""?></span>
    <div class="mb-3 mt-3">
        <label for="email" class="form-label">Email:</label>
        <input type="text" id="email" name="email" class="form-control" placeholder="Nhập email">
    </div>
    <div class="mb-3">
        <label for="matkhau" class="form-label">Mật khẩu:</label>
        <input type="password" id="matkhau" name="matkhau" class="form-control" placeholder="Nhập mật khẩu">
    </div>
    <!-- <div class="mb-3 form-check">
        <input type="checkbox" id="remember" name="remember" class="form-check-input">
        <label for="remember" class="form-check-label">Nhớ mật khẩu</label>
    </div> -->
    <div class="mb-3">
        <label for="forgot" class="form-label">Quên mật khẩu?</label>
        <a href="?act=recover" id="forgot" class="form-label">Nhấn vào đây</a>
        <p>Bạn chưa có tài khoản? <a href="?act=dangky">Nhấn vào đây</a></p>
    </div>
    <button type="submit" class="btn btn-success">Đăng Nhập</button>
    <div class="mb-3">
    </div>
</form>
</div>

</div>
</main>
</div>