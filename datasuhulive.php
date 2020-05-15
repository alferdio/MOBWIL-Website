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
<script type="text/javascript" src="chartd2.js"></script>
<script type="text/javascript" src="chartd3.js"></script>
<script type="text/javascript" src="chartd4.js"></script>

<section id="two" class="wrapper style1">
        <header class="major">
          <h2><center> Data Nilai Jarak</center></h2>
        </header>
        <div class="container.big" style="background-color: #f6f6f6">
           <div class="row" style="background-color: #f6f6f6"> 
             <div class="container-fluid"> 
             <section class="col-md-6"> 
                <div style="width:105%; height: 80%;">
                <canvas id="canvas1"></canvas>
                </div>   
            </section>
             <section class="col-md-6"> 
                <div style="width:105%; height: 80%;">
                <canvas id="canvas2"></canvas>
                </div>
            </section>
            <section class="col-md-6"> 
                <div style="width:105%; height: 80%;">
                <canvas id="canvas3"></canvas>
                </div>
            </section>
            <section class="col-md-6"> 
                <div style="width:105%; height: 80%;">
                <canvas id="canvas4"></canvas>
                </div>
            </section>
            <div class="col-md-4">
                <a href="index2.php" class="btn btn-default btn-lg page-scroll">Kembali</a>
            </div>
            </div>
          </div>
        </div>
 </section>


