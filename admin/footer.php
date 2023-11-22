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
          })
        </script>
 </html>