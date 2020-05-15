<div class="row">
	<div class="col-lg-12">
		<div id="monitoring"></div>
	</div>
</div>

<script src="assets/linechart/highcharts.js"></script>
<script src="assets/linechart/series-label.js"></script>
<script src="assets/linechart/exporting.js"></script>
<script src="assets/linechart/export-data.js"></script>

<script type="text/javascript">

	
Highcharts.chart('monitoring', {

    title: {
        text: 'Monitoring Batas Wilayah Laut'
    },

    subtitle: {
        text: 'Designed by Kelompok 8'
    },

    yAxis: {
        title: {
            text: 'Nilai jarak'
        }
    },
    legend: {
        layout: 'vertical',
        align: 'right',
        verticalAlign: 'middle'
    },

    plotOptions: {
        series: {
            label: [<?php include 'koneksi.php';
                                $sql = "SELECT *
                                    FROM jaraksensor
                                ORDER BY id_jarak DESC LIMIT 10" ;
                                $rst = mysqli_query($koneksi, $sql);
                                while($result = mysqli_fetch_assoc($rst)){
                                    $isi = $result['waktu'][0] . $result['waktu'][1] . $result['waktu'][2] . $result['waktu'][3] . $result['waktu'][4];
                                    echo '"'.$isi.'"'.",";
                                }
          ?>]

        }
    },

    series: [{
        name: 'jarak',
        data: [<?php include 'koneksi.php';
                                $sql = "SELECT *
                                    FROM jaraksensor
                                ORDER BY id_jarak DESC LIMIT 10";
                                $rst = mysqli_query($koneksi, $sql);
                                while($result = mysqli_fetch_assoc($rst)){
                                    echo $result['nilai_jarak'] . ",";
                                }
          ?>]
    }],

    responsive: {
        rules: [{
            condition: {
                maxWidth: 500
            },
            chartOptions: {
                legend: {
                    layout: 'horizontal',
                    align: 'center',
                    verticalAlign: 'bottom'
                }
            }
        }]
    }

});

</script>