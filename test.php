<?php
include_once 'conf.php';

$db = $con->TugasAkhir;
$collection = $db->informasiperangkat;
$collectionData = $db->dataperangkat;
$filter = ['id' =>$_POST['hiddens']];
$options = [];
$datas=$collection->findOne($filter,$options);
$key = $datas;
$tempArray = $key->status;

$status[] = $key->status; 
$hapus = $collection->deleteOne(['id' => $_POST['hiddens']]);
$count = $_POST['pin'];
$tempArray[$count]="active";
$pin_sensor = array();
$pin_aktuator = array();
$desc_sensor = array();
$nilai_sensor = array(); 
$id =$_POST['hiddens'];
$ip = $_POST['ip'];
$ipcontroller = $_POST['ipcon'];
$agent = $_POST['name'];
$tipe = $_POST['tipe'];
for ($i=0; $i < $count ; $i++) {
  $str_desc     = 'desc'.$i;
  $str_sensor   = 'sensor'.$i;
  $str_nilai    = 'nilai'.$i;
  $str_actuator = 'actuator'.$i;
  $str_state    = 'state'.$i;
  $str_satuan   = 'satuan'.$i;
  $satuan[]     = $_POST[$str_satuan];
  $state[]      = $_POST[$str_state];
  $pin_sensor[] = $_POST[$str_sensor];
  $pin_aktuator[] = $_POST[$str_actuator];
  $desc_sensor[] = $_POST[$str_desc];
  $nilai_sensor[] = $_POST[$str_nilai];
}
$final = array(
  "id" => $id,
  "agent_ip" => $ip,
  "controller_ip" => $ipcontroller,
  "agent" => $agent,
  "sensor_pin" => $pin_sensor,
  "sensor_value" => $nilai_sensor,
  "actuator_pin" => $pin_aktuator,
  "desc_sensor" => $desc_sensor,
  "state"       => $state,
  "status" => $tempArray,
  "satuan" => $satuan,
  "tipe" => $tipe
);
$ok = $collection->insertOne($final);
echo $count;
header('Location: http://localhost/TA/TA/');

 ?>
