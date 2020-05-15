<?php 
 require ("tcpdf/tcpdf.php");

 $obj1 = new TCPDF ('P','mm','A4',true,'UTF8',false);
 $obj1->AddPage();

$koneksi = mysqli_connect("localhost","root","","mobwil");
$q = "SELECT * FROM user";
$rslt = mysqli_query($koneksi,$q);
$html ="
 <html> 
 	<head> 
 	<style>".file_get_contents('gaya.css')."</style>
 	</head>

 	<body>
 		<h1>Tabel user</h1>
 		<table border=\"1\" cellpadding=\"3\"> 
 			<tr> 
 			<th>Id user</th>
        	<th>Email user</th>
        	<th>Password </th>
        	<th>Jabatan </th>
        	<th>Jenis Kelamin</th>
 			</tr>
 			";
 	while ($row=mysqli_fetch_assoc($rslt)) {
 		$html = $html." 
 		<tr><td>".$row['id_user']."</td><td>".$row['email']."</td><td>".$row['password']."</td><td>".$row['jabatan']."</td><td>".$row['jenis_kelamin']."</td><td>".
 			;
 		}
 		$html = $html."
 		</table>
 	</body>
 	</html>";

 $obj1->writeHTMLCell(
 			0,0,10,5,$html,0,1,0,true,"",true
 		);
 $obj1->Output('Laporanuser.pdf','I');
?>