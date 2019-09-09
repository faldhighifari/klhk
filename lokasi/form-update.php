<?php

$conn_string = "host=localhost port=5433 dbname=pkl user=postgres password=student";

$connection = pg_connect($conn_string);

$id    = $_GET['id'];


$koor= pg_query("SELECT * FROM lokasi_point WHERE id_lokasi='$id' ");


$ko= pg_fetch_assoc($koor);

?>

<h3>Form Update Data Lokasi</h3>
<hr>
<form action="lokasi/update.php?id=<?php echo $id ?>" method="POST">
    <div class="form-group">
        <label for="">Nama Lokasi</label>
        <div><input type="text" class="form-control" id="nama_lokasi_proyek" name="nama_lokasi_proyek" value="<?php echo  $ko['nama_lokasi_proyek'] ?>"></div>
    </div>

    <div class="form-group">
        <label for="">Longitude</label>
        <div><input type="text" class="form-control" id="longitude" name="logitude" value="<?php echo  $ko['longitude'] ?>"></div>
    </div>

    <div class="form-group">
        <label for="">Latitude</label>
        <div><input type="text" class="form-control" id="latitude" name="latitude" value="<?php echo  $ko['latitude'] ?>"></div>
    </div>

    <div class="form-group">
        <a class="btn btn-primary" id="updateButton" href="#">Update</a>
    </div>
</form>
