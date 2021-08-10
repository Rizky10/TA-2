<?php
    // session start
    if(!empty($_SESSION)){ }else{ session_start(); }
    //session
	if(!empty($_SESSION['ADMIN'])){ }else{ header('location:login.php'); }
    // panggil file
    require 'proses/panggil.php';
    include_once 'conf.php';
?>

<!DOCTYPE HTML>
<html>
	<head>
		<title>Tambah Pengguna</title>
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	</head>
    <body style="background:#586df5;">
		<div class="container">
			<br/>
            <!-- <span style="color:#fff";>Selamat Datang, <?php echo $sesi['username'];?></span> -->
			<div class="float-right">
				<a href="index.php" class="btn btn-success btn-md" style="margin-right:1pc;"><span class="fa fa-home"></span> Kembali</a>
				<a href="logout.php" class="btn btn-danger btn-md float-right"><span class="fa fa-sign-out"></span> Logout</a>
			</div>
			<br/><br/><br/>
			<div class="row">
				<div class="col-sm-3"></div>
				<div class="col-lg-6">
					<br/>
					<div class="card">
						<div class="card-header">
						<h4 class="card-title">Tambah Device </h4>
						</div>
						<div class="card-body">
							<form action="tambahscript.php" method="POST">
								<div class="form-group">
                  <input type="hidden" name="valid" value="valid">
									<label>Nama Agent</label>
									<input type="text" value="" class="form-control" name="name">
								</div>
								<div class="form-group">
									<label>IP address</label>
									<input type="text" value="" class="form-control" name="ipaddr">
								</div>
								<div class="form-group">
									<label>Jumlah Sensor</label>
									<input type="number" value="" class="form-control" name="pin">
								</div>
                <div class="form-group">
                  <label for="exampleFormControlSelect1">Type</label>
                  <select class="form-control" id="exampleFormControlSelect1" name="tipe">
                    <option value="1">Manual Control</option>
                    <option value="2">Automatic Control</option>
                  </select>
								</div>
								<button class="btn btn-primary btn-md" name="create"><i class="fa fa-plus"> </i> Tambah Data</button>
							</form>
						</div>
					</div>
				</div>
				<div class="col-sm-3"></div>
			</div>
		</div>
	</body>
</html>
