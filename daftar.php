
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Daftar user Baru</title>
	<!-- BOOTSTRAP STYLES-->
    <link href="admin/assets/css/bootstrap.css" rel="stylesheet" />
     <!-- FONTAWESOME STYLES-->
    <link href="admin/assets/css/font-awesome.css" rel="stylesheet" />
        <!-- CUSTOM STYLES-->
    <link href="admin/assets/css/custom.css" rel="stylesheet" />
     <!-- GOOGLE FONTS-->
   <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />

</head>
<style type="text/css">
    .jumbotron {
    background:url('images/BG.jpg');
    color: #fff;
    padding: 100px 25px;
    font-family: Montserrat, sans-serif;
  }


</style>

<body>

    <div class="container">
        <div class="row text-center  ">
            <div class="col-md-12">
                <br /><br />
                <h2> Daftar</h2>
               
                <h5>( Daftarkan untuk mendapatkan akses )</h5>
                 <br />
            </div>
        </div>
         <div class="row">
               
                <div class="col-md-4 col-md-offset-4 col-sm-6 col-sm-offset-3 col-xs-10 col-xs-offset-1">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                        <strong>  Pengguna baru ? Daftarkan dirimu </strong>  
                            </div>
                            <div class="panel-body">
                                <form role="form" method="post">

<br/>
                                        <div class="form-group input-group">
                                            <span class="input-group-addon"><i class="fa fa-circle-o-notch"  ></i></span>
                                            <input type="text" class="form-control" placeholder="masukkan nama lengkap" name="nama" required />
                                        </div>
                                        <div class="form-group input-group">
                                            <span class="input-group-addon">@</span>
                                            <input type="email" class="form-control" placeholder="masukkan email" name="email" required/>
                                        </div>
                                        <div class="form-group input-group">
                                            <span class="input-group-addon"><i class="fa fa-lock"  ></i></span>
                                            <input type="password" class="form-control" placeholder="masukkan Password" name="password" required/>
                                        </div>
                                        <div class="form-group input-group">
                                            <span class="input-group-addon"><i class="fa fa-circle-o-notch"  ></i>  </span>
                                            <input type="text" class="form-control" placeholder="masukkan jabatan" name="jabatan" required/>
                                        </div>

                                        <div class="form-group input-group"">   
                                                <span class="input-group-addon"><i class="fa fa-circle-o-notch"  ></i>  </span>
                                                  <select class="form-control" type="gender1" id="gender1" name="jk">
                                                    <option selected>masukkan jenis kelamin</option>
                                                    <option value="laki-laki">laki-laki</option>
                                                    <option value="Perempuan">Perempuan</option>
                                                  </select>  

                                        </div>
                                        <br>


                                    <button class="btn btn-success" name="register">Daftar</button>
                                    <hr />
                                    Sudah terdaftar ?  <a href="login.php" >Masuk disini</a>
                                    </form>
                         <?php
                            include 'koneksi.php';
                        if (isset($_POST["register"])) 
                        {
                            //mengambil isian
                        
                            $email=$_POST["email"];
                            $password=$_POST["password"];
                            $jabatan=$_POST["jabatan"];
                            $jk=$_POST["jk"];
                            //$jenis_kelamin=$_POST["jenis_kelamin"];

                            //validasi apakah email sudah digunakan
                            $ambil=$koneksi->query("SELECT * FROM user WHERE email='$email'");
                            $yangcocok=$ambil->num_rows;
                            if ($yangcocok==1) 
                            {
                                 echo "<script>alert('Pendaftaran gagal, email sudah digunakan')</script>";
                                 echo "<script>location='daftar.php'</script>";
                            }
                            else
                            {
                                //query insert pelanggan
                                $koneksi->query("INSERT INTO user (email, password, jabatan, jenis_kelamin) VALUES ('$email','$password','$jabatan','$jk') ");

                                 echo "<script>alert('Pendaftaran Sukses, Silahkan Login')</script>";
                                 echo "<script>location='login.php'</script>";
                            }


                        }
                        ?>
                            </div>
                           
                        </div>
                    </div>
                
                
        </div>
    </div>


     <!-- SCRIPTS -AT THE BOTOM TO REDUCE THE LOAD TIME-->
    <!-- JQUERY SCRIPTS -->
    <script src="assets/js/jquery-1.10.2.js"></script>
      <!-- BOOTSTRAP SCRIPTS -->
    <script src="assets/js/bootstrap.min.js"></script>
    <!-- METISMENU SCRIPTS -->
    <script src="assets/js/jquery.metisMenu.js"></script>
      <!-- CUSTOM SCRIPTS -->
    <script src="assets/js/custom.js"></script>
   
</body>
</html>