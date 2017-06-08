<?php
    use App\myClasses\dbConnection;
    use App\myClasses\logData;
    use App\myClasses\Type;
    if($_GET['type']=="rechazados")
    {
$valores=["id","nombre", "apellido","estado", "email"];
$tabla="users";
$where=[["users.estado",'0']];
$join=[["mortals", "users.id","mortals.id_usuario"]];
//$datos = dbConnection::select($valores,$tabla,$where,$join);
$datos = dbConnection::RAW("SELECT nombre, id, apellido, estado, email FROM `users` WHERE users.estado = '0'");

$existeGet = false;
    if(isset($_GET['id']))
    {
        foreach($p as $datos)
        {
            if($p['id']==$_GET['id'])
            {
                $existeGet = true;
            }
        }
    }
    }
    elseif($_GET['type']=="pendientes"){
$datos = dbConnection::RAW("SELECT nombre, id, apellido, estado, email FROM `users` WHERE users.estado IS NULL");

$existeGet = false;
    if(isset($_GET['id']))
    {
        foreach($p as $datos)
        {
            if($p['id']==$_GET['id'])
            {
                $existeGet = true;
            }
        }
    }




}

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

    <!-- DataTables CSS -->
    <link href="../../dataSource/css/templates/dataTables.bootstrap.css" rel="stylesheet">

    <!-- DataTables Responsive CSS -->
    <link href="../../dataSource/css/templates/dataTables.responsive.css" rel="stylesheet">

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
                                <!-- /.dropdown-user /inventario-->
                                </li>
                                
                                <li>
                                    <a href="/foro"><i class="fa fa-book fa-fw"></i> Foro</a>
                                </li>
                                <li>
                                    <a href="/knowledge"><i class="fa fa-circle fa-fw"></i> Knowledge</a>
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
                            
                            <div class="col-lg-12">
                                <?php if ($_GET['type']=="rechazados") { ?>
                                <h1 class="page-header">Usuarios rechazados.</h1>
                                <?php }elseif ($_GET['type']=="pendientes") {?>
                                <h1 class="page-header">Usuarios pendientes.</h1>
                                <?php } ?>
                            </div>
                            
                            <div class="panel-body">
                                    <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                                        <thead>
                                            <tr>
                                                <th>Correo</th>
                                                <th>Nombre</th>
                                                <th>Estado</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        <?php foreach($datos as $d): ?>
                                            <tr class="odd gradeX">
                                                <td><?php echo $d['email']; ?></td>
                                                <td><?php echo $d['nombre'] . " " . $d['apellido']; ?></td>
                                                <td><?php if ($d['estado']==''){?>
                                                <button class="btn btn-success" onclick="alta('<?php echo$d['id']?>', '<?php echo$d['nombre']?>'); ">Aceptar</button>
                                                <button class="btn btn-danger" onclick="rechazar('<?php echo$d['id']?>', '<?php echo$d['nombre']?>'); ">Rechazar</button>
                                                <button class="btn btn-primary" onclick="Admin('<?php echo$d['id']?>', '<?php echo$d['nombre']?>'); ">Hacer Administrador</button>
                                                <?php } elseif  ($d['estado']=='0'){ ?>
                                                <button class="btn btn-success" onclick="alta('<?php echo$d['id']?>', '<?php echo$d['nombre']?>'); ">Aceptar</button>
                                                <?php } ?>
                                                </td>     
                                        <?php endforeach; ?>
                                        </tbody>
                                    </table>
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
    var json = 0;
    var id = 0;
    var idDoctor = 0;
    var idCita = 0;
    var csrfVal="<?php echo csrf_token(); ?>";
    $(document).ready(function() {
        $('#dataTables-example').DataTable({
            responsive: true,
            "columnDefs": [
                { "width": "10%", "targets": 0 },
                { "width": "20%", "targets": 1 },
                { "width": "50%", "targets": 2 },
                { "width": "20%", "targets": 3 }
            ],
            "order": [[ 2, "asc" ]]
        });
    });
        function rechazar(ID, Name){
         <?php if ($_GET['type']=="pendientes") { ?>
        $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': csrfVal
                },
                async: false
            })
        var parametros = {
                "ID" : ID,
                "nombre" : Name

        };

        $.ajax({
                data:  parametros,
                url:   '/ajaxAeP',
                type:  'post',
                beforeSend: function () {
                        $('#dataTables-example').prop('action', "/Usuarios/?type=pendientes");
                }
        });

        <?php } ?>
        location.reload(true);
    }




    function Admin(ID, Name){

        $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': csrfVal
                },
                async: false
            })
        var parametros = {
                "ID" : ID,
                "nombre" : Name

        };

        $.ajax({
                data:  parametros,
                url:   '/ajaxAdmin',
                type:  'post',
                beforeSend: function () {
                        $('#dataTables-example').prop('action', "/Usuarios/?type=pendientes");
                        alta(ID,Name);
           }
              });

        location.reload(true);
    }

    function alta(ID, Name){
         <?php if ($_GET['type']=="pendientes") { ?>
        $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': csrfVal
                },
                async: false
            })
        var parametros = {
                "ID" : ID,
                "nombre" : Name

        };

        $.ajax({
                data:  parametros,
                url:   '/ajaxAP',
                type:  'post',
                beforeSend: function () {
                        $('#dataTables-example').prop('action', "/Usuarios/?type=pendientes");
           }
              });

        <?php }elseif ($_GET['type']=="rechazados") {?>
        $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': csrfVal
                },
                async: false
            })
        var parametros = {
                "ID" : ID,
                "nombre" : Name

        };


        $.ajax({
                data:  parametros,
                url:   '/ajaxAR',
                type:  'post',
                beforeSend: function () {
                        $('#dataTables-example').prop('action', "/Usuarios/?type=rechazados");
                }
        });
        <?php } ?>
        location.reload(true);
    }




    </script>
    
</body>

</html>
