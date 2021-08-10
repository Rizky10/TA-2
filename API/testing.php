<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

require '../vendor/autoload.php';

$data = json_decode(file_get_contents("php://input"));

$con = new MongoDB\Client("mongodb://localhost:27017");
$db = $con->jaja;
$collection = $db->haha;
if($collection->insertOne($data)){
  echo "ok";
} else {
  echo "nope";
}

?>
