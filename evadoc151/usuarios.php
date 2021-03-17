<?php  session_start();  

include "conexion.php";
$conexion=conectar();
$direccion="select des from control where id='6';";
$dire=mysql_query($direccion,$conexion);
$di=mysql_fetch_object($dire);
$ip=$di->des;

/*$lemale="select des from control where id='7';";
$lema=mysql_query($lemale,$conexion);
$le=mysql_fetch_object($lema);
$emble=$le->des;*/
?>
<!DOCTYPE html >
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" type="text/css" href="<?php echo"$ip/css/imprimir.css"; ?>" media="print" />
<link href="<?php echo"../css/proweb.css"; ?>" rel="stylesheet" type="text/css" >
<link rel="shortcut icon" href="icono.ico" type="image/x-icon">
<!-- JS para control de menu-->
<?php       
    	print"<script type='text/javascript' src='../js/jquery-1.8.1.min.js'></script>   
        <script type='text/javascript' src='../js/approot.js'></script>    ";
?>

        <!-- FIN DEL JS-->
</head>
<body>
<?php
	
	$ses=$_SESSION['quien'];
	$usuario=$_SESSION['usuario'];
	$periodo=$_SESSION['periodo'];
	$periodos="select * from periodo where periodo='$periodo'";
	$per=mysql_query($periodos,$conexion);
	$p=mysql_fetch_object($per);
	$evento=$_SESSION[evento];
	/*$eventoses="select * from evento where idevento='$evento';";

	$eve=mysql_query($eventoses,$conexion);

	$ev=mysql_fetch_object($eve);*/

