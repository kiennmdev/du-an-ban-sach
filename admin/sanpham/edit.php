
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
                            <form action="?act=editsanpham&idsp=<?=$id?>" method="post" enctype="multipart/form-data">
                                    <button type="submit" class="btn btn-success text-white">Sửa sản phẩm</button>
                                    <button type="reset" class="btn btn-primary">Nhập lại</button>
                                    <a href="?act=sanpham"><button type="button" class="btn btn-primary">Danh sách</button></a>
                                    <div class="row">
                <div class="mb-3 col">
                    <label for="" class="form-label">Tên sách:<span class="text-danger">*</span></label>
                    <input type="text" class="form-control" id="" placeholder="" name="tensach" value="<?= $tensach ?>">
                        <span class="text-danger"><?= isset($err['tensach']) ? $err['tensach'] : '' ?></span>
                </div>
                <div class="mb-3 col">
                    <label for="" class="form-label">Tên tác giả:<span class="text-danger">*</span></label>
                    <input type="text" class="form-control" id="" placeholder="" name="tacgia" value="<?= $tacgia ?>">
                        <span class="text-danger"><?= isset($err['tacgia']) ? $err['tacgia'] : '' ?></span>
                </div>
                
            </div>
            <div class="row">
                <div class="mb-3 col">
                    <label for="" class="form-label">Nhà xuất bản:<span class="text-danger">*</span></label>
                    <input type="text" class="form-control" id="" placeholder="" name="nxb" value="<?= $nhaxuatban ?>">
                    <span class="text-danger"><?= isset($err['nxb']) ? $err['nxb'] : '' ?></span>
                </div>
                <div class="mb-3 col">
                    <label for="" class="form-label">Ngày xuất bản:<span class="text-danger">*</span></label>
                    <input type="date" class="form-control" id="" placeholder="" name="timexb" value="<?= $ngayxuatban ?>">
                    <span class="text-danger"><?= isset($err['timexb']) ? $err['timexb'] : '' ?></span>
                </div>
            </div>
            <div class="row">
                <div class="mb-3 col">
                    <label for="" class="form-label">Giá sách:<span class="text-danger">*</span></label>
                    <input type="text" class="form-control" id="" placeholder="" name="gia" value="<?= $gia ?>">
                    <span class="text-danger"><?= isset($err['gia']) ? $err['gia'] : '' ?></span>
                </div>
                <div class="mb-3 col">
                    <label for="" class="form-label">Giảm giá:</label>
                    <input type="text" class="form-control" id="" placeholder="" name="giamgia" value="<?= $giamgia ?>">
                </div>
            </div>
            
            <div class="row">
                <div class="mb-3 col">
                    <label for="" class="form-label">Trạng thái:</label>
                    <div class="form-control">
                        <input type="radio" class="form-check-input" id="" name="trangthai" value="1" <?= ($trangthai == 1) ? 'checked' : '' ?>> Hiện
                        <label class="form-check-label" for=""></label>
                        <input type="radio" class="form-check-input" id="" name="trangthai" <?= ($trangthai == 0) ? 'checked' : '' ?> value="0"> Ẩn
                        <label class="form-check-label" for=""></label>
                    </div>
                </div>
                <div class="mb-3 col">
                    <label for="" class="form-label">Loại sách:</label></label>
                    <select class="form-select" name="loaisach" id="">
                        <?php
                        foreach ($dsdm as $dm) :
                            extract($dm);
                        ?>
                            <option value="<?= $id ?>" <?= ($id == $madanhmuc) ? 'selected' : '' ?>> <?= $tendanhmuc ?> </option>
                        <?php endforeach ?>
                    </select>
                </div>
            </div>
            <div class="row">
                <div class="mb-3 col">
                    <label for="" class="form-label">Hình ảnh:</label>
                        <input type="file" class="form-control" name="hinh" id="">
                        <img src="<?= '../' . $img_path . $hinh ?>" alt="" width="100px">
                        <span class="text-danger"><?= isset($err['img']) ? $err['img'] : '' ?></span>
                    </div>
                <div class="mb-3 col">
                    <label for="" class="form-label">Số lượng:<span class="text-danger">*</span></label>
                    <input type="text" class="form-control" id="" placeholder=" " name="soluong" value="<?= $soluong ?>">
                    <span class="text-danger"><?= isset($err['soluong']) ? $err['soluong'] : '' ?></span>
                </div>
            </div>

            <div class="mb-3 ">
                <label for="comment">Mô tả:<span class="text-danger">*</span></label>
                <textarea class="form-control" rows="5" id="comment" name="mota"><?= $mota ?></textarea>
                <span class="text-danger"><?= isset($err['mota']) ? $err['mota'] : '' ?></span>
            </div>
                                    
                                    <button type="submit" class="btn btn-success text-white">Sửa sản phẩm</button>
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
         