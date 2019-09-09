<?php
$conn_string = "host=localhost port=5433 dbname=pkl user=postgres password=student";

$connection = pg_connect($conn_string);

$result= pg_query("SELECT * FROM lokasi_point");


?>

<h3>Data Lokasi</h3>
<hr>
<table class="table table-bordered table-stripped">
    <thead>
        <th>#</th>
        <th><p align="center">Nama Lokasi</p></th>
        <th><p align="center">Logitude</p></th>
        <th><p align="center">Latitude</p></th>
        <th><p align="center">Option</p></th>
    </thead>
    <?php
    $i      = 1;
    while($record= pg_fetch_assoc($result)) {

    ?>

    <tr>
        <td><?php echo $i ?></td>
        <td><?php echo  $record['nama_lokasi_proyek'] ?></td>
        <td><?php echo  $record['longitude'] ?></td>
        <td><?php echo  $record['latitude'] ?></td>

        <td>
            <button id="editButton" value="<?php echo  $record['id_lokasi'] ?>" class="btn btn-warning">Edit</button>
            <button id="deleteButton" value="<?php echo  $record['id_lokasi'] ?>" class="btn btn-danger">Hapus</button>
        </td>
    </tr>
    <?php
        $i++;
    }
    ?>   
</table>