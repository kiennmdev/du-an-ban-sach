
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
                        <h4 class="page-title">Thống kê số lượng sách đã bán và thu nhập theo ngày</h4>
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
                            <form action="?act=home" method="post">
                                <div class="row">
                                    <div class="col">
                                        <label for="">Thời gian bắt đầu:</label>
                                        <input type="date" class="form-control" name="fromdate" id="">
                                    </div>
                                    <div class="col">
                                        <label for="">Thời gian kết thúc:</label>
                                        <input type="date" class="form-control" name="todate" id="">
                                    </div>
                                    <span class="text-danger"><?= isset($err['chart1']) ? $err['chart1'] : ''?></span>
                                </div>
                            <div class="chart">
                            <canvas id="myChart1" style="width:100%;max-width:600px"></canvas>
                            </div>
                            <button type="submit" name="chart1" class="btn btn-primary">Thực hiện</button>
                            </form>
                        </div>
                    </div>
                    <div class="col-sm-12">
                        <div class="white-box">
                            <form action="?act=home" method="post">
                                <div class="row">
                                    <div class="col">
                                        <label for="">Thời gian bắt đầu:</label>
                                        <input type="date" class="form-control" name="fromdate1" id="">
                                    </div>
                                    <div class="col">
                                        <label for="">Thời gian kết thúc:</label>
                                        <input type="date" class="form-control" name="todate1" id="">
                                    </div>
                                    <span class="text-danger"><?= isset($err['chart2']) ? $err['chart2'] : ''?></span>
                                </div>
                            <div class="chart">
                            <canvas id="myChart2" style="width:100%;max-width:600px"></canvas>
                            </div>
                            <button type="submit" name="chart2" class="btn btn-primary">Thực hiện</button>
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
       