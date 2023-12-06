
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
                        <form action="?act=sanpham" method="POST"  class="d-flex mb-2 justify-content-center">
                            <div class="d-flex" style=" width:600px">
                            <div class="form-order-input col">
                                <input type="text" name="key" class="form-control" placeholder="Tìm kiếm..." id="">
                            </div>
                            <div class="form-order-button">
                                <button class="btn btn-primary " type="submit" name="search">Tìm Kiếm</button>
                            </div>
                            </div>
                        </form>
                            <form action="?act=sanpham" method="post">
                            <a href="?act=addsanpham"><button type="button" class="btn btn-success text-white">Thêm sản phẩm</button></a>
                            <button type="button" id="checkall" class="btn btn-primary">Chọn tất cả</button>
                            <button type="button" id="clearall" class="btn btn-primary">Bỏ chọn tất cả</button>
                            <button type="submit" id="deleteall" name="deleteall" class="btn btn-danger text-white" onclick="return confirm('Bạn có muốn xóa không')">Xóa các mục chọn</button>
                            <div class="table-responsive">
                                <table class="table text-wrap">
                                    <thead>
                                        <tr>
                                            <th></th>
                                            <th class="border-top-0">ID</th>
                                            <th class="border-top-0">Tên sách</th>
                                            <th class="border-top-0">Tác giả</th>
                                            <th class="border-top-0">Hình ảnh</th>
                                            <th class="border-top-0">NXB</th>
                                            <th class="border-top-0">Số lượng</th>
                                            <th class="border-top-0">Giá</th>
                                            <th class="border-top-0">Giảm giá</th>
                                            <th class="border-top-0">Loại sách</th>
                                            <th class="border-top-0">Lượt xem</th>
                                            <th class="border-top-0">Lượt bán</th>
                                            <th class="border-top-0">Trạng thái</th>
                                            <th></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach($dssp as $sp):
                                            extract($sp);
                                        ?>
                                        <tr>
                                            <td class="text-center"><input type="checkbox" class="checkbox" name="id[]" value="<?=$id?>"></td>
                                            <td><?=$id?></td>
                                            <td><?=$tensach?></td>
                                            <td><?=$tacgia?></td>
                                            <td>
                                                <img src="../assets/image/<?=$hinh?>"  alt=" " width="100px">
                                            </td>
                                            <td><?=$nhaxuatban?></td>
                                            <td><?=$soluong?></td>
                                            <td><?=$gia?></td>
                                            <td><?=$giamgia?></td>
                                            <td>
                                                <?=$tendanhmuc?>
                                            </td>
                                            <td><?=$luotxem?></td>
                                            <td><?=$luotban?></td>
                                            <td>
                                                <?=$trangthai == 1 ? 'Hiện' : 'Ẩn'?>
                                            </td>
                                            <td>
                                                <a href="?act=editsanpham&idsp=<?=$id?>"><button type="button" class="btn btn-warning">Sửa</button></a>
                                                <a href="?act=sanpham&idsp=<?=$id?>"><button type="button" class="btn btn-danger" onclick="return confirm('Bạn có muốn xóa không')">Xóa</button></a>
                                            </td>
                                        </tr>
                                        <?php endforeach ?>
                                    </tbody>
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
       