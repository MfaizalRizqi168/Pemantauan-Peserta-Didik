<?php
	session_start();
	require '../config/koneksi.php';

	if (isset($_POST['login'])) { 
			$pass = md5($_POST['password']);
			$sql = mysqli_query($con, "SELECT * FROM admin WHERE username = '$_POST[username]' && password = '$pass'");
			$cek = mysqli_num_rows($sql);
			$f = mysqli_fetch_array($sql);
			$_SESSION['nama'] = $f['nama'];
		if($cek > 0){
			echo "<script>alert('Selamat Datang Admin ".$_SESSION['nama']."');document.location.href='hal_admin.php?menu=home';</script>";
		}else{
			echo "<script>alert('Gagal Login');document.location.href='index.php';</script>";
		}
	}

	if (isset($_POST['register'])) {
		header("Location: register.php");
		exit;
	}
?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Halaman Login Admin</title>

  <!-- Custom fonts for this template-->
  <link href="../vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="../css/sb-admin-2.min.css" rel="stylesheet">
  <link rel="shortcut icon" href="img/logo.png" />
</head>
<body class="bg-gradient-primary">
	<div class="container">
	<!-- Outer Row -->
	    <div class="row justify-content-center">
	      <div class="col-xl-5 col-lg-6 col-md-9">
	        <div class="card o-hidden border-0 shadow-lg my-5">
	          <div class="card-body p-0">
				<div align="center">
					<h2>HALAMAN LOGIN ADMIN</h2>
				</div>
               			<div class="p-5">
							<form method="post">
			                    <div class="form-group">
			                      <input type="text" name="username" class="form-control form-control-user" placeholder="Username">
			                    </div>
			                    <div class="form-group">
			                      <input type="password" name="password" class="form-control form-control-user" id="exampleInputPassword" placeholder="Password">
			                    </div>
			                    <div class="form-group" align="center">
				                    <input type="submit" name="login" value="Login" class="btn btn-primary btn-user">
				                </div>
			                 </form>
			             </div>
			       
	            </div>
			  </div>
		    </div>
		  </div>
		</div>
	</div>
</body>
</html>

