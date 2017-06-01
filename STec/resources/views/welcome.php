<!DOCTYPE html>

<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Servicio Técnico</title>

    <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
	<link rel="stylesheet" href="css/font-awesome.min.css">
	<link rel="stylesheet" href="css/animate.css">
	<link href="css/prettyPhoto.css" rel="stylesheet">
	<link href="css/style.css" rel="stylesheet" />	


  </head>
  <body>
	<header>		
		<nav class="navbar navbar-default navbar-fixed-top" role="navigation">
			<div class="navigation">
				<div class="container">					
					<div class="navbar-header">
						<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target=".navbar-collapse.collapse">
							<span class="sr-only">Toggle navigation</span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
						</button>
						<div class="navbar-brand">
							<a href="#"><h1><span>Servico</span>Técnico</h1></a>
						</div>
					</div>
					
					<div class="navbar-collapse collapse">							
						<div class="menu">
							<ul class="nav nav-tabs" role="tablist">
								<li role="presentation"><a href="/home" class="active">Inicio</a></li>
								<li role="presentation"><a href="#" data-target="#login" data-toggle="modal">Inicio de sesión</a></li>
								<li role="presentation"><a href="#registro">Registro</a></li>
								<li role="presentation"><a href="#conatcat-info">Contacto</a></li>					
							</ul>
						</div>
					</div>				
				</div>
			</div>	
		</nav>		
	</header>
	
	<section id="main-slider" class="no-margin">
        <div class="carousel slide">      
            <div class="carousel-inner">
                <div class="item active" style="background-image: url(images/inicio.jpg)">
                    <div class="container">
                        <div class="row slide-margin">
                            <div class="col-sm-6">
                                <div class="carousel-content">
                                    <h2 class="animation animated-item-1">Bienvenido a  <span>la empresa</span></h2>
                                    <p class="animation animated-item-2">Te brindaremos el apoyo que necesites en tu trabajo</p>
                                    <a class="btn-slide animation animated-item-3" href="#registro">Registrate</a>
                                </div>
                            </div>

                            <div class="col-sm-6 hidden-xs animation animated-item-4">
                                <div class="slider-img">
                                    <!--<img src="images/slider/img3.png" class="img-responsive">-->
                                </div>
                            </div>

                        </div>
                    </div>
                </div><!--/.item-->             
            </div><!--/.carousel-inner-->
        </div><!--/.carousel-->
    </section><!--/#main-slider-->
	
	<div class="feature">
		<div class="container">
			<div class="text-center">
				<div class="col-md-3">
					<div class="hi-icon-wrap hi-icon-effect wow fadeInDown" data-wow-duration="1000ms" data-wow-delay="300ms" >
						<i class="fa fa-book"></i>	
						<h2>Knowledge</h2>
						<p>Una sección especial para ayudarte con problemas comunes</p>
					</div>
				</div>
				<div class="col-md-3">
					<div class="hi-icon-wrap hi-icon-effect wow fadeInDown" data-wow-duration="1000ms" data-wow-delay="600ms" >
						<i class="fa fa-laptop"></i>	
						<h2>Apoyo Laboral</h2>
						<p>Te mantendremos informado de la situación de tus tickets, através de correo.</p>
					</div>
				</div>
				<div class="col-md-3">
					<div class="hi-icon-wrap hi-icon-effect wow fadeInDown" data-wow-duration="1000ms" data-wow-delay="900ms" >
						<i class="fa fa-heart-o"></i>	
						<h2>Foro</h2>
						<p>Un espacio para compartir las problemáticas sin resolver.</p>
					</div>
				</div>
				<div class="col-md-3">
					<div class="hi-icon-wrap hi-icon-effect wow fadeInDown" data-wow-duration="1000ms" data-wow-delay="1200ms" >
						<i class="fa fa-cloud"></i>	
						<h2>Estadísticas en la nube</h2>
						<p>Se podrá visualizar las estádisticas de la empresa a nivel global con información oportuna.</p>
					</div>
				</div>
			</div>
		</div>
	</div>

    <!--registro-->
    <section id ="registro" class="section-padding">
      <div class="container">
        <div class="row">
          <div class="header-section text-center">
            <h1>Registrate</h1>
            <p>Esta herramienta tiene la intención de disminuir costos, simplificar tareas y permitir una mayor eficiencia de trabajo para todos. <br>¿Que esperas para registrarte?</p>
            <hr class="bottom-line">
          </div>
          <div id="error" class="alert alert-danger" style="visibility:hidden;display: none;"></div>
          <div id="registered" class="alert alert-success" style="visibility:hidden; display: none;"></div>
          <?php if(isset($error)){
            if(count($error)>0){
              echo '<script type="text/javascript">
                          var errorDiv = document.getElementById(\'error\');
                          document.getElementById(\'error\').style.visibility = "visible";
                          document.getElementById(\'error\').style.display = "block";
                        </script>';        
              foreach($error as $e)
                if($e=="NULLS"){
                  echo '<script type="text/javascript">
                        errorDiv.innerHTML=errorDiv.innerHTML+"Porfavor llene todos los formularios<br>";
                        </script>';
                }
                elseif($e=="denied"){
                  echo '<script type="text/javascript">
                          errorDiv.innerHTML=errorDiv.innerHTML+"Su solicitud ya fue previamente denegada<br>";
                        </script>';
                }
                elseif($e=="registered"){
                  echo '<script type="text/javascript">
                          errorDiv.innerHTML=errorDiv.innerHTML+"Su usuario esta en proceso de aceptación<br>";
                        </script>';
                }
                elseif($e=="passwords"){
                  echo '<script type="text/javascript">
                          errorDiv.innerHTML=errorDiv.innerHTML+"Porfavor revise que las contraseñas sean iguales<br>";
                        </script>';
                }
            }
            elseif(count($error)==0){
              echo '<script type="text/javascript">
                          var registered = document.getElementById(\'registered\');
                          registered.style.visibility = "visible";
                          registered.style.display = "block";
                          registered.innerHTML="Su registro a sido guardado, espere la confirmación en su correo!";
                        </script>';   
            }
          }
          ?>
          
          <form action="/signUp" method="post" role="form" class="contactForm">
            <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
              <div class="col-md-6 col-sm-6 col-xs-12 left">
                <div class="form-group">
                    <input type="email" class="form-control" name="email" id="email" placeholder="Tu Email" minlength=5/>
                    <div class="validation"></div>
                </div>
                <div class="form-group">
                    <input type="password" class="form-control" name="pass" id="pass" placeholder="Tu contraseña" minlength=6/>
                    <div class="validation"></div>
                </div>
                <div class="form-group">
                    <input type="password" class="form-control" name="pass2" id="pass" placeholder="Confirmar contraseña" data-rule="password" minlength=6/>
                    <div class="validation"></div>
                </div>
                <div class="form-group">
                    <input type="text" name="name" class="form-control form" id="name" placeholder="Tu nombre" minlength=2  />
                    <div class="validation"></div>
                </div>
                <div class="form-group">
                    <input type="text" name="last" class="form-control form" id="last" placeholder="Tu apellido" minlength=2 />
                    <div class="validation"></div>
                </div>
                <div class="form-group">
                    <input type="number" name="cell" class="form-control form" id="last" placeholder="Tu celular" min=10000  />
                    <div class="validation"></div>
                </div>
                
              </div>
              
              <div class="col-md-6 col-sm-6 col-xs-12 right">
                <div class="form-group">
                    <input type="number" name="tel" class="form-control form" id="last" placeholder="Tu telefono" minlength=10000  />
                    <div class="validation"></div>
                </div>
                <div class="form-group">
                    <input type="number" name="ext" class="form-control form" id="last" placeholder="Tu extensión" minlength=1 />
                    <div class="validation"></div>
                </div>
                <div class="form-group">
                    <input type="text" name="area" class="form-control form" id="last" placeholder="Tu area de trabajo" minlength=2 />
                    <div class="validation"></div>
                </div>
                <div class="form-group">
                    <input type="text" name="work" class="form-control form" id="last" placeholder="Tu trabajo" minlength=2 />
                    <div class="validation"></div>
                </div>
                
                <div class="form-group">
                    <input type="text" name="country" class="form-control form" id="country" placeholder="Tu Pais" minlength=2 />
                    <div class="validation"></div>
                </div>
              </div>
              
              <div class="col-xs-12" style="text-align:center">
                <!-- Button -->
                <button type="submit" id="submit" name="submit" class="btn btn-info" value="ok" >Registrarme</button>
              </div>
          </form>
          
        </div>
      </div>
    </section>
    <!--/ registro-->


	
	<section id="conatcat-info">
        <div class="container">
            <div class="row">
                <div class="col-sm-8">
                    <div class="media contact-info wow fadeInDown" data-wow-duration="1000ms" data-wow-delay="600ms">
                        <div class="pull-left">
                            <i class="fa fa-phone"></i>
                        </div>
                        <div class="media-body">
                            <h2>Necesitas ayuda?</h2>
                            <p>Contáctanos por medio del correo servicetecnique@empresa.com</p>
                        </div>
                    </div>
                </div>
            </div>
        </div><!--/.container-->    
    </section><!--/#conatcat-info-->


<div class="modal fade" id="login" role="dialog">
      <div class="modal-dialog modal-sm">
      
        <!-- Modal content no 1-->
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h4 class="modal-title text-center form-title">Inicio de sesión</h4>
          </div>
          <div class="modal-body padtrbl">

            <div class="login-box-body">
            <?php
                if(!isset($_GET['error'])):?>
            <div id="errorlogIn" class="alert alert-danger" style="visibility:hidden;display: none;"></div>
            <?php else: ?>
            <script>window.alert("Datos erroneos, verifica");</script>
            <div id="errorlogIn" class="alert alert-danger">Datos erroneos, verifica</div>
            <?php endif; ?>
              <div class="form-group">
                <form name="logIn" id="loginForm" action="/logIn" method="post">
                  <input type="hidden" name="_token" id="_token" value="<?php echo csrf_token(); ?>">
                 <div class="form-group has-feedback"> <!----- username -------------->
                      <input class="form-control" placeholder="Email o usuario"  id="email" type="text" name="email"/> 
            <span style="display:none;font-weight:bold; position:absolute;color: red;position: absolute;padding:4px;font-size: 11px;background-color:rgba(128, 128, 128, 0.26);z-index: 17;  right: 27px; top: 5px;" id="span_loginid"></span><!---Alredy exists  ! -->
                      <span class="glyphicon glyphicon-user form-control-feedback"></span>
                  </div>
                  <div class="form-group has-feedback"><!----- password -------------->
                      <input class="form-control" placeholder="Contraseña" id="pass" type="password" name="pass"/>
            <span style="display:none;font-weight:bold; position:absolute;color: grey;position: absolute;padding:4px;font-size: 11px;background-color:rgba(128, 128, 128, 0.26);z-index: 17;  right: 27px; top: 5px;" id="span_loginpsw"></span><!---Alredy exists  ! -->
                      <span class="glyphicon glyphicon-lock form-control-feedback"></span>
                  </div>
                    <div class="row">
                      <div class="col-xs-12">
                          <button type="submit" class="btn btn-green btn-block btn-flat" style="margin-top:10px;">Sign In</button>
                      </div>
                    <div>
                </form>
              </div>
            </div>
          </div>
        </div>

      </div>
    </div>
	
	
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
	<script src="js/jquery-2.1.1.min.js"></script>	
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
	<script src="js/jquery.prettyPhoto.js"></script>
    <script src="js/jquery.isotope.min.js"></script>  
	<script src="js/wow.min.js"></script>
	<script src="js/functions.js"></script>
	
</body>
</html>