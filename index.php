<!DOCTYPE html>

<?php 
include("koneksi.php");
error_reporting(0);
    $tema2 = $_POST['tema'];
$kerjasama2 = $_POST['kerjasama'];
    $mitra2 = $_POST['mitra'];
?>

<html lang="en">

<head>
  <title>Biro KLN</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
  <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  

    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>

    <script src="http://openlayers.org/en/v5.3.0/build/ol.js"></script>
    <script src="https://code.jquery.com/jquery-2.2.3.min.js"></script>
    <script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=false"></script>
    <script type="text/javascript" src="http://code.jquery.com/jquery-1.11.3.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>

    <link rel="stylesheet" href="http://openlayers.org/en/v5.3.0/css/ol.css" type="text/css">

    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <link href="sidebar.css" rel="stylesheet">

    <script>
$(document).ready(function() {
$("#hidden").css('display', 'block');
$("#progress-bar").animate({width:"100%"}, 2000); });
$(window).bind('load', function() {
$("#progress-bar").stop().animate({width:"100%"}, 1000, function() {
$("#hidden").fadeOut(3000); }); });
</script>

<style>
#hidden {display:none}
#progress-bar {position:fixed;z-index:9999;top:0;left:0;width:0;height:2px;background-color:#4aa6e7}
#loading {position:fixed;z-index:999;top:0;left:0;width:100%;height:100%;background:#000 url(Loading.gif) center no-repeat}
</style>


<link href="elements.css" rel="stylesheet">


    <style>

  #map { height:500px; width:1000px;}

    <?php 

    //gimana klau 2 2 ny di pilih.
$koor = pg_query("SELECT id_lokasi from lokasi_point order by id_lokasi"); 


while($ko= pg_fetch_assoc($koor)) {

//melakukan pencocokan berdasarkan pemilihan tema, mitra, dan kerjasama
        if((isset($tema2)) && ($tema2!='tema') && (isset($mitra2)) && ($mitra2!='mitra') && (isset($kerjasama2)) && ($kerjasama2!='kerjasama')){
$warna= pg_query("SELECT proyek.id_proyek from proyek, proyek_lokasi where proyek.id_proyek=proyek_lokasi.id_proyek AND tema_proyek='$tema2' AND jenis_kerjasama='$kerjasama2' AND mitra='$mitra2' AND id_lokasi=".$ko['id_lokasi']." ");
        }
//melakukan pencocokan berdasarkan pemilihan tema dan kerjasama
        else if((isset($tema2)) && ($tema2!='tema') && (isset($kerjasama2)) && ($kerjasama2!='kerjasama')){
$warna= pg_query("SELECT proyek.id_proyek from proyek, proyek_lokasi where proyek.id_proyek=proyek_lokasi.id_proyek AND tema_proyek='$tema2' AND jenis_kerjasama='$kerjasama2' AND id_lokasi=".$ko['id_lokasi']." ");
        }
//melakukan pencocokan berdasarkan pemilihan tema dan mitra
        else if((isset($tema2)) && ($tema2!='tema') && (isset($mitra2)) && ($mitra2!='mitra')){
$warna= pg_query("SELECT proyek.id_proyek from proyek, proyek_lokasi where proyek.id_proyek=proyek_lokasi.id_proyek AND tema_proyek='$tema2' AND mitra='$mitra2' AND id_lokasi=".$ko['id_lokasi']." ");
        }
//melakukan pencocokan berdasarkan pemilihan kerjasama dan mitra
        else if((isset($kerjasama2)) && ($kerjasama2!='kerjasama') && (isset($mitra2)) && ($mitra2!='mitra')){
$warna= pg_query("SELECT proyek.id_proyek from proyek, proyek_lokasi where proyek.id_proyek=proyek_lokasi.id_proyek AND jenis_kerjasama='$kerjasama2' AND mitra='$mitra2' AND id_lokasi=".$ko['id_lokasi']." ");
        }
//tema
        else if((isset($tema2)) && ($tema2!='tema')){
$warna= pg_query("SELECT proyek.id_proyek from proyek, proyek_lokasi where proyek.id_proyek=proyek_lokasi.id_proyek AND tema_proyek='$tema2' AND id_lokasi=".$ko['id_lokasi']." ");
        }
//kerjasama
        else if((isset($kerjasama2)) && ($kerjasama2!='kerjasama')){
$warna= pg_query("SELECT proyek.id_proyek from proyek, proyek_lokasi where proyek.id_proyek=proyek_lokasi.id_proyek AND jenis_kerjasama='$kerjasama2' AND id_lokasi=".$ko['id_lokasi']." ");
        }
//mitra
        else if((isset($mitra2)) && ($mitra2!='mitra')){
$warna= pg_query("SELECT proyek.id_proyek from proyek, proyek_lokasi where proyek.id_proyek=proyek_lokasi.id_proyek AND mitra='$mitra2' AND id_lokasi=".$ko['id_lokasi']." ");
        }
//umum
        else {
$warna= pg_query("SELECT id_proyek from proyek_lokasi where id_lokasi=".$ko['id_lokasi']." ");
}

$total = pg_num_rows($warna);

    ?>
      #marker<?php echo  $ko['id_lokasi'] ?>{
        width: <?php if(pg_num_rows($warna) <= 1)  {echo '10px';} else if(pg_num_rows($warna) >= 5)  {echo '50px';} else {echo $total*10; echo 'px';} ?>;
        height: <?php if(pg_num_rows($warna) <= 1)  {echo '10px';} else if(pg_num_rows($warna) >= 5)  {echo '50px';} else {echo $total*10; echo 'px';} ?>;
        border: 1px solid #088;
        border-radius: <?php if(pg_num_rows($warna) <= 1)  {echo '10px';} else if(pg_num_rows($warna) >= 5)  {echo '50px';} else {echo $total*10; echo 'px';} ?>;
        background-color: <?php if(pg_num_rows($warna) <= 1)  {echo '#0FF';} else {echo '#000';} ?>;
      } 

      #daerah<?php echo  $ko['id_lokasi'] ?>{
        text-decoration: none;
        color: blue;
        font-size: 7pt;
        font-weight: bold;
        display: none;
      } 
      <?php } ?>
      .popover-content {
        min-width: 180px;
      }

    </style>



<style>
/* Style The Dropdown Button */
.dropbtn {
    background-color: #00a65a;
    color: white;
    padding: 16px;
    font-size: 16px;
    border: none;
    cursor: pointer;
}

