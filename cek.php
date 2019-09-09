<?php
$conn_string = "host=localhost port=5433 dbname=pkl user=postgres password=student";

$connection = pg_connect($conn_string);




$nilai = $_GET['nilai'];

    $nama_lokasi_proyek = $_POST["nama_lokasi_proyek"];

    $jumlah = count($_POST["nama_lokasi_proyek"]);
for($i=0; $i < $jumlah; $i++)
{
    $nim=$_POST["nama_lokasi_proyek"][$i];
    $is =pg_query("SELECT id_lokasi from lokasi_point WHERE nama_lokasi_proyek='$nim' ");
    $is1 =pg_fetch_array($is);
    $is2 = $is1['id_lokasi'];

    $q=pg_query("INSERT into proyek_lokasi (id_proyek, nama_lokasi_proyek, id_lokasi) values('$nilai','$nim','$is2')");
}
if ($q){
   echo "<script>;location.href='index_proyek.php';alert('Data Berhasil Ditambah') </script>";
  }
  else
  {
   echo"Data Gagal Disimpan";
  }



?>