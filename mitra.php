<?php
$conn_string = "host=localhost port=5433 dbname=pkl user=postgres password=student";

$connection = pg_connect($conn_string);


		if(isset($_GET['tema'])){
			$tema = $_GET['tema'];
			if($tema=='tema')
					{ 	$kerjasama1 = pg_query("SELECT distinct jenis_kerjasama FROM proyek ORDER BY jenis_kerjasama");
						echo "<option value='kerjasama'>-- Pilih Kerjasama --</option>";
             		 			while($p=pg_fetch_array($kerjasama1)){
		             				 echo "<option value=\"$p[jenis_kerjasama]\">$p[jenis_kerjasama]</option>\n";
		              				}
          			}
			else 	
					{	$kerjasama1 = pg_query("SELECT distinct jenis_kerjasama FROM proyek WHERE tema_proyek='$tema' order by jenis_kerjasama");
						echo "<option value='kerjasama'>-- Pilih Kerjasama --</option>";
								while($k = pg_fetch_array($kerjasama1)){
    								echo "<option value=\"".$k['jenis_kerjasama']."\">".$k['jenis_kerjasama']."</option>\n";
									}
					}

		}
		else if(isset($_GET['kerjasama'])){
			$kerjasama = $_GET['kerjasama'];
			if($kerjasama=='kerjasama')
					{ 	$mitra1 = pg_query("SELECT distinct mitra FROM proyek ORDER BY mitra");
						echo "<option value='mitra'>-- Pilih Mitra --</option>";
             		 			while($p=pg_fetch_array($mitra1)){
		             				 echo "<option value=\"$p[mitra]\">$p[mitra]</option>\n";
		              				}
          			}
          
			else 	
					{	$mitra1 = pg_query("SELECT distinct mitra FROM proyek WHERE jenis_kerjasama='$kerjasama' order by mitra");
						echo "<option value='mitra'>-- Pilih Mitra --</option>";
								while($k = pg_fetch_array($mitra1)){
    								echo "<option value=\"".$k['mitra']."\">".$k['mitra']."</option>\n";
									}
					}

		}
		else if(isset($_GET['mitra'])){
			$mitra = $_GET['mitra'];
			if($mitra=='mitra')
					{ 	$lokasi1 = pg_query("SELECT nama_lokasi_proyek FROM lokasi_point ORDER BY nama_lokasi_proyek");
						echo "<option value='lokasi'>-- Pilih Lokasi --</option>";
              					while($p=pg_fetch_array($lokasi1)){
               						echo "<option value=\"".$p['nama_lokasi_proyek']."\">".$p['nama_lokasi_proyek']."</option>\n";
              						}
          			}
			else
					{	$lokasi1 = pg_query("SELECT distinct nama_lokasi_proyek FROM proyek INNER JOIN proyek_lokasi ON proyek.id_proyek = proyek_lokasi.id_proyek Where mitra= '$mitra' order by nama_lokasi_proyek");
						echo "<option value='lokasi'>-- Pilih Lokasi --</option>";
								while($k= pg_fetch_array($lokasi1)){
    								echo "<option value=\"".$k['nama_lokasi_proyek']."\">".$k['nama_lokasi_proyek']."</option>\n";
									}
					}
		}

?>