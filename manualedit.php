<?php
  if(!empty($_SESSION)){ }else{ session_start(); }
	if(!empty($_SESSION['ADMIN'])){ }else{ header('location:login.php'); }
  require 'proses/panggil.php';
  include_once 'conf.php';
  $db = $con->TugasAkhir;
  $collection = $db->informasiperangkat;
  $collectionData = $db->dataperangkat;
  $id = $_GET['id'];
  $filter = ['id' => $id];
  if (!isset($_GET['tambah'])) {
    $baris=1;
  }else {
    $baris =$_GET['tambah'] + 1;
  }
  $options = [];
  $datas=$collection->findOne($filter,$options);
  $count = count($datas->sensor_pin);
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
				<div class="col-sm-0"></div>
				<div class="col-lg-12">
					<br/>
					<div class="card">
						<div class="card-header">
						<h4 class="card-title"> <center>   Edit Device - 
              <?php if ($datas->tipe == 1) {
              echo "Manual Control";
            }else {
              echo "Automatic Control";
            } ?>

            </center></h4>
            <!-- <p><h6>Nama:  <?php echo $datas->agent; ?></h6></p> -->
            <!-- <p><h6>IP  :  <?php echo $datas->agent_ip; ?></h6></p> -->
            
            <?php
            // echo "<p>".$datas->tipe."</p>"; ?>
						</div>
						<div class="card-body">
              <?php
                if($datas->tipe==2){
                  echo "<form action='test.php' method='POST'>";
                  // echo "action='proses/crud.php?aksi=hello";
                }else {
                  echo "<form action='testman.php?update=true' method='POST'>";
                  // echo "get you";
                  // echo "                   action='proses/crud.php?aksi=helloworld";
                }
               ?>
								<table class="table">
                  <tr>
                    <td colspan="2">Nama</td>
                    <td colspan="4"> <input type="text" class='form-control' name="name" value="<?php echo $datas->agent; ?>"></td>
                  </tr>
                  <tr>
                    <td colspan="2">IP Address sensor</td>
                    <td colspan="4"> <input type="text" class='form-control' name="ip" value="<?php echo $datas->agent_ip; ?>"></td>
                  </tr>
                  <tr>
                    <td>No</td>
                    <td>Nama Sensor</td>
                    <td>Pin Sensor</td>
                    <td>Aksi</td>
                  </tr>
                  <?php echo $pin ?>
                  <input type="hidden" name="pin" value="<?php echo $count+$_GET['tambah']; ?>">
                  <!-- <input type="hidden" name="ip" value=" <?php echo $datas->agent_ip; ?>"> -->
                  <!-- <input type="hidden" name="name" value="<?php echo $datas->agent; ?>"> -->
                  <input type="hidden" name="tipe" value="<?php echo $datas->tipe; ?>">
                  <input type="hidden" name="hiddens" value="<?php echo $id; ?>">
                  <?php echo $datas->type ?>
                  <?php
                    for ($i=0; $i < $count ; $i++) {
                      echo "<tr>";
                      echo "<td>".($i+1);
                      echo "</td>";
                      echo "<td>";
                      echo "<input type='text' value='".$datas->desc_sensor[$i]."' class='form-control' name='desc".$i."'>";
                      echo "</td>";
                      echo "<td>";
                      echo "<input type='number' value='".$datas->sensor_pin[$i]."' class='form-control' name='sensor".$i."'>";
                      echo "</td>";
                      echo "<td> <a href='deleterow.php?manual=true&id=".$id."&row=".$i."'>Hapus</a>";
                      echo "</td>";
                      echo "</tr>"; 
                    }for ($a=$i+1; $a < $i+$baris ; $a++) {
                      echo "<tr>";
                      echo "<td>".($a);
                      echo "</td>";
                      echo "<td>";
                      echo "<input type='text' value='' class='form-control' name='desc".($a-1)."'>";
                      echo "</td>";
                      echo "<td>";
                      echo "<input type='number' value='' class='form-control' name='sensor".($a-1)."'>";
                      echo "</td>";
                      echo "</tr>";
                    }
                   ?>

                </table>
								<?php echo "<a href='manualedit.php?id=".$id."&tambah=".($baris)."'>Tambah Baris</a>"; ?><?php echo "<a href='manualedit.php?id=".$id."&tambah=".($baris-2)."'> | Hapus Baris</a>"; ?>   <button class="btn btn-primary btn-md" name="create" style="margin-left: 80%; margin-bottom: 20px;"><i class="fa fa-plus"> </i> Tambah Data</button>
							</form>
              <br>

						</div>
					</div>
				</div>
				<div class="col-sm-3"></div>
			</div>
		</div>
	</body>
</html>

</html>
