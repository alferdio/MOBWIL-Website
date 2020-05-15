<h2>Histori Monitoring Jarak</h2>
 
<table class="table table-bordered">
	<thead>
		<th>no</th>
		<th>Tanggal / Waktu</th>
		<th>nilai jarak</th>
		<th>Status bahaya</th>
		<th>email</th>
	</thead>
	<tbody>
		<?php $nomor=1; ?>
		<?php $ambil=$koneksi->query("SELECT * FROM jaraksensor JOIN user ON jaraksensor.id_user=user.id_user "); ?>
		<?php while ($pecah = $ambil->fetch_assoc()){ ?>
		<tr>
			<td><?php echo $nomor; ?></td>
			<td><?php echo $pecah['tanggalwaktu']; ?></td>
			<td><?php echo $pecah['nilai_jarak']; ?></td>
			<td><?php echo $pecah['status_bahaya']; ?></td>
			<td><?php echo $pecah['email']; ?></td>
			<td>
				<a href="index.php?halaman=hapusjarak&id=<?php echo $pecah['id_jarak']; ?>" class="btn-danger btn">hapus</a>
			</td>
		</tr>
		<?php $nomor++; ?>
		<?php } ?>
	</tbody>
</table>