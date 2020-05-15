
<?php 
	include('koneksi.php');
	$id_user = 0;
?>

                   <?php 
						if(isset($_GET['edit'])) { 
							$select_sql = "SELECT * FROM user WHERE id_user=$_GET[edit]";
							$select = mysqli_query($koneksi, $select_sql);
							while($row = mysqli_fetch_assoc($select)) {
							 	$email = $row['email'];
								$password = $row['password'];
								$jabatan= $row['jabatan'];
								$jenis_kelamin= $row['jenis_kelamin'];
								$id_user = $row['id_user'];
							}
							
							echo "
								<form class='col-md-3' method='GET'>
								<h3>Edit Data</h3>
								<div class='form-group'>
									<label>Email</label>
									<input class='form-control' type='email' name='email' value =$email>
								</div>
								<div class='form-group'>
									<label>password</label>
									<input class='form-control' type='password' name='password' value =$password>
								</div>
								<div class='form-group'>
									<label>Jabatan</label>
									<input class='form-control' type='text' name='jabatan' value=$jabatan>
								</div>
								<div class='form-group'>
									<label>Jenis kelamin</label>
									<input class='form-control' type='text' name='jenis_kelamin' value=$jenis_kelamin>
								</div>
								</form>
									
									";
								?>					
							
							<?php
						}else{ ?>
							<form class="col-md-3" method="POST">
								<h3>Register Form</h3>
								<div class="form-group">
									<label>Email</label>
									<input class="form-control" type="email" name="email">
								</div>
								<div class="form-group">
									<label>Password</label>
									<input class="form-control" type="password" name="password">
								</div>
								<div class="form-group">
									<label>Jabatan</label>
									<input class="form-control" type="text" name="Jabatan">
								</div>
								<div class="form-group">
									<label>Jenis Kelamin</label>
									<input class="form-control" type="text" name="jenis_kelamin">
								</div>
							</form>
							<?php
						}
					?>
                    <div class="col-md-9" id="left">
                        <h3 >Data User</h3>
                        <table class="table table-responsive table-condensed">
                            <thead>
                                <tr>
                                    <th>Email</th>
                                    <th>Password</th>
                                    <th>Jabatan </th>
                                    <th>Jenis kelamin</th>
                                    <th>Edit</th>
                                    <th>Delete</th>
                                </tr>
                            </thead>
                            <tbody>
                            	<?php 
									$sql = "SELECT * FROM user";
									$result = mysqli_query($koneksi, $sql);
									while($row = mysqli_fetch_assoc($result)){
										echo "
											<tr>
												<td>$row[email]</td>
												<td>$row[password]</td>
												<td>$row[jabatan]</td>
												<td>$row[jenis_kelamin]</td>
												<td><a href='petugas1.php?edit=$row[id_user]'><button class='btn btn-primary'>Edit</button></a></td>
												<td><a href='petugas1.php?id_petugas=$row[id_user]'><button class='btn btn-danger'>Delete</button></a></td>
											</tr>
										";
									}
								?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>

<?php 
	if(isset($_POST['submit'])){
		$email = mysqli_real_escape_string($koneksi,$_POST['email']);
		$password = mysqli_real_escape_string($koneksi,$_POST['password']);
		$jabatan = mysqli_real_escape_string($koneksi,$_POST['jabatan']);
		$jenis_kelamin = mysqli_real_escape_string($koneksi,$_POST['jenis_kelamin']);
		
		$insert_query = "INSERT INTO user (email,password,jabatan,jenis_kelamin,) VALUES ('$email', '$password', '$jabatani', '$jenis_kelamin')";
		
		if(mysqli_query($koneksi, $insert_query)) { ?>
			<script>window.location = 'petugas1.php'</script>
			
			<?php	
		}	
	}
    $insert_sql = "INSERT INTO user (email,password,jabatan,jenis_kelamin) VALUES()";

	if( isset($_GET['id_user'])) {
		$del_sql = "DELETE FROM user WHERE id_user = $_GET[id_user]";
		if(mysqli_query($koneksi, $del_sql)){ ?>
			<script>window.location='petugas1.php'</script>
			
			<?php
		}
	}

	if( isset($_GET['updateid'])) {
		$email = mysqli_real_escape_string($koneksi,$_GET['email']);
		$password = mysqli_real_escape_string($koneksi,$_GET['password']);
		$jabatan = mysqli_real_escape_string($koneksi,$_GET['jabatan']);
		$jenis_kelamin = mysqli_real_escape_string($koneksi,$_GET['jenis_kelamin']);
		
		$update_sql = "UPDATE user SET email ='$email', password='password', jabatan='jabatan',jenis_kelamin='$jenis_kelamin' WHERE id_user='$_GET[updateid]'";
		if(mysqli_query($koneksi,$update_sql)) { ?>
				<script> window.location = 'petugas1.php' </script>
			<?php
		}
		
	}
?>