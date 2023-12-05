
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
                                <?php extract($bill); ?>
                                <h4 class="text-success mt-2">Mã đơn hàng: <?=$id?></h4>
                                <hr>
                                <h5 class="text-primary">Thông tin đơn hàng</h5>
                                <table class="table table-striped">
                                    <tbody>
                                        <tr>
                                            <th>Họ tên</th>
                                            <td><?= $hoten ?></td>
                                        </tr>
                                        <tr>
                                            <th>Địa chỉ nhận</th>
                                            <td><?=$diachinhan?></td>
                                        </tr>
                                        <tr>
                                            <th>Điện thoại</th>
                                            <td><?=$sodienthoai?></td>
                                        </tr>
                                        <tr>
                                            <th>Email</th>
                                            <td><?=$email?></td>
                                        </tr>
                                        <tr>
                                            <th>Tổng tiền</th>
                                            <td><?=number_format($tongtien,0,',','.')?><sup>đ</sup></td>
                                        </tr>
                                        <tr>
                                            <th>Ngày đặt hàng</th>
                                            <td><?=$ngaydathang?></td>
                                        </tr>
                                        <tr>
                                            <th>Ghi chú</th>
                                            <td><?=$ghichu?></td>
                                        </tr>
                                        <tr>
                                            <th>Trạng thái</th>
                                            <td class="
                                                <?php
                                                if ($trangthai == 0) {
                                                    $status = 'Chờ xác nhận';
                                                    echo  'text-secondary';
                                                } else if ($trangthai == 1) {
                                                    $status = 'Đã xác nhận';
                                                    echo 'text-primary';
                                                } else if ($trangthai == 2) {
                                                    $status = 'Chờ giao hàng';
                                                    echo 'text-warning';
                                                } else if ($trangthai == 3) {
                                                    $status = 'Hoàn thành';
                                                    echo  'text-success';
                                                } else {
                                                    $status = 'Đã hủy đơn';
                                                    echo 'text-danger';
                                                };
                                                ?>"><?= $status ?></td>
                                        </tr>
                                        <tr>
                                            <th>Phương thức thanh toán</th>
                                            <td><?= $cachthanhtoan == 0 ? 'Giao hàng nhận tiền' : 'Chuyển khoản'?></td>
                                        </tr>
                                    </tbody>
                                </table>
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
         