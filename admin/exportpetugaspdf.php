<?php 
 require ("tcpdf/tcpdf.php");

 $obj1 = new TCPDF ('P','mm','A4',true,'UTF8',false);
 $obj1->AddPage();

$koneksi = mysqli_connect("localhost","root","","db_ktanah");
$q = "SELECT * FROM petani";
$rslt = mysqli_query($koneksi,$q);
$html ="
 <html> 
 	<head> 
 	<style>".file_get_contents('gaya.css')."</style>
 	</head>

 	<body>
 		<h1>Tabel Petani</h1>
 		<table border=\"1\" cellpadding=\"3\"> 
 			<tr> 
 			<th>Id Petani</th>
        	<th>Email Petani</th>
        	<th>Password </th>
        	<th>Nama </th>
        	<th>Telepon/HP</th>
        	<th>Alamat</th>
 			</tr>
 			";
 	while ($row=mysqli_fetch_assoc($rslt)) {
 		$html = $html." 
 		<tr><td>".$row['id_petani']."</td><td>".$row['email_petani']."</td><td>".$row['password_petani']."</td><td>".$row['nama_petani']."</td><td>".$row['telepon_petani']."</td><td>".$row['alamat_petani']."</td></tr>
 			";
 		}
 		$html = $html."
 		</table>
 	</body>
 	</html>";

 $obj1->writeHTMLCell(
 			0,0,10,5,$html,0,1,0,true,"",true
 		);
 $obj1->Output('Laporanpetani.pdf','I');
?>