/* The container <div> - needed to position the dropdown content */
.dropdown {
    position: relative;
    display: inline-block;
}

/* Dropdown Content (Hidden by Default) */
.dropdown-content {
    display: none;
    position: absolute;
    background-color: #f9f9f9;
    min-width: 160px;
    box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
}

/* Links inside the dropdown */
.dropdown-content a {
    color: black;
    padding: 12px 16px;
    text-decoration: none;
    display: block;
}

/* Change color of dropdown links on hover */
.dropdown-content a:hover {background-color: #f1f1f1}

/* Show the dropdown menu on hover */
.dropdown:hover .dropdown-content {
    display: block;
}

/* Change the background color of the dropdown button when the dropdown content is shown */
.dropdown:hover .dropbtn {
    background-color: #3e8e41;
}
</style>

<style>
input[type=text] {
    width: 130px;
    box-sizing: border-box;
    border: 2px solid #ccc;
    border-radius: 4px;
    font-size: 16px;
    background-color: white;
    background-image: url('searchicon.png');
    background-size: 25px 25px;
    background-position: 10px 10px;
    background-repeat: no-repeat;
    padding: 12px 20px 12px 40px;
    -webkit-transition: width 0.4s ease-in-out;
    transition: width 0.4s ease-in-out;
}

input[type=text]:focus {
    width: 100%;
}

select {
    width: 95%;
    padding: 10px 10px;
    border: none;
    border-radius: 4px;
    background-color: #f1f1f1;
}

select, a{
    color: black;
}
</style>

 <style>
      .map:-moz-full-screen {
        height: 100%;
      }
      .map:-webkit-full-screen {
        height: 100%;
      }
      .map:-ms-fullscreen {
        height: 100%;
      }
      .map:fullscreen {
        height: 100%;
      }
      .ol-rotate {
        top: 3em;
      }
    </style>

 <style>
      .ol-custom-overviewmap,
      .ol-custom-overviewmap.ol-uncollapsible {
        bottom: auto;
        left: auto;
        right: 7px;
        top: 40px;
      }

      .ol-custom-overviewmap:not(.ol-collapsed)  {
        border: 1px solid black;
      }

      .ol-custom-overviewmap .ol-overviewmap-map {
        border: none;
        width: 300px;
      }

      .ol-custom-overviewmap .ol-overviewmap-box {
        border: 2px solid red;
      }

      .ol-custom-overviewmap:not(.ol-collapsed) button{
        bottom: auto;
        left: auto;
        right: 1px;
        top: 1px;
      }

      .ol-rotate {
        top: 170px;
        right: 0;
      }
    </style>

     <style>
      .ol-popup {
        position: absolute;
        background-color: white;
        -webkit-filter: drop-shadow(0 1px 4px rgba(0,0,0,0.2));
        filter: drop-shadow(0 1px 4px rgba(0,0,0,0.2));
        padding: 10px;
        border-radius: 10px;
        bottom: 12px;
        left: -50px;
        min-width: 140px;
      }
      .ol-popup:after, .ol-popup:before {
        top: 100%;
        border: solid transparent;
        content: " ";
        height: 0;
        width: 0;
        position: absolute;
        pointer-events: none;
      }
      .ol-popup:after {
        border-top-color: white;
        border-width: 10px;
        left: 48px;
        margin-left: -10px;
      }
      .ol-popup:before {
        border-top-color: #cccccc;
        border-width: 11px;
        left: 48px;
        margin-left: -11px;
      }
      .ol-popup-closer {
        text-decoration: none;
        position: absolute;
        top: -5px;
        right: -5px;
        transform: scale(0.8, 0.8);
        -ms-transform: scale(0.8, 0.8);
        -webkit-transform: scale(0.8, 0.8);
      }
      .ol-popup-closer:after {
        content: url(3.png);

      }
    </style>
    <script type="text/javascript">
var htmlobjek;
$(document).ready(function(){
  //apabila terjadi event onchange terhadap object <select id=propinsi>
  $("#tema").change(function(){
    var tema = $("#tema").val();
    $.ajax({
        url: "mitra.php",
        data: "tema="+tema,
        cache: false,
        success: function(msg){
            //jika data sukses diambil dari server kita tampilkan
            //di <select id=kota>
            $("#kerjasama").html(msg);
        }
    });
  });

  $("#kerjasama").change(function(){
    var kerjasama = $("#kerjasama").val();
    $.ajax({
        url: "mitra.php",
        data: "kerjasama="+kerjasama,
        cache: false,
        success: function(msg){
            //jika data sukses diambil dari server kita tampilkan
            //di <select id=kota>
            $("#mitra").html(msg);
        }
    });
  });

  $("#mitra").change(function(){
    var mitra = $("#mitra").val();
    $.ajax({
        url: "mitra.php",
        data: "mitra="+mitra,
        cache: false,
        success: function(msg){
            //jika data sukses diambil dari server kita tampilkan
            //di <select id=kota>
            $("#lokasi").html(msg);
        }
    });
  });
});
</script>



</head>

<body>

<div id="wrapper">
    <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
        <div class="container-fluid">
         <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <div  class="navbar-brand">
                    <a id="menu-toggle" href="#" class="glyphicon glyphicon-align-justify btn-menu toggle">
                        <i class="fa fa-bars"></i>
                    </a>
                    <a href="index.php">Biro KLN</a>
                </div>
            </div>

            <div id="navbar" class="collapse navbar-collapse">
               <ul class="nav navbar-nav">
                    <li><a></a></li>
                    <li><a></a></li>
                    <li><a></a></li>
                    <li><a></a></li>
                   
                    <li><a href= "index.php">Home</a></li>
                    <li><a href= "FAQ.php">FAQ</a></li>
                </ul>
        <ul class= "nav navbar-nav navbar-right">
                     <?php 
                        session_start(); 
                                if( isset( $_SESSION['nama_admin'] ) )
                                    {
                                        echo "<li><a href= \"index_proyek.php\">Proyek</a></li>";
                                        echo "<li><a href= \"index_lokasi.php\">Lokasi</a></li>";
                                        echo "<li><a class=\"btn btn-danger\" href='Keluar.php'><span class='glyphicon glyphicon-log-out'></span> Logout</a></li>";
                                    }
        
                                else {
                                        echo "<li><a  class=\"btn btn-primary\" data-toggle=\"modal\" data-target=\"#log-in\"><span class='glyphicon glyphicon-log-in' ></span> User</a></li>";
                                    }
                     ?>
                </ul>
            </div><!--/.nav-collapse -->
        </div>
    </nav>
    <!-- Sidebar -->

    <div id="sidebar-wrapper">

                        <br>
                         <nav id="spy">

    <ul>
                <div id="form1"> 
                    <form  method="POST" action="index.php" align="left">
              
                          <label>Pilih Tema </label><br>
                          <select name="tema" id="tema">
                          <option value="tema">-- Pilih Tema --</option>
                          <?php
                          //mengambil nama-nama propinsi yang ada di database
                          $tema = pg_query("SELECT distinct tema_proyek FROM proyek ORDER BY tema_proyek");
                          while($p=pg_fetch_array($tema)){
                          echo "<option value=\"$p[tema_proyek]\">$p[tema_proyek]</option>\n";
                          }
                          ?>
                          </select><br>

                          <label>Pilih Jenis Kerjasama </label><br>
                          <select name="kerjasama" id="kerjasama">
                          <option value="kerjasama">-- Pilih Kerjasama --</option>
                          <?php
                          //mengambil nama-nama propinsi yang ada di database
                          $kerjasama = pg_query("SELECT distinct jenis_kerjasama FROM proyek ORDER BY jenis_kerjasama");
                          while($p=pg_fetch_array($kerjasama)){
                          echo "<option value=\"$p[jenis_kerjasama]\">$p[jenis_kerjasama]</option>\n";
                          }
                          ?>
                          </select><br>

                          <label>Pilih Mitra </label><br>
                          <select name="mitra" id="mitra">
                          <option value="mitra">-- Pilih Mitra --</option>
                          <?php
                          //mengambil nama-nama propinsi yang ada di database
                          $mitra = pg_query("SELECT distinct mitra FROM proyek ORDER BY mitra");
                          while($p=pg_fetch_array($mitra)){
                          echo "<option value=\"$p[mitra]\">$p[mitra]</option>\n";
                          }
                          ?>
                          </select><br>

                          <label>Pilih Lokasi </label><br>
                          <select name="lokasi" id="lokasi">
                          <option value="lokasi">-- Pilih Lokasi --</option>
                          <?php
                          //mengambil nama-nama propinsi yang ada di database
                          $lokasi = pg_query("SELECT nama_lokasi_proyek FROM lokasi_point ORDER BY nama_lokasi_proyek");
                          while($p=pg_fetch_array($lokasi)){
                          echo "<option value=\"".$p['nama_lokasi_proyek']."\">".$p['nama_lokasi_proyek']."</option>\n";
                          }
                          ?>
                          </select>
                          <br><br>
                          <button class='btn btn-primary btn-md'>Tampilkan</button>
                    </form>
                </div>
                                <br>
            <div id="form1">
                    <label>Koordinat </label>
                    <div id="mouse-position"></div>
                    <form align="left">
                            <hr>
                            <label>Projection </label><br>
                        <select id="projection">
                                <option value="EPSG:4326">EPSG:4326</option>
                                <option value="EPSG:3857">EPSG:3857</option>
                        </select>
                                <br>
                            <label>Precision </label>
                                <br>
                        <input id="precision" type="number" min="4" max="12" value="4"/>
                    </form>
            </div>

    </ul></nav>
    
    </div>

    <!-- Page content -->
    <div id="page-content-wrapper">
        <div class="page-content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                         <form align="center" method="post" name="submit" action='pencarian.php'>
                        <input type="text" name="namaproyek" placeholder="Search...">
                        </form>
                    </div>

                </div>
            </div>
        </div>
    </div>

                                                            <br>

    <section class="content">
    <?php 
    error_reporting(0);
    $tema3 = $_POST['tema'];
    $kerjasama3 = $_POST['kerjasama'];
    $mitra3 = $_POST['mitra'];
    $lokasi3 = $_POST['lokasi']; 

   if(isset($_POST['tema']) AND isset($_POST['kerjasama']) AND isset($_POST['mitra']) AND isset($_POST['lokasi']))
   {

      if($tema3 == 'tema' AND $kerjasama3 == 'kerjasama' AND $mitra3 == 'mitra' AND $lokasi3 == 'lokasi')
        {
          echo "<div class='col-md-12'>";
          echo "<div class='panel panel-danger'>";
          echo "<div class='panel-heading' align='center'>Belum melakukan query</div>";
          echo "</div>";
          echo "</div>";
        }

        //Mencari hubungan tema, kerjasama, mitra dan lokasi apakah ada apa tidak.
      else if($tema3 != 'tema' AND $kerjasama3 != 'kerjasama'  AND $mitra3!='mitra' AND $lokasi3 != 'lokasi')
          {
              $letak = pg_query("SELECT distinct lokasi_point.id_lokasi, latitude, longitude, lokasi_point.nama_lokasi_proyek from lokasi_point, proyek, proyek_lokasi where proyek.id_proyek=proyek_lokasi.id_proyek AND proyek_lokasi.id_lokasi=lokasi_point.id_lokasi AND tema_proyek='$tema3' AND jenis_kerjasama='$kerjasama3' AND mitra = '$mitra3' AND lokasi_point.nama_lokasi_proyek = '$lokasi3' order by id_lokasi");
              
              if (pg_num_rows($letak) == 0)     
                      {
                            echo "<div class='col-md-12'>";
                              echo "<div class='panel panel-danger'>";
                                   echo "<div class='panel-heading' align='center'>Tidak ada hubungan tema ";
                    
                                          echo "<b>";
                                          echo "$tema3";
                                          echo "&nbsp"; 
                                          echo "</b>";
                                          echo ",kerjasama";
                                          echo "&nbsp"; 
                                          echo "<b>";
                                          echo "$kerjasama3"; 
                                          echo "</b>";
                                          echo ", mitra ";
                                          echo "<b>";
                                          echo "$mitra3"; 
                                          echo "</b>";
                                          echo ", dan lokasi ";
                                          echo "<b>";
                                          echo "$lokasi3"; 
                                          echo "</b>";

                                    echo "</div>";
                              echo "</div>";
                            echo "</div>";
                      }
              else
                      {
                          echo "<div class='col-md-12'>";
                            echo "<div class='panel panel-success'>";
                               echo "<div class='panel-heading' align='center'>";

                                  if($tema3 != 'tema'){
                                      echo 'Jenis Kerjasama : ';
                                      echo "<b>";
                                      echo $tema3;
                                      echo "</b>";
                                      echo "&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp";}

                                   if($kerjasama3 != 'kerjasama'){
                                      echo 'Jenis Kerjasama : ';
                                      echo "<b>";
                                      echo $kerjasama3;
                                      echo "</b>";
                                      echo "&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp";}
                            
                                  if($mitra3 != 'mitra'){
                                      echo 'Mitra : ';
                                      echo "<b>";
                                      echo $mitra3;
                                      echo "</b>";
                                      echo "&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp";}

                                  if($lokasi3 != 'lokasi'){
                                      echo 'Lokasi : ';
                                      echo "<b>";
                                      echo $lokasi3;
                                      echo "</b>";}

                                echo "</div>";
                            echo "</div>";
                          echo "</div>";
                      }
        }

//Mencari hubungan tema, kerjasama, dan mitra apakah ada apa tidak.
      else if($tema3 != 'tema' AND $kerjasama3 != 'kerjasama'  AND $mitra3!='mitra' AND $lokasi3 == 'lokasi')
          {
              $letak = pg_query("SELECT distinct lokasi_point.id_lokasi, latitude, longitude, lokasi_point.nama_lokasi_proyek from lokasi_point, proyek, proyek_lokasi where proyek.id_proyek=proyek_lokasi.id_proyek AND proyek_lokasi.id_lokasi=lokasi_point.id_lokasi AND tema_proyek='$tema3' AND jenis_kerjasama='$kerjasama3' AND mitra = '$mitra3' order by id_lokasi");
              
              if (pg_num_rows($letak) == 0)     
                      {
                            echo "<div class='col-md-12'>";
                              echo "<div class='panel panel-danger'>";
                                   echo "<div class='panel-heading' align='center'>Tidak ada hubungan tema ";
                    
                                          echo "<b>";
                                          echo "$tema3";
                                          echo "&nbsp"; 
                                          echo "</b>";
                                          echo ",kerjasama";
                                          echo "&nbsp"; 
                                          echo "<b>";
                                          echo "$kerjasama3"; 
                                          echo "</b>";
                                          echo ", dan mitra ";
                                          echo "<b>";
                                          echo "$mitra3"; 
                                          echo "</b>";

                                    echo "</div>";
                              echo "</div>";
                            echo "</div>";
                      }
              else
                      {
                          echo "<div class='col-md-12'>";
                            echo "<div class='panel panel-success'>";
                               echo "<div class='panel-heading' align='center'>";

                                  if($tema3 != 'tema'){
                                      echo 'Jenis Kerjasama : ';
                                      echo "<b>";
                                      echo $tema3;
                                      echo "</b>";
                                      echo "&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp";}

                                   if($kerjasama3 != 'kerjasama'){
                                      echo 'Jenis Kerjasama : ';
                                      echo "<b>";
                                      echo $kerjasama3;
                                      echo "</b>";
                                      echo "&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp";}
                            
                                  if($mitra3 != 'mitra'){
                                      echo 'Mitra : ';
                                      echo "<b>";
                                      echo $mitra3;
                                      echo "</b>";}

                                echo "</div>";
                            echo "</div>";
                          echo "</div>";
                      }
        }

//Mencari hubungan tema, mitra dan lokasi apakah ada apa tidak.
      else if($tema3 != 'tema' AND $kerjasama3 == 'kerjasama'  AND $mitra3!='mitra' AND $lokasi3 != 'lokasi')
          {
              $letak = pg_query("SELECT distinct lokasi_point.id_lokasi, latitude, longitude, lokasi_point.nama_lokasi_proyek from lokasi_point, proyek, proyek_lokasi where proyek.id_proyek=proyek_lokasi.id_proyek AND proyek_lokasi.id_lokasi=lokasi_point.id_lokasi AND tema_proyek='$tema3' AND mitra = '$mitra3' AND lokasi_point.nama_lokasi_proyek = '$lokasi3' order by id_lokasi");
              
              if (pg_num_rows($letak) == 0)     
                      {
                            echo "<div class='col-md-12'>";
                              echo "<div class='panel panel-danger'>";
                                   echo "<div class='panel-heading' align='center'>Tidak ada hubungan tema ";
                    
                                          echo "<b>";
                                          echo "$tema3";
                                          echo "&nbsp"; 
                                          echo "</b>";
                                          echo ",mitra";
                                          echo "&nbsp"; 
                                          echo "<b>";
                                          echo "$mitra3"; 
                                          echo "</b>";
                                          echo ", dan lokasi ";
                                          echo "<b>";
                                          echo "$lokasi3"; 
                                          echo "</b>";

                                    echo "</div>";
                              echo "</div>";
                            echo "</div>";
                      }
              else
                      {
                          echo "<div class='col-md-12'>";
                            echo "<div class='panel panel-success'>";
                               echo "<div class='panel-heading' align='center'>";

                                  if($tema3 != 'tema'){
                                      echo 'Jenis Kerjasama : ';
                                      echo "<b>";
                                      echo $tema3;
                                      echo "</b>";
                                      echo "&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp";}

                                   if($mitra3 != 'mitra'){
                                      echo 'Mitra : ';
                                      echo "<b>";
                                      echo $mitra3;
                                      echo "</b>";
                                      echo "&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp";}
                            
                                  if($lokasi3 != 'lokasi'){
                                      echo 'Lokasi : ';
                                      echo "<b>";
                                      echo $lokasi3;
                                      echo "</b>";}

                                echo "</div>";
                            echo "</div>";
                          echo "</div>";
                      }
        }

//Mencari hubungan tema dengan mitra apakah ada apa tidak.
      else if($tema3 != 'tema' AND $kerjasama3 == 'kerjasama'  AND $mitra3!='mitra' AND $lokasi3 == 'lokasi')
          {
              $letak = pg_query("SELECT distinct lokasi_point.id_lokasi, latitude, longitude, lokasi_point.nama_lokasi_proyek from lokasi_point, proyek, proyek_lokasi where proyek.id_proyek=proyek_lokasi.id_proyek AND proyek_lokasi.id_lokasi=lokasi_point.id_lokasi AND tema_proyek='$tema3' AND mitra = '$mitra3' order by id_lokasi");
              
              if (pg_num_rows($letak) == 0)     
                      {
                            echo "<div class='col-md-12'>";
                              echo "<div class='panel panel-danger'>";
                                   echo "<div class='panel-heading' align='center'>Mitra ";
                    
                                          echo "<b>";
                                          echo "$mitra3";
                                          echo "&nbsp"; 
                                          echo "</b>";
                                          echo "tidak memiliki tema";
                                          echo "&nbsp"; 
                                          echo "<b>";
                                          echo "$tema3"; 
                                          echo "</b>";

                                    echo "</div>";
                              echo "</div>";
                            echo "</div>";
                      }
              else
                      {
                          echo "<div class='col-md-12'>";
                            echo "<div class='panel panel-success'>";
                               echo "<div class='panel-heading' align='center'>";

                                  if($tema3 != 'tema'){
                                      echo 'Jenis Kerjasama : ';
                                      echo "<b>";
                                      echo $tema3;
                                      echo "</b>";
                                      echo "&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp";}
                            
                                  if($mitra3 != 'mitra'){
                                      echo 'Lokasi : ';
                                      echo "<b>";
                                      echo $mitra3;
                                      echo "</b>";}

                                echo "</div>";
                            echo "</div>";
                          echo "</div>";
                      }
        }

//Mencari hubungan tema dengan lokasi apakah ada apa tidak.
      else if($tema3 != 'tema' AND $kerjasama3 == 'kerjasama'  AND $mitra3=='mitra' AND $lokasi3 != 'lokasi')
          {
              $letak = pg_query("SELECT distinct lokasi_point.id_lokasi, latitude, longitude, lokasi_point.nama_lokasi_proyek from lokasi_point, proyek, proyek_lokasi where proyek.id_proyek=proyek_lokasi.id_proyek AND proyek_lokasi.id_lokasi=lokasi_point.id_lokasi AND tema_proyek='$tema3' AND lokasi_point.nama_lokasi_proyek = '$lokasi3' order by id_lokasi");
              
              if (pg_num_rows($letak) == 0)     
                      {
                            echo "<div class='col-md-12'>";
                              echo "<div class='panel panel-danger'>";
                                   echo "<div class='panel-heading' align='center'>Tema ";
                    
                                          echo "<b>";
                                          echo "$tema3";
                                          echo "&nbsp"; 
                                          echo "</b>";
                                          echo "tidak ada di lokasi";
                                          echo "&nbsp"; 
                                          echo "<b>";
                                          echo "$lokasi3"; 
                                          echo "</b>";

                                    echo "</div>";
                              echo "</div>";
                            echo "</div>";
                      }
              else
                      {
                          echo "<div class='col-md-12'>";
                            echo "<div class='panel panel-success'>";
                               echo "<div class='panel-heading' align='center'>";

                                  if($tema3 != 'tema'){
                                      echo 'Tema : ';
                                      echo "<b>";
                                      echo $tema3;
                                      echo "</b>";
                                      echo "&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp";}
                            
                                  if($lokasi3 != 'lokasi'){
                                      echo 'Lokasi : ';
                                      echo "<b>";
                                      echo $lokasi3;
                                      echo "</b>";}

                                echo "</div>";
                            echo "</div>";
                          echo "</div>";
                      }
        }

//Mencari hubungan kerjasama dengan lokasi apakah ada apa tidak.
      else if($tema3== 'tema' AND $kerjasama3 != 'kerjasama'  AND $mitra3=='mitra' AND $lokasi3 != 'lokasi')
          {
              $letak = pg_query("SELECT distinct lokasi_point.id_lokasi, latitude, longitude, lokasi_point.nama_lokasi_proyek from lokasi_point, proyek, proyek_lokasi where proyek.id_proyek=proyek_lokasi.id_proyek AND proyek_lokasi.id_lokasi=lokasi_point.id_lokasi AND jenis_kerjasama='$kerjasama3' AND lokasi_point.nama_lokasi_proyek = '$lokasi3' order by id_lokasi");
              
              if (pg_num_rows($letak) == 0)     
                      {
                             echo "<div class='col-md-12'>";
                              echo "<div class='panel panel-danger'>";
                                   echo "<div class='panel-heading' align='center'>Tidak ada proyek ";
                    
                                          echo "<b>";
                                          echo "$kerjasama3";
                                          echo "&nbsp"; 
                                          echo "</b>";
                                          echo "di lokasi ";
                                          echo "<b>";
                                          echo "$lokasi3"; 
                                          echo "</b>";

                                    echo "</div>";
                              echo "</div>";
                            echo "</div>";
                      }
              else
                      {
                          echo "<div class='col-md-12'>";
                            echo "<div class='panel panel-success'>";
                               echo "<div class='panel-heading' align='center'>";

                                  if($kerjasama3 != 'kerjasama'){
                                      echo 'Jenis Kerjasama : ';
                                      echo "<b>";
                                      echo $kerjasama3;
                                      echo "</b>";
                                      echo "&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp";}
                            
                                  if($lokasi3 != 'lokasi'){
                                      echo 'Lokasi : ';
                                      echo "<b>";
                                      echo $lokasi3;
                                      echo "</b>";}

                                echo "</div>";
                            echo "</div>";
                          echo "</div>";
                      }
        }
      else
      {
        echo "<div class='col-md-12'>";
        echo "<div class='panel panel-success'>";
           echo "<div class='panel-heading' align='center'>";

              if($tema3 != 'tema'){
                  echo 'Tema Proyek: ';
                  echo "<b>";
                  echo $tema3;
                  echo "</b>";
                  echo "&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp";}

              if($kerjasama3 != 'kerjasama'){
                  echo 'Jenis Kerjasama : ';
                  echo "<b>";
                  echo $kerjasama3;
                  echo "</b>";
                  echo "&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp";}

              if($mitra3 != 'mitra'){
                  echo 'Mitra : ';
                  echo "<b>";
                  echo $mitra3;
                  echo "</b>";
                  echo "&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp";}

              if($lokasi3 != 'lokasi'){
                  echo 'Lokasi : ';
                  echo "<b>";
                  echo $lokasi3;
                  echo "</b>";}

            echo "</div>";
        echo "</div>";
      echo "</div>";
    }
}
    ?>

      <div class="row" align="center">

        
    <div id="map" class="map"></div><br>
     <button class='btn btn-primary btn-md' id="button_name">Nama</button>


<div id="popup" class="ol-popup">
      <a href="#" id="popup-closer" class="ol-popup-closer"></a>
      <div id="popup-content"></div>
    </div>


<br>
  <?php 
error_reporting(0);
    $koordinat= '';
    $tema1= '';
    $kerjasama1 = '';
    $mitra1 = '';
    $lokasi1 = '';
    $tema1= $_POST['tema'];
    $kerjasama1 = $_POST['kerjasama'];
    $mitra1 = $_POST['mitra'];
    $lokasi1 = $_POST['lokasi'];
    echo '<br>';

$koordinat0 = pg_query("SELECT distinct lokasi_point.id_lokasi, latitude, longitude, lokasi_point.nama_lokasi_proyek from lokasi_point, proyek, proyek_lokasi where proyek.id_proyek=proyek_lokasi.id_proyek AND proyek_lokasi.id_lokasi=lokasi_point.id_lokasi AND jenis_kerjasama='$kerjasama1' AND mitra='$mitra1' order by id_lokasi");
$koordinat1 = pg_query("SELECT * from lokasi_point order by id_lokasi");
$koordinat2 = pg_query("SELECT distinct lokasi_point.id_lokasi, latitude, longitude, lokasi_point.nama_lokasi_proyek from lokasi_point, proyek, proyek_lokasi where proyek.id_proyek=proyek_lokasi.id_proyek AND proyek_lokasi.id_lokasi=lokasi_point.id_lokasi AND tema_proyek='$tema1' AND jenis_kerjasama='$kerjasama1' order by id_lokasi");
$koordinat3 = pg_query("SELECT distinct lokasi_point.id_lokasi, latitude, longitude, lokasi_point.nama_lokasi_proyek from lokasi_point, proyek, proyek_lokasi where proyek.id_proyek=proyek_lokasi.id_proyek AND proyek_lokasi.id_lokasi=lokasi_point.id_lokasi AND mitra='$mitra1' order by id_lokasi");
$koordinat4 = pg_query("SELECT distinct lokasi_point.id_lokasi, latitude, longitude, lokasi_point.nama_lokasi_proyek from lokasi_point, proyek, proyek_lokasi where proyek.id_proyek=proyek_lokasi.id_proyek AND proyek_lokasi.id_lokasi=lokasi_point.id_lokasi AND jenis_kerjasama='$kerjasama1' order by id_lokasi");
$koordinat5 = pg_query("SELECT distinct lokasi_point.id_lokasi, latitude, longitude, lokasi_point.nama_lokasi_proyek from lokasi_point, proyek, proyek_lokasi where proyek.id_proyek=proyek_lokasi.id_proyek AND proyek_lokasi.id_lokasi=lokasi_point.id_lokasi AND mitra='$mitra1' AND lokasi_point.nama_lokasi_proyek = '$lokasi1' order by id_lokasi");
$koordinat6 = pg_query("SELECT distinct lokasi_point.id_lokasi, latitude, longitude, lokasi_point.nama_lokasi_proyek from lokasi_point, proyek, proyek_lokasi where proyek.id_proyek=proyek_lokasi.id_proyek AND proyek_lokasi.id_lokasi=lokasi_point.id_lokasi AND mitra='$mitra1' AND lokasi_point.nama_lokasi_proyek = '$lokasi1' AND jenis_kerjasama='$kerjasama1' order by id_lokasi");
$koordinat7 = pg_query("SELECT distinct lokasi_point.id_lokasi, latitude, longitude, lokasi_point.nama_lokasi_proyek from lokasi_point, proyek, proyek_lokasi where proyek.id_proyek=proyek_lokasi.id_proyek AND proyek_lokasi.id_lokasi=lokasi_point.id_lokasi AND lokasi_point.nama_lokasi_proyek='$lokasi1' order by nama_lokasi_proyek");
$koordinat8 = pg_query("SELECT distinct lokasi_point.id_lokasi, latitude, longitude, lokasi_point.nama_lokasi_proyek from lokasi_point, proyek, proyek_lokasi where proyek.id_proyek=proyek_lokasi.id_proyek AND proyek_lokasi.id_lokasi=lokasi_point.id_lokasi AND jenis_kerjasama='$kerjasama1' AND lokasi_point.nama_lokasi_proyek = '$lokasi1' order by id_lokasi");
$koordinat9 =  pg_query("SELECT distinct lokasi_point.id_lokasi, latitude, longitude, lokasi_point.nama_lokasi_proyek from lokasi_point, proyek, proyek_lokasi where proyek.id_proyek=proyek_lokasi.id_proyek AND proyek_lokasi.id_lokasi=lokasi_point.id_lokasi AND tema_proyek='$tema1' order by id_lokasi");
$koordinat10 = pg_query("SELECT distinct lokasi_point.id_lokasi, latitude, longitude, lokasi_point.nama_lokasi_proyek from lokasi_point, proyek, proyek_lokasi where proyek.id_proyek=proyek_lokasi.id_proyek AND proyek_lokasi.id_lokasi=lokasi_point.id_lokasi AND tema_proyek='$tema1' AND mitra='$mitra1' order by id_lokasi");
$koordinat11 = pg_query("SELECT distinct lokasi_point.id_lokasi, latitude, longitude, lokasi_point.nama_lokasi_proyek from lokasi_point, proyek, proyek_lokasi where proyek.id_proyek=proyek_lokasi.id_proyek AND proyek_lokasi.id_lokasi=lokasi_point.id_lokasi AND tema_proyek='$tema1' AND lokasi_point.nama_lokasi_proyek = '$lokasi1' order by id_lokasi");
$koordinat12 = pg_query("SELECT distinct lokasi_point.id_lokasi, latitude, longitude, lokasi_point.nama_lokasi_proyek from lokasi_point, proyek, proyek_lokasi where proyek.id_proyek=proyek_lokasi.id_proyek AND proyek_lokasi.id_lokasi=lokasi_point.id_lokasi AND mitra='$mitra1' AND tema_proyek= '$tema1' AND jenis_kerjasama='$kerjasama1' order by id_lokasi");
$koordinat13 = pg_query("SELECT distinct lokasi_point.id_lokasi, latitude, longitude, lokasi_point.nama_lokasi_proyek from lokasi_point, proyek, proyek_lokasi where proyek.id_proyek=proyek_lokasi.id_proyek AND proyek_lokasi.id_lokasi=lokasi_point.id_lokasi AND tema_proyek= '$tema1' AND jenis_kerjasama='$kerjasama1' AND lokasi_point.nama_lokasi_proyek = '$lokasi1' order by id_lokasi");
$koordinat14 = pg_query("SELECT distinct lokasi_point.id_lokasi, latitude, longitude, lokasi_point.nama_lokasi_proyek from lokasi_point, proyek, proyek_lokasi where proyek.id_proyek=proyek_lokasi.id_proyek AND proyek_lokasi.id_lokasi=lokasi_point.id_lokasi AND tema_proyek= '$tema1' AND mitra='$mitra1' AND lokasi_point.nama_lokasi_proyek = '$lokasi1' order by id_lokasi");
$koordinat15 = pg_query("SELECT distinct lokasi_point.id_lokasi, latitude, longitude, lokasi_point.nama_lokasi_proyek from lokasi_point, proyek, proyek_lokasi where proyek.id_proyek=proyek_lokasi.id_proyek AND proyek_lokasi.id_lokasi=lokasi_point.id_lokasi AND tema_proyek= '$tema1' AND jenis_kerjasama='$kerjasama1' AND mitra='$mitra1' AND lokasi_point.nama_lokasi_proyek = '$lokasi1' order by id_lokasi");
   
  //ketika langsung di klik tanpa melakukan pilihan.
  if(($tema1=='tema') AND ($kerjasama1=='kerjasama') AND ($mitra1=='mitra') AND ($lokasi1=='lokasi'))
            {$koordinat = $koordinat1;}

   //pilih tema saja
  else if(($mitra1=='mitra') AND ($kerjasama1=='kerjasama') AND ($lokasi1=='lokasi'))
   {$koordinat = $koordinat9;}

  //pilih kerjasama saja
  else if(($tema1=='tema') AND ($mitra1=='mitra') AND ($lokasi1=='lokasi'))
    {$koordinat = $koordinat4;}

  //pilih mitra saja
  else if(($tema1=='tema') AND ($kerjasama1=='kerjasama') AND ($lokasi1=='lokasi'))
    {$koordinat = $koordinat3;}

  //pilih lokasi saja
  else if(($tema1=='tema') AND ($kerjasama1=='kerjasama') AND ($mitra1=='mitra'))
    {$koordinat = $koordinat7;}

  //pilih tema dan kerjasama
  else if(($mitra1=='mitra') AND ($lokasi1=='lokasi'))
    {$koordinat = $koordinat2;}

  //pilih tema dan mitra
  else if(($kerjasama1=='kerjasama') AND ($lokasi1=='lokasi'))
    {$koordinat = $koordinat10;}

  //pilih tema dan lokasi
  else if(($kerjasama1=='kerjasama') AND ($mitra1=='mitra'))
    {$koordinat = $koordinat11;}

  //pilih kerjasama dan mitra
  else if(($tema1=='tema') AND ($lokasi1=='lokasi'))
    {$koordinat = $koordinat0;}

  //pilih kerjasama dan lokasi
  else if(($tema1=='tema') AND ($mitra1=='mitra'))
    {$koordinat = $koordinat8;}

  //pilih mitra dan lokasi
  else if(($tema1=='tema') AND ($kerjasama1=='kerjasama'))
    {$koordinat = $koordinat5;}

//pilih tema, kerjasama, mitra, dan lokasi
  else if((isset($tema1)) AND ($tema1!='tema') AND (isset($kerjasama1)) AND ($kerjasama1!='kerjasama') AND (isset($mitra1)) AND ($mitra1!='mitra') AND (isset($lokasi1)) AND ($lokasi1!='lokasi'))
    {$koordinat = $koordinat15;}

  //pilih tema, kerjasama, dan mitra
  else if((isset($tema1)) AND ($tema1!='tema') AND (isset($kerjasama1)) AND ($kerjasama1!='kerjasama') AND (isset($mitra1)) AND ($mitra1!='mitra'))
    {$koordinat = $koordinat12;}

  //pilih tema, kerjasama, dan lokasi
  else if((isset($tema1)) AND ($tema1!='tema') AND (isset($kerjasama1)) AND ($kerjasama1!='kerjasama') AND (isset($lokasi1)) AND ($lokasi1!='lokasi'))
    {$koordinat = $koordinat13;}

  //pilih tema, mitra, dan lokasi
  else if((isset($tema1)) AND ($tema1!='tema') AND (isset($mitra1)) AND ($mitra1!='mitra') AND (isset($lokasi1)) AND ($lokasi1!='lokasi'))
    {$koordinat = $koordinat14;}

  //pilih kerjasama, mitra, dan lokasi
  else if((isset($kerjasama1)) AND ($kerjasama1!='kerjasama') AND (isset($mitra1)) AND ($mitra1!='mitra') AND (isset($lokasi1)) AND ($lokasi1!='lokasi'))
    {$koordinat = $koordinat6;}

  else 
    //umum / normal
    {$koordinat = $koordinat1;}
?>

      
    <script>

    /**
       * Elements that make up the popup.
       */
      var container = document.getElementById('popup');
      var content = document.getElementById('popup-content');
      var closer = document.getElementById('popup-closer');


      /**
       * Create an overlay to anchor the popup to the map.
       */
      var overlay = new ol.Overlay(/** @type {olx.OverlayOptions} */ ({
        element: container,
        autoPan: true,
        autoPanAnimation: {
          duration: 250
        }
      }));


      /**
       * Add a click handler to hide the popup.
       * @return {boolean} Don't follow the href.
       */
      closer.onclick = function() {
        overlay.setPosition(undefined);
        closer.blur();
        return false;
      };


      var overviewMapControl = new ol.control.OverviewMap({
        // see in overviewmap-custom.html to see the custom CSS used
        className: 'ol-overviewmap ol-custom-overviewmap',
        layers: [
          new ol.layer.Tile({
            source: new ol.source.OSM({
              'url': 'http://{a-c}.tile.opencyclemap.org/cycle/{z}/{x}/{y}.png'
            })
          })
        ],
        collapseLabel: '\u00BB',
        label: '\u00AB',
        collapsed: true
      });

      var mousePositionControl = new ol.control.MousePosition({
        coordinateFormat: ol.coordinate.createStringXY(4),
        projection: 'EPSG:4326',
        // comment the following two lines to have the mouse position
        // be placed within the map.
        className: 'custom-mouse-position',
        target: document.getElementById('mouse-position'),
        undefinedHTML: '&nbsp;'
      });

      var projectionSelect = document.getElementById('projection');
      projectionSelect.addEventListener('change', function(event) {
        mousePositionControl.setProjection(ol.proj.get(event.target.value));
      });

      var precisionInput = document.getElementById('precision');
      precisionInput.addEventListener('change', function(event) {
        var format = ol.coordinate.createStringXY(event.target.valueAsNumber);
        mousePositionControl.setCoordinateFormat(format);
      });

      var layer = new ol.layer.Tile({
        source: new ol.source.OSM()
      });

      var map = new ol.Map({
        controls: ol.control.defaults({
          attributionOptions: /** @type {olx.control.AttributionOptions} */ ({
            collapsible: false
          })
        }).extend([mousePositionControl]).extend([
          new ol.control.FullScreen()
        ]).extend([
          overviewMapControl
        ]),
        interactions: ol.interaction.defaults().extend([
          new ol.interaction.DragRotateAndZoom()
        ]),
        target:'map',
        layers: [
    new ol.layer.Tile({
            title: "Maps OSM",
            source: new ol.source.OSM()
          }), /////////////////////////////////////////////atau bisa diganti dengan => layer,
            
      
       
    ],
        overlays: [overlay],
        target: 'map',
        view: new ol.View({
       center: [13111702.0839, -264166.3698],
        zoom: 4.75
        })
      });
</script>
<?php
  if (pg_num_rows($koordinat) > 0)     
{     
  //menampilkan hasil query      
  while($k= pg_fetch_assoc($koordinat)) {          
    ?>

<div id="marker<?php echo  $k['id_lokasi'] ?>" class="edit-record" title="<?php echo  $k['nama_lokasi_proyek'] ?>" data-id="<?php echo  $k['id_lokasi'] ?>" data-idk="<?php echo  $_POST['kerjasama'] ?>" data-idm="<?php echo  $_POST['mitra'] ?>" data-idt="<?php echo  $_POST['tema'] ?>" ></div>
<button id="daerah<?php echo  $k['id_lokasi'] ?>" data-id="<?php echo  $k['id_lokasi'] ?>" class="edit-record" data-idk="<?php echo  $_POST['kerjasama'] ?>" data-idm="<?php echo  $_POST['mitra'] ?>" data-idt="<?php echo  $_POST['tema'] ?>" ><?php echo  $k['nama_lokasi_proyek'] ?> </button>
 
 <script>
$(document).ready(function(){
    $("#button_name").click(function(){
        $("#daerah<?php echo  $k['id_lokasi'] ?>").toggle();
    });
});
</script>

 <script>

      var pos<?php echo  $k['id_lokasi'] ?> = ol.proj.fromLonLat([<?php echo $k['longitude'] ?>,<?php echo $k['latitude'] ?>]);

      // Vienna marker
      var marker<?php echo  $k['id_lokasi']?> = new ol.Overlay({
        position: pos<?php echo  $k['id_lokasi'] ?>,
        positioning: 'center-center',
        element: document.getElementById('marker<?php echo  $k['id_lokasi']?>'),
        stopEvent: false
      });
      map.addOverlay(marker<?php echo  $k['id_lokasi'] ?>);

      // Vienna label
      var daerah<?php echo  $k['id_lokasi'] ?> = new ol.Overlay({
        position: pos<?php echo  $k['id_lokasi'] ?>,
        element: document.getElementById('daerah<?php echo  $k['id_lokasi'] ?>'),
        stopEvent: false
      });
      map.addOverlay(daerah<?php echo  $k['id_lokasi'] ?>);

    </script>
    <?php   }      
}     ?> 

<script>
       /* Add a click handler to the map to render the popup.
       */
      map.on('singleclick', function(evt) {
        var coordinate = evt.coordinate;
        var hdms = ol.coordinate.toStringHDMS(ol.proj.transform(
            coordinate, 'EPSG:3857', 'EPSG:4326'));

        content.innerHTML = '<p>You clicked here:</p><code>' + hdms +
            '</code>';
        overlay.setPosition(coordinate);
      });


    </script>

    <div class="modal fade" id="log-in" role="dialog" tabindex="-1">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <CENTER><h3 class="modal-title">Login</h3></CENTER>
        </div>
        <div class="modal-body">
          
              
                    <div class="panel panel-primary">
                        <div class="panel-body">
                          <form method="POST" action="log-in.php">
                
                    <div class="form-group">
                      <div class="input-group">
                        <span class="input-group-addon"><span class="glyphicon glyphicon-user"></span></span>
                        <input type="username" class="form-control" name="nama_admin" placeholder="Username" required>
                      </div>
                    </div>

                    
                    <div class="form-group">
                      <div class="input-group">
                        <span class="input-group-addon"><span class="glyphicon glyphicon-lock"></span></span>
                        <input type="password" class="form-control" name="pass_admin" placeholder="Password" required>
                      </div>    
                    </div>

                    <p align="right"><button type="submit" class="btn btn-primary">Login</button></p>

                    </form>
                </div>
            </div>
    

        </div>

      </div>
      
    </div>
  </div>

    <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                   
                    <div class="modal-body">

                      <div class="isi">
                    </div>

                    </div>
                    
                </div>
            </div>
        </div>


        <script>
        $(function(){
            $(document).on("mouseenter mouseleave",'.edit-record',function(e){
                e.preventDefault();
                $("#myModal").modal('show');
                $.post('hasil.php',
                    {id:$(this).attr('data-id'),
                     idk:$(this).attr('data-idk'),
                     idm:$(this).attr('data-idm'),
                     idt:$(this).attr('data-idt')},
                    function(html){
                        $(".isi").html(html);
                    }   
                );
            });
        });
    </script>
          
    </div>
    
      <!-- /.row -->
    </section>


  <!-- <div style="text-align: center;"><IMG SRC="D:/PKL/audit/legenda.png" ALT="image"></div>
  <div style="text-align: center">LEGENDA</div> -->
<div style="text-align: center;"><IMG SRC="Legenda.png" ALT="image"></div>



</div>



</body>
<script>
    $("#menu-toggle").click(function(e) {
        e.preventDefault();
        $("#wrapper").toggleClass("active");
        
    });
    </script>

</html>