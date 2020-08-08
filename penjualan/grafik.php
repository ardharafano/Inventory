<html>
  <head>
    <meta charset="utf-8">
    <title>Demo Grafik Garis</title>
    <script src="js/Chart.js"></script>
    <style type="text/css">
            .container {
                width: 50%;
                margin: 15px auto;
            }
    </style>
  </head>
  <body>

    <div class="container">
            <canvas id="demobar" width="100" height="100"></canvas>
    </div>

    <?php
    $koneksi     = mysqli_connect("localhost", "root", "", "malasngoding_kios");
    $barang_laku      = mysqli_query($koneksi, "SELECT nama, jumlah, Quartal2, Quartal3 FROM barang_laku");
    $samsung      = mysqli_query($koneksi, "SELECT NamaProduk, Quartal1, Quartal2, Quartal3 FROM Penjualan WHERE NamaProduk='Samsung'");
    $apple      = mysqli_query($koneksi, "SELECT NamaProduk, Quartal1, Quartal2, Quartal3 FROM Penjualan WHERE NamaProduk='Apple'");
    $motorola      = mysqli_query($koneksi, "SELECT NamaProduk, Quartal1, Quartal2, Quartal3 FROM Penjualan WHERE NamaProduk='Motorola'");

     ?>

      	<script  type="text/javascript">

    	  var ctx = document.getElementById("demobar").getContext("2d");
    	  var data = {
    	            labels: ["Quartal1","Quartal2","Quartal3"],
    	            datasets: [
    	            {
    	              label: "Samsung",
                    fill: false,
                    lineTension: 0.1,
                    backgroundColor: "rgba(59, 100, 222, 1)",
                    borderColor: "rgba(59, 100, 222, 1)",
                    pointHoverBackgroundColor: "rgba(59, 100, 222, 1)",
						        pointHoverBorderColor: "rgba(59, 100, 222, 1)",
    	              data: [<?php while ($p = mysqli_fetch_array($samsung)) { echo '"' . $p['Quartal1'] . '","' . $p['Quartal2'] . '","' . $p['Quartal3'] . '",';}?>]
    	            },
                  {
    	              label: "Apple",
                    fill: false,
                    lineTension: 0.1,
                    backgroundColor: "rgba(203, 222, 225, 0.9)",
                    borderColor: "rgba(203, 222, 225, 0.9)",
                    pointHoverBackgroundColor: "rgba(203, 222, 225, 0.9)",
						        pointHoverBorderColor: "rgba(203, 222, 225, 0.9)",
    	              data: [<?php while ($p = mysqli_fetch_array($apple)) { echo '"' . $p['Quartal1'] . '","' . $p['Quartal2'] . '","' . $p['Quartal3'] . '",';}?>]
    	            },
                  {
    	              label: "Motorola",
                    fill: false,
                    lineTension: 0.1,
                    backgroundColor: "rgba(201, 29, 29, 1)",
                    borderColor: "rgba(201, 29, 29, 1)",
                    pointHoverBackgroundColor: "rgba(201, 29, 29, 1)",
						        pointHoverBorderColor: "rgba(201, 29, 29, 1)",
						        data: [<?php while ($p = mysqli_fetch_array($motorola)) { echo '"' . $p['Quartal1'] . '","' . $p['Quartal2'] . '","' . $p['Quartal3'] . '",';}?>]
    	            }
    	            ]
    	            };

    	  var myBarChart = new Chart(ctx, {
    	            type: 'line',
    	            data: data,
    	            options: {
    	            barValueSpacing: 20,
    	            scales: {
    	              yAxes: [{
    	                  ticks: {
    	                      min: 0,
    	                  }
    	              }],
    	              xAxes: [{
    	                          gridLines: {
    	                              color: "rgba(0, 0, 0, 0)",
    	                          }
    	                      }]
    	              }
    	          }
    	        });
    	</script>

  </body>
</html>