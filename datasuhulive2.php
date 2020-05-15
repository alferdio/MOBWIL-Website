<?php 
include 'koneksi.php'; ?> 

<title>Data jarak terupdate</title>
    <script type="text/javascript" src="js/jquery.min.js"></script>
    <script type="text/javascript" src="js/skel.min.js"></script>
    <script type="text/javascript" src="js/skel-layers.min.js"></script>
    <script type="text/javascript" src="js/init.js"></script>
    <script type="text/javascript" src="js/utils.js"></script>
    <script type="text/javascript" src="js/Chart.bundle.js"></script>
    <script type="text/javascript" src="js/jspdf.min.js"></script>
    <script type="text/javascript" src="js/canvasjs.min.js"></script>
    <link rel="stylesheet" type="text/css" href="admin/assets/css/bootstrap.css">
    
<script type="text/javascript" src="js/jquerytoggle.js"></script>
<link rel="stylesheet" type="text/css" href="css/styletoggle.css"> 
    <link rel="stylesheet" type="text/css" href="admin/assets/css/bootstrap.css">

    <noscript>
      <link rel="stylesheet" href="css/skel.css" />
      <link rel="stylesheet" href="css/style.css" />
      <link rel="stylesheet" href="css/style-xlarge.css" />
      <link rel="stylesheet" href="css/style-large.css" />
      <link rel="stylesheet" href="css/style-medium.css" />
      <link rel="stylesheet" href="css/style-small.css" />
      <link rel="stylesheet" href="css/style-xsmall.css" />
    </noscript>
<script type="text/javascript" src="chartd.js"></script>

<section id="two" class="wrapper style1">
  <header class="major">
    <h2><center> Data Nilai Jarak</center></h2>
  </header>
  <div class="container.big">
    <div class="row">
    <div class=""> 
        <section class="special"> 
          <div style="width:180%; height: 80%">
            <canvas id="canvas2"></canvas>
          </div>
  <script>
    var config = {
      type: 'line',
      data: {
        labels: [<?php include 'koneksi.php';
                                $sql = "SELECT *
                                    FROM jaraksensor
                                ORDER BY id_jarak";
                                $rst = mysqli_query($koneksi, $sql);
                                while($result = mysqli_fetch_assoc($rst)){
                                    $isi = $result['waktu'][0] . $result['waktu'][1] . $result['waktu'][2] . $result['waktu'][3] . $result['waktu'][4];
                                    echo '"'.$isi.'"'.",";
                                }
          ?>],
        datasets: [{
          label: 'Nilai ',
          fill: false,
          backgroundColor: window.chartColors.blue,
          borderColor: window.chartColors.red,
          data: [<?php include 'koneksi.php';
                                $sql = "SELECT *
                                    FROM jaraksensor
                                ORDER BY id_jarak";
                                $rst = mysqli_query($koneksi, $sql);
                                while($result = mysqli_fetch_assoc($rst)){
                                    echo $result['nilai_jarak'] . ",";
                                }
          ?>],
        }, {
          label: 'Dashed',
          fill: false,
          backgroundColor: window.chartColors.red,
          borderColor: window.chartColors.green,
          borderDash: [5, 5],
          data: [<?php include 'koneksi.php';
                                $sql = "SELECT *
                                    FROM jaraksensor
                                ORDER BY id_jarak";
                                $rst = mysqli_query($koneksi, $sql);
                                while($result = mysqli_fetch_assoc($rst)){
                                    echo $result['nilai_jarak'] . ",";
                                }
          ?>],
        }, {
          label: 'Filled',
          backgroundColor: window.chartColors.green,
          borderColor: window.chartColors.red,
          data:[<?php include 'koneksi.php';
                                $sql = "SELECT *
                                    FROM jaraksensor
                                ORDER BY id_jarak";
                                $rst = mysqli_query($koneksi, $sql);
                                while($result = mysqli_fetch_assoc($rst)){
                                    echo $result['nilai_jarak'] . ",";
                                }
          ?>],
          fill: true,
        }]
      },
      options: {
        responsive: true,
        title: {
          display: true,
          text: 'Data Jarak'
        },
        tooltips: {
          mode: 'index',
          intersect: false,
        },
        hover: {
          mode: 'nearest',
          intersect: true
        },
        scales: {
          xAxes: [{
            display: true,
            scaleLabel: {
              display: true,
              labelString: 'Waktu'
            }
          }],
          yAxes: [{
            display: true,
            scaleLabel: {
              display: true,
              labelString: 'km'
            }
          }]
        }
      }
    };
  </script>
          <a href="index.php" class="btn btn-default btn-lg page-scroll">Kembali</a>
        </section>
    </div>
   
    </div>
  </div>
</section>


