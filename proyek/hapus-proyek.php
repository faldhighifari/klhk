<?php

$conn_string = "host=localhost port=5433 dbname=pkl user=postgres password=student";

$connection = pg_connect($conn_string);

$id     = $_GET['id'];


$sql1   = pg_query("DELETE FROM proyek WHERE id_proyek='$id' ");
$sql2    = pg_query("DELETE FROM proyek_lokasi WHERE id_proyek='$id' ");


if((!$sql1) && (!$sql2))
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
                                echo "<b>Data Proyek Berhasil Dihapus</b>";
                            echo "</div>"; 				
                   echo "</div>";}
                  
?>
