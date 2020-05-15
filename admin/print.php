<?php ob_start(); ?>
<html>
<head>
	<title>Cetak PDF</title>
	<style>
		table {
			border-collapse:collapse;
			table-layout:fixed;width: 630px;
		}
		table td {
			word-wrap:break-word;
			width: 20%;
		}
	</style>
</head>
<body>
	<?php
	// Load file koneksi.php
	include "koneksi.php";
if(isset($_GET['filter']) && ! empty($_GET['filter'])){ // Cek apakah user telah memilih filter dan klik tombol tampilkan
        $filter = $_GET['filter']; // Ambil data filder yang dipilih user

        if($filter == '1'){ // Jika filter nya 1 (per tanggal)
            $tgl = date('d-m-y', strtotime($_GET['tanggal']));

            echo '<b>Data Tanggal '.$tgl.'</b><br /><br />';

            $query = "SELECT * FROM jaraksensor JOIN user ON jaraksensor.id_user=user.id_user WHERE DATE(tanggalwaktu)='".$_GET['tanggal']."'"; // Tampilkan data transaksi sesuai tanggal yang diinput oleh user pada filter
        }else if($filter == '2'){ // Jika filter nya 2 (per bulan)
            $nama_bulan = array('', 'Januari','Februari','Maret','April','Mei','Juni','Juli','Agustus','September','Oktober','November','Desember');

            echo '<b>Data Bulan '.$nama_bulan[$_GET['bulan']].' '.$_GET['tahun'].'</b><br /><br />';

            $query = "SELECT * FROM jaraksensor JOIN user ON jaraksensor.id_user=user.id_user WHERE MONTH(tanggalwaktu)='".$_GET['bulan']."' AND YEAR(tanggalwaktu)='".$_GET['tahun']."'"; // Tampilkan data transaksi sesuai bulan dan tahun yang diinput oleh user pada filter
        }else{ // Jika filter nya 3 (per tahun)
            echo '<b>Data Tahun '.$_GET['tahun'].'</b><br /><br />';

            $query = "SELECT * FROM jaraksensor JOIN user ON jaraksensor.id_user=user.id_user WHERE YEAR(tanggalwaktu)='".$_GET['tahun']."'"; // Tampilkan data transaksi sesuai tahun yang diinput oleh user pada filter
        }
    }else{ // Jika user tidak mengklik tombol tampilkan
        echo '<b>Semua Data </b><br /><br />';

        $query = "SELECT * FROM jaraksensor JOIN user ON jaraksensor.id_user=user.id_user ORDER BY tanggalwaktu"; // Tampilkan semua data transaksi diurutkan berdasarkan tanggal
    }
    ?>
	<table border="2" cellpadding="8">
	<tr>
        <th>Tanggal</th>
        <th>Nilai</th>
        <th>Status</th>
        <th>Email Petugas</th>

    </tr>

	<?php
	$sql = mysqli_query($koneksi, $query); // Eksekusi/Jalankan query dari variabel $query
	$row = mysqli_num_rows($sql); // Ambil jumlah data dari hasil eksekusi $sql

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
	</table>
</body>
</html>
<?php
$html = ob_get_contents();
ob_end_clean();

require_once('plugin/html2pdf/html2pdf.class.php');
$pdf = new HTML2PDF('P','A4','en');
$pdf->WriteHTML($html);
$pdf->Output('Data Transaksi.pdf', 'D');
?>
