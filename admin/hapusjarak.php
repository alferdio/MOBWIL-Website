<?php 
include 'koneksi.php';
$id_jarak = $_GET['id'];
$koneksi->query("DELETE FROM jaraksensor WHERE id_jarak='$id_jarak'");

echo "<script>alert('jarak terhapus');</script>";
echo "<script>location='index.php?halaman=Jarak';</script>";
?>