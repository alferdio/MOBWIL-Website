<div class="row">
	<div class="col-lg-12">
		<div id="data_jarak"></div>
	</div>
</div>

<script src="assets/highcharts/highcharts.js"></script>
<script src="assets/highcharts/exporting.js"></script>
<script type="text/javascript">
	
<?php 
include 'koneksi.php';

$ambil=$koneksi->query("SELECT * FROM jaraksensor ORDER BY id_jarak DESC LIMIT 10");

$tanggalwaktu = array();
$nilai_jarak = array();

while ($pecah=$ambil->fetch_object()) {
	$tanggalwaktu[] =  ($pecah->tanggalwaktu);
	$nilai_jarak[] =  intval($pecah->nilai_jarak);

}
?>


Highcharts.chart('data_jarak', {
    chart: {
        type: 'area'
    },
    title: {
        text: 'Grafik Sensor Jarak'
    },
    subtitle: {
        text: 'Monitoring Batas Wilayah Laut'
    },
    xAxis: {
        categories: <?=json_encode($tanggalwaktu)?>,
        tickmarkPlacement: 'on',
        title: {
            enabled: false
        }
    },
    yAxis: {
        title: {
            text: 'Jumlah'
        },
        labels: {
            formatter: function () {
                return this.value ;
            }
        }
    },
    tooltip: {
        split: true,
        valueSuffix: ''
    },
    plotOptions: {
        area: {
            stacking: 'normal',
            lineColor: '#666666',
            lineWidth: 1,
            marker: {
                lineWidth: 1,
                lineColor: '#666666'
            }
        }
    },
    series: [{
        name: 'Nilai Jarak Sensor',
        data: <?=json_encode($nilai_jarak)?>
    }]
});
</script>