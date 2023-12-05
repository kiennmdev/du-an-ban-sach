
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
                        <h4 class="page-title">Quản lý thống kê</h4>
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
                        <a href="?act=bieudo&chart=danhmuc" class="btn btn-primary">Xem biểu đồ</a>
                        <div class="table-responsive">
                                <table class="table text-wrap">
                                        <thead>
                                            <tr>
                                                <th>Mã danh mục</th>
                                                <th>Tên danh mục</th>
                                                <th>Số lượng</th>
                                                <th>Giá nhỏ nhất</th>
                                                <th>Giá lớn nhất</th>
                                                <th>Giá trung bình</th>
                                            </tr>
                                        </thead>
                                    <tbody>
                                        <?php foreach($thongke1 as $dm): 
                                            extract($dm);
                                            ?>
                                        <tr>
                                            <td><?=$madanhmuc?></td>
                                            <td><?=$tendanhmuc?></td>
                                            <td><?=$tongsoluong?></td>
                                            <td><?=number_format($renhat,0,',','.')?><sup>đ</sup></td>
                                            <td><?=number_format($datnhat,0,',','.')?><sup>đ</sup></td>
                                            <td><?=number_format($giatrungbinh,0,',','.')?><sup>đ</sup></td>
                                        </tr>
                                        <?php endforeach ?>
                                    </tbody>
                                </table>
                            </div>
                           
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-12">
                        <div class="white-box">
                        <a href="?act=bieudo&chart=sach" class="btn btn-primary">Xem biểu đồ</a>
                        <div class="table-responsive">
                                <table class="table text-wrap">
                                        <thead>
                                            <tr>
                                                <th>Mã sách</th>
                                                <th>Tên sách</th>
                                                <th>Tổng số bình luận</th>
                                                <th>Ngày mới nhất</th>
                                                <th>Ngày cũ nhất</th>
                                            </tr>
                                        </thead>
                                    <tbody>
                                    <?php foreach($thongke2 as $bl): 
                                            extract($bl);
                                            ?>
                                        <tr>
                                            <td><?=$id?></td>
                                            <td><?=$tensach?></td>
                                            <td><?=$tongsobl?></td>
                                            <td><?=$moinhat?></td>
                                            <td><?=$cunhat?></td>
                                        </tr>
                                        <?php endforeach ?>
                                    </tbody>
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
       