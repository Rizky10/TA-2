<?php 
    // persiapkan curl
    $ch = curl_init(); 
    $url = $_GET['url'];
    $id = $_GET['id'];
    // set url 
    curl_setopt($ch, CURLOPT_URL, $url);

    // return the transfer as a string 
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1); 

    // $output contains the output string 
    $output = curl_exec($ch); 

    // tutup curl 
    curl_close($ch);      

    // menampilkan hasil curl
    // echo $output;
    header('Location: show/manual.php?id='.$id);
?>