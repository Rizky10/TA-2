<?php 
	if(!empty($_SESSION)){ }else{ session_start(); }
	if(!empty($_SESSION['ADMIN'])){ }else{ header('location:login.php'); }
  	require 'proses/panggil.php';
  	include_once 'conf.php';	

  	$pin = $_GET['pin'];
  	$ip  = $_GET['ip'];
  	$str = $ip;
  	$id = $_GET['id'];
  	$arr = "/";
  	

  	for ($i=0; $i < $pin ; $i++) { 
  		$str = $str.$arr.$_GET['pinnum'.$i].$arr.$_GET['status'.$i].$arr;	
  	}
  	header('Location: testurl.php?url='.$str.'&id='.$id);
  	// urlmaker.php?ip=192.0.0.1&pin=1&pinnum0=5&status0=on


 ?>