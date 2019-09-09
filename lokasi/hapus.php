<?php

$conn_string = "host=localhost port=5433 dbname=pkl user=postgres password=student";

$connection = pg_connect($conn_string);

$id     = $_GET['id'];

$cek = pg_query("SELECT id_lokasi from proyek_lokasi where id_lokasi='$id' ");

		if(pg_num_rows($cek)>0)

					{  
					  echo '<br>';
				      echo '<br>';
				      echo '<div class="panel panel-danger">';
                            echo "<div class='panel-heading'>";
                                echo "Data Tidak Dapat Dihapus";
                            echo "</div>"; 				
                   echo "</div>";}

		else 		{ $sql    = pg_query("DELETE FROM lokasi_point WHERE id_lokasi='$id' ");

					  
					  echo '<br>';
				      echo '<br>';
				      echo '<div class="panel panel-success">';
                            echo "<div class='panel-heading'>";
                                echo "Data Lokasi Berhasil Dihapus";
                            echo "</div>"; 				
                   echo "</div>";}



?>
