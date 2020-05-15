<html>
<head>
	<!-- CSS untuk bootstrap -->
	<link rel="stylesheet" href="css/bootstrap.css" type="text/css"> 

</head>
<body>

<?php
	include"koneksi.php";
	
	$sql = "select * from user";
	$result = mysqli_query($koneksi,$sql);	
?>
<div class="container">
	<form method="POST" action="importdatapetani.php" id="import_excel" name="import_excel" enctype="multipart/form-data">
		<div class="row">
			<div class="col-md-5">
				<div class="form-group">
					<label class="control-label">File Excel :</label>
					<input type="file" name="file_excel" class="form-control">
				</div>
				<button type="submit" name="btn_submit" class="btn btn-primary" id="btn_submit">Import Excel</button>
			</div>
		</div>
	</form>
	<br>
	<table class="table table-bordered"> <h2>Data Client(Petugas)</h2> <br><br>
    <thead>
    <tr>
    	<th>Id user</th>
        <th>Email</th>
        <th>Password </th>
        <th>Jabatan</th>
        <th>Jenis_kelamin</th>
    </tr>
    </thead>
    <tbody>
        <?php
                while($row=mysqli_fetch_assoc($result)){
					
                    echo"<tr><td>".$row['id_user']."</td><td>".$row['email']."</td><td>".$row['password']."</td><td>".$row['jabatan']."</td><td>".$row['Jenis_kelamin']."</td><td>";
					
                }
        ?>
    </tbody>
    </table>
    <a href="exportpetugaspdf.php" class="btn btn-default">Cetak PDF</a>
    <a href="exportuser.php" class="btn btn-default">Cetak Excel</a>
 </div>

	<!-- js untuk jquery -->
	<script src="js/jquery-1.11.2.min.js"></script>
	<!-- js untuk bootstrap -->
	<script src="js/bootstrap.js"></script>

	<script type="text/javascript">
		$(document).ready(function(){
			$('#import_excel').submit(function(evt){
            	evt.preventDefault();
            	var formData = new FormData(this);
            	$('#btn_submit').text('Importing...').addClass('disabled');
            	$.ajax({
                    type : 'POST',
                    url : $(this).attr('action'),
                    data : formData,
                    cache : false,
                    contentType : false,
                    processData : false,
                    success:function(response) {
                    	if(response.st==1) {
                    		//sukses
                    		alert(response.pesan);
                    		window.location.reload();
                    	}

                    	if(response.st==0) {
                    		//gagal
                    		alert(response.pesan);
                    		$('#btn_submit').text('Import Excel').removeClass('disabled');
                    	}	
	            	},dataType:'json'
	            });

            });
		});
	</script>
</body>
</html>
