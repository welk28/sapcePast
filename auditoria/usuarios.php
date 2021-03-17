<?php  session_start();  

include "conexion.php";
$conexion=conectar();
$direccion="select des from control where id='6';";
$dire=mysql_query($direccion,$conexion);
$di=mysql_fetch_object($dire);
$ip=$di->des;

?>
<!DOCTYPE html >
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" type="text/css" href="<?php echo"$ip/css/imprimir.css"; ?>" media="print" />
<link href="<?php echo"css/proweb.css"; ?>" rel="stylesheet" type="text/css" >
<link rel="shortcut icon" href="icono.ico" type="image/x-icon">
<!-- JS para control de menu-->
<?php       
    	print"<script type='text/javascript' src='js/jquery-1.8.1.min.js'></script>   
        <script type='text/javascript' src='js/approot.js'></script>    ";
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
		{	
			$datos="select * from alumnos where matricula='$usuario';";
			$dat=mysql_query($datos,$conexion);
			$d=mysql_fetch_object($dat);
			echo"
			<header id='titulo'> 
			Alumno:$usuario / $d->app $d->apm $d->nom Periodo: $p->descper";
      //<li><a href='$ip/evadoc151/panel.php?matricula=$usuario' >Inicio</a></li>
      //<li><a href='$ip/administrador/vermo.php?matricula=$usuario' >Datos</a></li>
      //<li><a href='$ip/evadoc151/horalumno.php?matricula=$usuario' >Horario</a></li>
			echo"
            
			<div id='nav'>
        <div id='nav-bar'>
            <ul>          
                <li><a href='cerrarsesion.php' >Cerrar Sesión</a></li>
            </ul>
        </div>
      </div>    
			";
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
				Administrador: $d->nomadm Periodo: $p->descper";
				if(!empty($evento))
				{
					echo"<br>Evento: <a href='$ip/evento/evento.php' title='Para seleccionar otro, clic aquí'> $ev->idevento / $ev->descrip </a>";
				}
				echo"</header>
			<div id='nav'>
        <div id='nav-bar'>
					<ul>
						<li><a href='$ip/panel.php'>Inicio</a></li>	
						<li><a href='$ip/altaserv.php'>Alta de servicio</a></li>
						<li><a href='$ip/programa.php'>Programa Anual</a></li>
						<li><a href='$ip/resultados.php'>Resultados</a></li>
						
						<li><a href='$ip/cerrarsesion.php' >Cerrar Sesión</a></li>
          </ul>
        </div>
      </div>    ";
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

		

		?>





</body>

</html>

