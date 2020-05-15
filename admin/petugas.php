<h2>Data Client (Petugas)</h2>
<table class="table table-bordered">
	<thead>
		<tr>
			<th>no</th>
			<th>email</th>
			<th>password</th>
			<th>jabatan</th>
			<th>jenis kelamin</th>
		</tr>
	</thead>
	<tbody>
		<?php $nomor=1;?>
		<?php $ambil=$koneksi->query("SELECT * FROM user"); ?>
		<?php while($pecah=$ambil->fetch_assoc()){ ?>
		<tr>
			<td><?php echo $nomor; ?></td>
			<td><?php echo $pecah['email']; ?></td>
			<td><?php echo $pecah['password']; ?></td>
			<td><?php echo $pecah['jabatan']; ?></td>
			<td><?php echo $pecah['jenis_kelamin']; ?></td>
			<td>
				<a href="index.php?halaman=hapususer&id=<?php echo $pecah['id_user']; ?>" class="btn btn-danger">hapus</a>
				<a href="index.php?halaman=ubahpetugas&id=<?php echo $pecah['id_user']; ?>" class="btn btn-success">Ubah</a>
			</td>
		</tr>
		<?php $nomor++;?>
		<?php }; ?>
	</tbody>
</table>
<a href="index.php?halaman=tambahpetugas&id=<?php echo $pecah['id_user']; ?>" class="btn btn-primary">Tambah</a>