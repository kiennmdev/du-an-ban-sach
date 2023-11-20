
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
                        <h4 class="page-title">Quản lý người dùng</h4>
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
                            <form action="?act=nguoidung" method="post">
                            <a href="?act=addnguoidung"><button type="button" class="btn btn-success text-white">Thêm người dùng</button></a>
                            <button type="button" id="checkall" class="btn btn-primary">Chọn tất cả</button>
                            <button type="button" id="clearall" class="btn btn-primary">Bỏ chọn tất cả</button>
                            <button type="submit" id="deleteall" class="btn btn-danger text-white" onclick="return confirm('Bạn có muốn xóa không')">Xóa các mục chọn</button>
                            <div class="table-responsive">
                                <table class="table text-nowrap">
                                    <thead>
                                        <tr>
                                            <th></th>
                                            <th class="border-top-0">ID</th>
                                            <th class="border-top-0">Hình ảnh</th>
                                            <th class="border-top-0">Họ và tên</th>
                                            <th class="border-top-0">Email</th>
                                            <th class="border-top-0">Mật khẩu</th>
                                            <th class="border-top-0">Số điện thoại</th>
                                            <th class="border-top-0">Địa chỉ</th>
                                            <th class="border-top-0">Giới tính</th>
                                            <th class="border-top-0">Cấp bậc</th>
                                            <th class="border-top-0">Trạng thái</th>
                                            <th></th>
                                        </tr>
                                    </thead>
                                    <?php foreach($nguoidung as $nd) : ?>
                                        <?php extract($nd) ?>
                                    <tbody>
                                        <tr>
                                        <td class="text-center"><input type="checkbox" class="checkbox" name="id[]" value="<?=$id?>"></td>
                                            <td><?= $id ?></td>
                                            <td>
                                                <img src="../assets/images/user/<?=$hinh?>" width="50px" alt="">
                                            </td>
                                            <td><?= $hoten ?></td>
                                            <td><?= $email ?></td>
                                            <td><?= $matkhau ?></td>
                                            <td><?= $sodienthoai ?></td>
                                            <td><?= $diachi ?></td>
                                            <td><?= $gioitinh == 1 ? "Nam" : "Nữ" ?></td>
                                            <td>
                                                <?php 
                                                    if ($capbac==0) {
                                                        echo "Admin";
                                                    } else if($capbac==1){
                                                        echo 'Manager';
                                                    } else echo 'User';
                                                ?>
                                            </td>
                                            <td><?php echo $trangthai == 1 ? "Mở" : "Khóa" ?></td>
                                            <td>
                                                <a href="?act=editnguoidung&idnd=<?= $id ?>"><button type="button" class="btn btn-warning">Sửa</button></a>
                                                <a href="?act=nguoidung&idnd=<?= $id ?>"><button type="button" class="btn btn-danger" onclick="return confirm('Bạn có muốn xóa không')">Xóa</button></a>
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
      