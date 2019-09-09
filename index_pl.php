<!DOCTYPE html>
<?php
$conn_string = "host=localhost port=5433 dbname=pkl user=postgres password=student";

$connection = pg_connect($conn_string);
?>
<html lang="en">
<head>
  <title>Biro KLN</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
  <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <link href="sidebar.css" rel="stylesheet">

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
                    <a href="index6.php">&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp Web Biro KLN</a>
                </div>
            </div>

            <div id="navbar" class="collapse navbar-collapse">
                <ul class="nav navbar-nav">
                     <li><a></a></li>
                    <li><a></a></li>
                     <li><a id="menu-toggle" href="#" class="glyphicon glyphicon-align-justify btn-menu toggle">
                        <i class="fa fa-bars"></i>
                    </a></li>
                    <li><a href= "index6.php">Home</a></li>
                    <li><a href= "FAQ.php">FAQ</a></li>
                </ul>
                <ul class= "nav navbar-nav navbar-right">
                    
                    <li><a href= "index_proyek.php">Proyek</a></li>
                    <li><a href= "index_lokasi.php">Lokasi</a></li>
                    <li><a class="btn btn-danger" href='Keluar.php'><span class='glyphicon glyphicon-log-out'></span> Logout</a></li>
                </ul>
            </div><!--/.nav-collapse -->
        </div>
    </nav>
    <!-- Sidebar -->
    <div id="sidebar-wrapper">
        <nav id="spy">
            <ul class="sidebar-nav nav">
                <li class="sidebar-brand">
                    <a href="#home"><span class="fa fa-home solo">Home</span></a>
                </li>
            </ul>
        </nav>
    </div>

             <div id="page-content-wrapper">
                    <div class="page-content">
                        <div class="container-fluid">
<?php   
$nilai= $_GET['nilai'];
?>
                <h3>Data Proyek - Lokasi</h3>
                             
             <div>  
                <a href="index_pl.php?nilai=<?php echo $nilai ?>" id="loadDataButton" class="btn btn-default">Load Data</a>
            </div>
<br>

<form action="cek.php?nilai=<?php echo $nilai ?>"  method="POST"> 
                                    <div>
                                    <select id="demo3" name="nama_lokasi_proyek[]"  multiple="multiple">
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
                         
                                     <button  class="btn btn-primary">Add Data</button>
                    </div>
</form>
            
<hr>
<table class="table table-bordered table-stripped">
    <thead>
        <th>#</th>
        <th>ID</th>
        <th>Proyek</th>
        <th>Nama Lokasi</th>
        <th>Option</th>
    </thead>

           <?php

    

  
    
    $hap = pg_query("SELECT * from proyek_lokasi, proyek where proyek.id_proyek=proyek_lokasi.id_proyek AND proyek_lokasi.id_proyek ='$nilai' ");
   

    $i      = 1;
    while($record= pg_fetch_assoc($hap)) {

    ?>

    <tr>
        <td><?php echo $i ?></td>
        <td><?php echo  $record['id_proyek'] ?></td>
        <td><?php echo  $record['proyek'] ?></td>
        <td><?php echo  $record['nama_lokasi_proyek'] ?></td>
        
        <td>
           
            <button data-idk="<?php echo  $record['id_proyek'] ?>" data-idm="<?php echo  $record['id_lokasi'] ?>" value="<?php echo  $record['id_proyek'] ?>" class="edit">Hapus</button>
          
        </td>
    </tr>
    <?php
        $i++;
    }
     
    
?>
</table>



                        </div>
                    </div>
            </div>
</div>
 <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                   
                    <div class="modal-body">
                    </div>
                    
                </div>
            </div>
        </div>


        <script>
        $(function(){
            $(document).on('click','.edit',function(e){
                e.preventDefault();
                $("#myModal").modal('show');
                $.post('hapuspl.php',
                    {
                     idk:$(this).attr('data-idk'),
                     idm:$(this).attr('data-idm')},
                    function(html){
                        $(".modal-body").html(html);
                    }   
                );
            });
        });
    </script>
</body>
<script>
    $("#menu-toggle").click(function(e) {
        e.preventDefault();
        $("#wrapper").toggleClass("active");
        
    });
    </script>
</html>