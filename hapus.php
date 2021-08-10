<!-- <?php 
    $ip = "112:20:45062021";
    $data =array(2,3,4);
    $temp="";
    for($a = 0 ; $a <count($data);$a++){
    	$temp = $temp ."". (string)$data[$a];
    	if($a != count($data)-1){
    		$temp = $temp. ",";
    	}
    } 
	echo '"{"id":"'.$ip.'","sensor_value":['.$temp.']}"' ;
 ?> -->

 <?php 
 $sentence = "aku ini bisa";
 $stripped = str_replace(' ', '', $sentence);
 echo $stripped;
  ?>