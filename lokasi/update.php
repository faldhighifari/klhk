<?php

$conn_string = "host=localhost port=5433 dbname=pkl user=postgres password=student";

$connection = pg_connect($conn_string);

$id    = $_GET['id'];
$nama_lokasi_proyek  = $_POST['nama_lokasi_proyek'];
$longitude = $_POST['longitude'];
$latitude = $_POST['latitude'];

 
 $sql =  pg_query("UPDATE lokasi_point SET nama_lokasi_proyek='$nama_lokasi_proyek', longitude='$longitude', latitude='$latitude' WHERE id_lokasi='$id' ");

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
                                echo "<b>Data Lokasi Berhasil Diupdate</b>";
                            echo "</div>"; 				
                   echo "</div>";}
                  
                
                        ?>

