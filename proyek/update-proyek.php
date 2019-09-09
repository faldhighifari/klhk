<?php

$conn_string = "host=localhost port=5433 dbname=pkl user=postgres password=student";

$connection = pg_connect($conn_string);

$id    = $_GET['id'];
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

 
 $sql =  pg_query("UPDATE proyek SET 
			eselon = '$eselon',
			ea_ia = '$ea_ia',
			proyek = '$proyek',
			judul_proyek = '$judul_proyek',
			mitra = '$mitra',
			jangka_waktu_tahun = '$jangka_waktu_tahun',
			mulai_proyek = '$mulai_proyek',
			akhir_proyek = '$akhir_proyek',
			nomor_register = '$nomor_register',
			mekanisme_proyek = '$mekanisme_proyek',
			nilai_original_curencies = '$nilai_original_curencies',
			nilai_usd = '$nilai_usd',
			keterangan = '$keterangan',
			jenis_kerjasama = '$jenis_kerjasama',
			tema_proyek = '$tema_proyek'
			WHERE id_proyek = '$id' ");

if(!$sql)
    {	echo '<br>';
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
                                echo "<b>Data Proyek Berhasil Diupdate</b>";
                            echo "</div>"; 				
                   echo "</div>";}
                  
                
                        
?>


