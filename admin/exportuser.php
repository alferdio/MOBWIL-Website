<?php 
include 'koneksi.php';

require("..\admin\PHPExcel-1.8\Classes\PHPExcel.php");

$obj = new PHPExcel();
$nomor=1;

$obj->setActiveSheetIndex(0)
	->setCellValue('A1',"Id User")
	->setCellValue('B1',"Email ")
	->setCellValue('C1',"Password")
	->setCellValue('D1',"Nama")
	->setCellValue('E1',"Telepon")
	->setCellValue('F1',"Alamat");

$ambil=$koneksi->query("SELECT * FROM user ");
$i=2;
while($rcrd = $ambil->fetch_assoc()){
	$obj->setActiveSheetIndex(0)
	->setCellValue("A$i",$rcrd['id_user'])
	->setCellValue("B$i",$rcrd['email'])
	->setCellValue("C$i",$rcrd['password'])
	->setCellValue("D$i",$rcrd['jabatan'])
	->setCellValue("E$i",$rcrd['jenis_kelamin'])
	$i++;

}

$obj->getActiveSheet()->setTitle('Data_User');

header('Content-Type: application/vnd.ms-excel');
header('Content-Disposition: attachment;filename="Laporan_Datapetani.xlsx"');
header('Cache-Control: max-age=0');
$penulis = PHPExcel_IOFactory::createWriter($obj,'Excel2007');
$penulis->save('php://output');
echo "<script>alert('File Laporan_DataUser.xlsx sudah ada');</script>";
?>