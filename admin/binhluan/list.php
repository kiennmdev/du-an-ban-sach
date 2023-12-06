
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
                        <h4 class="page-title">Quản lý bình luận</h4>
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
                        <form action="?act=binhluan" method="POST"  class="d-flex mb-2 justify-content-center">
                            <div class="d-flex" style=" width:600px">
                            <div class="form-order-input col">
                                <input type="text" name="key" class="form-control" placeholder="Tìm kiếm..." id="">
                            </div>
                            <div class="form-order-button">
                                <button class="btn btn-primary" type="submit" name="search">Tìm Kiếm</button>
                            </div>
                            </div>
                        </form>
                            <div class="table-responsive">
                                <table class="table text-wrap">
                                    <thead>
                                        <tr>
                                            <th class="border-top-0">ID sản phẩm</th>
                                            <th class="border-top-0">Tên sản phẩm</th>
                                            <th class="border-top-0">Tổng số bình luận</th>
                                            <th class="border-top-0">Cũ nhất</th>
                                            <th class="border-top-0">Mới nhất</th>
                                            <th></th>
                                        </tr>
                                    </thead>
                                    <?php foreach($binhluan as $bl): ?>
                                        <?php extract($bl) ?>
                                    <tbody>
                                            <td><?= $id?></td>
                                            <td><?= $tensach?></td>
                                            <td><?= $tongsobl?></td>
                                            <td><?= $cunhat?></td>
                                            <td><?= $moinhat?></td>
                                            <td>
                                                <a href="?act=chitietbinhluan&masanpham=<?=$id?>" class="btn btn-secondary text-white">Chi tiết bình luận</a>
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
         