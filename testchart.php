<!-- <?php 

$time = array(
	1,2,3,4,5,
	1,2,3,4,5,
	1,2,3,4,5,
	1,2,3,4,5, 
	1,2,3,4,5
);
$totaldata = count($time) / 5;
$loop =  floor($totaldata);
$mac = $loop * 5 ;
$temp = 0;
$count = 0;
$arr = array();
for ($a=1; $a < count($time)+1 ; $a++) { 
	$temp = $temp + $time[$a-1];
	if($a %5 ==0 ){
		$arr[$count] = $temp;
		$temp = 0;
		$count = $count+1;
	}
}
$temp = 0;
if(count($time) % 5 != 0){
	for ($i=$mac ; $i <count($time) ; $i++) { 
		$temp = $temp + $time[$i]; 
	}
	$arr[$count] =$temp;
}
	
for ($a=0; $a < count($arr) ; $a++) { 
	echo $arr[$a];
	echo "\n";
}

 ?> -->


<!-- ($min + $a *$menit) && $data[$b] <=($min + ($a+1) *$menit) -->


<!--  <?php 
 $menit = 5;
 $data = array(
 	10,11,
 	16,19,
 	21,24,
 	26,
 	32,32
 );
 $max = max($data);
 $min = min($data);
 $counter = floor(($max- $min) / $menit) ;
 $top = $min + $menit* $counter;

 $penampung = [];
 $count = 0;
 $temp = 0;
 $bot = 0;
 $bdata = 0;
 	for ($b=0; $b < count($data); $b++) { 
 		// echo $data[$b]."<br>";
 		if($data[$b] >= ($min + $bot *$menit) && $data[$b] <($min + ($bot+1) *$menit) ){
 		// echo $data[$b]."<br> ";
 		// echo "min = ".$min + $bot *$menit." ".$data[$b]." max =".($min + ($bot+1) *$menit)."<br>" ;
 		 // echo $data[$b]."<br>";
 		 $temp = $temp +$data[$b];
 		 $bdata =$bdata+1;

 		}
 		else{ 
 			echo $bdata."-";
 			$bdata = 0;
 			$penampung[$count]  = $temp;
 			$tep=0;
 			$count = $count+1;
 			$temp = 0;
 			// echo $data[$b]."gabiosaa";
 			$bot = $bot+1;
 			$b =$b - 1;
 			// echo "<br>"; 			
 		}

 	}
 	$count;

 	$penampung[$count]  = $temp;

 	echo $bdata;

 	for ($i=0; $i <count($penampung) ; $i++) { 
 		echo "<br>$penampung[$i] ";
 	}
  ?> -->

  <?php 
  	$date = array(
		strtotime('2012-03-27 00:01:00'),
		strtotime('2012-03-27 00:10:00'),
		strtotime('2012-03-27 00:14:00'),

		strtotime('2012-03-27 00:20:00'),
		strtotime('2012-03-27 00:21:00'),
		strtotime('2012-03-27 00:22:00'),
		strtotime('2012-03-27 00:23:00')
   	);
   	$data = array(
   		1,2,4,5,6,8,9
   	);
   	$menit = 300;
   	$max = max($date);
 	$min = min($date);
 	$counter = floor(($max- $min) / $menit) ;
 	$top = $min + $menit* $counter;
 	echo $counter +1;
 
	$penampung = [];
	$count = 0;
	$temp = 0;
	$bot = 0;
	$bdata = 0;


	for ($b=0; $b < count($data); $b++) { 
 		if($date[$b] >= ($min + $bot *$menit) && $date[$b] <($min + ($bot+1) *$menit) ){
 		 $temp = $temp +$data[$b];
 		 // $bdata =$bdata+1;

 		}
 		else{ 
 			$bdata = 0;
 			$penampung[$count]  = $temp;
 			echo $count;
 			$tep=0;
 			$count = $count+1;
 			$temp = 0;
 			$bot = $bot+1;
 			$b =$b - 1;
 		}

 	}
 	$penampung[$count]  = $temp;
 	for ($i=0; $i <count($penampung) ; $i++) { 
 		echo "<br>$penampung[$i] ";
 	}
   ?>