?>

	<div id="header">
                <div id="logos" class="group">
                    <div id="logo_sep_nombre_tec">  
                        <div id="logo_sep">
                            <img src="<?php echo"$ip/img/logoSEP_hoz.png"; ?>" width="242" height="60" border="0" />                            <img src="<?php echo"$ip/img/separador.png"; ?>" width="12" height="78" />                        
                        </div>  
                        <div id="nombre">
                            <label>INSTITUTO TECNOLÓGICO DE IZTAPALAPA II</label>
                        </div>
                    </div>                         
                    <div id="logo_dgest_tec">
                       <!-- <img src="<?php echo"$ip/img/logodgest.png"; ?>" width="114" height="60" /> -->
                       <img  src="<?php echo"$ip/img/logoregistradotec.png"; ?>" width="81" height="60" /></div>
                    </div>
		<?php 

		if($ses==1)

		{	//<li><a href='$ip/administrador/vermo.php?matricula=$usuario' >Datos</a></li><li><a href='$ip/evadoc151/horalumno.php?matricula=$usuario'>Horario</a></li>

			$datos="select * from alumnos where matricula='$usuario';";
			$dat=mysql_query($datos,$conexion);
			$d=mysql_fetch_object($dat);
			echo"
			<header id='titulo'> 
			Alumno:$usuario / $d->app $d->apm $d->nom Periodo: $p->descper";
            //<li><a href='$ip/evadoc151/panel.php?matricula=$usuario' >Inicio</a></li>
            //<li><a href='$ip/administrador/vermo.php?matricula=$usuario' >Datos</a></li>
			echo"

			<div id='nav'>
                    <div id='nav-bar'>
                        <ul>
                            <li><a href='$ip/evadoc151/horalumno.php?matricula=$usuario' >Horario</a></li>
                            <li><a href='cerrarsesion.php' >Cerrar Sesión</a></li>
                        </ul>
                    </div>
                </div>    
			";?>

		<?php

		}

		else

		{

			if($ses==2)

			{

					$datos="select * from administrador where adm='$usuario';";

					$dat=mysql_query($datos,$conexion);

					$d=mysql_fetch_object($dat);

				echo"

				<header id='titulo'> 

				Administrador: $d->nomadm Periodo: <a href='$ip/administrador/cambiape.php' target='_self' title='Cambiar Periodo en gestión'>$p->descper</a>";

				if(!empty($evento))

				{

					echo"<br>Evento: <a href='$ip/evento/evento.php' title='Para seleccionar otro, clic aquí'> $ev->idevento / $ev->descrip </a>";

				}

				echo"</header>

			<div id='nav'>

                    <div id='nav-bar'>

                        <ul>

                            

							<li><a href='#' >Alumnos</a>   

								<div class='submenu'> 

                                    <ul>

                                    	<li><a href='$ip/administrador/buscalumno.php'>Buscar</a></li>

										<li><a href='$ip/administrador/alumnos.php'>Inscritos</a></li>

										<li><a href='$ip/administrador/alumnosxmatricula.php'>Inscritos x matricula</a></li>

                                        <li><a href=''  >Cambio Carrera</a></li>

										<li><a href=''  >Traslado</a></li>

										<li><a href=''  >Bajas (T,D)</a></li>

										<li><a href='$ip/administrador/alumnosgral.php'>Todos</a></li>

                                    </ul>

                                </div> 

							</li>

							<li><a href='#' >Aspirantes</a>

								<div class='submenu'> 

                                    <ul>

										<li><a href='$ip/administrador/alumnosalta.php' >Nuevo aspirante</a></li>

                                        <li><a href='$ip/administrador/listaspirante.php' >Listado</a></li>

										

                                    </ul>

                                </div> 

							</li>

							 

							

							<li><a href='#' >Horario</a>       

                                <div class='submenu'> 

                                    <ul>

										<li><a href='$ip/administrador/horario.php'  >Horario</a></li>

										<li><a href='$ip/administrador/agregah.php'  >Agregar</a></li>
                                        <li><a href='$ip/administrador/buscaligados.php'  >Busca alumnos Mat/ligadas</a></li>

										<li><a href='$ip/administrador/horall.php'  >Todos</a></li>

                                        <li><a href='$ip/horario/reticula.php?idcar=ITIC-2010-225'  >TICS</a></li>

                                    </ul>

                                </div>      

                            </li>

						   <li> <a href='#' class=''>Configuración</a>    

                                <div id='galeria-submenu' class='submenu' style='display: none;'>

                                    <div class='left'>

                                    	<h3>Docente</h3>

                                        <ul>

                                            <li><a href='$ip/administrador/docentes.php'>Lista</a></li>

                                            <li><a href='$ip/administrador/altadoc.php'>Agregar</a></li>

											<li><a href='$ip/administrador/matedoc.php'>Materias</a></li>

                                        </ul>

                                    </div>

                                   <div class='left'>

                                    	<h3>Materias</h3>

                                        <ul>

                                            <li><a href='$ip/administrador/materias.php' >Lista</a></li>

											<li><a href='$ip/administrador/altamat.php'  >Nueva materia</a></li>

											<li><a href='$ip/administrador/matasigna.php' >Ver asignados a carrera</a></li>

											<li><a href='$ip/administrador/ligas.php' >Ligas</a></li>

											<li><a href='$ip/administrador/aula.php' >Ligas</a></li>

                                        </ul>

                                  </div>

                                   <div class='left'>

                                    	<h3>Carreras</h3>

                                        <ul>

                                            <li><a href='$ip/administrador/carrera.php'>Lista</a></li>

                                            <li><a href='#'>Agregar</a></li>

                                           

                                        </ul>

                                   </div>

								   <div class='left'>

                                    	<h3>Periodo</h3>

                                        <ul>

                                            <li><a href='$ip/administrador/periodo.php'>Lista</a></li>

                                            <li><a href='$ip/administrador/altaperiodo.php'>Agregar</a></li>

											<li><a href='$ip/administrador/control.php'>Control</a></li>

											<li><a href='$ip/administrador/reticula.php'>reticula</a></li>

											<li><a href='$ip/administrador/password.php'>password</a></li>

                                        </ul>

                                   </div>                                        

                                </div>

							</li>

							

							

							<li> <a href='#' class=''>Reportes</a>    

                                <div id='galeria-submenu' class='submenu' style='display: none;'>

                                    <div class='left'>

                                    	<h3>General</h3>

                                        <ul>

                                        	<li><a href='$ip/reporte/alumproce.php'>Procedencia Prepa</a></li>
                                            <li><a href='$ip/reporte/alumproceinsc.php'>Procedencia Inscritos</a></li>
                                            <li><a href='$ip/reporte/unlugarparati.php'>1 Lugar para ti tic</a></li>
                                            <li><a href='$ip/reporte/unlugarparatilo.php'>1 Lugar para ti log</a></li>
                                            <li><a href='$ip/reporte/unlugarparatiadm.php'>1 Lugar para ti adm</a></li>
                                            <li><a href='$ip/reporte/axa.php'>axa</a></li>

                                        	<li><a href='$ip/reporte/modulocargamatriculaticper1.php'>Carga/Matrícula/tic</a></li>

                                        	<li><a href='$ip/reporte/modulocargamatriculaadmper1.php'>Carga/Matrícula/adm</a></li>

                                        	<li><a href='$ip/reporte/modulocargamatriculalogper1.php'>Carga/Matrícula/log</a></li>



                                        	<li><a href='$ip/reporte/modulocargamatriculatic2.php'>Matrícula/tic</a></li>

                                        	<li><a href='$ip/reporte/modulocargamatriculaadm2.php'>Matrícula/adm</a></li>

                                        	<li><a href='$ip/reporte/modulocargamatriculalog2.php'>Matrícula/log</a></li>



                                            <li><a href='$ip/reporte/general.php'>Total de matricula</a></li>

                                            <li><a href='$ip/reporte/ciudad.php'>Total por Ciudad 1 Sem</a></li>
                                            <li><a href='$ip/reporte/ciudadall.php'>Total por Ciudad Todos</a></li>
											<li><a href='$ip/reporte/listagral.php'>Listas General</a></li>

											<li><a href='#'>Listas por Carrera</a></li>

											<li><a href='#'>Kardex por matricula</a></li>

											<li><a href='$ip/reporte/alumnosdiscap.php'>Alumnos Discap</a></li>

											<li><a href='$ip/reporte/curpmat.php'>curp</a></li>

											<li><a href='$ip/reporte/rerobadosxsemcar.php'>irregulares</a></li>

                                        </ul>

                                    </div>

                                   <div class='left'>

                                    	<h3>En curso (Detalle)</h3>

                                        <ul>
                                            <li><a href='$ip/reporte/mismamateria.php'>Misma materia</a></li>

                                            <li><a href='$ip/administrador/repite.php' >Repetición</a></li>

											<li><a href='$ip/administrador/especial.php' >Especial</a></li>

											<li><a href='$ip/administrador/global.php' >Global</a></li>

											<li><a href='$ip/reporte/totalespecial.php' >Total Especiales</a></li>

                                        </ul>

                                  </div>

                                   <div class='left'>

                                    	<h3>En curso</h3>

                                        <ul>

                                            <li><a href='$ip/administrador/repitesd.php' >Repetición</a></li>

											<li><a href='$ip/administrador/especialgral.php' >Especial</a></li>

											<li><a href='#' >Global</a></li>

											<li><a href='$ip/reporte/promedios.php'>Alumnos por promedio</a></li>

											<li><a href='$ip/administrador/irreguestadistica.php' >Irregulares</a></li>

											<li><a href='$ip/reporte/ligas.php' >Materias ligadas</a></li>

                                        </ul>

                                  </div>

								   <div class='left'>

                                    	<h3>Otros</h3>

                                        <ul>

                                            <li><a href='$ip/reporte/credito182tic.php' target='_blank'>Credito 182 TICs</a></li>
											<li><a href='$ip/reporte/credito182adm.php' target='_blank'>Credito 182 ADM</a></li>
											<li><a href='$ip/reporte/credito182log.php' target='_blank'>Credito 182 LOG</a></li>
											<li><a href='$ip/reporte/subesadm.php' target='_self'>SUBES ADM</a></li>

                                            <li><a href='$ip/reporte/subestic.php' target='_self'>SUBES TIC</a></li>

                                            <li><a href='$ip/reporte/subeslog.php' target='_self'>SUBES LOG</a></li>

                                            <li><a href='$ip/reporte/credencial.php' target='_self'>Credencial Esc</a></li>
											<li><a href='$ip/reporte/credencial1ro.php'>Credencial 1o</a></li>

											<li><a href='$ip/reporte/credebiblio.php' target='_self'>Credencial Biblio</a></li>

											<li><a href='$ip/administrador/alumnos_datos_crede.php'>Para credencial</a></li>

											<li><a href='$ip/reporte/alumnoscorreogral.php' target='_self'>Lista Historica Correos</a></li>
                                            <li><a href='$ip/reporte/credito208adm.php'>80% Administración </a></li>
                                            <li><a href='$ip/reporte/credito208tic.php'>80% TICS </a></li>
                                            <li><a href='$ip/reporte/credito208log.php'>80% Logística </a></li>

                                        </ul>

                                   </div>                                        

                                </div>

							</li>

                            <li><a href='#' >Bloqueos</a>   
                                <div class='submenu'> 
                                    <ul>                                      
                                        <li><a href='$ip/depto/buscalumnobl.php'>Buscar</a></li>
                                        <li><a href='$ip/depto/bloqueados.php'>Bloqueados Actual $periodo</a></li>
                                        <li><a href='$ip/depto/bloqueadosactual.php'>Historia Actual $periodo</a></li>
                                        <li><a href='$ip/depto/bloqueadosgral.php' >Historia General</a></li>
                                     </ul>
                                </div> 
                            </li>   
                            ";

							/*<li> <a href='#' class=''>Eventos</a>    

                                <div id='galeria-submenu' class='submenu' style='display: none;'>

                                	<div class='left'>

                                    	<h3>Eventos</h3>

                                        <ul>

                                            <li><a href='$ip/evento/evento.php'>Lista</a></li>

                                            <li><a href='$ip/evento/altaevento.php'>Agregar</a></li>

                                        </ul>

                                   </div>   

                                   <div class='left'>

                                    	<h3>Horario</h3>

                                        <ul>

								            <li><a href='$ip/evento/horaevento.php'  >Horario</a></li>

											<li><a href='$ip/evento/agregahtaller.php'  >Agregar</a></li>

											<li><a href='$ip/evento/horall.php'  >Todos</a></li>            

										</ul>

                                  	</div> 

                                    <div class='left'>

                                    	<h3>Ponente</h3>

                                        <ul>

                                            <li><a href='$ip/evento/ponentes.php'>Lista</a></li>

                                            <li><a href='$ip/evento/altapo.php'>Agregar</a></li>

											<li><a href='$ip/evento/tallerpo.php'>Materias</a></li>

                                        </ul>

                                    </div>

                                   <div class='left'>

                                    	<h3>Talleres</h3>

                                        <ul>

                                            <li><a href='$ip/evento/talleres.php' >Lista</a></li>

											<li><a href='$ip/evento/altaller.php'  >Nuevo Taller</a></li>

											<li><a href='$ip/evento/matasigna.php' >Ver asignados a carrera</a></li>

                                        </ul>

                                  </div>

                                   

                                </div>

							</li>
                        */
							
                            echo"
							<li><a href='#' >Servicios</a>   

								<div class='submenu'> 

                                    <ul>

										<li><a href='http://www.itiztapalapa2.edu.mx/sapce171/auditoria/programa.php'>Programa Anual</a></li>

										<li><a href='http://www.itiztapalapa2.edu.mx/sapce171/auditoria/altaserv.php'>Alta de servicio</a></li>

                                    </ul>

                                </div> 

							</li>

							<li><a href='$ip/cerrarsesion.php' >Cerrar Sesión</a></li>

                        </ul>

                    </div>

                </div>    

				";

			}

			else

			{

				if($ses==3)

				{

						$datos="select * from academico where idacad='$usuario';";

						$dat=mysql_query($datos,$conexion);

						$d=mysql_fetch_object($dat);

					echo"

					<header id='titulo'> Académico: $d->nomacad   Periodo: <a href='$ip/administrador/cambiape.php' target='_self' title='Cambiar Periodo en gestión'>$p->descper</a></header>

				<div id='nav'>

						<div id='nav-bar'>

							<ul>

								

								<li><a href='#' >Alumnos</a>   

								<div class='submenu'> 

                                    <ul>

                                    	<li><a href='$ip/administrador/buscalumno.php'>Buscar</a></li>

										<li><a href='$ip/administrador/alumnos.php'>Inscritos</a></li>

                                        

										<li><a href='$ip/administrador/alumnosgral.php'>Todos</a></li>

										<li><a href='$ip/reporte/ligas.php' >Materias ligadas</a></li>

                                    </ul>

                                </div> 

							</li>

																 

								

								<li><a href='#' >Horario</a>       

									<div class='submenu'> 

										<ul>

											<li><a href='$ip/administrador/horario.php'  >Horario</a></li>

											<li><a href='$ip/administrador/agregah.php'  >Agregar</a></li>

											<li><a href='$ip/administrador/horall.php'  >Todos</a></li>

										</ul>

									</div>      

								</li>

								<li><a href='$ip/administrador/matedoc.php'>Docente/Materias</a></li>

								

								

							   <li> <a href='#' class=''>Configuración</a>    

									<div id='galeria-submenu' class='submenu' style='display: none;'>

										<div class='left'>

											<h3>Docente</h3>

											<ul>

												<li><a href='$ip/administrador/docentes.php'>Lista</a></li>

												<li><a href='$ip/administrador/altadoc.php'>Agregar</a></li>

												<li><a href='$ip/administrador/matedoc.php'>Materias</a></li>

											</ul>

										</div>

									   <div class='left'>

											<h3>Materias</h3>

											<ul>

												<li><a href='$ip/administrador/materias.php' >Lista</a></li>

												<li><a href=''  >Nueva materia</a></li>

												<li><a href='$ip/administrador/matasigna.php' >Ver asignados a carrera</a></li>

											</ul>

									  </div>

									  <div class='left'>

											<h3>Reportes</h3>

											<ul>

												<li><a href='$ip/reporte/general.php'>Total de matricula</a></li>

											</ul>

									  </div>                             

									</div>

								</li>

								<li><a href='$ip/cerrarsesion.php' >Cerrar Sesión</a></li>

								<li><a href='$ip/administrador/password.php'>password</a></li>

								

							</ul>

						</div>

					</div>    

					";

				}

				else

				{

					if($ses==4)

					{

						$datos="select * from coordinador where idcor='$usuario';";
						$dat=mysql_query($datos,$conexion);
						$d=mysql_fetch_object($dat);

                        $carcord="select idcar from coordina where idcor='$usuario';";
                        $carc=mysql_query($carcord,$conexion);
                        $cc=mysql_fetch_object($carc);

						echo"

						<header id='titulo'> Coordinador $cc->idcar: $d->nomcor  //  Periodo: $p->descper</header>

						<div id='nav'>

							<div id='nav-bar'>

								<ul>

									<li><a href='#' >Alumnos</a>   

										<div class='submenu'> 

											<ul>                                      

												<li><a href='$ip/administrador/buscalumno.php'>Buscar</a></li>

												<li><a href='$ip/administrador/alumnosgral.php'>Todos</a></li>

												<li><a href='$ip/administrador/alumnos.php'>Inscritos</a></li>

												<li><a href='$ip/administrador/buscaligados.php'  >Busca alumnos Mat/ligadas</a></li>

											</ul>

										</div> 

									</li>	

									<li><a href='$ip/administrador/matedoc.php'>Docente/Materias</a></li>	 

									<li><a href='$ip/cerrarsesion.php' >Cerrar Sesión</a></li>

									<li><a href='$ip/administrador/password.php'>password</a></li>

								</ul>

							</div>

						</div>    

						";

					}

					else

					{

						if($ses==5)

						{

							$datos="select * from division where idiv='$usuario';";

							$dat=mysql_query($datos,$conexion);

							$d=mysql_fetch_object($dat);

							echo"

							<header id='titulo'> División de Estudios Profesionales: $d->nomd
							Periodo: <a href='$ip/administrador/cambiape.php' target='_self' title='Cambiar Periodo en gestión'>$p->descper</a>
							</header>

							<div id='nav'>

								<div id='nav-bar'>

									<ul>

										<li><a href='#' >Alumnos</a>   

											<div class='submenu'> 

												<ul>                                      

													<li><a href='$ip/administrador/buscalumno.php'>Buscar</a></li>

													<li><a href='$ip/administrador/alumnosgral.php'>Todos</a></li>

													<li><a href='$ip/administrador/alumnos.php'>Inscritos</a></li>

												</ul>

											</div> 

										</li>	

										<li><a href='#' >Aspirantes</a>

											<div class='submenu'> 

			                                    <ul>

													<li><a href='$ip/administrador/alumnosalta.php' >Nuevo aspirante</a></li>

			                                        <li><a href='$ip/administrador/listaspirante.php' >Listado</a></li>

													

			                                    </ul>

			                                </div> 

										</li>

										<li><a href='$ip/administrador/matedoc.php'>Docente/Materias</a></li>	 
                                        <li><a href='$ip/administrador/horario.php'>Horario</a></li>
										
                                        

										<li><a href='#' >Reportes</a>       

											<div class='submenu'> 

												<ul>

													<li><a href='$ip/reporte/general.php'>Total de matricula</a></li>

                                            		<li><a href='$ip/reporte/ciudad.php'>Total por Ciudad</a></li>

													<li><a href='$ip/reporte/alumnosdiscap.php'>Alumnos Discap</a></li>
                                                    <li><a href='$ip/reporte/credito208adm.php'>80% Administración </a></li>
                                                    <li><a href='$ip/reporte/credito208tic.php'>80% TICS </a></li>
                                                    <li><a href='$ip/reporte/credito208log.php'>80% Logística </a></li>
													

												</ul>

											</div>      

                            			</li>

										<li><a href='$ip/cerrarsesion.php' >Cerrar Sesión</a></li>

										<li><a href='$ip/administrador/password.php'>password</a></li>

									</ul>

								</div>

							</div>    

							";

						}

						else

						{

							if($ses==6)

							{

								$datos="select * from docente where idoc='$usuario';";

								$dat=mysql_query($datos,$conexion);

								$d=mysql_fetch_object($dat);

								echo"

								<header id='titulo'> Docente: $d->nomdoc    Periodo: $p->descper</header>

								<div id='nav'>

									<div id='nav-bar'>

										<ul>

											

											<li><a href='$ip/administrador/horadocente.php?idoc=$usuario'>Docente/Materias</a></li>	 

											<li><a href='$ip/cerrarsesion.php' >Cerrar Sesión</a></li>

											<li><a href='$ip/administrador/password.php'>password</a></li>

										</ul>

									</div>

								</div>    

								";

							}

							else

							{

								if($ses==10)

								{

									

									$datos="select * from administrador where adm='$usuario';";

									$dat=mysql_query($datos,$conexion);

									$d=mysql_fetch_object($dat);echo"

									<header id='titulo'> Centro de Cómputo: $d->nomadm</header>

								<div id='nav'>

										<div id='nav-bar'>

											<ul>

												<li><a href='$ip/administrador/scicom/docente.php' >Docentes</a>   </li>

												<li><a href='#' >Oficina</a>

													<div class='submenu'> 

														<ul>

															<li><a href='$ip/administrador/scicom/altaoficina.php'>Agregar Oficina</a></li>

															<li><a href='$ip/administrador/scicom/oficina.php'  >Lista Oficinas</a></li>

															 <li><a href='$ip/administrador/scicom/dirige.php'  >Lista Oficina por Docente </a></li>

															  <li><a href='$ip/administrador/scicom/altadirige.php'  >Asignar Docente a Oficina </a></li>

														</ul>

													</div> 

												</li>

												<li><a href='#' >Departamento</a>

													<div class='submenu'> 

														<ul>

															<li><a href='$ip/administrador/scicom/altadepto.php'>Agregar Departamento</a></li>

															<li><a href='$ip/administrador/scicom/departamento.php'  >Lista Departamentos</a></li>

															 <li><a href='$ip/administrador/scicom/encarga.php'  >Lista Departamento por Docente </a></li>

															  <li><a href='$ip/administrador/scicom/altaencarga.php'  >Asigna Docente a Departamento </a></li>

														</ul>

													</div> 

												</li>

												<li><a href='#' >Accesorios</a>

													<div class='submenu'> 

														<ul>

															<li><a href='$ip/administrador/scicom/accesorioalta.php'>Agregar Accesorio</a></li>

															<li><a href='$ip/administrador/scicom/accesorio.php'  >Lista Accesorio</a></li>

														</ul>

													</div> 

												</li>

													

												<li><a href='#' >Marcas</a>       

													<div class='submenu'> 

														<ul>

															<li><a href='$ip/administrador/scicom/marcaalta.php'  >Agregar Marca</a></li>

															<li><a href='$ip/administrador/scicom/marca.php'  >Lista Marca</a></li>

														</ul>

													</div>

												</li>  

													

												<li><a href='#' >Equipos</a>       

													<div class='submenu'> 

														<ul>

															<li><a href='$ip/administrador/scicom/equipoalta.php'  >Agregar Equipo de Computo</a></li>

															<li><a href='$ip/administrador/scicom/equipo.php'  >Lista Equipos</a></li>

															 <li><a href='$ip/administrador/scicom/asigna.php'  >Lista de Asignacion de Equipos</a></li>

															  <li><a href='$ip/administrador/scicom/altaasigna.php'  >Asigna Equipo</a></li>

														</ul>

													</div>

												</li>      

												<li><a href='#' >Configuración</a>       

													<div class='submenu'> 

														<ul>

															<li><a href='$ip/administrador/scicom/altasolicitaadmin.php' >Generar Solicitud</a></li>

															<li><a href='$ip/administrador/scicom/solicita.php' >Solicitudes</a></li>

															<li><a href='$ip/administrador/scicom/genera.php' >Seguimiento</a></li>

															<li><a href='$ip/administrador/scicom/odtm.php' >ODTM ABIERTAS</a></li>

															<li><a href='$ip/administrador/scicom/odtm2.php' >ODTM GUARDADAS</a></li>

															<li><a href='$ip/administrador/scicom/odtm3.php' >ODTM CERRADAS</a></li>

															<li><a href='$ip/administrador/scicom/odtm4.php' >ODTM CANCELADAS</a></li>

															<li><a href='$ip/administrador/scicom/personal.php' >Personal</a></li>

															<li><a href='$ip/administrador/scicom/personalalta.php' >Personal Alta</a></li>

														</ul>

													</div>      

												</li>

												

											   <li><a href='$ip/cerrarsesion.php' >Cerrar Sesión</a></li>

											</ul>

										</div>

									</div>    

									";

								}

								else

								{

									if($ses==11)

									{



										$datos="select * from docente where idoc='$usuario';";

										$dat=mysql_query($datos,$conexion);

										$d=mysql_fetch_object($dat);

										echo"

										<header id='titulo'> Desarrollo Académico: $d->nomdoc    Periodo: <a href='$ip/administrador/cambiape.php' target='_self' title='Cambiar Periodo en gestión'>$p->descper</a></header>

										<div id='nav'>

											<div id='nav-bar'>

												<ul>
                                                    <li><a href='$ip/reporte/alumproce.php'>Procedencia Prepa</a></li>
													<li><a href='#' >Evadoc</a>

														<div class='submenu'> 

						                                    <ul>

																<li><a href='$ip/evadoc151/matedoc.php' >Lista Doc</a></li>

						                                        <li><a href='$ip/evadoc151/preguntas.php' >Preguntas</a></li>

						                                    

																<li><a href='$ip/reporte/totalespecial.php' >Total Especiales</a></li>

																<li><a href='$ip/evadoc151/modulos.php' >Módulos</a></li>

						                                    </ul>

						                                </div> 

													</li>

													<li><a href='#' >Cursos</a>

														<div class='submenu'> 

						                                    <ul>

																

						                                       <li><a href='$ip/administrador/repite.php' >Repetición</a></li>

																<li><a href='$ip/administrador/especial.php' >Especial</a></li>

																<li><a href='$ip/administrador/global.php' >Global</a></li>

																

						                                    </ul>

						                                </div> 

													</li>

													<li><a href='$ip/cerrarsesion.php' >Cerrar Sesión</a></li>



												</ul>

											</div>

										</div>    

										";

									}

									else

									{

										if($ses==12)

										{

												$datos="select * from subdireccion where idsub='$usuario';";

												$dat=mysql_query($datos,$conexion);

												$d=mysql_fetch_object($dat);

											echo"

											<header id='titulo'> 

											Subdirector: $d->nomsub Periodo: <a href='$ip/administrador/cambiape.php' target='_self' title='Cambiar Periodo en gestión'>$p->descper</a>";

											if(!empty($evento))

											{

												echo"<br>Evento: <a href='$ip/evento/evento.php' title='Para seleccionar otro, clic aquí'> $ev->idevento / $ev->descrip </a>";

											}

											echo"</header>

											<div id='nav'>

							                    <div id='nav-bar'>

							                        <ul>

							                            

														<li><a href='#' >Alumnos</a>   

															<div class='submenu'> 

							                                    <ul>

																	<li><a href='$ip/administrador/alumnos.php'>Inscritos</a></li>

																	<li><a href='$ip/administrador/alumnosgral.php'>Todos</a></li>

							                                    </ul>

							                                </div> 

														</li>

														<li><a href='#' >Aspirantes</a>

															<div class='submenu'> 

							                                    <ul>

							                                        <li><a href='$ip/administrador/listaspirante.php' >Listado</a></li>

																	

							                                    </ul>

							                                </div> 

														</li>

														 

														

														<li><a href='#' >Horario</a>       

							                                <div class='submenu'> 

							                                    <ul>

																	<li><a href='$ip/administrador/horario.php'  >Horario</a></li>

							                                    </ul>

							                                </div>      

							                            </li>

													   <li> <a href='#' class=''>Configuración</a>    

							                                <div id='galeria-submenu' class='submenu' style='display: none;'>

							                                    <div class='left'>

							                                    	<h3>Docente</h3>

							                                        <ul>

							                                            <li><a href='$ip/administrador/docentes.php'>Lista</a></li>

																		<li><a href='$ip/administrador/matedoc.php'>Materias</a></li>

							                                        </ul>

							                                    </div>

							                                   <div class='left'>

							                                    	<h3>Materias</h3>

							                                        <ul>

							                                            <li><a href='$ip/administrador/materias.php' >Lista</a></li>

																		<li><a href='$ip/administrador/matasigna.php' >Ver asignados a carrera</a></li>

							                                        </ul>

							                                  </div>

							                                   <div class='left'>

							                                    	<h3>Carreras</h3>

							                                        <ul>

							                                            <li><a href='$ip/administrador/carrera.php'>Lista</a></li>

							                                        </ul>

							                                   </div>

															   <div class='left'>

							                                    	<h3>Periodo</h3>

							                                        <ul>

							                                            <li><a href='$ip/administrador/periodo.php'>Lista</a></li>

							                                            

							                                        </ul>

							                                   </div>                                        

							                                </div>

														</li>

														

														

														<li> <a href='#' class=''>Reportes</a>    

							                                <div id='galeria-submenu' class='submenu' style='display: none;'>

							                                    <div class='left'>

							                                    	<h3>General</h3>

							                                        <ul>

							                                        	<li><a href='$ip/reporte/modulocargamatriculaticper1.php'>Carga/Matrícula/tic</a></li>

							                                        	<li><a href='$ip/reporte/modulocargamatriculaadmper1.php'>Carga/Matrícula/adm</a></li>

							                                        	<li><a href='$ip/reporte/modulocargamatriculalogper1.php'>Carga/Matrícula/log</a></li>



							                                            <li><a href='$ip/reporte/general.php'>Total de matricula</a></li>

							                                            <li><a href='$ip/reporte/ciudad.php'>Total por Ciudad</a></li>

																		<li><a href='$ip/reporte/alumnosdiscap.php'>Alumnos Discap</a></li>

																		<li><a href='$ip/reporte/curpmat.php'>curp</a></li>

																		<li><a href='$ip/reporte/rerobadosxsemcar.php'>irregulares</a></li>

							                                        </ul>

							                                    </div>

							                                   <div class='left'>

							                                    	<h3>En curso (Detalle)</h3>

							                                        <ul>

							                                            <li><a href='$ip/administrador/repite.php' >Repetición</a></li>

																		<li><a href='$ip/administrador/especial.php' >Especial</a></li>

																		<li><a href='$ip/administrador/global.php' >Global</a></li>

																		<li><a href='$ip/reporte/totalespecial.php' >Total Especiales</a></li>

							                                        </ul>

							                                  </div>

							                                   <div class='left'>

							                                    	<h3>En curso</h3>

							                                        <ul>

							                                            <li><a href='$ip/administrador/repitesd.php' >Repetición</a></li>

																		<li><a href='#' >Especial</a></li>

																		<li><a href='#' >Global</a></li>

																		<li><a href='$ip/reporte/promedios.php'>Alumnos por promedio</a></li>

							                                        </ul>

							                                  </div>

															   <div class='left'>

							                                    	<h3>Otros</h3>

							                                        <ul>

							                                            <li><a href='$ip/reporte/credencial.php' target='_self'>Credencial Esc</a></li>

							                                            

																		<li><a href='$ip/reporte/credencial1ro.php'>Credencial 1o</a></li>

																		<li><a href='$ip/reporte/credebiblio.php' target='_self'>Credencial Biblio</a></li>

																		<li><a href='$ip/administrador/alumnos_datos_crede.php'>Para credencial</a></li>

							                                        </ul>

							                                   </div>                                        

							                                </div>

														</li>

														

														<li><a href='$ip/cerrarsesion.php' >Cerrar Sesión</a></li>

							                        </ul>

							                    </div>

							                </div>    

											";

										}

										else
										{	
                                            if($ses==13)
                                            {
                                                $datos="select d.nomdoc, de.nombre from docente as d, encarga as e, depto as de where de.iddepto=e.iddepto and d.idoc=e.idoc and e.iddepto='$usuario';";
                                                $dat=mysql_query($datos,$conexion);
                                                $d=mysql_fetch_object($dat);
                                                echo" <header id='titulo'> Departamento: $d->nombre Docente: $d->nomdoc <br> Periodo: <a href='$ip/administrador/cambiape.php' target='_self' title='Cambiar Periodo en gestión'>$p->descper</a></header>";
                                                if($usuario=='VIN')
                                                {
                                                    echo" 
                                                   
                                                    <div id='nav'>
                                                        <div id='nav-bar'>
                                                            <ul>
                                                                <li><a href='#' >Alumnos</a>   
                                                                    <div class='submenu'> 
                                                                        <ul>                                      
                                                                            <li><a href='$ip/depto/buscalumnod.php'>Buscar</a></li>
                                                                            
                                                                            <li><a href='$ip/depto/alumnosd.php'>Inscritos</a></li>
                                                                            <li><a href='$ip/reporte/ligas.php' >Materias ligadas</a></li>
                                                                        </ul>
                                                                    </div> 
                                                                </li>   
                                                                <li><a href='$ip/administrador/matedoc.php'>Docente/Materias</a></li>    
                                                                <li><a href='$ip/cerrarsesion.php' >Cerrar Sesión</a></li>
                                                                
                                                            </ul>
                                                        </div>
                                                    </div>    
                                                    ";
                                                }//<li><a href='$ip/administrador/password.php'>password</a></li>
                                                else
                                                {
                                                    if(($usuario=='CI')||($usuario=='RF'))
                                                    {
                                                        echo" 
                                                        
                                                        <div id='nav'>
                                                            <div id='nav-bar'>
                                                                <ul>
                                                                    <li><a href='#' >Alumnos</a>   
                                                                        <div class='submenu'> 
                                                                            <ul>                                      
                                                                                <li><a href='$ip/depto/buscalumnobl.php'>Buscar</a></li>
                                                                                <li><a href='$ip/depto/bloqueados.php'>Bloqueados Actual $periodo</a></li>
                                                                                <li><a href='$ip/depto/bloqueadosactual.php'>Historia Actual $periodo</a></li>
                                                                                <li><a href='$ip/depto/bloqueadosgral.php' >Historia General</a></li>
                                                                            </ul>
                                                                        </div> 
                                                                    </li>   
                                                                       
                                                                    <li><a href='$ip/cerrarsesion.php' >Cerrar Sesión</a></li>
                                                                    
                                                                </ul>
                                                            </div>
                                                        </div>    
                                                        ";
                                                    }
                                                    else
                                                    {
                                                        if($usuario=='DEP')
                                                        {
                                                            echo" 
                                                           
                                                            <div id='nav'>
                                                                <div id='nav-bar'>
                                                                    <ul>
                                                                        <li><a href='$ip/depto/buscalumrvadoc.php'>Buscar</a></li>   
                                                                        <li><a href='$ip/cerrarsesion.php' >Cerrar Sesión</a></li>
                                                                        
                                                                    </ul>
                                                                </div>
                                                            </div>    
                                                            ";
                                                        }
                                                    }
                                                }
                                            }
                                            else
                                            {
    											print"
    											<script languaje='JavaScript'>
    											alert('NO TIENE PERMISOS DE ACCESO');
    											window.location.href='$ip/index.php';
    											</script>";
                                            }
										}

									}

								}

							}

						}

					}

				}

				

			}

		}

		

		?>





</body>

</html>

