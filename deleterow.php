<?php
require 'vendor/autoload.php';
$con = new MongoDB\Client("mongodb://localhost:27017");
$db = $con->TugasAkhir;
$collection = $db->informasiperangkat;
$id= $_GET['id'];
$row= $_GET['row'];
$filter = ['id' => $id];

if (empty($_GET['tipe']== 'deact')) {
	$delSensorVal = $collection->updateMany( $filter, ['$unset' => ['sensor_pin.'.$row =>1]]);
	$delSensorVal2 = $collection->updateMany( $filter, ['$unset' => ['desc_sensor.'.$row =>1]]);
	$final = $collection->updateMany($filter, ['$pull' => ['sensor_pin' => null]]);
	$final3 = $collection->updateMany($filter, ['$pull' => ['desc_sensor' => null]]);
	if (empty($_GET['manual'])) {
		$delSensorVal1 = $collection->updateMany( $filter, ['$unset' => ['sensor_value.'.$row =>1]]);
		$delSensorVal2 = $collection->updateMany( $filter, ['$unset' => ['actuator_pin.'.$row =>1]]);
		$final1 = $collection->updateMany($filter, ['$pull' => ['sensor_value' => null]]);
		$final2= $collection->updateMany($filter, ['$pull' => ['actuator_pin' => null]]);
		header('Location: http://localhost/TA/TA/edit.php?id='.$id);
		} 
	else{
		header('Location: http://localhost/TA/TA/manualedit.php?id='.$id);
		}

}else{
	$check = $_GET['job'];
	if ($_GET['job'] == 'activ') {
		$options = ['$set' => ['status.'.$row => 'active']];
		header('Location: http://localhost/TA/TA/show/auto.php?id='.$id);
	}else{
		$options = ['$set' => ['status.'.$row => 'deactivate']];
		// echo "string";
		
		header('Location: http://localhost/TA/TA/show/auto.php?id='.$id);
	}
	$datas=$collection->updateOne($filter,$options);
}



 ?>
