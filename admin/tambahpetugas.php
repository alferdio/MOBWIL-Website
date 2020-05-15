<?php include 'koneksi.php'; ?>
<!DOCTYPE html>
<html>
<head>
	<title>Daftar Petugas</title>
	<link rel="stylesheet" href="admin/assets/css/bootstrap.css">
</head>
<body>
	<div class="container">
		<div class="row">
			<div class="col-md-8 col-md-offset-2" >
				<div class="panel panel-default">
					<div class="panel-heading">
						<h3 class="panel-title">Tambah Petugas</h3> 
					</div>
					<div class="panel-body">
						<form method="post" class="form-horizontal">
							<div class="form-group">
								<label class="control-label col-md-3">Email</label>
								<div class="col-md-7">
									<input type="text" name="email" class="form-control" required>
								</div>
							</div>
							<div class="form-group">
								<label class="control-label col-md-3">Password</label>
								<div class="col-md-7">
									<input type="text" name="password" class="form-control" required>
								</div>
							</div>
							<div class="form-group">
								<label class="control-label col-md-3">Jabatan</label>
								<div class="col-md-7">
									<input type="text" name="jabatan" class="form-control" required>
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
									<button class="btn btn-primary" name="daftar">Daftar</button>
								</div>
								
							</div>
							
						</form>
						<?php
						if (isset($_POST["daftar"])) 
						{
							//mengambil isian
							$email=$_POST["email"];
							$password=$_POST["password"];
							$jabatan=$_POST["jabatan"];
							$jenis_kelamin=$_POST["jenis_kelamin"];

							//validasi apakah email sudah digunakan
							$ambil=$koneksi->query("SELECT * FROM user WHERE email='$email'");
							$yangcocok=$ambil->num_rows;
							if ($yangcocok==1) 
							{
								echo "<script>alert('Pendaftaran gagal, email sudah digunakan')</script>";
								echo "<script>location='index.php?halaman=tambahpetugas&id='</script>";
							}
							else
							{
								//query insert pelanggan
								$koneksi->query("INSERT INTO user (email, password, jabatan, jenis_kelamin) VALUES ('$email','$password','$jabatan', '$jenis_kelamin') ");

								echo "<script>alert('Pendaftaran Sukses')</script>";
								echo "<meta http-equiv='refresh' content='1;url=index.php?halaman=petugas'>";
							}


						}
						?>
						
					</div>

					
				</div>
			</div>
		</div>
	</div>

</body>
</html>