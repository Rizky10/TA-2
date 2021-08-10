<?php
    // session start
    if(!empty($_SESSION)){ }else{ session_start(); }
    require 'proses/panggil.php';
    include_once 'conf.php';
?>

<!DOCTYPE HTML>
<html>
	<head>
		<title>Tugas Akhir Kel 9 2020/2021</title>
		<!-- BOOTSTRAP 4-->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.css">
        <!-- DATATABLES BS 4-->
        <link rel="stylesheet" href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css" />
        <!-- Font Awesome -->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

        <!-- jQuery -->
        <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.js"></script>
        <!-- DATATABLES BS 4-->
        <script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
        <!-- BOOTSTRAP 4-->
        <script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js"></script>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
	</head>
    <body style="background:#586df5;">
		<div class="container">
			<div class="row">
				<div class="col-lg-12">

                    <br/>
                    <span style="color:#fff";>Selamat Datang, <?php echo $sesi['username'];?></span>
                    <br><br>
                    <a href="logout.php" class="btn btn-danger btn-md float-right"><span class="fa fa-sign-out"></span> Logout</a>
                    <!-- <br/><br/> -->
                    <a href="index.php" class="btn btn-success btn-md"></span> Kembali</a>
                    <br/><br/>
                    <div class="card">
                        <div class="card-header">
                           <center><h5>User Manual</h5><center>
                        </div>
                        <div class="card-body">
                           <table class="w3-table w3-striped">
                                <tr>
                                    <td>1. Untuk mencari IP Address dari microcontroller, dalam menggunakan <a href="koneksi.txt"><i>code</i> berikut ini.</a> Silahkan ganti SSID dan password sesuai dengan  koneksi nirkabel anda. Code ini diperlukan untuk mencari IP Address <i>microcontroller</i> pengumpul data dan controller.  </td>
                                </tr>
                                <tr>
                                  <td>2. Pilih tombol Tambah pada beranda</td>
                                  
                                </tr>
                                <tr>
                                  <td>3. Akan terdapat 4 <i>field</i> yang harus diisi
                                    <ul>
                                        <li><i>Field</i> Nama Agent -  Berisikan nama Agent yang akan ditambahkan</li>
                                        <li><i>Field</i> IP Address - Beisikan alamat IP <i>microcontroller</i> pengumpul data sensor (<i>Field ini hanya bersifat informatif</i></li>
                                        <li><i>Field</i> Jumlah Sensor - Berisikan Jumlah sensor yang akan ditambahkan</li>
                                        <li><i>Field Type</i> - Berisikan tipe dari agent <ul>
                                            <li>Automatic Control - Aktuator dikendalikan berdasarkan data sensoe</li>
                                            <li>Manual Control - Aktuator dikendalikan langsung oleh pengguna</li>
                                        </ul></li>

                                    </ul>
                                  </td>
                                  
                                </tr>
                                <tr>
                                  <td>4. Laman akan diteruskan ke dalam laman tambah data agent. Pada laman ini, akan memasukkan nama sensor dan pin sensor <i>(pin sensor hanya bersifat informatif)</i>. Jika Agent memiliki tipe Automatic Controller, pada laman ini harus ditambahkan IP Controller, state (<i>acuan perbandingan (< / < / != / = )</i>) ,nilai sensor (nilai yang menjadi acuan untuk mengontrol aktuator), dan pin aktuator.</td>
                                  
                                </tr>
                                <tr>
                                  <td>5. Laman akan duteruskan ke laman beranda. Kemudian pilih nama agent yang baru ditambahkan. Setelah laman diteruskan, maka akan ada contoh <i>snippet code</i> untuk mempermudah dan meminimalisis <i>human error</i> pada sisi hardware. Anda bisa menambahkan <i>snipper</i> ini ke dalam code <i>microcontroller</i>.</td>
                                  
                                </tr>
                              </table>
                        </div>
                    </div>
                    <br>
                    
                    
			    </div>
			</div>
		</div>
        <script>
        </script>
	</body>
</html>
