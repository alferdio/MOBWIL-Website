<?php
session_start();
//koneksi ke database 
include 'koneksi.php';

if (!isset($_SESSION['admin'])) 
{
    echo "<script>alert('Anda harus Masuk');</script>";
    echo "<script>location='login.php;'</script>";
    header('location:login.php');
    exit();

}

?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
      <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>HALAMAN UTAMA</title>
	<!-- BOOTSTRAP STYLES-->
    <link href="assets/css/bootstrap.css" rel="stylesheet" />
     <!-- FONTAWESOME STYLES-->
    <link href="assets/css/font-awesome.css" rel="stylesheet" />
     <!-- MORRIS CHART STYLES-->
    <link href="assets/js/morris/morris-0.4.3.min.css" rel="stylesheet" />
        <!-- CUSTOM STYLES-->
    <link href="assets/css/custom.css" rel="stylesheet" />
     <!-- GOOGLE FONTS-->
   <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />
   <link rel="stylesheet" type="text/css" href="admin/assets/css/bootstrap.css">
</head>
<body>
    <div id="wrapper">
        <nav class="navbar navbar-default navbar-cls-top " role="navigation" style="margin-bottom: 0">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".sidebar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="index.php" style="background-color: orange ">Admin</a> 
            </div>
  <div style="color: white;
padding: 15px 50px 5px 50px;
float: right;
font-size: 16px;"> &nbsp; <a href="index.php?halaman=logout" class="btn btn-danger square-btn-adjust" style="background-color: orange">Keluar</a> </div>
        </nav>   
           <!-- /. NAV TOP  -->
                <nav class="navbar-default navbar-side" role="navigation" style="background-color: orange">
            <div class="sidebar-collapse" style="background-color: orange">
                <ul class="nav" id="main-menu">
				<li class="text-center">
                    <img src="assets/img/find_user.png" class="user-image img-responsive"/>
					</li>
                    <li><a href="index.php"><i class="fa fa-dashboard fa-3x"></i>Beranda</a></li>
                    <li><a href="index.php?halaman=Jarak"><i class="fa fa-desktop fa-3x""></i> History Jarak Kapal</a></li>
                    <li><a href="index.php?halaman=petugas"><i class="fa fa-table fa-3x"></i> Data Petugas</a></li>
                    <li><a href="index.php?halaman=komentar"><i class="fa fa-bell fa-3x"></i> Komentar Petugas</a></li>
                    <li>
                        <a href="#"><i class="fa fa-bar-chart-o fa-3x"></i>Grafik Statistik<span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level">
                            <li>
                                <a href="index.php?halaman=highchart">Grafik persentase Aman dan Bahaya</a>
                            </li>
                        </ul>
                        <ul class="nav nav-second-level">
                            <li>
                                <a href="index.php?halaman=piechart">Grafik Jarak Sensor Terhadap Kapal</a>
                            </li>
                        </ul>
                      </li>
                    

<!--                       <li>
                        <a href="#"><i class="fa fa-table fa-3x"></i>Laporan<span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level">
                            <li>
                                <a href="laporanJaarak.php">Daftar Jarak yang terdeteksi Sensor</a>
                            </li>
                        
                        </ul>
                      </li> -->

                    </li>	
                </ul>
               
            </div>
            
        </nav>  
        <!-- /. NAV SIDE  -->
        <div id="page-wrapper" >
            <div id="page-inner">
                <?php
                if (isset($_GET['halaman'])) {
                    if ($_GET['halaman']=="Jarak")
                    {
                        include 'jarak.php';
                    }
                elseif ($_GET['halaman']=='hapusjarak') 
                    {
                        include 'hapusjarak.php';
                    }
                elseif ($_GET['halaman']=='petugas') 
                    {
                        include 'petugas.php';
                    }
                elseif ($_GET['halaman']=='piechart') 
                    {
                        include 'piechart.php';
                    }
                elseif ($_GET['halaman']=='highchart') 
                    {
                        include 'highchart.php';
                    }
                elseif ($_GET['halaman']=='linechart') 
                    {
                        include 'linechart.php';
                    }
                elseif ($_GET['halaman']=='tambahpetugas') 
                    {
                        include 'tambahpetugas.php';
                    }
                elseif ($_GET['halaman']=='ubahpetugas') 
                    {
                        include 'ubahpetugas.php';
                    }
                elseif ($_GET['halaman']=='hapususer') 
                    {
                        include 'hapususer.php';
                    }
                elseif ($_GET['halaman']=='indexdatapetugas') 
                    {
                        include 'indexdatapetugas.php';
                    }
                elseif ($_GET['halaman']=='logout') 
                    {
                        include 'logout.php';
                    }
                elseif ($_GET['halaman']=='komentar') 
                    {
                        include 'komentar.php';
                    }

                }
            else
            {
                include 'home.php';
            }

                ?>

            </div>
             <!-- /. PAGE INNER  -->
            </div>
         <!-- /. PAGE WRAPPER  -->
        </div>
     <!-- /. WRAPPER  -->
    <!-- SCRIPTS -AT THE BOTOM TO REDUCE THE LOAD TIME-->
    <!-- JQUERY SCRIPTS -->
    <script src="assets/js/jquery-1.10.2.js"></script>
      <!-- BOOTSTRAP SCRIPTS -->
    <script src="assets/js/bootstrap.min.js"></script>
    <!-- METISMENU SCRIPTS -->
    <script src="assets/js/jquery.metisMenu.js"></script>
     <!-- MORRIS CHART SCRIPTS -->
     <script src="assets/js/morris/raphael-2.1.0.min.js"></script>
    <script src="assets/js/morris/morris.js"></script>
      <!-- CUSTOM SCRIPTS -->
    <script src="assets/js/custom.js"></script>
    
   
</body>
</html>
