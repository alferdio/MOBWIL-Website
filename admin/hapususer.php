<?php 
include 'koneksi.php';

$koneksi->query("DELETE FROM user WHERE id_user='$_GET[id]'");

echo "<script>alert('User Terhapus');</script>";
echo "<script>location='index.php?halaman=petugas';</script>";
?>