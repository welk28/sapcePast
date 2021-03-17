<?php 
	include "../conexion.php"; 
	$conexion=conectar();
	header("Content-Type: text/html;charset=utf-8");?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Script auditoria</title>
	<link rel="stylesheet" href="bootstrap-reboot.min.css">
	<link rel="stylesheet" href="bootstrap.css">
	<link href="favicon.png" rel="icon">
</head>
<body class="container text-center">
	<div class="row mt-3"> 
		<div class="col-md-12">
			<h1>Generar Script de Auditoria</h1>
		</div>
	</div>
	<hr>
	
	<div class="row mt-3"> 
		<div class="col-md-12">
			<a href="sapce.php" target="_blank" class="btn btn-outline-primary btn-lg btn-block">Auditoria</a>
		</div>
	</div>
	<div class="row mt-1"> 
		<div class="col-md-12">
			<h6>Unicamente con servidor (memoria y procesador óptimos)</h6>
		</div>
	</div>
	<hr>
	<div class="row mt-5">
		<div class="col-md-4">
			<a href="01parte.php" target="_blank" class="btn btn-primary">Primera parte</a>
			<div class="row">
				<div class="col-md-12">
					<p> 
	administrador<br>
	control<br>
	alumnos<br>
	periodo<br>
	servicio<br>
				</div>
			</div>
		</div>
		<div class="col-md-4">
			<a href="02parte.php" target="_blank" class="btn btn-primary">Segunda parte</a>
			<div class="row">
				<div class="col-md-12">
					<p>
	docente
	coordinaser
	horario
	imparte
	auditoria
	audita
	preguntaudita
	respondaudita
	respondcomenta
	puesto
					</p>
				</div>
			</div>
		</div>
		<div class="col-md-4">
			<a href="03parte.php" target="_blank" class="btn btn-primary">Tercera parte</a>
			<div class="row">
				<div class="col-md-12">
					<p>CURSA</p>
				</div>
			</div>
		</div>
	

	</div>
	<hr>
	<div class="row mt-5"> 
		<div class="col-md-12">
			<h6>Para aprobechar el minimo recurso de transferencia de datos, se fragmenta la petición de registros en archivos para la optimizar la descarga.</h6>
		</div>
	</div>
	<?php 
	
	//include "predetermina.php";

	//SI     include "administrador.php";
	
	//SI     include "control.php";
	
	//SI     include "carrera.php";
	
	
	//SI     include "materias.php";
	
	//SI     include "posee.php";
	
	//SI     include "alumnos.php";
	
	//SI     include "periodo.php";
	
	//SI     include "adeuda.php";
	
	//SI     include "academico.php";
	
	//SI     include "aula.php";
	
	//SI     include "coordinador.php";
	
	//SI     include "coordina.php";
	
	//SI     include "servicio.php";
	
	//SI     include "docente.php";
	
	//SI     include "coordinaser.php";
	
	//SI     include "horario.php";
	
	//SI     include "division.php";
	
	//SI     include "grupo.php";
	
	//SI     include "hgrupo.php";
	
	//SI     include "imparte.php";
	
	//SI     include "encarre.php";
	
	//SI     include "depto.php";
	
	//SI     include "encarga.php";
	
	//SI     include "oportuniad.php";
	
	//SI     include "cursa.php";
	
	//SI     include "prerequi.php";
	
	//SI     include "listapre.php";
	
	




//permisos
?>
</body>
</html>