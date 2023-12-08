<div class="main-content">
                    <form action="?act=recover" method="post" style="width: 600px; margin: 0 auto">
                        <h4 class="fontsize20">Quên Mật Khẩu</h4>
                        <hr>
                        <div class="mb-3 mt-3">
                          <label for="email" class="form-label">Email:</label>
                          <input type="email" class="form-control" id="email" placeholder="Email của bạn khi đăng kí" name="email">
                          <span class="text-danger"><?=!empty($thongbao)?$thongbao:""?></span>
                        </div>
                        <button type="submit" class="btn btn-danger">Lấy lại mật khẩu</button>
                      </form>
                </div>
        </main>
    </div>