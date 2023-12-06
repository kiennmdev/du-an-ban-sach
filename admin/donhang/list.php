
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
                        <form action="?act=donhang" method="POST"  class="d-flex mb-2 justify-content-center">
                            <div class="d-flex" style=" width:600px">
                            <div class="form-order-input col">
                                <input type="text" name="key" class="form-control" placeholder="Tìm kiếm..." id="">
                            </div>
                            <div class="form-order-button">
                                <button class="btn btn-primary" type="submit" name="search">Tìm Kiếm</button>
                            </div>
                            </div>
                        </form>
                        <form action="?act=donhang" method="post">
                        <button type="submit" class="btn btn-secondary text-white" name="updatebill" value="0" onclick="return confirm('Bạn có chắc muốn cập nhật trạng thái không?')">Chờ xác nhận</button>
                        <button type="submit" class="btn btn-primary text-white" name="updatebill" value="1" onclick="return confirm('Bạn có chắc muốn cập nhật trạng thái không?')">Đã xác nhận</button>
                        <button type="submit" class="btn btn-warning text-white" name="updatebill" value="2" onclick="return confirm('Bạn có chắc muốn cập nhật trạng thái không?')">Chờ giao hàng</button>
                        <button type="submit" class="btn btn-success text-white" name="updatebill" value="3" onclick="return confirm('Bạn có chắc muốn cập nhật trạng thái không?')">Hoàn thành đơn hàng</button>
                        <button type="submit" class="btn btn-danger text-white" name="updatebill" value="4" onclick="return confirm('Bạn có chắc muốn cập nhật trạng thái không?')">Hủy đơn hàng</button>
                            <div class="table-responsive">
                                <table class="table text-wrap">
                                    <thead>
                                        <tr>
                                            <th></th>
                                            <th class="border-top-0">Mã đơn</th>
                                            <th class="border-top-0">Tên khách hàng</th>
                                            <th class="border-top-0">Email</th>
                                            <th class="border-top-0">Số điện thoại</th>
                                            <th class="border-top-0">Tổng Tiền</th>
                                            <th class="border-top-0">Phương thức thanh toán</th>
                                            <th class="border-top-0">Trạng thái</th>
                                            <th class="border-top-0">Ngày đặt hàng</th>
                                            <!--     -->
                                            <th></th>
                                        </tr>
                                    </thead>
                                    <?php 
                                        foreach($dsdh as $dh):
                                        extract($dh)
                                    ?>
                                    <tbody>
                                            <td class="text-center"><input type="checkbox" class="checkbox" name="id[]" value="<?=$id?>"></td>
                                            <td><?= $id?></td>
                                            <td><?= $hoten?></td>
                                            <td><?= $email?></td>
                                            <td><?= $sodienthoai?></td>
                                            <td><?= number_format($tongtien,0,',','.')?><sup>đ</sup></td>
                                            <td>
                                                <?= $cachthanhtoan == 0 ? 'Giao hàng nhận tiền' : 'Chuyển khoản'?>
                                            </td>
                                            <td class="
                                                <?php
                                                    if ($trangthai==0) {
                                                        $status = 'Chờ xác nhận';
                                                        echo  'text-secondary';
                                                    }
                                                    else if($trangthai == 1){
                                                        $status = 'Đã xác nhận';
                                                        echo 'text-primary';
                                                    }
                                                    else if ($trangthai == 2) {
                                                        $status = 'Chờ giao hàng';
                                                        echo 'text-warning';
                                                    }
                                                    else if($trangthai == 3){
                                                        $status = 'Hoàn thành';
                                                        echo  'text-success';
                                                    } else{
                                                        $status = 'Đã hủy đơn';
                                                        echo 'text-danger';
                                                    };
                                                ?>">
                                                <?= $status?>
                                            </td>
                                            <td><?= $ngaydathang?></td>
                                            <!-- <td><?= $ghichu?></td> -->
                                            <td>
                                                <a href="?act=chitietdonhang&iddh=<?=$id?>" class="btn btn-secondary text-white">Chi tiết đơn hàng</a>
                                            </td>
                                        </tr>
                      
                                    </tbody>
                                    <?php endforeach ?>
                                </table>
                            </div>
                        </form>
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
         