<?php
  if(!empty($_SESSION)){ }else{ session_start(); }
	if(!empty($_SESSION['ADMIN'])){ }else{ header('location:login.php'); }
  require 'proses/panggil.php';
  include_once 'conf.php';
  if(isset($_POST['valid'])){
    $pin  = $_POST['pin'];
    $ip   = $_POST['ipaddr'];
    $name = $_POST['name'];
    $type = $_POST['tipe'];
  }else {
    header('location:tambah.php');
  }
  $short = " <option value='='>=</option> <option value='>'>></option> <option value='<'><</option><option value='<'>!=</option>" ;
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
          <!--   <span style="color:#fff";>Selamat Datang, <?php echo $sesi['username'];?></span> -->
			<div class="float-right">
				<a href="index.php" class="btn btn-success btn-md" style="margin-right:1pc;"><span class="fa fa-home"></span> Kembali</a>
				<a href="logout.php" class="btn btn-danger btn-md float-right"><span class="fa fa-sign-out"></span> Logout</a>
			</div>
			<br/><br/><br/>
			<div class="row">
				<!-- <div class="col-sm-2"></div> -->
				<div class="col-lg-11">
					<br/>
					<div class="card">
						<div class="card-header">
						<h4 class="card-title"> <center>   Tambah Data Agent </center></h4>
            <p><h6>Nama:  <?php echo $name; ?></h6></p>
            <p><h6>IP  :  <?php echo $ip; ?></h6></p>
            <p><h6>Pin:  <?php echo $pin; ?></h6></p>
            <p><h6>Tipe: <?php if ($type == 1) {
              echo "Manual Control";
            }else {
              echo "Automatic Control";
            } ?></h6></p>
						</div>
						<div class="card-body">
              <?php
                if($type==2){
                  echo "<form action='proses/crud.php?aksi=hello' method='POST'>"; // AUTOMATIC
                  // echo "action='proses/crud.php?aksi=hello";
                }else {
                  echo "<form action='proses/crud.php?aksi=helloworld' method='POST'>"; //MANUAL
                  // echo "                   action='proses/crud.php?aksi=helloworld";
                }
               ?>
								<table class="table">
                  <input type="hidden" name="pin" value="<?php echo $pin; ?>">
                  <input type="hidden" name="ip" value="<?php echo $ip; ?>">
                  <input type="hidden" name="name" value="<?php echo $name; ?>">
                  <input type="hidden" name="tipe" value="<?php echo $type; ?>">
                  <?php if ($type == 2): ?>
                  <tr>
                      <td>IP Controller :   </td>
                      <!-- <td>:</td> -->
                      <td colspan="3"><input type='text' value='' class='form-control' name='ipcon'></td>
                  </tr>
                    
                  <?php endif ?>
                  <?php
                    for ($i=1; $i <= $pin ; $i++) {
                      echo "<tr>";
                      echo "<td>";
                      // echo "<label>Nama Alat ".$i."</label>";
                      if ($type ==2) {
                      echo "<label>Nama Sensor </label>";
                      }else{
                      echo "<label>Nama Alat </label>";
                        
                      }

                      echo "<input type='text' value='' class='form-control' name='desc".$i."'>";
                      echo "</td>";
                      echo "<td>";
                      echo "<label>Pin Aktuator ".$i."</label>";
                      echo "<input type='text' value='' class='form-control' name='sensor".$i."'>";
                      echo "</td>";

                      if ($type==2) {

                        echo "<td>";
                        echo "<label>State ".$i."</label>";
                        echo "<select class='form-control'  name='state".$i."'>";
                        echo $short;
                        echo "</td>";
                        echo "<td>";
                        echo "<label>Nilai sensor ".$i."</label>";
                        echo "<input type='text' value='' class='form-control' name='nilai".$i."'>";
                        echo "</td>";
                        echo "<td>";
                        echo "<label>Satuan ".$i."</label>";
                        echo "<input type='text' value='' class='form-control' name='satuan".$i."'>";
                        echo "</td>";
                        echo "<td>";
                        echo "<label>Pin Aktuator ".$i."</label>";
                        echo "<input type='text' value='' class='form-control' name='actuator".$i."'>";
                        echo "</td>";
                        echo "</tr>";
                      }
                    }
                   ?>
                </table>
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
