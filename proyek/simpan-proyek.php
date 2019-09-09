<?php

$conn_string = "host=localhost port=5433 dbname=pkl user=postgres password=student";

$connection = pg_connect($conn_string); 


$id_proyek = $_POST['id_proyek'];
$eselon = $_POST['eselon'];
$ea_ia = $_POST['ea_ia'];
$proyek = $_POST['proyek'];
$judul_proyek = $_POST['judul_proyek'];
$mitra = $_POST['mitra'];
$jangka_waktu_tahun = $_POST['jangka_waktu_tahun'];
$mulai_proyek = $_POST['mulai_proyek'];
$akhir_proyek = $_POST['akhir_proyek'];
$nomor_register = $_POST['nomor_register'];
$mekanisme_proyek = $_POST['mekanisme_proyek'];
$nilai_original_curencies = $_POST['nilai_original_curencies'];
$nilai_usd = $_POST['nilai_usd'];
$keterangan = $_POST['keterangan'];
$jenis_kerjasama = $_POST['jenis_kerjasama'];
$tema_proyek = $_POST['tema_proyek'];
$nama_lokasi_proyek=$_POST['demo3'];





$jumlah = count($nama_lokasi_proyek);
for($i=0; $i < $jumlah; $i++)
{
    $nim=$_POST["demo3"][$i];
    $is =pg_query("SELECT id_lokasi from lokasi_point WHERE nama_lokasi_proyek='$nim' ");
    $is1 =pg_fetch_array($is);
    $is2 = $is1['id_lokasi'];

    $q=pg_query("INSERT INTO proyek_lokasi (id_proyek, nama_lokasi_proyek, id_lokasi) values ('$id_proyek','$nim','$is2')");
}

$sql =  pg_query("INSERT INTO proyek (id_proyek, eselon, ea_ia, proyek, judul_proyek, mitra, jangka_waktu_tahun, mulai_proyek, akhir_proyek,
			nomor_register, mekanisme_proyek, nilai_original_curencies, nilai_usd, keterangan, jenis_kerjasama, tema_proyek) VALUES('$id_proyek','$eselon','$ea_ia','$proyek','$judul_proyek','$mitra', '$jangka_waktu_tahun','$mulai_proyek', '$akhir_proyek', '$nomor_register', '$mekanisme_proyek', '$nilai_original_curencies', '$nilai_usd', '$keterangan', '$jenis_kerjasama', '$tema_proyek')");



if((!$sql) && (!$q))
    {	
    	echo '<br>';
    	echo '<br>';
    	echo '<div class="panel panel-danger">';
                            echo "<div class='panel-heading'>";
                                echo "Error $sql";
                            echo "</div>"; 				
                   echo "</div>";}
else
    		{

                echo '<br>';
    			echo '<br>';
    			echo '<div class="panel panel-success">';
                            echo "<div class='panel-heading'>";
                                echo "<b>Data Proyek Berhasil Disimpan</b>";
                            echo "</div>"; 				
                   echo "</div>";}
                  
?>
