<?php
    // session start
    if(!empty($_SESSION)){ }else{ session_start(); }
    require '../proses/panggil.php';
    include_once '../conf.php';
    $db = $con->TugasAkhir;
    $collection = $db->informasiperangkat;
    $collectionData = $db->testaja;
    $id = $_GET['id'];
    $filter = ['id' => $id];
    $options = [];
    $datas=$collection->findOne($filter,$options);
    $key = $datas;
    $coun = count($key->actuator_pin);
?>

<!DOCTYPE HTML>
<html>
	<head>
		<title>Tutorial Membuat CRUD PHP OOP dengan PDO MySQL</title>
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

	</head>
    <body style="background:#586df5;">
		<div class="container">
			<div class="row">
				<div class="col-lg-12">

                    <?php if(!empty($_SESSION['ADMIN'])){?>
                    <br/>
            <!--         <span style="color:#fff";>Selamat Datang, <?php echo $sesi['username'];?></span> -->
                    <a href="../logout.php" class="btn btn-danger btn-md float-right"><span class="fa fa-sign-out"></span> Logout</a>
                    <!-- <br/><br/> -->
                    <a href="../" class="btn btn-success btn-md"><span class="fa fa-home"></span> Home</a>
                    <br/><br/>
                    <div class="card">
                        <div class="card-header">
                            <table >
                                <tr>
                                    <td>Nama Sistem </td>
                                    <td>:</td>
                                    <td><?php echo $key->agent; ?></td>
                                </tr>
                                <tr>
                                    <td>ID </td>
                                    <td>:</td>
                                    <td><?php echo $key->id; ?></td>
                                </tr>
                                <tr>
                                    <td>IP Sensor </td>
                                    <td>:</td>
                                    <td><?php echo $key->agent_ip; ?></td>
                                </tr>
                                <tr>
                                    <td>IP Controller </td>
                                    <td>:</td>
                                    <td><?php echo $key->controller_ip; ?></td>
                                </tr>

                            </table>

                            <p></p>
                        </div>
                        <div class="card-body">
                            <h4>Data Sensor</h4>
                            <hr>
                            <table class="table table-hover table-bordered" id="mytable1" style="margin-top: 10px">
                                <thead>
                                    <tr>
                                        <th width="50px">No</th>
                                        <!-- <th>ID</th> -->
                                        <th width="250px">Desc Sensor</th>
                                        <th>Pin Sensor</th>
                                        <th width="">Nilai Batas Sensor</th>
                                        <th width="">Pin Aktuator</th>
                                        <th style="text-align: center;">Status</th>
                                        <th style="text-align: center;">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                  <?php 
                                  // echo "$con";
                                    for ($a=0; $a < $coun ; $a++) { 
                                        echo "<tr>";
                                        echo "<td>".($a+1)."</td>";
                                        echo "<td>".$key->desc_sensor[$a]."</td>";
                                        echo "<td>".$key->sensor_pin[$a]."</td>";
                                        echo "<td>".$key->sensor_value[$a]."</td>";
                                        echo "<td>".$key->actuator_pin[$a]."</td>";
                                        echo "<td>".$key->status[$a]."</td>";
                                        if ($key->status[$a] == 'active') {
                                            echo "<td> <center> <a href='../deleterow.php?tipe=deact&job=deact&id=".$key->id."&row=".$a."'><button type='button' class='btn btn-danger'>Deactivate</button></a></center></td>";
                                        }else{
                                            echo "<td> <center> <a href='../deleterow.php?tipe=deact&job=activ&id=".$key->id."&row=".$a."'><button type='button' class='btn btn-success'>Activate</button></a></center></td>";
                                        }
                                        echo "</tr>";
                                    }

                                   ?>
                                </tbody>
                            </table>
                        </div>
                    </div>

                    <br><br>
                    <div class="card">
                        <div class="card-header">
                            <table class="table table-hover table-bordered" id="mytable" style="margin-top: 10px">
                                <thead>
                                    <tr>
                                         <th >No</th>
                                        <?php 
                                        for ($i=0; $i < $coun ; $i++) { 
                                            echo "<th>".$key->desc_sensor[$i]."</th>";

                                        }     
                                        ?>
                                        <th>Waktu</th>
                                    </tr>
                                </thead>
                                <tbody>
                                  <?php 

                                    $db = $con->TugasAkhir;
                                    $collection = $db->testaja;

                                    $filter = ['id' => $key->id ];
                                    $options = ['sort' => ['waktu' => -1 , 'tanggal' => -1 ]];
                                    $datas=$collection->find($filter,$options);
                                    $num=1;
                                    foreach ($datas as $key ) {
                                      echo "<tr>";
                                      echo "<td>".$num."</td>";
                                        for ($a=0; $a < $coun ; $a++) { 
                                            if (is_null($key->sensor_value[$a])) {
                                                $key->sensor_value[$a] = 0;
                                            }
                                            echo "<td>".$key->sensor_value[$a]."</td>";
                                        }
                                        $dateee = $key->tanggal." ".$key->waktu;
                                      echo "<td>".($dateee)."</td>";
                                      echo "</tr>";
                                      $num+=1;
                                    }
                                   ?>

                                </tbody>
                            </table>
                        </div>
                        <div class="card-body">
                            <?php 
                             $db = $con->TugasAkhir;
                                    $collection = $db->testaja;

                                    $filter = ['id' => $key->id ];
                                    $options = ['sort' => ['waktu' => 1 , 'tanggal' => 1 ]];
                                    $datas=$collection->find($filter,$options);
                                    foreach ($datas as $keys[] ){};
                                    $banyak = count($keys) ;
                                    $max =  strtotime($keys[$banyak]->tanggal." ".$keys[$banyak]->waktu);
                                    $min =  strtotime($keys[0]->tanggal." ".$keys[0]->waktu);
                                    $timeinterval = 20;
                                    $counter = floor(($max- $min) / $timeinterval);
                                    // echo ($counter +1)."<br>";
                                    $top = $min + $timeinterval* $counter;
                                    $count = 0;
                                    for ($ib=0; $ib < $coun ; $ib++) { 
                                        $temp[$ib][0]=0;
                                        $penampung[$ib][0]=0; 
                                        $hasilFinal[$ib][0]=0;
                                    }
                                    $tanggalwaktu=[];
                                    $bot = 0;
                                    $cont = 0;
                                    $bdata = 0;
                                    $rata2 = 0;
                                    for ($abc=0; $abc < $banyak ; $abc++) { 
                                        $date = strtotime($keys[$abc]->tanggal." ".$keys[$abc]->waktu);
                                        if($date >= ($min + $bot *$timeinterval) && $date <($min + ($bot+1) *$timeinterval) ){
                                            for ($hahac=0; $hahac < $coun; $hahac++) { 
                                                 $penampung[$hahac][$bdata] = $keys[$abc]->sensor_value[$hahac] + $penampung[$hahac][$bdata];
                                            }
                                            $rata2 ++;
                                        }
                                        else{
                                            for ($arrsensor=0; $arrsensor < $coun; $arrsensor++) { 
                                                // echo " _".$rata2."--";
                                                $temp[$arrsensor][$cont] = $penampung[$arrsensor][$bdata];
                                                // echo  "hasil= ".$temp[$arrsensor][$cont]. " - ok __ ";
                                                $hasilFinal[$arrsensor][$cont] = $temp[$arrsensor][$cont] /$rata2;
                                                if(is_null($hasilFinal[$arrsensor][$cont])){
                                                    $hasilFinal[$arrsensor][$cont] =0;
                                                }
                                                // echo "hasil rata-rata = ".$hasilFinal[$arrsensor][$cont]."<br>" ;    
                                            }
                                            $tanggalwaktu[$cont] = $min + $bot *$timeinterval;
                                            if (is_null($tanggalwaktu[$cont])) {
                                                $tanggalwaktu[$cont] = $tanggalwaktu[$cont-1];
                                            }
                                            // echo "tnggal = ".$tanggalwaktu[$cont]."<br>" ;
                                            // echo "<br> sec <br>";
                                            $cont ++;
                                            $bot++;
                                            $bdata++;
                                            $rata2 = 0;      
                                        }
                                    }
                                    // echo "shjkl;";
                                    for ($jaha=0; $jaha < $coun ; $jaha++) { 
                                        $temp[$jaha][$cont] = $penampung[$jaha][$bdata];
                                        $hasilFinal[$jaha][$cont] = $temp[$jaha][$cont] /$rata2;
                                        if(is_null($hasilFinal[$arrsensor][$cont])){
                                           $hasilFinal[$arrsensor][$cont] =0;
                                        }
                                     
                                    }
                                    $tanggalwaktu[$cont] = $min + $bot *$timeinterval;
                                    if (is_null($tanggalwaktu[$cont])) {
                                                $tanggalwaktu[$cont] = $tanggalwaktu[$cont-1];
                                            }
                                    $db = $con->TugasAkhir;
                                    $collection123 = $db->informasiperangkat;
                                    $options = [];
                                    $filter = ['id' => $id];
                                    $datas=$collection123->findOne($filter,$options);
                                    // echo " ".$datas->agent;
                                    // echo "  <br>";
                                    for ($arrsensor=0; $arrsensor < $coun; $arrsensor++) { 
                                                $temp[$arrsensor][$cont] = $penampung[$arrsensor][$bdata];
                                                // echo  "hasil= ".$temp[$arrsensor][$cont]. " - ok __ ";
                                                $hasilFinal[$arrsensor][$cont] = $temp[$arrsensor][$cont] /$rata2;
                                                // echo "hasil rata-rata  ".$datas->desc_sensor[$arrsensor]." = ".$hasilFinal[$arrsensor][$cont]."<br>" ;
                                                // echo "hasil rata-rata  ".$datas->desc_sensor[$arrsensor]." = ".$hasilFinal[0][0]."<br>" ;
                                                $tanggalwaktu[$cont] = $min + $bot *$timeinterval;
                                            }
                                    // echo "banyak interval =".($cont+1)."<br>";
                             ?>
                             <?php  
                             // echo "hasil rata-rata  ".$datas->desc_sensor[0]." = ".$hasilFinal[0][$cont]."<br>" ;
                                                 ?>
                
                            <div id="line_top_x"></div>
                        </div>
                    </div>


                    <br>
  
                    <?php }else{?>
                        <br/>
                        <center>
                        <div class="alert alert-info">
                            <h3> IoT Monitoring Control System</h3>
                            <hr/>
                            <p><a href="../login.php">Login Disini</a></p>
                        </div>
                        </center>
                    <?php }?>
			    </div>
			</div>
		</div>

        <script>
            $('#mytable').dataTable();
            $('#mytable1').dataTable();

        </script>
        <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
      google.charts.load('current', {'packages':['line']});
      google.charts.setOnLoadCallback(drawChart);

    function drawChart() {

      var data = new google.visualization.DataTable();

      data.addColumn('string', 'tanggal');
      <?php     
        for ($kl=0; $kl <count($datas->sensor_value) ; $kl++) { 
            echo "data.addColumn('number', '".$datas->desc_sensor[$kl]."');";
        }

       ?>

      data.addRows([
                <?php 
                for ($i=0; $i <=$cont ; $i++) { 
                    echo "['".date('Y-m-d H:i:s',$tanggalwaktu[$i])."', ";
                        for ($j=0; $j < $coun; $j++) {
                                if(is_null($hasilFinal[$j][$i])){
                                    $hasilFinal[$j][$i] = 0;
                                } 
                            echo $hasilFinal[$j][$i].", ";
                        }
                echo "],";
            } 
            ?>
      ]);

      var options = {
        chart: {
          title: <?php echo "'".$datas->agent."'" ?>
        },
        width: 900,
        height: 500,
        axes: {
          x: {
            0: {side: 'side '}
          }
        }
      };

      var chart = new google.charts.Line(document.getElementById('line_top_x'));

      chart.draw(data, google.charts.Line.convertOptions(options));
    }
  </script>

	</body>
</html>
<!-- <?php 
                for ($i=0; $i <=$cont ; $i++) { 
                    echo "['".date('Y-m-d H:i:s',$tanggalwaktu[$i])."', ";
                        for ($j=0; $j < $coun; $j++) { 
                            echo $hasilFinal[$j][$i].", ";
                        }
                echo "],";
            } 
            ?>

 -->







            