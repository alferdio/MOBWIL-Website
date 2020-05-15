<?php   
	$koneksi = mysqli_connect('localhost', 'root', '', 'mobwil');
	$query = "SELECT * FROM jaraksensor3 GROUP BY id_jarak DESC LIMIT 10";
	$result = mysqli_query($koneksi,$query);
	//var_dump($result);
	$arr = array();
	while($row = mysqli_fetch_assoc($result)){
		$arr[] = $row['nilai_jarak'];
	}

	echo json_encode(array_reverse($arr));
?>