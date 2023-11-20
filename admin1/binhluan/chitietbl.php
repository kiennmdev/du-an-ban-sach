
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
                        <h4 class="page-title">Quản lý bình luận của sản phẩm</h4>
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
                            <a href="?act=binhluan"><button type="button" class="btn btn-primary">Danh sách</button></a>
                            <button type="button" id="checkall" class="btn btn-primary">Chọn tất cả</button>
                            <button type="button" id="clearall" class="btn btn-primary">Bỏ chọn tất cả</button>
                            <button type="submit" id="deleteall" class="btn btn-danger text-white">Xóa các mục chọn</button>
                            <div class="table-responsive">
                                <table class="table text-nowrap">
                                    <thead>
                                        <tr>
                                            <th></th>
                                            <th class="border-top-0">ID</th>
                                            <th class="border-top-0">Nội dung</th>
                                            <th class="border-top-0">Ngày bình luận</th>
                                            <th class="border-top-0">Người bình luận</th>
                                            <th></th>
                                        </tr>
                                    </thead>
                                    <?php foreach($blct as $bl): ?>
                                        <?php extract($bl) ?>
                                    <tbody>
                                        <td><input type="checkbox" class="checkbox" name="id[]" value="<?=$id?>"></td>
                                            <td><?= $id?></td>
                                            <td><?= $noidung?></td>
                                            <td><?= $thoigian?></td>
                                            <td><?= $hoten?></td>
                                            <td>
                                                <a href="?act=chitietbinhluan&maxoa" class="btn btn-danger text-white">Xóa</a>
                                            </td>
                                        </tr>
                      
                                    </tbody>
                                    <?php endforeach ?>
                                </table>
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
        