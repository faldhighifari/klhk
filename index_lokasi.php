<!DOCTYPE html>
<html lang="en">
<head>
  <title>Biro KLN</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
  <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

  <link href="sidebar.css" rel="stylesheet">

  <script type="text/javascript">
    $(window).load(function(){
        loadData();

        $("#loadDataButton").click(function(){
            loadData();
        });

        $("#addButton").click(function(){
            addForm();
        });

        $("#data-view").on("click", "#simpanButton", function(){
            simpan();
        });

        $("#data-view").on("click", "#updateButton", function(){
            update();
        });

        $("#data-view").on("click", "#editButton", function(){
            updateForm($(this).attr("value"));
        });

        $("#data-view").on("click", "#deleteButton", function(){
            confirm("Hapus Data?");
            hapus($(this).attr("value"));
        });
    });

    function loadData(){
        $.ajax({
            url: 'lokasi/data-produk.php',
            method: "GET",
        }).done(function(data){
            $("#data-view").html(data);
        });
    }

    function addForm(){
        $.ajax({
            url: 'lokasi/form-new.php',
            method: "GET",
        }).done(function(data){
            $("#data-view").html(data);
        });
    }

    function updateForm(id){
        $.ajax({
            url: 'lokasi/form-update.php?id='+id,
            method: "GET",
            data: {id: id}
        }).done(function(data){
            $("#data-view").html(data);
        });
    }

    function hapus(id){
        $.ajax({
            url: 'lokasi/hapus.php',
            method: "GET",
            data: { id: id },
        }).done(function(data){
            $("#data-view").html(data);
        });
    }

    function simpan() {
        $.ajax({
            url: "lokasi/simpan.php",
            method: "POST",
            data: {
                nama_lokasi_proyek: $("#nama_lokasi_proyek").val(),
                longitude: $("#longitude").val(),
                latitude: $("#latitude").val()
            },
        }).done(function(data){
            $("#data-view").html(data);
        });
    }

    function update() {
        $.ajax({
            url: $("form").attr("action"),
            method: "POST",
            data: {
                nama_lokasi_proyek: $("#nama_lokasi_proyek").val(),
                longitude: $("#longitude").val(),
                latitude: $("#latitude").val()
            },
        }).done(function(data){
            $("#data-view").html(data);
        });
    }

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
					
                    <li><a href= "index_proyek.php">Proyek</a></li>
                    <li class="active"><a href= "index_lokasi.php">Lokasi</a></li>
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
                    <a href="index_lokasi.php"><span class="fa fa-home solo">Lokasi</span></a>
                </li>
            </ul>
        </nav>
    </div>

         <div id="page-content-wrapper">
        <div class="page-content">
            <div class="container-fluid">

            <div>
                <button id="loadDataButton" class="btn btn-default">Load Data</button>
                <button id="addButton" class="btn btn-primary">Add Data</button>
            </div>

            <div id="data-view"></div>


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