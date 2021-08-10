<?php
    // session start
    if(!empty($_SESSION)){ }else{ session_start(); }
    require '../proses/panggil.php';
    include_once '../conf.php';
    $db = $con->TugasAkhir;
    $collection = $db->informasiperangkat;
    $collectionData = $db->dataperangkat;
    $id = $_GET['id'];
    $filter = ['id' => $id];
    $options = [];
    $datas=$collection->findOne($filter,$options);
    $count = count($datas->sensor_pin);
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
        <style>
            .dotgreen {
              height: 10px;
              width: 10px;
              background-color: #00ff00;
              border-radius: 50%;
              display: inline-block;
            }
            .dotred {
              height: 10px;
              width: 10px;
              background-color: red;
              border-radius: 50%;
              display: inline-block;
            }
        </style>
    </head>
    <body style="background:#586df5;">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">

                    <?php if(!empty($_SESSION['ADMIN'])){?>
                    <br/>
                 <!--    <span style="color:#fff";>Selamat Datang, <?php echo $sesi['username'];?></span> -->
                    <a href="../logout.php" class="btn btn-danger btn-md float-right"><span class="fa fa-sign-out"></span> Logout</a>
                    
                    <a href="../" class="btn btn-success btn-md"><span class="fa "></span>Home</a>
                    <br/><br/>
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Nama Agent: <?php echo $datas->agent; ?></h4>
                            <h6 class="card-title"><?php echo $datas->agent_ip; ?></h6>
                        </div>
                        <div class="card-body">
                            <table class="table table-hover table-bordered" id="mytable1" style="margin-top: 10px">
                                <thead>
                                    <tr>
                                        <th width="50px">No</th>
                                        <th width="250px">Nama Alat</th>
                                        <th>Status</th>
                                        <th style="text-align: center;">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                  <?php for ($i=0; $i < $count; $i++) {
                                    echo "<tr>";
                                    echo "<td>".$i+1;
                                    echo "</td>";
                                    echo "<td>".$datas->desc_sensor[$i];
                                    echo "</td>";
                                    if ($datas->status[$i] =="mati") {
                                        echo "<td> <span class='dotred'></span> ".$datas->status[$i];
                                    }else{
                                    echo "<td> <span class='dotgreen'></span> ".$datas->status[$i];
                                    }
                                    // echo "<td> <span class='dotgreen'></span>".$datas->status[$i];
                                    echo "</td>";
                                    echo "<td> <a href= '../proses/control.php?id=".$id."&command=Hidup&ip=".$datas->agent_ip."&pin=".$datas->sensor_pin[$i]."&id=".$id."&index=".$i."' >Hidup | </a><a href= '../proses/control.php?id=".$id."&command=Mati&ip=".$datas->agent_ip."&pin=".$datas->sensor_pin[$i]."&id=".$id."&index=".$i."' >Mati</a></td>";
                                    echo "</tr>";
                                  } ?>

                                </tbody>
                            </table>
                        </div>
                    </div>
                    <br>

                    <?php }else{?>
                        <br/>
                        <center>
                        <div class="alert alert-info">
                            <h3> IoT Monitoring Control System</h3>
                            <hr/>
                            <p><a href="login.php">Login Disini</a></p>
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
    </body>
</html>
