<!-- Home -->
<div id="about">
  <div class="container">
    <h2>Selamat Datang di <span>Website Monitoring Batas Wilayah Laut</span></h2>
    <p>Senang bertemu anda kembali !</p>
      <p>Data diambil dari data yang didapat langsung dari alat saat ini
        <p> </p> 
    <div class="row">
      <div class="col-lg-4">
        <div class="panel panel-default"> 
          <div class="panel-heading">
                Pengamatan Terakhir
          </div>
          <div class="panel-body">
                <?php require 'piechart.php'; ?>
          </div>
        </div>
        <div class="about-desc">
          <h3>Pengamatan Terakhir</h3>
          <p>Status Pengamatan Jarak yang dideteksi langsung oleh sensor jarak.</p>
        </div>
      </div>
      <div class="col-lg-6">
        <div class="panel panel-default">
          <div class="panel-heading">
                Grafik Jarak
          </div>    
           <div class="panel-body">
               <?php require 'highchart.php'; ?>
            </div> 
        </div>
        <div class="about-desc">
          <h3>Grafik Jarak</h3>
          <p>Grafik Jarak membantu untuk monitoring Batas Wilayah Laut berdasarkan waktu pengukuran dan nilaijarak yang didapat dari sensor ini</p>
        </div>
      </div>
    </div>
  </div>
</div>
</div>
