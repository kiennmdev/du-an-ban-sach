
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
                        <h4 class="page-title">Quản lý đơn hàng</h4>
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
                            <div class="table-responsive">
                                <a href="?act=donhang" class="text-dark"><i class="fas fa-arrow-left"></i>&nbsp;&nbsp;&nbsp;Danh sách đơn hàng</a>
                                <table class="table text-wrap">
                                    <thead>
                                        <tr>
                                            <th class="border-top-0">STT</th>
                                            <th class="border-top-0">Hình ảnh</th>
                                            <th class="border-top-0">Tên sách</th>
                                            <th class="border-top-0">Số lượng mua</th>
                                            <th class="border-top-0">Đơn giá</th>
                                            <th class="border-top-0">Thành tiền</th>
                                            <th></th>
                                        </tr>
                                    </thead>
                                    <?php for($i = 0; $i < sizeof($dsspdh); $i++): ?>
                                        <?php extract($dsspdh[$i]) ?>
                                    <tbody>
                                            <td><?= $i+1?></td>
                                            <td>
                                                <img src="../<?=$img_path . $hinh?>" alt="" width="100px">
                                            </td>
                                            <td><?= $tensach?></td>
                                            <td><?= $soluong?></td>
                                            <td><?= number_format($dongia,0,',','.')?><sup> đ</sup></td>
                                            <td><?= number_format($thanhtien,0,',','.')?><sup> đ</sup></td>
                                            <td>
                                            </td>
                                        </tr>
                      
                                    </tbody>
                                    <?php endfor ?>
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
         