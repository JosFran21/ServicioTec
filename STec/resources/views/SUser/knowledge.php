<?php
     use App\myClasses\dbConnection;
     use App\myClasses\logData;
?>
<!DOCTYPE html>
<html lang="en">
 
<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Super Usuario</title>

      <!-- Bootstrap Core CSS -->
    <link href="../../dataSource/css/templates/bootstrap.css" rel="stylesheet">

    <!-- MetisMenu CSS -->
    <link href="../../dataSource/css/templates/metisMenu.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="../../dataSource/css/templates/sb-admin-2.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="../../dataSource/css/templates/font-awesome.min.css" rel="stylesheet" type="text/css">

    <!-- FontsAwsome CSS -->
    <link href="../../dataSource/css/templates/font-awesome.css" rel="stylesheet">
    <link rel='shortcut icon' href='../dataSource/img/servicio3.png' type='image'/>
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>

    <div id="wrapper">

        <!-- Navigation -->

        <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="/..">
                <IMG SRC="/dataSource/img/servicio2.png" WIDTH=150 ALT="ServicioTec">  
                </a>
            </div>
            <!-- /.navbar-header -->

            <ul class="nav navbar-top-links navbar-right">
                <!-- /.dropdown -->
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        <i class="fa fa-user fa-fw"></i> Usuario <i class="fa fa-caret-down"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-user">
                        <li><a href="dashboard/userProfile"><i class="fa fa-user fa-fw"></i> Perfil de usuario</a>
                        </li>
                        <li><a href="/logOut"><i class="fa fa-gear fa-fw"></i> Cerrar Sesión</a>
                        </li>
                    </ul>
                    <!-- /.dropdown-user -->
                </li>
                <!-- /.dropdown -->
            </ul>
            <!-- /.navbar-top-links -->

			<div class="navigation">
				<div class="container">					
					<div class="navbar-header">
						<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target=".navbar-collapse.collapse">
							<span class="sr-only">Toggle navigation</span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
						</button>
					</div>
					
					<div class="navbar-collapse collapse">							
						<div class="menu">
							<ul class="nav nav-tabs" role="tablist">
                                <li>
                                    <a href="/dashboard"><i class="fa fa-dashboard fa-fw"></i> Inicio</a>
                                </li>
                                 <li class="dropdown">
                                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                                        <i class="fa fa-user fa-fw"></i> Peticiones <i class="fa fa-caret-down"></i>
                                    </a>
                                    <ul class="dropdown-menu dropdown-user">
                                            <li>
                                                <a href="/Usuarios/?type=pendientes">Pendientes</a>
                                            </li>
                                            
                                            <li>
                                                <a href="/Usuarios/?type=rechazados">Rechazadas</a>
                                            </li>
                                    </ul>
                                <!-- /.dropdown-user -->
                                </li>
                                
                                <li>
                                    <a href="/foro"><i class="fa fa-book fa-fw"></i> Foro</a>
                                </li>
                                <li>
                                    <a href="#"><i class="fa fa-circle fa-fw"></i> Knowledge</a>
                                </li>
                                <li>
                                    <a href="/tickets"><i class="fa fa-ticket fa-fw"></i> Tickets</a>
                                </li>
                                <li>
                                    <a href="/inventario"><i class="fa fa-square fa-fw"></i> Inventario</a>
                                </li>				
							</ul>
						</div>
					</div>				
				</div>
			</div>	
            
            <!-- /.navbar-static-side -->
        </nav>
       
            <div class="row">

                <div class="col-lg-12">
                        <div class="panel panel-default"aria-multiselectable="true">
                            
                            <div class="panel-heading">
                                <span><h2>Knowledge: </h2></span>
                            </div>
                            
                            <div class="panel-body">
                                <form id="formulario" action="/knowledgeregistro" method="post" role="form">
                                            <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
                                    <div class="form-group">
                                        <label>Tema:</label>
                                         <input class="form-control" type="text" placeholder="tema" id="tema" name="tema" required/>
                                    </div>
                                    <div class="form-group">
                                        <label>Título:</label>
                                         <input class="form-control" type="text" placeholder="título" id="titulo" name="titulo" required/>
                                    </div>
                                     <input type="text" hidden placeholder="id" id="id" name="id" value="<?php echo logData::getData('id'); ?>" />
                                    <textarea class="ckeditor" placeholder="Introduzca aquí la información..." name="info" id="info" rows="10" cols="80">
                                         
                                    </textarea>
                                    <button type="submit" class="btn btn-primary " style="margin-top:10px;">Registrar tema</button>
                                </form>
                            </div>
                        </div>

            </div>
            <!-- /.row -->
        

    	
    <script src="../../vendors/ckeditor/ckeditor.js"></script>
    <!-- jQuery -->
    <script src="../../dataSource/js/jquery/jquery.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="../../dataSource/js/templates/bootstrap.min.js"></script>

    <!-- Metis Menu Plugin JavaScript -->
    <script src="../../dataSource/js/templates/metisMenu.min.js"></script>

    <!-- Custom Theme JavaScript -->
    <script src="../../dataSource/js/templates/sb-admin-2.js"></script>

    <!-- DataTables JavaScript -->
    <script src="../../dataSource/js/jquery/jquery.dataTables2.js"></script>
    <script src="../../dataSource/js/templates/dataTables.bootstrap.min.js"></script>
    <script src="../../dataSource/js/templates/dataTables.responsive.js"></script>

     <!-- Page-Level Demo Scripts - Tables - Use for reference -->
    <script>
    $(document).ready(function() {
        $('#dataTables-example').DataTable({
            responsive: true
        });
    });
    </script>
    
</body>

</html>
