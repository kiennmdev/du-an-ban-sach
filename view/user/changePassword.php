<div class="main-content">
<h4 class="fontsize20">Đổi Mật Khẩu</h4>
    <p class="text-success"><?=isset($thongbao) && $thongbao != "" ? $thongbao : ''?></p>
                    <form action="?act=doimatkhau" method="post">
                        
                        <hr>
                        <div class="mb-3 mt-3">
                          <label for="email" class="form-label">Mật khẩu mới:</label>
                          <input type="text" class="form-control" id="email" placeholder="Nhập mật khẩu mới" name="matkhaumoi">
                        </div>
                        <button type="submit" class="btn btn-success" onclick="return confirm('Bạn có chắc muốn đổi mật khẩu?')">Đổi mật khẩu</button>
                      </form>
                </div>
        </main>
    </div>