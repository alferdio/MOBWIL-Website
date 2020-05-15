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
			<td><?php echo $pecah['isi']; ?></td>
		</tr>
		<?php $nomor++;?>
		<?php }; ?>
	</tbody>
</table>