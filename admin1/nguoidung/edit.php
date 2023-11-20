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
                    <div class="form-group">
                        <form action="?act=editnguoidung&idnd=<?=$id?>" method="post" enctype="multipart/form-data">
                                    <button type="submit" class="btn btn-success text-white">Sửa người dùng</button>
                                    <button type="reset" class="btn btn-primary">Nhập lại</button>
                                    <a href="?act=nguoidung"><button type="button" class="btn btn-primary">Danh sách</button></a>
                                    <div class="mb-3 mt-3">
                                        <label for="">Họ và tên:</label>
                                        <input type="text" class="form-control" id="" value="<?=$hoten?>"
                                            name="hoten">
                                            <input type="hidden" name="idnd" value="<?=$id?>">
                                    </div>
                                    <div class="mb-3 mt-3">
                                        <label for="">Email:</label>
                                        <input type="text" class="form-control" id="" value="<?=$email?>"
                                            name="email">
                                    </div>
                                    <div class="mb-3 mt-3">
                                        <label for="">Mật khẩu:</label>
                                        <input type="text" class="form-control" id="" value="<?=$matkhau?>"
                                            name="matkhau">
                                    </div>
                                    <div class="mb-3 mt-3">
                                        <label for="">Hình ảnh:</label>
                                        <input type="file" class="form-control" id="" name="hinh">
                                        <img src="../assets/images/user/<?=$hinh?>" alt="" width="200px">
                                    </div>
                                    <div class="mb-3 mt-3">
                                        <label for="">Số điện thoại:</label>
                                        <input type="text" class="form-control" id="" value="<?=$sodienthoai?>"
                                            name="sodienthoai">
                                    </div>
                                    <div class="mb-3 mt-3">
                                        <label for="">Địa chỉ:</label>
                                        <input type="text" class="form-control" id="" value="<?=$diachi?>"
                                            name="diachi">
                                    </div>


                                    <div class="mb-3 mt-3">
                                        <label for="">Giới tính:</label>
                                        <div class="form-control">
                                            <input type="radio" name="gioitinh" id="" value="1" <?= $gioitinh==1 ? "checked" : "" ?>> Nam
                                            <input type="radio" name="gioitinh" id="" value="0" <?= $gioitinh==0 ? "checked" : "" ?>> Nữ
                                        </div>
                                    </div>
                            <div class="mb-3 mt-3">
                                <label for="">Cấp bậc:</label>
                                <select class="form-select-sm form-control" name="capbac" id="">
                                    <option value="0" <?= $capbac ==0 ? "selected" : "" ?> >Admin</option>
                                    <option value="1" <?= $capbac ==1 ? "selected" : "" ?> >Manager</option>
                                    <option value="2" <?= $capbac ==2 ? "selected" : "" ?> >User</option>

                                </select>
                            </div>

                            <div class="mb-3">
                                <label for="">Trạng thái:</label>
                                <div class="form-control">
                                    <input type="radio" name="trangthai" id="" value="1" <?= $trangthai == 1 ? "checked" : "" ?> > Mở
                                    <input type="radio" name="trangthai" id="" value="0" <?= $trangthai == 0 ? "checked" : "" ?> > Khóa
                                </div>
                            </div>

                            <button type="submit" class="btn btn-success text-white">Sửa người dùng</button>
                            <button type="reset" class="btn btn-primary">Nhập lại</button>
                            <a href="?act=nguoidung"><button type="button" class="btn btn-primary">Danh sách</button></a>
                        </form>
                    </div>
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