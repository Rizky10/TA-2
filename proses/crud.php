<?php
    require 'panggil.php';
    include_once '../conf.php';
    $db = $con->TugasAkhir;
    $collection = $db->informasiperangkat;
    $collectionData = $db->dataperangkat;
    // proses tambah
    if(!empty($_GET['tampil'] == 'true')){
      $id = $_GET['id'];
      $filter = ['id' => $id];
      $options = [];
      $datas=$collection->find($filter,$options);
      foreach ($datas as $key ) {
        $tipe = $key->tipe;
        if ($tipe == 1) {
          header('Location: http://localhost/TA/TA/Show/Manual.php?id='.$id);
        }else {
          header('Location: http://localhost/TA/TA/Show/Auto.php?id='.$id);
        }
      }

    }
    if(!empty($_GET['aksi'] == 'hello')){
      $count = $_POST['pin'];
      $pin_sensor = array();
      $pin_aktuator = array();
      $desc_sensor = array();
      $nilai_sensor = array();
      $id = $collection->count().''.date("h:i:smY");
      $ip = $_POST['ip'];
      $agent = $_POST['name'];
      $tipe = $_POST['tipe'];
      $ipcon= $_POST['ipcon'];
      for ($i=1; $i <= $count ; $i++) {
        $str_desc       = 'desc'.$i;
        $str_sensor     = 'sensor'.$i;
        $str_nilai      = 'nilai'.$i;
        $str_actuator   = 'actuator'.$i;
        $str_state      = 'state'.$i;
        $str_satuan     = 'satuan'.$i; 
        $satuan[]       = $_POST[$str_satuan];
        $state[]        = $_POST[$str_state];
        $pin_sensor[]   = $_POST[$str_sensor];
        $pin_aktuator[] = $_POST[$str_actuator];
        $desc_sensor[]  = $_POST[$str_desc];
        $nilai_sensor[] = $_POST[$str_nilai];
        $status[] = 'active';
      }
      $final = array(
        "id"            => $id,
        "agent_ip"      => $ip,
        "controller_ip" => $ipcon, 
        "agent"         => $agent,
        "sensor_pin"    => $pin_sensor,
        "sensor_value"  => $nilai_sensor,
        "actuator_pin"  => $pin_aktuator,
        "desc_sensor"   => $desc_sensor,
        "state"         => $state,
        "status"        => $status,
        "satuan"        => $satuan,
        "tipe"          => $tipe
      );
      if($collection->insertOne($final)){
        header('Location: http://localhost/TA/TA/');
      } else {
        echo "nope";
      }
    }
    if(!empty($_GET['aksi'] == 'helloworld')){
      $count = $_POST['pin'];
      $pin_sensor = array();
      $pin_aktuator = array();
      $desc_sensor = array();
      $status = array();
      $id = $collection->count().''.date("h:i:sdmY");
      $ip = $_POST['ip'];
      $agent = $_POST['name'];
      $tipe = $_POST['tipe'];
      for ($i=1; $i <= $count ; $i++) {
        $str_desc     = 'desc'.$i;
        $str_sensor   = 'sensor'.$i;
        $pin_sensor[] = $_POST[$str_sensor];
        $desc_sensor[] = $_POST[$str_desc];
        $status[] = "mati";
      }
      $final = array(
        "id" => $id,
        "agent_ip" => $ip,
        "agent" => $agent,
        "sensor_pin" => $pin_sensor,
        "desc_sensor" => $desc_sensor,
        "status" => $status,
        "tipe" => $tipe
      );
      if($collection->insertOne($final)){
        header('Location: http://localhost/TA/TA/');
      } else {
        echo "nope";
      }
    }

    if(!empty($_GET['hapus'] == 'true')){
      $id = $_GET['id'];
      if ($collection->deleteOne(['id' => $id])) {
        header('Location: http://localhost/TA/TA/');

      }
      else {
        echo "fail";
      }
    }


    if(!empty($_GET['aksi'] == 'tambah'))
    {
        $nama = strip_tags($_POST['nama']);
        $telepon = strip_tags($_POST['telepon']);
        $email = strip_tags($_POST['email']);
        $alamat = strip_tags($_POST['alamat']);
        $user = strip_tags($_POST['user']);
        $pass = strip_tags($_POST['pass']);

        $tabel = 'tbl_user';
        # proses insert
        $data[] = array(
            'username'		=>$user,
            'password'		=>md5($pass),
            'nama_pengguna'	=>$nama,
            'telepon'		=>$telepon,
            'email'			=>$email,
            'alamat'		=>$alamat
        );
        $proses->tambah_data($tabel,$data);
        echo '<script>alert("Tambah Data Berhasil");window.location="../index.php"</script>';
    }

    // proses edit
	if(!empty($_GET['aksi'] == 'edit'))
	{
		$nama = strip_tags($_POST['nama']);
		$telepon = strip_tags($_POST['telepon']);
		$email = strip_tags($_POST['email']);
		$alamat = strip_tags($_POST['alamat']);
		$user = strip_tags($_POST['user']);
		$pass = strip_tags($_POST['pass']);

        // jika password tidak diisi
        if($pass == '')
        {
            $data = array(
                'username'		=>$user,
                'nama_pengguna'	=>$nama,
                'telepon'		=>$telepon,
                'email'			=>$email,
                'alamat'		=>$alamat
            );
        }else{

            $data = array(
                'username'		=>$user,
                'password'		=>md5($pass),
                'nama_pengguna'	=>$nama,
                'telepon'		=>$telepon,
                'email'			=>$email,
                'alamat'		=>$alamat
            );
        }
        $tabel = 'tbl_user';
        $where = 'id_login';
        $id = strip_tags($_POST['id_login']);
        $proses->edit_data($tabel,$data,$where,$id);
        echo '<script>alert("Edit Data Berhasil");window.location="../index.php"</script>';
    }

    // hapus data
    if(!empty($_GET['aksi'] == 'hapus'))
    {
        $tabel = 'tbl_user';
        $where = 'id_login';
        $id = strip_tags($_GET['hapusid']);
        $proses->hapus_data($tabel,$where,$id);
        echo '<script>alert("Hapus Data Berhasil");window.location="../index.php"</script>';
    }

    // login
    if(!empty($_GET['aksi'] == 'login'))
    {
        // validasi text untuk filter karakter khusus dengan fungsi strip_tags()
        $user = strip_tags($_POST['user']);
        $pass = strip_tags($_POST['pass']);
        // panggil fungsi proses_login() yang ada di class prosesCrud()
        $result = $proses->proses_login($user,$pass);
        if($result == 'gagal')
        {
            echo "<script>window.location='../login.php?get=gagal';</script>";
        }else{
            // status yang diberikan
            session_start();
            $_SESSION['ADMIN'] = $result;
            // status yang diberikan
            echo "<script>window.location='../index.php';</script>";
        }
    }

    if(!empty($_GET['edit'] == 'man')){
      $id = $_GET['id'];
      echo "$id";
    }


?>
