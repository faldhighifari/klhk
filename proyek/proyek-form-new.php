<?php
$conn_string = "host=localhost port=5433 dbname=pkl user=postgres password=student";

$connection = pg_connect($conn_string);

$result= pg_query("SELECT * FROM proyek");

?>

<script src="libs/jquery.min.js"></script>
        <script src="libs/multiple-select.js"></script>
        <link rel="stylesheet" href="libs/multiple-select.css"/>
        <script>
            $(document).ready(function(){
                $('#demo3').multipleSelect({
                    placeholder: "Pilih Lokasi Proyek",
                    filter:true
                });
            });
        </script>
<h3>Form Proyek</h3>
<hr>

<form action="simpan-proyek.php" method="POST">	
<div class="panel panel-info">
                            <div class='panel-heading'>
                                <b>Masukkan ID_Proyek saat ini yaitu :</b>
                    
	<?php
		$as=pg_query("select id_proyek from proyek order by id_proyek DESC LIMIT 1");
		$pg = pg_fetch_array($as);
		$pg1 = $pg['id_proyek'];
		echo $pg1+1;

	?>
       </div> 				
                  </div>
	
	<div class="form-group">
      <label for="id_proyek"><font color="black"> ID_Proyek :</font></label> 
      <input type="text1" class="form-control" id="id_proyek" name="id_proyek" placeholder="Lihat Keterangan untuk ID_Proyek"> 
    </div>
 
	<div class="form-group">
      <label for="eselon"><font color="black"> Eselon :</font></label> 
      <input type="text1" class="form-control" id="eselon" name="eselon" placeholder="Eselon"> 
    </div>

    <div class="form-group">
      <label for="ea_ia"><font color="black"> EA/IA:</font></label>
      <input type="text1" class="form-control" id="ea_ia" name="ea_ia" placeholder="EA/IA">  
    </div>

    <div class="form-group">
      <label for="proyek"><font color="black"> Proyek :</font></label>
      <input type="text1" class="form-control" id="proyek" name="proyek" placeholder="Proyek">
    </div>
	
	<div class="form-group">
      <label for="judul_proyek"><font color="black"> Judul Proyek :</font></label>
      <input type="text1" class="form-control" id="judul_proyek" name="judul_proyek" placeholder="Judul Proyek">
    </div>

    <div class="form-group">
      <label for="mitra"><font color="black"> Mitra :</font></label>
      <input type="text1" class="form-control" id="mitra" name="mitra" placeholder="Mitra">
      
    </div>

    <div class="form-group">
		<label for="jangka_waktu_tahun"><font color="black"> Jangka Waktu(tahun):</font></label>
     <select name="jangka_waktu_tahun" id="jangka_waktu_tahun" class="form-control">
      <option>1</option>
      <option>2</option>
      <option>3</option>
      <option>4</option>
      <option>5</option>
      <option>6</option>
      <option>7</option>
      <option>8</option>
      <option>9</option>
      <option>10</option>
     </select>
    </div>


    <div class="form-group">
      <label for="mulai_proyek"><font color="black"> Mulai Proyek:</font></label>
      <input type="date" class="form-control" id="mulai_proyek" name="mulai_proyek" placeholder="Tanggal/Bulan/Tahun">
    </div>

    
    <div class="form-group">
      <label for="akhir_proyek"><font color="black"> Akhir Proyek :</font></label>
      <input type="date" class="form-control" id="akhir_proyek" name="akhir_proyek" placeholder="Tanggal/Bulan/Tahun">
    </div>
	
	<div class="form-group">
      <label for="nomor_register"><font color="black"> Nomor Register :</font></label>
      <input type="text1" class="form-control" id="nomor_register" name="nomor_register" placeholder="Nomor Register">
    </div>
</div>



     <div class="form-group">
      <label for="mekanisme_proyek"><font color="black"> Mekanisme Proyek :</font></label>
      <input type="text1" class="form-control" id="mekanisme_proyek" name="mekanisme_proyek" placeholder="Mekanisme Proyek">
    </div>

    <div class="form-group">
      <label for="nilai_original_curencies"><font color="black"> Nilai(Original Curencies) :</font></label>
      <input type="text1" class="form-control" id="nilai_original_curencies" name="nilai_original_curencies" placeholder="example: US $ 100.000">
    </div>

    <div class="form-group">
      <label for="nilai_usd"><font color="black"> Nilai(USD) :</font></label>
      <input type="text1" class="form-control" id="nilai_usd" name="nilai_usd" placeholder="example: 100,000">
    </div>

	<div class="form-group">
		<label for="jenis_kerjasama"><font color="black"> Jenis Kerjasama :</font></label>
     <select name="jenis_kerjasama" id="jenis_kerjasama" class="form-control">
      <option>Bilateral</option>
	  <option>Multilateral</option>
	 </select>
	</div>
	
	<div class="form-group">
      <label for="tema"><font color="black"> Tema :</font></label>
      <input type="text1" class="form-control" id="tema_proyek" name="tema_proyek" placeholder="Tema">
    </div>
	
	<div class="form-group">
		<label for="nama_lokasi_proyek[]"><font color="black"> Pilih Lokasi Proyek :</font></label><br>
		<select id="demo3" name="nama_lokasi_proyek" id="nama_lokasi_proyek" multiple="multiple">
		<?php

		$sql= pg_query("SELECT distinct id_lokasi, nama_lokasi_proyek FROM lokasi_point ORDER BY nama_lokasi_proyek");
	$arrpropinsi = array();
	while ($row = pg_fetch_array($sql)) {
	$arrpropinsi [ $row['id_lokasi'] ] = $row['nama_lokasi_proyek'];
		}
			foreach($arrpropinsi as $id_lokasi=>$nama_lokasi_proyek) {
				echo "<option value='$nama_lokasi_proyek'>$nama_lokasi_proyek</option>";
			}
			?>
		</select>
	</div>

    <div class="form-group">
      <label for="keterangan"><font color="black"> Keterangan :</font></label>
      <textarea class="form-control" rows="4" name="keterangan" id="keterangan" placeholder="Keterangan"></textarea>
    </div>

    <div class="form-group">
        <a class="btn btn-primary" id="simpanButton" >Simpan</a>
    </div>
</form>