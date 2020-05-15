<?php
// Load file koneksi.php
include "koneksi.php";
?>

<html>
<head>
    <title>Report nilai jarak</title>
    <link rel="stylesheet" href="css/bootstrap.css" type="text/css">
    <link rel="stylesheet" href="plugin/jquery-ui/jquery-ui.min.css" /> <!-- Load file css jquery-ui -->
    <script src="js/jquery.min.js"></script> <!-- Load file jquery -->
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
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
                <a class="navbar-brand" href="index.html">Admin</a> 
            </div>
  <div style="color: white;
padding: 15px 50px 5px 50px;
float: right;
font-size: 16px;"> &nbsp; <a href="index.php?halaman=logout" class="btn btn-danger square-btn-adjust">Keluar</a> </div>
        </nav>   

        <nav class="navbar-default navbar-side" role="navigation">
            <div class="sidebar-collapse">
                <ul class="nav" id="main-menu">
                <li class="text-center">
                    <img src="assets/img/find_user.png" class="user-image img-responsive"/>
                    </li>
                    <li><a href="index.php" ><i class="fa fa-dashboard fa-3x"></i>Beranda</li>
                    <li><a href="index.php?halaman=jarak"><i class="fa fa-desktop fa-3x""></i> History jarak kapal yang terdeteksi sensor</a></li>
                    <li><a href="index.php?halaman=petani"><i class="fa fa-table fa-3x"></i> Data Petugas</a></li>
                    <li>
                        <a href="#"><i class="fa fa-bar-chart-o fa-3x"></i>Grafik Statistik<span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level">
                            <li>
                                <a href="index.php?halaman=piechart">Grafik Pengamatan Status bahaya</a>
                            </li>
                            <li>
                                <a href="index.php?halaman=linechart">Grafik Waktu Monitoring batas laut</a>
                            </li>
                        </ul>
                      </li>

                      <li>
                        <a href="#"><i class="fa fa-table fa-3x"></i>Laporan<span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level">
                            <li>
                                <a href="#">Daftar User<span class="fa arrow"></span></a>
                                <ul class="nav nav-third-level">
                                    <li><a href="index.php?halaman=indexdatapetani">Daftar Petugas</a></li>
                                </ul>
                            </li>
                            <li>
                                <a href="laporanjarak.php">Daftar nilai jarak</a>
                            </li>
                        
                        </ul>
                      </li>

                    </li>   
                </ul>
               
            </div>
            
        </nav>  
    <div id="page-wrapper" >
            <div id="page-inner">
    <form method="get" action="">
        <label>Filter Berdasarkan</label><br>
        <div class="row">
            <div class="col-md-12">
                <select name="filter" id="filter" class="col-lg-6">
                    <option value="">Pilih</option>
                    <option value="1">Per Tanggal</option>
                    <option value="2">Per Bulan</option>
                    <option value="3">Per Tahun</option>
                </select>
                <br /><br />
            </div>
            <div id="form-tanggal" class="col-lg-12 ">
                <label>Tanggal</label><br>
                <input type="text" name="tanggal" class="input-tanggal" />
            <br /><br />
            </div>
            <div id="form-bulan" class="col-lg-12">
            <label>Bulan</label><br>
            <select name="bulan" >
                <option value="">Pilih</option>
                <option value="1">Januari</option>
                <option value="2">Februari</option>
                <option value="3">Maret</option>
                <option value="4">April</option>
                <option value="5">Mei</option>
                <option value="6">Juni</option>
                <option value="7">Juli</option>
                <option value="8">Agustus</option>
                <option value="9">September</option>
                <option value="10">Oktober</option>
                <option value="11">November</option>
                <option value="12">Desember</option>
            </select>
            <br /><br />
        </div>
        <div id="form-tahun" class="col-lg-12">
            <label>Tahun</label><br>
            <select name="tahun" >
                <option value="">Pilih</option>
                <?php
                $query = "SELECT YEAR(tanggalwaktu) AS tahun FROM jaraksensor GROUP BY YEAR(tanggalwaktu)"; // Tampilkan tahun sesuai di tabel transaksi
                $sql = mysqli_query($koneksi, $query); // Eksekusi/Jalankan query dari variabel $query

                while($data = mysqli_fetch_array($sql)){ // Ambil semua data dari hasil eksekusi $sql
                    echo '<option value="'.$data['tahun'].'">'.$data['tahun'].'</option>';
                }
                ?>
            </select> 
            <br /><br />
        </div>
        <div class="col-lg-12">
            <button type="submit" class="col-lg-2">Tampilkan</button>
            <a href="laporanjarak.php" class="col-lg-2">Reset Filter</a>  
        </div>
    </div>
