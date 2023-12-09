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
                    <a href="<?=$_SERVER["HTTP_REFERER"]?>" class="text-dark"><i class="fas fa-arrow-left"></i>&nbsp;&nbsp;&nbsp;Quay lại</a>
                    <div class="table-responsive">
                        <table class="table text-nowrap">
                            <thead>
                                <tr>
                                    <th>Mã sách</th>
                                    <th>Tên sách</th>
                                    <th>Hình ảnh</th>
                                    <th>Số lượng còn lại</th>
                                    <th>Số lượng đã bán</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php if (isset($_GET['sach']) && $_GET['sach'] == "banchay") : ?>
                                    <?php foreach ($dssach as $sach) :
                                        extract($sach);
                                    ?>
                                        <tr>
                                            <td><?= $id ?></td>
                                            <td><?= $tensach ?></td>
                                            <td>
                                                <img src="../<?= $img_path . $hinh ?>" alt="" width="50px">
                                            </td>
                                            <td><?= $soluonghientai ?></td>
                                            <td><?= $luotban ?></td>
                                        </tr>
                                    <?php endforeach ?>
                                <?php else : ?>
                                    <?php foreach ($dssach as $sach) :
                                        extract($sach);
                                    ?>
                                        <tr>
                                            <td><?= $id ?></td>
                                            <td><?= $tensach ?></td>
                                            <td>
                                                <img src="../<?= $img_path . $hinh ?>" alt="" width="50px">
                                            </td>
                                            <td><?= $soluonghientai ?></td>
                                            <td><?= $luotban ?></td>
                                        </tr>
                                    <?php endforeach ?>
                                <?php endif ?>
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