<?php

$conn_string = "host=localhost port=5433 dbname=pkl user=postgres password=student";

$connection = pg_connect($conn_string); 

$nama_lokasi_proyek  = $_POST['nama_lokasi_proyek'];
$longitude = $_POST['longitude'];
$latitude = $_POST['latitude'];

$sql =  pg_query("INSERT INTO lokasi_point (nama_lokasi_proyek, longitude, latitude) VALUES('$nama_lokasi_proyek','$longitude','$latitude')");


if(!$sql)
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
                                echo "<b>Data Lokasi Berhasil Disimpan</b>";
                            echo "</div>"; 				
                   echo "</div>";}
                  
                
                        ?>