</form>
<hr />
    
    <?php
    if(isset($_GET['filter']) && ! empty($_GET['filter'])){ // Cek apakah user telah memilih filter dan klik tombol tampilkan
        $filter = $_GET['filter']; // Ambil data filder yang dipilih user

        if($filter == '1'){ // Jika filter nya 1 (per tanggal)
            $tgl = date('d-m-y', strtotime($_GET['tanggal']));

            echo '<b>Data Tanggal '.$tgl.'</b><br /><br />';
            echo '<a  class="btn btn-default" href="print.php?filter=1&tanggal='.$_GET['tanggal'].'">Cetak PDF</a>';
            

            $query = "SELECT * FROM jaraksensor JOIN user ON jaraksensor.id_user=user.id_user WHERE DATE(tanggalwaktu)='".$_GET['tanggal']."'"; // Tampilkan data transaksi sesuai tanggal yang diinput oleh user pada filter
        }else if($filter == '2'){ // Jika filter nya 2 (per bulan)
            $nama_bulan = array('', 'Januari','Februari','Maret','April','Mei','Juni','Juli','Agustus','September','Oktober','November','Desember');

            echo '<b>Data Bulan '.$nama_bulan[$_GET['bulan']].' '.$_GET['tahun'].'</b><br /><br />';
            echo '<a  class="btn btn-default" href="print.php?filter=2&bulan='.$_GET['bulan'].'&tahun='.$_GET['tahun'].'">Cetak PDF</a>';
            

            $query = "SELECT * FROM jaraksensor JOIN user ON jaraksensor.id_user=user.id_user WHERE MONTH(tanggalwaktu)='".$_GET['bulan']."' AND YEAR(tanggalwaktu)='".$_GET['tahun']."'"; // Tampilkan data transaksi sesuai bulan dan tahun yang diinput oleh user pada filter
        }else{ // Jika filter nya 3 (per tahun)
            echo '<b>Data Tahun '.$_GET['tahun'].'</b><br /><br />';
            echo '<a class="btn btn-default"  href="print.php?filter=3&tahun='.$_GET['tahun'].'">Cetak PDF</a>';
            

            $query = "SELECT * FROM jaraksensor JOIN user ON jaraksensor.id_user=user.id_user WHERE YEAR(tanggalwaktu)='".$_GET['tahun']."'"; // Tampilkan data transaksi sesuai tahun yang diinput oleh user pada filter
        }
    }else{ // Jika user tidak mengklik tombol tampilkan
        echo '<b>Semua Data </b><br /><br />';
        echo '<a href="print.php" class="btn btn-default">Cetak PDF</a>';
        

        $query = "SELECT * FROM jaraksensor JOIN user ON jaraksensor.id_user=user.id_userORDER BY tanggalwaktu"; // Tampilkan semua data transaksi diurutkan berdasarkan tanggal
    }
    ?>
    <table class="table table-bordered"> <h2>Laporan jarak kapal yang terdeteksi sensor</h2> <br><br>
    <thead>
    <thead>
        <tr class="info">
        <th>Tanggal</th>
        <th>Nilai </th>
        <th>Status bahaya</th>
        <th>email</th>
        </tr>
    </thead>
    <tbody>
        <?php
    $sql = mysqli_query($koneksi, $query); // Eksekusi/Jalankan query dari variabel $query
    $row = mysqli_fetch_assoc($sql); // Ambil jumlah data dari hasil eksekusi $sql

    if($row > 0){ // Jika jumlah data lebih dari 0 (Berarti jika data ada)
        while($data = mysqli_fetch_array($sql)){ // Ambil semua data dari hasil eksekusi $sql
            $tgl = date('d-m-Y', strtotime($data['tanggalwaktu'])); // Ubah format tanggal jadi dd-mm-yyyy

            echo "<tr>";
            echo "<td>".$tgl."</td>";
            echo "<td>".$data['nilai_jarak']."</td>";
            echo "<td>".$data['status_bahaya']."</td>";
            echo "<td>".$data['email']."</td>";
            echo "</tr>";
        }
    }else{ // Jika data tidak ada
        echo "<tr><td colspan='5'>Data tidak ada</td></tr>";
    }
    ?>

    </tbody>
    </table>
    <br/>

    <script>
    $(document).ready(function(){ // Ketika halaman selesai di load
        $('.input-tanggal').datepicker({
            dateFormat: 'yy-mm-dd' // Set format tanggalnya jadi yyyy-mm-dd
        });

        $('#form-tanggal, #form-bulan, #form-tahun').hide(); // Sebagai default kita sembunyikan form filter tanggal, bulan & tahunnya

        $('#filter').change(function(){ // Ketika user memilih filter
            if($(this).val() == '1'){ // Jika filter nya 1 (per tanggal)
                $('#form-bulan, #form-tahun').hide(); // Sembunyikan form bulan dan tahun
                $('#form-tanggal').show(); // Tampilkan form tanggal
            }else if($(this).val() == '2'){ // Jika filter nya 2 (per bulan)
                $('#form-tanggal').hide(); // Sembunyikan form tanggal
                $('#form-bulan, #form-tahun').show(); // Tampilkan form bulan dan tahun
            }else{ // Jika filternya 3 (per tahun)
                $('#form-tanggal, #form-bulan').hide(); // Sembunyikan form tanggal dan bulan
                $('#form-tahun').show(); // Tampilkan form tahun
            }

            $('#form-tanggal input, #form-bulan select, #form-tahun select').val(''); // Clear data pada textbox tanggal, combobox bulan & tahun
        })
    })
    </script>
    <script src="plugin/jquery-ui/jquery-ui.min.js"></script> <!-- Load file plugin js jquery-ui -->

</body>
</html>
