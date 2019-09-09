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
  <title>Biri KLN</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
  <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  

    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>

    <script src="http://openlayers.org/en/v3.17.1/build/ol.js"></script>
    <script src="https://code.jquery.com/jquery-2.2.3.min.js"></script>
    <script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=false"></script>
    <script type="text/javascript" src="http://code.jquery.com/jquery-1.11.3.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>

    <link rel="stylesheet" href="http://openlayers.org/en/v3.17.1/css/ol.css" type="text/css">

    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <link href="sidebar.css" rel="stylesheet">

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
     <nav id="spy">
        <ul>
        </ul>
    </nav>
    </div>

    <!-- Page content -->
    <div id="page-content-wrapper">
        <div class="page-content">
            <div class="container-fluid">
                <div class="row">
                  <div class='col-md-12'>
                    <h3>Ketentuan Lokasi Proyek</h3>
                    <br>

                    <h4>
                      1. Lokasi proyek di peta bukan lokasi(titik koordinat) sebenarnya dari pengerjaan proyek. </h4>
                    
                      <h4>
                      2. Lokasi proyek di peta diambil dari titik tengah koordinat wilayah daerah proyek.</h4>
                      <h4>
                      3. Lokasi proyek di beberapa tempat merupakan lokasi perjanjian proyek(bukan lokasi proyek dikerjakan).
                     </h4>
                     <h4>
                      4. Lokasi proyek kabupaten dan provinsi masih belum terpisah.
                     </h4>

                </div>
              </div>
            </div>
        </div>
    </div>
   

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

    </div>

</body>
<script>
    $("#menu-toggle").click(function(e) {
        e.preventDefault();
        $("#wrapper").toggleClass("active");
        
    });
    </script>

</html>