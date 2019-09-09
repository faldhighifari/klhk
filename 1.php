<!DOCTYPE html>
<html lang="en">
<head>
  <title>Bootstrap Case</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
  <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <link href="sidebar.css" rel="stylesheet">

    <link rel="stylesheet" href="https://openlayers.org/en/v3.19.0/css/ol.css" type="text/css">
    <!-- The line below is only needed for old environments like Internet Explorer and Android 4.x -->
    <script src="https://cdn.polyfill.io/v2/polyfill.min.js?features=requestAnimationFrame,Element.prototype.classList,URL"></script>
    <script src="https://openlayers.org/en/v3.19.0/build/ol.js"></script>

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
    				<a href="#">Biro KLN</a>
                </div>
			</div>

			<div id="navbar" class="collapse navbar-collapse">
				<ul class= "nav navbar-nav navbar-right">
					<li><a href= "input_home.php">Input</a></li>
                    <li><a type="button"  data-toggle="modal" data-target="#log-in"><span class= 'glyphicon glyphicon-log-in' ></span> User</a></li>
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
                <li>
                    <a href="#anch1">
                        <span class="fa fa-anchor solo">Anchor 1</span>
                    </a>
                </li>
                <li>
                    <a href="#anch2">
                        <span class="fa fa-anchor solo">Anchor 2</span>
                    </a>
                </li>
                <li>
                    <a href="#anch3">
                        <span class="fa fa-anchor solo">Anchor 3</span>
                    </a>
                </li>
                <li>
                    <a href="#anch4">
                        <span class="fa fa-anchor solo">Anchor 4</span>
                    </a>
                </li>
            </ul>
        </nav>
    </div>
    <!-- Page content -->
    <div id="page-content-wrapper">
        <div class="page-content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-6">
                        <div class="panel panel-danger">
                            <div class="panel-heading">
                                    Panel 1
                            </div>
                            <div class="panel-body">
                                content body
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">                    
                        <div class="panel panel-success">
                            <div class="panel-heading">
                                    Panel 1
                            </div>
                            <div class="panel-body">
                                content body
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="log-in" role="dialog">
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
                          <form method="POST" action="validasi_login.php">
                
                    <div class="form-group">
                      <div class="input-group">
                        <span class="input-group-addon"><span class="glyphicon glyphicon-user"></span></span>
                        <input type="username" class="form-control" name="namaAdmin" placeholder="Username" required>
                      </div>
                    </div>

                    
                    <div class="form-group">
                      <div class="input-group">
                        <span class="input-group-addon"><span class="glyphicon glyphicon-lock"></span></span>
                        <input type="password" class="form-control" name="passAdmin" placeholder="Password" required>
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

</body>
<script>
    $("#menu-toggle").click(function(e) {
        e.preventDefault();
        $("#wrapper").toggleClass("active");
        
    });
    </script>
</html>