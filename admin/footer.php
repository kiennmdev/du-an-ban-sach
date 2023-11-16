        <!-- footer -->
        <footer>
            Copyright2023
        </footer>

        </div>
        </body>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
        <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
        <script type="text/javascript">
      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {

        var data = google.visualization.arrayToDataTable([
          ['Task', 'Hours per Day'],
          <?php if(isset($_GET['chart']) && $_GET['chart'] == 'sanpham'): ?>
          <?php
            foreach($dsthongke1 as $thongke):
                extract($thongke);
          ?>
          ['<?=$name?>',<?= $soluong ?>],
        //   ['Work',     11],
        //   ['Eat',      2],
        //   ['Commute',  2],
        //   ['Watch TV', 2],
        //   ['Sleep',    7]
        <?php endforeach ?>
        <?php else: ?>
          <?php
            foreach($dsthongke2 as $thongke):
                extract($thongke);
          ?>
          ['<?=$name?>',<?= $tongsobl ?>],
        //   ['Work',     11],
        //   ['Eat',      2],
        //   ['Commute',  2],
        //   ['Watch TV', 2],
        //   ['Sleep',    7]
        <?php endforeach ?>
          <?php endif; ?>
        ]);

        var options = {
          title: 'Thống kê sản phẩm trong danh mục',
          is3D: true,
        };

        var chart = new google.visualization.PieChart(document.getElementById('piechart'));

        chart.draw(data, options);
      }
    </script>
        </html>