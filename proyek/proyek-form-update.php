<?php

$conn_string = "host=localhost port=5433 dbname=pkl user=postgres password=student";

$connection = pg_connect($conn_string);

$id    = $_GET['id'];


$koor= pg_query("SELECT * FROM proyek WHERE id_proyek='$id' ");


$ko= pg_fetch_assoc($koor);

?>

<h3>Form Update Proyek</h3>
<hr>
<form action="proyek/update-proyek.php?id=<?php echo $id ?>" method="POST">
	
	<div class="form-group">
		<label for="">Eselon</label>
		<div><input type="text" id="eselon" class="form-control" name="eselon" value="<?php echo  $ko['eselon'] ?>"></div>
	</div>
	
	<div class="form-group">
		<label for="">EA/IA</label>
		<div><input type="text" id="ea_ia" class="form-control" name="ea_ia" value="<?php echo  $ko['ea_ia'] ?>"></div>
	</div>

	<div class="form-group">
		<label for="">Proyek</label>
		<div><input type="text" id="proyek" class="form-control" name="proyek" value="<?php echo  $ko['proyek'] ?>"></div>
	</div>
	
	<div class="form-group">
		<label for="">Judul Proyek</label>
		<div><input type="text" id="judul_proyek" class="form-control" name="judul_proyek" value="<?php echo  $ko['judul_proyek'] ?>"></div>
	</div>
	
	<div class="form-group">
		<label for="">Mitra</label>
		<div><input type="text" id="mitra" class="form-control" name="mitra" value="<?php echo  $ko['mitra'] ?>"></div>
	</div>
	
	<div class="form-group">
		<label for="">Jangka Waktu (tahun)</label>
		<div><input type="text" id="jangka_waktu_tahun" class="form-control" name="jangka_waktu_tahun" value="<?php echo  $ko['jangka_waktu_tahun'] ?>"></div>
	</div>
	
	<div class="form-group">
		<label for="">Mulai Proyek</label>
		<div><input type="text" id="mulai_proyek" class="form-control" name="mulai_proyek" value="<?php echo  $ko['mulai_proyek'] ?>"></div>
	</div>
	
	<div class="form-group">
		<label for="">Akhir Proyek</label>
		<div><input type="text" id="akhir_proyek" class="form-control" name="akhir_proyek" value="<?php echo  $ko['akhir_proyek'] ?>"></div>
	</div>
	
	<div class="form-group">
		<label for="">Nomor Register</label>
		<div><input type="text" id="nomor_register" class="form-control" name="nomor_register" value="<?php echo  $ko['nomor_register'] ?>"></div>
	</div>
	
	<div class="form-group">
		<label for="">Mekanisme Proyek</label>
		<div><input type="text" id="mekanisme_proyek" class="form-control" name="mekanisme_proyek" value="<?php echo  $ko['mekanisme_proyek'] ?>"></div>
	</div>
	
	<div class="form-group">
		<label for="">Nilai Original Curencies</label>
		<div><input type="text" id="nilai_original_curencies" class="form-control" name="nilai_original_curencies" value="<?php echo  $ko['nilai_original_curencies'] ?>"></div>
	</div>
	
	<div class="form-group">
		<label for="">Nilai (USD)</label>
		<div><input type="text" id="nilai_usd" class="form-control" name="nilai_usd" value="<?php echo  $ko['nilai_usd'] ?>"></div>
	</div>
	
	<div class="form-group">
		<label for="">Keterangan</label>
		<div><textarea id="keterangan" class="form-control" name="keterangan" value="<?php echo  $ko['keterangan'] ?>"></textarea></div>
	</div>
	
	<div class="form-group">
		<label for="">Jenis kerjasama</label>
		<div>
				<select class="form-control" id="jenis_kerjasama" name="jenis_kerjasama">
				
				<option value="<?php echo  $ko['jenis_kerjasama'] ?>"><?php echo  $ko['jenis_kerjasama'] ?></option>
		
				<option value="Bilateral">Bilateral</option>
				<option value="Multilateral">Multilateral</option>
				
			</select>
		</div>
	</div>
	
	<div class="form-group">
		<label for="">Tema Proyek</label>
		<div><input type="text" id="tema_proyek" class="form-control" name="tema_proyek" value="<?php echo  $ko['tema_proyek'] ?>"></div>
	</div>

    <div class="form-group">
        <a class="btn btn-primary" id="updateButton" href="#">Update</a>
    </div>
</form>
