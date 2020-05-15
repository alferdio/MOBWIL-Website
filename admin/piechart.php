<div class="row">
	<div class="col-lg-12">
		<div id="Pengamatan_Terakhir"></div>
	</div>
</div>

<script src="assets/piechart/jquery-3.1.1.min.js"></script>
<script src="assets/piechart/highcharts.js"></script>
<script src="assets/piechart/exporting.js"></script>
<script src="assets/piechart/export-data.js"></script>

<script type="text/javascript">

<?php
//koneksi ke database 
include 'koneksi.php';

//query ke database 
$aman = $koneksi->query("SELECT * FROM jaraksensor WHERE status_bahaya='Aman' GROUP BY id_jarak");
$Bahaya = $koneksi->query("SELECT * FROM jaraksensor WHERE status_bahaya='Bahaya' GROUP BY id_jarak");

$jumlah_kurang = mysqli_num_rows($aman);
$jumlah_sangat = mysqli_num_rows($Bahaya);
?> 

	Highcharts.chart('Pengamatan_Terakhir', {
    chart: {
        plotBackgroundColor: null,
        plotBorderWidth: null,
        plotShadow: false,
        type: 'pie'
    },
    title: {
        text: 'Status Pengamatan Jarak sensor'
    },
    tooltip: {
        pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
    },
    plotOptions: {
        pie: {
            allowPointSelect: true,
            cursor: 'pointer',
            dataLabels: {
                enabled: false
            },
            showInLegend: true
        }
    },
    series: [{
        name: 'Jumlah',
        colorByPoint: true,
        data: [{
            name: 'Aman',
            y: <?php echo $jumlah_kurang ?>,
            sliced: true,
            selected: true
        }, {
            name: 'Bahaya',
            y: <?php echo $jumlah_sangat ?>
        }]
    }]
});

</script>


