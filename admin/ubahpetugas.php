<?php 
include 'koneksi.php'; 
$ambil=$koneksi->query("SELECT * FROM user WHERE id_user='$_GET[id]'"); 
$pecah=$ambil->fetch_assoc();
?>

<!DOCTYPE html>
<html>
<head>
	<title>Ubah Petugas</title>
	<link rel="stylesheet" href="admin/assets/css/bootstrap.css">
</head>
<body>
	<div class="container">
		<div class="row">
			<div class="col-md-8 col-md-offset-2" >
				<div class="panel panel-default">
					<div class="panel-heading">
						<h3 class="panel-title">Ubah Data Petugas</h3> 
					</div>
					<div class="panel-body">
						<form method="post" class="form-horizontal">
							<div class="form-group">
								<label class="control-label col-md-3">Email</label>
								<div class="col-md-7">
									<input type="text" name="email" class="form-control" value="<?php echo $pecah['email']; ?>">
								</div>
							</div>
							<div class="form-group">
								<label class="control-label col-md-3">password</label>
								<div class="col-md-7">
									<input type="text" name="password" class="form-control" value="<?php echo $pecah['password']; ?>">
								</div>
							</div>
							<div class="form-group">
								<label class="control-label col-md-3">Jabatan</label>
								<div class="col-md-7">
									<input type="text" name="jabatan" class="form-control" value="<?php echo $pecah['jabatan']; ?>">
								</div>
							</div>
							<label class="control-label col-md-3">Jenis Kelamin : </label>
							<div class="radio">
							 <label><input type="radio" name="jenis_kelamin" value="Laki-laki">Laki-laki</label>
							</div>
							<label class="control-label col-md-3"> :</label>
							<div class="radio">
							 <label><input type="radio" name="jenis_kelamin" value="Perempuan">Perempuan</label>
							</div>
							</div>
							<div class="form-group">
								<div class="col-md-7 col-md-offset-3">
									<br><br>
									<button class="btn btn-primary" name="ubah">Ubah</button>
								</div>
								
							</div>
							
						</form>
						<?php
						if (isset($_POST["ubah"])) 
						{
							//mengambil isian
							$email=$_POST["email"];
							$password=$_POST["password"];
							$jabatan=$_POST["jabatan"];
							$jenis_kelamin=$_POST["jenis_kelamin"];

							$koneksi->query("UPDATE user SET email='$email', password='$password', jabatan='$jabatan', jenis_kelamin='$jenis_kelamin' WHERE id_user='$_GET[id]'");

								echo "<script>alert('Data Telah di Ubah')</script>";
								echo "<meta http-equiv='refresh' content='1;url=index.php?halaman=petugas'>";
							


						}
						?>
						
					</div>

					
				</div>
			</div>
		</div>
	</div>

</body>
</html>