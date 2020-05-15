<h2>Data Komentar Petugas</h2>
<table class="table table-bordered">
	<thead>
		<tr>
			<th>no</th>
			<th>nama</th>
			<th>email</th>
			<th>isi komentar</th>
		</tr>
	</thead>
	<tbody>
		<?php $nomor=1;?>
		<?php $ambil=$koneksi->query("SELECT * FROM komentar"); ?>
		<?php while($pecah=$ambil->fetch_assoc()){ ?>
		<tr>
			<td><?php echo $nomor; ?></td>
			<td><?php echo $pecah['nama']; ?></td>
			<td><?php echo $pecah['email']; ?></td>
			<td><?php echo $pecah['komentar']; ?></td>
			<td>
				<a href="index.php?halaman=hapususer&id=<?php echo $pecah['id_user']; ?>" class="btn btn-danger">hapus</a>
				<a href="index.php?halaman=ubahpetugas&id=<?php echo $pecah['id_user']; ?>" class="btn btn-success">Ubah</a>
			</td>
		</tr>
		<?php $nomor++;?>
		<?php }; ?>
	</tbody>
</table>