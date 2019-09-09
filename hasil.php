
<?php
include("koneksi.php");
$delk = '';
$delm = '';
$delt = '';
$del = $_POST['id'];
$delt = $_POST['idt'];
$delk = $_POST['idk'];
$delm = $_POST['idm'];
$hap = pg_query("select nama_lokasi_proyek from lokasi_point where id_lokasi='$del' ");
    $hapu = pg_fetch_array($hap);
    $hapus = $hapu['nama_lokasi_proyek'];  
 ?>
  <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                <h4 class="modal-title" id="myModalLabel"><?php echo $hapus; ?></h4>
                    </div>

 <?php
//tema, kerjasama, dan mitra
$aturan7= pg_query("SELECT proyek, proyek.id_proyek, jenis_kerjasama, mitra, tema_proyek from proyek, proyek_lokasi, lokasi_point where proyek.id_proyek=proyek_lokasi.id_proyek AND proyek_lokasi.id_lokasi=lokasi_point.id_lokasi AND lokasi_point.id_lokasi='$del' AND tema_proyek='$delt' AND jenis_kerjasama='$delk' AND mitra='$delm' ");

//tema dan kerjasama
$aturan4= pg_query("SELECT proyek, proyek.id_proyek, jenis_kerjasama, mitra, tema_proyek from proyek, proyek_lokasi, lokasi_point where proyek.id_proyek=proyek_lokasi.id_proyek AND proyek_lokasi.id_lokasi=lokasi_point.id_lokasi AND lokasi_point.id_lokasi='$del' AND tema_proyek='$delt' AND jenis_kerjasama='$delk' ");

//tema dan mitra
$aturan5= pg_query("SELECT proyek, proyek.id_proyek, jenis_kerjasama, mitra, tema_proyek from proyek, proyek_lokasi, lokasi_point where proyek.id_proyek=proyek_lokasi.id_proyek AND proyek_lokasi.id_lokasi=lokasi_point.id_lokasi AND lokasi_point.id_lokasi='$del' AND tema_proyek='$delt' AND mitra='$delm' ");

//kerjasama dan mitra
$aturan0= pg_query("SELECT proyek, proyek.id_proyek, jenis_kerjasama, mitra, tema_proyek from proyek, proyek_lokasi, lokasi_point where proyek.id_proyek=proyek_lokasi.id_proyek AND proyek_lokasi.id_lokasi=lokasi_point.id_lokasi AND lokasi_point.id_lokasi='$del' AND jenis_kerjasama='$delk' AND mitra='$delm' ");

//tema saja
$aturan6= pg_query("SELECT proyek, proyek.id_proyek, jenis_kerjasama, mitra, tema_proyek from proyek, proyek_lokasi, lokasi_point where proyek.id_proyek=proyek_lokasi.id_proyek AND proyek_lokasi.id_lokasi=lokasi_point.id_lokasi AND lokasi_point.id_lokasi='$del' AND tema_proyek='$delt' ");

//kerjasama saja
$aturan1= pg_query("SELECT proyek, proyek.id_proyek, jenis_kerjasama, mitra, tema_proyek from proyek, proyek_lokasi, lokasi_point where proyek.id_proyek=proyek_lokasi.id_proyek AND proyek_lokasi.id_lokasi=lokasi_point.id_lokasi AND lokasi_point.id_lokasi='$del' AND jenis_kerjasama='$delk' ");

//kerjasama saja
$aturan2= pg_query("SELECT proyek, proyek.id_proyek, jenis_kerjasama, mitra, tema_proyek from proyek, proyek_lokasi, lokasi_point where proyek.id_proyek=proyek_lokasi.id_proyek AND proyek_lokasi.id_lokasi=lokasi_point.id_lokasi AND lokasi_point.id_lokasi='$del' AND mitra='$delm' ");

//normal
$aturan3= pg_query("SELECT proyek, proyek.id_proyek, jenis_kerjasama, mitra, tema_proyek from proyek, proyek_lokasi, lokasi_point where proyek.id_proyek=proyek_lokasi.id_proyek AND proyek_lokasi.id_lokasi=lokasi_point.id_lokasi AND lokasi_point.id_lokasi='$del' ");

//tema, kerjasama, dan mitra
if(($delt!='') && ($delt!='tema') && ($delk!='') && ($delk!='kerjasama') && ($delm!='') && ($delm!='mitra'))
  {$des=$aturan7;}

//tema dan kerjasama
else if(($delt!='') && ($delt!='tema') && ($delk!='') && ($delk!='kerjasama'))
  {$des=$aturan4;}

//tema dan mitra
else if(($delt!='') && ($delt!='tema') && ($delm!='') && ($delm!='mitra'))
  {$des=$aturan5;}

//kerjasama dan mitra
else if(($delk!='') && ($delk!='kerjasama') && ($delm!='') && ($delm!='mitra'))
  {$des=$aturan0;}

//tema saja
else if(($delt!='') && ($delt!='tema'))
  {$des=$aturan6;}

//kerjasama saja
else if(($delk!='') && ($delk!='kerjasama'))
  {$des=$aturan1;}

//kerjasama saja
else if(($delm!='') && ($delm!='mitra'))
  {$des=$aturan2;}

else
  //normal
  {$des=$aturan3;}

if (pg_num_rows($des) > 0)     
{     
  //menampilkan hasil query      
  while($d= pg_fetch_assoc($des)) { 

if($d['jenis_kerjasama']=='Bilateral')
   {echo '<div class="panel panel-primary">';}

else if ($d['jenis_kerjasama']=='Multilateral') {
	 {echo '<div class="panel panel-danger">';}

}
else 
  {echo ' <div class="panel panel-default">';}

          echo '<div class="panel-heading">';
              echo '<div style="text-align: right">';
                echo  $d['jenis_kerjasama'];
              echo '</div>'; 
                echo 'Tema: ';
                echo $d['tema_proyek'];
                echo '<br>';
                echo 'Mitra: ';
                echo $d['mitra'];
          echo '</div>'; 

          echo '<div class="panel-body">';
                echo  '<a href="deskripsi.php?isi='.$d['id_proyek'].'"> '.$d['proyek'].' </a>';
                echo '<br>';
          echo '</div>';

    echo '</div>';
  }
}
  else 
  {echo "tidak ada"; } ?>