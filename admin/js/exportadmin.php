<?php 
include 'koneksi.php';

require("..\admin\PHPExcel-1.8\Classes\PHPExcel.php");

$obj = new PHPExcel();
$nomor=1;

$obj->setActiveSheetIndex(0)
	->setCellValue('A1',"Id Admin")
	->setCellValue('B1',"Email ")
	->setCellValue('C1',"Password")
	->setCellValue('D1',"Username")
	->setCellValue('E1',"Nama Lengkap");

$ambil=$koneksi->query("SELECT * FROM admin ");
$i=2;
while($rcrd = $ambil->fetch_assoc()){
	$obj->setActiveSheetIndex(0)
	->setCellValue("A$i",$rcrd['id_admin'])
	->setCellValue("B$i",$rcrd['email'])
	->setCellValue("C$i",$rcrd['password'])
	->setCellValue("D$i",$rcrd['username'])
	->setCellValue("E$i",$rcrd['namalengkap']);
	$i++;

}

$obj->getActiveSheet()->setTitle('Data_Admin');

header('Content-Type: application/vnd.ms-excel');
header('Content-Disposition: attachment;filename="Laporan_Dataadmin.xlsx"');
header('Cache-Control: max-age=0');
$penulis = PHPExcel_IOFactory::createWriter($obj,'Excel2007');
$penulis->save('php://output');
echo "<script>alert('File Laporan_DataAdmin.xlsx sudah ada');</script>";
?>