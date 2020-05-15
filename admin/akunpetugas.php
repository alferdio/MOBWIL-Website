<table class="table table-bordered">
	<thead> <h1>DATA AKUN PETUGAS</h1>
		<tr>
			<th>no</th>
			<th>username</th>
			<th>nama_lengkap</th>
			<th>tempatlahir</th>
			<th>tanggallahir</th>
			<th>jeniskelamin</th>
			<th>alamat</th>
			<th>usia</th>
		</tr>
		<tbody>
			<?php $nomor=1;?>
			<?php $ambil=$koneksi->query("SELECT * FROM petani JOIN biodata ON biodata.username = petani.username"); ?>
			<?php while($pecah=$ambil->fetch_assoc()){ ?>
			<tr>
				<td><?php echo $nomor; ?></td>
				<td><?php echo $pecah['username']; ?></td>
				<td><?php echo $pecah['nama_lengkap']; ?></td>
				<td><?php echo $pecah['tempatlahir']; ?></td>
				<td><?php echo $pecah['tanggallahir']; ?></td>
				<td><?php echo $pecah['jeniskelamin']; ?></td>
				<td><?php echo $pecah['alamat']; ?></td>
				<td><?php echo $pecah['usia']; ?></td>
				
			</tr>
			<?php $nomor++;?>
			<?php };  ?>
		</tbody>
	</thead>
</table>