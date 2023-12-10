     <!-- footer -->
     <!-- ============================================================== -->
     <footer class="footer text-center"> 2021 © Ample Admin brought to you by <a href="https://www.wrappixel.com/">wrappixel.com</a>
     </footer>
     <!-- ============================================================== -->
     <!-- End footer -->
     <!-- ============================================================== -->
     </div>
     <!-- ============================================================== -->
     <!-- End Page wrapper  -->
     <!-- ============================================================== -->
     </div>
     <!-- ============================================================== -->
     <!-- End Wrapper -->
     <!-- ============================================================== -->
     <!-- ============================================================== -->
     <!-- All Jquery -->
     <!-- ============================================================== -->
     <script src="plugins/bower_components/jquery/dist/jquery.min.js"></script>
     <!-- Bootstrap tether Core JavaScript -->
     <script src="bootstrap/dist/js/bootstrap.bundle.min.js"></script>
     <script src="js/app-style-switcher.js"></script>
     <script src="plugins/bower_components/jquery-sparkline/jquery.sparkline.min.js"></script>
     <!--Wave Effects -->
     <script src="js/waves.js"></script>
     <!--Menu sidebar -->
     <script src="js/sidebarmenu.js"></script>
     <!--Custom JavaScript -->
     <script src="js/custom.js"></script>
     <!--This page JavaScript -->
     <!--chartis chart-->
     <script src="plugins/bower_components/chartist/dist/chartist.min.js"></script>
     <script src="plugins/bower_components/chartist-plugin-tooltips/dist/chartist-plugin-tooltip.min.js"></script>
     <script src="js/pages/dashboards/dashboard1.js"></script>
     </body>
     <script src="https://www.gstatic.com/charts/loader.js"></script>
     <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.js"></script>
     <script>
       let checkall = document.getElementById('checkall');
       let clearall = document.getElementById('clearall');
       let deleteall = document.getElementById('deleteall');

       let checkbox = document.getElementsByClassName('checkbox');

       // Check All
       checkall.addEventListener('click', function() {
         for (let i = 0; i < checkbox.length; i++) {
           checkbox[i].checked = true;

         }
       })
       clearall.addEventListener('click', function() {
         for (let i = 0; i < checkbox.length; i++) {
           checkbox[i].checked = false;

         }
       })

       //Kiểm tra xem admin đã chọn chưa
       function check_select() {
         for (let i = 0; i < checkbox.length; i++) {
           if (checkbox[i].checked == true) {
             return true;
           }
         }
         return false;
       }

       // Xử lí xóa khi chưa chọn thì không cho gửi dữ liệu lên server
       deleteall.addEventListener('click', function(event) {
         if (check_select() == false) {
           alert("Bạn cần chọn ít nhất 1 mục để xóa");
           event.preventDefault(); // Khoong cho phép kích hoạt sự kiện gửi dữ liệu lên server
           return false;
         }
       });
     </script>

       <!-- Thống kê 1 và 2 -->
     <script type="text/javascript">
       google.charts.load('current', {
         'packages': ['corechart']
       });
       google.charts.setOnLoadCallback(drawChart);

       function drawChart() {

         // Set Data
         const data = google.visualization.arrayToDataTable([
           ['Contry', 'Mhl'],
           <?php if (isset($_GET['chart']) && $_GET['chart'] == 'danhmuc') :
              $title = 'Thống kê số lượng sách trong danh mục';
            ?>
             <?php
              foreach ($thongke1 as $thongke) :
                extract($thongke);
              ?>['<?= $tendanhmuc ?>', <?= $tongsoluong ?>],
             <?php endforeach ?>
           <?php else :
              $title = 'Thống kê số lượng bình luận của sách';
            ?>
             <?php
              foreach ($thongke2 as $thongke) :
                extract($thongke);
              ?>['<?= $tensach ?>', <?= $tongsobl ?>],
             <?php endforeach ?>
           <?php endif ?>
         ]);

         // Set Options
         const options = {
           title: '<?= $title ?>',
           is3D: true
         };

         // Draw
         const chart = new google.visualization.PieChart(document.getElementById('myChart'));
         chart.draw(data, options);

       }
     </script>

      <!-- Thống kê 3 -->
     <script>
       var xValues = [
        <?php foreach($thongke3 as $thongke): 
          extract($thongke);
          ?>
          "<?=$ngaydathang?>",
        <?php endforeach ?>
       ];
       var yValues = [
        <?php foreach($thongke3 as $thongke): 
          extract($thongke);
          ?>
          <?=$tongsoluong?>,
        <?php endforeach ?>
       ];
       var barColors = [
        <?php foreach($thongke3 as $thongke): 
          extract($thongke);
          ?>
          "<?="aqua"?>",
        <?php endforeach ?>
      ];

       new Chart("myChart1", {
         type: "bar",
         data: {
           labels: xValues,
           datasets: [{
             backgroundColor: barColors,
             data: yValues
           }]
         },
         options: {
           legend: {
             display: false
           },
           title: {
             display: true,
             text: "Thống kê số lượng sách những ngày bán được"
           }
         }
       });
     </script>
      <!-- Thống kê 4 -->
     <script>
       var xValues1 = [
        <?php foreach($thongke4 as $thongke): 
          extract($thongke);
          ?>
          "<?=$ngaydathang?>",
        <?php endforeach ?>
       ];
       var yValues1 = [
        <?php foreach($thongke4 as $thongke): 
          extract($thongke);
          ?>
          <?=$thunhaptrongngay?>,
        <?php endforeach ?>
       ];
       var barColors1 = [
        <?php foreach($thongke4 as $thongke): 
          extract($thongke);
          ?>
          "<?="green"?>",
        <?php endforeach ?>
      ];

       new Chart("myChart2", {
         type: "bar",
         data: {
           labels: xValues1,
           datasets: [{
             backgroundColor: barColors1,
             data: yValues1
           }]
         },
         options: {
           legend: {
             display: false
           },
           title: {
             display: true,
             text: "Thống kê thu nhập theo ngày"
           }
         }
       });
     </script>

     </html>