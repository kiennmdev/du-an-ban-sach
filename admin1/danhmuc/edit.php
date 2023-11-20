
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
                        <h4 class="page-title">Quản lý danh mục</h4>
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
                                <form action="" method="post">
                                    <button type="submit" class="btn btn-success text-white">Sửa danh mục</button>
                                    <button type="reset" class="btn btn-primary">Nhập lại</button>
                                    <a href="?act=danhmuc"><button type="button" class="btn btn-primary">Danh sách</button></a>
                                    <div class="mb-3 mt-3">
                                      <label for="">Tên danh mục:</label>
                                      <input type="text" class="form-control" id="" placeholder="Nhập tên danh mục" name="tendanhmuc" value="<?=$tendanhmuc?>">
                                    </div>
                                    <div class="mb-3">
                                        <label for="">Trạng thái:</label>
                                        <div class="form-control">
                                            <input type="radio" name="trangthai" id="" value="1" <?= $trangthai == 1 ? 'checked' : '' ?>> Hiện
                                            <input type="radio" name="trangthai" id="" value="0" <?= $trangthai == 0 ? 'checked' : '' ?>> Ẩn
                                        </div>
                                    </div>
                                    
                                    <button type="submit" class="btn btn-success text-white">Sửa danh mục</button>
                                    <button type="reset" class="btn btn-primary">Nhập lại</button>
                                    <a href="?act=danhmuc"><button type="button" class="btn btn-primary">Danh sách</button></a>
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
 