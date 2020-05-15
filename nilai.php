<?php 
session_start();
include 'koneksi.php';

	if(ISSET($jaraksensor))
		$jaraksensor = $_POST['jaraksensor'];
	else
		$jaraksensor = rand(0,100);
		$jaraksensor2 = rand(0,100);
		$jaraksensor3 = rand(0,100);
		$jaraksensor4 = rand(0,100);

		$sql = "UPDATE `sensor` SET `nilai`='$jaraksensor' WHERE id_sensor=1";
		$rst = mysqli_query($koneksi, $sql);


	if ($jaraksensor >= 0) {
		$status="Bahaya";
		if ($jaraksensor >= 51) {
			$status="Aman";
			
		}
	}
	
	if ($jaraksensor2 >= 0) {
		$status2="Bahaya";
		if ($jaraksensor2 >= 51) {
			$status2="Aman";
			
		}
	}

	if ($jaraksensor3 >= 0) {
		$status3="Bahaya";
		if ($jaraksensor3 >= 51) {
			$status3="Bahaya";
			
		}
	}


	if ($jaraksensor4 >= 0) {
		$status4="Bahaya";
		if ($jaraksensor4 >= 51) {
			$status4="Aman";
			
		}
	}
		// if ($jaraksensor < 60){
		// 	$status = "Bahaya";
		//     $aksi = "Alert Hidup";
		//    }
		//    else{
		//    	$status = "Aman";
		//     $aksi = "Alert Mati";
		// }

		//  if ($jaraksensor2 < 60){
		// 	$status = "Bahaya";
		//     $aksi = "Alert Hidup";
		//    }
		//    else{
		//    	$status = "Aman";
		//     $aksi = "Alert Mati";
		// }
		// if ($jaraksensor3 < 60){
		// 	$status = "Bahaya";
		//     $aksi = "Alert Hidup";
		//    }
		//    else{
		//    	$status = "Aman";
		//     $aksi = "Alert Mati";
		// }
		// if ($jaraksensor4 < 60){
		// 	$status = "Bahaya";
		//     $aksi = "Alert Hidup";
		//    }
		//    else{
		//    	$status = "Aman";
		//     $aksi = "Alert Mati";
		// }

		//$result = mysqli_fetch_assoc($rst);
		// if($jaraksensor < 60 || $jaraksensor2 < 60 || $jaraksensor3 < 60 || $jaraksensor4 < 60 ){
		// 	$status = "Bahaya";
		// 	$aksi = "alert Hidup";

		// }
		
		// if($jaraksensor >60 || $jaraksensor2 > 60 || $jaraksensor3 > 60 ||$jaraksensor4 >60){
		// 	$status = "Aman";
		// 	$aksi ="alert Mati";
		// }

		$sql = mysqli_query($koneksi, "SELECT waktu FROM monitoring ORDER BY id_monitoring DESC LIMIT 1");
	    $result = mysqli_fetch_assoc($sql);

	    $sql = "SELECT * FROM monitoring ORDER BY waktu DESC";
	
	$result = mysqli_query(koneksi, $sql);
	
	$waktu = '<table border="1" rules="all" cellpadding="5">
				<tr style="background-color: gray;">
					<th>#</th>
					<th>Nilai jarak</th>
					<th>Waktu</th>
				</tr>';
	
	$i = 1;
	
	while ($row = mysqli_fetch_assoc($result)) {
		$waktu .= '<tr>
					<td>'.($i++).'</td>
					<td>'.$row['nilai'].'</td>
					<td>'.$row['waktu'].'</td>
				</tr>';
	}

	if (! mysqli_num_rows($result))
		$waktu .= '<tr>
					<td colspan="4">Tidak ada data...</td>
				</tr>';
	
	$waktu .= '</table>';
	

		$sql = "INSERT INTO `monitoring`(`id_monitoring`, `waktu`, `nilai`) VALUES ('','".gettime()."', '$jaraksensor')";
		$rstt = mysqli_query($koneksi, $sql);

	    function gettime(){
		date_default_timezone_set("Asia/Jakarta");
		return date("H:i:s");
	}

		$sql = mysqli_query($koneksi, "SELECT id_monitoring FROM monitoring ORDER BY id_monitoring DESC LIMIT 1");
	    $result = mysqli_fetch_assoc($sql);
	    $id_monitoring = $result['id_monitoring'];

		$sql = mysqli_query($koneksi, "SELECT id_status FROM status ORDER BY id_status DESC LIMIT 1");
	    $result = mysqli_fetch_assoc($sql);
	    $id_status = $result['id_status'];


	    $sql = mysqli_query($koneksi, "SELECT id_alat FROM alat ORDER BY id_alat DESC LIMIT 1");
	    $result = mysqli_fetch_assoc($sql);
	    $id_alat = $result['id_alat'];
	    // tambahan id
	    $id_alat2 =2;
	    $id_alat3 = 3;
	    $id_alat4 = 4;

	    $id_user=$_SESSION["user"]["id_user"];

		$sql = "INSERT INTO `jaraksensor` (`id_jarak`, `id_monitoring`, `id_status`,`id_user`,`id_alat`,`waktu`, `nilai_jarak`, `status_bahaya` ) VALUES ('', '$id_monitoring','$id_status','$id_user','$id_alat','".gettime()."','$jaraksensor','$status')";
		$rsttt = mysqli_query($koneksi, $sql);

		// tambahan masukan data ke tabel jarak sensor 2
		$sql2 = "INSERT INTO `jaraksensor2` (`id_jarak`, `id_monitoring`, `id_status`,`id_user`,`id_alat`,`waktu`, `nilai_jarak`, `status_bahaya` ) VALUES ('', '$id_monitoring','$id_status','$id_user','$id_alat2','".gettime()."','$jaraksensor2','$status2')";
		$rsttt2 = mysqli_query($koneksi, $sql2);

		// tambahan masukan data ke tabel jarak sensor 3
		$sql3 = "INSERT INTO `jaraksensor3` (`id_jarak`, `id_monitoring`, `id_status`,`id_user`,`id_alat`,`waktu`, `nilai_jarak`, `status_bahaya` ) VALUES ('', '$id_monitoring','$id_status','$id_user','$id_alat3','".gettime()."','$jaraksensor3','$status3')";
		$rsttt3 = mysqli_query($koneksi, $sql3);

		// tambahan masukan data ke tabel jarak sensor 4
		$sql4 = "INSERT INTO `jaraksensor4` (`id_jarak`, `id_monitoring`, `id_status`,`id_user`,`id_alat`,`waktu`, `nilai_jarak`, `status_bahaya` ) VALUES ('', '$id_monitoring','$id_status','$id_user','$id_alat4','".gettime()."','$jaraksensor4','$status4')";
		$rsttt4 = mysqli_query($koneksi, $sql4);

		if($rst && $rstt || $rsttt || $rsttt2 || $rsttt3 || $rsttt4){
			echo '<script>alert("Data Telah dimasukan")</script>';
		}


	$sql = "SELECT * FROM monitoring GROUP BY id_monitoring DESC LIMIT 1";
	$result = mysqli_query($koneksi,$sql);
	$kSkr = mysqli_fetch_assoc($result)['nilai'];

	if($kSkr < 60){
		$sSensorLaut = 1;
	}else{
	 	$sSensorLaut = 0;
	}

	$sql = "UPDATE alat SET kondisi = '$sSensorLaut', aksi = '$aksi' WHERE nama_alat = 'SensorLaut'";
	mysqli_query($koneksi,$sql);		
?>