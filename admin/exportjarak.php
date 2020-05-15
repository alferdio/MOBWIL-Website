<?php 
include 'koneksi.php';

require("..\admin\PHPExcel-1.8\Classes\PHPExcel.php");

$obj = new PHPExcel();
$nomor=1;

$obj->setActiveSheetIndex(0)
	->setCellValue('A1',"Tanggal/Waktu")
	->setCellValue('B1',"Nilai jarak sensor")
	->setCellValue('C1',"Status Bahaya")
	->setCellValue('D1',"Aksi User");

        $sql = mysqli_query($koneksi, "SELECT aksi FROM alat");
        $result = mysqli_fetch_assoc($sql);
        $aksi = $result['aksi'];

$ambil=$koneksi->query("SELECT * FROM jaraksensor");
$i=2;
while($rcrd = $ambil->fetch_assoc()){
	$obj->setActiveSheetIndex(0)
	->setCellValue("A$i",$rcrd['tanggalwaktu'])
	->setCellValue("B$i",$rcrd['nilai_jarak'])
	->setCellValue("C$i",$rcrd['status_bahaya'])
	->setCellValue("E$i",$aksi);
	$i++;

}

$obj->getActiveSheet()->setTitle('Data_Jarak');

header('Content-Type: application/vnd.ms-excel');
header('Content-Disposition: attachment;filename="Laporan_DataJarak.xlsx"');
header('Cache-Control: max-age=0');
$penulis = PHPExcel_IOFactory::createWriter($obj,'Excel2007');
$penulis->save('php://output');
echo "<script>alert('File Laporan_DataJarak.xlsx sudah ada');</script>";
?>