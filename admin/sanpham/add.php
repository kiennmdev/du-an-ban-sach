
        <!-- ============================================================== -->
        <!-- End Left Sidebar - style you can find in sidebar.scss  -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Page wrapper  -->
        <!-- ============================================================== -->
        <div class="page-wrapper">
             <!-- ============================================================== -->
            <!-- Bread crumb and right sidebar toggle -->
            <!-- ============================================================== -->
            <div class="page-breadcrumb bg-white">
                <div class="row align-items-center">
                    <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                        <h4 class="page-title">Quản lý sản phẩm</h4>
                    </div>
                    <!-- <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
                        <div class="d-md-flex">
                            <ol class="breadcrumb ms-auto">
                                <li><a href="#" class="fw-normal">Dashboard</a></li>
                            </ol>
                            <a href="https://www.wrappixel.com/templates/ampleadmin/" target="_blank"
                                class="btn btn-danger  d-none d-md-block pull-right ms-3 hidden-xs hidden-sm waves-effect waves-light text-white">Upgrade
                                to Pro</a>
                        </div>
                    </div> -->
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- ============================================================== -->
            <!-- End Bread crumb and right sidebar toggle -->
            <!-- ============================================================== -->
            <!-- ============================================================== -->
            <!-- Container fluid  -->
            <!-- ============================================================== -->
            <div class="container-fluid">
                <!-- ============================================================== -->
                <!-- Three charts -->
                <!-- ============================================================== -->
                
                <div class="row">
                    <div class="col-sm-12">
                        <div class="white-box">
                            <div class="form-group">
                                <form action="?act=addsanpham" method="post" enctype="multipart/form-data">
                                    <button type="submit" class="btn btn-success text-white">Thêm mới</button>
                                    <button type="reset" class="btn btn-primary">Nhập lại</button>
                                    <a href="?act=sanpham"><button type="button" class="btn btn-primary">Danh sách</button></a>
                                    <div class="row">
                                      <div class="mb-3 col">
                                          <label for="" class="form-label">Tên sách:<span class="important">*</span></label>
                                          <input type="text" class="form-control" id="" placeholder="" name="tensach" >
                                          <span class="err"><?= isset($err['tensach']) ? $err['tensach'] : '' ?></span>
                                      </div>
                                      <div class="mb-3 col">
                                          <label for="" class="form-label">Tên tác giả:<span class="important">*</span></label>
                                          <input type="text" class="form-control" id="" placeholder="" name="tacgia" >
                                          <span class="err"><?= isset($err['tacgia']) ? $err['tacgia'] : '' ?></span>
                                      </div>
                                      <div class="mb-3 col">
                                          <label for="" class="form-label">Nhà xuất bản:<span class="important">*</span></label>
                                          <input type="text" class="form-control" id="" placeholder="" name="nxb">
                                          <span class="err"><?= isset($err['nxb']) ? $err['nxb'] : '' ?></span>
                                      </div>
                                  </div>
                                  <div class="row">
                                      <div class="mb-3 col">
                                          <label for="" class="form-label">Giá sách:<span class="important">*</span></label>
                                          <input type="text" class="form-control" id="" placeholder="" name="gia">
                                          <span class="err"><?= isset($err['gia']) ? $err['gia'] : '' ?></span>
                                      </div>
                                      <div class="mb-3 col">
                                          <label for="" class="form-label">Ngày xuất bản:<span class="important">*</span></label>
                                          <input type="date" class="form-control" id="" placeholder="" name="timexb" >
                                          <span class="err"><?= isset($err['timexb']) ? $err['timexb'] : '' ?></span>
                                      </div>
                                  </div>
                                  <div class="row">
                                      <div class="mb-3 col">
                                          <label for="" class="form-label">Trạng thái:<span class="important">*</span></label>
                                          <div class="form-control">
                                              <input type="radio" class="form-check-input" id="" name="trangthai" value="1" checked> Hiện
                                              <label class="form-check-label" for=""></label>
                                              <input type="radio" class="form-check-input" id="" name="trangthai" value="0" > Ẩn
                                              <label class="form-check-label" for=""></label>
                                          </div>
                                      </div>
                                      <div class="mb-3 col">
                                          <label for="" class="form-label">Loại sách:<span class="important">*</span></label>
                                          <select class="form-control" name="loaisach" id="">
                                              <?php
                                                  foreach ($dsdm as $dm) :
                                                      extract($dm);
                                              ?>
                                                  <option value="<?= $id ?>"><?= $tendanhmuc ?></option>
                                              <?php endforeach ?>
                                          </select>
                                      </div>
                                  </div>
                                  <div class="row">
                                      <div class="mb-3 col">
                                          <label for="" class="form-label">Hình ảnh:<span class="important">*</span></label>

                                              <input type="file" class="form-control" name="hinh" id="">

                                          <span class="err"><?= isset($err['img']) ? $err['img'] : '' ?></span>
                                      </div>
                                      <div class="mb-3 col">
                                          <label for="" class="form-label">Số lượng:<span class="important">*</span></label>
                                          <input type="text" class="form-control" id="" placeholder=" " name="soluong" value="">
                                          <span class="err"><?= isset($err['soluong']) ? $err['soluong'] : '' ?></span>
                                      </div>
                                  </div>

                                  <div class="mb-3 ">
                                      <label for="comment">Mô tả:<span class="important">*</span></label>
                                      <textarea class="form-control" rows="5" id="comment" name="mota"></textarea>
                                      <span class="err"><?= isset($err['mota']) ? $err['mota'] : '' ?></span>
                                  </div>
                                    
                                    <button type="submit" class="btn btn-success text-white">Thêm mới</button>
                                    <button type="reset" class="btn btn-primary">Nhập lại</button>
                                    <a href="?act=sanpham"><button type="button" class="btn btn-primary">Danh sách</button></a>
                                  </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- ============================================================== -->
            <!-- End Container fluid  -->
            <!-- ============================================================== -->
            <!-- ============================================================== -->
            <!-- footer -->
            <!-- ============================================================== -->
      