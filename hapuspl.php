<?php
$conn_string = "host=localhost port=5433 dbname=pkl user=postgres password=student";

$connection = pg_connect($conn_string);


$delk = $_POST['idk'];
$delm = $_POST['idm'];

$query = pg_query("DELETE FROM proyek_lokasi where id_proyek='$delk' AND id_lokasi='$delm' ");

if(!$query)
    {	
    	echo '<br>';
    	echo '<br>';
    	echo '<div class="panel panel-danger">';
                            echo "<div class='panel-heading'>";
                                echo "Error $query";
                            echo "</div>"; 				
                   echo "</div>";}
else
    		{

                echo '<br>';
    			echo '<br>';
    			echo '<div class="panel panel-success">';
                            echo "<div class='panel-heading'>";
                                echo "<b>Data Berhasil Dihapus</b>";
                            echo "</div>"; 				
                   echo "</div>";}
                  
?>