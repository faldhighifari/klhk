<?php
$conn_string = "host=localhost port=5433 dbname=pkl user=postgres password=student";

$connection = pg_connect($conn_string);

$result= pg_query("SELECT * FROM proyek order by id_proyek");

?>

<h3>Data Proyek</h3>
<hr>
<table class="table table-bordered table-stripped">
    <thead>
        <th>#</th>
        <th><p align="center">Proyek</p></th>
        <th><p align="center">Tema Proyek</p></th>
        <th width="150px"><p align="center">Mitra</p></th>
        <th><p align="center">Jenis Kerjasama</p></th>
		<th width="250px"><p align="center">Option</p></th>
    </thead>
    <?php
    $i      = 1;
    while($record= pg_fetch_assoc($result)) {

    ?>

    <tr>
        <td><?php echo $i ?></td>
        <td><?php echo  $record['proyek'] ?></td>
        <td><?php echo  $record['tema_proyek'] ?></td>
        <td><?php echo  $record['mitra'] ?></td>
		<td><?php echo  $record['jenis_kerjasama'] ?></td>
        <td>
            <button id="editButton" value="<?php echo  $record['id_proyek'] ?>" class="btn btn-warning">Edit</button>
            <a href="index_pl.php?nilai=<?php echo $record['id_proyek'] ?>" > <button id="editButtonLokasi" value="<?php echo  $record['id_proyek'] ?>" class="btn btn-info">Edit Lokasi</button></a>
            <button id="deleteButton" value="<?php echo  $record['id_proyek'] ?>" class="btn btn-danger">Hapus</button>
        </td>
    </tr>
    <?php
        $i++;
    }
    ?>   
</table>