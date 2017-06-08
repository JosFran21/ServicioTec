<?php
     use App\myClasses\dbConnection;
     use App\myClasses\logData;
    use Illuminate\Support\Facades\DB;
    $nuevos = DB::table("ticket_sus")->join("estados", "ticket_sus.id_estado", "estados.id_estado")->where("estado", "Nuevo")->groupBy("estado")->count();
    $sin = DB::table("ticket_sus")->join("estados", "ticket_sus.id_estado", "estados.id_estado")->where("estado", "Sin resolver")->groupBy("estado")->count();
    $completado = DB::table("ticket_sus")->join("estados", "ticket_sus.id_estado", "estados.id_estado")->where("estado", "Completado")->groupBy("estado")->count();
    $espera = DB::table("ticket_sus")->join("estados", "ticket_sus.id_estado", "estados.id_estado")->where("estado", "Espera")->groupBy("estado")->count();
    $diferido = DB::table("ticket_sus")->join("estados", "ticket_sus.id_estado", "estados.id_estado")->where("estado", "Diferido")->groupBy("estado")->count();
    
    $todo = $nuevos + $sin + $completado + $espera +  $diferido;

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
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.6.0/Chart.bundle.min.js"></script>
    <scrip src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.6.0/Chart.min.js"></script>

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

            
                            
                            <div class="panel-heading">
                                <span><h2>Administrador: <?php echo logData::getData('nombre') . " " . logData::getData('apellido'); ?></h2></span>
                            </div>
                            
                            <div id="tablist">
                                <!-- Desplegable información Personal--> 
                                <div>
                                    <div class="panel-heading">
                                        <h4>Dashboard.</h2>
                                    </div> 
                                        <table>
                                        <tr>
                                        <td>
                                        <div>
                                            <canvas id="myChart" width="300" height="300"></canvas>
                                        </div>
                                        </td>
                                        <td>
                                        <div>
                                            <canvas id="myChart2" width="310" height="310"></canvas>
                                        </div>
                                        </td>
                                        </tr>
                                        </table>
                                    </div>
                                </div>
                                
                        


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
    var data = {
    datasets: [{
        data: [<?php echo $nuevos.",".$diferido.",".$espera;?>],
        
backgroundColor: [
                'rgba(255, 99, 132, 0.2)',
                'rgba(54, 162, 235, 0.2)',
                'rgba(255, 206, 86, 0.2)',

            ]
    }],

    // These labels appear in the legend and in the tooltips when hovering different arcs
    labels: [
        'Nueva',
        'Diferido',
        'Espera'
    ]}
    var ctx = document.getElementById("myChart");
    var myDoughnutChart = new Chart(ctx, {
        type: 'doughnut',
        data: data
    });


var data2 = {
    datasets: [{
        data: [<?php echo $completado.",".$sin.",".$todo;?>],
        
backgroundColor: [
                'rgba(255, 99, 132, 0.2)',
                'rgba(54, 162, 235, 0.2)',
                'rgba(255, 206, 86, 0.2)',

            ]
    }],

    // These labels appear in the legend and in the tooltips when hovering different arcs
    labels: [
        'Completados',
        'Sin completar',
        'Todos'
    ]}
    var ctx2 = document.getElementById("myChart2");
    var myDoughnutChart = new Chart(ctx2, {
        type: 'doughnut',
        data: data2
    });
    </script>
    
</body>

</html>
