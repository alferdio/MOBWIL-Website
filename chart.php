<!DOCTYPE html>
<html>

<head>
	<title>Grafik | MOKOGU</title>
	<script src="jquery.min.js" type="text/javascript"></script>
	<script src="DataTables/jQuery-3.3.1/jquery-3.3.1.min.js" type="text/javascript"></script>
	<script type="text/javascript" src="fc/js/fusioncharts.js"></script>
	<!--CSS-->
	<link rel="stylesheet" href="DataTables/DataTables-1.10.20/css/jquery.dataTables.min.css">
	<link rel="stylesheet" href="DataTables/Buttons-1.6.1/css/buttons.dataTables.min.css">
	<link rel="stylesheet" type="text/css" href="css/css2.css">
	<script src="generate.js" type="text/javascript"></script>
	<script src='angularPh.js'></script>
	<script src='ledLDR.js'></script>
	<script src='lineKekeruhan.js'></script>
	<script src='angularPh2.js'></script>
	<script src='ledLDR2.js'></script>
	<script src='lineKekeruhan2.js'></script>
	<script src='angularPh3.js'></script>
	<script src='ledLDR3.js'></script>
	<script src='lineKekeruhan3.js'></script>
</head>

<body>	
	<?php
		include 'koneksi.php';
		date_default_timezone_set('UTC');
		$aktivitas ="Grafik";
		$today = date("Y-m-d");
		$jam = 7+(date("H"));
		if($jam >= 24)
			$jam=$jam-24;
		else
			$jam=$jam;
		$menit= date("i:s");
		$jam = $jam.":".$menit;
		$today=$today." ".$jam;
		$sql="INSERT INTO `history`(`id_user`, `aktivitas`, `waktu`) VALUES ('".$_GET['id']."','$aktivitas','$today')";
		$result = mysqli_query($koneksi,$sql);
		$sql= "SELECT * FROM `user` WHERE id_user='".$_GET['id']."'";
		$rslt = mysqli_query($koneksi,$sql);
		$record = mysqli_fetch_assoc($rslt);
		
	?>

	<div class="nav">
		<div class="nav-1">
			<a class="nav-4"></a>
			<a class="disini">Grafik</a>
			<div class="dropdown">
				<button class="dropbtn">
					<table>
						<tr>
							<td class="name"><?= $record['nama'] ?></td>
							<td class="profile"><img class="profile-1" src="gambars/fp/<?= $record['foto'] ?>"></td>
						</tr>
					</table>
				</button>
			<div class="dropdown-content">
			  <a href="profile3.php?id=<?= $record['id_user'] ?>">Profil</a>
			  <a href="proses_logout.php?id=<?= $record['id_user'] ?>">Keluar</a>
			</div>
			</div> 
		</div>
	</div>	
	
	<div align="center" style="padding-top:20px"><button id="status_sensor">ON</button>
      
	</div>
	<br>
	
<table>
<!-- kolam 1 -->
	<td colspan="3" align="center" ><button>
						<a style="font-size:20pt;text-decoration:none;color:#D8CFC0;color:black;" href="downloadPdf.php">PDF Kolam 1</a>
			</button></td>	
	<tr>
		<td colspan="3" align="center" style="font-size:20pt;text-decoration:bold;color:black;">Kolam 1</td>
	</tr>
	<tr>
		<td>
			<div id="angularPh"></div>
		</td>
		<td>
			<div id="graphKekeruhan"></div>
		</td>
		<td>
			<div id="chartldr"></div>
		</td>
	</tr>
	<tr height = "30 px"></tr>
	<tr>
			<td colspan="3" align="center" ><button>
						<a style="font-size:20pt;text-decoration:none;color:#D8CFC0;color:black;" href="downloadPdf2.php">PDF Kolam 2</a>
			</button></td>	
	</tr>
	
	<tr>
			<td colspan="3" align="center" style="font-size:20pt;text-decoration:bold;">Kolam 2</td>	
	</tr>
	<tr>
		<td>
			<div id="angularPh2"></div>
		</td>
		<td>
			<div id="graphKekeruhan2"></div>
		</td>
		<td>
			<div id="chartldr2"></div>
		</td>
	</tr>
	<tr height = "30 px"></tr>
	<td colspan="3" align="center" ><button>
						<a style="font-size:20pt;text-decoration:none;color:black;" href="downloadPdf3.php">PDF Kolam 3</a>
			</button></td>	

	<tr>
		<td colspan="3" align="center" style="font-size:20pt;text-decoration:bold;">Kolam 3</td>	
	</tr>
	<tr>
		<td>
			<div id="angularPh3"></div>
		</td>
		<td>
			<div id="graphKekeruhan3"></div>
		</td>
		<td>
			<div id="chartldr3"></div>
		</td>
	</tr>
</table>


</body>
</html>